@extends('layouts.master')

@section('title')
  Order List
@endsection

@section('add-meta')
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box box-custom-main">
      <div class="box-body">
        <div class="table-responsive table-responsive-custom">
          <table id="order_listing" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Order No.</th>
              <th>Date Of Order</th>
              <th>Delivery Time</th>
              <th>Creator Name</th>
              <th>Food Name</th>
              <th>Price</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{$order->order_number}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->time}}</td>
                  <td><a href="{{route('profile_details',['user_id' => $order->offered_by])}}">{{$order->creator_name}}</a></td>
                  <td><a href="{{route('food_details',['food_item_id' => $order->food_item_id])}}">{{$order->item_name}}</a></td>
                  <td>{{$order->total_price}}</td>
                  <td>
                    @if($order->status == 1)
                      Paid
                    @else()
                      --
                    @endif
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
      $("#order_listing").DataTable();
    });
  </script>
@endsection
