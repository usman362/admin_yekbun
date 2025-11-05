@extends('layouts/layoutMaster')

@section('title', 'Security Log Events')


@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />

@endsection
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card-header d-flex align-items-center px-2 justify-content-between">
            <h4 class="fw-bold py-3 mb-4">
                Security Log Events
            </h4>
        </div>
        <div style="padding:20px" class="card">
            <div class="row dt-row">
                <div class="card-datatable col-sm-12">
                    <table id="security-logs-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Event Type</th>
                                <th>IP Address</th>
                                <th>Device Fingerprint</th>
                                <th>Is Suspicious</th>
                                <th>Details</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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

    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#security-logs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('security-events') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'event_type',
                        name: 'event_type'
                    },
                    {
                        data: 'ip_address',
                        name: 'ip_address'
                    },
                    {
                        data: 'device_fingerprint',
                        name: 'device_fingerprint'
                    },
                    {
                        data: 'is_suspicious',
                        name: 'is_suspicious',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'details',
                        name: 'details'
                    },
                    {
                        data: 'timestamp',
                        name: 'timestamp'
                    },
                ],
                // order: [
                //     [7, 'desc']
                // ],
                pageLength: 10,
            });
        });
    </script>
@endsection
@endsection
