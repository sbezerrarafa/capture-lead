<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampanhasController extends Controller
{
    public function index(){
        return view ('campanhas.index');
    }
}
