@extends('layouts.master')

@section('title')
  Food Item List
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
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($food_items as $food)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$food->item_name}}</td>
                <td>{{$food->category_name}}</td>
                <td>
                  @if($food->status == 1)
                    Active
                  @elseif($food->status == 2)
                    Inactive
                  @endif
                </td>
                <td>
                  <a href="{{route('add_food_item_costing',['food_item_id' => $food['food_item_id']])}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  <a href="{{route('edit_food_item',['food_item_id' => $food['food_item_id']])}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
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

