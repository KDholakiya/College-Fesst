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
    public function gallery($eve){
        $data = Data::where('title', 'like', $eve)->get();
        $images = \File::allFiles(public_path('Data/'.$eve));
        //print_r($images);
        return view('pages.gallery',compact('data','images'));
    }
    public function search($query){
        $eves = Data::where('title', 'like', '%'.$query.'%')->get();
        return view('pages.index')->with('eves',$eves);
    }
}
