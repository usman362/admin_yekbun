@extends('layouts/layoutMaster')

@section('title', 'Income')

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
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Income /</span> All Income
    </h4>

    <div class="card">
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
                    type="button" role="tab" aria-controls="pills-monthly" aria-selected="false"  style="font-size: 22px !important;">Monthly
                    Income</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly"
                    type="button" role="tab" aria-controls="pills-yearly" aria-selected="false"  style="font-size: 22px !important;">Yearly Income</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-daily" role="tabpanel" aria-labelledby="pills-daily-tab">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 20px ">#</th>
                                <th style="font-size: 20px">Date</th>
                                <th style="font-size: 20px">Total Transactions</th>
                                <th style="font-size: 20px">Bank Transfer</th>
                                <th style="font-size: 20px">  Paypal</th>
                                <th style="font-size: 20px">Apple Pay</th>
                                <th style="font-size: 20px">Google Pay</th>
                                <th style="font-size: 20px">Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>01</td>
                                <td>Date</td>
                                <td><a data-bs-toggle="modal" href="#dailyIncome" role="button">10</a></td>
                                <td>Bank Transfer</td>
                                <td>Paypal</td>
                                <td>Apple Pay</td>
                                <td>Google Pay</td>
                                <td>Total€</td>
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
                                <th>#</th>
                                <th>Date</th>
                                <th>Total Transactions</th>
                                <th>Bank Transfer</th>
                                <th>Paypal</th>
                                <th>Apple Pay</th>
                                <th>Google Pay</th>
                                <th>Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>01</td>
                                <td>Date</td>
                                <td><a data-bs-toggle="modal" href="#monthlyIncome" role="button">10</a></td>
                                <td>Bank Transfer</td>
                                <td>Paypal</td>
                                <td>Apple Pay</td>
                                <td>Google Pay</td>
                                <td>Total€</td>
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
                                <th>#</th>
                                <th>Date</th>
                                <th>Total Transactions</th>
                                <th>Bank Transfer</th>
                                <th>Paypal</th>
                                <th>Apple Pay</th>
                                <th>Google Pay</th>
                                <th>Total€</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>01</td>
                                <td>Date</td>
                                <td><a data-bs-toggle="modal" href="#yearlyIncome" role="button">10</a></td>
                                <td>Bank Transfer</td>
                                <td>Paypal</td>
                                <td>Apple Pay</td>
                                <td>Google Pay</td>
                                <td>Total€</td>
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
                <div class="modal-header">
                    <div class="modal-title" id="dailyIncomeLabel">
                        <h5 class="m-0" style="font-size: 22px ">Transaction List</h5>
                        <p class="m-0"style="font-size: 22px ">DD.MM. YYYY - Total Transkations: 15</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 20px ">#</th>
                                    <th style="font-size: 20px ">Order</th>
                                    <th style="font-size: 20px ">Date & Time</th>
                                    <th style="font-size: 20px ">About User</th>
                                    <th style="font-size: 20px ">Service Type</th>
                                    <th style="font-size: 20px ">Payment Type</th>
                                    <th style="font-size: 20px ">Total Paid</th>
                                    <th style="font-size: 20px ">Options</th>
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
                                                    <img src="{{ asset('images/kurdistan-flag-sm.png') }}" alt="">
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

    <div class="modal fade" id="monthlyIncome" aria-hidden="true" aria-labelledby="monthlyIncomeLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="monthlyIncomeLabel">
                        <h5 class="m-0">Monthly Income</h5>
                        <p class="m-0">MM. YYYY - Total Transkations: 15</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total Transactions</th>
                                    <th>Bank Transfer</th>
                                    <th>Paypal</th>
                                    <th>Apple Pay</th>
                                    <th>Google Pay</th>
                                    <th>Total€</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>01</td>
                                    <td>Date</td>
                                    <td><a data-bs-toggle="modal" href="#monthlyIncome2" role="button">10</a></td>
                                    <td>Bank Transfer</td>
                                    <td>Paypal</td>
                                    <td>Apple Pay</td>
                                    <td>Google Pay</td>
                                    <td>Total€</td>
                                </tr>
                            </tbody>
                        </table>
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
                                    <th style="font-size: 20px">#</th>
                                    <th style="font-size: 20px">Order</th>
                                    <th style="font-size: 20px">Date & Time</th>
                                    <th style="font-size: 20px">About User</th>
                                    <th style="font-size: 20px">Service Type</th>
                                    <th style="font-size: 20px ">Payment Type</th>
                                    <th style="font-size: 20px ">Total Paid</th>
                                    <th style="font-size: 20px ">Options</th>
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


    <div class="modal fade" id="yearlyIncome" aria-hidden="true" aria-labelledby="yearlyIncomeLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="yearlyIncomeLabel">
                        <h5 class="m-0">Yearly Income</h5>
                        <p class="m-0">YYYY - Total Transkations: 15</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total Transactions</th>
                                    <th>Bank Transfer</th>
                                    <th>Paypal</th>
                                    <th>Apple Pay</th>
                                    <th>Google Pay</th>
                                    <th>Total€</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>01</td>
                                    <td>Date</td>
                                    <td><a data-bs-toggle="modal" href="#yearlyIncome2" role="button">10</a></td>
                                    <td>Bank Transfer</td>
                                    <td>Paypal</td>
                                    <td>Apple Pay</td>
                                    <td>Google Pay</td>
                                    <td>Total€</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="yearlyIncome2" aria-hidden="true" aria-labelledby="yearlyIncomeLabel2"
        tabindex="-1">
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
                                    <th style="font-size: 20px ">#</th>
                                    <th style="font-size: 20px ">Order</th>
                                    <th style="font-size: 20px ">Date & Time</th>
                                    <th style="font-size: 20px ">About User</th>
                                    <th style="font-size: 20px ">Service Type</th>
                                    <th style="font-size: 20px ">Payment Type</th>
                                    <th style="font-size: 20px ">Total Paid</th>
                                    <th style="font-size: 20px ">Options</th>
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
@endsection
