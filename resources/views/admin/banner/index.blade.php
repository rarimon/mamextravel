@extends('layouts.master')


@section('title')
Banner
@endsection


@section('active_w')
active
@endsection
@section('banner')
active
@endsection

@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">
        @if(session('warning'))
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                <span><strong>Warning!</strong> {{ session('warning')}}</span>
            </div><!-- d-flex -->
        </div>
        @endif

        <div class="row row-sm mg-t-20">
            <div class="col-xl-8">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Banner Information</h6>
                    <p class="mg-b-20 mg-sm-b-30"></p>


                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0">
                            <thead>
                                <tr>
                                    <th>Banner Image</th>
                                    <th>Banner Title</th>
                                    <th>Banner Subtitle</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banner_info as $banner)
                                <tr>
                                    <td>
                                        @if($banner->banner_image)
                                        <img width="120px" src="{{asset('/upload/banner')}}/{{$banner->banner_image}}" alt="">
                                        @else
                                        <P>NA</P>
                                        @endif
                                    </td>
                                    <td>
                                        @if($banner->banner_title)
                                        {{$banner->banner_title}}
                                        @else
                                        <P>NA</P>
                                        @endif
                                    </td>
                                    <td>
                                        @if($banner->banner_subtitle)
                                        {{$banner->banner_subtitle}}
                                        @else
                                        <P>NA</P>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/update/status')}}/{{$banner->id}}" class="btn btn-{{$banner->status==0?'secondary':'success'}}">{{$banner->status==0?'deactive':'active'}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url('/delete/banner')}}/{{$banner->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div><!-- table-responsive -->





                </div><!-- card -->
            </div><!-- col-6 -->
            <div class="col-xl-4 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Add Banner</h6>
                    <p class="mg-b-30 tx-gray-600"></p>
                    <form action="{{url('/insert/banner')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                <label for="">Title</label>
                                <input type="text" name="title_name" class="form-control" placeholder="Optional">

                            </div>
                        </div><!-- row -->


                        <div class="row mb-3">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                <label for="">Subtitle</label>
                                <input type="text" name="subtitle_name" class="form-control" placeholder="Optional">
                            </div>

                        </div><!-- row -->

                        <div class="row mb-3">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                <label for="">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control" placeholder="">
                                @error('banner_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- row -->



                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-success mg-r-5">Submit</button>

                        </div><!-- form-layout-footer -->
                    </form>
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