@extends('layout.app')
@section('content')
    @if (count($eves) > 0)
    <div class="card-columns">

        @foreach ($eves as $eve)
                <div class="card" id={{'eveId'.$eve['id']}}>
                    <img class="card-img-top" src="{{$eve['photos'].'/'.$eve['featuredPhoto']}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$eve['title']}}</h4>
                        <p class="card-text">{{$eve['venue']}}</p>
                    </div>
                </div>
        @endforeach
    </div>

    @else
    <div class="card-columns">
            <div class="card">
                <img class="card-img-top" src="https://via.placeholder.com/180" alt="">
                <div class="card-body">
                    <h4 class="card-title">no posts</h4>
                    <p class="card-text">at planet earth</p>
                </div>
            </div>
         </div>
    @endif
  
@endsection