@extends('layouts.master')


@section('title')
Insert Hotel
@endsection

@section('active_h')
active
@endsection


@section('ad_hotel')
active
@endsection




@section('content')

<div class="sl-mainpanel">


    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h4 class="card-body-title text-center">Insert Hotel</h4>
            <p class="mg-b-20 mg-sm-b-30"></p>
            <form action="{{url('/add/hotel')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-layout">
                    <div class="row mg-b-25">

                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                                    <option label="Choose Category"></option>
                                    @foreach( $category_info as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Hotel Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="hotel_name">
                                @error('hotel_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Hotel Location: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="hotel_location">
                                @error('hotel_location')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Hotel Owner Name: </label>
                                <input class="form-control" type="text" name="owner_name" placeholder="Optional">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Type Description"></textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="price">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-8 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Discount %: </label>
                                <input class="form-control" type="text" name="discount" placeholder="Optional">
                            </div>
                        </div><!-- col-8 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Description Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="dsp_title">
                                @error('dsp_title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-8 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Hotel Location Map Link: </label>
                                <input class="form-control" type="text" name="map_link" placeholder="Optional">
                            </div>
                        </div><!-- col-8 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Hotel Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="hotel_image" type="file">
                                @error('hotel_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- col-8 -->



                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-success mg-r-5">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
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