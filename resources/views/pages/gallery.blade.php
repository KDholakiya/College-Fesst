@extends('layout.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<link rel="stylesheet" href="{{URL::asset('css/grid-gallery.css')}}">
@section('content')
<section class="gallery-block grid-gallery">
        <div class="container">
            <div class="heading">
                <h2>{{$data}}</h2>
                @foreach($images as $image)

                    <?php print_r($image->getRealPath());echo "<hr/>"; ?>
    
            @endforeach
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="https://via.placeholder.com/180">
                        <img class="img-fluid image scale-on-hover" src="https://via.placeholder.com/180">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="https://via.placeholder.com/180">
                        <img class="img-fluid image scale-on-hover" src="https://via.placeholder.com/180">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="https://via.placeholder.com/180">
                        <img class="img-fluid image scale-on-hover" src="https://via.placeholder.com/180">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="https://via.placeholder.com/180">
                        <img class="img-fluid image scale-on-hover" src="https://via.placeholder.com/180">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
    </script>
@endsection