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
    <form action="{{route('app-invoice-update',$invoice->id)}}" method="POST">
        @csrf
    <div class="row invoice-edit">
        <!-- Invoice Edit-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6 mb-md-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2">
                                   <span class="app-brand-logo demo">
                                        @include('_partials.macros',["width"=>20,"withbg"=>'#696cff'])
                                    </span>
                                </div>

                                <p class="mb-1">{{$appinfo->company_name}}</p>
                                <p class="mb-1">{{$appinfo->house_number.', '.$appinfo->address.', '.$appinfo->city_zipcode}}</p>
                                @if($email)
                                    <p class="mb-1"><strong>E-mail:</strong> {{ $email }}</p>
                                @endif

                                @if($fax)
                                    <p class="mb-1"><strong>Fax:</strong> {{ $fax }}</p>
                                @endif

                                @if($stnr)
                                    <p class="mb-1"><strong>St.-Nr.:</strong> {{ $stnr }}</p>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                        <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                        <div class="w-px-150">
                                            <input type="text" class="form-control" disabled placeholder="1001"
                                                value="{{str_replace('INV-','',$invoice->invoice_id)}}" id="invoiceId" />
                                        </div>
                                    </dd>
                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                        <span class="fw-normal">Date:</span>
                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                        <div class="w-px-150">
                                            <input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" value="{{\Carbon\Carbon::parse($date)->format('Y-m-d')}}" />
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <hr class="my-4 mx-n4" />

                        <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="pb-2">Invoice To:</h6>
                            <p class="mb-1">{{@$invoice->first_name.' '.@$invoice->last_name }}</p>
                            {{-- <p class="mb-1">Shelby Company Limited</p> --}}
                            <p class="mb-1">{{@$invoice->city.','.@$invoice->country}}</p>
                            {{-- <p class="mb-1">718-986-6062</p> --}}
                            <p class="mb-0">{{@$invoice->email}}</p>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                        {{--  --}}
                        </div>
                        </div>

                        <hr class="mx-n4" />

                        <div class="source-item py-sm-3">
                            <div class="mb-3" data-repeater-list="group-a">
                                @foreach($invoice->items as $key => $item)
                                    <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                        <input type="hidden" name="item_subscription_type" value="{{$item['subscription_type']}}">
                                        <input type="hidden" name="item_userType" value="{{$item['userType']}}">
                                        <div class="d-flex border rounded position-relative pe-0">
                                            <div class="row w-100 m-0 p-3">
                                                <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                                    <p class="mb-2 repeater-title">Item</p>
                                                    <input class="form-control mb-1" name="item_title" id="item_title" type="text" value="{{$item['title']}}">
                                                    <textarea class="form-control" name="item_description" rows="2">{{$item['description']}}</textarea>
                                                </div>
                                                <div class="col-md-3 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Cost</p>
                                                    <input type="number" name="item_amount" class="form-control invoice-item-price mb-2"
                                                        value="{{$item['amount']}}" placeholder="24" min="12" />
                                                </div>
                                                <div class="col-md-2 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Qty</p>
                                                    <input type="number" class="form-control invoice-item-qty" value="{{$item['quantity']}}"
                                                        placeholder="1" name="item_quantity" min="1" max="50" />
                                                </div>
                                                <div class="col-md-1 col-12 pe-0">
                                                    <p class="mb-2 repeater-title">Price</p>
                                                    <p class="mb-0">{{ number_format($item['amount'] * $item['quantity'],2,'.','')}}</p>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                                <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" data-repeater-create>Add Item</button>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 mx-n4" />

                        <div class="row py-sm-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="invoice-calculations">
                                    <hr/>
                                    <div class="d-flex justify-content-between">
                                        <span class="w-px-100">Total:</span>
                                        <span class="fw-semibold">{{number_format(array_sum(array_column($invoice->items, 'amount')),2,'.','');}}€</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-semibold">Note:</label>
                                    <textarea class="form-control" rows="2" name="note" id="note">{{$invoice->note ?? 'Thank you for your purchase and continued support.'}}</textarea>
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
                        <a href="{{ route('app-invoice-view',$invoice->transaction_id) }}" class="btn btn-label-danger w-100 me-3">Cancel</a>
                        <button type="submit" class="btn btn-label-primary w-100">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>
  </form>
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
