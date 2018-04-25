@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- <div class="container">
    <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading">Paywith Stripe</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => route('make_payment'), 'class' => 'form-horizontal', 'id' => 'pay_form', 'files' => true)) !!}
                        {{ csrf_field() }}
                        {{Form::hidden('food_item_id',$food_item_id)}}

                        <div class="form-group{{ $errors->has('card_no') ? ' has-error' : '' }}">
                            <label for="card_no" class="col-md-4 control-label">Card No</label>
                            <div class="col-md-6">
                                <input id="card_no" type="text" class="form-control" name="card_no" value="{{ old('card_no') }}" autofocus>
                                @if ($errors->has('card_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                            <label for="ccExpiryMonth" class="col-md-4 control-label">Expiry Month</label>
                            <div class="col-md-6">
                                <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" autofocus>
                                @if ($errors->has('ccExpiryMonth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                            <label for="ccExpiryYear" class="col-md-4 control-label">Expiry Year</label>
                            <div class="col-md-6">
                                <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" autofocus>
                                @if ($errors->has('ccExpiryYear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                            <label for="cvvNumber" class="col-md-4 control-label">CVV No.</label>
                            <div class="col-md-6">
                                <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('cvvNumber') }}" autofocus>
                                @if ($errors->has('cvvNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvvNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                {{ Form::text('amount', $amount, ['class' => 'form-control','id'=>'amount-stripe', 'autofocus'=>'autofocus', 'readonly' => true]) }}
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary paid">
                                    Pay
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        <!-- </div> -->
    <!-- </div>
</div> -->

@endsection

@section('add-js')  
<script type="text/javascript">
    $('.paid').click(function() {
        var form_data = new FormData($("#pay_form")[0]);
        payment(form_data);
    });

    function payment(form_data) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: form_data,
            type: 'POST',
            url: "{{ url('order/payment/make-payment') }}",
            contentType: false,
            processData: false,
            success: function(result) {
                if(result.error == 1) {
                    new PNotify({
                        text: result.msg,
                        type: 'error',
                        delay: 2500,
                        history: false,
                        sticker: true
                    });
                    swal({
                        title: "Oopps!",
                        text: result.msg,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                }
                else {
                    swal("Payment Successful!", {
                      buttons: {
                        Okay: true,
                      },
                    })
                    .then((value) => {
                      switch (value) {
                        case "Okay":
                            var url = '{{ url("/") }}';
                            window.location.href = url;
                          break;
                      }
                    });
                }
            }
        });
    }
</script>

@endsection