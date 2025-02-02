@extends('layouts/layoutMaster')

@section('title', 'Cities - List')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        #DataTables_Table_0_length {
            display: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: 1px solid #696dff;
            background: #696dff;
        }
    </style>
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Form Validation -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection


@section('content')
    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Settings /</span> Add / Manage City
            </h4>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">City List</h5>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
                    class="bx bx-plus me-0 me-sm-1"></i> Add City</button>

        </div>
        <div class="card-datatable table-responsive">

            <table class="table data-table dt-multilingual border-top no-footer dtr-column">
                <thead>
                    <tr>
                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                            style="width: 0px; display: none;" aria-label=""></th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1"
                            colspan="1" style="width: 178px;"
                            aria-label="Name: aktivieren, um Spalte absteigend zu sortieren" aria-sort="ascending">Country
                            Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1"
                            style="width: 262px;" aria-label="Position: aktivieren, um Spalte aufsteigend zu sortieren">
                            Province Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1"
                            style="width: 264px;" aria-label="Email: aktivieren, um Spalte aufsteigend zu sortieren">Zip
                            Code</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1"
                            style="width: 91px;" aria-label="Date: aktivieren, um Spalte aufsteigend zu sortieren">City Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1"
                            style="width: 89px;" aria-label="Salary: aktivieren, um Spalte aufsteigend zu sortieren">Total
                            People</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 74px;"
                            aria-label="Actions">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>

    <x-modal id="createModal" title="Add City" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm"
        size="md" :show="old('showCreateFormModal') ? true : false">
        @include('content.settings.cities.includes.create_form')
    </x-modal>

    <x-modal id="editModal" title="Edit City" saveBtnText="Update" saveBtnType="submit"
        saveBtnForm="editForm" size="sm" :show="false">
        @include('content.settings.cities.includes.edit_form')
    </x-modal>

@endsection

@section('page-script')
    @parent
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
    const regions = @json($countries->mapWithKeys(function ($country) {
      return [$country->id => $country->regions->map(function ($region) {
          return [
              'id'   => $region->id,
              'name' => $region->name,
          ];
      })];
    }));
  </script>

    <script>
        function loadRegions(event) {
            const countryId = event.target.value;
            const regionSelectInput = event.target.closest('form').querySelector('[name=region_id]');
            regionSelectInput.innerHTML = '';

            const option = document.createElement('option');
            option.value = "";
            option.text = "Choose";
            regionSelectInput.add(option);
            regions[countryId].forEach(region => {
                const option = document.createElement('option');
                option.value = region.id;
                option.text = region.name;
                regionSelectInput.add(option);
            });
        }
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('settings.cities.index') }}",
                columns: [
                    { data: 'country', name: 'country.name' },
                    { data: 'region', name: 'region.name' },
                    { data: 'zipcode', name: 'zipcode' },
                    { data: 'name', name: 'name' },
                    { data: 'total_people', name: 'users.count', orderable: false, searchable: false },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });

            $('body').on('click','.btn-edit-city',function(){
                $('#city_id').val($(this).attr('data-id'));
                $('#editCountryId').val($(this).attr('data-country_id'));
                $('#editCountryId').trigger('change');
                $('#editRegionId').val($(this).attr('data-region_id'));
                $('#editRegionId').trigger('change');
                $('#editName').val($(this).attr('data-name'));
                $('#editZipcode').val($(this).attr('data-zipcode'));
                $('#editModal').modal('show');
            });
        });
    </script>

@endsection
