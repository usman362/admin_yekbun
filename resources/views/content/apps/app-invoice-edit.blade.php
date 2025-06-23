@extends('layouts/layoutMaster')

@section('title', 'Edit - Invoice')

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

    <div class="row invoice-edit">
        <!-- Invoice Edit-->
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-md-6 mb-md-0 mb-4">
                            <div class="d-flex svg-illustration mb-4 gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('storage/' . $appinfo->image) }}" alt="App Info Image"
                                        style="height: 116px; width: 116px; object-fit: cover; border-radius: 8px;">
                                </span>
                            </div>

                            <p class="mb-1">{{ $appinfo->company_name }}</p>
                            <p class="mb-1">{{ $appinfo->address }},{{ $appinfo->house_number }}</p>
                            <p class="mb-1"> {{ $appinfo->city_zipcode }}</p>

                        </div>
                        <div class="col-md-6">
                            <dl class="row mb-2">
                                <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                    <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                                </dt>
                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                    <div class="w-px-150">
                                        <input type="text" class="form-control" disabled placeholder="3492"
                                            value="3492" id="invoiceId" />
                                    </div>
                                </dd>
                                <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                    <span class="fw-normal">Date:</span>
                                </dt>
                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                    <div class="w-px-150">
                                        <input type="text" class="form-control invoice-date" placeholder="YYYY-MM-DD" />
                                    </div>
                                </dd>
                                <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                    <span class="fw-normal">Due Date:</span>
                                </dt>
                                <dd class="col-sm-6 d-flex justify-content-md-end">
                                    <div class="w-px-150">
                                        <input type="text" class="form-control due-date" placeholder="YYYY-MM-DD" />
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

                    <form class="source-item py-sm-3">
                        <div class="mb-3" data-repeater-list="group-a">
                            <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                <div class="d-flex border rounded position-relative pe-0">
                                    <div class="row w-100 m-0 p-3">
                                        <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                            <p class="mb-2 repeater-title">Item</p>
                                            <select class="form-select item-details mb-2">
                                                <option value="App Design">App Design</option>
                                                <option value="App Customization" selected>App Customization</option>
                                                <option value="ABC Template">ABC Template</option>
                                                <option value="App Development">App Development</option>
                                            </select>
                                            <textarea class="form-control" rows="2">The most developer friendly & highly customizable HTML5 Admin</textarea>
                                        </div>
                                        <div class="col-md-3 col-12 mb-md-0 mb-3">
                                            <p class="mb-2 repeater-title">Cost</p>
                                            <input type="number" class="form-control invoice-item-price mb-2"
                                                value="24" placeholder="24" min="12" />
                                            <div>
                                                <span>Discount:</span>
                                                <span class="discount me-2">0%</span>
                                                <span class="tax-1 me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tax 1">0%</span>
                                                <span class="tax-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tax 2">0%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-md-0 mb-3">
                                            <p class="mb-2 repeater-title">Qty</p>
                                            <input type="number" class="form-control invoice-item-qty" value="1"
                                                placeholder="1" min="1" max="50" />
                                        </div>
                                        <div class="col-md-1 col-12 pe-0">
                                            <p class="mb-2 repeater-title">Price</p>
                                            <p class="mb-0">$24.00</p>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                        <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete></i>
                                        <div class="dropdown">
                                            <i class="bx bx-cog bx-xs text-muted cursor-pointer more-options-dropdown"
                                                role="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside" aria-expanded="false">
                                            </i>
                                            <div class="dropdown-menu dropdown-menu-end w-px-300 p-3"
                                                aria-labelledby="dropdownMenuButton">

                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="discountInput" class="form-label">Discount(%)</label>
                                                        <input type="number" class="form-control" id="discountInput"
                                                            min="0" max="100" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="taxInput1" class="form-label">Tax 1</label>
                                                        <select name="tax-1-input" id="taxInput1"
                                                            class="form-select tax-select">
                                                            <option value="0%" selected>0%</option>
                                                            <option value="1%">1%</option>
                                                            <option value="10%">10%</option>
                                                            <option value="18%">18%</option>
                                                            <option value="40%">40%</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="taxInput2" class="form-label">Tax 2</label>
                                                        <select name="tax-2-input" id="taxInput2"
                                                            class="form-select tax-select">
                                                            <option value="0%" selected>0%</option>
                                                            <option value="1%">1%</option>
                                                            <option value="10%">10%</option>
                                                            <option value="18%">18%</option>
                                                            <option value="40%">40%</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider my-3"></div>
                                                <button type="button"
                                                    class="btn btn-label-primary btn-apply-changes">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" data-repeater-create>Add Item</button>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4 mx-n4" />

                    <div class="row py-sm-3">
                        <div class="col-md-6 mb-md-0 mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <label for="salesperson" class="form-label me-5 fw-semibold">Salesperson:</label>
                                <input type="text" class="form-control" id="salesperson" placeholder="Edward Crowley"
                                    value="Edward Crowley" />
                            </div>
                            <input type="text" class="form-control" id="invoiceMsg"
                                placeholder="Thanks for your business" value="Thanks for your business" />
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="invoice-calculations">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Subtotal:</span>
                                    <span class="fw-semibold">$5000.25</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Discount:</span>
                                    <span class="fw-semibold">$00.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Tax:</span>
                                    <span class="fw-semibold">$100.00</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="w-px-100">Total:</span>
                                    <span class="fw-semibold">$5100.25</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" />

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-semibold">Note:</label>
                                <textarea class="form-control" rows="2" id="note">It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice Edit-->

        <!-- Invoice Actions -->
        <div class="col-lg-3 col-12 invoice-actions">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="d-flex my-3">
                        <a href="{{ url('app/invoice/preview') }}" class="btn btn-label-secondary w-100 me-3">Preview</a>
                        <button type="button" class="btn btn-label-secondary w-100">Save</button>
                    </div>

                </div>
            </div>

        </div>
        <!-- /Invoice Actions -->
    </div>

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

@endsection
