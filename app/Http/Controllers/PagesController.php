<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function index(){
        return view('pages.index')->with('page', 'HOME...');;
    }
    public function about(){
        $data = array(
            'title' => 'ABOUT US',
            'arr'=>['a','b','c','d']
        );
        return view('pages.about')->with($data);;
    }
}
