@extends('layouts/layoutMaster')

@section('title', 'News - Add / Manage')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

<style>
  .ql-snow {
    overflow: hidden;
  }
  .time_input, #filterService {
    width: 200px; /* Adjust this width as necessary */
}
</style>
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
<!-- Basic Bootstrap Table -->

 <div class="card mb-4"> <!-- First Card: Bank Transfer List -->
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0"><strong>Bank Transfer List</strong></h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createbankModal">
            <i class="bx bx-plus me-0 me-sm-1"></i> Add Bank
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
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
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                </span>

                                <!-- Delete -->
                                <form action="{{ route('settings.bank-transfer.destroy',$bank->id) }}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                </form>
                            </div>
                            <x-modal id="editbankModal{{ $bank->id }}" 
                                title="Edit Bank "
                                saveBtnText="Update" 
                                saveBtnType="submit"
                                saveBtnForm="editForm{{ $bank->id }}" 
                                size="md">
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
    <h5 class="m-0"><strong>Transactions Bank Overview</strong></h5>

    <div class="d-flex align-items-center">
        <div class="d-flex align-items-center ms-3" style="border-radius: 10px;">
            <div class="input-group time_input" style="width: 260px;">
                <input type="text" class="form-control time_input_field datepicker" style="height: 27px;margin-top: 7px;"
                    placeholder="Select Date" name="duration" id="datepicker"
                    aria-label="Datepicker 1" autocomplete="off" />
                <button class="btn" type="button" onclick="$('.datepicker').daterangepicker('show')">
                    <img src="{{ asset('assets/svg/svg-dialog/Calendar%20Add.svg') }}" class="time_div_img">
                </button>
            </div>
        </div>

        <!-- Sort by Service -->
        <div class="d-flex align-items-center ms-3">
            <select id="filterService" class="form-select form-select-sm">
                <option selected>Sort by Service</option>
                <option value="account">Account</option>
                <option value="music">Music</option>
                <option value="channels">Channels</option>
            </select>
        </div>

        <!-- Search Button -->
        <div class="d-flex align-items-center ms-3">
            <input type="text" class="form-control form-control-sm" placeholder="Search">
        </div>

        <!-- Export Dropdown -->
        <div class="d-flex align-items-center ms-3">
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownExport" data-bs-toggle="dropdown" aria-expanded="false">
                    Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownExport">
                    <li><a class="dropdown-item" href="#" id="exportPDF"><img src="{{ asset('assets/img/print.svg') }}" class="me-1" style="width: 20px; height: 20px;" alt="PDF"> PDF</a></li>
                    <li><a class="dropdown-item" href="#" id="exportCSV"><img src="{{ asset('assets/img/file-csv.svg') }}" class="me-1" style="width: 20px; height: 20px;" alt="CSV"> CSV</a></li>
                    <li><a class="dropdown-item" href="#" id="exportPrint"><img src="{{ asset('assets/img/print.svg') }}" class="me-1" style="width: 20px; height: 20px;" alt="Print"> Print</a></li>
                    <li><a class="dropdown-item" href="#" id="exportExcel"><img src="{{ asset('assets/img/file-excel.svg') }}" class="me-1" style="width: 20px; height: 20px;" alt="Excel"> Excel</a></li>
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
                        <th style="font-size: 20px;">#</th>
                        <th style="font-size: 20px;">Order</th>
                        <th style="font-size: 20px;">Date & Time</th>
                        <th style="font-size: 20px;">About User</th>
                        <th style="font-size: 20px;">Service Type</th>
                        <th style="font-size: 20px;">Payment Type</th>
                        <th style="font-size: 20px;">Total Paid</th>
                        <th style="font-size: 20px;">Options</th>
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
                                <img class="user-avatar" src="{{ asset('images/user-clips-artist.png') }}" alt="">
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
                        <td><a href="javascript:void(0)"><img class="w-80" src="{{ asset('assets/svg/eye.svg') }}" alt="view"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


   <!--/ Basic Bootstrap Table -->
  <x-modal id="createbankModal" title="Create Bank" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm" size="md">
    @include('content.include.bank-transfer.createForm')
</x-modal>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
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
    }).then(function (result) {
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
        dateFormat: "Y-m-d",  // Specify the date format
        minDate: "today",     // Optional: disable past dates
        maxDate: new Date().fp_incr(365), // Optional: limit to 1 year in the future
        allowInput: true      // Allows users to type in the date
    });

    flatpickr("#endDate", {
        dateFormat: "Y-m-d",  // Specify the date format
        minDate: "today",     // Optional: disable past dates
        maxDate: new Date().fp_incr(365), // Optional: limit to 1 year in the future
        allowInput: true      // Allows users to type in the date
    });

    // Handle "Sort by Date" dropdown click
    document.getElementById('filterDate').addEventListener('change', function() {
        const selectedValue = this.value;
        if (selectedValue === 'start' || selectedValue === 'end') {
            document.getElementById('datePickerSection').style.display = 'flex';
        } else {
            document.getElementById('datePickerSection').style.display = 'none';
        }
    });
</script>
@endsection