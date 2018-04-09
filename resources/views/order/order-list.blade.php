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
              <th>Sl. No.</th>
              <th>Order No.</th>
              <th>Name</th>
              <th>Total Price</th>
              <th>Date Of Order</th>
              <th>Time Of Order</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($orders as $order)
            
              <tr>
                <td>{{$i++}}</td>
                <td>{{$order->order_number}}</td>
                <td>{{$order->user_name}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->date_of_order}}</td>
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

