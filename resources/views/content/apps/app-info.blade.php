@extends('layouts/layoutMaster')

@section('title', 'App Info')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        .card>.profile-cover,
        .card>.profile-cover .profile-cover-img,
        .card>.profile-cover .profile-cover-img-wrapper {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        @media (min-width: 992px) {
            .profile-cover {
                height: 10rem;
            }
        }

        .profile-cover {
            position: relative;
            height: 7.5rem;
            padding: 1.75rem 2rem;
            border-radius: 0.75rem;
        }

        .profile-cover-img-wrapper {
            height: 10rem;
        }

        .profile-cover-img-wrapper {
            position: absolute;
            top: 0;
            inset-inline-end: 0;
            inset-inline-start: 0;
            height: 7.5rem;
            background-color: #e7eaf3;
            border-radius: 0.75rem;
        }

        .avatar:not(img) {
            background-color: #fff;
        }

        .profile-cover-avatar {
            display: -ms-flexbox;
            display: flex;
            margin: -6.3rem auto 0.5rem;
        }

        .avatar-uploader {
            cursor: pointer;
            display: inline-block;
            transition: .2s;
            margin-bottom: 0;
        }

        .avatar-xxl {
            width: 7.875rem;
            height: 7.875rem;
        }

        .avatar-border-lg {
            border: 0.1875rem solid #fff;
        }

        .avatar-circle {
            border-radius: 50% !important;
        }

        .avatar {
            position: relative;
            display: inline-block;
            /*width: 7.625rem;*/
            /*height: 7.625rem;*/
            border-radius: 0.3125rem;
        }

        label {
            color: #334257;
            text-transform: capitalize;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .avatar-circle .avatar-img,
        .avatar-circle .avatar-initials {
            border-radius: 50%;
        }

        .avatar-img {
            display: block;
            max-width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            pointer-events: none;
            border-radius: 0.3125rem;
        }

        .avatar-uploader-input {
            position: absolute;
            top: 0;
            inset-inline-end: 0;
            inset-inline-start: 0;
            z-index: -1;
            opacity: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(19, 33, 68, .25);
            border-radius: 50%;
            transition: .2s;
        }

        .avatar-uploader-trigger {
            position: absolute;
            bottom: 0;
            inset-inline-end: 0;
            cursor: pointer;
            border-radius: 50%;
        }

        .avatar-xxl .avatar-uploader-icon {
            width: 2.1875rem;
            height: 2.1875rem;
        }

        .shadow-soft {
            box-shadow: 0 3px 6px 0 rgba(140, 152, 164, .25) !important;
        }

        .avatar-uploader-icon {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-align: center;
            align-items: center;
            color: #677788;
            background-color: #fff;
            border-radius: 50%;
            transition: .2s;
        }

        .field-icon {
            float: right;
            margin-right: 12px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }
    </style>
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/quill.snow.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-property-listing.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/app-ecommerce-product-list.js') }}"></script>
    </script>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">App Settings /</span> App Info
            </h4>
            <div class="row g-4">
                <div class="col-12 col-lg-12 pt-4 pt-lg-0">
                    <div class="tab-content p-0">
                        <!-- Locations Tab -->
                        <form class="tab-pane fade show active" action="{{ route('settings.appsetting.appinfo.store') }}"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $appInfo->id ?? '' }}">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="col-md-3 flex-grow-1 container-p-y w-100 d-flex justify-content-center">
                                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                            <label
                                                class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                                                for="avatarUploader">
                                               <img id="viewer"
     onerror="this.src='https://efood-admin.6amtech.com/public/assets/admin/img/160x160/img1.jpg'"
     class="avatar-img"
     src="{{ $appInfo && $appInfo->image ? asset('storage/' . $appInfo->image) : 'https://efood-admin.6amtech.com/public/assets/admin/img/160x160/img1.jpg' }}"
     alt="Image">

                                                <input type="file" name="image"
                                                    class="js-file-attach avatar-uploader-input" id="customFileEg1"
                                                    accept=".jpg, .png, .jpeg, .webp">
                                                <label class="avatar-uploader-trigger" for="customFileEg1">
                                                    <i class="tio-edit avatar-uploader-icon fa fa-pencil shadow-soft"></i>
                                                </label>
                                            </label>
                                        </a>
                                    </div>
                                    <label for="">City</label>
                                <input type="text" class="form-control mb-2" name="city" id="city" value="{{ @$appInfo->city }}" required>

                                    <label for="">ZipCode</label>
                                    <input type="text" class="form-control mb-2" name="zipcode" id="zipcode" value="{{ @$appInfo->zipcode }}" required>
                                    <label for="">Address</label>
                                    <input type="text" class="form-control mb-2" name="address" id="email" value="{{ @$appInfo->address }}" required>
                                    <label for="">House Number</label>
                                    <input type="text" class="form-control mb-2" name="house_number" id="house_number" value="{{ @$appInfo->house_number }}" required>
                                    <label for="">St no.</label> 
                                    <label for="">Description</label>
                                    <div id="snow-toolbar">
                                        <span class="ql-formats">
                                            <select class="ql-font"></select>
                                            <select class="ql-size"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-strike"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <select class="ql-color"></select>
                                            <select class="ql-background"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-script" value="sub"></button>
                                            <button class="ql-script" value="super"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-header" value="1"></button>
                                            <button class="ql-header" value="2"></button>
                                            <button class="ql-blockquote"></button>
                                            <button class="ql-code-block"></button>
                                        </span>
                                    </div>
                                    <div id="snow-editor">
                                    </div>
                                    <input type="hidden" id="textedit_content" name="description" value=""
                                        class="form-control" />
                                    <div class="d-flex justify-content-end gap-3 mt-4">
                                        <button type="submit" id="btn-app-info" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        var appinfo = `<?php echo $appInfo->description ?? ''; ?>`;
    </script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/js/forms-editors.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function() {
            readURL(this);
        });
    </script>
@endsection
