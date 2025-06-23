@extends('layouts/layoutMaster')

@section('title', 'Boxicons - Icons')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('content')

<script>
const dropZoneInitFunctions = [];
</script>
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
      <style>
        .card,
        .modal {
            font-family: 'Genos';
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: hidden;
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
    
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">User Subscription </span></h4>

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

<div style="height: 35px;"></div>
  <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            
 <h5 class="m-0">
                <strong style="font-size: 25px;">Subscription</strong><br>
                <small class="text-muted"> <span
                        style="
                    font-size: 16px;
                    font-weight: 500;
                    margin-top: 2px;
                ">
                       Plan Overview                    </span></small>
            </h5>
            <div class="d-flex align-items-center">

                <div class="row">
                   <div class="col-auto d-flex align-items-center ms-3">
                        <select id="filterService" class="form-select form-select-sm" style="height: 32px;">
                            <option selected>Sort by </option>
                            <option value="account">Monthyl Plan</option>
                            <option value="music">Yearly Plan</option>
                             
                        </select>
                    </div>
                    <div class="col-auto d-flex align-items-center ms-3">
                        <select id="filterService" class="form-select form-select-sm" style="height: 32px;">
                            <option selected>Sort by User</option>
                            <option value="account">Educated</option>
                            <option value="music">Acadmic</option>
                            
                        </select>
                    </div>
                </div>


                <!-- Search Button -->
                <div class="d-flex align-items-center ms-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Search" style="height: 32px;">
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
                            <th style="font-size: 13px;">#</th>
                            
                            <th style="font-size: 15px;">Purchase Date</th>
                            <th style="font-size: 15px;">Next Payment</th>
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
                          
                            <td class="line-height-1">
                                <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                                
                            </td>
                              <td class="line-height-1">
                                <p class="m-0"><strong>DD.MM.YYYY</strong></p>
                               
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
                                <p class="m-0"><strong>Bank Transfer</strong></p>
                                <small>Transaction ID</small>
                            </td>
                            <td class="line-height-1">
                                <p class="m-0"><strong>15,00€</strong></p>
                                <small>-0% Discount</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><a class="text-body" data-bs-placement="top"
                                        aria-label="Preview Invoice" data-bs-toggle="modal"
                                        data-bs-target="#sub-categories" data-bs-offset="0,4" href="javascript:void(0)"
                                        data-bs-html="true" data-bs-original-title="Edit"><img
                                            src="{{ asset('assets/svg/eye.svg') }}" alt=""></a>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<script>
  function delete_service(el) {
      let link = $(el).data('id');
      $('.deleted-modal').modal('show');
      $('#delete_form').attr('action', link);
  }
</script>


<!-- Invoice Modal -->
<div class="modal fade" id="sub-categories" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-sub-categories">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body row">
                    <div class="col-sm-9 text-center">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h5 class="mb-3">Sneat</h5>
                                <div>Office 149,450 South Brand Brooklyn</div>
                                <div>San Diego County, CA 91905, USA</div>
                                <div>+1 (123) 456 7891, +44 (876) 5432198</div>
                            </div>
                            <div class="col-sm-6 ">
                                <h5 class="mb-3">Invoice #3492</h5>
                                <div>Date Issues: 25/08/2020</div>
                                <div>Date Due: 29/08/2020</div>
                            </div>
                        </div>
                        <div class="table-responsive-sm mt-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th class="right">Cost</th>
                                        <th class="center">QTY</th>
                                        <th class="right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="left strong">Vuexy Admin Template</td>
                                        <td class="left">HTML Admin Template</td>
                                        <td class="right">$32</td>
                                        <td class="center">1</td>
                                        <td class="right">$32.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Frest Admin Template</td>
                                        <td class="left">Angular Admin Template</td>
                                        <td class="right">$22</td>
                                        <td class="center">1</td>
                                        <td class="right">$22.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Apex Admin Template</td>
                                        <td class="left">HTML Admin Template</td>
                                        <td class="right">$17</td>
                                        <td class="center">2</td>
                                        <td class="right">$34.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Robust Admin Template</td>
                                        <td class="left">React Admin Template</td>
                                        <td class="right">$66</td>
                                        <td class="center">1</td>
                                        <td class="right">$66.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-6">
                                <div><span class="fw-bold">Salesperson:</span> Alpie Solomons</div>
                                <div>Thanks for your business.</div>
                            </div>
                            <div class="col-sm-6">
                                <div>Subtotal: &nbsp $154.25</div>
                                <div>Discount: &nbsp $00.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 d-flex flex-column">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sub-categories"
                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                            data-bs-original-title="Edit"><i class="fa-solid fa-paper-plane"></i>&nbsp Send
                            Invoice</button>
                        <button class="btn btn-grey mt-3 border border-*" data-bs-toggle="modal"
                            data-bs-target="#sub-categories" data-bs-offset="0,4" data-bs-placement="top"
                            data-bs-html="true" data-bs-original-title="Edit">Download</button>
                        <button class="btn btn-grey mt-3 border border-* overlay-primary" data-bs-toggle="modal"
                            data-bs-target="#sub-categories" data-bs-offset="0,4" data-bs-placement="top"
                            data-bs-html="true" data-bs-original-title="Edit">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!--/ Invoice Modal -->

@section('page-script')
<script>
function confirmAction(event, callback) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to delete this?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            callback();
        }
    });
}
</script>
<script>
function drpzone_init() {
    dropZoneInitFunctions.forEach(callback => callback());
}
</script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
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

@endsection