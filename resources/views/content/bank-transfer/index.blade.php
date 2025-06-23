@extends('layouts/layoutMaster')

@section('title', 'News - Add / Manage')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <style>
        .ql-snow {
            overflow: hidden;
        }

        .time_input,
        #filterService {
            width: 200px;
            /* Adjust this width as necessary */
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

@endsection

@section('content')
    <!-- Basic Bootstrap Table -->

    <div class="card mb-4"> <!-- First Card: Bank Transfer List -->
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0"><strong>Bank Transfer List</strong></h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createbankModal">
                <i class="bx bx-plus me-0 me-sm-1"></i> Add Bank
            </button>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Bank Name</th>
                            <th>Owner Name</th>
                            <th>Account No</th>
                            <th>IBAN No</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($banks as $bank)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bank->add_title ?? '' }}</td>
                                <td>{{ $bank->bank_name ?? '' }}</td>
                                <td>{{ $bank->account_holder_name ?? '' }}</td>
                                <td>{{ $bank->account_no ?? '' }}</td>
                                <td>{{ $bank->iban_no ?? '' }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <!-- Edit -->
                                        <span data-bs-toggle="modal" data-bs-target="#editbankModal{{ $bank->id }}">
                                            <button class="btn btn-sm btn-icon" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                data-bs-original-title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </span>

                                        <!-- Delete -->
                                        <form action="{{ route('settings.bank-transfer.destroy', $bank->id) }}"
                                            onsubmit="confirmAction(event, () => event.target.submit())" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                        </form>
                                    </div>
                                    <x-modal id="editbankModal{{ $bank->id }}" title="Edit Bank " saveBtnText="Update"
                                        saveBtnType="submit" saveBtnForm="editForm{{ $bank->id }}" size="md">
                                        @include('content.bank-transfer.editForm')
                                    </x-modal>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7"><b>No Bank found.<b></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Space between the two cards -->
    <div style="height: 30px;"></div> <!-- This will create a clear gap between the cards -->

    <!-- Second Card: Transaction List -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">
                <strong style="font-size: 25px;">Transactions</strong><br>
                <small class="text-muted"> <span
                        style="
                    font-size: 12px;
                    font-weight: 500;
                    margin-top: 2px;
                ">Bank
                        Transfer Overview
                    </span></small>
            </h5>

            <div class="d-flex align-items-center">

                <div class="row">
                    <!-- Date Input -->
                    <div class="col-auto" style="border-radius: 10px; position: relative;">
                        <input type="text" class="form-control form-control-sm datepicker" placeholder="Select Date"
                            name="duration" id="datepicker" aria-label="Datepicker" autocomplete="off"
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
                            <th style="font-size: 13px;">Order</th>
                            <th style="font-size: 13px;">Date & Time</th>
                            <th style="font-size: 13px;">About User</th>
                            <th style="font-size: 13px;">Service Type</th>
                            <th style="font-size: 13px;">Payment Type</th>
                            <th style="font-size: 13px;">Total Paid</th>
                            <th style="font-size: 13px;">Options</th>
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
    <!-- SubCategories Modal -->
    <div class="modal fade" id="sub-categories" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-sub-categories">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="content-wrapper">

                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">


                            <div class="row invoice-preview">
                                <!-- Invoice -->
                                <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                                    <div class="card invoice-preview-card">
                                        <div class="card-body">
                                            <div class="row p-sm-3 p-0">
                                                <div class="col-md-6 mb-md-0 mb-4">
                                                    <div class="d-flex svg-illustration mb-4 gap-2">
                                                        <span class="app-brand-logo demo">
                                                            <img src="{{ asset('storage/' . $appinfo->image) }}"
                                                                alt="App Info Image"
                                                                style="height: 116px; width: 116px; object-fit: cover; border-radius: 8px;">
                                                        </span>
                                                    </div>

                                                    <p class="mb-1">{{ $appinfo->company_name }}</p>
                                                    <p class="mb-1">
                                                        {{ $appinfo->address }},{{ $appinfo->house_number }}</p>
                                                    <p class="mb-1"> {{ $appinfo->city_zipcode }}</p>

                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row mb-2">
                                                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                                            <span class="h4 text-capitalize mb-0 text-nowrap">Invoice
                                                                #</span>
                                                        </dt>
                                                        <dd class="col-sm-6 d-flex justify-content-md-end">
                                                            <div class="w-px-150">
                                                                <input type="text" class="form-control" disabled
                                                                    placeholder="3492" value="3492" id="invoiceId" />
                                                            </div>
                                                        </dd>
                                                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                                            <span class="fw-normal">Date:</span>
                                                        </dt>
                                                        <dd class="col-sm-6 d-flex justify-content-md-end">
                                                            <div class="w-px-150">
                                                                <input type="text" class="form-control invoice-date"
                                                                    placeholder="YYYY-MM-DD" />
                                                            </div>
                                                        </dd>
                                                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                                            <span class="fw-normal">Due Date:</span>
                                                        </dt>
                                                        <dd class="col-sm-6 d-flex justify-content-md-end">
                                                            <div class="w-px-150">
                                                                <input type="text" class="form-control due-date"
                                                                    placeholder="YYYY-MM-DD" />
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>

                                            <hr class="my-4 mx-n4" />

                                            <div class="row p-sm-3 p-0">
                                                <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
                                                    <h6 class="pb-2">Invoice To:</h6>
                                                    <p class="mb-1">Thomas shelby</p>
                                                    <p class="mb-1">Shelby Company Limited</p>
                                                    <p class="mb-1">Small Heath, B10 0HF, UK</p>

                                                </div>
                                                <div class="col-md-6 col-sm-7 ">
                                                    <h6 class="pb-2" style="margin-left: 202px;">Bill To:</h6>
                                                    <table class="ms-auto">
                                                        <tbody>
                                                            <tr>
                                                                <td class="pe-3">Total Due:</td>
                                                                <td>$12,110.55</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-3">Bank name:</td>
                                                                <td>American Bank</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-3">Country:</td>
                                                                <td>United States</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-3">IBAN:</td>
                                                                <td>ETD95476213874685</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <hr class="mx-n4" />

                                            <div class="table-responsive">
                                                <table class="table border-top m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Cost</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-nowrap">Vuexy Admin Template</td>
                                                            <td class="text-nowrap">HTML Admin Template</td>
                                                            <td>$32</td>
                                                            <td>1</td>
                                                            <td>$32.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-nowrap">Frest Admin Template</td>
                                                            <td class="text-nowrap">Angular Admin Template</td>
                                                            <td>$22</td>
                                                            <td>1</td>
                                                            <td>$22.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-nowrap">Apex Admin Template</td>
                                                            <td class="text-nowrap">HTML Admin Template</td>
                                                            <td>$17</td>
                                                            <td>2</td>
                                                            <td>$34.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-nowrap">Robust Admin Template</td>
                                                            <td class="text-nowrap">React Admin Template</td>
                                                            <td>$66</td>
                                                            <td>1</td>
                                                            <td>$66.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="align-top px-4 py-5">
                                                                <p class="mb-2">
                                                                    <span class="me-1 fw-semibold">Salesperson:</span>
                                                                    <span>Alfie Solomons</span>
                                                                </p>
                                                                <span>Thanks for your business</span>
                                                            </td>
                                                            <td class="text-end px-4 py-5">
                                                                <p class="mb-2">Subtotal:</p>
                                                                <p class="mb-2">Discount:</p>
                                                                <p class="mb-2">Tax:</p>
                                                                <p class="mb-0">Total:</p>
                                                            </td>
                                                            <td class="px-4 py-5">
                                                                <p class="fw-semibold mb-2">$154.25</p>
                                                                <p class="fw-semibold mb-2">$00.00</p>
                                                                <p class="fw-semibold mb-2">$50.00</p>
                                                                <p class="fw-semibold mb-0">$204.25</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="fw-semibold">Note:</span>
                                                        <span>It was a pleasure working with you and your team. We hope you
                                                            will
                                                            keep us in mind for future freelance
                                                            projects. Thank You!</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice -->

                                <!-- Invoice Actions -->
                                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                                    <div class="card">
                                        <div class="card-body">
                                            <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                                                data-bs-target="#sendInvoiceOffcanvas">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-nowrap"><i
                                                        class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span>
                                            </button>
                                            <button class="btn btn-label-secondary d-grid w-100 mb-3">
                                                Download
                                            </button>
                                            <a class="btn btn-label-secondary d-grid w-100 mb-3" target="_blank"
                                                href="http://127.0.0.1:8000/app/invoice/print">
                                                Print
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Actions -->
                            </div>

                            <!-- Offcanvas -->
                            <!-- Send Invoice Sidebar -->
                            <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                                <div class="offcanvas-header mb-3">
                                    <h5 class="offcanvas-title">Send Invoice</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body flex-grow-1">
                                    <form>
                                        <div class="mb-3">
                                            <label for="invoice-from" class="form-label">From</label>
                                            <input type="text" class="form-control" id="invoice-from"
                                                value="shelbyComapny@email.com" placeholder="company@email.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="invoice-to" class="form-label">To</label>
                                            <input type="text" class="form-control" id="invoice-to"
                                                value="qConsolidated@email.com" placeholder="company@email.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="invoice-subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="invoice-subject"
                                                value="Invoice of purchased Admin Templates"
                                                placeholder="Invoice regarding goods">
                                        </div>
                                        <div class="mb-3">
                                            <label for="invoice-message" class="form-label">Message</label>
                                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <span class="badge bg-label-primary">
                                                <i class="bx bx-link bx-xs"></i>
                                                <span class="align-middle">Invoice Attached</span>
                                            </span>
                                        </div>
                                        <div class="mb-3 d-flex flex-wrap">
                                            <button type="button" class="btn btn-primary me-3"
                                                data-bs-dismiss="offcanvas">Send</button>
                                            <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="offcanvas">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Send Invoice Sidebar -->
                            <!-- Add Payment Sidebar -->
                            <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
                                <div class="offcanvas-header mb-3">
                                    <h5 class="offcanvas-title">Add Payment</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body flex-grow-1">
                                    <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                                        <p class="mb-0">Invoice Balance:</p>
                                        <p class="fw-bold mb-0">$5000.00</p>
                                    </div>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="invoiceAmount">Payment Amount</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="text" id="invoiceAmount" name="invoiceAmount"
                                                    class="form-control invoice-amount" placeholder="100">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="payment-date">Payment Date</label>
                                            <input id="payment-date" class="form-control invoice-date flatpickr-input"
                                                type="text" readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="payment-method">Payment Method</label>
                                            <select class="form-select" id="payment-method">
                                                <option value="" selected="" disabled="">Select payment
                                                    method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Debit Card">Debit Card</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Paypal">Paypal</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="payment-note">Internal Payment Note</label>
                                            <textarea class="form-control" id="payment-note" rows="2"></textarea>
                                        </div>
                                        <div class="mb-3 d-flex flex-wrap">
                                            <button type="button" class="btn btn-primary me-3"
                                                data-bs-dismiss="offcanvas">Send</button>
                                            <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="offcanvas">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Add Payment Sidebar -->
                            <!-- /Offcanvas -->

                            <!-- pricingModal -->
                            <!--/ pricingModal -->

                        </div>
                        <!-- / Content -->


                        <div class="content-backdrop fade"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--/ Basic Bootstrap Table -->
    <x-modal id="createbankModal" title="Create Bank" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createForm" size="md">
        @include('content.include.bank-transfer.createForm')
    </x-modal>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

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
