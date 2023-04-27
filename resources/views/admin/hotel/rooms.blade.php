@extends('layouts.master')


@section('title')
Room
@endsection


@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="alert alert-success" role="alert">

            <strong class="d-block d-sm-inline-block-force">Hotel Name:</strong> {{$hotel_name}}
        </div><!-- alert -->
        <div class="row row-sm mg-t-20">
            <div class="col-xl-12">
                <div class="card pd-20 pd-sm-40">

                    <h2 class="card-body-title text-center">room Information</h2>
                    <p>
                        <a style="float:right" href="" class="btn btn-success pd-x-20" data-toggle="modal" data-target="#modaldemo3">+ Add New</a>
                    </p>

                    <!-- LARGE MODAL -->
                    <form action="{{url('/add/room')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div id="modaldemo3" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Insert room</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-20">
                                        <div class="card pd-20 pd-sm-40">

                                            <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                                            <div class="form-layout">
                                                <div class="row mg-b-25">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Room Type: <span class="tx-danger">*</span></label>
                                                            <input class="form-control" type="text" name="room_type">
                                                            @error('room_type')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- col-4 -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Room Location: <span class="tx-danger">*</span></label>
                                                            <input class="form-control" type="text" name="room_location">
                                                            @error('room_location')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
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
                                                            <label class="form-control-label">Room Image: <span class="tx-danger">*</span></label>
                                                            <input class="form-control" name="room_image" type="file">
                                                            @error('room_image')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- col-8 -->



                                                </div><!-- row -->


                                            </div><!-- form-layout -->

                                        </div><!-- card -->
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success pd-x-20">Submit</button>
                                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div><!-- modal-dialog -->
                        </div><!-- modal -->
                    </form>




                    <p class="mg-b-20 mg-sm-b-30 ">Total Room: <span class="text-success">{{--{{$total_hotel}}--}}</span></p>

                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Hotel Image</th>
                                    <th class="wd-15p">Hotel Name</th>
                                    <th class="wd-15p">Hotel Location</th>
                                    <th class="wd-20p">Description</th>
                                    <th class="wd-20p">Price</th>
                                    <th class="wd-15p">Discount</th>
                                    <th class="wd-10p">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach($hotel_info as $index=> $hotel)
                                <tr>

                                    <td class="text-center">
                                        @if($hotel->hotel_image)
                                        <img width="150px" src="{{asset('upload/hotel_image')}}/{{$hotel->hotel_image}}" alt="">
                                @else
                                <p>NA</p>
                                @endif

                                </td>
                                <td>{{$hotel->hotel_name}}</td>
                                <td>{{$hotel->hotel_location}}</td>
                                <td>{{$hotel->description}}</td>
                                <td>{{$hotel->price}}</td>
                                <td>{{$hotel->discount}}%</td>






                                <td>
                                    <a href="{{url('/edit/hotel')}}/{{$hotel->id}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('/hotel/facilities')}}/{{$hotel->id}}" class="btn btn-dark">Facility</a>
                                    <a href="{{url('/rooms')}}/{{$hotel->id}}" class="btn btn-success">Room</a>
                                    <a href="{{url('/hotel/delete')}}/{{$hotel->id}}" class="btn btn-danger">Delete</a>
                                </td>
                                </tr>
                                @endforeach--}}



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