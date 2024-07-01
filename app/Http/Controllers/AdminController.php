<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('admin.manage-users')->with('status', 'Usuário criado com sucesso!');
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('admin.manage-users')->with('status', 'Usuário atualizado com sucesso!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        //return response()->json(['message' => 'Usuário criado com sucesso']);
        return Redirect::route('admin.manage-users')->with('status', 'Usuário criado com sucesso!');
    }

    public function deleteUser(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.manage-users')->with('status', 'Você não pode deletar seu próprio usuário.');
        }

        $user->delete();
    
        return redirect()->route('admin.manage-users')->with('status', 'Usuário deletado com sucesso!');
    }
    

}
