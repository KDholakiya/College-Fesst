@extends('layout.app')
@section('content')
    <h1>{{$title}}</h1>
    <p>College fest</p>  
    @if (count($arr) > 1)
        <ol class="list-group">
            @foreach ($arr as $item)
                <li class="list-group-item">{{$item}}</li>
            @endforeach
        </ol>
    @endif
@endsection