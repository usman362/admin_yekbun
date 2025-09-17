@extends('layouts/layoutMaster')

@section('title', 'User View - Account')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/video.js/dist/video-js.min.css" rel="stylesheet">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-user-view.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
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

@section('page-script')
    <script src="{{ asset('assets/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view-account.js') }}"></script>

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
        background-color: rgb(0, 0, 0) !important;
        /* Full black with opacity */
        z-index: 1040 !important;
        transition: background-color 0.3s ease-out;
        /* Smooth transition for background color */
    }

    /* Final state of the backdrop when modal is active (80% black with full opacity) */
    .modal-open .modal-backdrop-custom {
        background-color: rgb(0, 0, 0) !important;
        /* 80% black with full opacity */
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
        height: 160px;
        width: 100%;
        /* background-size: 100% 230px; */
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-color: black;
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
    .modal-content,
    .modal-card {
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
        width: 100%;
        height: 30px;
        border-radius: 5px;
        position: relative;
    }

    .user-block .user-heart {
        width: 20px !important;
        height: 20px !important;
        border-radius: 4px !important;
        position: absolute;
        top: 2px;
        right: 38px;
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
    .user_feeds .user-info {
        align-items: center;
        background: #fafafa;
        padding: 12px;
        border-radius: 12px;
        /* margin-bottom: 16px; */
        height: 36px;
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
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">User / View /</span> Account
    </h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            @include('content.include.users.user-detail')

        </div>

        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/' . $user->id . '/friends') }}"><i
                            class="bx bx-user me-1"></i>Friends</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/' . $user->id . '/family') }}"><i
                            class="bx bx-user me-1"></i>Family</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0)"><i
                            class="bx bx-images me-1"></i>Feeds</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/' . $user->id . '/playlist') }}"><i
                            class="bx bx-music me-1"></i>Playlist</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/' . $user->id . '/activity') }}"><i
                            class="bx bx-bell me-1"></i>Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/' . $user->id . '/location') }}"><i
                            class="bx bx-map-pin me-1"></i>Location</a></li>
            </ul>

            <!--start-->
            <div class="row">
                 <div class="view-wrapper user_feeds">
            <input type="hidden" name="feed_id" id="feed_id">
            <input type="hidden" name="feed_type" id="feed_type" value="user_feeds">
            <input type="hidden" name="comment_parent_id" id="comment_parent_id">
            <div id="main-feed" class="container main-feed">
                <div class="row g-4">
                    @foreach ($feeds as $feed)
                        <div class="col-md-3">
                            <div class="post-image">
                                <div id="feed-post-{{ $feed->id }}" class="card is-post mt-4 p-1 mb-0 view-post card-post"
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
                                        <div class="card-footer pb-2 p-0 mt-0">
                                            <div class="user-block">
                                                <div class="user-info">
                                                    <div class="row g-4">
                                                        <div class="col-sm-2 p-0">
                                                            <img src="{{ asset('assets/svg/svg-dialog/' . optional($feed->user)->user_type) . '.svg' }}"
                                                                style="width: 24px !important;height: 24px !important;background-color: #fff;padding: 4px;border-radius: 4px !important;margin: 10px 100px 0 4px;">
                                                        </div>
                                                        <div class="col-sm-2 p-0">
                                                            <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                style="width: 22px !important;height: 22px !important;border-radius: 4px !important;margin: 10px 0;"
                                                                onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                        </div>
                                                        <div class="col-sm-8 p-0">
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

                                            {{-- <div style="background-image: url('https://admin.yekbun.net/storage/thumbnails/6812114dabdb3___%C5%9Eeyda_-_Were_thumb_2.jpg');"
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
                                                            style="width:15px;height:15px;object-fit:cover"><span
                                                            style="font-weight:400;font-family:Genos">0</span>
                                                    </div>

                                                    <div
                                                        style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/share.svg') }}"
                                                            style="width:15px;height:15px;object-fit:cover"><span
                                                            style="font-weight:400;font-family:Genos">0</span>
                                                    </div>

                                                    {{-- @if ($feed->is_comments == 1) --}}
                                                    <div
                                                        style="display:flex;align-items:center;gap:3px;height:100%;padding:5px;margin-right:2px">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                            style="width:15px;height:15px;object-fit:cover"><span
                                                            style="font-weight:400;font-family:Genos">0</span>
                                                    </div>
                                                    {{-- @endif --}}
                                                    {{-- @if ($feed->is_share == 1) --}}
                                                    <div
                                                        style="display:flex;align-items:center;gap:3px;height:100%;margin-right:12px;padding:5px;margin-left:2px">
                                                        <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                            style="width:15px;height:15px;object-fit:cover"><span
                                                            style="font-weight:400;font-family:Genos">0</span>
                                                    </div>
                                                    {{-- @endif --}}
                                                </div>
                                                {{-- @if ($feed->is_emoji == 1) --}}
                                                <div
                                                    style="display:flex;align-items:center;gap:2px;height:100%;padding:5px 16px 5px 5px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                        style="width:15px;height:15px;object-fit:cover">
                                                    <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                        style="width:15px;height:15px;object-fit:cover">
                                                    <span style="font-weight:400;font-family:Genos">0</span>
                                                </div>
                                                {{-- @endif --}}
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /Main wrap -->

                                </div>
                                <div class="nav-item dropdown d-block"
                                    style="margin-top: 0;position: absolute;right: 6px;top: 6px;bottom: auto;">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center gap-2 open-edit-modal-unique"
                                            data-id="{{ $feed->id }}" data-section="latest-feeds">
                                            <img src="{{ asset('assets/svg/svg-dialog/post-dropdown.svg') }}"
                                                alt="">
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            </div>
        </div>
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    @include('_partials/_modals/modal-edit-user')
    @include('_partials/_modals/modal-upgrade-plan')
    <!-- /Modal -->

    <script>
        // Ensure correct modal is referenced
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.open-edit-modal-unique').forEach(function(button) {
                button.addEventListener('click', function() {
                    const feedId = this.dataset.id;
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
                    const modalBody = document.getElementById('editFeedContent-reported');
                    modalBody.innerHTML = contentHtml;

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById(
                        'open-edit-modal-unique'));
                    modal.show();
                });
            });

            // Clear modal content when it's closed
            document.getElementById('open-edit-modal-unique').addEventListener('hidden.bs.modal', function() {
                const modalBody = document.getElementById('editFeedContent-reported');
                modalBody.innerHTML = ''; // Clear modal content
            });
        });
    </script>

    <script>
        function getComments(data) {
            let comments = '';
            let commentData = '';
            data.data.comments.forEach(function(data, index) {
                let child = '';
                if (data.image && data.image.trim() !== "" && data.image !== "null" && data.image !== null) {
                    commentData =
                        `<img src="{{ asset('storage') }}/${data.image}" style="width:100px;height:100px">`;
                } else if (data.emoji && data.emoji.trim() !== "" && data.emoji !== "null" && data.emoji !== null) {
                    commentData =
                        `<img src="{{ asset('/') }}storage/${data?.emoji_data?.image}" style="width:100px;height:100px">`;
                } else if (data.audio && data.audio.trim() !== "" && data.audio !== "null" && data.audio !== null) {
                    commentData = `<div id="comment-audio" style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; background-size: contain; cursor: pointer; border-radius: 10px; position: relative; height: 100%;">
                                   <audio src="{{ asset('storage') }}/${data.audio}" id="comment-audio-input"></audio>
                                        <div style="height: 37px;width:100%; display: flex; align-items: center; justify-content: start; margin-top: 40px; border-radius: 10px; margin: 7px; align-self: flex-end;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201000002312.svg') }}" alt="Play" class="img-fluid" id="comment-audio-play" style="height: 14px; width: 19px;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Eo_circle_green_pause.svg') }}" alt="Pause" class="img-fluid" id="comment-audio-pause" style="height: 14px; width: 19px; display: none;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">

                                            <span style="color: gray; margin-left: 5px;" id="comment-audio-duration">00:00</span>
                                        </div>
                                    </div>`;
                } else {
                    commentData = data.comment;
                }
                if (data.child_comments.length > 0) {

                    comments += `
                            <div class="media is-comment com_container" data-id="${data._id}">
                                <div class="comment-line"></div>
                                <figure class="media-left">
                                    <p class="image is-32x32">
                                        <img src="/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
                                    </p>
                                </figure>

                                <div class="media-content pb-0">
                                    <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                        <div class="username">${data?.user?.name} ${data?.user?.last_name}</div>
                                        <span>${moment(data.created_at).fromNow()}</span>
                                    </div>
                                    <p class="mb-2">${commentData}</p>
                                </div>
                                <a href="javascript:void(0)" class="comment-reply" data-username="@${data?.user?.username}" data-parent_id="${data._id}"><i class="fas fa-reply"></i></a>
                            </div>`;

                    data.child_comments.forEach(function(child, index) {
                        ++index;

                        let height = 65;

                        if (child.image && child.image.trim() !== "" && child.image !== "null" && child
                            .image !== null) {
                            commentData =
                                `<img src="{{ asset('storage') }}/${child.image}" style="width:100px;height:100px">`;
                        } else if (child.emoji && child.emoji.trim() !== "" && child.emoji !== "null" &&
                            child.emoji !== null) {
                            commentData =
                                `<img src="{{ asset('/') }}storage/${child?.emoji_data?.image}" style="width:100px;height:100px">`;
                        } else if (child.audio && child.audio.trim() !== "" && child.audio !== "null" &&
                            child.audio !== null) {
                            commentData = `<div id="comment-audio" style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; background-size: contain; cursor: pointer; border-radius: 10px; position: relative; height: 100%;">
                                        <audio src="{{ asset('storage') }}/${child.audio}" id="comment-audio-input"></audio>
                                                <div style="height: 37px;width:100%; display: flex; align-items: center; justify-content: start; margin-top: 40px; border-radius: 10px; margin: 7px; align-self: flex-end;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201000002312.svg') }}" alt="Play" class="img-fluid" id="comment-audio-play" style="height: 14px; width: 19px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Eo_circle_green_pause.svg') }}" alt="Pause" class="img-fluid" id="comment-audio-pause" style="height: 14px; width: 19px; display: none;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                    <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">

                                                    <span style="color: gray; margin-left: 5px;" id="comment-audio-duration">00:00</span>
                                                </div>
                                            </div>`;
                        } else {
                            commentData = child.comment;
                        }
                        if (child.child_comments.length > 0) {
                            height += 85 * child.child_comments.length;
                            let commentLine2 =
                                `<div class="comment-line-2" style="height:calc(${height}px)"></div>`;
                            let commentLine3 =
                                '<div class="comment-line-3"></div>';
                            comments +=
                                `<div class="media is-comment is-nested com_container"  data-id="${child._id}">
                                    ${index == data.child_comments.length ? '' : commentLine2}

                                    ${commentLine3}

                                    <div class="arrow-line 3"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${child?.user?.name} ${child?.user?.last_name}</div>
                                            <span>${moment(child?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${commentData}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${child?.user?.username}" data-parent_id="${child._id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                            child.child_comments.forEach(function(childUltra,
                                index3) {
                                ++index3

                                if (childUltra.image && childUltra.image.trim() !== "" && childUltra
                                    .image !== "null" && childUltra.image !== null) {
                                    commentData =
                                        `<img src="{{ asset('storage') }}/${childUltra.image}" style="width:100px;height:100px">`;
                                } else if (childUltra.emoji && childUltra.emoji.trim() !== "" &&
                                    childUltra.emoji !== "null" && childUltra.emoji !== null) {
                                    commentData =
                                        `<img src="{{ asset('/') }}storage/${childUltra?.emoji_data?.image}" style="width:100px;height:100px">`;
                                } else if (childUltra.audio && childUltra.audio.trim() !== "" &&
                                    childUltra.audio !== "null" && childUltra.audio !== null) {
                                    commentData = `<div id="comment-audio" style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; background-size: contain; cursor: pointer; border-radius: 10px; position: relative; height: 100%;">
                                                <audio src="{{ asset('storage') }}/${childUltra.audio}" id="comment-audio-input"></audio>
                                                        <div style="height: 37px;width:100%; display: flex; align-items: center; justify-content: start; margin-top: 40px; border-radius: 10px; margin: 7px; align-self: flex-end;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201000002312.svg') }}" alt="Play" class="img-fluid" id="comment-audio-play" style="height: 14px; width: 19px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Eo_circle_green_pause.svg') }}" alt="Pause" class="img-fluid" id="comment-audio-pause" style="height: 14px; width: 19px; display: none;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">
                                                            <img src="{{ asset('assets/svg/svg-dialog/Group%201.svg') }}" alt="Wave" class="img-fluid audio-wave" style="height: 57px; width: 40px;">

                                                            <span style="color: gray; margin-left: 5px;" id="comment-audio-duration">00:00</span>
                                                        </div>
                                                    </div>`;
                                } else {
                                    commentData = childUltra.comment;
                                }
                                let commentLine2 =
                                    `<div class="comment-line-2" ></div>`;
                                comments +=
                                    `<div class="media is-comment is-nested com_container" data-id="${childUltra._id}" style="margin-left: 38.5px !important">
                                    ${index3 == child.child_comments.length ? '' : commentLine2}

                                    <div class="arrow-line"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/storage/${childUltra?.user?.image}" alt="" data-user-popover="${childUltra?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${childUltra?.user?.name} ${childUltra?.user?.last_name}</div>
                                            <span>${moment(childUltra?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${commentData}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${childUltra?.user?.username}" data-parent_id="${childUltra.parent_id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                            });

                        } else {
                            let commentLine2 =
                                `<div class="comment-line-2" style="height:calc(${height}px)"></div>`;
                            comments += `<div class="media is-comment is-nested com_container"  data-id="${child._id}">

                                    ${index == data.child_comments.length ? '' : commentLine2}

                                    <div class="arrow-line"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${child?.user?.name} ${child?.user?.last_name}</div>
                                            <span>${moment(child?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${commentData}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${child?.user?.username}" data-parent_id="${child._id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                        }

                    });
                } else {
                    comments += `
                            <div class="media is-comment" data-id="${data._id}">
                                <figure class="media-left">
                                    <p class="image is-32x32">
                                        <img src="/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
                                    </p>
                                </figure>

                                <div class="media-content pb-0">
                                    <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                        <div class="username">${data?.user?.name} ${data?.user?.last_name}</div>
                                        <span>${moment(data.created_at).fromNow()}</span>
                                    </div>
                                    <p class="mb-2">${commentData}</p>
                                </div>
                                <a href="javascript:void(0)" class="comment-reply" data-username="@${data?.user?.username}" data-parent_id="${data._id}"><i class="fas fa-reply"></i></a>
                            </div>`;
                }
            });
            return comments;
        }
    </script>
    <script>
        $(document).ready(function() {
            // Use event delegation for dynamically added elements
            $('body').on("click", "#comment-audio-play", function() {
                let container = $(this).closest("#comment-audio");
                let audio = container.find('#comment-audio-input')[
                    0]; // Get the associated hidden audio element
                let playButton = container.find("#comment-audio-play");
                let pauseButton = container.find("#comment-audio-pause");
                let waves = container.find(".audio-wave");
                let durationDisplay = container.find("#comment-audio-duration");

                if (audio.paused) {
                    // Pause any other playing audio
                    $("audio").each(function() {
                        this.pause();
                        $(this).next("#comment-audio").find("#comment-audio-play").show();
                        $(this).next("#comment-audio").find("#comment-audio-pause").hide();
                        $(this).next("#comment-audio").find(".audio-wave").css("opacity", "0.5");
                    });

                    // Play selected audio
                    audio.play();
                    playButton.hide();
                    pauseButton.show();
                    waves.css("opacity", "1"); // Highlight wave animation

                    // Update duration dynamically
                    audio.addEventListener("timeupdate", function() {
                        let minutes = Math.floor(audio.currentTime / 60);
                        let seconds = Math.floor(audio.currentTime % 60);
                        durationDisplay.text(`${minutes}:${seconds < 10 ? "0" : ""}${seconds}`);
                    });

                    // Reset UI when audio ends
                    audio.addEventListener("ended", function() {
                        playButton.show();
                        pauseButton.hide();
                        waves.css("opacity", "0.5");
                    });
                }
            });

            $(document).on("click", "#comment-audio-pause", function() {
                let container = $(this).closest("#comment-audio");
                let audio = container.prev("audio")[0];
                let playButton = container.find("#comment-audio-play");
                let pauseButton = container.find("#comment-audio-pause");
                let waves = container.find(".audio-wave");

                audio.pause();
                playButton.show();
                pauseButton.hide();
                waves.css("opacity", "0.5");
            });

            // Load audio duration when the comment is appended
            $(document).on("loadedmetadata", "audio", function() {
                let container = $(this).next("#comment-audio");
                let durationDisplay = container.find("#comment-audio-duration");
                let audio = this;
                let minutes = Math.floor(audio.duration / 60);
                let seconds = Math.floor(audio.duration % 60);
                durationDisplay.text(`${minutes}:${seconds < 10 ? "0" : ""}${seconds}`);
            });
        });
    </script>
    <script>
        function closeFancyBox() {
            $('body').css('position', 'relative');
            $('.comments-list').html('');
        }

        $('.view-post').click(function() {
            $('#feed_id').val($(this).attr('data-id'));
            $.ajax({
                url: "{{ route('get.comments') }}",
                type: 'GET',
                data: {
                    feed_id: $('#feed_id').val(),
                    feed_type: $('#feed_type').val()
                },
                success: function(response) {
                    let comments = '';
                    $('.comment-controls img').attr('src', '/storage/' + response?.data?.user
                        ?.image);
                    $('.comment-controls img').css('display', 'block');
                    $('.fancybox-caption__body .header img').attr('src', '/storage/' + response
                        ?.data
                        ?.feed?.user?.image);
                    $('.fancybox-caption__body .header img').css('display', 'block')
                    $('.fancybox-caption__body .user-meta .name').text(response?.data?.feed?.user
                        ?.name + ' ' + response?.data?.feed?.user?.last_name);
                    $('.post-date').text(moment(response?.data?.feed?.created_at).fromNow())
                    $('.views-count-1').text(response?.data?.comments_count);

                    comments = getComments(response);

                    if (response.data.liked == true) {
                        $('.like-btn').addClass('liked');
                    } else {
                        $('.like-btn').removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                    $('.comments-list').html(comments);
                    $('.comments-list').animate({
                        scrollTop: $('.comments-list')[0].scrollHeight
                    }, 500);
                    $('body').css('position', 'fixed');
                }

            });
        })

        $('body').on('click', '.send-comment', function() {
            $.ajax({
                url: "{{ route('post.comments') }}",
                type: 'POST',
                data: {
                    comment: $('.comment-textarea').val(),
                    feed_id: $('#feed_id').val(),
                    feed_type: $('#feed_type').val(),
                    parent_id: $('#comment_parent_id').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let comments = '';

                    comments = getComments(response);

                    if (response.data.liked == true) {
                        $('.like-btn').addClass('liked');
                    } else {
                        $('.like-btn').removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                    $('.views-count-1').text(response.data.comments_count);
                    $('.comment-textarea').val('');
                    $('.comments-list').html(comments);
                    if ($('#comment_parent_id').val() == "" || $('#comment_parent_id').val() == null) {
                        $('.comments-list').animate({
                            scrollTop: $('.comments-list')[0].scrollHeight
                        }, 500);
                    }
                    $('#comment_parent_id').val('');
                }

            });
        })

        $('body').on('click', '.comment-reply', function() {
            $('.comment-textarea').val('');
            $('.comment-textarea').attr('autofocus', true);
            $('.comment-textarea').val($(this).attr('data-username') + ' ');
            $('#comment_parent_id').val($(this).attr('data-parent_id'));
        });


        $(document).on('click', '.like-btn', function() {
            let button = $(this);
            let postId = $('#feed_id').val();

            $.ajax({
                url: "{{ route('post.like') }}",
                type: "POST",
                data: {
                    feed_id: postId,
                    feed_type: $('#feed_type').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.data.liked == true) {
                        button.addClass('liked');
                    } else {
                        button.removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                }
            });
        });
    </script>
@endsection
