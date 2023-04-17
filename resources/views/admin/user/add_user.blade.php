@extends('layouts.master')


@section('title')
Insert User
@endsection

@section('active_u')
active
@endsection

@section('ad_user')
active
@endsection

@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">ADD USER</h6>
            <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>
            <form action="{{url('/insert/user')}}" method="post">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Full Name<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter firstname">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" " placeholder=" Enter email address">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" placeholder="Enter Your Phone">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="password" placeholder="Enter Your Password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Confirmed Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="password_confirmation" placeholder="Confirmed Password">
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-success mg-r-5">Submit Form</button>
                        <a href="{{url('/all/user')}}" class="btn btn-danger">Cancel</a>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection