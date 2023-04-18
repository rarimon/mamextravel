@extends('layouts.master')


@section('title')
User List
@endsection

@section('active_u')
active
@endsection


@section('l_user')
active
@endsection




@section('content')

<div class="sl-mainpanel">


  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h2 class="card-body-title text-center">User Information</h2>
      <p class="mg-b-20 mg-sm-b-30 " >Total User: <span class="text-success">{{$user_total}}</span></p>

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Name</th>
              <th class="wd-15p">Phone</th>
              <th class="wd-20p">Email</th>
              <th class="wd-15p">Role</th>
              <th class="wd-10p">Photo</th>
              <th class="wd-10p">Created Time</th>
              <th class="wd-25p">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user_info as $index=> $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->email}}</td>
              <td>Na</td>
              <td>Na</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>
                <a href="{{url('/user/delete')}}/{{$user->id}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach



          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->



  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->


@endsection



@section('footer_script')
<script>
  $(function() {
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

  });
</script>



//success alert message
@if(session('success'))
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: '{{session("success")}}',
    showConfirmButton: false,
    timer: 1500
  })
</script>
@endif


//delete alert message
@if(session('delete'))
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: '{{session("delete")}}',
    showConfirmButton: false,
    timer: 1500
  })
</script>
@endif
@endsection