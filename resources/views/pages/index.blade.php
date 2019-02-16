@extends('layout.app')
@section('content')
    @if (count($eves) > 0)
    <div class="row">
        @foreach ($eves as $eve)
            <div class="col-12 col-sm-6 col-md-6 col-xl-4 col-lg-4" >
                <div class="card" id={{'eveId'.$eve['id']}}>
                    <img class="card-img-top" src="{{URL::asset('/asset/'.$eve['title'].'/'.$eve['featuredPhoto'])}}" alt="">
                    {{-- <img  /> --}}
                    <div class="card-body">
                        <h4 id="title" class="card-title">{{$eve['title']}}</h4>
                        <p class="card-text">{{$eve['venue']}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else
    <div class="card-columns">
            <div class="noEve">
                <p>There's Nothing To Show...</p>
            </div>
         </div>
    @endif
  
@endsection