@extends('layouts/layoutMaster')

@section('title', 'User Feeds')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        .custom-option-icon .form-check-input {
            background-color: transparent !important;
            border: none !important;
        }

        .form-check-input:checked,
        .form-check-input[type=checkbox] {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            background-image: none !important;
        }

        .dropdown.is-right .dropdown-menu {
            left: 56px;
            right: auto;
            padding: 0;
            top: -22px;
        }

        .dropdown-item h6,
        .h6,
        h5,
        .h5,
        h4,
        .h4,
        h3,
        .h3,
        h2,
        .h2,
        h1,
        .h1 {
            margin-bottom: 0 !important;
        }

        .card.is-post .user-block img,
        .shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .user-block img {
            width: 42px;
            height: 42px;
            border-radius: 0% !important;
        }

        .card.is-post .content-wrap .post-image img,
        .shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .content-wrap .post-image img {
            display: block;
            border-radius: 5px;
        }

        .card.is-post .content-wrap .card-footer .social-count .shares-count span,
        .shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .content-wrap .card-footer .social-count .shares-count span,
        .card.is-post .content-wrap .card-footer .social-count .comments-count span,
        .shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .content-wrap .card-footer .social-count .comments-count span,
        .card.is-post .content-wrap .card-footer .social-count .likes-count span,
        .shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .content-wrap .card-footer .social-count .likes-count span {
            display: block;
            font-size: 18px !important;
            color: #888da8;
            margin: 0 5px;
        }

        #tab2,
        #tab3 {
            display: none;
        }

        .pop_description {
            font-size: 14px;
            font-weight: 400;
            color: gray;
            text-align: left;
            background: #f7f7f7;
            padding: 7px;
            font-family: Genos;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: left;
        }
    </style>
    <style>
        .card-post {
            box-shadow: none;
            cursor: pointer;
        }

        .card-post:hover {
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
            background-clip: padding-box;
            cursor: pointer;
            background: #f6f6f6;
        }

        .card-post-thumbnail {
            height: 200px;
            width: 100%;
            background-size: 100% 230px;
            background-repeat: no-repeat;
            position: relative;
            border-radius: 12px;
        }

        .post-image {
            position: relative;
            width: 100%;
            font-family: 'Genos';
            margin: 0;
        }

        .post-image .dropdown {
            margin-top: -215px;
            display: none;
        }

        .dropdown-content {
            border: none !important;
        }

        .fancybox__container {
            z-index: 99999 !important;
        }

        .fancybox__nav {
            display: none !important;
        }

        .btn-white {
            background: #fff;
            padding: 0px 28px !important;
            display: flex;
            align-items: flex-start;
            justify-content: start;
            text-align: left;
            padding-left: 5px !important;
        }

        .btn-white_01 {
            background: #fff;
            padding: 2px 3px !important;
            display: flex;
            align-items: flex-start;
            justify-content: start;
            text-align: left;
            font-size: 12px;
        }

        .btn-white_01:hover {
            background: #fff;
        }


        .fancybox__thumbs {
            display: none !important;
        }

        .user-block {
            background-color: #F2F2F2;
            width: 230px;
            height: 30px;
            border-radius: 5px;
            position: relative;
        }

        .user-block .user-heart {
            width: 25px !important;
            height: 25px !important;
            border-radius: 4px !important;
            position: absolute;
            top: 2px;
            right: 2px;
        }

        .user-block small {
            margin-top: -9px !important;
        }

        .user-block p {
            margin-top: 4px !important;
        }

        .card-header {
            box-shadow: none;
            padding-bottom: 0;
        }

        .card-header div {
            font-family: Genos;
            line-height: 1;
            margin-left: 8px;
        }

        .card-header p {
            font-size: 18px;
            font-weight: bold;
        }

        .card-header small {
            font-size: 15px;
            font-style: italic;
            color: #888ea8;
        }

        .report-section {
            background-color: #ED1C244D;
            padding: 4px;
            border-radius: 5px;
            margin-top: 4px;
        }

        .report-section .d-flex:first-child {
            gap: 76px;
        }

        .report-section .fields {
            background-color: #fff;
            margin: 0 4px;
            padding: 0 4px;
            border-radius: 5px;
            font-size: 12px;
        }
    </style>
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/video.js/dist/video-js.min.css" rel="stylesheet">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-property-listing.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <!-- Concatenated js plugins and jQuery -->
    <script src="{{ asset('assets/friendkit/js/app.js') }}"></script>

    <!-- Core js -->
    <script src="{{ asset('assets/friendkit/js/global.js') }}"></script>

    <!-- Navigation options js -->
    <script src="{{ asset('assets/friendkit/js/navbar-v1.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-v2.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-mobile.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-options.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/sidebar-v1.js') }}"></script>

    <!-- Core instance js -->
    <script src="{{ asset('assets/friendkit/js/main.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/chat.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/touch.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/tour.js') }}"></script>

    <!-- Components js -->
    <script src="{{ asset('assets/friendkit/js/explorer.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/modal-uploader.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/popovers-users.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/popovers-pages.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
    <script src="https://unpkg.com/video.js/dist/video.min.js"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>
    <div class="content-wrapper">


        <div class="card pb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <p>Our Templates</p>
                        <small>10 Templates</small>
                    </div>
                </div>

                <a href="javascript:void(0)" class="btn btn-primary btn-md" data-bs-toggle="modal"
                    data-bs-target="#createClipsTemplateModal">
                    Upload Template
                </a>
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0" href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span
                                                                    style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0"
                                                                                href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span
                                                                    style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0"
                                                                                href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span
                                                                    style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0"
                                                                                href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span
                                                                    style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0"
                                                                                href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    style="background-image: url({{ asset('images/kung-fu-panda.png') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">

                                        <!-- Post body -->
                                        <div class="card-body p-0">

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 260px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                            <h4 class="text-white"><b>Template ID</b></h4>
                                                            <p>Upload Date Size</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <div class="nav-item dropdown d-block"
                                                            style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('images/user-clips-cog.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu text-center dropdown-menu-end"
                                                                style="min-width: unset; width: 100px;">
                                                                <span
                                                                    style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                <form action=""
                                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                                    method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-"
                                                                                style="padding: 0"
                                                                                href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createClipsTemplateModal"
                                                                                data-id="6818b59673c0ff4a020cea12"
                                                                                data-name="" data-source=""
                                                                                data-thumbnail="/public/storage"
                                                                                data-comments="" data-share=""
                                                                                data-emoji="" for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                data-id="681b3efba782bfb52205cc22"
                                                                                class="dropdown-item" style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="card pb-4">
            <div class="card-header">
                <div>
                    <p>User Clips</p>
                    <small>1.5k Clips 125 TB</small>
                </div>
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="card pb-4">
            <div class="card-header">
                <div>
                    <p class="text-danger">Reported Clips</p>
                    <small>10 Clips</small>
                </div>
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="post-image text-white">
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                    {{-- data-fancybox="post1" data-lightbox-type="comments" data-id="6818b59673c0ff4a020cea12"
                                    data-thumb="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png"
                                    data-demo-href="http://127.0.0.1:2002/storage/images/user_feeds/6818b596040d4___ReactNative-snapshot-image659965770860654689.png" --}}
                                    style="background-image: url({{ asset('images/user-clips-bg.jpg') }});height:335px;width:210px;background-size:cover;">
                                    <!-- Main wrap -->
                                    <div class="content-wrap">
                                        <div class="mt-2 mb-0">
                                            <div
                                                style="height:29px;display:flex;justify-content:space-between;align-items:center;width:100%;border-radius:5px;">
                                                <div style="display:flex;align-items:center;width:34%;height:100%">
                                                </div>

                                                <div
                                                    style="align-items:center;gap:2px;height:100%;width:66%;padding:5px 16px 5px 5px;">
                                                    <div style="display: flex">
                                                        <img src="{{ asset('images/user-clips-artist.png') }}"
                                                            style="width: 17px;height: 17px;border-radius: 100%;margin-top:6px">
                                                        <h6 class="ml-2 text-white">Artist Name</h6>
                                                    </div>
                                                    <div style="display: flex;margin-top:-6px">
                                                        <img src="{{ asset('images/user-clips-flag.png') }}"
                                                            style="width: 9px;height: 9px;border-radius: 100%;margin-top:2px;margin-left:20px">
                                                        <p style="font-size: 9px" class="ml-2 text-white">Rojava</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Post body -->
                                        <div class="card-body p-0">




                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0" style="top: 250px;position: relative;bottom: auto;">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">


                                                        <div class="text-white"
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="text-white"
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                        <i class="fas fa-play"></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <x-modal id="createClipsTemplateModal" title="Upload Layout" saveBtnText="Create" saveBtnType="submit"
            saveBtnForm="createForm" size="md">
            @include('content.include.clips.createTemplate')
        </x-modal>

        <div class="content-backdrop fade"></div>
    </div>

    <script>
        function delete_service(el) {
            let link = $(el).data('id');
            $('.deleted-modal').modal('show');
            $('#delete_form').attr('action', link);
        }
    </script>


@section('page-script')
    <script>
        $('.nav-tab a:first-child').addClass('active');
        $('.tab-content').hide();
        let ii = $('.tab-content');
        ii[1].style.display = 'block';
        // Click function
        $('.nav-tab a').click(function() {
            $('.nav-tab a').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').hide();

            var activeTab = $(this).attr('href');
            $(activeTab).fadeIn();
            return false;
        });

        $('.view-post').click(function() {
            $('video').each(function() {
                this.pause();
                this.currentTime = 0; // reset to beginning
            });
        })
    </script>
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


@endsection
@endsection
