<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class PagesController extends Controller{
    public function index(){
        $eves=Data::all();
        return view('pages.index')->with('eves',$eves);
    }
    public function about(){
        $data = array(
            'title' => 'ABOUT US',
            'arr'=>['a','b','c','d']
        );
        return view('pages.about')->with($data);;
    }
}
