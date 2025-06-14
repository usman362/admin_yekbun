@extends('layouts/layoutMaster')

@section('title', 'User Feeds')

@section('page-style')

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

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        /* Custom form check input */
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

/* Dropdown menu positioning */
.dropdown.is-right .dropdown-menu {
    left: 56px;
    right: auto;
    padding: 0;
    top: -22px;
}

/* Modal backdrop custom styles (80% black with opacity) */
.modal-backdrop-custom {
    background-color: rgb(0, 0, 0) !important; /* Full black with opacity */
    z-index: 1040 !important;
    transition: background-color 0.3s ease-out; /* Smooth transition for background color */
}

/* Final state of the backdrop when modal is active (80% black with full opacity) */
.modal-open .modal-backdrop-custom {
    background-color: rgb(0, 0, 0) !important; /* 80% black with full opacity */
}

/* Prevent background scrolling */
body.modal-open {
    overflow: hidden;
}

/* Modal content above backdrop */
.modal-content {
    z-index: 1050 !important;
}

/* Remove margin-bottom from all heading tags */
.dropdown-item h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
    margin-bottom: 0 !important;
}

/* User block image styling */
.card.is-post .user-block img,
.shop-wrapper .cart-container .cart-content .cart-summary .is-post.summary-card .user-block img {
    width: 42px;
    height: 42px;
    border-radius: 0% !important;
}

/* Post image styling */
.card.is-post .content-wrap .post-image img {
    display: block;
    border-radius: 5px;
}

/* Social count styling */
.card.is-post .content-wrap .card-footer .social-count .shares-count span,
.card.is-post .content-wrap .card-footer .social-count .comments-count span,
.card.is-post .content-wrap .card-footer .social-count .likes-count span {
    display: block;
    font-size: 18px !important;
    color: #888da8;
    margin: 0 5px;
}

/* Card post hover effect */
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

/* Card post thumbnail */
.card-post-thumbnail {
    height: 200px;
    width: 100%;
    background-size: 100% 230px;
    background-repeat: no-repeat;
    position: relative;
    border-radius: 12px;
}

/* Post image background */
.post-image {
    position: relative;
    width: 100%;
    font-family: 'Genos';
    margin: 0;
}

/* Fancybox container z-index */
.fancybox__container {
    z-index: 99999 !important;
}

.fancybox__nav {
    display: none !important;
}

/* Fancybox buttons */
.btn-white {
    background: #fff;
    padding: 0px 28px !important;
    display: flex;
    align-items: flex-start;
    justify-content: start;
    text-align: left;
    padding-left: 5px !important;
}

.fancybox-iframe,
.fancybox-video {
    border-radius: 8px !important;
}

/* Modal backdrop customization */
.modal-content, .modal-card {
    overflow: inherit !important;
}

/* Card header styling */
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

/* Report section */
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

/* User block styling */
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

/* Reported feeds styles */
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

