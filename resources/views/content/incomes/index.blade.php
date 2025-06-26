@extends('layouts/layoutMaster')

@section('title', 'Transaction')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
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
    </style>
@endsection

@section('content')
    <h5 class="m-0">
        <strong style="font-size: 25px;">Transaction</strong><br>
        <small class="text-muted"> <span style="
    font-size: 16px;
    font-weight: 500;
    margin-top: 2px;
">Transaction
                Overview </span></small>
    </h5>

    <div class="card" style="margin-top: 15px">
        <div class="pb-2 pt-2 d-flex">
            <div class="transaction-icons">
                <img src="{{ asset('assets/svg/paypal.svg') }}" alt="">
                <h4>Paypal</h4>
                <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
            </div>
            <div class="transaction-icons">
                <img src="{{ asset('assets/svg/apple.svg') }}" alt="">
                <h4>Apple Pay</h4>
                <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
            </div>
            <div class="transaction-icons">
                <img src="{{ asset('assets/svg/google.svg') }}" alt="">
                <h4>Google Pay</h4>
                <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
            </div>
            <div class="transaction-icons">
                <img src="{{ asset('assets/svg/transfer.svg') }}" alt="">
                <h4>Transfer</h4>
                <p>31,856€ <span class="text-success"><i class="fas fa-arrow-up"></i>25%</span></p>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <ul class="nav nav-pills mt-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-daily-tab" data-bs-toggle="pill" data-bs-target="#pills-daily"
                    type="button" role="tab" aria-controls="pills-daily" aria-selected="true"
                    style="font-size: 22px !important;">Daily Income</button>

            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly"
                    type="button" role="tab" aria-controls="pills-monthly" aria-selected="false"
                    style="font-size: 22px !important;">Monthly
                    Income</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly"
                    type="button" role="tab" aria-controls="pills-yearly" aria-selected="false"
                    style="font-size: 22px !important;">Yearly Income</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-daily" role="tabpanel" aria-labelledby="pills-daily-tab">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 15px;">#</th>
                                <th style="font-size: 15px;">Date</th>
                                <th style="font-size: 15px;">Total Transactions</th>
                                <th style="font-size: 15px;">Bank Transfer</th>
                                <th style="font-size: 15px;"> Paypal</th>
                                <th style="font-size: 15px;">Apple Pay</th>
                                <th style="font-size: 15px;">Google Pay</th>
                                <th style="font-size: 15px;">Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td style="font-size: 15px;">01</td>
                                <td style="font-size: 15px ">Date</td>
                                <td style="font-size: 15px "><a data-bs-toggle="modal" href="#dailyIncome"
                                        role="button">10</a></td>
                                <td style="font-size: 15px ">Bank Transfer</td>
                                <td style="font-size: 15px ">Paypal</td>
                                <td style="font-size: 15px ">Apple Pay</td>
                                <td style="font-size: 15px ">Google Pay</td>
                                <td style="font-size: 15px ">Total€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 15px;">#</th>
                                <th style="font-size: 15px;">Date</th>
                                <th style="font-size: 15px;">Total Transactions</th>
                                <th style="font-size: 15px;">Bank Transfer</th>
                                <th style="font-size: 15px;">Paypal</th>
                                <th style="font-size: 15px;">Apple Pay</th>
                                <th style="font-size: 15px;">Google Pay</th>
                                <th style="font-size: 15px;">Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td style="font-size: 15px;">01</td>
                                <td style="font-size: 15px;">Date</td>
                                <td style="font-size: 15px "><a data-bs-toggle="modal" href="#monthlyIncome"
                                        role="button">10</a></td>
                                <td style="font-size: 15px ">Bank Transfer</td>
                                <td style="font-size: 15px ">Paypal</td>
                                <td style="font-size: 15px ">Apple Pay</td>
                                <td style="font-size: 15px ">Google Pay</td>
                                <td style="font-size: 15px ">Total€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 15px ">#</th>
                                <th style="font-size: 15px ">Date</th>
                                <th style="font-size: 15px ">Total Transactions</th>
                                <th style="font-size: 15px ">Bank Transfer</th>
                                <th style="font-size: 15px ">Paypal</th>
                                <th style="font-size: 15px ">Apple Pay</th>
                                <th style="font-size: 15px ">Google Pay</th>
                                <th style="font-size: 15px ">Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td style="font-size: 15px;">01</td>
                                <td style="font-size: 15px;">Date</td>
                                <td style="font-size: 15px;"><a data-bs-toggle="modal" href="#yearlyIncome"
                                        role="button">10</a></td>
                                <td style="font-size: 15px;">Bank Transfer</td>
                                <td style="font-size: 15px;">Paypal</td>
                                <td style="font-size: 15px;">Apple Pay</td>
                                <td style="font-size: 15px;">Google Pay</td>
                                <td style="font-size: 15px;">Total€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    {{-- Modals --}}

    <div class="modal fade" id="dailyIncome" aria-hidden="true" aria-labelledby="dailyIncomeLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">
                            <strong style="font-size: 25px;">Daily Income</strong><br>
                             
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; top: 15px; right: 20px;"></button>

                        <div class="d-flex align-items-center">

                            <div class="row">
                                <!-- Date Input -->
                                <div class="col-auto" style="border-radius: 10px; position: relative;">
                                    <input type="text" class="form-control form-control-sm datepicker"
                                        placeholder="Select Date" name="duration" id="datepicker"
                                        aria-label="Datepicker" autocomplete="off"
                                        style="padding-right: 40px; height: 32px;" />

                                    <button type="button" onclick="$('.datepicker').daterangepicker('show')"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); border: none; background: transparent; padding: 0; margin: 0; cursor: pointer;">
                                    </button>
                                </div>

                                <!-- Sort by Service Dropdown -->
                                <div class="col-auto d-flex align-items-center ms-3">
                                    <select id="filterService" class="form-select form-select-sm" style="height: 32px;">
                                        <option selected>Sort by Service</option>
                                        <option value="account">Account</option>
                                        <option value="music">Music</option>
                                        <option value="channels">Channels</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Search Button -->
                            <div class="d-flex align-items-center ms-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Search"
                                    style="height: 32px;">
                            </div>

                            <!-- Export Dropdown -->
                            <div class="d-flex align-items-center ms-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownExport" data-bs-toggle="dropdown" aria-expanded="false">
                                        Export
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownExport">
                                        <li><a class="dropdown-item" href="#" id="exportPDF"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="PDF"> PDF</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportCSV"><img
                                                    src="{{ asset('assets/img/file-csv.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="CSV"> CSV</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportPrint"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Print"> Print</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportExcel"><img
                                                    src="{{ asset('assets/img/file-excel.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Excel"> Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-size: 15px;">#</th>
                                        <th style="font-size: 15px;">Order</th>
                                        <th style="font-size: 15px;">Date & Time</th>
                                        <th style="font-size: 15px;">About User</th>
                                        <th style="font-size: 15px;">Service Type</th>
                                        <th style="font-size: 15px;">Payment Type</th>
                                        <th style="font-size: 15px;">Total Paid</th>
                                        <th style="font-size: 15px;">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>01</td>
                                        <td>Order ID</td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                            <small>HH:MM</small>
                                        </td>
                                        <td class="line-height-1 user-area">
                                            <div class="d-flex">
                                                <img class="user-avatar" src="{{ asset('images/user-clips-artist.png') }}"
                                                    alt="">
                                                <div>
                                                    <h5 class="m-0"><strong>Username</strong></h5>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('images/kurdistan-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Rojava . Qamishlo</span>
                                                        <img src="{{ asset('images/germany-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Hannover</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Upgrades</strong></p>
                                            <small>Educated</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Bank Transfer</strong></p>
                                            <small>Transaction ID</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>15,00€</strong></p>
                                            <small>-0% Discount</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><a class="text-body"
                                                    data-bs-placement="top" aria-label="Preview Invoice"
                                                    data-bs-toggle="modal" data-bs-target="#sub-categories"
                                                    data-bs-offset="0,4" href="javascript:void(0)" data-bs-html="true"
                                                    data-bs-original-title="Edit"><img
                                                        src="{{ asset('assets/svg/eye.svg') }}" alt=""></a>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- monthly income --}}
    <div class="modal fade" id="monthlyIncome" aria-hidden="true" aria-labelledby="monthlyIncomeLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">
                            <strong style="font-size: 25px;">Monthly Income</strong><br>
                             
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; top: 15px; right: 20px;"></button>
                        <div class="d-flex align-items-center">

                            <div class="row">
                                <!-- Date Input -->
                                <div class="col-auto" style="border-radius: 10px; position: relative;">
                                    <input type="text" class="form-control form-control-sm datepicker"
                                        placeholder="Select Date" name="duration" id="datepicker"
                                        aria-label="Datepicker" autocomplete="off"
                                        style="padding-right: 40px; height: 32px;" />

                                    <button type="button" onclick="$('.datepicker').daterangepicker('show')"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); border: none; background: transparent; padding: 0; margin: 0; cursor: pointer;">
                                    </button>
                                </div>

                                <!-- Sort by Service Dropdown -->
                                <div class="col-auto d-flex align-items-center ms-3">
                                    <select id="filterService" class="form-select form-select-sm" style="height: 32px;">
                                        <option selected>Sort by Service</option>
                                        <option value="account">Account</option>
                                        <option value="music">Music</option>
                                        <option value="channels">Channels</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Search Button -->
                            <div class="d-flex align-items-center ms-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Search"
                                    style="height: 32px;">
                            </div>

                            <!-- Export Dropdown -->
                            <div class="d-flex align-items-center ms-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownExport" data-bs-toggle="dropdown" aria-expanded="false">
                                        Export
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownExport">
                                        <li><a class="dropdown-item" href="#" id="exportPDF"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="PDF"> PDF</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportCSV"><img
                                                    src="{{ asset('assets/img/file-csv.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="CSV"> CSV</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportPrint"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Print"> Print</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportExcel"><img
                                                    src="{{ asset('assets/img/file-excel.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Excel"> Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-size: 15px;">#</th>
                                        <th style="font-size: 15px;">Order</th>
                                        <th style="font-size: 15px;">Date & Time</th>
                                        <th style="font-size: 15px;">About User</th>
                                        <th style="font-size: 15px;">Service Type</th>
                                        <th style="font-size: 15px;">Payment Type</th>
                                        <th style="font-size: 15px;">Total Paid</th>
                                        <th style="font-size: 15px;">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>01</td>
                                        <td>Order ID</td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                            <small>HH:MM</small>
                                        </td>
                                        <td class="line-height-1 user-area">
                                            <div class="d-flex">
                                                <img class="user-avatar"
                                                    src="{{ asset('images/user-clips-artist.png') }}" alt="">
                                                <div>
                                                    <h5 class="m-0"><strong>Username</strong></h5>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('images/kurdistan-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Rojava . Qamishlo</span>
                                                        <img src="{{ asset('images/germany-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Hannover</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Upgrades</strong></p>
                                            <small>Educated</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Bank Transfer</strong></p>
                                            <small>Transaction ID</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>15,00€</strong></p>
                                            <small>-0% Discount</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><a class="text-body"
                                                    data-bs-placement="top" aria-label="Preview Invoice"
                                                    data-bs-toggle="modal" data-bs-target="#sub-categories"
                                                    data-bs-offset="0,4" href="javascript:void(0)" data-bs-html="true"
                                                    data-bs-original-title="Edit"><img
                                                        src="{{ asset('assets/svg/eye.svg') }}" alt=""></a>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="monthlyIncome2" aria-hidden="true" aria-labelledby="monthlyIncomeLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthlyIncomeLabel2">Transaction List</h5>
                    <button type="button" class="btn-close" data-bs-target="#monthlyIncome" data-bs-toggle="modal"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 15px;">#</th>
                                    <th style="font-size: 15px;">Order</th>
                                    <th style="font-size: 15px;">Date & Time</th>
                                    <th style="font-size: 15px;">About User</th>
                                    <th style="font-size: 15px;">Service Type</th>
                                    <th style="font-size: 15px;">Payment Type</th>
                                    <th style="font-size: 15px;">Total Paid</th>
                                    <th style="font-size: 15px;">Options</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td style="font-size: 20px ">01</td>
                                    <td style="font-size: 20px ">Order ID</td>
                                    <td class="line-height-1" style="font-size: 20px ">
                                        <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                        <small>HH:MM</small>
                                    </td>
                                    <td class="line-height-1 user-area">
                                        <div class="d-flex">
                                            <img class="user-avatar" src="{{ asset('images/user-clips-artist.png') }}"
                                                alt="">
                                            <div>
                                                <h5 class="m-0"><strong>Username</strong></h5>
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/kurdistan-flag-sm.png') }}"
                                                        alt="">
                                                    <span>Rojava . Qamishlo</span>
                                                    <img src="{{ asset('images/germany-flag-sm.png') }}" alt="">
                                                    <span>Hannover</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>Upgrades</strong></p>
                                        <small>Educated</small>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>Paypal</strong></p>
                                        <small>Transaction ID</small>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>15,00€</strong></p>
                                        <small>-0% Discount</small>
                                    </td>
                                    <td><a href="javascript:void(0)"><img class="w-80"
                                                src="{{ asset('assets/svg/eye.svg') }}" alt="view"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- yearly income --}}
    <div class="modal fade" id="yearlyIncome" aria-hidden="true" aria-labelledby="yearlyIncomeLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">
                            <strong style="font-size: 25px;">Yearly Income</strong><br>
                            
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; top: 15px; right: 20px;"></button>
                        <div class="d-flex align-items-center">

                            <div class="row">
                                <!-- Date Input -->
                                <div class="col-auto" style="border-radius: 10px; position: relative;">
                                    <input type="text" class="form-control form-control-sm datepicker"
                                        placeholder="Select Date" name="duration" id="datepicker"
                                        aria-label="Datepicker" autocomplete="off"
                                        style="padding-right: 40px; height: 32px;" />

                                    <button type="button" onclick="$('.datepicker').daterangepicker('show')"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); border: none; background: transparent; padding: 0; margin: 0; cursor: pointer;">
                                    </button>
                                </div>

                                <!-- Sort by Service Dropdown -->
                                <div class="col-auto d-flex align-items-center ms-3">
                                    <select id="filterService" class="form-select form-select-sm" style="height: 32px;">
                                        <option selected>Sort by Service</option>
                                        <option value="account">Account</option>
                                        <option value="music">Music</option>
                                        <option value="channels">Channels</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Search Button -->
                            <div class="d-flex align-items-center ms-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Search"
                                    style="height: 32px;">
                            </div>

                            <!-- Export Dropdown -->
                            <div class="d-flex align-items-center ms-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownExport" data-bs-toggle="dropdown" aria-expanded="false">
                                        Export
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownExport">
                                        <li><a class="dropdown-item" href="#" id="exportPDF"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="PDF"> PDF</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportCSV"><img
                                                    src="{{ asset('assets/img/file-csv.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="CSV"> CSV</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportPrint"><img
                                                    src="{{ asset('assets/img/print.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Print"> Print</a></li>
                                        <li><a class="dropdown-item" href="#" id="exportExcel"><img
                                                    src="{{ asset('assets/img/file-excel.svg') }}" class="me-1"
                                                    style="width: 20px; height: 20px;" alt="Excel"> Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-size: 15px;">#</th>
                                        <th style="font-size: 15px;">Order</th>
                                        <th style="font-size: 15px;">Date & Time</th>
                                        <th style="font-size: 15px;">About User</th>
                                        <th style="font-size: 15px;">Service Type</th>
                                        <th style="font-size: 15px;">Payment Type</th>
                                        <th style="font-size: 15px;">Total Paid</th>
                                        <th style="font-size: 15px;">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>01</td>
                                        <td>Order ID</td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                            <small>HH:MM</small>
                                        </td>
                                        <td class="line-height-1 user-area">
                                            <div class="d-flex">
                                                <img class="user-avatar"
                                                    src="{{ asset('images/user-clips-artist.png') }}" alt="">
                                                <div>
                                                    <h5 class="m-0"><strong>Username</strong></h5>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('images/kurdistan-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Rojava . Qamishlo</span>
                                                        <img src="{{ asset('images/germany-flag-sm.png') }}"
                                                            alt="">
                                                        <span>Hannover</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Upgrades</strong></p>
                                            <small>Educated</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>Bank Transfer</strong></p>
                                            <small>Transaction ID</small>
                                        </td>
                                        <td class="line-height-1">
                                            <p class="m-0"><strong>15,00€</strong></p>
                                            <small>-0% Discount</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><a class="text-body"
                                                    data-bs-placement="top" aria-label="Preview Invoice"
                                                    data-bs-toggle="modal" data-bs-target="#sub-categories"
                                                    data-bs-offset="0,4" href="javascript:void(0)" data-bs-html="true"
                                                    data-bs-original-title="Edit"><img
                                                        src="{{ asset('assets/svg/eye.svg') }}" alt=""></a>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="yearlyIncome2" aria-hidden="true" aria-labelledby="yearlyIncomeLabel2" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="yearlyIncomeLabel2">Transaction List</h5>
                    <button type="button" class="btn-close" data-bs-target="#yearlyIncome" data-bs-toggle="modal"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 15px;">#</th>
                                    <th style="font-size: 15px;">Order</th>
                                    <th style="font-size: 15px;">Date & Time</th>
                                    <th style="font-size: 15px;">About User</th>
                                    <th style="font-size: 15px;">Service Type</th>
                                    <th style="font-size: 15px;">Payment Type</th>
                                    <th style="font-size: 15px;">Total Paid</th>
                                    <th style="font-size: 15px;">Options</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>01</td>
                                    <td>Order ID</td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                        <small>HH:MM</small>
                                    </td>
                                    <td class="line-height-1 user-area">
                                        <div class="d-flex">
                                            <img class="user-avatar" src="{{ asset('images/user-clips-artist.png') }}"
                                                alt="">
                                            <div>
                                                <h5 class="m-0"><strong>Username</strong></h5>
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/kurdistan-flag-sm.png') }}"
                                                        alt="">
                                                    <span>Rojava . Qamishlo</span>
                                                    <img src="{{ asset('images/germany-flag-sm.png') }}" alt="">
                                                    <span>Hannover</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>Upgrades</strong></p>
                                        <small>Educated</small>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>Paypal</strong></p>
                                        <small>Transaction ID</small>
                                    </td>
                                    <td class="line-height-1">
                                        <p class="m-0"><strong>15,00€</strong></p>
                                        <small>-0% Discount</small>
                                    </td>
                                    <td><a href="javascript:void(0)"><img class="w-80"
                                                src="{{ asset('assets/svg/eye.svg') }}" alt="view"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const donutCtx = document.getElementById('incomeDonutChart').getContext('2d');
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
    <script>
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
                    data: [60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000],
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
                    data: [60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000],
                    backgroundColor: '#F39C12'
                },
                {
                    label: 'User-Ads',
                    data: [60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000, 60000],
                    backgroundColor: '#A3D5FF'
                }
            ]
        };

        const options = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                x: {
                    stacked: false,
                    grid: {
                        display: false
                    }
                },
                y: {
                    stacked: false,
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value >= 1000 ? (value / 1000) + 'k' : value;
                        }
                    }
                }
            }
        };

        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Initialize Flatpickr on the start date and end date input fields
        flatpickr("#startDate", {
            dateFormat: "Y-m-d", // Specify the date format
            minDate: "today", // Optional: disable past dates
            maxDate: new Date().fp_incr(365), // Optional: limit to 1 year in the future
            allowInput: true // Allows users to type in the date
        });

        flatpickr("#endDate", {
            dateFormat: "Y-m-d", // Specify the date format
            minDate: "today", // Optional: disable past dates
            maxDate: new Date().fp_incr(365), // Optional: limit to 1 year in the future
            allowInput: true // Allows users to type in the date
        });

        // Handle "Sort by Date" dropdown click
        $(document).ready(function() {
            $('#datepicker').daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false, // prevent default fill
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#datepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });

            // Automatically open on focus
            $('#datepicker').on('focus', function() {
                $(this).daterangepicker('show');
            });
        });
    </script>
@endsection
