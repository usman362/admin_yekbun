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
                                                <th class="text-nowrap text-center">👩🏻‍💻 App</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="text-nowrap" for="new_music">Music</td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_music">Songs</td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_music"
                                                            name="new_music" @checked(@$notification->new_music == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_artist">Artist</td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_artist"
                                                            name="new_artist" @checked(@$notification->new_artist == 'true')>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap" style="padding-left: 50px" for="new_video_clips">Video Clips</td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_video_clips"
                                                            name="new_video_clips" @checked(@$notification->new_video_clips == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_donation">Donation</td>
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
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_events"
                                                            name="new_events" @checked(@$notification->new_events == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_history">History</td>
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
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_news"
                                                            name="new_news" @checked(@$notification->new_news == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_videos">Videos</td>
                                                <td>
                                                    <div class="form-check d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" id="new_videos"
                                                            name="new_videos" @checked(@$notification->new_videos == 'true')>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap" for="new_votes">Votes</td>
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
