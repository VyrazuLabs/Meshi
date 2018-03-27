@extends('layouts.master')

@section('title')
  Review List
@endsection

@section('add-meta')
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box box-custom-main">
      <div class="box-body">
        <div class="table-responsive table-responsive-custom">
          <table id="category_listing" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Sl. No.</th>
              <th>User</th>
              <th>Review</th>
              <th>View</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($reviews as $review)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$review->user}}</td>
                <td>{{$review->review}}</td>
                <td><a href="{{route('show_review',['review_id' => $review['review_id']])}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
      $("#category_listing").DataTable();
    });
  </script>
@endsection

