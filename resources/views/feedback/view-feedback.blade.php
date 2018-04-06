@extends('layouts.master')

@section('title')
  Feedback
@endsection

@section('add-meta')
@endsection

@section('content')
    <div class="col-md-8">
        <div class="box box-custom-main">
          <!-- form start -->
            {!! Form::open() !!}
              @if(!empty($feedback))
                {{ Form::model($feedback) }}
                {{Form::hidden('feedback_id',null)}}
              @endif

                <div class="box-body">
                  <div class="form-group form-custom-group">
                      <label> Name</label>
                      {!! Form::text('name', null, array('class'=>'form-control'
                      )) !!}
                  </div>
                  <div class="form-group form-custom-group">
                    <label>Email </label>
                    {!! Form::email('email', null, 
                                      array('class'=>'form-control')) !!}
                  </div>
                  <div class="form-group form-custom-group">
                    <label>Subject</label>
                    {!! Form::text('subject', null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="form-group form-custom-group">
                    <label> Message</label>
                    {!! Form::textarea('message', null, array('class'=>'form-control','rows' => '7')) !!}
                  </div>
                  <!-- /.box-body -->
              </div>
                <div class="box-footer text-center">
                   <a class="btn btn-primary btn-booking btn-complain" href="{{ URL::previous() }}">Back</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('add-js')
@endsection