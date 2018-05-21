@extends('layouts.master')

@section('title')
  User List
@endsection

@section('add-meta')
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box box-custom-main">
      <div class="box-body">
        <div class="table-responsive table-responsive-custom">
          <table id="user_listing" class="table table-bordered table-hover" data-order='[[ 1, "asc" ]]' data-page-length='100'>
            <thead>
            <tr>
              <th>Sl. No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Type</th>
              <th>Nick Name</th>
              <th>Status</th>
              <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1;  @endphp
            @foreach($users as $user)

              <tr>
                <td>{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if($user->type == 1)
                    Mesh creator
                  @elseif($user->type == 2)
                    Messiator
                  @endif
                </td>
                <td>{{$user->nick_name}}</td>
                <td>
                  @if($user->status == 1)
                    Active
                  @else
                    Inactive
                  @endif
                </td>
                <td>
                  <a href="{{route('edit_user',['user_id' => $user['user_id']])}}" class="btn btn-success user-list-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{route('delete_user',['user_id' => $user['user_id']])}}" class="btn btn-danger user-list-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    $("#user_listing").DataTable({
      stateSave: true
    });
  });
</script>
@endsection
