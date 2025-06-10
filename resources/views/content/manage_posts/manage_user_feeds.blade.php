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

        <style>.see-all-link {
            font-family: 'Genos', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            color: #343a40;
            /* dark gray */
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .see-all-link .arrow {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .see-all-link:hover {
            color: #007bff;
            /* Bootstrap primary color */
        }

        .see-all-link:hover .arrow {
            transform: translateX(4px);
        }
    </style>

    </style>
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

        .modal-content, .modal-card {
    
    overflow: inherit !important;
   

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
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
    <script src="https://unpkg.com/video.js/dist/video.min.js"></script>
    <script src="https://unpkg.com/wavesurfer.js"></script>

@endsection

@section('content')

    <div class="content-wrapper">


        <div class="card pb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/svg/svg-dialog/reported-feeds.svg') }}" alt="">
                    <div class="ms-2">
                        <p class="mb-0">Reported Feeds</p>
                        <small>Total: {{ $reportfeeds->total() }}</small>
                    </div>
                </div>

                @if ($reportfeeds->count() > 3)
                    <a href="{{ route('manage.user.reportedfeeds') }}"
                        class="see-all-link d-flex align-items-center gap-2 text-dark">
                        See All
                        <img src="{{ asset('assets/img/Multiple Forward Right.svg') }}" alt="arrow"
                            class="see-all-arrow" style="width: 25px; height: 25px;">
                    </a>
                @endif
            </div>

            <div class="view-wrapper">
                <input type="hidden" name="feed_id" id="feed_id">
                <input type="hidden" name="feed_type" id="feed_type" value="user_feeds">
                <input type="hidden" name="comment_parent_id" id="comment_parent_id">

                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($reportfeeds as $report)
                            @php $feed = $report->feed; @endphp
                            @if ($feed)
                                <div class="col-md-3">
                                    <div class="post-image">
                                        <!-- Dropdown Menu - Correctly placed inside post-image but outside card is-post -->
                                        <div class="nav-item dropdown d-block"
                                            style="position: absolute; right: 6px; top: 6px; z-index: 1000;">
                                            <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}"
                                                        alt="">
                                                </div>
                                            </a>
                                            <div class="dropdown-menu text-center dropdown-menu-end" style="width: 100px;">
                                                <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                                <form action="{{ route('history.destroy', $feed->id) }}"
                                                    onsubmit="confirmAction(event, () => event.target.submit())"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="row ml-0" style="width:100px;">
                                                        <div class="col-md-6" style="border-right: 1px solid #c0c0c0">
                                                            <a class="dropdown-item edit-history" style="padding: 0"
                                                                href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#createhistoryModal"
                                                                data-id="{{ $feed->id }}"
                                                                data-name="{{ $feed->title }}"
                                                                data-source="{{ $feed->source }}"
                                                                data-thumbnail="{{ asset('storage/' . $feed->thumbnail) }}"
                                                                data-comments="{{ $feed->is_comments }}"
                                                                data-share="{{ $feed->is_share }}"
                                                                data-emoji="{{ $feed->is_emoji }}">
                                                                <img class="pop_action_image" style="height: 26px"
                                                                    src="{{ asset('assets/svg/edit.svg') }}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="dropdown-item" style="padding: 0">
                                                                <img class="pop_action_image" style="height: 26px"
                                                                    src="{{ asset('assets/svg/delete.svg') }}">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                            data-fancybox="post1" data-lightbox-type="comments"
                                            data-id="{{ $feed->_id }}"
                                            @if (isset($feed->images[0])) data-thumb="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                        href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                        data-demo-href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                    @elseif (isset($feed->videos[0]))
                                        data-thumb="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                        href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                        data-demo-href="{{ asset('storage/' . $feed->videos[0]['path']) }}" @endif>

                                            <div class="content-wrap">
                                                <!-- User Info Section -->
                                                <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                    <div class="user-block">
                                                        <div class="user-info">
                                                            <div class="row g-4">
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type . '.svg') }}"
                                                                        style="width: 25px; height: 25px; background-color: #fff; padding: 4px; border-radius: 4px; margin: 9px 6px;">
                                                                </div>
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                        style="width: 25px; height: 25px; border-radius: 4px; margin: 9px 6px;"
                                                                        onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <p class="m-0"
                                                                        title="{{ optional($feed->user)->name }}">
                                                                        <b>{{ optional($feed->user)->name }}</b>
                                                                    </p>
                                                                    <small class="time">
                                                                        <i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}"
                                                                class="user-heart">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feed Content -->
                                                <div class="card-body p-0">
                                                    @if (isset($feed->images[0]))
                                                        <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});"
                                                            class="card-post-thumbnail"></div>
                                                    @else
                                                        <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');"
                                                            class="card-post-thumbnail"></div>
                                                    @endif
                                                </div>

                                                <!-- Feed Stats -->
                                                <div class="mt-2 mb-0">
                                                    <div
                                                        style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;background-color:#f8f9fa;border-radius:5px;">
                                                        <div
                                                            style="display:flex;align-items:center;width:100%;height:100%">
                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                                <img src="{{ asset('assets/svg/svg-dialog/Eye Scan.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <span style="font-weight:400;font-family:Genos">0</span>
                                                            </div>

                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/share.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <span style="font-weight:400;font-family:Genos">0</span>
                                                            </div>

                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <span style="font-weight:400;font-family:Genos">0</span>
                                                            </div>

                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%;margin-right:12px;padding:5px;margin-left:2px">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <span style="font-weight:400;font-family:Genos">0</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Report Info Section -->
                                        <div style="background-color: pink; border-radius:6px" class="p-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <button class="btn btn-white p-3">ID :
                                                        {{ optional($feed->user)->user_id }}</button>
                                                </div>
                                                <div class="d-flex align-items-center" style="gap: 7px;">
                                                    <button class="btn btn-white_01 p-3">11.10.2025</button>
                                                </div>
                                            </div>
                                            <p class="mb-0 mt-2 p-1"
                                                style="font-size: 14px; background: #fff; border-radius: 4px;">
                                                Reason: {{ $report->report_type }}
                                            </p>
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

            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/svg/svg-dialog/reported-feeds.svg') }}" alt="">
                    <div class="ms-2">
                        <p class="mb-0">Reported Comments</p>
                        <small>Total: {{ $reportscomments->total() }}</small>
                    </div>
                </div>

                @if ($reportfeeds->count() > 3)
                    <a href="{{ route('reportedcommmentsindex') }}"
                        class="see-all-link d-flex align-items-center gap-2 text-dark">
                        See All <img src="{{ asset('assets/img/Multiple Forward Right.svg') }}" alt="arrow"
                            class="see-all-arrow" style="width: 25px; height: 25px;">
                    </a>


                @endif
            </div>
            <div class="view-wrapper">
                <input type="hidden" name="feed_id" id="feed_id">
                <input type="hidden" name="feed_type" id="feed_type" value="user_feeds">
                <input type="hidden" name="comment_parent_id" id="comment_parent_id">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($reportscomments as $reportcomments)
                            @php
                                $comment = $reportcomments->comments;
                                $feed = optional($comment)->feed;
                                $user = optional($feed)->user;
                                $reportUser = optional($reportcomments)->users;
                            @endphp

                            <div class="col-md-3">
                                <div class="post-image">
                                    <div id="feed-card-{{ $feed->id }}"
                                        class="card is-post mt-4 p-1 mb-0 view-post card-post" data-fancybox="post1"
                                        data-lightbox-type="comments" data-id="{{ $feed->_id }}"
                                        @if (isset($feed->images[0])) data-thumb="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                        href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                        data-demo-href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                    @else
                                                        @if (isset($feed->videos[0]))
                                                            data-thumb="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                            href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                            data-demo-href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                    @else @endif
                                        @endif
                                        >
                                        <!-- Main wrap -->
                                        <div class="content-wrap">
                                            <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                <div class="user-block">
                                                    <div class="user-info">
                                                        <div class="row g-4">
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type) . '.svg' }}"
                                                                    style="width: 25px !important;height: 25px !important;background-color: #fff;padding: 4px;border-radius: 4px !important;margin: 9px 6px;">
                                                            </div>
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                    style="width: 25px !important;height: 25px !important;border-radius: 4px !important;margin: 9px 6px;"
                                                                    onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="m-0"
                                                                    title="{{ optional($feed->user)->name }}">
                                                                    <b>{{ optional($feed->user)->name }}</b>
                                                                </p>
                                                                <small class="time">
                                                                    {{-- <i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i> --}}
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}"
                                                            class="user-heart">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Post body -->
                                            <div class="card-body p-0">

                                                {{-- <div style="background-image: url('https://admin.yekbun.net/public/storage/thumbnails/6812114dabdb3___%C5%9Eeyda_-_Were_thumb_2.jpg');"
                                                        class="card-post-thumbnail">
                                                    </div> --}}

                                                @if (isset($feed->images[0]))
                                                    <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});"
                                                        class="card-post-thumbnail">
                                                    </div>
                                                @else
                                                    <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');"
                                                        class="card-post-thumbnail">
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;background-color:#f8f9fa;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Eye Scan.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>

                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/share.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>

                                                        {{-- @if ($feed->is_comments == 1) --}}
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                        {{-- @endif --}}
                                                        {{-- @if ($feed->is_share == 1) --}}
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;margin-right:12px;padding:5px;margin-left:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                        {{-- @endif --}}
                                                    </div>
                                                    {{-- @if ($feed->is_emoji == 1) --}}
                                                    <div
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                            style="width:100%;height:100%;object-fit:cover">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                            style="width:100%;height:100%;object-fit:cover">
                                                        <span style="font-weight:400;font-family:Genos">0</span>
                                                    </div>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>



                                        </div>
                                        <div style="background-color: pink; border-radius:6px" class="p-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <button
                                                        class="btn btn-white p-3">ID:{{ optional($feed->user)->user_id }}</button>

                                                </div>
                                                <div class="d-flex align-items-center" style="gap: 7px;">
                                                    <button class="btn btn-white_01 p-3">11.10.2025</button>

                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center"> <img
                                                    src="{{ $reportcomments->users && $reportcomments->users->image
                                                        ? (Str::startsWith($reportcomments->users->image, ['http://', 'https://'])
                                                            ? $reportcomments->users->image
                                                            : asset('storage/' . $reportcomments->users->image))
                                                        : 'https://www.w3schools.com/w3images/avatar2.png' }}"
                                                    style="width: 25px !important; height: 25px !important;  border-radius: 4px !important; margin: 9px 6px;">
                                                <div class="w-100 d-flex flex-column">
                                                    <div class="mb-0 mt-2 p-1"
                                                        style="font-size: 14px;  border-radius: 4px; background: #fff; ">
                                                        <span
                                                            style="font-weight: bold;">{{ $comment->user->name ?? 'Anonymous' }}</span>

                                                        @if ($reportcomments->comments)
                                                            @php $comment = $reportcomments->comments; @endphp

                                                            @if ($comment->comment_type === 'normal' && $comment->comment)
                                                                <p class="mb-0">{{ $comment->comment ?? '' }} </p>
                                                            @elseif ($comment->comment_type === 'audio' && $comment->audio)
                                                                <audio controls style="width: -webkit-fill-available;">
                                                                    <source
                                                                        src="{{ asset('storage/' . $comment->audio) }}"
                                                                        type="audio/mpeg">
                                                                    Your browser does not support the audio element.
                                                                </audio>
                                                            @elseif ($comment->comment_type === 'emoji' && $comment->emoji)
                                                                <span
                                                                    style="font-size: 24px;">{{ $comment->emoji }}</span>
                                                            @else
                                                                <em>No content available.</em>
                                                            @endif
                                                        @else
                                                            <em>Comment not found.</em>
                                                        @endif
                                                    </div>
                                                </div>








                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown d-block"
                                        style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}"
                                                    alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu text-center dropdown-menu-end"
                                            style="min-width: unset; width: 100px;">
                                            <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                            <form action="{{ route('history.destroy', $feed->id) }}"
                                                onsubmit="confirmAction(event, () => event.target.submit())"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row ml-0" style="width:100px;">

                                                    <div class="col-md-6" style="border-right: 1px solid #c0c0c0">
                                                        <a class="dropdown-item open-edit-modal" href="javascript:void(0)"
                                                            data-id="{{ $feed->id }}"
                                                            data-comment-id="{{ $comment->id }}">
                                                            view
                                                        </a>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" data-id="681b3efba782bfb52205cc22"
                                                            class="dropdown-item" style="padding: 0">
                                                            <img class="pop_action_image" style="height: 26px"
                                                                src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

   <div class="modal fade" id="editFeedModal" tabindex="-1" aria-labelledby="editFeedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 98%; width: 98%;">
        <div class="modal-content" style="background: transparent; border: none; box-shadow: none; width:800px !important;">

            <div class="d-flex flex-row justify-content-between align-items-start" style="gap: 30px; flex-wrap: nowrap;">

                <!-- Left Panel (Auto height, Feed Edit) -->
                <div class="bg-white shadow " style="width: 58%; padding: 20px; border-radious:12px !important">
                    <div id="editFeedContent">
                        <h4>Edit Feed</h4>
                        <p>This is short content. The height should remain minimal.</p>
                    </div>
                </div>

                <!-- Right Panel (Full Height, No Scroll) -->
                <div class="bg-white shadow " style="width: 48%; position: relative;  border-radious:12px !important">
                    <!-- One Close Icon (top-right) -->
                    <button type="button" class="close position-absolute"
                        style="
    top: -27px;
    right: -56px;
    color: white;
    opacity: 1;
    z-index: 10;
    background: transparent;
    border: 2px solid #fff;
    border-radius: 50px;
    padding: 4px 14px;
    font-size: 22px;
