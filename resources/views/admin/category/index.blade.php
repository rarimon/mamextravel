@extends('layouts.master')


@section('title')
Insert User
@endsection

@section('active_c')
active
@endsection

@section('l_category')
active
@endsection

@section('content')
<div class="sl-mainpanel">


  <div class="sl-pagebody">
    <div class="row row-sm mg-t-20">
      <div class="col-xl-12">
        <div class="card pd-20 pd-sm-40">
          <h2 class="card-body-title text-center">Category Information</h2>
          <p class="mg-b-20 mg-sm-b-30 ">Total Category: <span class="text-success">{{$category_total}}</span></p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-15p">Category Icon</th>
                  <th class="wd-15p">Added By</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Created Time</th>
                  <th class="wd-10p">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($category_info as $index=> $category)
                <tr>

                  <td>{{$category->category_name}}</td>
                  <td>
                    @if($category->icon_name)
                    <i class="icon {{$category->icon_name}}"></i>
                    @else
                    <P>NA</P>
                    @endif
                  </td>

                  <td>{{App\Models\User::find($category->added_by)->name}}</td>
                  <td>Na</td>

                  <td>{{$category->created_at->diffForHumans()}}</td>
                  <td>
                    <a href="{{url('/category/edit')}}/{{$category->id}}" class="btn btn-success">Edit</a>
                    <a href="{{url('/category/delete')}}/{{$category->id}}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach



              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->

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
    timer: 2000
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
    timer: 2000
  })
</script>
@endif
@endsection