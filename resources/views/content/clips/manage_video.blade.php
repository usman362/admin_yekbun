@extends('layouts/layoutMaster')

@section('title', 'User Clips')

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

        .fancybox-content {
            /* width: 246px !important;
                                                                height: 433px !important; */
            border-radius: 8px !important;
        }

        .fancybox-content {
            background: none !important;
        }

        .fancybox-iframe,
        .fancybox-video {
            border-radius: 8px !important;
        }
    </style>

    <style>
        .reported-feeds {
            max-width: 340px;
            font-family: 'Segoe UI', sans-serif;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 16px;
            font-family: 'Genos';
        }

        .header {
            text-align: center;
            position: relative;
            margin-bottom: 16px;
        }

        .header h2 {
            font-size: 16px;
            margin: 0;
        }

        .header p {
            font-size: 12px;
            color: gray;
            margin: 0;
        }

        .close-btn {
            position: absolute;
            top: 0;
            right: 0;
            background: none;
            border: none;
            font-size: 20px;
            color: red;
            cursor: pointer;
        }

        .user-info {
            /* display: flex; */
            align-items: center;
            background: #fafafa;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .profile-img {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #1fc9a1;
        }

        .user-details strong {
            display: block;
        }

        .user-details span {
            font-size: 12px;
            color: gray;
        }

        .locations {
            font-size: 12px;
            margin-top: 4px;
        }

        .locations img {
            width: 10px;
        }

        .action-form .action {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 12px;
            cursor: pointer;
            background: #f9f9f9;
            transition: 0.2s ease;
            position: relative;
        }

        .action input[type="radio"] {
            margin-top: 5px;
            position: absolute;
            right: 8px;
            width: 20px;
            height: 20px;
            background-color: white;
            appearance: none;
            border: 1px solid #00000036;
            border-radius: 12px;
        }

        .action input[type="radio"]:checked {
            background-color: #ffffff;
            border: 6px solid #1DC9A0;
        }

        .icon {
            font-size: 20px;
            margin-top: 2px;
        }

        .dropdowns {
            display: flex;
        }

        .dropdowns select {
            margin-right: 8px;
            margin-top: 4px;
            padding: 6px;
            font-size: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .warning {
            font-size: 12px;
            color: red;
            margin-top: 6px;
            background-color: #fff;
            text-align: center;
            padding: 4px 8px;
            border-radius: 15px;
        }

        .submit-btn {
            width: 100%;
            background: #00c78b;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 12px;
        }

        .level0 {
            background: #eafaf3;
            border-color: #00c78b;
        }

        .level1 {
            background: #fef2f2;
            border-color: #f87171;
        }

        .level2 {
            background: #f3f4f6;
        }

        .level3 {
            background: #f3f4f6;
        }

        .level4 {
            background: #fef2f2;
            border-color: #ef4444;
        }

        .fancybox-slide--html .fancybox-close-small {
            color: rgb(255 255 255);
            padding: 10px;
            right: 0;
            top: 0;
            border: 1px solid;
            border-radius: 30px;
        }

        .modal-body {
            overflow-y: scroll !important;
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
    {{-- <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script> --}}

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
                        <small>{{ $clips->count() }} Templates</small>
                    </div>
                </div>

                <a href="javascript:void(0)" class="btn btn-primary create-template btn-md" data-bs-toggle="modal"
                    data-bs-target="#createClipsTemplateModal" style="z-index: 2">
                    Upload Template
                </a>

            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($templates as $clip)
                            <div class="col-md-2">
                                <div class="post-image text-white">
                                    <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                        {{-- data-fancybox data-src="#video-popup" href="javascript:;"
                                        data-thumb="{{ asset('videos/user-clip.mp4') }}"
                                        data-id="67ef066938c58e2bce0a4d72"
                                        data-demo-href="{{ asset('videos/user-clip.mp4') }}" --}}
                                        style="
                                    background-color: #7f7f7f;
                                    height:335px;width:210px;background-size:cover;">
                                        <!-- Main wrap -->
                                        <div class="content-wrap">
                                            <!-- Post body -->
                                            <div class="card-body p-0">
                                                <div id="lottie-animation-{{ $clip->id }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0"
                                        style="top: 0;left:5px;position: absolute;bottom: auto;width:95%">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div
                                                    style="background-color: rgba(0, 0, 0, 0.2);border-radius:8px;padding: 2px 6px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                                        width="15" alt=""> <span
                                                        class="text-white">{{ $clip->educated_price == 'free' ? 'Free' : '0,99 €' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    style="background-color: rgba(0, 0, 0, 0.2);border-radius:8px;padding: 2px 6px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/cultivated.svg') }}"
                                                        width="15" alt=""> <span
                                                        class="text-white">{{ $clip->cultivated_price == 'free' ? 'Free' : '0,49 €' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Post body -->
                                    <div class="mt-2 mb-0" style="top: 260px;left:5px;position: absolute;bottom: auto;">
                                        <div
                                            style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                            <div style="display:flex;align-items:center;width:100%;height:100%">


                                                <div class="text-white"
                                                    style="align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;font-weight:bold">
                                                    <h4 class="text-white"><b>{{ substr($clip->id, 0, 5) }}</b>
                                                    </h4>
                                                    <p>{{ $clip->created_at->format('d M Y') }}</p>
                                                </div>
                                            </div>

                                            <div class="text-white"
                                                style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">

                                                <div class="nav-item dropdown d-block"
                                                    style="margin-top: 0;position: absolute;right: -46px;top: 6px;bottom: auto;left: 154px;">
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
                                                        @php
                                                            $message = 'Are you sure you want to delete this?';
                                                            if ($clip->clips->count() > 0) {
                                                                $message =
                                                                    'This template contains clips. Do you want to delete it along with its clips?';
                                                            }
                                                        @endphp
                                                        <form action="{{ route('delete.clipsTemplate', $clip->id) }}"
                                                            onsubmit="confirmAction(event, () => event.target.submit(),'{{ $message }}')"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="row ml-0" style="width:100px;">

                                                                <div class="col-md-6"
                                                                    style="border-right: 1px solid #c0c0c0">
                                                                    <a class="dropdown-item edit-template"
                                                                        style="padding: 0" href="javascript:void(0)"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#createClipsTemplateModal"
                                                                        data-id="{{ $clip->id }}"
                                                                        data-name="{{ $clip->title }}"
                                                                        data-educated_price="{{ $clip->educated_price }}"
                                                                        data-cultivated_price="{{ $clip->cultivated_price }}"
                                                                        for="customRadioPrime">
                                                                        <img class="pop_action_image" style="height: 26px"
                                                                            src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="dropdown-item"
                                                                        style="padding: 0">
                                                                        <img class="pop_action_image" style="height: 26px"
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="card pb-4">
            <div class="card-header">
                <div>
                    <p>User Clips</p>
                    <small>{{ $clips->count() }} Clips 125 TB</small>
                </div>
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($clips as $clip)
                            @if ($clip->video !== null && $clip->video !== 'undefined' && !empty($clip->video))
                                <div class="col-md-2">
                                    <div class="post-image text-white">
                                        <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                            data-fancybox data-src="#video-popup" href="javascript:;"
                                            data-thumb="{{ asset('storage/' . $clip->thumbnail) }}" {{-- href="{{ asset('videos/user-clip.mp4') }}" --}}
                                            data-id="{{ $clip->id }}"
                                            data-demo-href="{{ asset('storage/' . $clip->video) }}"
                                            data-user_id="{{ $clip->user_id }}"
                                            data-user_name="{{ ($clip->user->name ?? 'N/A') . ' ' . ($clip->user->last_name ?? '')  }}"
                                            data-user_image="{{ $clip->user ? ( !empty($clip->user->image) ? asset('storage/' . $clip->user->image) : asset('images/user-clips-report-user.png') ) : asset('images/user-clips-report-user.png') }}"
                                            data-user_level="{{ $clip->user->level ?? 0 }}"
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
                                                                <p style="font-size: 9px" class="ml-2 text-white">Rojava
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Post body -->
                                                <div class="card-body p-0">
                                                    <!-- /Post body -->
                                                    <div class="mt-2 mb-0"
                                                        style="top: 250px;position: relative;bottom: auto;">
                                                        <div
                                                            style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;border-radius:5px;">
                                                            <div
                                                                style="display:flex;align-items:center;width:100%;height:100%">


                                                                <div class="text-white"
                                                                    style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                                    <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg"
                                                                        style="width:100%;height:100%;object-fit:cover">
                                                                    <img src="http://127.0.0.1:2002/assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg"
                                                                        style="width:100%;height:100%;object-fit:cover">
                                                                    <span
                                                                        style="font-weight:400;font-family:Genos">0</span>
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
                            @endif
                        @endforeach
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
                                <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post" data-fancybox
                                    data-src="#video-popup" href="javascript:;"
                                    data-thumb="{{ asset('videos/user-clip.mp4') }}" {{-- href="{{ asset('videos/user-clip.mp4') }}" --}}
                                    data-id="67ef066938c58e2bce0a4d72"
                                    data-demo-href="{{ asset('videos/user-clip.mp4') }}"
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


        <div style="display: none;" id="video-popup">
            <div style="display: flex; gap: 20px; width: 100%; max-width: 90vw;">

                <!-- Left Column: Video -->
                <div style="flex: -1;">
                    <video class="fancybox-video" controls controlsList="nodownload"
                        poster="{{ asset('videos/user-clip.mp4') }}" style="width: 335px; height: auto;outline:none">
                        <source src="{{ asset('videos/user-clip.mp4') }}" type="video/mp4">
                        Your browser doesn't support video.
                    </video>
                </div>

                <!-- Right Column: Custom Report Panel -->
                <div style="flex: 1; overflow-y: auto;">
                    <div class="reported-feeds">
                        <div class="header">
                            <h2>Reported Feeds</h2>
                            <p>Manage User Feeds</p>
                            <button class="close-btn" data-fancybox-close>×</button>
                        </div>
                        <center>
                            <div class="user-info">
                                <div>
                                    <img src="{{ asset('images/user-clips-report-user.png') }}" alt="User Photo"
                                        class="profile-img" id="user_image" onerror="{{ asset('images/user-clips-report-user.png') }}"/>
                                </div>
                                <input type="hidden" id="user_id">
                                <div class="user-details">
                                    <div style="margin: 0 auto;width: 155px;">
                                        <strong id="user_name">User Name</strong>
                                        <b><span class="mt-1 ml-2"><span class="text-danger">3</span> of <span
                                                    class="text-success">5</span> Flags</span></b>
                                    </div>
                                    <div class="locations">
                                        <img src="{{ asset('images/kurdistan-flag-sm.png') }}" alt=""> Rojava
                                        · Qamishlo · <img src="{{ asset('images/germany-flag-sm.png') }}" alt="">
                                        Hannover
                                    </div>
                                </div>
                            </div>
                        </center>

                        <form class="action-form">
                            <!-- Level 0 -->
                            <label class="action level0">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-0.svg') }}"
                                        alt=""></div>
                                <div style="line-height: 1">
                                    <strong>Level #0</strong>
                                    <p class="m-0">Ignore the Clip</p>
                                </div>
                                <input type="radio" name="action-level" checked />
                            </label>

                            <!-- Level 1 -->
                            <label class="action level1">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-1.svg') }}"
                                        alt=""></div>
                                <div style="line-height: 1">
                                    <strong>Level #1</strong>
                                    <p class="m-0">Delete Clip, Flag User</p>
                                </div>
                                <input type="radio" name="action-level" />
                            </label>

                            <!-- Level 2 -->
                            <label class="action level2">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-2.svg') }}"
                                        alt=""></div>
                                <div style="line-height: 1">
                                    <strong>Level #2</strong>
                                    <p class="m-0">Delete Clip, Downgrade User</p>
                                    <div class="dropdowns">
                                        <select>
                                            <option>Select Reason</option>
                                        </select>
                                        <select>
                                            <option>Select Duration</option>
                                        </select>
                                    </div>
                                    <div class="warning">⚡ User Account will be downgraded to Educated</div>
                                </div>
                                <input type="radio" name="action-level" />
                            </label>

                            <!-- Level 3 -->
                            <label class="action level3">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-3.svg') }}"
                                        alt=""></div>
                                <div style="line-height: 1">
                                    <strong>Level #3</strong>
                                    <p class="m-0">Delete Clip, Suspend User</p>
                                    <div class="dropdowns">
                                        <select>
                                            <option>Select Reason</option>
                                        </select>
                                        <select>
                                            <option>Select Duration</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="radio" name="action-level" />
                            </label>

                            <!-- Level 4 -->
                            <label class="action level4">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-4.svg') }}"
                                        alt=""></div>
                                <div style="line-height: 1">
                                    <strong>Level #4</strong>
                                    <p class="m-0">Remove Account, Block User</p>
                                    <div class="dropdowns">
                                        <select>
                                            <option>Select Reason</option>
                                        </select>
                                        <select>
                                            <option>Select Device</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="radio" name="action-level" />
                            </label>

                            <button type="submit" class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.1/lottie.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($templates as $clip)
                lottie.loadAnimation({
                    container: document.getElementById('lottie-animation-{{ $clip->id }}'),
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: "{{ asset('storage/' . $clip->json_paths) }}"
                });
            @endforeach
        });
    </script>

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
    </script>
    <script>
        function confirmAction(event, callback, message) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: message,
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

        $('.edit-template').click(function() {
            let template_id = $(this).attr('data-id');
            let title = $(this).attr('data-name');
            let educated_price = $(this).attr('data-educated_price');
            let cultivated_price = $(this).attr('data-cultivated_price');
            $('#template_id').val(template_id);
            $('#title').val(title);
            $('#educated_price').val(educated_price);
            $('#cultivated_price').val(cultivated_price);
        })

        $('.create-template').click(function() {
            $('#template_id').val('');
            $('#title').val('');
            $('#educated_price').val('free');
            $('#cultivated_price').val('free');
        })

        $('.view-post').click(function() {
            $('video').each(function() {
                this.pause();
                this.currentTime = 0; // reset to beginning
            });

            // $('.fancybox-slide .fancybox-content').after(`

        //  <h1>TEST TEST TEST</h1>
        //  `);

            $('#user_id').val($(this).attr('data-user_id'));
            $('#user_name').text($(this).attr('data-user_name'));
            $('#user_image').attr('src', $(this).attr('data-user_image'));
        })
    </script>
    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>


@endsection
@endsection
