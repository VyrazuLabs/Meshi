@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Order List') }}
@endsection

@section('add-meta')

@endsection

@section('content')
<section id="" class="clearfix category-page cart-pages">
  <div class="col-lg-12 col-xs-12 p-0">
    <div class="container">
      <div class="breadcrumb-section">
        <!-- breadcrumb -->
        <ol class="breadcrumb ">
          <li><a href="{{ url('/')}}">{{ trans('app.HOME') }}</a></li>
          <li><a href="{{route('order_list')}}">{{ trans('app.Order List') }}</a></li>
        </ol><!-- breadcrumb -->
        <h2 class="title">{{ trans('app.Order List') }}</h2>
      </div>

      <div class="col-lg-12 col-xs-12 p-0">
        <div class="section cart-section">
          <div class="text-center boxes-card food-creator-card-box">
            <ul class="nav nav-pills food-creator-nav-pills d-inline-block">
              <li class="active"><a data-toggle="pill" href="#upcoming_orders">Upcoming Orders</a></li>
              <li><a data-toggle="pill" href="#">|</a></li>
              <li><a data-toggle="pill" href="#previous_orders">Previous Orders</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div id="upcoming_orders" class="tab-pane fade in active">
              @if(!empty($upcomingOrders))
                @foreach($upcomingOrders as $order)
                  <div class="col-lg-12 cart-box p-0">
                    <div class="cart-item">
                      <div class="item-image-box cart-image-box">
                        @if(!empty($order->foodImages))
                          @foreach($order->foodImages as $key=>$food_image)
                            @if($key == 0)
                              <img src="{{url('/uploads/food/'.$food_image)}}" alt="" class="img-responsive cart-img">
                            @else
                              <img src="{{ url('frontend/images/featured/food1.png') }}" class="img-responsive cart-img">
                            @endif
                          @endforeach
                        @else
                          <img src="{{ url('frontend/images/featured/food1.png') }}" class="img-responsive cart-img">
                        @endif
                      </div>
                      <div class="cart-content">
                        <div class="cart-content-details">
                          <h3 class="t-black cart-item-title">{{$order->item_name}}</h3>
                          <h5 class="t-orange"><strong>Order Number</strong> - {{$order->order_number}}</h5>
                          <h5><span><strong class="t-black">Date Of Delivery: </strong> {{date('Y-m-d', strtotime($order->date))}}</span><span class="customer-delivertime"><strong class="t-black">Shipping Address: </strong>  {{$order->address}}</span></h5>
                          <h5><strong class="t-black">Ordered By:</strong> {{$order->name}}</h5>
                        </div>
                        <div class="cart-content-btn-div">
                          <h3 class="t-orange mt-0 detail-price">¥{{$order->total_price}}</h3>
                          <div class="review-group text-center">
                            <button type="button" class="btn text-right back-orange t-white creator-review-btn" data-toggle="modal" data-target="#addinfomodal">Eater Info</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            <div id="previous_orders" class="tab-pane fade">
              @if(!empty($previousOrders))
                @foreach($previousOrders as $order)
                  <div class="col-lg-12 cart-box p-0">
                    <div class="cart-item">
                      <div class="item-image-box cart-image-box">
                        @if(!empty($order->foodImages))
                          @foreach($order->foodImages as $key=>$food_image)
                            @if($key == 0)
                              <img src="{{url('/uploads/food/'.$food_image)}}" alt="" class="img-responsive cart-img">
                            @else
                              <img src="{{ url('frontend/images/featured/food1.png') }}" class="img-responsive cart-img">
                            @endif
                          @endforeach
                        @else
                          <img src="{{ url('frontend/images/featured/food1.png') }}" class="img-responsive cart-img">
                        @endif
                      </div>

                      <div class="cart-content">
                        <div class="cart-content-details">
                          <h3 class="t-black cart-item-title">{{$order->item_name}}</h3>
                          <h5 class="t-orange"><strong>Order Number</strong> - {{$order->order_number}}</h5>
                          <h5><span><strong class="t-black">Date Of Delivery: </strong> {{date('Y-m-d', strtotime($order->date))}}</span><span class="customer-delivertime"><strong class="t-black">Shipping Address: </strong>  {{$order->address}}</span></h5>
                          <h5><strong class="t-black">Ordered By:</strong> {{$order->name}}</h5>
                        </div>
                        <div class="cart-content-btn-div">
                          <h3 class="t-orange mt-0 detail-price">¥{{$order->total_price}}</h3>

                          <div class="review-group text-center">
                          @if($order->review_status == 0)
                            <button type="button" class="btn text-right back-orange t-white creator-review-btn" data-toggle="modal" data-target="#creatorreviewmodal" data-attr="{{ $order->order_id }}" onclick="reviewFood(this)">Review</button>
                          @else
                            <button type="button" class="btn text-right back-orange customer-review-btn parchesed-review-btn creator-review-btn">Reviewed</button>

                          @endif
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('add-js')
<script type="text/javascript">
  function reviewFood(orderId) {
    var orderId = $(orderId).data('attr');
    $('#orderId').val(orderId);
  }

    $(document).ready(function() {
        var showChar = 100;
        var ellipsestext = "...";
        var moretext = "more";
        var lesstext = "less";
        $('.more').each(function() {
          var content = $(this).html();

          if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';


            $(this).html(html);
          }

        });

        $(".morelink").click(function(){
          if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
          } else {
            $(this).addClass("less");
            $(this).html(lesstext);
          }
          $(this).parent().prev().toggle();
          $(this).prev().toggle();
          return false;
        });
      });
</script>
@endsection
