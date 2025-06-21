@extends('layouts/layoutMaster')

@section('title', 'Create - Invoice')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />

@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
@endsection



@section('page-script')
    <script src="{{ asset('assets/js/offcanvas-add-payment.js') }}"></script>
    <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script>
    <script src="{{ asset('assets/js/app-invoice-edit.js') }}"></script>
@endsection

@section('content')
    
    <script>
        const dropZoneInitFunctions = [];
    </script>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">
                <strong>Created Bills</strong><br>
                <small class="text-muted"> <span
                        style="
                        font-size: 12px;
                        font-weight: 500;
                        margin-top: 2px;
                    ">All
                        Bill Overview
                    </span></small>
            </h5>

            <div class="d-flex align-items-center">
                <!-- <div class="d-flex align-items-center ms-3">

                            <input type="text" class="form-control form-control-sm  time_input_field datepicker" onclick="$('.datepicker').daterangepicker('show')" placeholder="Select Date" aria-label="Datepicker 1" autocomplete="off">
                        </div> -->
                <!-- calender -->
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
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownExport"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                <div class="d-flex align-items-center ms-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBillModal">
                        <i class="bx bx-plus me-0 me-sm-1"></i> Create Bill
                    </button>
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
                                            <img src="{{ asset('images/kurdistan-flag-sm.png') }}" alt="" style=" height: 17px; width: 17px;">
                                            <span>Rojava . Qamishlo</span>
                                            <img src="{{ asset('images/germany-flag-sm.png') }}" alt="" style=" height: 17px; width: 17px;">
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



    <!-- Modal -->
    <div class="modal fade" id="createBillModal" tabindex="-1" aria-labelledby="createBillModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl " style="display: block;padding-left: 0px;height: 140%;width: 104%;">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createBillModalLabel">Create Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0">
                    <div class="row invoice-edit p-4">
                        <!-- Invoice Edit (Left Column) -->
                        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                            <div class="card invoice-preview-card">
                                <div class="card-body">

                                    <!-- Header with Logo and Invoice Info -->
                                    <div class="row p-sm-3 p-0">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <img src="{{ asset('storage/' . $appinfo->image) }}" alt="logo"
                                                style="height:116px;width:116px;border-radius:8px;">
                                            <p class="mb-1">{{ $appinfo->company_name }}</p>
                                            <p class="mb-1">{{ $appinfo->address }},{{ $appinfo->house_number }}</p>
                                            <p class="mb-1">{{ $appinfo->city_zipcode }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <dl class="row mb-2">
                                                <dt class="col-sm-6 text-md-end"><span class="h4">Invoice #</span>
                                                </dt>
                                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                                    <input type="text" class="form-control w-px-150" disabled
                                                        value="3492">
                                                </dd>
                                                <dt class="col-sm-6 text-md-end"><span>Date:</span></dt>
                                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                                    <input type="text" class="form-control invoice-date w-px-150"
                                                        placeholder="YYYY-MM-DD">
                                                </dd>
                                                <dt class="col-sm-6 text-md-end"><span>Due Date:</span></dt>
                                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                                    <input type="text" class="form-control due-date w-px-150"
                                                        placeholder="YYYY-MM-DD">
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <hr class="my-4 mx-n4">

                                    <!-- Invoice To / Bill To Section -->
                                    <div class="row p-sm-3 p-0">
                                        <div class="col-md-6">
                                            <h6 class="pb-2">Invoice To:</h6>
                                            <p class="mb-1">Thomas Shelby</p>
                                            <p class="mb-1">Shelby Company Limited</p>
                                            <p class="mb-1">Small Heath, B10 0HF, UK</p>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6 class="pb-2">Bill To:</h6>
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
                                                    <tr>
                                                        <td class="pe-3">SWIFT code:</td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <hr class="mx-n4">

                                    <!-- Invoice Items Form -->
                                    <form class="source-item py-sm-3">
                                        <div data-repeater-list="group-a">
                                            <div class="repeater-wrapper" data-repeater-item>
                                                <div class="d-flex border rounded position-relative pe-0">
                                                    <div class="row w-100 m-0 p-3">
                                                        <div class="col-md-6 ps-md-0 mb-3">
                                                            <p class="mb-2">Item</p>
                                                            <select class="form-select item-details mb-2">
                                                                <option value="App Design">App Design</option>
                                                                <option value="App Customization" selected>App
                                                                    Customization</option>
                                                                <option value="ABC Template">ABC Template</option>
                                                                <option value="App Development">App Development</option>
                                                            </select>
                                                            <textarea rows="2" class="form-control">The most developer friendly & highly customizable HTML5 Admin</textarea>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <p class="mb-2">Cost</p>
                                                            <input type="number"
                                                                class="form-control invoice-item-price mb-2"
                                                                value="24" min="12">
                                                            <div>
                                                                <span>Discount:</span><span class="discount me-2">0%</span>
                                                                <span class="tax-1 me-2" data-bs-toggle="tooltip"
                                                                    title="Tax 1">0%</span>
                                                                <span class="tax-2" data-bs-toggle="tooltip"
                                                                    title="Tax 2">0%</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <p class="mb-2">Qty</p>
                                                            <input type="number" class="form-control invoice-item-qty"
                                                                value="1" min="1">
                                                        </div>
                                                        <div class="col-md-1 pe-0">
                                                            <p class="mb-2">Price</p>
                                                            <p class="mb-0">$24.00</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                                        <i class="bx bx-x fs-4 text-muted cursor-pointer"
                                                            data-repeater-delete></i>
                                                        <div class="dropdown">
                                                            <i class="bx bx-cog text-muted cursor-pointer"
                                                                data-bs-toggle="dropdown"></i>
                                                            <div class="dropdown-menu dropdown-menu-end p-3">
                                                                <div class="row g-3 mb-3">
                                                                    <div class="col-12">
                                                                        <label class="form-label">Discount(%)</label>
                                                                        <input type="number" id="discountInput"
                                                                            class="form-control" min="0"
                                                                            max="100">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Tax 1</label>
                                                                        <select id="taxInput1"
                                                                            class="form-select tax-select">
                                                                            <option value="0%" selected>0%</option>
                                                                            <option value="1%">1%</option>
                                                                            <option value="10%">10%</option>
                                                                            <option value="18%">18%</option>
                                                                            <option value="40%">40%</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Tax 2</label>
                                                                        <select id="taxInput2"
                                                                            class="form-select tax-select">
                                                                            <option value="0%" selected>0%</option>
                                                                            <option value="1%">1%</option>
                                                                            <option value="10%">10%</option>
                                                                            <option value="18%">18%</option>
                                                                            <option value="40%">40%</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    class="btn btn-label-primary btn-apply-changes">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-repeater-create>Add
                                            Item</button>
                                    </form>

                                    <hr class="my-4 mx-n4">

                                    <!-- Summary and Notes -->
                                    <div class="row py-sm-3">
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex mb-3">
                                                <label class="form-label fw-semibold me-5">Salesperson:</label>
                                                <input class="form-control" id="salesperson" value="Edward Crowley">
                                            </div>
                                            <textarea id="invoiceMsg" class="form-control">Thanks for your business</textarea>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end">
                                            <div class="invoice-calculations">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Subtotal:</span><span>$5000.25</span></div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Discount:</span><span>$0.00</span></div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Tax:</span><span>$100.00</span></div>
                                                <hr />
                                                <div class="d-flex justify-content-between">
                                                    <span>Total:</span><span>$5100.25</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <textarea id="note" class="form-control" rows="2">It was a pleasure working...</textarea>

                                </div>
                            </div>
                        </div>

                        <!-- Invoice Actions (Right Column) -->
                        <div class="col-lg-3 col-12 invoice-actions">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                                        data-bs-target="#sendInvoiceOffcanvas">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                                class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span>
                                    </button>
                                    <a href="{{ url('app/invoice/preview') }}"
                                        class="btn btn-label-secondary d-grid w-100 mb-3">Preview</a>
                                    <button type="button" class="btn btn-label-secondary d-grid w-100">Save</button>
                                </div>
                            </div>
                            <div>
                                <p class="mb-2">Accept payments via</p>
                                <select class="form-select mb-4">
                                    <option value="Bank Account">Bank Account</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Card">Credit/Debit Card</option>
                                    <option value="UPI Transfer">UPI Transfer</option>
                                </select>
                                <div class="d-flex justify-content-between mb-2">
                                    <label for="payment-terms" class="mb-0">Payment Terms</label>
                                    <label class="switch switch-primary me-0">
                                        <input type="checkbox" class="switch-input" id="payment-terms" checked="">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="bx bx-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="bx bx-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label"></span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <label for="client-notes" class="mb-0">Client Notes</label>
                                    <label class="switch switch-primary me-0">
                                        <input type="checkbox" class="switch-input" id="client-notes">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="bx bx-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="bx bx-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label"></span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label for="payment-stub" class="mb-0">Payment Stub</label>
                                    <label class="switch switch-primary me-0">
                                        <input type="checkbox" class="switch-input" id="payment-stub">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="bx bx-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="bx bx-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.row.invoice-edit -->
                </div> <!-- /.modal-body -->
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->

    <!-- Offcanvas -->
    @include('_partials/_offcanvas/offcanvas-send-invoice')
    @include('_partials/_offcanvas/offcanvas-add-payment')
    <!-- /Offcanvas -->

    <script>
        'use strict';


        //  <div class="progress">
        // <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
        //                                                     </div>

        dropZoneInitFunctions.push(function() {
            // previewTemplate: Updated Dropzone default previewTemplate

            const previewTemplate = `<div class="row">
                                          <div class="col-md-12 col-12 d-flex justify-content-center">
                                              <div class="dz-preview dz-file-preview w-100">
                                                  <div class="dz-details">
                                                      <div class="dz-thumbnail" style="width:95%">
                                                          <img data-dz-thumbnail >
                                                          <span class="dz-nopreview">No preview</span>
                                                          <div class="dz-success-mark"></div>
                                                          <div class="dz-error-mark"></div>
                                                          <div class="dz-error-message"><span data-dz-errormessage></span></div>

                                                      </div>
                                                      <div class="dz-filename" data-dz-name></div>
                                                          <div class="dz-size" data-dz-size></div>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>`;

            // image
            const dropzoneMulti1 = new Dropzone('#dropzone-img{{ isset($address->id) }}', {
                url: '{{ route('file.upload') }}',
                previewTemplate: previewTemplate,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                sending: function(file, xhr, formData) {
                    formData.append('folder', 'music');
                },
                success: function(file, response) {

                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-success");
                    }
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                        '.hidden-inputs');
                    hiddenInputsContainer.innerHTML +=
                        `<input type="hidden" name="logo" value="${response.path}" data-path="${response.path}">`;

                },
                removedfile: function(file) {
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                        '.hidden-inputs');
                    hiddenInputsContainer.querySelector(
                        `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }

                    $.ajax({
                        url: '',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        },
                        success: function() {}
                    });

                    return this._updateMaxFilesReachedClass();
                }
            });

            @if (isset($address->logo))
                window.addEventListener('load', () => {
                    var path = "{{ asset('storage/' . $address->logo) }}";
                    var rpath = "{{ $address->logo }}";
                    const parts = rpath.split("___");

                    imageUrlToFile(path, parts).then((file) => {
                        file['status'] = "success";
                        file['previewElement'] = "div.dz-preview.dz-image-preview";
                        file['previewTemplate'] = "div.dz-preview.dz-image-preview";
                        file['_removeLink'] = "a.dz-remove";
                        // file['webkitRelativePath'] = "";
                        file['width'] = 500;
                        file['height'] = 500;
                        file['accepted'] = true;
                        file['dataURL'] = path;
                        file['processing'] = true;
                        file['addPathToDataset'] = true;
                        dropzoneMulti1.on('addedfile', function(file) {
                            if (file.addPathToDataset)
                                file.previewElement.dataset.path = rpath;
                        });
                        file['upload'] = {
                            bytesSent: 0,
                            progress: 0,
                        };

                        // Update the preview template to include the music title

                        dropzoneMulti1.emit("addedfile", file, path);
                        dropzoneMulti1.emit("thumbnail", file, path);
                        // dropzoneMulti1.files.push(file);
                    });
                });
            @endif
        })
    </script>

    <script>
        async function imageUrlToFile(imageUrl, fileName) {
            // Fetch the image
            const response = await fetch(imageUrl);
            const blob = await response.blob();

            // Create a File object
            const file = new File([blob], fileName[1], {
                type: blob.type
            });

            return file;
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
