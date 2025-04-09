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

    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="view-wrapper">
                <div id="main-feed" class="container">
                    <div id="activity-feed" class="view-wrap true-dom">

                        <div class="columns">
                            <div class="column is-3 is-hidden-mobile">
                                <div class="card">
                                    <div class="card-body p-0 border-none">
                                        <div class="list-group nav nav-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action {{ request('type') == 'admin-feeds' ? 'active' : '' }}"
                                                href="#tab1">
                                                All User Feeds<br>
                                                <small class="text-muted">All User Feeds here</small>
                                            </a>
                                            <a class="list-group-item list-group-item-action {{ request('type') == 'all-news' ? 'active' : '' }}"
                                                href="#tab2">
                                                Reported Feed<br>
                                                <small class="text-muted">All Reported Feeds</small>
                                            </a>
                                            <a class="list-group-item list-group-item-action {{ request('type') == 'all-news' ? 'active' : '' }}"
                                                href="#tab3">
                                                Reported Comments<br>
                                                <small class="text-muted">All Reported Commentss</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column column is-6 tab-content" id="tab1">

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                @foreach ($feeds as $feed)
                                    <div id="feed-post-1" class="card is-post">
                                        <div class="content-wrap">
                                            <!-- Post header -->
                                            <div class="card-heading">
                                                <div class="user-block">
                                                    <div class="image">
                                                        <img src="{{ asset('storage/' . (optional($feed->user)->image ?? 'default-avatar.png')) }}"
                                                            data-demo-src="{{ asset('storage/' . (optional($feed->user)->image ?? 'default-avatar.png')) }}"
                                                            data-user-popover="1" alt="User Image"
                                                            onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <a href="#">{{ optional($feed->user)->name ?? 'N/A' }}
                                                                {{ optional($feed->user)->last_name ?? 'N/A' }}</a>
                                                            &nbsp;<i class="fa fa-circle"
                                                                style="font-size: 4px;color: #c3c3c3;padding-left: 3px;"></i>&nbsp;
                                                            <img src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                                                style="width: 16px;height: 16px" alt="">
                                                            &nbsp;<i class="fa fa-circle"
                                                                style="font-size: 4px;color: #c3c3c3;"></i>
                                                        </span>
                                                        <span class="time d-flex">
                                                            &nbsp; <i class="fa fa-circle pr-1"
                                                                style="font-size: 4px;margin-top: 7px;color: #c3c3c3;"></i>
                                                            {{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}
                                                            &nbsp; <i class="fa fa-circle"
                                                                style="font-size: 4px;margin-top: 7px;color: #c3c3c3;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <form action="{{ route('manage.feeds.delete', $feed->id) }}"
                                                    id="feedDel{{ $feed->id }}" method="post">
                                                    @csrf
                                                </form>

                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                                    <div>
                                                        <div class="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <form action="{{ route('manage.action.feeds', $feed->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <a href="javascript:void(0)" class="dropdown-item">
                                                                    <div class="media">
                                                                        <div class="media-content">
                                                                            <h3>Select Reason</h3>
                                                                            <select class="form-control mt-1"
                                                                                name="reason_id" required>
                                                                                <option value="">Select the Reason
                                                                                </option>
                                                                                @foreach ($reasons as $reason)
                                                                                    <option value="{{ $reason->id }}">
                                                                                        {{ $reason->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item">
                                                                    <div class="media">
                                                                        <div class="media-content">
                                                                            <h3>User Section</h3>
                                                                            <select class="form-control mt-1"
                                                                                name="user_type" required>
                                                                                <option value="">Select the Option
                                                                                </option>
                                                                                <option value="educated">Educated</option>
                                                                                @if (isset($feed->user->level) && $feed->user->level == 2)
                                                                                    <option value="cultivated">Cultivated
                                                                                    </option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <center>
                                                                    <button type="submit"
                                                                        class="btn btn-primary w-50 mt-2 mb-2">Submit</button>
                                                                </center>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Post body -->
                                            <div class="card-body col-sm-12">
                                                <div class="pop_description">{{ $feed->description ?? 'No description available.' }}</div>
                                                <div class="row">
                                                    @if (isset($feed->images[0]))
                                                        <div class="post-image col-sm-12">
                                                            <a data-fancybox="post1" data-lightbox-type="comments"
                                                                data-thumb="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                                href="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                                data-demo-href="{{ asset('storage/' . $feed->images[0]['path']) }}">
                                                                <img src="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                                    data-demo-src="{{ asset('storage/' . $feed->images[0]['path']) }}"
                                                                    alt="Post Image" style="width: 100%;">
                                                            </a>
                                                        </div>
                                                    @else
                                                        @if (isset($feed->videos[0]))
                                                            <div class="post-image col-sm-12">
                                                                <a data-fancybox="post1" data-lightbox-type="comments"
                                                                    data-thumb="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                                    href="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                                    data-demo-href="{{ asset('storage/' . $feed->videos[0]['path']) }}">
                                                                    <video id="my-player" class="video-js" controls
                                                                        preload="auto" {{-- poster="//vjs.zencdn.net/v/oceans.png" --}}
                                                                        data-setup='{}'
                                                                        style="width:100%;object-fit:cover;border-radius:7px;padding:0;display:block">
                                                                        <source
                                                                            src="{{ asset('storage/' . $feed->videos[0]['path']) }}"
                                                                            type="video/mp4">
                                                                        </source>
                                                                    </video>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>

                                                <div
                                                    style="height:29px;width:100%;display:flex;justify-content:space-between;align-items:center;background-color:#f8f9fa;border-radius:5px;padding:5px;gap:10px;margin-bottom:10px">
                                                    <div
                                                        style="display:flex;align-items:center;justify-content:space-between;width:200px;height:100%">


                                                        @if ($feed->is_comments == 1)
                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover"><span
                                                                    style="font-weight:400;font-family:Genos">0</span>
                                                            </div>
                                                        @endif
                                                        @if ($feed->is_share == 1)
                                                            <div
                                                                style="display:flex;align-items:center;gap:3px;height:100%">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover"><span
                                                                    style="font-weight:400;font-family:Genos">0</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @if ($feed->is_emoji == 1)
                                                        <div style="display:flex;align-items:center;gap:2px;height:100%">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover">
                                                            <span style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="column is-3"></div>

                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->

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

        $('#feed-post-1').click(function() {
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