/* User information styles */
.user-info {
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

/* Action form styling */
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

/* Warning styling */
.warning {
    font-size: 12px;
    color: red;
    margin-top: 6px;
    background-color: #fff;
    text-align: center;
    padding: 4px 8px;
    border-radius: 15px;
}

/* Submit button */
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

/* Level specific styles */
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

/* Fancybox close button */
.fancybox-slide--html .fancybox-close-small {
    color: rgb(255 255 255);
    padding: 10px;
    right: 0;
    top: 0;
    border: 1px solid;
    border-radius: 30px;
}

/* Scrollable modal content */
.modal-body {
    overflow-y: scroll !important;
}

    </style>
@endsection
 
@section('content')
    <div class="content-wrapper">

        <!-- Reported Feeds Section -->
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
                    <a href="{{ route('manage.user.reportedfeeds') }}" class="see-all-link d-flex align-items-center gap-2 text-dark">
                        See All
                        <img src="{{ asset('assets/img/Multiple Forward Right.svg') }}" alt="arrow" class="see-all-arrow" style="width: 25px; height: 25px;">
                    </a>
                @endif
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($reportfeeds as $report)
                            @php $feed = $report->feed; @endphp
                            @if ($feed)
                                <div class="col-md-3">
                                    <div class="post-image">
                                        <!-- Dropdown Menu -->
                                        <div class="nav-item dropdown d-block" style="position: absolute; right: 6px; top: 6px; z-index: 1000;">
                                            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="d-flex align-items-center gap-2 open-edit-modal" data-id="{{ $feed->id }}" data-comment-id="{{ $report->id }}" data-section="reported-feeds">
                                                    <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}" alt="">
                                                </div>
                                            </a>
                                        </div>

                                        <div id="feed-post-{{ $feed->id }}" class="card is-post mt-4 p-1 mb-0 view-post card-post" data-id="{{ $feed->_id }}">
                                            <div class="content-wrap">
                                                <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                    <div class="user-block">
                                                        <div class="user-info">
                                                            <div class="row g-4">
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type . '.svg') }}" style="width: 25px; height: 25px; background-color: #fff; padding: 4px; border-radius: 4px; margin: 9px 6px;">
                                                                </div>
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}" style="width: 25px; height: 25px; border-radius: 4px; margin: 9px 6px;" onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <p class="m-0" title="{{ optional($feed->user)->name }}"><b>{{ optional($feed->user)->name }}</b></p>
                                                                    <small class="time"><i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i></small>
                                                                </div>
                                                            </div>
                                                            <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}" class="user-heart">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    @if (isset($feed->images[0]))
                                                        <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});" class="card-post-thumbnail"></div>
                                                    @else
                                                        <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');" class="card-post-thumbnail"></div>
                                                    @endif
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

        <!-- Reported Comments Section -->
        <div class="card pb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/svg/svg-dialog/reported-feeds.svg') }}" alt="">
                    <div class="ms-2">
                        <p class="mb-0">Reported Comments</p>
                        <small>Total: {{ $reportscomments->total() }}</small>
                    </div>
                </div>
                @if ($reportscomments->count() > 3)
                    <a href="{{ route('reportedcommmentsindex') }}" class="see-all-link d-flex align-items-center gap-2 text-dark">
                        See All <img src="{{ asset('assets/img/Multiple Forward Right.svg') }}" alt="arrow" class="see-all-arrow" style="width: 25px; height: 25px;">
                    </a>
                @endif
            </div>
            <div class="view-wrapper">
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($reportscomments as $reportcomments)
                            @php $comment = $reportcomments->comments; $feed = optional($comment)->feed; @endphp
                            @if ($feed)
                                <div class="col-md-3">
                                    <div class="post-image">
                                        <div class="nav-item dropdown d-block" style="position: absolute; right: 6px; top: 6px; z-index: 1000;">
                                            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="d-flex align-items-center gap-2 open-edit-modal" data-id="{{ $feed->id }}" data-comment-id="{{ $comment->id }}" data-section="reported-comments">
                                                    <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}" alt="">
                                                </div>
                                            </a>
                                        </div>

                                        <div id="feed-post-{{ $feed->id }}" class="card is-post mt-4 p-1 mb-0 view-post card-post" data-id="{{ $feed->_id }}">
                                            <div class="content-wrap">
                                                <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                    <div class="user-block">
                                                        <div class="user-info">
                                                            <div class="row g-4">
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type . '.svg') }}" style="width: 25px; height: 25px; background-color: #fff; padding: 4px; border-radius: 4px; margin: 9px 6px;">
                                                                </div>
                                                                <div class="col-sm-2 p-0">
                                                                    <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}" style="width: 25px; height: 25px; border-radius: 4px; margin: 9px 6px;" onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <p class="m-0" title="{{ optional($feed->user)->name }}"><b>{{ optional($feed->user)->name }}</b></p>
                                                                    <small class="time"><i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i></small>
                                                                </div>
                                                            </div>
                                                            <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}" class="user-heart">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    @if (isset($feed->images[0]))
                                                        <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});" class="card-post-thumbnail"></div>
                                                    @else
                                                        <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');" class="card-post-thumbnail"></div>
                                                    @endif
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

        <!-- Latest Feeds Section -->
        <div class="card pb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
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
                <div id="main-feed" class="container main-feed">
                    <div class="row g-4">
                        @foreach ($feeds as $feed)
                            <div class="col-md-3">
                                <div class="post-image">
                                    <div class="nav-item dropdown d-block" style="position: absolute; right: 6px; top: 6px; z-index: 1000;">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-2 open-edit-modal" data-id="{{ $feed->id }}" data-comment-id="{{ $feed->id }}" data-section="latest-feeds">
                                                <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}" alt="">
                                            </div>
                                        </a>
                                    </div>

                                    <div id="feed-post-{{ $feed->id }}" class="card is-post mt-4 p-1 mb-0 view-post card-post" data-id="{{ $feed->_id }}">
                                        <div class="content-wrap">
                                            <div class="card-footer pb-2 pt-0 mt-0 pl-0 pr-0">
                                                <div class="user-block">
                                                    <div class="user-info">
                                                        <div class="row g-4">
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type . '.svg') }}" style="width: 25px; height: 25px; background-color: #fff; padding: 4px; border-radius: 4px; margin: 9px 6px;">
                                                            </div>
                                                            <div class="col-sm-2 p-0">
                                                                <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}" style="width: 25px; height: 25px; border-radius: 4px; margin: 9px 6px;" onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="m-0" title="{{ optional($feed->user)->name }}"><b>{{ optional($feed->user)->name }}</b></p>
                                                                <small class="time"><i>{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i></small>
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('assets/svg/svg-dialog/user-heart.svg') }}" class="user-heart">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                @if (isset($feed->images[0]))
                                                    <div style="background-image: url({{ asset('storage/' . $feed->images[0]['path']) }});" class="card-post-thumbnail"></div>
                                                @else
                                                    <div style="background-image: url('https://st2.depositphotos.com/4202565/7675/v/450/depositphotos_76756387-stock-illustration-video-player-with-black.jpg');" class="card-post-thumbnail"></div>
                                                @endif
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
    </div>

    <!-- Modal for Viewing Feed or Comment -->
    <div class="modal fade" id="editFeedModal" tabindex="-1" aria-labelledby="editFeedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 98%; width: 98%;">
            <div class="modal-content" style="background: transparent; border: none; box-shadow: none; width:800px !important;">
                <div class="d-flex flex-row justify-content-between align-items-start" style="gap: 30px; flex-wrap: nowrap;">
                    <!-- Left Panel (Auto height, Feed Edit) -->
                    <div class="bg-white shadow" style="width: 58%; padding: 20px; border-radius:12px !important">
                        <div id="editFeedContent">
                            <!-- Dynamic content will be inserted here -->
                        </div>
                    </div>

                    <!-- Right Panel (Full Height, No Scroll) -->
                    <div class="bg-white shadow" style="width: 48%; position: relative; border-radius:12px !important">
                        <button type="button" class="close position-absolute" style="top: -27px; right: -56px;" onclick="$('#editFeedModal').modal('hide')">&times;</button>
                        <div class="reported-feeds">
                            <div class="header mb-3">
                                <h2>Reported Feeds</h2>
                                <p>Manage User Feeds</p>
                            </div>
                            <center>
                                <div class="user-info">
                                    <div><img src="{{ asset('images/user-clips-report-user.png') }}" class="profile-img" /></div>
                                    <div class="user-details">
                                        <div class="d-flex" style="margin: 0 auto; width: 155px;">
                                            <strong>User Name</strong>
                                            <b><span class="mt-1 ml-2"><span class="text-danger">3</span> of <span class="text-success">5</span> Flags</span></b>
                                        </div>
                                        <div class="locations">
                                            <img src="{{ asset('images/kurdistan-flag-sm.png') }}" alt=""> Rojava · Qamishlo ·
                                            <img src="{{ asset('images/germany-flag-sm.png') }}" alt=""> Hannover
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle dynamic modal content -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.open-edit-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    const feedId = this.dataset.id;
                    const commentId = this.dataset.commentId;
                    const section = this.dataset.section;

                    let contentHtml = '';

                    // Load content based on the section
                    if (section === 'reported-feeds') {
                        const feedElement = document.querySelector(`#feed-post-${feedId}`);
                        contentHtml = feedElement ? feedElement.cloneNode(true).outerHTML : 'Feed not found.';
                    } else if (section === 'reported-comments') {
                        const commentElement = document.querySelector(`#comment-${commentId}`);
                        contentHtml = commentElement ? commentElement.cloneNode(true).outerHTML : 'Comment not found.';
                    } else if (section === 'latest-feeds') {
                        const feedElement = document.querySelector(`#feed-post-${feedId}`);
                        contentHtml = feedElement ? feedElement.cloneNode(true).outerHTML : 'Feed not found.';
                    }

                    // Insert the content into the modal
                    const modalBody = document.getElementById('editFeedContent');
                    modalBody.innerHTML = contentHtml;

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('editFeedModal'));
                    modal.show();
                });
            });

            // Clear modal content when it's closed
            document.getElementById('editFeedModal').addEventListener('hidden.bs.modal', function () {
                const modalBody = document.getElementById('editFeedContent');
                modalBody.innerHTML = '';  // Clear modal content
            });
        });
    </script>

@endsection
