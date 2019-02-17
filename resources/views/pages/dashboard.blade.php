@extends('layout.app')
@section('content')
    welcome to dashboard {{Session::get('member')}}
@endsection