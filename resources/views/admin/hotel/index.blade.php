@extends('layouts.master')


@section('title')
Insert User
@endsection

@section('active_h')
active
@endsection

@section('l_hotel')
active
@endsection

@section('content')
<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
            <div class="col-xl-12">
                <div class="card pd-20 pd-sm-40">
                    <h2 class="card-body-title text-center">Hotel Information</h2>
                    <p class="mg-b-20 mg-sm-b-30 ">Total Hotel: <span class="text-success">{{$total_hotel}}</span></p>

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

                                @foreach($hotel_info as $index=> $hotel)
                                <tr>

                                    <td class="text-center">
                                        @if($hotel->hotel_image)
                                        <img width="100px" src="{{asset('upload/hotel_image')}}/{{$hotel->hotel_image}}" alt="">
                                        @else
                                        <p>NA</p>
                                        @endif

                                    </td>
                                    <td>{{$hotel->hotel_name}}</td>
                                    <td>{{$hotel->hotel_location}}</td>
                                    <td> {{ Str::limit($hotel->description, 10) }}</td>
                                    <td>{{$hotel->price}}</td>
                                    <td>{{$hotel->discount}}%</td>

                                    <td>
                                        <a href="{{url('/edit/hotel')}}/{{$hotel->id}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('/hotel/facilities')}}/{{$hotel->id}}" class="btn btn-dark">Faciliti</a>
                                        <a href="{{url('/rooms')}}/{{$hotel->id}}" class="btn btn-success">Room</a>
                                        <a href="{{url('/hotel/delete')}}/{{$hotel->id}}" class="btn btn-danger">Delete</a>
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