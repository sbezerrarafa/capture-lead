<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultadosController extends Controller
{
    public function index(){
        return view ('resultados.index');
    }
}
