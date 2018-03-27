@extends('layouts.master')

@section('title')
  Category List
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
              <th>Name</th>
              <th>Status</th>
              <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($categories as $category)
            
              <tr>
                <td>{{$i++}}</td>
                <td>{{$category->category_name}}</td>
                <td>
                  @if($category->status == 1)
                    Active
                  @elseif($category->status == 2)
                    Inactive
                  @endif
                </td>
                <td><a href="{{route('edit_category',['category_id' => $category['category_id']])}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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

