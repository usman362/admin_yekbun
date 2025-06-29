@extends('layouts/layoutMaster')

@section('title', 'ZarokTV Series')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        #DataTables_Table_0_wrapper .row:first-child {
            display: none;
        }

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

        .modal-content {
            max-height: 90vh !important;
            /* Set max height */
            overflow: unset !important;
            /* Prevent overflow */
        }

        .modal-body {
            max-height: 70vh !important;
            /* Adjust based on your layout */
            overflow-y: auto !important;
            /* Enables scrolling if content exceeds max height */
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
            background-size: cover;
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
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection
@section('vendor-script')
    <!-- Fancybox -->

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>
    {{-- Nav TAb --}}
    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">ZarokTV /</span> Series
            </h4>
        </div>
        <div class="">

            {{-- @can('artist.create') --}}
            <button class="btn btn-primary add-video-clips" data-bs-toggle="modal" data-bs-target="#createvideoModal">Add
                new Series</button>
            <button class="btn btn-primary add-video-clips" data-bs-toggle="modal" data-bs-target="#createvideoModal">Add
                new Season</button>
            <button class="btn btn-primary add-video-clips" data-bs-toggle="modal" data-bs-target="#createvideoModal">Add
                new Episode</button>
            {{-- @endcan --}}
        </div>
    </div>

    <!-- Artist List Table -->
    <div class="card">

        <div class="table-responsive container pb-4 text-nowrap">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="row m-4">
                        <div class="col-md-6">
                            <label for="search">Search</label>
                            <input type="search" class="form-control" id="search" name="search">
                        </div>
                        <div class="col-md-6">
                            <label for="sort_by">Sort By</label>
                            <select name="sort_by" id="sort_by" class="form-control">
                                <option value="">Select Sort By</option>
                                <option value="songs">Most Songs</option>
                                <option value="videos">Most Videos</option>
                                <option value="likes">Most Likes</option>
                                <option value="followers">Most Followers</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                @foreach ($videos as $video)
                    <div class="col-md-3">
                        <div class="post-image">
                            <div id="feed-post-1" class="card is-post mt-4 pt-3 pl-4 pr-4 view-post card-post"
                                data-fancybox="post1" data-lightbox-type="comments"
                                data-thumb="{{ asset('storage/' . $video->video) }}"
                                href="{{ asset('storage/' . $video->video) }}" data-id="{{ $video->id }}"
                                data-demo-href="{{ asset('storage/' . $video->video) }}">
                                <!-- Main wrap -->
                                <div class="content-wrap">

                                    <!-- Post body -->
                                    <div class="card-body p-0">

                                        <div style="background-image: url('{{ asset('storage/' . $video->thumbnail) }}');"
                                            class="card-post-thumbnail">
                                            <span class="video-thumbnail-duration">04:49</span>
                                        </div>
                                    </div>
                                    <div class="card-footer mt-0">
                                        <div class="user-block">
                                            <div class="user-info">
                                                <div class="row">
                                                    <div class="col-md-2 p-0">
                                                        <img src="{{asset('images/user-clips-report-user.png')}}"
                                                            style="width: 100px !important;height:45px !important;">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="mt-2">
                                                            <p class="m-0" title="Şeyda Were">
                                                                <b>Admin User</b>
                                                            </p>
                                                            <small class="time"><i>0 Views .
                                                                    &nbsp;&nbsp;07 May 2025</i></small>
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
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu text-center dropdown-menu-end"
                                    style="min-width: unset; width: 100px;">
                                    <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                    <div class="row ml-0" style="width:100px;">

                                        <div class="col-md-6" style="border-right: 1px solid #c0c0c0">
                                            <a class="dropdown-item edit-video" style="padding: 0"
                                                href="javascript:void(0)" data-id="{{$video->id}}"
                                                data-thumbnail="https://admin.yekbun.net/public/storage/thumbnails/6812114dabdb3___Şeyda_-_Were_thumb_2.jpg"
                                                data-artist_id="68109b6fcca2aa23040cf172" data-status="1"
                                                for="customRadioPrime">
                                                <img class="pop_action_image" style="height: 26px"
                                                    src="{{asset('assets/svg/edit.svg')}}"></a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" data-id="{{$video->id}}"
                                                class="dropdown-item delete-video" style="padding: 0">
                                                <img class="pop_action_image" style="height: 26px"
                                                    src="{{asset('assets/svg/delete.svg')}}"></button>
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

    {{-- Video Clips Modal --}}
    <x-modal id="createvideoModal" title="Create Series" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createvideoForm" size="md">
        @include('content.include.zarok_series.createForm', ['form' => 'createvideoForm'])
    </x-modal>

@section('page-script')
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

        $(document).ready(function() {
            $('table').on('click', '.delete-btn', function(event) {
                event.preventDefault(); // Stop any default action
                let form = $(this).closest('.delete-form'); // Get the closest form

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to delete this?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    customClass: {
                        confirmButton: 'btn btn-danger me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form after confirmation
                    }
                });
            });
        });
    </script>
    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection
@endsection
