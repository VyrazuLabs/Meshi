@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')
<!-- signin-page -->
	<section id="" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card">
						<h2>{{ trans('app.Food Register') }}</h2>
						<!-- form -->
						
						{!! Form::open(array('url' => route('save_food_item_user'),'files' => true)) !!}
            	@if(!empty($food_items))
                	{{ Form::model($food_items) }}
              	@endif
                {{Form::hidden('food_item_id',null)}}

                @php 
                	$selectPlaceholder = trans('app.Please Select'); 
                @endphp
              	<div class="box-body">
	                <div class="form-group form-custom-group">
	                  <label>{{ trans('app.Category') }}<span>*</span></label>
	                  {!! Form::select('category_id', $category_id,null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => $selectPlaceholder ]) !!}
	                  @if ($errors->has('category_id'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('category_id') }}</strong>
	                    </span>
	                  @endif
	                </div>

	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Name') }}<span>*</span></label>
						{!! Form::text('item_name', null, 
						    array(
						          'class'=>'form-control')) !!}
						@if ($errors->has('item_name'))
						  	<span class="help-block">
						      <strong class="strong t-red">{{ $errors->first('item_name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Description') }}<span>*</span></label>
	                  	{!! Form::textarea('food_description', null, 
	                          array('class'=>'form-control','rows'=>'4')) !!}
	                  	@if ($errors->has('food_description'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('food_description') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Short Info') }}<span>*</span></label>
	                  	{!! Form::textarea('short_info', null, 
	                          array('class'=>'form-control','rows'=>'3')) !!}
	                  	@if ($errors->has('short_info'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('short_info') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
		                <label for="exampleInputFile">{{ trans('app.Upload Food Images') }} <span>*</span></label>
		                {!! Form::file('food_images[]', array('multiple'=>true,'class' => 'custom-file-input' ,'id' => 'food_images') ) !!}
		                  @if( !empty($food_images) )
		                    <div class="form-group">
		                      <div class="col-sm-8" style="width: 100%;">
		                        @foreach( $food_images as $images )
		                          <li  class="gallery-images" style="float: left; list-style: none; margin: 6px;">
		                          <a href="{{route('delete_food_image',[$images,$food_items->food_item_id])}}">X</a>
		                          
		                          <img src="{{ url('/uploads/food/'.$images) }}" style="width: 62px; height: 42px;margin-top: 6px;" />
		                          </li>
		                        @endforeach
		                      </div>
		                    </div>
		                  @endif
		                  @if ($errors->has('food_images'))
		                  <span class="help-block">
		                     <strong class="strong t-red">{{ $errors->first('food_images') }}</strong>
		                  </span>
		                  @endif
		            </div>
		            <div class="form-group form-custom-group">
		                <label>{{ trans('app.Date of Delivery') }} <span>*</span></label>
		                {!! Form::text('date_of_availability', null, [
		                                    'class' => 'form-control', 'id' => 'datePicker']) !!}
		                @if ($errors->has('date_of_availability'))
		                  <span class="help-block">
		                    <strong class="strong t-red">{{ $errors->first('date_of_availability') }}</strong>
		                  </span>
		                @endif
		            </div>
		            <div class="col-sm-12 col-md-12 col-xs-12 p-0 input_fields_wrap">
		            	<div class="col-lg-12 col-xs-12 d-inline-block form-group p-0">
	                		<button class="btn ad-mre-btn add_field_button pull-right back-orange">{{ trans('app.Add Time Slot') }}</button>
	                	</div>
	                	<div class="clearfix"></div>
	                	@if(!empty($time_of_availability))
		                  	@foreach($time_of_availability as $key => $slot)
	                    		<div class="start-time-id">
			                      	<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 pl-0 " >
			                       	 	<label>{{ trans('app.Start Time') }} <span>*</span></label>
			                        	{!! Form::text('time_of_availability[0][start_time][]', $key, array('class'=>'form-control timepickerid')) !!}
				                        @if ($errors->has('time_of_availability'))
				                          <span class="help-block">
				                            <strong class="strong t-red">{{ $errors->first('time_of_availability') }}</strong>
				                          </span>
				                        @endif
			                      	</div>
			                      	<div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 pr-0" >
			                        	<div class="ad-mre-btn pull-right"></div>
			                        	<label>{{ trans('app.End Time') }} <span>*</span></label>
			                        	{!! Form::text('time_of_availability[0][end_time][]', $slot, array('class'=>'form-control seat timepickerid')) !!}
			                      	</div>
	                    		</div>
	                  		@endforeach
	                	@else
	                  		<div class="start-time-id">
	                    		<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 pl-0 " >
	                      			<label>{{ trans('app.Start Time') }} <span>*</span></label>
	                      			{{ Form::text('time_of_availability[0][start_time][]', null, ['class' => 'form-control timepickerid']) }}

				                    @if ($errors->has('time_of_availability'))
				                        <span class="help-block">
				                         	<strong class="strong t-red">{{ $errors->first('time_of_availability') }}</strong>
				                        </span>
				                    @endif
	                    		</div>
			                    <div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 pr-0" >
			                      <div class="ad-mre-btn pull-right"></div>
			                      <label>{{ trans('app.End Time') }} <span>*</span></label>
			                      {{ Form::text('time_of_availability[0][end_time][]', null, ['class' => 'form-control seat timepickerid','id' =>'seat_id' ]) }}
			                    </div>
	                  		</div>
	                	@endif
	              	</div>
              		<div class="clearfix"></div>
	                
	          <!--       <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Shipping Fee') }}</label>
						{!! Form::text('shipping_fee', null, 
						    array(
						          'class'=>'form-control')) !!}
						@if ($errors->has('shipping_fee'))
						  	<span class="help-block">
						      <strong class="strong t-red">{{ $errors->first('shipping_fee') }}</strong>
						  	</span>
						@endif
	                </div> -->
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Price') }} <span>*</span></label>
						{!! Form::text('price', null, 
						    array(
						          'class'=>'form-control', 
						          'id' => 'priceId')) !!}
						@if ($errors->has('price'))
						  	<span class="help-block">
						      <strong class="strong t-red">{{ $errors->first('price') }}</strong>
						  	</span>
						@endif
	                </div>
	               <!--  <div class="col-sm-12 col-md-12 col-xs-12 p-0 tag_field_wrap">
	                	<div class="col-lg-12 col-xs-12 float-left form-group">
	                		<button class="ad-mre-btn add_ag_field pull-right">Add Tag</button>
	                	</div>
	                	<div class="clearfix"></div>
	                	@if(!empty($time_of_availability))
		                  	@foreach($time_of_availability as $key => $slot)
	                    		<div class="add-tag">
			                      	<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pl-0 create-tax-name" >
			                       	 	<label>Tax Name</label>
			                        	{!! Form::text('tax[0][tax_name][]', null, 
							    						array('class'=>'form-control')) !!}
			                      	</div>
			                      	<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 p-0" >
			                        	<div class="ad-mre-btn pull-right"></div>
			                        	<label>Amount</label>
			                        	{!! Form::text('tax[0][tax_amount][]', null, array(
											          'class'=>'form-control')) !!}

			                      	</div>
			                      	<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pr-0 create-percentage" >
			                        	<div class="ad-mre-btn pull-right"></div>
			                        	<label>Percentage(%)</label>
			                        	{!! Form::text('tax[0][tax_percentage][]', null,  array(
										          'class'=>'form-control')) !!}

			                      	</div>
	                    		</div>
	                  		@endforeach
	                	@else
	                  		<div class="add-tag">
	                    		<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pl-0 create-tax-name" >
		                       	 	<label>Tax Name</label>
		                        	{!! Form::text('tax[0][tax_name][]', null, 
						    						array('class'=>'form-control',)) !!}
			                    </div>
		                      	<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 p-0" >
		                        	<div class="ad-mre-btn pull-right"></div>
		                        	<label>Amount</label>
		                        	{!! Form::text('tax[0][tax_amount][]', null, array(
						          		'class'=>'form-control')) !!}
		                      	</div>
		                      	<div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pr-0 create-percentage" >
		                        	<div class="ad-mre-btn pull-right"></div>
		                        	<label>Percentage(%)</label>
		                        	{!! Form::text('tax[0][tax_percentage][]', null, array(
						          		'class'=>'form-control')) !!}
		                      	</div>
	                  		</div>
	                	@endif
	              	</div>
              		<div class="clearfix"></div> -->
	                <!-- /.box-body -->
	            </div>
                <div class="box-footer text-center">
                  <button type="submit" class="btn btn-booking">{{ trans('app.Submit') }}</button>
                </div>
            {!! Form::close() !!}
					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
@endsection

@section('add-js')	
<script type="text/javascript">
	
	//Date picker
  	$('#datePicker').datepicker({
    	format: 'yyyy-mm-dd',
    	autoclose: true
  	});


  	//FOOD PRICE FIELD SHOULD BE NUMERIC
  	$('#priceId').keypress(function (e) {
    	var regex = new RegExp("^[0-9-]+$");
    	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    	if (regex.test(str)) {
      		return true;
    	}
    	e.preventDefault();
    	return false;
  	});

	


	// append time slots starts here
  	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    var count = 0;

	    var x = 1; //initlal text box count
	    $(add_button).on('click',function(e){ //on add input button click
	      count ++;
	      e.preventDefault();
	      if(x < max_fields){ //max input box allowed
	        x++; //text box increment

	        $(wrapper).append('<div class="start-time-id"><div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 pl-0 "><label>Start Time <span>*</span></label><input class="form-control blink-cursor timepickerid " name="time_of_availability[0][start_time][]" type="text" value=""></div><div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 pr-0"><div class="ad-mre-btn pull-right"></div><label>End Time <span>*</span></label><input class="form-control timepickerid " name="time_of_availability[0][end_time][]" type="text" value=""></div></div>');

	        // $('.blink-cursor').focus();
	        $('.timepickerid').timepicker({
		      showMeridian: false,
		      // defaultTime: false
		    });
	      }
	    });
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	      e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});


	// append time slots starts here
  	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".tag_field_wrap"); //Fields wrapper
	    var add_button      = $(".add_ag_field"); //Add button ID
	    var count = 0;

	    var x = 1; //initlal text box count
	    $(add_button).on('click',function(e){ //on add input button click
	      count ++;
	      e.preventDefault();
	      if(x < max_fields){ //max input box allowed
	        x++; //text box increment

	        $(wrapper).append('<div class="add-tag"><div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pl-0 create-tax-name"><label>Tax Name</label><input class="form-control" name="tax[0][tax_name][]" type="text" value=""></div><div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 p-0" ><div class="ad-mre-btn pull-right"></div><label>Amount</label><input class="form-control" name="tax[0][tax_amount][]" type="text" value=""></div><div class="form-group form-custom-group col-sm-12 col-md-4 col-xs-12 pr-0 create-percentage" ><div class="ad-mre-btn pull-right"></div><label>Percentage(%)</label><input class="form-control" name="tax[0][tax_percentage][]" type="text" value=""></div></div>');
	      }
	    });
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	      e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});


	//Time picker
  	$('.timepickerid').timepicker({
      showMeridian: false,
      // defaultTime: false
    });




 


//     $('#priceId').keypress(function(event){
//     var regex = /[0-9]|\./;
//     var text = $("input[type=text]").val();
//     var keycode = (event.keyCode ? event.keyCode : event.which);
//     if(keycode == '13' && !(regex.test(text))) {
//      alert('You pressed a "enter" key in textbox'); 
// }
// });
</script>
@endsection