@extends('layouts/layoutMaster')

@section('title', 'Histories')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        .btn-primary {
            color: #fff !important;
            background-color: #696cff !important;
            border-color: #696cff !important;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
        }

        .modal-content {
            overflow: unset !important;
        }

        .pop-img {
            width: 100%;
        }

        .pop-heading {
            font-weight: bold;
            color: #000;
        }

        .pop-txt {
            color: #000;
            font-size: 14px;
        }

        .pop_action_div {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 24px;
            left: auto;
            right: 20px;
        }

        .pop_action {
            background: #F2F2F2;
            border-radius: 7px;
            width: 30px;
            height:
                30px;
            margin: 5px;
            cursor: pointer;
            border: 0px;
        }

        .pop_action_image {
            width: 30px;
            padding: 5px;
            height: 30px;
            object-fit: cover
        }

        .pop_div {
            background-color: #fff;
            border-radius: 10px;
            padding: 5px
        }

        .pop_sub {
            height: 30;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            top: 10px
        }

        .pop_head {
            background-color: #f8f9fa;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px
        }

        .pop_tit {
            display: flex;
            align-items: start;
            align-items: center
        }

        .pop_heading {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: flex-start;
            margin-left: 5px;
            gap: 8px
        }

        .pop_head_line {
            font-family: Genos;
            font-size: 20px;
            text-underline-position: from-font;
            text-decoration-skip-ink: none;
            display: flex;
            align-items: center;
            gap: 5px
        }

        .pop_title {
            border-radius: 45%;
            background: #00000066
        }

        .pop_description {
            font-size: 14px;
            font-weight: 400;
            color: gray;
            text-align: left;
            background: #f7f7f7;
            padding: 7px;
            font-family: Genos;
            margin-top: 7px;
            margin-bottom: 7px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: left
        }

        .pop_main_image {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, .1)
        }

        .pop_overlay {
            position: absolute;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            background: #1c274C99;
            gap: 5px
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

        .fancybox__thumbs {
            display: none !important;
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
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
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
    <script src="{{ asset('assets/friendkit/js/popovers-pages.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>

    <div class="d-flex justify-content-between container">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">History /</span> List
            </h4>
        </div>
        <div class="">

            {{-- @can('artist.create') --}}
            <button class="btn btn-primary add-video-clips" data-bs-toggle="modal" data-bs-target="#createhistoryModal">Add
                History</button>
            {{-- @endcan --}}
        </div>
    </div>

    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl card flex-grow-1 container-p-y">

            <div class="view-wrapper">
                <div id="main-feed" class="container">

                    <input type="hidden" name="feed_id" id="feed_id">
                    <input type="hidden" name="feed_type" id="feed_type" value="history">
                    <input type="hidden" name="comment_parent_id" id="comment_parent_id">

                    <div class="row pb-4">
                        @foreach ($history as $feed)
                            <div class="col-md-3">
                                <div class="post-image">
                                    <div id="feed-post-1" class="card is-post mt-4 pt-3 pl-4 pr-4 view-post card-post"
                                        data-fancybox="post1" data-lightbox-type="comments"
                                        data-thumb="{{ asset('storage/' . $feed->video[0]['path']) }}"
                                        href="{{ asset('storage/' . $feed->video[0]['path']) }}"
                                        data-id="{{ $feed->_id }}"
                                        data-demo-href="{{ asset('storage/' . $feed->video[0]['path']) }}">
                                        <!-- Main wrap -->
                                        <div class="content-wrap">

                                            <!-- Post body -->
                                            <div class="card-body p-0">

                                                <div style="background-image: url({{ asset('storage/' . $feed->thumbnail) }});"
                                                    class="card-post-thumbnail">
                                                    <span class="video-thumbnail-duration">04:49</span>
                                                </div>
                                            </div>
                                            <div class="card-footer mt-0">
                                                <div class="user-block">
                                                    <div class="user-info">
                                                        <div class="row">
                                                            <div class="col-md-2 p-0">
                                                                <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                    style="width: 100px !important;height:45px !important;"
                                                                    onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="mt-2">
                                                                    <p class="m-0" title="Şeyda Were">
                                                                        <b>{{ $feed->title }}</b>
                                                                    </p>
                                                                    <small class="time"><i>0 Views .
                                                                            &nbsp;&nbsp;{{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}</i></small>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Post body -->
                                        </div>
                                        <!-- /Main wrap -->
                                    </div>
                                    <div class="nav-item dropdown d-block"
                                        style="margin-top: 0;position: absolute;right: 24px;top: 240px;bottom: auto;">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu text-center dropdown-menu-end"
                                            style="min-width: unset; width: 100px;">
                                            <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                            <form action="{{ route('history.destroy', $feed->id) }}"
                                                onsubmit="confirmAction(event, () => event.target.submit())" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row ml-0" style="width:100px;">

                                                    <div class="col-md-6" style="border-right: 1px solid #c0c0c0">
                                                        <a class="dropdown-item edit-history" style="padding: 0"
                                                            href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#createhistoryModal"
                                                            data-id="{{ $feed->id }}" data-name="{{ $feed->title }}"
                                                            data-source="{{ $feed->source }}"
                                                            data-thumbnail="{{ asset('storage/' . $feed->thumbnail) }}"
                                                            data-video="{{ $feed->video[0]['path'] }}"
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

                    {{-- <div id="feed-post-1" class="card is-post">
                                        <div class="content-wrap">
                                            <!-- Post header -->
                                            <div class="card-heading">
                                                <div class="pop_sub">
                                                    <div class="pop_head">
                                                        <div class="pop_tit"><img
                                                                src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                                style="width:32px;height:32px;object-fit:cover"
                                                                onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                            <div class="pop_heading" style="">
                                                                <div class="pop_head_line" style="">
                                                                    <div class="pop_title" style=""></div>YekBun Team
                                                                    <div
                                                                        style="width:2px;height:2px;border-radius:45%;background:#00000066">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    style="width:150px;height:6px;font-family:Genos;font-size:14px;text-align:left;text-underline-position:from-font;text-decoration-skip-ink:none;color:#7e7e7e;display:flex;align-items:center;gap:5px;position: relative;top:-9px">
                                                                    {{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('history.destroy', $feed->id) }}"
                                                        onsubmit="confirmAction(event, () => event.target.submit())"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="pop_action_div">
                                                            <a href="javascript:void(0)"
                                                                style="margin-right:24px;color: #2e2e2e;font-size: 12px;padding: 5px 12px;height:unset;width:unset;"
                                                                class="pop_action">Reported Comments</a>
                                                            <div class="nav-item dropdown">
                                                                <a class="nav-link dropdown-toggle hide-arrow"
                                                                    href="#" data-bs-toggle="dropdown"
                                                                    aria-expanded="true">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <i class="fas fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                </a>
                                                                <div class="dropdown-menu text-center dropdown-menu-end"
                                                                    style="min-width: unset;width:100px;"
                                                                    data-bs-popper="static">
                                                                    <span
                                                                        style="font-family:Genos;color:#c0c0c0">Options</span>
                                                                    <div class="row ml-0" style="width:100px;">

                                                                        <div class="col-md-6"
                                                                            style="border-right: 1px solid #c0c0c0">
                                                                            <a class="dropdown-item edit-history"
                                                                                style="padding: 0" href="javascript:void(0)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#createhistoryModal"
                                                                                data-id="{{ $feed->id }}"
                                                                                data-name="{{ $feed->title }}"
                                                                                data-source="{{ $feed->source }}"
                                                                                data-thumbnail="{{ asset('storage/'.$feed->thumbnail) }}"
                                                                                data-video="{{ $feed->video[0]['path'] }}"
                                                                                data-comments="{{ $feed->is_comments }}"
                                                                                data-share="{{ $feed->is_share }}"
                                                                                data-emoji="{{ $feed->is_emoji }}"
                                                                                for="customRadioPrime">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/edit.svg') }}"></a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit" class="dropdown-item"
                                                                                style="padding: 0">
                                                                                <img class="pop_action_image"
                                                                                    style="height: 26px"
                                                                                    src="{{ asset('assets/svg/delete.svg') }}"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Post body -->
                                            <div class="card-body col-sm-12">
                                                <div class="row">
                                                    <div class="post-image col-sm-12">
                                                        <a class="view-post" data-fancybox="post1"
                                                            data-lightbox-type="comments"
                                                            data-thumb="{{ asset('storage/' . $feed->video[0]['path']) }}"
                                                            href="{{ asset('storage/' . $feed->video[0]['path']) }}"
                                                            data-id="{{ $feed->_id }}"
                                                            data-demo-href="{{ asset('storage/' . $feed->video[0]['path']) }}">
                                                            <img src="{{ asset('storage/' . $feed->thumbnail) }}"
                                                                style="width:100%;height:450px;object-fit:cover;border-radius:7px;padding:0;display:block">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Post footer -->
                                            <div class="card-footer pt-0">
                                                <div
                                                    style="height:29px;display:flex;justify-content:space-between;align-items:center;background-color:#f8f9fa;border-radius:5px;padding:5px;gap:10px;width:100%;">
                                                    <div
                                                        style="display:flex;align-items:center;justify-content:space-between;width:100%;height:100%">
                                                        @if ($feed->is_emoji == 1)
                                                            <div
                                                                style="display:flex;align-items:center;gap:2px;height:100%">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002356.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Group%201000002630.svg') }}"
                                                                    style="width:100%;height:100%;object-fit:cover">
                                                                <span style="font-weight:400;font-family:Genos">0</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @if ($feed->is_comments == 1)
                                                        <div style="display:flex;align-items:center;gap:3px;height:100%">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/Pen%202.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    @endif
                                                    @if ($feed->is_share == 1)
                                                        <div
                                                            style="display:flex;align-items:center;gap:3px;height:100%;margin-right:12px">
                                                            <img src="{{ asset('assets/svg/svg-dialog/third-svg-dialog/microphone-2.svg') }}"
                                                                style="width:100%;height:100%;object-fit:cover"><span
                                                                style="font-weight:400;font-family:Genos">0</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}




                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>

        <x-modal id="createhistoryModal" title="Create History" saveBtnText="Create" saveBtnType="submit"
            saveBtnForm="createForm" size="md">
            @include('content.include.history.createForm')
        </x-modal>
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
                                        <img src="/public/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
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
                                            <img src="/public/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
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
                                            <img src="/public/storage/${childUltra?.user?.image}" alt="" data-user-popover="${childUltra?.user?.id}">
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
                                            <img src="/public/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
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
                                        <img src="/public/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
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
                    $('.comment-controls img').attr('src', '/public/storage/' + response?.data?.user
                        ?.image);
                    $('.comment-controls img').css('display', 'block');
                    $('.fancybox-caption__body .header img').attr('src', '/public/storage/' + response
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

        $('.add-history').click(function() {
            $('.modal-header h4').text('Create History');
            $('.modal-footer [type="submit"]').text('Create');
            $('[name="history_id"]').val('');
            $('#dropzone-video').css('background-image', 'unset');
            $('#dropzone-video').css('background-size', 'unset');
            $('#createForm')[0].reset();
        })

        $('.edit-history').click(function() {
            $('.modal-header h4').text('Edit History');
            $('.modal-footer [type="submit"]').text('Update');
            let name = $(this).attr('data-name');
            let video = $(this).attr('data-video');
            let comments = $(this).attr('data-comments');
            let share = $(this).attr('data-share');
            let emoji = $(this).attr('data-emoji');
            let id = $(this).attr('data-id');

            $('[name="history_id"]').val(id);
            $('[name="title"]').val(name);
            $('[name="source"]').val($(this).attr('data-source'));
            $('#dropzone-video').css('background-image', 'url(' + $(this).attr("data-thumbnail") + ')');
            $('#dropzone-video').css('background-size', 'cover');
            comments == true ? $('[name="comments"]').attr('checked', true) : $('[name="comments"]').attr('checked',
                false);
            share == true ? $('[name="share"]').attr('checked', true) : $('[name="share"]').attr('checked', false);
            emoji == true ? $('[name="emoji"]').attr('checked', true) : $('[name="emoji"]').attr('checked', false);
        })
    </script>

    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
            cluster: "{{env('PUSHER_APP_CLUSTER')}}"
        });

        var channel = pusher.subscribe('history-channel');
        channel.bind('history-event', function(data) {
            let comments = '';
            comments = getComments(data);
            $('.views-count-1').text(data.data.comments_count);
            $('.comments-list').html(comments);
            $('.likes-count span').text(data?.data?.like_count);
        });
    </script> --}}

    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>


@endsection
@endsection
