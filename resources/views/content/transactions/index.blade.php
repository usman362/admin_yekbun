@extends('layouts/layoutMaster')

@section('title', 'Income')

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
<style>
    .card {
        font-family: 'Genos';
    }

    .transaction-icons img {
        width: 100%;
        height: 50px;
        margin: 0 auto;
    }

    .transaction-icons h4 {
        margin: 0;
        font-size: 20px;
        text-align: center;
    }

    .transaction-icons p {
        font-size: 18px;
        text-align: center;
        margin: 0;
    }

    .transaction-icons i {
        font-size: 14px;
    }

    .transaction-icons {
        padding: 12px 38px 0px 38px;
        width: 100%;
        border-right: 2px solid #F2F2F2;
    }

    .transaction-icons:last-child {
        border-right: none !important;
    }

    .nav-pills .nav-link {
        font-size: 16px !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .nav-link.active:hover,
    .nav-pills .nav-link.active:focus {
        background-color: transparent !important;
        color: #000 !important;
        font-weight: bold !important;
        box-shadow: none !important;
    }

    .legend-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 40px;
        max-width: 300px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #555;
    }

    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin-right: 8px;
    }

    .legend-percentage {
        margin-left: auto;
    }

    .divider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        width: 1px;
        background: #ddd;
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

    .card,
    .modal {
        font-family: 'Genos';
    }

    .transaction-icons img {
        width: 100%;
        height: 50px;
        margin: 0 auto;
    }

    .transaction-icons h4 {
        margin: 0;
        font-size: 20px;
        text-align: center;
    }

    .transaction-icons p {
        font-size: 18px;
        text-align: center;
        margin: 0;
    }

    .transaction-icons i {
        font-size: 14px;
    }

    .transaction-icons {
        padding: 12px 38px 0px 38px;
        width: 100%;
        border-right: 2px solid #F2F2F2;
    }

    .transaction-icons:last-child {
        border-right: none !important;
    }

    .nav-pills .nav-link {
        font-size: 16px !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .nav-link.active:hover,
    .nav-pills .nav-link.active:focus {
        background-color: transparent !important;
        color: #000 !important;
        font-weight: bold !important;
        box-shadow: none !important;
    }

    .line-height-1 {
        line-height: 1 !important;
    }

    .user-area span {
        font-size: 14px;
    }

    .user-area img {
        width: 10px;
        height: 10px;
        margin: 4px 2px 0 2px;
    }

    .user-area .user-avatar {
        width: 28px;
        height: 28px;
        border-radius: 30px;
    }

    .user-area span {
        font-size: 12px;
        font-weight: 500;
        margin-top: 2px;
    }
    
@media (max-width: 576px) {
    .transaction-icons {
        flex: 1 1 100%;
        text-align: center;
        border-right: none !important;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }

    .pb-2.pt-2.d-flex {
        flex-direction: column;
        align-items: center;
        width: 100% !important;
        gap: 15px;
    }

    .user_search_icons {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .user_search_icons > div:first-child {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user_search_icons > div:last-child {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .user_search_icons input {
        width: 100%;
    }
}


</style>
@endsection

@section('content')
<h5 class="m-0">
    <strong style="font-size: 25px;">Income</strong><br>
    <small class="text-muted"> <span style="
    font-size: 16px;
    font-weight: 500;
    margin-top: 2px;
">Income
            Overview </span></small>
</h5>
<div class="card" style="margin-top: 15px;">
    <div class="pb-2 pt-2 d-flex">

        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-users.svg') }}" alt="">
            <h4>Users</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-event-ticket.svg') }}" alt="">
            <h4>Event Ticket</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-playlist.svg') }}" alt="">
            <h4>Playlist</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-market.svg') }}" alt="">
            <h4>Market</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-shops.svg') }}" alt="">
            <h4>Shops</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-google-ads.svg') }}" alt="">
            <h4>Google Ads</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
        <div class="transaction-icons">
            <img src="{{ asset('assets/svg/transactions-user-ads.svg') }}" alt="">
            <h4>User Ads</h4>
            <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
        </div>
    </div>
</div>
<!-- Basic Bootstrap Table -->
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
                <div class="divider" style="
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 1px;
            background: #ddd;
        "></div>

                <div class="legend-container" style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 40px;
            max-width: 300px;
        ">
                    <div class="legend-item">
                        <div class="legend-color" style="background:#ff4b4b;"></div> Users <span class="legend-percentage">46%</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background:#6755ef;"></div> Service <span class="legend-percentage">46%</span>
                    </div>

                    <div class="legend-item">
                        <div class="legend-color" style="background:#46b6fe;"></div> Events <span class="legend-percentage">46%</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background:#ff7070;"></div> Bazaar <span class="legend-percentage">46%</span>
                    </div>

                    <div class="legend-item">
                        <div class="legend-color" style="background:#3ddb60;"></div> Playlist <span class="legend-percentage">46%</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background:#46b6fe;"></div> Shops <span class="legend-percentage">46%</span>
                    </div>

                    <div class="legend-item">
                        <div class="legend-color" style="background:#c94dd8;"></div> User Ads <span class="legend-percentage">46%</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background:#6755ef;"></div> Sympathy <span class="legend-percentage">46%</span>
                    </div>

                    <div class="legend-item">
                        <div class="legend-color" style="background:#ffaa46;"></div> Google Ads <span class="legend-percentage">46%</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background:#3ddb60;"></div> Channels <span class="legend-percentage">46%</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="card mt-3">
    {{-- <h5 class="card-header">Table Basic</h5> --}}
    <ul class="nav nav-pills mt-2" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Daily Income</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly
                Income</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Yearly Income</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 15px;">#</th>
                            <th style="font-size: 15px;">Date</th>
                            <th style="font-size: 15px;">
                                <a data-bs-toggle="modal" href="#upgrade" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Upgrades <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span>
                                </a>
                            </th>
                            <th style="font-size: 15px;">
                                <a data-bs-toggle="modal" href="#music" role="button">
                                    Music <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                </a>
                            </th>

                            <th style="font-size: 15px;">
                                <a data-bs-toggle="modal" href="#events" role="button">Events <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a>
                            </th>

                            <th style="font-size: 15px;">
                                <a data-bs-toggle="modal" href="#service" role="button">Services <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a>
                            </th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#bazar" role="button">Bazaar <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#shop" role="button">Shops <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#chanel" role="button">Channels <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#sympathy" role="button">Sympathy <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#g_ads" role="button">G-Ads <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#user_ads" role="button">User-Ads <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;"> </a></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>01</td>
                            <td>01/06/2025</td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                        </tr>

                        <!-- Total Block -->
                        <tr>
                            <td colspan="12">
                                <div style="margin-top: 20px; width: 88%; margin-left: auto; background: #f8f9fa; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); color: #95b0e3;">
                                    <div class="row text-center gx-0 gy-2 px-3 py-3">
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 15px;">#</th>
                            <th style="font-size: 15px;">Date</th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#upgrade" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Upgrades
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span>
                                </a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#music" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Music
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span>
                                </a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#events" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Events
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#service" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Services
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#bazar" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Bazaar
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#shop" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Shops
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#chanel" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Channels
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#sympathy" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Sympathy
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#g_ads" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        G-Ads
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#user_ads" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        User-Ads
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>01</td>
                            <td>01/06/2025</td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                        </tr>

                        <!-- Total Row -->
                        <tr>
                            <td colspan="12">
                                <div style="margin-top: 20px; width: 88%; margin-left: auto; background: #f8f9fa; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); color: #95b0e3;">
                                    <div class="row text-center gx-0 gy-2 px-3 py-3">
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- yearly  -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 15px;">#</th>
                            <th style="font-size: 15px;">Date</th>
                            <th style="font-size: 15px;"> <a data-bs-toggle="modal" href="#upgrade" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Upgrades
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span>
                                </a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#music" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Music
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span> </a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#events" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Events
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#service" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Services
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#bazar" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Bazaar
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#shop" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Shops
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#chanel" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Channels
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#sympathy" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        Sympathy
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#g_ads" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        G-Ads
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                            <th style="font-size: 15px;"><a data-bs-toggle="modal" href="#user_ads" role="button">
                                    <span style="display: inline-flex; align-items: center; gap: 5px;">
                                        User-Ads
                                        <img src="{{ asset('assets/svg/arrow.svg') }}" style="width: 16px; height: 16px;">
                                    </span></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>01</td>
                            <td>01/06/2025</td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>2 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                            <td><strong>150,00€</strong><br><small>10 Transactions</small></td>
                        </tr>

                        <!-- Total Row -->
                        <tr>
                            <td colspan="12">
                                <div style="margin-top: 20px; width: 88%; margin-left: auto; background: #f8f9fa; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); color: #95b0e3;">
                                    <div class="row text-center gx-0 gy-2 px-3 py-3">
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                        <div class="col"><strong>Total</strong>
                                            <p class="m-0">150,00€</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- <td colspan="12">
    <div style="margin-top: 20px; width: 88%; margin-left: auto;  background: #f8f9fa; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); color: #95b0e3;">
        <div class="row text-center gx-0 gy-2 px-3 py-3" style="margin-left: 0px;">



            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>

            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
            <div class="col">
                <strong>Total</strong>
                <p class="m-0">150,00€</p>
            </div>
        </div>
    </div>
</td> -->

<!-- upgrade start -->
<div class="modal fade" id="upgrade" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/transactions-users.svg') }}" alt="">
                    <div>
                        <h4 style="margin: 0;">Users Upgrade</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 20px ">User Type</th>
                                <th style="font-size: 20px ">Transaction</th>
                                <th style="font-size: 20px ">Bank Transfer</th>
                                <th style="font-size: 20px ">PayPal</th>
                                <th style="font-size: 20px ">Apple Pay</th>
                                <th style="font-size: 20px ">Google Pay</th>
                                <th style="font-size: 20px ">Options</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex">
                                        <img class="user-avatar" src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                            alt="educated">
                                        <div>
                                            <h5 class="m-0"><strong>Educated User</strong></h5>
                                            <div class="d-flex">
                                                <span>125k Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>150</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>50</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>22</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                  <small>view transaction</small>
                                        </td>
                            </tr>
                            <tr>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex">
                                        <img class="user-avatar" src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                            alt="">
                                        <div>
                                            <h5 class="m-0"><strong>Caltivated User</strong></h5>
                                            <div class="d-flex">
                                                <span>125k Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>150</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>50</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>22</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                       <small>view transaction</small>
                                    <!-- <a href="javascript:void(0)"><img class="w-80"
                                            src="{{ asset('assets/svg/eye.svg') }}" alt="view"></a> -->
                                        </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  upgrade end -->
<!-- Music start -->
<div class="modal fade" id="music" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p> 0,00€<span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/threelines.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Music Playlist</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 20px ">Seervice Type</th>
                                <th style="font-size: 20px ">Transaction</th>
                                <th style="font-size: 20px ">Bank Transfer</th>
                                <th style="font-size: 20px ">PayPal</th>
                                <th style="font-size: 20px ">Apple Pay</th>
                                <th style="font-size: 20px ">Google Pay</th>
                                <th style="font-size: 20px ">Options</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex">
                                        <img class="user-avatar" src="{{ asset('assets/svg/playlist.svg') }}" alt="educated" style="border-radius: 0;">
                                        <div>
                                            <h5 class="m-0"><strong>Playlist</strong></h5>
                                            <div class="d-flex">
                                                <span>125k purchase</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>150</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>50</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>22</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="line-height-1 user-area">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="m-0 d-flex align-items-center">
                                                <strong>10</strong>
                                                <img src="{{ asset('assets/svg/arrow2.svg') }}" alt="arrow2" style="height: 16px; width: 16px; margin-left: 5px;">
                                            </h5>
                                            <div>
                                                <span>7100,500,95€</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                       <small>view transaction</small>
                                    <!-- <a href="javascript:void(0)"><img class="w-80"
                                            src="{{ asset('assets/svg/eye.svg') }}" alt="view"></a> -->
                                        </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  music end -->
<!-- events start -->
<div class="modal fade" id="events" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€<span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/events_tickets.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Events & Tickets</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  events end -->
  <!-- service start -->
<div class="modal fade" id="service" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/service.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Services</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  services end -->
<!-- bazar start -->
<div class="modal fade" id="bazar" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/bazar.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Bazaar</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  bazar end -->
  <!-- shop start -->
<div class="modal fade" id="shop" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/shop.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Shops</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  shop end -->


 <!-- chanel start -->
<div class="modal fade" id="chanel" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/chanel.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Channels</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  channel end -->
   <!-- sympathy start -->
<div class="modal fade" id="sympathy" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/sympathy.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Sympathy</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  sympathy end -->
     <!-- G-Ads start -->
<div class="modal fade" id="g_ads" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/gads.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">G - Ads</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  G-Ads end -->
    <!-- User-Ads start -->
<div class="modal fade" id="user_ads" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card position-relative" style="margin-top: 15px; box-shadow: none;">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 10px; right: 10px;"></button>

                <div class="pb-2 pt-2 d-flex" style="background-color:whitesmoke; border-radius:20px; width:80%;margin:0 auto; gap: 20px;">

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                        <h4>Paypal</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                        <h4>Apple Pay</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                        <h4>Google Pay</h4>
                        <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                    <div class="transaction-icons" style=" border-right: 1px solid #fff;">
                        <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                        <h4>Transfer</h4>
                        <p>0,00€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
                    </div>

                </div>
            </div>
            <!-- search -->
            <div class="user_search_icons" style="padding-top:20px; display: flex; justify-content: space-between; align-items: center; margin-left: 20px; margin-right: 20px;">

                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/svg/user_ads.svg') }}" alt="3">
                    <div>
                        <h4 style="margin: 0;">Users - Ads</h4>
                        <p style="margin: 0;">01.25- 12.25</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <input type="search" placeholder="sort by date" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                    <input type="search" placeholder="search" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                </div>
            </div>

            <div class="modal-body">
                <div class="come_soon d-flex justify-content-center" style="padding: 25px;">
                    <img src="{{ asset('assets/svg/comsoon.svg') }}" alt="soon" style="width: 250px; height: 210px; max-width: none;">
                </div>
            </div>


        </div>
    </div>
</div>
<!--  G-Ads end -->
  
<!--/ Basic Bootstrap Table -->

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
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

@endsection