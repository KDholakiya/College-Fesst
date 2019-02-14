@extends('layout.app')
@section('content')
    <section class="gallery-block grid-gallery">
        <div class="heading">
            <h2 class="title">{{$data['title']}}</h2>
            <p class="venue"><b>Venue : </b>{{$data['venue']}}</p>
            <p class="info">{{$data['info']}}</p>
        </div>
        <div class="gallery" id="gallery">
                @foreach($images as $image)
                <?php $path = "Data/".explode('Data', $image->getRealPath())[1]; ?>
                <div class="mb-3 item">
                    <a class="lightbox" href="{{$path}}">
                        <img class="img-fluid image scale-on-hover" src="{{$path}}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection