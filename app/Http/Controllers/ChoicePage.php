<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoicePage extends Controller
{
    public function index(){
        return (view('choicePage'));
    }
}
