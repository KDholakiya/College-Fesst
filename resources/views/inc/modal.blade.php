<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Credential</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{-- @include('inc.messages') --}}
            
            {!! Form::open(['action' => 'DataController@authenticateMember','method'=>'POST','id'=>'form']) !!}
                <div class="form-group">
                        {{Form::label('username', 'Username')}}
                        {{Form::text('username', '',['class'=>'form-control','placeholder'=>'kevald47','required'])}}
                </div>
                <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        {{Form::password('password',['class'=>'form-control','placeholder'=>'******','required'])}}
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cancle</button>
        <button id='sbmt' type="button" class="btn btn-primary" >Submit</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>