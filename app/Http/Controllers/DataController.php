<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Members;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Data::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create callded';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'files' =>'max:20',
            'title' => 'required',
            'venue' => 'required',
            'info' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if(!is_dir('asset/'.$request['title'])){
            mkdir('asset/'.$request['title']);
        }
        foreach($request->file('files') as $image){
            $name=$image->getClientOriginalName();
            $path=public_path().'/asset/'.$request['title'];
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
