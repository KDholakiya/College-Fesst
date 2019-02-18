@extends('layout.app')
@section('content')

    <div class="card card-body bg-light mb-2">
        <div class="d-flex justify-content-between align-items-center">
            Wanna Publish New Event? 
            <button title="Remove this Event"  data-toggle="modal" data-target="#uploadModal" type="button" class="btn btn-sm btn-outline-success">
                Upload Now <i class="fa fa-cloud-upload fa-lg"></i>
            </button>
        </div>
    </div>

    {{-- Display Current Published Events --}}
    @if (count($events) > 0)
        <ul class="list-group">
            @foreach ($events as $event)
               <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$event['title']}}
                    <div>

                    <button title="Remove this Event" id={{'event'.$event['id']}} onclick="removeEvent({{$event['id']}})" type="button" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-trash fa-lg"></i>
                    </button>
                    <button title="See Gallary" onclick="gotoGallary('{{$event['title']}}')" type="button" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-eye fa-lg"></i>
                    </button>
                    <div>
                </li> 
            @endforeach
        </ul> 
    @else
        <div class="card-columns">
            <div class="noEve">
                <p>There's Nothing To Show...</p>
            </div>
        </div>
    @endif

    <!-- The Modal -->
    <div class="modal fade" id="uploadModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Publish New Event</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['action' => 'DataController@store','method'=>'POST','id'=>'eventUploadForm','files' => true,'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                                {{Form::label('title', 'Title')}}
                                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Business Fiesta','required'])}}
                        </div>  
                        <div class="form-group">
                                {{Form::label('venue', 'Venue')}}
                                {{Form::text('venue','',['class'=>'form-control','placeholder'=>'Race Course Rajkot','required'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('info', 'Info')}}
                                {{Form::textarea('info','',['rows'=>'5','class'=>'form-control','placeholder'=>'Anything U Like...','required'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('files', 'Select Files(First Image Will Be Featured Pic)')}}
                                <label class="btn btn-outline-primary form-control">
                                        Browse {{Form::file('files[]', ['class'=>'form-control hidden','multiple'])}}
                                </label>
                        </div>
                 </div>
                <div class="modal-footer">
                    <button type="button" id="uploadEvent" class="btn btn-outline-success" data-dismiss="modal">Upload</button>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection