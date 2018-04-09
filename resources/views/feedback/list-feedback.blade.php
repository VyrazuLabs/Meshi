@extends('layouts.master')

@section('title')
  Feedback List
@endsection

@section('add-meta')
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box box-custom-main">
      <div class="box-body">
        <div class="table-responsive table-responsive-custom">
          <table id="feedback_listing" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Sl. No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>View</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($feedbacks as $feedback)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->email}}</td>
                <td><a href="{{route('view_feedback',['feedback_id' => $feedback['feedback_id']])}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('add-js')
<script type="text/javascript">
    $(function () {
      $("#feedback_listing").DataTable();
    });
  </script>
@endsection

