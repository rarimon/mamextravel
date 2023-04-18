@extends('layouts.master')


@section('title')
Insert User
@endsection

@section('active_c')
active
@endsection


@section('ad_category')
active
@endsection


@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">

            <div class="col-xl-12 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Category</h6>
                      <form action="{{url('/insert/category')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Category Name: </label>
                            <input type="text" class="form-control" name="category_name" >
                         
                                @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                @enderror
                          
                        </div>
                        <div class="mb-3">
                            <label for="">Icon Name: </label>
                            <input type="text" class="form-control" name="icon_name" placeholder="Optional" >
                              <span>Note:font awesome icon name, exmaple- icon ion-navicon</span>
                             
                          
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                       
                      </form>
                     
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection


