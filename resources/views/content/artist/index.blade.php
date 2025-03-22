@extends('layouts/layoutMaster')

@section('title', 'Artists - List')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
@endsection
@section('vendor-script')
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
                <span class="text-muted fw-light">Artist /</span> All Artist
            </h4>
        </div>
        <div class="">
            {{-- @can('artist.create') --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createartistModal">Add Artist</button>
            {{-- @endcan --}}
            {{-- @can('crea') --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmusicModal">Add Songs</button>
            {{-- @endcan --}}
            {{-- @can('artist.create') --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createvideoModal">Add Video
                Clips</button>
            {{-- @endcan --}}
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
                        <th>Total Songs</th>
                        <th>Total Video Clips</th>
                        <th>Like</th>
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
                                        <div class="avatar avatar-sm me-3"><img
                                                src="{{ $artist->image ? asset('storage/' . $artist->image) : 'https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg' }}"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                            <span class="fw-semibold">{{ $artist->name }}</span>
                                        </a>
                                        <small class="fw-semibold">{{ $artist->gender }} -
                                            {{ $artist->province->name ?? 'N/A' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-black artistDetail" data-id="{{ $artist->id }}"
                                    data-section="songs" data-bs-toggle="modal"
                                    data-image="{{ asset('storage/' . $artist->image) }}" data-name="{{ $artist->name }}"
                                    data-gender="{{ $artist->gender }}"
                                    data-province="{{ $artist->province->name ?? 'N/A' }}"
                                    data-bs-target="#artistDetailModal">{{ $artist->songs->count() }}</a></td>
                            <td><a href="javascript:void(0)" class="text-black artistDetail" data-id="{{ $artist->id }}"
                                    data-section="videos" data-bs-toggle="modal" data-name="{{ $artist->name }}"
                                    data-image="{{ asset('storage/' . $artist->image) }}"
                                    data-gender="{{ $artist->gender }}"
                                    data-province="{{ $artist->province->name ?? 'N/A' }}"
                                    data-bs-target="#artistDetailModal">{{ $artist->videos->count() }}</a></td>
                            <td>0</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    {{-- @can('location.write') --}}
                                    <!-- Edit -->
                                    <span data-bs-toggle="modal" data-bs-target="#editModal{{ $artist->id }}">
                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                            data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M4.76562 22.0449H20.7656" stroke="#1C274C"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M15.3952 2.96634L14.6537 3.70785L7.83668 10.5248C7.37495 10.9866 7.14409 11.2174 6.94554 11.472C6.71133 11.7723 6.51053 12.0972 6.3467 12.4409C6.20781 12.7324 6.10457 13.0421 5.89807 13.6616L5.02307 16.2866L4.80918 16.9282C4.70757 17.2331 4.78691 17.5692 5.01413 17.7964C5.24135 18.0236 5.57745 18.103 5.8823 18.0014L6.52396 17.7875L9.14897 16.9125L9.14902 16.9125C9.76846 16.706 10.0782 16.6027 10.3696 16.4638C10.7134 16.3 11.0383 16.0992 11.3386 15.865C11.5931 15.6665 11.824 15.4356 12.2857 14.9739L12.2857 14.9739L19.1027 8.15687L19.8442 7.41537C21.0728 6.1868 21.0728 4.19491 19.8442 2.96634C18.6156 1.73778 16.6237 1.73778 15.3952 2.96634Z"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M14.654 3.70801C14.654 3.70801 14.7467 5.2837 16.1371 6.67402C17.5274 8.06434 19.1031 8.15703 19.1031 8.15703M6.52433 17.7876L5.02344 16.2867"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                            </svg>
                                        </button>
                                    </span>
                                    {{-- @endcan --}}
                                    @if ($artist->videos->count() == 0 && $artist->songs->count() == 0)
                                        {{-- @can('location.delete') --}}

                                        <!-- Delete -->
                                        <form action="{{ route('artist.destroy', $artist->id) }}" method="post"
                                            class="d-inline delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-icon delete-btn"
                                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                data-bs-html="true" data-bs-original-title="Remove">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5"
                                                        d="M9.84961 4.04492C10.2614 2.87973 11.3727 2.04492 12.6789 2.04492C13.9851 2.04492 15.0964 2.87973 15.5082 4.04492"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M21.1798 6.04492H4.17969" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M19.5124 8.54492L19.0524 15.444C18.8754 18.0989 18.7869 19.4264 17.9219 20.2357C17.0569 21.0449 15.7265 21.0449 13.0657 21.0449H12.2924C9.63155 21.0449 8.30115 21.0449 7.43614 20.2357C6.57113 19.4264 6.48264 18.0989 6.30564 15.444L5.8457 8.54492"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M10.1797 11.0449L10.6797 16.0449"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M15.1797 11.0449L14.6797 16.0449"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </form>
                                        {{-- @endcan --}}
                                    @endif

                                </div>
                                {{-- @can('artist.write') --}}
                                <x-modal id="editModal{{ $artist->id }}" title="Edit Artist" saveBtnText="Update"
                                    saveBtnType="submit" saveBtnForm="editForm{{ $artist->id }}" size="md"
                                    :show="old('showEditFormModal' . $artist->id) ? true : false">
                                    @include('content.include.artist.editForm')
                                </x-modal>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4"><b>No artist found. Please add a new atrist now...<b>
                            </td>
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
    {{-- Artist Modal --}}
    <x-modal id="createartistModal" title="Create Artist" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createartistForm" size="md">
        @include('content.include.artist.createForm', ['form' => 'createartistForm'])
    </x-modal>

    {{-- Songs Modal --}}
    <x-modal id="createmusicModal" title="Create Song" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createmusicForm" size="md">
        @include('content.video_clips.createSong', ['form' => 'createmusicForm'])
    </x-modal>

    {{-- Video Clips Modal --}}
    <x-modal id="createvideoModal" title="Create Video Clips" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createvideoForm" size="md">
        @include('content.include.video_clips.createForm', ['form' => 'createvideoForm'])
    </x-modal>

    <x-modal id="musicCategoryModal" title="Move the Songs" saveBtnText="Save" saveBtnType="submit"
        saveBtnForm="musicCategoryForm" size="md">
        @include('content.include.music_category.category', [
            'form' => 'musicCategoryForm',
            'categories' => $categories,
        ])
    </x-modal>

    <x-modal id="artistDetailModal" title="detail-artist" size="xl">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="songs-tab" data-toggle="tab" href="#songs" role="tab"
                        aria-controls="songs" aria-selected="true">
                        Total Songs &nbsp;<span id="total_songs">125 - 12GB</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab"
                        aria-controls="videos" aria-selected="false">
                        Total Video Clips &nbsp;<span id="total_videos">125 - 12GB</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="songs" role="tabpanel" aria-labelledby="songs-tab">
                    <div class="table-responsive text-nowrap pd-t-24px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Song ID</th>
                                    <th>Song Title</th>
                                    <th>Tracks</th>
                                    <th>Total Listen</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="songs-tbody" class="table-border-bottom-0">
                                <tr>
                                    <td class="text-center" colspan="8"><b>No Data found.</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                    <div class="table-responsive text-nowrap pd-t-24px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Clip ID</th>
                                    <th>Clip Title</th>
                                    <th>Clip</th>
                                    <th>Total Listen</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="videos-tbody" class="table-border-bottom-0">
                                <tr>
                                    <td class="text-center" colspan="8"><b>No Data found.</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                $('.delete-btn').on('click', function(event) {
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
            $('.province_id').change(function() {
                let url = $(this).data('url');
                let id = $(this).val();
                const self = this;

                $.ajax({
                    type: 'get',
                    url: url + '/' + id,
                    success: function(response) {
                        const cityIdEl = $(self).closest('form').find('.city_id');
                        cityIdEl.html('');
                        $.each(response, function(index, value) {
                            console.log(index, value);
                            cityIdEl.append('<option value="' + value.id + '">' + value.name +
                                '</option>')
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
                        type: 'get',
                        url: url + '/' + id,
                        success: function(response) {
                            const cityIdEl = $(provinceEl).closest('form').find('.city_id');
                            cityIdEl.html('');
                            $.each(response, function(index, value) {
                                cityIdEl.append('<option value="' + value.id + '" ' + (value
                                        .id == selected ? 'selected' : '') + '>' + value
                                    .name + '</option>')
                            })
                        }
                    })

                });
            });
        </script>

        <script>
            'use strict';

            function initializeDropzone(dropzoneId, hiddenInputName, folder, acceptedFiles, limit = 1) {
                const previewTemplate = `<div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100">
                                    <div class="dz-details">
                                      <div class="dz-thumbnail" style="width:95%">
                                        <img data-dz-thumbnail >
                                        <span class="dz-nopreview">No preview</span>
                                        <div class="dz-success-mark"></div>
                                        <div class="dz-error-mark"></div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                        </div>
                                      </div>
                                      <div class="dz-filename" data-dz-name></div>
                                      <div class="dz-size" data-dz-size></div>
                                    </div>
                                    </div></div></div>`;
                let dropzoneKey = 0;
                return new Dropzone(dropzoneId, {
                    url: '{{ route('file.upload') }}',
                    previewTemplate: previewTemplate,
                    parallelUploads: 1,
                    maxFilesize: 100,
                    addRemoveLinks: true,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    acceptedFiles: acceptedFiles, // Accept specified file types
                    maxFiles: limit, // Allow only one file to be selected
                    sending: function(file, xhr, formData) {
                        formData.append('folder', folder);
                    },
                    success: function(file, response) {
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-success");
                        }
                        file.previewElement.dataset.path = response.path;
                        const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                            '.hidden-inputs');
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${hiddenInputName}" value="${response.path}" data-path="${response.path}">`;
                        let fileInputName = hiddenInputName.replace(/\w+\[\]/g, function(match) {
                            return match.slice(0, -2);
                        });
                        if (limit == 1) {

                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_name" value="${$('.dz-filename').eq(dropzoneKey).text()}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_length" value="${response.duration}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_size" value="${response.size}">`;
                        } else {
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_name[]" value="${$('.dz-filename').eq(dropzoneKey).text()}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_length[]" value="${response.duration}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_size[]" value="${response.size}">`;
                            dropzoneKey++;
                        }

                    },
                    removedfile: function(file) {
                        const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                            '.hidden-inputs');
                        hiddenInputsContainer.querySelector(
                            `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                        if (file.previewElement != null && file.previewElement.parentNode != null) {
                            file.previewElement.parentNode.removeChild(file.previewElement);
                        }

                        $.ajax({
                            url: '{{ route('file.delete') }}',
                            method: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                path: file.previewElement.dataset.path
                            },
                            success: function() {
                                dropzoneKey--;
                            }
                        });

                        return this._updateMaxFilesReachedClass();
                    }
                });
            }

            // Initialize multiple Dropzones
            document.addEventListener('DOMContentLoaded', function() {
                initializeDropzone('#dropzone-artist-img', 'image', 'images', 'image/*');
                initializeDropzone('#dropzone-video', 'video', 'videos', 'video/*');
                initializeDropzone('#dropzone-song', 'songs[]', 'audios', 'audio/*', 100);
                initializeDropzone('#dropzone-audio', 'audio', 'audios', 'audio/*');

            });
        </script>

        <script>
            function drpzone_init() {
                dropZoneInitFunctions.forEach(callback => callback());
            }
        </script>
        <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>

        <script>
            $(document).ready(function() {
                $('.artistDetail').click(function() {
                    let id = $(this).attr('data-id');
                    let artistName = $(this).attr('data-name');
                    let artistImage = $(this).attr('data-image');
                    let artistGender = $(this).attr('data-gender');
                    let artistProvince = $(this).attr('data-province');
                    let totalSongs = 0;
                    let totalSongsMbs = 0;
                    let totalVideos = 0;
                    let totalVideosMbs = 0;
                    let section = $(this).attr('data-section');

                    $('#artistName').text(artistName);
                    $('#artistImage').text(artistImage);
                    $('#artistGender').text(artistGender);
                    $('#artistProvince').text(artistProvince);
                    $('#artistImage').attr('src', artistImage);
                    $.ajax({
                        url: '{{ route('get.artist.detail') }}',
                        method: 'get',
                        data: {
                            id: id,
                            section: section
                        },
                        success: function(response) {
                            // Log the response to see the structure


                            // Clear existing data
                            $('#songs-tbody').empty();
                            $('#videos-tbody').empty();

                            // Update Songs Tab
                            if (response.songs && response.songs.length > 0) {
                                response.songs.forEach(song => {
                                    totalSongsMbs += parseInt(song.file_size);
                                    const deleteUrl =
                                        '{{ url('/') }}/musics/delete_song/' + song
                                        ._id;
                                    $('#songs-tbody').append(`
                                    <tr>
                                        <td>${song.custom_id || song._id}</td>
                                        <td><p class="m-0">${song.name}</p>
                                            <small><i>${song.file_size >= 1024 ? (song.file_size/1024)+'GB' : song.file_size+'MB'}&nbsp; - ${song.length} - &nbsp;${formatDate(song.created_at)}</i></small>
                                        </td>
                                        <td><audio src="{{ asset('storage/${song.audio}') }}" controls></audio></td>
                                        <td>${song.total_listen || 'N/A'}</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <!-- Delete -->
                                                <form action="${deleteUrl}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.5" d="M9.84961 4.04492C10.2614 2.87973 11.3727 2.04492 12.6789 2.04492C13.9851 2.04492 15.0964 2.87973 15.5082 4.04492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M21.1798 6.04492H4.17969" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M19.5124 8.54492L19.0524 15.444C18.8754 18.0989 18.7869 19.4264 17.9219 20.2357C17.0569 21.0449 15.7265 21.0449 13.0657 21.0449H12.2924C9.63155 21.0449 8.30115 21.0449 7.43614 20.2357C6.57113 19.4264 6.48264 18.0989 6.30564 15.444L5.8457 8.54492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M10.1797 11.0449L10.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M15.1797 11.0449L14.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                                });

                                totalSongs = response.songs.length;
                                totalSongsMbs = (totalSongsMbs >= 1024 ? (totalSongsMbs/1024).toFixed(2)+'GB' : totalSongsMbs.toFixed(2)+'MB');
                                $('#total_songs').html(`<i>${totalSongs} / ${totalSongsMbs}</i>`);

                            } else {
                                $('#songs-tbody').append(
                                    '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                                );
                            }

                            // Update Videos Tab
                            if (response.clips && response.clips.length > 0) {
                                response.clips.forEach(video => {
                                    totalVideosMbs += parseInt(video.video_file_size);
                                    const deleteVideoUrl =
                                        '{{ url('/') }}/video-clips/' + video._id;
                                    $('#videos-tbody').append(`
                                        <tr>
                                            <td>${video.custom_id || video._id}</td>
                                            <td>
                                                <p class="m-0">${video.video_file_name}</p>
                                                <small><i>${video.video_file_size >= 1024 ? (video.video_file_size/1024)+'GB' : video.video_file_size+'MB'}&nbsp; - ${video.video_file_length} - &nbsp;${formatDate(video.created_at)}</i></small>
                                            </td>
                                            <td><video src="{{ asset('storage/${video.video}') }}" width="100" height="60"></video></td>
                                            <td>${video.total_listen || 'N/A'}</td>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                                            <!-- Edit -->
                                                                                                                <!-- Delete -->
                                        <form action="${deleteVideoUrl}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" d="M9.84961 4.04492C10.2614 2.87973 11.3727 2.04492 12.6789 2.04492C13.9851 2.04492 15.0964 2.87973 15.5082 4.04492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M21.1798 6.04492H4.17969" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M19.5124 8.54492L19.0524 15.444C18.8754 18.0989 18.7869 19.4264 17.9219 20.2357C17.0569 21.0449 15.7265 21.0449 13.0657 21.0449H12.2924C9.63155 21.0449 8.30115 21.0449 7.43614 20.2357C6.57113 19.4264 6.48264 18.0989 6.30564 15.444L5.8457 8.54492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M10.1797 11.0449L10.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M15.1797 11.0449L14.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </button>
                                        </form>
                                                                    </div>
                                            </td>
                                        </tr>
                                    `);
                                });

                                totalVideos = response.clips.length;
                                totalVideosMbs = (totalVideosMbs >= 1024 ? (totalVideosMbs/1024).toFixed(2)+'GB' : totalVideosMbs.toFixed(2)+'MB');
                                $('#total_videos').html(`<i>${totalVideos} / ${totalVideosMbs}</i>`);
                            } else {
                                $('#videos-tbody').append(
                                    '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                                );
                            }
                        }
                    });
                });

                function formatDate(dateString) {
                    let date = new Date(dateString);
                    let options = {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    };
                    return date.toLocaleDateString('en-GB', options).replace(',', '');
                }

                $('form').on('submit', function(event) {
                    event.preventDefault();
                    const form = $(this);
                    const formData = new FormData(form[0]);

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Handle success
                            $('#editAlbumModal' + formData.get('id')).modal('hide');
                            window.location.reload();
                        },
                        error: function(error) {
                            // Handle error
                            alert('Failed to Submit!');
                        }
                    });
                });


                $(document).on('click', '.change_music_category', function() {
                    let music_id = $(this).attr('data-music_id');
                    $('#music_id').val(music_id);
                });
            });
        </script>
    @endsection
@endsection
