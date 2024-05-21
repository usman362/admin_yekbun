@extends('layouts/layoutMaster')

@section('title', 'Artists - List')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('content')
<script>
    const dropZoneInitFunctions = [];

</script>
{{-- Nav TAb --}}
<div class="d-flex justify-content-between">
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Artist /</span> All Artist
        </h4>
    </div>
    <div class="">
        @can('artist.create')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createartistModal">Add Artist</button>
        @endcan
    </div>
</div>

<!-- Artist List Table -->
<div class="card">
    <h5 class="card-header">Artist List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Artist</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($artists as $artist)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3"><img src="{{$artist->image ? asset("storage/".$artist->image) : "https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg"}}" alt="Avatar" class="rounded-circle"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">{{$artist->first_name}} {{$artist->last_name}}</span>
                                </a>
                                <!-- <small class="text-muted">Perwer</small> -->
                            </div>
                        </div>
                    </td>
                    <td>{{$artist->gender}}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            @can('location.write')
                                <!-- Edit -->
                                <span data-bs-toggle="modal" data-bs-target="#editModal{{ $artist->id }}">
                                    <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                </span>
                            @endcan
                            @can('location.delete')
                                <!-- Delete -->
                                <form action="{{ route('artist.destroy', $artist->id) }}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                </form>
                            @endcan
                        </div>
                        @can('artist.write')
                        <x-modal id="editModal{{ $artist->id }}" title="Edit Artist" saveBtnText="Update" saveBtnType="submit" saveBtnForm="editForm{{ $artist->id }}" size="md" :show="old('showEditFormModal'.$artist->id)? true: false">
                            @include('content.include.artist.editForm')
                        </x-modal>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="4"><b>No artist found. Please add a new atrist now...<b></td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

<script>
    // function delete_service(el) {
    //     let link = $(el).data('id');
    //     $('.deleted-modal').modal('show');
    //     $('#delete_form').attr('action', link);
    // }

</script>
<x-modal id="createartistModal" title="Create Artist" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm" size="md">
    @include('content.include.artist.createForm')
</x-modal>
@section('page-script')
<script>
    function confirmAction(event, callback) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?'
            , text: "Are you sure you want to delete this?"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Yes, delete it!'
            , customClass: {
                confirmButton: 'btn btn-danger me-3'
                , cancelButton: 'btn btn-label-secondary'
            }
            , buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                callback();
            }
        });
    }

</script>

<script>
    $('.province_id').change(function() {
        let url = $(this).data('url');
        let id = $(this).val();
        const self = this;

        $.ajax({
            type: 'get'
            , url: url + '/' + id
            , success: function(response) {
                const cityIdEl = $(self).closest('form').find('.city_id');
                cityIdEl.html('');
                $.each(response, function(index, value) {
                    console.log(index, value);
                    cityIdEl.append('<option value="' + value.id + '">' + value.name + '</option>')
                })
            }
        })

    });

    $(document).ready(function() {
        $('.edit-form .province_id').each(function(index, provinceEl) {
            let url = $(provinceEl).data('url');
            let id = $(provinceEl).val();
            let selected = $(provinceEl).data('selected');

            $.ajax({
                type: 'get'
                , url: url + '/' + id
                , success: function(response) {
                    const cityIdEl = $(provinceEl).closest('form').find('.city_id');
                    cityIdEl.html('');
                    $.each(response, function(index, value) {
                        cityIdEl.append('<option value="' + value.id + '" ' + (value.id == selected ? 'selected' : '') + '>' + value.name + '</option>')
                    })
                }
            })

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
