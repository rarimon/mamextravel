@extends('layouts.master')


@section('title')
Edit Profile
@endsection


@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">

        <h4>Update Your Profile</h4>

        <div class="row row-sm mg-t-20">

            <div class="col-xl-6">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

                    <h6 class="card-body-title">Change Your Name</h6>
                    <form action="{{url('/name/update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- row -->

                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-success mg-r-5">Update</button>

                        </div><!-- form-layout-footer -->
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="card-body-title">Change Phone Number</h6>
                    <form action="{{url('/phone_number/update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Enter Name">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- row -->

                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-success mg-r-5">Update</button>

                        </div><!-- form-layout-footer -->
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">


            <div class="col-xl-6">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title">Change Email</h6>
                    <div class="row">
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Enter Name" readonly>
                        </div>
                    </div><!-- row -->

                    <div class="form-layout-footer mg-t-30">
                        <button type="submit" class="btn btn-success mg-r-5">Update</button>

                    </div><!-- form-layout-footer -->
                </div><!-- card -->
            </div><!-- col-6 -->


            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="card-body-title">Change Profile Photo</h6>
                    <form action="{{url('/photo/update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" name="profile_photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                @error('profile_photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <img id="blah" alt="" width="100" height="100" />
                        </div><!-- row -->

                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-success mg-r-5">Update</button>

                        </div><!-- form-layout-footer -->
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->



        <div class="row row-sm mg-t-20">


            <div class="col-xl-6">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <form action="{{url('/password/update')}}" method="post">
                        @csrf
                        <h6 class="card-body-title">Change Password</h6>
                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password">
                                @error('old_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                @if(session('alert'))

                                <span class="text-danger"> {{session('alert')}}</span>

                                @endif


                            </div>
                        </div><!-- row -->
                        <br>


                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" name="password" class="form-control" placeholder="Enter New Password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- row -->

                        <br>

                        <div class="row">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirmed Password">

                            </div>
                        </div><!-- row -->



                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-success mg-r-5">Update</button>

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