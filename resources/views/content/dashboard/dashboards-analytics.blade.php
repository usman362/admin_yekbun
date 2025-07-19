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

        .custom-legend {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            /* Space between legend and chart */
            align-items: center;
            flex-wrap: wrap;
        }

        .custom-legend .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
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
                    <div class="col-md-12">
                        <h5 class="mb-4">Server Status</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-6 col-12 border-end">


                                    <img src="{{ asset('assets/img/server_img_01.png') }}" class="server-icon"
                                        alt="Server">
                                    <h6 class="fs-22 mb-0">ServerName</h6>
                                    <p>Status &nbsp; &nbsp; <span class="text-success">Usage</span> <span
                                            class="txt_percent">75%</span></p>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-end">
                                    <img src="{{ asset('assets/img/server_img_02.png') }}" class="server-icon"
                                        alt="CPU">
                                    <h6 class="fs-22">CPU - <span class="text-success">i9</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-end">
                                    <img src="{{ asset('assets/img/server_img_03.png') }}" class="server-icon"
                                        alt="RAM">
                                    <h6 class="fs-22">RAM <span class="text-success">4TB</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <img src="{{ asset('assets/img/server_img_04.png') }}" class="server-icon"
                                        alt="HD">
                                    <h6 class="fs-22">HD <span class="text-success">800TB</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 40%; background: #3AACE6; border-radius: 50px;" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon"
                                alt="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dashboard-card p-2">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-end">
                                            <img src="{{ asset('assets/img/api_img.png') }}"
                                                class="img-fluid w-85 m-auto d-flex" alt="">
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
                                    <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon"
                                        alt="">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="dashboard-card p-2">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-end">
                                            <img src="{{ asset('assets/img/lock_img.svg') }}"
                                                class="img-fluid w-85 m-auto d-flex" alt="">
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
                                                <img src="{{ asset('assets/img/play_icon_01.png') }}"
                                                    class="img-fluid w-35" alt="">
                                                <img src="{{ asset('assets/img/play_icon_02.png') }}"
                                                    class="img-fluid w-35" alt="">
                                                <img src="{{ asset('assets/img/play_icon_03.png') }}"
                                                    class="img-fluid w-35" alt="">

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img/logout_icon.png') }}" class="img-fluid logout_icon"
                                        alt="">

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
                                        <img src="{{ asset('assets/img/card_img_01.svg') }}" class="card-img-top"
                                            alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}"
                                                class="img-fluid card_img_02" alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h5 class="card-title mb-0">Owner Name</h5>
                                            <p class="card-text">Owner -Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.svg') }}" class="card-img-top"
                                            alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}"
                                                class="img-fluid card_img_02" alt="">
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
                                        <img src="{{ asset('assets/img/card_img_01.png') }}"
                                            class="card-img-top card-img-top_01" alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }} class=" img-fluid
                                                card_img_03" alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0 mb-0">Owner Name</h6>
                                            <p class="card-text mb-0">Autor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}"
                                            class="card-img-top card-img-top_01" alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}"
                                                class="img-fluid card_img_03" alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0 mb-0">Owner Name</h6>
                                            <p class="card-text mb-0">Autor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <img src="{{ asset('assets/img/card_img_01.png') }}"
                                            class="card-img-top card-img-top_01" alt="...">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/card_img_02.png') }}"
                                                class="img-fluid card_img_03" alt="">
                                        </div>
                                        <div class="card-body pt-2 pb-2 text-center">
                                            <h6 class="card-title mb-0">Owner Name</h6>
                                            <p class="card-text">Autor as</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                     <div class="col-md-4">
    <div class="dashboard-card">
        <h3 class="mb-4">System Logs</h3>

        @forelse($logs as $log)
        <div class="p-3 {{ !$loop->first ? 'mt-3' : '' }}" style="background: #F2F2F2; border-radius: 12px;">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/img/img_profile.png') }}"
                         class="img-fluid rounded-circle" style="width: 25px;" alt="">
                    <div class="profile_txt mx-2">
                     <h5 class="mb-0 fs-15">{!! optional($log->causer)->name ?? 'System' !!}</h5>

                  <p class="mb-0 fs-12">{{ class_basename($log->causer_type ?? '') ?: 'N/A' }}</p>

                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="profile_txt">
                        <h5 class="mb-0 fs-15">Task</h5>
                        <p class="mb-0 fs-12">{!! $log->description !!}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="profile_txt">
                        <h5 class="mb-0 fs-15">Login</h5>
                        <p class="mb-0 fs-12">{{ $log->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="profile_txt">
                        <h5 class="mb-0 fs-15">Logout</h5>
                        <p class="mb-0 fs-12">-</p> {{-- Only available if you log logout events --}}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">No logs found.</p>
        @endforelse

    </div>
</div>



                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid p-3" style="background-color: #f6f7fb;">
        <div class="row g-3">

            <!-- Left: Country List -->
            <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold">Our Visitor</h6>
                    <p class="text-muted small mb-3">Countries List</p>

                    @foreach ($visitors as $country => $data)
                        @php
                            $count = $data['count'];
                            $cityNames = implode(', ', $data['cities']);
                            $progressPercent = $totalVisitors > 0 ? round(($count / $totalVisitors) * 100) : 0;
                            $barColor = [
                                'tomato',
                                'teal',
                                'purple',
                                'orange',
                                'lime',
                                'navy',
                                'crimson',
                                'gold',
                                'skyblue',
                                'indigo',
                            ][$loop->index % 10];
                        @endphp
                        <div class="row mt-3 align-items-center">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/img/img_profile.svg') }}" class="rounded-circle"
                                    style="width: 25px; display: flex; margin: auto;" alt="avatar">
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-semibold">{{ $country }}</div>
                                    <div class="text-primary fw-semibold">{{ number_format($count) }}</div>
                                </div>
                                <div class="progress mt-1" style="height: 6px; background-color: #e5e5e5;">
                                    <div class="progress-bar"
                                        style="width: {{ $progressPercent }}%; background-color: {{ $barColor }};">
                                    </div>
                                </div>
                                <small class="text-muted">
                                    {{ $cityNames ?: 'No cities recorded' }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



            <!-- Traffic Card -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
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
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold">App Sections</h6>
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/img/img-01.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">YekBun App</div>
                    </div>

                    @foreach ($sectionsWithPercentage as $section)
                        <div class="small mt-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span>{{ $section['label'] }}</span>
                                <span>{{ $section['percentage'] }}%</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar {{ $section['color'] }}"
                                    style="width: {{ $section['percentage'] }}%;"></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


            <!-- Android Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold text-center">Android Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-02.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">{{ number_format($totalAndroidDevices) }}</div>
                    </div>

                    @foreach ($deviceModels as $model)
                        @php
                            $percentage =
                                $totalAndroidDevices > 0 ? round(($model->total / $totalAndroidDevices) * 100) : 0;
                        @endphp
                        <div class="small mt-3">
                            <div class="d-flex justify-content-between">
                                <span>{{ $model->device_model ?: 'Unknown' }}</span>
                                <span>{{ number_format($model->total) }}</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: {{ $percentage }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- iOS Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold text-center">iOS Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-03.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">{{ number_format($totalIosDevices) }}</div>
                    </div>

                    @foreach ($iosDeviceModels as $model)
                        @php
                            $percentage = $totalIosDevices > 0 ? round(($model->total / $totalIosDevices) * 100) : 0;
                        @endphp
                        <div class="small mt-3">
                            <div class="d-flex justify-content-between">
                                <span>{{ $model->device_model ?: 'Unknown' }}</span>
                                <span>{{ number_format($model->total) }}</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: {{ $percentage }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
    <div class="container-fluid py-3">

        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-0">Income views</h3>
                <p class="mb-0">All Sections</p>
            </div>
            <div class="col-md-8">
                <div class="bg-white p-3 rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-18.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Users</h5>
                            <p class="mb-0">31,863€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-19.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Event Ticket</h5>
                            <p class="mb-0">0,00€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-20.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Playlist</h5>
                            <p class="mb-0">31,863€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-21.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Market</h5>
                            <p class="mb-0">0,00€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-22.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Shops</h5>
                            <p class="mb-0">0,00€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-23.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">Google Ads</h5>
                            <p class="mb-0">0,00€ 25%</p>
                        </div>
                        <div class="d-flex pe-3 flex-column align-items-center">
                            <img src="{{ asset('assets/img/img-24.svg') }}" style="width: 25px;" alt="">
                            <h5 class="mb-0">User Ads</h5>
                            <p class="mb-0">0,00€ 25%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-3 rounded shadow-sm" style="height: 100%;"></div>
            </div>
        </div>

        <!-- inco -->
        <div class="card mt-4">
            <div class="row p-3 mt-3">

                <div class="col-md-9">
                    <div class="custom-legend">
                        <span><span class="dot" style="background:#E74C3C;"></span> Users</span>
                        <span><span class="dot" style="background:#3498DB;"></span> Tickets</span>
                        <span><span class="dot" style="background:#3ddb60 ;"></span> Playlist</span>
                        <span><span class="dot" style="background:#9B59B6 ;"></span> Market</span>
                        <span><span class="dot" style="background:#3498DB;"></span> Shops</span>
                        <span><span class="dot" style="background:#F39C12;"></span> G-Ads</span>
                        <span><span class="dot" style="background:#A3D5FF;"></span> User Ads</span>
                    </div>

                    <canvas id="multiBarChart" height="150"></canvas>
                </div>
                <div class="col-md-3" style="padding-top: 46px;">
                    <canvas id="incomeDonutChart" height="200"></canvas>

                    <div class="legend-wrapper" style="position: relative; display: flex; justify-content: center;">
                        <div class="divider"
                            style="
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 1px;
            background: #ddd;
        ">
                        </div>

                        <div class="legend-container"
                            style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 40px;
            max-width: 300px;
        ">
                            <div class="legend-item">
                                <div class="legend-color" style="background:#ff4b4b;"></div> Users <span
                                    class="legend-percentage">46%</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color" style="background:#6755ef;"></div> Service <span
                                    class="legend-percentage">46%</span>
                            </div>

                            <div class="legend-item">
                                <div class="legend-color" style="background:#46b6fe;"></div> Events <span
                                    class="legend-percentage">46%</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color" style="background:#ff7070;"></div> Bazaar <span
                                    class="legend-percentage">46%</span>
                            </div>

                            <div class="legend-item">
                                <div class="legend-color" style="background:#3ddb60;"></div> Playlist <span
                                    class="legend-percentage">46%</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color" style="background:#46b6fe;"></div> Shops <span
                                    class="legend-percentage">46%</span>
                            </div>

                            <div class="legend-item">
                                <div class="legend-color" style="background:#c94dd8;"></div> User Ads <span
                                    class="legend-percentage">46%</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color" style="background:#6755ef;"></div> Sympathy <span
                                    class="legend-percentage">46%</span>
                            </div>

                            <div class="legend-item">
                                <div class="legend-color" style="background:#ffaa46;"></div> Google Ads <span
                                    class="legend-percentage">46%</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color" style="background:#3ddb60;"></div> Channels <span
                                    class="legend-percentage">46%</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
    <div class="container-fluid p-3" style="background-color: #f6f7fb;">
        <div class="row g-3">
            <div class="col-md-12">
                <h6 class="fw-bold mb-0">User Charts</h6>
                <p class="text-muted small mb-0">Users, Devices, Countries</p>
            </div>
            <!-- Left: Country List -->
            <div class="col-xl-7 col-lg-6 col-md-12 d-flex">

                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <div class="d-flex align-items-center flex-wrap" style="justify-content: center; gap: 50px;">
                        <div class="d-flex pe-4 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-04.svg') }}" alt="">
                            <h4 class="mb-0 mt-3">Total User</h4>
                            <p>31,863 25% </p>
                        </div>
                        <div class="d-flex pe-4 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-05.svg') }}" alt="">
                            <h4 class="mb-0 mt-3">Educated</h4>
                            <p>31,863 25% </p>
                        </div>
                        <div class="d-flex pe-4 flex-column align-items-center border-end">
                            <img src="{{ asset('assets/img/img-06.svg') }}" alt="">
                            <h4 class="mb-0 mt-3">Cultivated</h4>
                            <p>31,863 25% </p>
                        </div>
                        <div class="d-flex pe-4 flex-column align-items-center">
                            <img src="{{ asset('assets/img/img-07.svg') }}" alt="">
                            <h4 class="mb-0 mt-3">Academic</h4>
                            <p>31,863 25% </p>
                        </div>
                    </div>
                    <!-- One user row example -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="left_side_box">
                                <h4 class="mb-0 text-center">Ku-Rojava</h4>
                                <div class="d-flex text-center justify-content-center align-items-center">
                                    <p class="mb-0"><img src="{{ asset('assets/img/img-08.svg') }}"
                                            alt="">31,863 <img src="{{ asset('assets/img/img-09.svg') }}"
                                            alt="">15,125<img src="{{ asset('assets/img/img-10.svg') }}"
                                            alt="">15,235</p>
                                </div>
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-11.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-15.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="left_side_box">
                                <h4 class="mb-0 text-center">Ku-Rojava</h4>
                                <div class="d-flex text-center justify-content-center align-items-center">
                                    <p class="mb-0"><img src="{{ asset('assets/img/img-08.svg') }}"
                                            alt="">31,863 <img src="{{ asset('assets/img/img-09.svg') }}"
                                            alt="">15,125<img src="{{ asset('assets/img/img-10.svg') }}"
                                            alt="">15,235</p>
                                </div>
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-11.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-15.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="left_side_box">
                                <h4 class="mb-0 text-center">Ku-Rojava</h4>
                                <div class="d-flex text-center justify-content-center align-items-center">
                                    <p class="mb-0"><img src="{{ asset('assets/img/img-08.svg') }}">31,863 <img
                                            src="{{ asset('assets/img/img-09.svg') }}" alt="">15,125<img
                                            src="images/img-10.svg" alt="">15,235</p>
                                </div>
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-11.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-15.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="images/img-12.svg" class="img-fluid" alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="left_side_box">
                                <h4 class="mb-0 text-center">Ku-Rojava</h4>
                                <div class="d-flex text-center justify-content-center align-items-center">
                                    <p class="mb-0"><img src="{{ asset('assets/img/img-08.svg') }}"
                                            alt="">31,863 <img src="{{ asset('assets/img/img-09.svg') }}"
                                            alt="">15,125<img src="{{ asset('assets/img/img-10.svg') }}"
                                            alt="">15,235</p>
                                </div>
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-11.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="bg-white p-3 text-center" style="border-radius: 12px;">
                                            <img src="{{ asset('assets/img/img-15.svg') }}" class="d-flex m-auto"
                                                alt="">
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-12.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 30%; background-color: tomato;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-13.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 90%; background-color: #F1C21B;"></div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <img src="{{ asset('assets/img/img-14.svg') }}" class="img-fluid"
                                                        alt="">
                                                    <span>1258</span>
                                                </div>
                                                <div class="progress mt-1"
                                                    style="height: 6px; background-color: #e5e5e5;">
                                                    <div class="progress-bar"
                                                        style="width: 50%; background-color: #1BC469;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Duplicate the above div for more rows if needed -->
            </div>




            <!-- App Sections -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold">Age and Gender</h6>
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/img/img-16.svg') }}" class="img-fluid">
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="gap: 20px;">
                        <div class="d-flex flex-column align-items-center text-center">
                            <h6 class="mb-0"><i class="bx bxs-circle fs-10"></i>&nbsp; Male</h6>
                            <h6 class="text-center mb-0">{{ $male_account }}</h6>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <h6 class="mb-0"><i class="bx bxs-circle fs-8 "></i>&nbsp; Female</h6>
                            <h6 class="text-center mb-0">{{ $female_account }}</h6>
                        </div>
                    </div>

                    @php
                        $ageColors = [
                            '18-24' => 'bg-primary',
                            '25-34' => 'bg-success',
                            '35-44' => 'bg-warning',
                            '45-64' => 'bg-danger',
                            '65+' => 'bg-info',
                        ];
                    @endphp

                    @foreach ($ageStats as $range => $data)
                        @php
                            $malePercent = $totalUsers > 0 ? round(($data['male'] / $totalUsers) * 100) : 0;
                            $femalePercent = $totalUsers > 0 ? round(($data['female'] / $totalUsers) * 100) : 0;
                            $barWidth = $malePercent + $femalePercent;
                            $barColor = $ageColors[$range] ?? 'bg-secondary';
                        @endphp
                        <div class="small mt-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span>{{ $range }}</span>
                                <div class="d-flex">
                                    <span>{{ $malePercent }}%</span>&nbsp;&nbsp;
                                    <span>{{ $femalePercent }}%</span>
                                </div>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar {{ $barColor }}" style="width: {{ $barWidth }}%;">
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>



            <!-- Android Devices -->
            <div class="col-xl-3 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <div class="p-3" style="background: #F2F2F2; border-radius: 12px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/img_profile.svg') }}" class="img-fluid rounded-circle "
                                    style="width: 25px;" alt="">
                                <div class="profile_txt mx-2">
                                    <h5 class="mb-0 fs-15">Artist Name</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/flag_img.svg') }}"
                                            alt=""> Rojava</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15">Upgrade Date</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/paypal.svg') }}"
                                            alt=""> PayPal</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15"><img src="{{ asset('assets/img/img-06.svg') }}"
                                            style="width: 25px;" alt="">
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 mt-2" style="background: #F2F2F2; border-radius: 12px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/img_profile.svg') }}" class="img-fluid rounded-circle "
                                    style="width: 25px;" alt="">
                                <div class="profile_txt mx-2">
                                    <h5 class="mb-0 fs-15">Artist Name</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/flag_img.svg') }}"
                                            alt=""> Rojava</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15">Upgrade Date</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/paypal.svg') }}"
                                            alt=""> PayPal</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15"><img src="{{ asset('assets/img/img-06.svg') }}"
                                            style="width: 25px;" alt="">
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 mt-2" style="background: #F2F2F2; border-radius: 12px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="images/img_profile.svg" class="img-fluid rounded-circle " style="width: 25px;"
                                    alt="">
                                <div class="profile_txt mx-2">
                                    <h5 class="mb-0 fs-15">Artist Name</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/flag_img.svg') }}"
                                            alt=""> Rojava</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15">Upgrade Date</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/paypal.svg') }}"
                                            alt=""> PayPal</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15"><img src="{{ asset('assets/img/img-06.svg') }}"
                                            style="width: 25px;" alt="">
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 mt-2" style="background: #F2F2F2; border-radius: 12px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="images/img_profile.svg" class="img-fluid rounded-circle " style="width: 25px;"
                                    alt="">
                                <div class="profile_txt mx-2">
                                    <h5 class="mb-0 fs-15">Artist Name</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/flag_img.svg') }}"
                                            alt=""> Rojava</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15">Upgrade Date</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/paypal.svg') }}"
                                            alt=""> PayPal</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15"><img src="{{ asset('assets/img/img-06.svg') }}"
                                            style="width: 25px;" alt="">
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 mt-2" style="background: #F2F2F2; border-radius: 12px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/img_profile.svg') }}" class="img-fluid rounded-circle "
                                    style="width: 25px;" alt="">
                                <div class="profile_txt mx-2">
                                    <h5 class="mb-0 fs-15">Artist Name</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/flag_img.svg') }}"
                                            alt=""> Rojava</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15">Upgrade Date</h5>
                                    <p class="mb-0 fs-12"><img src="{{ asset('assets/img/paypal.svg') }}"
                                            alt=""> PayPal</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="profile_txt">
                                    <h5 class="mb-0 fs-15"><img src="{{ asset('assets/img/img-06.svg') }}"
                                            style="width: 25px;" alt="">
                                    </h5>
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
            <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold">Our Visitor</h6>
                    <p class="text-muted small mb-3">Countries List</p>

                    @foreach ($visitors as $country => $data)
                        @php
                            $count = $data['count'];
                            $cityNames = implode(', ', $data['cities']);
                            $progressPercent = $totalVisitors > 0 ? round(($count / $totalVisitors) * 100) : 0;
                            $barColor = [
                                'tomato',
                                'teal',
                                'purple',
                                'orange',
                                'lime',
                                'navy',
                                'crimson',
                                'gold',
                                'skyblue',
                                'indigo',
                            ][$loop->index % 10];
                        @endphp
                        <div class="row mt-3 align-items-center">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/img/img_profile.svg') }}" class="rounded-circle"
                                    style="width: 25px; display: flex; margin: auto;" alt="avatar">
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-semibold">{{ $country }}</div>
                                    <div class="text-primary fw-semibold">{{ number_format($count) }}</div>
                                </div>
                                <div class="progress mt-1" style="height: 6px; background-color: #e5e5e5;">
                                    <div class="progress-bar"
                                        style="width: {{ $progressPercent }}%; background-color: {{ $barColor }};">
                                    </div>
                                </div>
                                <small class="text-muted">
                                    {{ $cityNames ?: 'No cities recorded' }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Traffic Card -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
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
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold">App Sections</h6>
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/img/img-01.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">YekBun App</div>
                    </div>

                    @foreach ($sectionsWithPercentage as $section)
                        <div class="small mt-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span>{{ $section['label'] }}</span>
                                <span>{{ $section['percentage'] }}%</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar {{ $section['color'] }}"
                                    style="width: {{ $section['percentage'] }}%;"></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


            <!-- Android Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold text-center">Android Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-02.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">{{ number_format($totalAndroidDevices) }}</div>
                    </div>

                    @foreach ($deviceModels as $model)
                        @php
                            $percentage =
                                $totalAndroidDevices > 0 ? round(($model->total / $totalAndroidDevices) * 100) : 0;
                        @endphp
                        <div class="small mt-3">
                            <div class="d-flex justify-content-between">
                                <span>{{ $model->device_model ?: 'Unknown' }}</span>
                                <span>{{ number_format($model->total) }}</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: {{ $percentage }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- iOS Devices -->
            <!-- iOS Devices -->
            <div class="col-xl-2 col-lg-6 col-md-6 d-flex">
                <div class="bg-white p-3 rounded shadow-sm h-100 w-100">
                    <h6 class="fw-bold text-center">iOS Devices</h6>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/img-03.svg') }}" style="width: 25px;" class="img-fluid">
                        <div class="fw-bold">{{ number_format($totalIosDevices) }}</div>
                    </div>

                    @foreach ($iosDeviceModels as $model)
                        @php
                            $percentage = $totalIosDevices > 0 ? round(($model->total / $totalIosDevices) * 100) : 0;
                        @endphp
                        <div class="small mt-3">
                            <div class="d-flex justify-content-between">
                                <span>{{ $model->device_model ?: 'Unknown' }}</span>
                                <span>{{ number_format($model->total) }}</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: {{ $percentage }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // ================= Donut Chart =================
        const donutCtx = document.getElementById('incomeDonutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: {

                datasets: [{
                    data: [9000, 7000, 15000, 10000, 8000, 5000, 3500],
                    backgroundColor: [
                        '#4caf50', '#46d3f7', '#ff5722', '#46b6fe', '#6755ef',
                        '#f5a623', '#9c27b0',
                    ],
                    borderWidth: 2, // Bold border for separation
                    borderRadius: 15, // Rounded edges for bold look
                    hoverOffset: 10
                }],
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            boxHeight: 12,
                            padding: 10,
                            color: '#555',
                            display: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.parsed.toLocaleString()}€`;
                            }
                        }
                    }
                },
                cutout: '50%',
            }
        });

        // ================= Bar Chart =================
        const ctx = document.getElementById('multiBarChart').getContext('2d');
        const data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            datasets: [{
                    label: 'Users',
                    data: [5000, 5200, 5100, 5300, 5400, 5500, 5600, 5700, 5800, 5900, 6000, 6100],
                    backgroundColor: '#E74C3C'
                },
                {
                    label: 'Tickets',
                    data: [21000, 22000, 21500, 21800, 21900, 22500, 23000, 23200, 23400, 23600, 23800, 24000],
                    backgroundColor: '#3498DB'
                },
                {
                    label: 'Playlist',
                    data: Array(12).fill(60000),
                    backgroundColor: '#2ECC71'
                },
                {
                    label: 'Market',
                    data: [34000, 34200, 34500, 34800, 35000, 35500, 35700, 36000, 36200, 36400, 36600, 36800],
                    backgroundColor: '#9B59B6'
                },
                {
                    label: 'Shops',
                    data: [22000, 22500, 23000, 23500, 24000, 24500, 25000, 25500, 26000, 26500, 27000, 27500],
                    backgroundColor: '#2980B9'
                },
                {
                    label: 'G-Ads',
                    data: Array(12).fill(60000),
                    backgroundColor: '#F39C12'
                },
                {
                    label: 'User-Ads',
                    data: Array(12).fill(60000),
                    backgroundColor: '#A3D5FF'
                },

            ]
        };

        const options = {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y.toLocaleString()}€`;
                        }
                    }
                }
            },
            scales: {
                /* your scales config */
            },
            datasets: {
                bar: {
                    borderRadius: 6,
                    borderWidth: 2
                }
            }
        };


        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>

@endsection
