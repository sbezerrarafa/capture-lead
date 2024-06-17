<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function index(){
        return view ('ajuda.index');
    }
}
