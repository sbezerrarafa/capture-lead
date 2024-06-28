<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PerfilController extends Controller
{
    public function store()
    {
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@user.com';
        $user->role = 'user';
        $user->password = bcrypt('a123123');
        $user->save();

        return response()->json(['message' => 'Usuário criado com sucesso']);
    }

    /**
     * Display the user's perfil form.
     */
    public function edit(Request $request, User $user = null): View
    {
        if ($user) {
            $this->authorize('update', $user);
        } else {
            $user = $request->user();
        }

        return view('perfil.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's perfil information.
     */
    public function update(PerfilUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        $user->fill($request->validated());
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }else {
            $user->password = $user->getOriginal('password');
        }
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return Redirect::route('perfil.edit')->with('status', 'Perfil atualizado!');
    }
    

    /**
     * List all users (admin only).
     */
    public function index(): View
    {
        $this->authorize('viewAny', User::class);

        $users = User::all();
        return view('perfil.index', ['users' => $users]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, User $user = null): RedirectResponse
    {
        if ($user) {
            $this->authorize('delete', $user);
        } else {
            $user = $request->user();
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
