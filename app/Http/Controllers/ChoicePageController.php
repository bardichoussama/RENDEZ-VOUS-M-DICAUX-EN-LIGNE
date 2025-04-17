<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoicePageController extends Controller
{
    public function index(){
        return (view('choicePage'));
    }
}