" onclick="$('#editFeedModal').modal('hide')">
                        &times;
                    </button>

                    <div class="reported-feeds">
                        <div class="header mb-3">
                            <h2>Reported Feeds</h2>
                            <p>Manage User Feeds</p>
                        </div>

                        <!-- User Info -->
                        <center>
                            <div class="user-info">
                                <div><img src="{{ asset('images/user-clips-report-user.png') }}" class="profile-img" /></div>
                                <div class="user-details">
                                    <div class="d-flex" style="margin: 0 auto; width: 155px;">
                                        <strong>User Name</strong>
                                        <b><span class="mt-1 ml-2"><span class="text-danger">3</span> of <span class="text-success">5</span> Flags</span></b>
                                    </div>
                                    <div class="locations">
                                        <img src="{{ asset('images/kurdistan-flag-sm.png') }}" alt="">
                                        Rojava · Qamishlo ·
                                        <img src="{{ asset('images/germany-flag-sm.png') }}" alt="">
                                        Hannover
                                    </div>
                                </div>
                            </div>
                        </center>

                        <!-- Action Form -->
                        <form class="action-form">
                            <label class="action level0">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-0.svg') }}" alt=""></div>
                                <div><strong>Level #0</strong>
                                    <p class="m-0">Ignore the Clip</p>
                                </div>
                                <input type="radio" name="action-level" checked />
                            </label>

                            <label class="action level1">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-1.svg') }}" alt=""></div>
                                <div><strong>Level #1</strong>
                                    <p class="m-0">Delete Clip, Flag User</p>
                                </div>
                                <input type="radio" name="action-level" />
                            </label>

                            <label class="action level2">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-2.svg') }}" alt=""></div>
                                <div>
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

                            <label class="action level3">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-3.svg') }}" alt=""></div>
                                <div>
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

                            <label class="action level4">
                                <div class="icon"><img src="{{ asset('images/user-clips-level-4.svg') }}" alt=""></div>
                                <div>
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
    </div>
