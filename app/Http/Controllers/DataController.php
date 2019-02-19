<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Members;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class DataController extends Controller{
    public function index() {
        return Data::all();
    }
    public function addEvent(Request $request){
        $this->validate($request, [
            'files' =>'max:150',
            'title' => 'required',
            'venue' => 'required',
            'info' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if(!is_dir('asset/'.$request['title'])){
            mkdir('asset/'.$request['title']);
        }
        $path=public_path().'/asset/'.$request['title'];
        foreach($request->file('files') as $image){
            $name=$image->getClientOriginalName();
            $image->move($path, $name);
            $data[] = $name; 
        }
        $query=Data::insert([
            [
                'title' => $request['title'], 
                'venue' => $request['venue'],
                'info' => $request['info'],
                'featuredPhoto' => $data[0],
                'photos' => 'Data/'.$request['title'],
            ],
        ]);
        $request['files']=$data;
        if($query){
            return redirect()->back();
        }else{
            return "Data Not Instered Some Error Occured";
        }
    }

    public function authenticateMember(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $member = Members::where([
            ['username','=', $request['username']],
            ['password','=',$request['password']]
        ])->exists();
        if($member){
            Session::put('member', $request['username']);
            return redirect('dashboard');
        }
        else {
            return '<script>alert("in Valid");</script>'.redirect()->back();
        }
    }
    public function destroy($id){ 
        if(! (Session::has('member')) ) return redirect()->back();
        $title=Data::where('id','=',$id)->select('title')->get()->first();
        File::deleteDirectory(public_path().'/asset/'.$title['title']);
        $query=Data::where('id', '=', $id)->delete();
        if($query) return redirect()->back();
        else return $title.' IS NOT DELETED';
    }

    public function create() { }
    public function show($id){ }
    public function edit($id){ }
    public function update(Request $request, $id){ }
}
