@extends('layouts.master')


@section('title')
Edit Category
@endsection

@section('active_c')
active
@endsection


@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Category</h6>
           
            <form action="{{url('/update/category')}}" method="post">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="hidden" name="category_id" value="{{$category_info->id}}">
                                <label class="form-control-label">Category Name<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="category_name" value="{{$category_info->category_name}}" placeholder="Enter firstname">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->





                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-success mg-r-5">Update</button>
                        <a href="{{url('/category')}}" class="btn btn-danger">Cancel</a>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection


