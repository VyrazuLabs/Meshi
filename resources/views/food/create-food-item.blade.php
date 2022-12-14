@extends('layouts.master')

@section('title')
  Create Food Item
@endsection

@section('add-meta')
@endsection

@section('content')
    <div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_food_item'),'files' => true)) !!}
            	@if(!empty($food_items))
                	{{ Form::model($food_items) }}
              	@endif
                {{Form::hidden('food_item_id',null)}}

              	<div class="box-body">
	                <div class="form-group form-custom-group">
	                  <label> Category<span>*</span></label>
	                  {!! Form::select('category_id', $category_id,null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Category']) !!}
	                  @if ($errors->has('category_id'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('category_id') }}</strong>
	                    </span>
	                  @endif
	                </div>

	                <div class="form-group form-custom-group">
	                  	<label>Name <span>*</span></label>
						{!! Form::text('item_name', null,
						    array(
						          'class'=>'form-control',
						          'placeholder'=>'Enter Food Item Name')) !!}
						@if ($errors->has('item_name'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('item_name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Description<span>*</span></label>
	                  	{!! Form::textarea('food_description', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Food Description','rows'=>'4')) !!}
	                  	@if ($errors->has('food_description'))
	                    	<span class="help-block error">
	                      		<strong class="strong">{{ $errors->first('food_description') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Short Info</label>
	                  	{!! Form::textarea('short_info', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Short Information','rows'=>'3')) !!}
	                  	@if ($errors->has('short_info'))
	                    	<span class="help-block error">
	                      		<strong class="strong">{{ $errors->first('short_info') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label> Offered By<span>*</span></label>
	                  {!! Form::select('offered_by', $offered_by,null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Select User']) !!}
	                  @if ($errors->has('offered_by'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('offered_by') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <div class="form-group form-custom-group">
		                <label for="exampleInputFile">Upload Food Images <span>*</span></label>
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
		                  <span class="help-block error">
		                     <strong class="strong">{{ $errors->first('food_images') }}</strong>
		                  </span>
		                  @endif
		            </div>
		            <div class="form-group form-custom-group">
		                <label>Date of Delivery <span>*</span></label>
		                {!! Form::text('date_of_availability', null, [
		                                    'class' => 'form-control', 'id' => 'datePicker']) !!}
		                @if ($errors->has('date_of_availability'))
		                  <span class="help-block error">
		                    <strong class="strong">{{ $errors->first('date_of_availability') }}</strong>
		                  </span>
		                @endif
		            </div>
		            <div class="col-sm-12 col-md-12 col-xs-12 p-0  input_fields_wrap">
		            	<div class="col-lg-12 col-xs-12 form-group p-0">
	                		<button class="ad-mre-btn add_field_button pull-right">Add Time Slot</button>
	                	</div>
	                	<div class="clearfix"></div>
	                	@if(!empty($time_of_availability))
		                  	@foreach($time_of_availability as $key => $slot)
		                  		<div class="col-lg-12 col-xs-12 p-0">
		                  			<i class="fa fa-times float-right time-cross" aria-hidden="true"></i>
		                    		<div class="start-time-id">
				                      	<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 create-food-timestart" >
				                       	 	<label>Start Time <span>*</span></label>
				                        	{!! Form::text('time_of_availability[0][start_time][]', $key, array('class'=>'form-control timepickerid')) !!}
					                        @if ($errors->has('time_of_availability'))
					                          <span class="help-block error">
					                            <strong class="strong">{{ $errors->first('time_of_availability') }}</strong>
					                          </span>
					                        @endif
				                      	</div>
				                      	<div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend" >
				                        	<div class="ad-mre-btn pull-right"></div>
				                        	<label>End Time <span>*</span></label>
				                        	{!! Form::text('time_of_availability[0][end_time][]', $slot, array('class'=>'form-control seat timepickerid')) !!}
				                      	</div>
		                    		</div>
		                    	</div>
	                  		@endforeach
	                	@else
	                		<div class="col-lg-12 col-xs-12 p-0">
		                  		<div class="start-time-id">
		                    		<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 create-food-timestart" >
		                      			<label>Start Time <span>*</span></label>
		                      			{{ Form::text('time_of_availability[0][start_time][]', null, ['class' => 'form-control timepickerid']) }}

					                    @if ($errors->has('time_of_availability'))
					                        <span class="help-block error error">
					                         	<strong class="strong">{{ $errors->first('time_of_availability') }}</strong>
					                        </span>
					                    @endif
		                    		</div>
				                    <div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend" >
				                      <div class="ad-mre-btn pull-right"></div>
				                      <label>End Time <span>*</span></label>
				                      {{ Form::text('time_of_availability[0][end_time][]', null, ['class' => 'form-control seat timepickerid','id' =>'seat_id' ]) }}
				                    </div>
		                  		</div>
		                  	</div>
	                	@endif
	              	</div>
              		<div class="clearfix"></div>

	                <!-- <div class="form-group form-custom-group">
	                  	<label>Shipping Fee</label>
						{!! Form::text('shipping_fee', null,
						    array(
						          'class'=>'form-control',
						          'placeholder'=>'Enter Shipping Charge')) !!}
						@if ($errors->has('shipping_fee'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('shipping_fee') }}</strong>
						  	</span>
						@endif
	                </div> -->
	                <div class="form-group form-custom-group">
	                  	<label>Price <span>*</span></label>
						{!! Form::text('price', null,
						    array(
						          'class'=>'form-control',
						          'id' => 'foodPrice',
						          'placeholder'=>'Enter Base Amount')) !!}
						@if ($errors->has('price'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('price') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="col-lg-12 col-xs-12 p-0 float-left">
                  		<div class="start-time-id float-left">
                  			<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 pl-0 " >
                      			<label>Start Publication Date<span>*</span></label>
                      			<!-- <input type="text" class="form-control food-item-date" name=""> -->
                      			{!! Form::text('start_publication_date', null,
						    array(
						          'class'=>'form-control food-item-date')) !!}
                    		</div>
		                    <div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 pr-0" >
		                      <div class="ad-mre-btn pull-right"></div>
		                      <label>End Publication Date<span>*</span></label>
		                      <!-- {{ Form::text('time_of_availability[0][end_time][]', null, ['class' => 'form-control seat timepickerid','id' =>'seat_id' ]) }} -->
		                      <!-- <input type="text" class="form-control food-item-date"> -->
		                      {!! Form::text('end_publication_date', null,
						    array(
						          'class'=>'form-control food-item-date')) !!}
		                    </div>
		                    @if ($errors->has('time_of_availability'))
	                          <span class="help-block">
	                            <strong class="strong t-red">{{ $errors->first('time_of_availability') }}</strong>
	                          </span>
	                        @endif
                  		</div>
                  	</div>
	                <div class="form-group form-custom-group">
	                  <label> Status<span>*</span></label>
	                  {{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control col-md-7 col-xs-12']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('status') }}</strong>
	                    </span>
	                  @endif
	                </div>

	                <!-- /.box-body -->
	            </div>
                <div class="box-footer text-center">
                  <button type="submit" class="btn btn-success btn-booking">Submit</button>
                </div>
            {!! Form::close() !!}
      	</div>
    </div>
@endsection

@section('add-js')
<script type="text/javascript">

	//Date picker
  	$('#datePicker').datepicker({
    	format: 'yyyy-mm-dd',
    	autoclose: true
  	});


  	//FOOD PRICE FIELD SHOULD BE NUMERIC
  $('#foodPrice').keypress(function (e) {
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

	        $(wrapper).append('<div class="col-lg-12 col-xs-12 p-0 float-left"><i class="fa fa-times float-right time-cross" onclick="closetimeslot(this)" aria-hidden="true"></i><div class="start-time-id float-left"><div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timestart"><label>Start Time <span>*</span></label><input class="form-control blink-cursor timepickerid " name="time_of_availability[0][start_time][]" type="text" value=""></div><div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend"><div class="ad-mre-btn pull-right"></div><label>End Time <span>*</span></label><input class="form-control timepickerid " name="time_of_availability[0][end_time][]" type="text" value=""></div></div></div>');
	        // $('.blink-cursor').focus();
	        $('.timepickerid').timepicker({
		      showMeridian: false,
		      // defaultTime: false
		    });
	      }
	    });
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	      e.preventDefault(); $(this).parent('div').remove(); x--;
	    });
	});
	//Time picker
  	$('.timepickerid').timepicker({
      showMeridian: false,
      // defaultTime: false
    });
    $('.time-cross').click(function(){
    	closetimeslot(this);
	});

    function closetimeslot(selector) {
		$(selector).parent().remove();
    }

    $(function () {
	    $('.food-item-date').datetimepicker({
	        // format: 'L'
	        // AutoClose: false
	        format: 'YYYY-MM-DD HH:mm',
	        locale: 'ja'
	    });
	});
</script>
@endsection
