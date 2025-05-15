@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')

    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Genos:ital,wght@0,100..900;1,100..900&display=swap');

        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            /* height: 100%; */
            position: relative;
        }

        .server-icon {
            width: 25px;
            height: 25px;
            margin-bottom: 10px;
        }

        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .online {
            background-color: #28a745;
        }

        .offline {
            background-color: #dc3545;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .log-entry {
            border-bottom: 1px solid #eee;
            padding: 8px 0;
        }





        .fs-22 {
            font-size: 12px;
        }

        .txt_percent {
            color: #E52021;
        }

        .logout_icon {
            position: absolute;
            width: 22px;
            right: 0px;
            transform: translate(-8px, 8px);
            top: 0px;
            display: none;
        }

        .card {
            border-radius: 15px;
            /* overflow: hidden; */
        }

        .progress {
            height: 12px;
        }

        .card-img-top {
            height: 25px;
        }

        .card-img-top_01 {
            height: 25px;
        }

        .card_img_02 {
            width: 25px;
            border-radius: 15px;
            margin-top: -15px;
        }

        .card_img_03 {
            width: 25px;
            border-radius: 15px;
            margin-top: -15px;
        }

        .w-85 {
            width: 25px;
        }

        .w-35 {
            width: 20px;
        }

        .fs-15 {
            font-size: 12px;
        }

        .fs-12 {
            font-size: 12px;
            color: #1C274C;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar - col-md-2 -->
            <!-- <div class="col-md-2 sidebar">
                        <h5 class="px-3 mb-4">Navigation</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-people me-2"></i> Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-server me-2"></i> Servers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-list-check me-2"></i> Logs</a>
                            </li>
                        </ul>
                    </div> -->

            <!-- Main Content - col-md-10 -->
            <div class="col-md-12">
                <!-- Top Row - 3 columns -->
                <div class="row mb-4">
                    <!-- Server Status - col-md-4 -->
                    <div class="col-md-4">
                        <h5 class="mb-4">Server Status</h5>
                        <div class="dashboard-card">

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-6 col-12 border-end">
                                    
                                    <img src="{{ asset('assets/img/server_img_01.png') }}" class="server-icon" alt="Server">
                                    <h6 class="fs-22 mb-0">ServerName</h6>
                                    <p>Status &nbsp; &nbsp; <span class="text-success">Usage</span> <span
                                            class="txt_percent">75%</span></p>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-end">
                                    <img src="{{ asset('assets/img/server_img_02.png') }}" class="server-icon" alt="CPU">
                                    <h6 class="fs-22">CPU - <span class="text-success">i9</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-end">
                                    <img src="{{ asset('assets/img/server_img_03.png') }}" class="server-icon" alt="RAM">
                                    <h6 class="fs-22">RAM <span class="text-success">4TB</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <img src="{{ asset('assets/img/server_img_04.png') }}" class="server-icon" alt="HD">
                                    <h6 class="fs-22">HD <span class="text-success">800TB</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon" alt="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dashboard-card p-2">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-end">
                                            <img src="{{ asset('assets/img/api_img.png') }}" class="img-fluid w-85 m-auto d-flex"
                                                alt="">
                                            <h3 class="mb-0 " style="
    font-size: 12px;
">API Status</h3>
                                            <div class="mb-0">
                                                <p class="mb-0">21 API <span class="text-success">ON</span></p>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <h2 class="mb-0 " style="
    font-size: 15px;
">API Status</h2>
                                            <div class="mb-1" style="margin-bottom: 10px;">
                                                <h3 style="
    font-size: 10px;
">Total APIs: &nbsp; &nbsp; <span
                                                        class="text-success"> 21 </span>
                                                </h3>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-column align-items-center">
                                                    <span style="font-size: 12px;"> Online</span>
                                                    <span class="text-success" style="font-size: 15px;">15</span>

                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <span style="font-size: 11px;"> Offline</span>
                                                    <span class="text-danger" style="font-size: 15px;">6</span>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon" alt="">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="dashboard-card p-2">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-end">
                                            <img src="{{ asset('assets/img/lock_img.png') }}" class="img-fluid w-85 m-auto d-flex"
                                                alt="">
                                            <h3 class="mb-0 " style="font-size: 12px;">OTP Status </h3>
                                            <div class="mb-0">
                                                <h3 class="mb-0" style="font-size: 12px;">Status &nbsp; &nbsp; <span
                                                        class="text-success">ON</span></h3>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <h2 class="mb-0" style="font-size: 12px;">Options</h2>
                                            <div class="mb-3">
                                                <h3 style="font-size: 14px;">Status &nbsp; &nbsp; <span
                                                        class="text-success"> ON </span></h3>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="{{ asset('assets/img/play_icon_01.png') }}" class="img-fluid w-35" alt="">
                                                <img src="{{ asset('assets/img/play_icon_02.png') }}" class="img-fluid w-35" alt="">
                                                <img src="{{ asset('assets/img/play_icon_03.png') }}" class="img-fluid w-35" alt="">

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon" alt="">

                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- API Status - col-md-4 -->
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <h5 class="mb-4">Admins</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}" class="card-img-top" alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}" class="img-fluid card_img_02"
                                                alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h5 class="card-title mb-0">Owner Name</h5>
                                            <p class="card-text">Owner -Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}" class="card-img-top" alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}" class="img-fluid card_img_02"
                                                alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h5 class="card-title mb-0 mb-0">Owner Name</h5>
                                            <p class="card-text mb-0">Owner -Admin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}" class="card-img-top card-img-top_01"
                                            alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}" class="img-fluid card_img_03"
                                                alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0 mb-0">Owner Name</h6>
                                            <p class="card-text mb-0">Autor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }} " class="card-img-top card-img-top_01"
                                            alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}" class="img-fluid card_img_03"
                                                alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0 mb-0">Owner Name</h6>
                                            <p class="card-text mb-0">Autor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}" class="card-img-top card-img-top_01"
                                            alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}" class="img-fluid card_img_03"
                                                alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0">Owner Name</h6>
                                            <p class="card-text">Autor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <h3 class="mb-4">System Logs</h3>
                            <div class="p-3" style="background: #F2F2F2; border-radius: 12px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/img_profile.png') }}" class="img-fluid rounded-circle "
                                            style="width: 25px;" alt="">
                                        <div class="profile_txt mx-2">
                                            <h5 class="mb-0 fs-15">Admin Name</h5>
                                            <p class="mb-0 fs-12">Autor</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Task</h5>
                                            <p class="mb-0 fs-12">Edit Surveys</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Login</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Logout</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-3" style="background: #F2F2F2; border-radius: 12px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/img_profile.png') }}" class="img-fluid rounded-circle "
                                            style="width: 25px;" alt="">
                                        <div class="profile_txt mx-2">
                                            <h5 class="mb-0 fs-15">Admin Name</h5>
                                            <p class="mb-0 fs-12">Autor</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Task</h5>
                                            <p class="mb-0 fs-12">Edit Surveys</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Login</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Logout</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-3" style="background: #F2F2F2; border-radius: 12px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/img_profile.png') }}" class="img-fluid rounded-circle "
                                            style="width: 25px;" alt="">
                                        <div class="profile_txt mx-2">
                                            <h5 class="mb-0 fs-15">Admin Name</h5>
                                            <p class="mb-0 fs-12">Autor</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Task</h5>
                                            <p class="mb-0 fs-12">Edit Surveys</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Login</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Logout</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-3" style="background: #F2F2F2; border-radius: 12px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/img_profile.png') }}" class="img-fluid rounded-circle "
                                            style="width: 25px;" alt="">
                                        <div class="profile_txt mx-2">
                                            <h5 class="mb-0 fs-15">Admin Name</h5>
                                            <p class="mb-0 fs-12">Autor</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Task</h5>
                                            <p class="mb-0 fs-12">Edit Surveys</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Login</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="profile_txt">
                                            <h5 class="mb-0 fs-15">Logout</h5>
                                            <p class="mb-0 fs-12">Date & Time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                

            </div>
        </div>
    </div>


    <div class="container-fluid p-3" style="background-color: #f6f7fb;">
        <div class="row g-3">

            <!-- Left: Country List -->
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="bg-white p-3 rounded shadow-sm">
                    <h6 class="fw-bold">Our Visitor</h6>
                    <p class="text-muted small mb-3">Countries List</p>

                    <!-- One user row example -->

                    <div class="row mt-3 align-items-center">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/img/img_profile.png') }}" class="rounded-circle"
                                style="width: 25px; display: flex; margin: auto;" alt="avatar">
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold">Kurdistan</div>
                                <div class="d-flex">
                                    <span class="text-primary fw-semibold me-2">1.258</span>
                                    <span class="text-danger fw-semibold">1.325</span>
                                </div>
                            </div>
                            <div class="progress mt-1" style="height: 6px; background-color: #e5e5e5;">
                                <div class="progress-bar" style="width: 30%; background-color: tomato;"></div>
                            </div>
                            <small class="text-muted">Name of cities will appear here</small>
                        </div>






                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/img/img_profile.png') }}" class="rounded-circle"
                                style="width: 25px; display: flex; margin: auto;" alt="avatar">
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold">Kurdistan</div>
                                <div class="d-flex">
                                    <span class="text-primary fw-semibold me-2">1.258</span>
                                    <span class="text-danger fw-semibold">1.325</span>
                                </div>
                            </div>
                            <div class="progress mt-1" style="height: 6px; background-color: #e5e5e5;">
                                <div class="progress-bar" style="width: 30%; background-color: tomato;"></div>
                            </div>
                            <small class="text-muted">Name of cities will appear here</small>
                        </div>






                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/img/img_profile.png') }}" class="rounded-circle"
                                style="width: 25px; display: flex; margin: auto;" alt="avatar">
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold">Kurdistan</div>
                                <div class="d-flex">
                                    <span class="text-primary fw-semibold me-2">1.258</span>
                                    <span class="text-danger fw-semibold">1.325</span>
                                </div>
                            </div>
                            <div class="progress mt-1" style="height: 6px; background-color: #e5e5e5;">
                                <div class="progress-bar" style="width: 30%; background-color: tomato;"></div>
                            </div>
                            <small class="text-muted">Name of cities will appear here</small>
                        </div>






                    </div>
                </div>

                <!-- Duplicate the above div for more rows if needed -->
            </div>


            <!-- Traffic Card -->
            <div class="col-xl-2 col-lg-6 col-md-6">
                <div class="bg-white p-3 rounded shadow-sm">
                    <h6 class="fw-bold">Traffic</h6>
                    <div class="mt-3">
                        <div class="mb-5">
                            <div class="fw-bold text-primary">27 <small class="text-muted">September 2019</small></div>
                            <div class="progress mt-3" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: 80%;"></div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold text-primary">26 <small class="text-muted">September 2019</small></div>
                            <div class="progress mt-3" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: 65%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="fw-bold text-primary">25 <small class="text-muted">September 2019</small></div>
                            <div class="progress mt-3" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: 50%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- App Sections -->
            <div class="col-xl-2 col-lg-6 col-md-6">
                <div class="bg-white p-3 rounded shadow-sm">
                    <h6 class="fw-bold">App Sections</h6>
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/img/img-01.png') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">YekBun App</div>
                    </div>
                    <div class="small">
                        <div class="d-flex justify-content-between mb-1"><span>News - Feeds</span><span>25%</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-purple" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="small mt-2">
                        <div class="d-flex justify-content-between mb-1"><span>Multimedia - Video</span><span>25%</span>
                        </div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-purple" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="small mt-2">
                        <div class="d-flex justify-content-between mb-1"><span>Multimedia - Music</span><span>25%</span>
                        </div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-purple" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="small mt-2">
                        <div class="d-flex justify-content-between mb-1"><span>Multimedia - Music</span><span>25%</span>
                        </div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-purple" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="small mt-2">
                        <div class="d-flex justify-content-between mb-1"><span>Multimedia - Music</span><span>25%</span>
                        </div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-purple" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Android Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6">
                <div class="bg-white p-3 rounded shadow-sm">
                    <h6 class="fw-bold text-center">Android Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-02.png') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">15,258</div>
                    </div>
                    <div class="small">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3  ">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- iOS Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6">
                <div class="bg-white p-3 rounded shadow-sm">
                    <h6 class="fw-bold text-center">iOS Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-03.png') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">15,258</div>
                    </div>
                    <div class="small">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="small mt-3">
                        <div class="d-flex justify-content-between"><span>Device Type</span><span>1,200</span></div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="row text-center">
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/user.png" width="24">
                            Users<br><strong>31,800€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/ticket.png" width="24">
                            Event Ticket<br><strong>0.00€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/music.png" width="24">
                            Playlist<br><strong>31,800€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/lock.png" width="24">
                            Market<br><strong>0.00€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/shop.png" width="24">
                            Shops<br><strong>0.00€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/ad.png" width="24"> Google
                            Ads<br><strong>0.00€</strong></div>
                        <div class="col"><img src="https://img.icons8.com/ios-filled/50/advertising.png"
                                width="24"> User Ads<br><strong>0.00€</strong></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-9">
                            <canvas id="incomeBarChart" height="150"></canvas>
                        </div>
                        <div class="col-md-3">
                            <h6 class="fw-bold">Income Charts</h6>
                            <canvas id="incomeDonutChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const barCtx = document.getElementById('incomeBarChart').getContext('2d');
        const donutCtx = document.getElementById('incomeDonutChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                        label: 'Users',
                        backgroundColor: '#ff5722',
                        borderRadius: 8,
                        data: [60000, 58000, 61000, 59000, 62000, 61500, 60000]
                    },
                    {
                        label: 'Events',
                        backgroundColor: '#03a9f4',
                        borderRadius: 8,
                        data: [30000, 31000, 29000, 32000, 33000, 34000, 32000]
                    },
                    {
                        label: 'Playlist',
                        backgroundColor: '#9c27b0',
                        borderRadius: 8,
                        data: [20000, 21000, 19000, 23000, 24000, 25000, 22000]
                    },
                    {
                        label: 'Market',
                        backgroundColor: '#4caf50',
                        borderRadius: 8,
                        data: [10000, 10500, 9500, 11000, 11500, 12000, 11000]
                    },
                    {
                        label: 'Shops',
                        backgroundColor: '#ffc107',
                        borderRadius: 8,
                        data: [8000, 8500, 7500, 9000, 9500, 10000, 9500]
                    },
                    {
                        label: 'Google Ads',
                        backgroundColor: '#2196f3',
                        borderRadius: 8,
                        data: [5000, 5500, 4800, 6000, 6200, 6500, 6000]
                    },
                    {
                        label: 'User Ads',
                        backgroundColor: '#e91e63',
                        borderRadius: 8,
                        data: [7000, 7500, 6900, 8000, 8200, 8500, 8100]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 10,
                            padding: 20,
                            color: '#333',
                            font: {
                                size: 12,
                                family: 'sans-serif'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#333',
                        bodyColor: '#555',
                        borderColor: '#eee',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 4
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#888',
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        stacked: true,
                        grid: {
                            color: '#f0f0f0'
                        },
                        ticks: {
                            color: '#aaa',
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });


        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Users', 'Events', 'Playlist', 'Market', 'Shops', 'Google Ads', 'User Ads'],
                datasets: [{
                    data: [60000, 30000, 20000, 10000, 8000, 5000, 7000],
                    backgroundColor: ['#ff5722', '#03a9f4', '#9c27b0', '#4caf50', '#ffc107', '#2196f3',
                        '#e91e63'
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 10
                        }
                    }
                },
                cutout: '60%'
            }
        });
    </script>
@endsection