</div>






        <!-- Latest Feeds -->
        <div class="card pb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/svg/svg-dialog/reported-feeds.svg') }}" alt="">
                    <div class="ms-2">
                        <p class="mb-0">Latest Feeds</p>
                        <small>Total: {{ $feeds->total() }}</small>
                    </div>
                </div>

                @if ($feeds->count() > 3)
                    <a href="{{ route('manage.user.latestfeed') }}" class="btn btn-primary btn-md" id="see-more-btn">
                        See More
                    </a>
                @endif
            </div>
            <div class="view-wrapper">
                <input type="hidden" name="feed_id" id="feed_id">
                <input type="hidden" name="feed_type" id="feed_type" value="user_feeds">
                <input type="hidden" name="comment_parent_id" id="comment_parent_id">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($feeds as $feed)
                            <div class="col-md-3">
                                <div class="post-image">
                                    <div id="feed-post-1" class="card is-post mt-4 p-1 mb-0 view-post card-post"
                                        data-fancybox="post1" data-lightbox-type="comments"
                                        data-id="{{ $feed->_id }}"
                                        @if (isset($feed->images[0])) data-thumb="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                        href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                        data-demo-href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                    @else
                                                        @if (isset($feed->videos[0]))
                                                            data-thumb="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                            href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                            data-demo-href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                    @else @endif
                                        @endif
                                        >
                                        <!-- Main wrap -->
                                        <div class="content-wrap">
                                            <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                <div class="user-block">
                                                    <div class="user-info">
                                                        <div class="row g-4">
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type) . '.svg' }}"
                                                                    style="width: 25px !important;height: 25px !important;background-color: #fff;padding: 4px;border-radius: 4px !important;margin: 9px 6px;">
                                                            </div>
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                    style="width: 25px !important;height: 25px !important;border-radius: 4px !important;margin: 9px 6px;"
                                                                    onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="m-0"
                                                                    title="{{ optional($feed->user)->name }}">
                                                                    <b>{{ optional($feed->user)->name }}</b>
                                                                </p>
                                                                <small class="time">
                                                                    {{-- <i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i> --}}
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}"
                                                            class="user-heart">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Post body -->
                                            <div class="card-body p-0">

                                                {{-- <div style="background-image: url('https://admin.yekbun.net/public/storage/thumbnails/6812114dabdb3___%C5%9Eeyda_-_Were_thumb_2.jpg');"
                                                        class="card-post-thumbnail">
                                                    </div> --}}

                                                @if (isset($feed->images[0]))
                                                    <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});"
                                                        class="card-post-thumbnail">
                                                    </div>
                                                @else
                                                    <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');"
                                                        class="card-post-thumbnail">
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- /Post body -->
                                            <div class="mt-2 mb-0">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;gap:10px;width:100%;background-color:#f8f9fa;border-radius:5px;">
                                                    <div style="display:flex;align-items:center;width:100%;height:100%">
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Eye Scan.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>

                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/share.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>

                                                        {{-- @if ($feed->is_comments == 1) --}}
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                        {{-- @endif --}}
                                                        {{-- @if ($feed->is_share == 1) --}}
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;margin-right:12px;padding:5px;margin-left:2px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                        {{-- @endif --}}
                                                    </div>
                                                    {{-- @if ($feed->is_emoji == 1) --}}
                                                    <div
                                                        style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                            style="width:100%;height:100%;object-fit:cover">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                            style="width:100%;height:100%;object-fit:cover">
                                                        <span style="font-weight:400;font-family:Genos">0</span>
                                                    </div>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /Main wrap -->
                                        <div style="background-color: pink; border-radius:6px" class="p-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <button
                                                        class="btn btn-white p-3">ID:{{ optional($feed->user)->user_id }}</button>

                                                </div>
                                                <div class="d-flex align-items-center" style="gap: 7px;">
                                                    <button class="btn btn-white_01 p-3">11.10.2025</button>

                                                </div>
                                            </div>
                                            <p class="mb-0 mt-2 p-1"
                                                style="    font-size: 14px;
    background: #fff; border-radius: 4px;">
                                                Reason:
                                                ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown d-block"
                                        style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}"
                                                    alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu text-center dropdown-menu-end"
                                            style="min-width: unset; width: 100px;">
                                            <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                            <form action="{{ route('history.destroy', $feed->id) }}"
                                                onsubmit="confirmAction(event, () => event.target.submit())"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row ml-0" style="width:100px;">

                                                    <div class="col-md-6" style="border-right: 1px solid #c0c0c0">
                                                        <a class="dropdown-item edit-history" style="padding: 0"
                                                            href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#createhistoryModal"
                                                            data-id="{{ $feed->id }}"
                                                            data-name="{{ $feed->title }}"
                                                            data-source="{{ $feed->source }}"
                                                            data-thumbnail="{{ asset('storage/' . $feed->thumbnail) }}"
                                                            {{-- data-path="{{ $feed->feed_type == 'videos' ? $feed->videos[0]['path'] : $feed->images[0]['path'] }}" --}}
                                                            data-comments="{{ $feed->is_comments }}"
                                                            data-share="{{ $feed->is_share }}"
                                                            data-emoji="{{ $feed->is_emoji }}" for="customRadioPrime">
                                                            <img class="pop_action_image" style="height: 26px"
                                                                src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" data-id="681b3efba782bfb52205cc22"
                                                            class="dropdown-item" style="padding: 0">
                                                            <img class="pop_action_image" style="height: 26px"
                                                                src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Feeds -->



        <div class="content-backdrop fade"></div>
    </div>

    <script>
        function delete_service(el) {
            let link = $(el).data('id');
            $('.deleted-modal').modal('show');
            $('#delete_form').attr('action', link);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.open-edit-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    const feedId = this.dataset.id;

                    // Fix: Correct ID selector
                    const originalCard = document.querySelector('#feed-card-' + feedId);

                    if (originalCard) {
                        const modalBody = document.getElementById(
                            'editFeedContent'); // Fix: Correct modal body ID
                        modalBody.innerHTML = ''; // Clear old content
                        modalBody.appendChild(originalCard.cloneNode(true)); // Clone and insert
                        const modal = new bootstrap.Modal(document.getElementById('editFeedModal'));
                        modal.show();
                    } else {
                        alert("Feed card not found.");
                    }
                });
            });
        });
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
        {{-- <script>
        // Scroll right by 300px
        $('#scrollRight').click(function() {
            const container = document.getElementById('main-feed');
            container.scrollLeft += 300;

            // If near end, load more
            if (container.scrollWidth - container.clientWidth - container.scrollLeft < 400) {
                loadMoreFeeds();
            }
        });

        // Scroll left by 300px
        $('#scrollLeft').click(function() {
            document.getElementById('main-feed').scrollLeft -= 300;
        });
    </script>

    <script>
        const slider = document.getElementById('main-feed');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('dragging');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('dragging');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('dragging');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2; // Scroll-fast multiplier
            slider.scrollLeft = scrollLeft - walk;
        });

        // Optional: Mobile touch support
        let touchStartX = 0;
        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('touchmove', (e) => {
            const touchX = e.touches[0].clientX;
            const walk = (touchStartX - touchX) * 2;
            slider.scrollLeft = scrollLeft + walk;
        });
    </script> --}}

    @endsection
@endsection
