<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    

    public function index(){
    	return view('layouts.home');
    }

    public function index2($name, $age){
    	return "Hi, {$name} {$age}";
    }



}
