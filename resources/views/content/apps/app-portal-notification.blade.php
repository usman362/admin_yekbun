@extends('layouts/layoutMaster')

@section('title', 'Notifications')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
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
    {{-- <script src="{{ asset('assets/js/app-ecommerce-product-list.js') }}"></script> --}}
@endsection

@section('content')

    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="py-3 mb-4">
                Notifications
            </h4>

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <!-- Notifications -->
                        <h5 class="card-header">Recent Devices</h5>
                        <form action="{{ route('store.portal.notification') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ @$notification->id }}">
                            <div class="card-body">
                                <div class="error"></div>
                                <div class="table-responsive m-0">
                                    <table class="table table-striped table-borderless border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">Type</th>
                                                <th class="text-nowrap">Title</th>
                                                <th class="text-nowrap">Desription</th>
                                                <th class="text-nowrap text-center">👩🏻‍💻 App</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap" for="admin_activity">Admin Activity</td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_system_info">
                                                    System Update</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_system_info_title" autocomplete="off"
                                                        name="admin_system_info_title" value="{{@$notification->admin_system_info_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_system_info_description" name="admin_system_info_description">{{@$notification->admin_system_info_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="admin_system_info" name="admin_system_info"
                                                            @checked(@$notification->admin_system_info == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_donation">
                                                    Portal Donation</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_donation_title" autocomplete="off"
                                                        name="admin_donation_title" value="{{@$notification->admin_donation_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_donation_description" name="admin_donation_description">{{@$notification->admin_donation_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="admin_donation"
                                                            name="admin_donation" @checked(@$notification->admin_donation == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_surveys">
                                                    Portal Surveys</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_surveys_title" autocomplete="off"
                                                        name="admin_surveys_title" value="{{@$notification->admin_surveys_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_surveys_description" name="admin_surveys_description">{{@$notification->admin_surveys_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="admin_surveys"
                                                            name="admin_surveys" @checked(@$notification->admin_surveys == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_greetings">
                                                    Portal Greetings</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_greetings_title" autocomplete="off"
                                                        name="admin_greetings_title" value="{{@$notification->admin_greetings_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_greetings_description" name="admin_greetings_description">{{@$notification->admin_greetings_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="admin_greetings"
                                                            name="admin_greetings" @checked(@$notification->admin_greetings == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_events">
                                                    Portal
                                                    Event</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_events_title" autocomplete="off"
                                                        name="admin_events_title" value="{{@$notification->admin_events_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_events_description" name="admin_events_description">{{@$notification->admin_events_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="admin_events"
                                                            name="admin_events" @checked(@$notification->admin_events == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="admin_sos">SOS
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_sos_title" autocomplete="off"
                                                        name="admin_sos_title" value="{{@$notification->admin_sos_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_sos_description" name="admin_sos_description">{{@$notification->admin_sos_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="admin_sos"
                                                            name="admin_sos" @checked(@$notification->admin_sos == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px"
                                                    for="admin_live_stream">Portal Live Stream</td>
                                                <td>
                                                    <input class="form-control" type="text" id="admin_live_stream_title" autocomplete="off"
                                                        name="admin_live_stream_title" value="{{@$notification->admin_live_stream_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="admin_live_stream_description" name="admin_live_stream_description">{{@$notification->admin_live_stream_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="admin_live_stream" name="admin_live_stream"
                                                            @checked(@$notification->admin_live_stream == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" for="new_music">Music</td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_music">Songs
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_music_title" autocomplete="off"
                                                        name="new_music_title" value="{{@$notification->new_music_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_music_description" name="new_music_description">{{@$notification->new_music_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_music"
                                                            name="new_music" @checked(@$notification->new_music == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_artist">
                                                    Artist</td>
                                               <td>
                                                    <input class="form-control" type="text" id="new_artist_title" autocomplete="off"
                                                        name="new_artist_title" value="{{@$notification->new_artist_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_artist_description" name="new_artist_description">{{@$notification->new_artist_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_artist"
                                                            name="new_artist" @checked(@$notification->new_artist == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_video_clips">
                                                    Video Clips</td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_video_clips_title" autocomplete="off"
                                                        name="new_video_clips_title" value="{{@$notification->new_video_clips_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_video_clips_description" name="new_video_clips_description">{{@$notification->new_video_clips_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="new_video_clips" name="new_video_clips"
                                                            @checked(@$notification->new_video_clips == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_donation">Donation</td>
                                               <td>
                                                    <input class="form-control" type="text" id="new_donation_title" autocomplete="off"
                                                        name="new_donation_title" value="{{@$notification->new_donation_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_donation_description" name="new_donation_description">{{@$notification->new_donation_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_donation"
                                                            name="new_donation" @checked(@$notification->new_donation == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_events">Events</td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_events_title" autocomplete="off"
                                                        name="new_events_title" value="{{@$notification->new_events_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_events_description" name="new_events_description">{{@$notification->new_events_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_events"
                                                            name="new_events" @checked(@$notification->new_events == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_history">History</td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_history_title" autocomplete="off"
                                                        name="new_history_title" value="{{@$notification->new_history_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_history_description" name="new_history_description">{{@$notification->new_history_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_history"
                                                            name="new_history" @checked(@$notification->new_history == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_news">News</td>
                                               <td>
                                                    <input class="form-control" type="text" id="new_news_title" autocomplete="off"
                                                        name="new_news_title" value="{{@$notification->new_news_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_news_description" name="new_news_description">{{@$notification->new_news_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_news"
                                                            name="new_news" @checked(@$notification->new_news == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_ai_videos">Ai-Videos</td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_ai_videos_title" autocomplete="off"
                                                        name="new_ai_videos_title" value="{{@$notification->new_ai_videos_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_ai_videos_description" name="new_ai_videos_description">{{@$notification->new_ai_videos_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="new_ai_videos" name="new_ai_videos"
                                                            @checked(@$notification->new_ai_videos == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_votes">Survey</td>
                                                <td>
                                                    <input class="form-control" type="text" id="new_votes_title" autocomplete="off"
                                                        name="new_votes_title" value="{{@$notification->new_votes_title}}">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="new_votes_description" name="new_votes_description">{{@$notification->new_votes_description}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_votes"
                                                            name="new_votes" @checked(@$notification->new_votes == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="modal-footer p-0">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                            </div>
                            <!-- /Notifications -->
                    </div>
                    </form>
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
