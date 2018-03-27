@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <!-- <div class="panel panel-default"> -->
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
                <div class="panel-heading">Paywith Paypal</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => route('make_paypal_payment'), 'class' => 'form-horizontal', 'id' => 'payment-form', 'files' => true)) !!}
                        {{ csrf_field() }}
                        {{Form::hidden('food_item_id',$food_item_id)}}
                        
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                {{ Form::text('amount', $amount, ['class' => 'form-control','id'=>'amount', 'autofocus'=>'autofocus', 'readonly' => true]) }}
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

@endsection

@section('add-js')  

@endsection