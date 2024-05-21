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
    <div class="row invoice-edit">
        <!-- Invoice Edit-->
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-md-6 mb-md-0 mb-4">
                            <div class="d-flex svg-illustration mb-4 gap-2">
                                <span class="app-brand-logo demo"><svg width="25" viewBox="0 0 25 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path
                                                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                                id="path-1"></path>
                                            <path
                                                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                                id="path-3"></path>
                                            <path
                                                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                                id="path-4"></path>
                                            <path
                                                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                                id="path-5"></path>
                                        </defs>
                                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                        <mask id="mask-2" fill="white">
                                                            <use xlink:href="#path-1"></use>
                                                        </mask>
                                                        <use fill="var(--bs-primary)" xlink:href="#path-1"></use>
                                                        <g id="Path-3" mask="url(#mask-2)">
                                                            <use fill="var(--bs-primary)" xlink:href="#path-3"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3">
                                                            </use>
                                                        </g>
                                                        <g id="Path-4" mask="url(#mask-2)">
                                                            <use fill="var(--bs-primary)" xlink:href="#path-4"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4">
                                                            </use>
                                                        </g>
                                                    </g>
                                                    <g id="Triangle"
                                                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                        <use fill="var(--bs-primary)" xlink:href="#path-5"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="app-brand-text demo text-body fw-bold">Sneat</span>
                            </div>
                            <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
                            <p class="mb-1">San Diego County, CA 91905, USA</p>
                            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
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
                            <p class="mb-1">718-986-6062</p>
                            <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div>
                        <div class="col-md-6 col-sm-7">
                            <h6 class="pb-2">Bill To:</h6>
                            <table>
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
                    <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas"
                        data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span>
                    </button>
                    <div class="d-flex my-3">
                        <a href="{{ url('app/invoice/preview') }}" class="btn btn-label-secondary w-100 me-3">Preview</a>
                        <button type="button" class="btn btn-label-secondary w-100">Save</button>
                    </div>
                    <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas"
                        data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="bx bx-dollar bx-xs me-3"></i>Add Payment</span>
                    </button>
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
