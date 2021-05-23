@extends('layouts.app')

@section('content')
<div class="profile-page">

    <div class="row profile-cover">
        <div class="row">
            <div class="col-md-3 profile-image">
                <div class="profile-image-container">
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image"/>
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>800</h3>
                    <p>Followers</p>
                </div>
                <div class=" profile-info-value">
                    <h3>1520</h3>
                    <p>Friends</p>
                </div>
                <div class=" profile-info-value">
                    <h3>340</h3>
                    <p>Photos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 profile-under-cover-style">
            &nbsp;
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row margin-top-70">
        <div class="top-page-header">

            <div class="page-title">
                <h2>Nama Anak</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--End Left Sidebar-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>General Table</h2>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Sholat</th>
                                <th>Waktu</th>

                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp


                                @foreach ($sholat as $lat)


                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td rowspan="2">{{ $lat->user_id}}</td>


                                        <td>{{ $lat->nama_sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        <td>{{ $lat->created_at->format('D, d M y') }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>
                        {{ $sholat->links() }}

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->

    </div>

</div>

@endsection
