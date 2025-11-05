@extends('layouts/layoutMaster')

@section('title', 'Suspicious Devices')


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
                Suspicious Devices
            </h4>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary add-button" data-bs-toggle="modal"
                    data-bs-target="#addDevice">Add Device</a>
            </div>
        </div>
        <div style="padding:20px" class="card">
            <div class="row dt-row">
                <div class="card-datatable col-sm-12">
                    <table class="datatables-basic table table-striped" id="devices-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Device Fingerprint</th>
                                <th>Model</th>
                                <th>Android Version</th>
                                {{-- <th>First Seen</th>
                                <th>Last Active</th>
                                <th>Request Count</th> --}}
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <!-- Add/Edit Modal -->
    <div class="modal fade" id="addDevice" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deviceForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Add Device</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="device_id" name="device_id">
                        <div class="mb-3">
                            <label>User ID</label>
                            <select class="form-control" name="user_id" id="user_id" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->_id }}">{{ $user->name . ' ' . $user->last_name.' - '.$user->user_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Device Fingerprint</label>
                            <input type="text" class="form-control" name="device_fingerprint" required>
                        </div>
                        <div class="mb-3">
                            <label>Device Model</label>
                            <input type="text" class="form-control" name="device_model">
                        </div>
                        <div class="mb-3">
                            <label>Android Version</label>
                            <input type="text" class="form-control" name="android_version">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script> --}}
    <script type="text/javascript">
        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data['img_src']) {
                img_src = data['img_src'];
                template = $("<div style=\"display:flex;gap:4px;margin-top:10px;\"><img src=\"" + img_src +
                    "\" style=\"width:20px;height:20px;border-radius:20px;\"/><p style=\"font-weight: 400;font-size:10pt; margin-top:-5px;\">" +
                    text + "</p></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({
            'height': '47px'
        });
        $('.add-button').click(function() {
            $('#department_id').val('');
            $('#department_name').val('');
            $('#modal-title').html("Add Department");
        });
        $('.edit-button').click(function() {
            $('#department_id').val($(this).attr('data-id'));
            $('#modal-title').html("Edit Department");
            $('#department_name').val($(this).attr('data-name'));
        });
        $('.datatables-basic').on('click', '.show-subdepartment', function() {
            let department_id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('get.SubDepartments', ['id' => 'id']) }}".replace('id', department_id),
                method: "GET",
                success: function(response) {
                    console.log(response.departments);
                    let tbody = '';
                    $.each(response.departments, function(i, v) {
                        tbody += `<tr>` +
                            `<td class="align-middle text-center">${++i}</td>` +
                            `<td class="align-middle text-center">${v.name}</td>` +
                            `<td class="align-middle text-center">${v.department?.name}</td>` +
                            `<tr/>`;
                    })
                    $('#subdepartment-table tbody').html(tbody);
                },
            })
        })
        $('#parent_id').select2();
    </script>

    <script>
        $(function() {
            let table = $('#devices-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('suspicious.devices') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'device_fingerprint',
                        name: 'device_fingerprint'
                    },
                    {
                        data: 'device_model',
                        name: 'device_model'
                    },
                    {
                        data: 'android_version',
                        name: 'android_version'
                    },
                    // {
                    //     data: 'first_seen',
                    //     name: 'first_seen'
                    // },
                    // {
                    //     data: 'last_active',
                    //     name: 'last_active'
                    // },
                    // {
                    //     data: 'request_count',
                    //     name: 'request_count'
                    // },
                    {
                        data: 'is_blocked',
                        name: 'is_blocked',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // Save Device
            $('#deviceForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let id = $('#device_id').val();
                let url = id ? `/suspicious-devices/update/${id}` : `{{ route('devices.store') }}`;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#addDevice').modal('hide');
                        table.ajax.reload();
                        toastr.success(res.message);
                    }
                });
            });

            // Block Device
            $(document).on('click', '.blockDevice', function() {
                let id = $(this).data('id');
                $.post(`/suspicious-devices/block/${id}`, {
                    _token: '{{ csrf_token() }}'
                }, function(res) {
                    table.ajax.reload();
                    toastr.success(res.message);
                });
            });

            // Delete Device
            $(document).on('click', '.deleteDevice', function() {
                let id = $(this).data('id');
                if (confirm('Are you sure you want to delete this device?')) {
                    $.ajax({
                        url: `/suspicious-devices/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            table.ajax.reload();
                            toastr.success(res.message);
                        }
                    });
                }
            });
        });
    </script>
@endsection
@endsection
