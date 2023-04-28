@extends('layouts.master')


@section('title')
Room Facilities
@endsection


@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">
        {{-- <div class="alert alert-success" role="alert">

          <strong class="d-block d-sm-inline-block-force">Room Name:</strong> {{$room_type}}
    </div><!-- alert -->--}}


    <div class="row row-sm mg-t-20">
        <div class="col-xl-8">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title text-center">Digital Facilities</h6>
                <p class="mg-b-20 mg-sm-b-30"></p>


                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($room_digital_faciliti_info as $room_d_faciliti)
                            <tr>

                                <td>{{ $room_d_faciliti->faciliti_name}}</td>
                                <td>
                                    @if($room_d_faciliti->icon_name)
                                    <i class="icon{{$room_d_faciliti->icon_name}}"></i>
                                    @else
                                    <P>NA</P>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/delete/digital_ficiliti')}}/{{$room_d_faciliti->id}}" class="btn btn-danger">Delete</a>
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
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Add Digital Faciliti</h6>
                <p class="mg-b-30 tx-gray-600"></p>
                <form action="{{url('/insert/room_digital_faciliti')}}" method="post">
                    @csrf

                    <input type="hidden" name="room_id" value="{{$room_id}}">
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">



                        </div>
                    </div><!-- row -->
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                            <label for="">Faciliti Name</label>
                            <input type="text" name="faciliti_name" class="form-control" placeholder="">
                            @error('faciliti_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div><!-- row -->

                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                            <label for="">Icon Name</label>
                            <input type="text" name="icon_name" class="form-control" placeholder="Optional">
                            <span class="text-dark">Note:font awesome icon name, exmaple- icon ion-navicon </span>
                        </div>
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-success mg-r-5">Submit</button>

                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->


    <div class="row row-sm mg-t-20">
        <div class="col-xl-8">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title text-center">Other Facilities</h6>
                <p class="mg-b-20 mg-sm-b-30"></p>


                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>

                                <th>Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($room_other_faciliti_info as $room_o_faciliti)
                            <tr>

                                <td>{{ $room_o_faciliti->faciliti_name}}</td>

                                <td>
                                    <a href="{{url('/delete/room_other_ficiliti')}}/{{$room_o_faciliti->id}}" class="btn btn-danger">Delete</a>
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
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Add Other Faciliti</h6>
                <p class="mg-b-30 tx-gray-600"></p>
                <form action="{{url('/insert/room_other_ficiliti')}}" method="post">
                    @csrf

                    <input type="hidden" name="room_id" value="{{$room_id}}">
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">



                        </div>
                    </div><!-- row -->
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                            <label for="">Faciliti Name</label>
                            <input type="text" name="faciliti_name" class="form-control" placeholder="">
                            @error('faciliti_name')
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




    <div class="row row-sm mg-t-20">
        <div class="col-xl-8">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title text-center">Why choose us Information</h6>
                <p class="mg-b-20 mg-sm-b-30"></p>


                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>

                                <th>Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($room_choose_info as $choose_room)
                            <tr>

                                <td>{{ $choose_room->name}}</td>

                                <td>
                                    <a href="{{url('/delete/room_choose_us')}}/{{$choose_room->id}}" class="btn btn-danger">Delete</a>
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
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Add Why choose us</h6>
                <p class="mg-b-30 tx-gray-600"></p>
                <form action="{{url('/insert/room_choose_us')}}" method="post">
                    @csrf

                    <input type="hidden" name="room_id" value="{{$room_id}}">
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">



                        </div>
                    </div><!-- row -->
                    <div class="row mb-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="">
                            @error('name')
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