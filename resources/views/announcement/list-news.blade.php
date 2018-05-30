@extends('layouts.master')

@section('title')
   News List
@endsection

@section('add-meta')
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box box-custom-main">
	    <div class="box-body">
	        <div class="table-responsive table-responsive-custom">
	          	<table id="news_listing" class="table table-bordered table-hover" data-order='[[ 1, "asc" ]]' data-page-length='100'>
		            <thead>
		            <tr>
		              <th>Title</th>
		              <th>Contents</th>
		              <th>Status</th>
		              <th>Edit</th>
		            </tr>
		            </thead>
		            <tbody>
			            @foreach($news as $value)
			              	<tr>
				                <td>

                                    {{$value->title}}
                                    @if($value->highlight == 1)
                                        <img src="{{url('frontend/images/new.gif')}}">
                                    @endif
                                    </td>
				                <td>
					                @if(mb_strlen($value->title) >= 40)
										@php echo mb_substr($value->contents, 0, 40, "UTF-8") @endphp ...
									@else
					                	{{$value->contents}}
					                @endif
				                </td>
				                <td>
				                  @if($value->status == 1)
				                    Active
				                  @else
				                    Inactive
				                  @endif
				                </td>
				                <td><a href="{{route('edit_news',['news_id' => $value['news_id']])}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
    $("#news_listing").DataTable({
      stateSave: true
    });
  });
</script>
@endsection
