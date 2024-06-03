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
            @can('artist.create')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createartistModal">Add Artist</button>
            @endcan
            {{-- @can('crea') --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmusicModal">Add Songs</button>
            {{-- @endcan --}}
            {{-- @can('alb') --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createalbumModal">Add Albums</button>
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
                        <th>Total Albums</th>
                        <th>Total Video Clips</th>
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
                                        <div class="avatar avatar-sm me-3"><img
                                                src="{{ $artist->image ? asset('storage/' . $artist->image) : 'https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg' }}"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                            <span class="fw-semibold">{{ $artist->first_name }}
                                                {{ $artist->last_name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-black artistDetail" data-id="{{ $artist->id }}"
                                    data-section="songs" data-bs-toggle="modal"
                                    data-bs-target="#artistDetailModal">{{ $artist->songs->count() }}</a></td>
                            <td><a href="javascript:void(0)" class="text-black artistDetail" data-id="{{ $artist->id }}"
                                    data-section="albums" data-bs-toggle="modal"
                                    data-bs-target="#artistDetailModal">{{ $artist->albums->count() }}</a></td>
                            <td><a href="javascript:void(0)" class="text-black artistDetail" data-id="{{ $artist->id }}"
                                    data-section="videos" data-bs-toggle="modal"
                                    data-bs-target="#artistDetailModal">{{ $artist->videos->count() }}</a></td>
                            <td>{{ $artist->gender }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    @can('location.write')
                                        <!-- Edit -->
                                        <span data-bs-toggle="modal" data-bs-target="#editModal{{ $artist->id }}">
                                            <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i
                                                    class="bx bx-edit"></i></button>
                                        </span>
                                    @endcan
                                    @can('location.delete')
                                        <!-- Delete -->
                                        <form action="{{ route('artist.destroy', $artist->id) }}"
                                            onsubmit="confirmAction(event, () => event.target.submit())" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                        </form>
                                    @endcan
                                </div>
                                @can('artist.write')
                                    <x-modal id="editModal{{ $artist->id }}" title="Edit Artist" saveBtnText="Update"
                                        saveBtnType="submit" saveBtnForm="editForm{{ $artist->id }}" size="md"
                                        :show="old('showEditFormModal' . $artist->id) ? true : false">
                                        @include('content.include.artist.editForm')
                                    </x-modal>
                                @endcan
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

    {{-- Album Modal --}}
    <x-modal id="createalbumModal" title="Create Album" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createAlbumForm" size="md">
        @include('content.include.album.createForm', ['form' => 'createalbumForm'])
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

    <x-modal id="artistDetailModal" title="Detail Artist" size="xl">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="songs-tab" data-toggle="tab" href="#songs" role="tab"
                        aria-controls="songs" aria-selected="true">
                        Total Songs - Total 125 - 12GB
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="albums-tab" data-toggle="tab" href="#albums" role="tab"
                        aria-controls="albums" aria-selected="false">
                        Total Albums - Total 125 - 12GB
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab"
                        aria-controls="videos" aria-selected="false">
                        Total Video Clips - Total 125 - 12GB
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
                                    <th>Uploaded Date</th>
                                    <th>Size</th>
                                    <th>Length</th>
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
                <div class="tab-pane fade" id="albums" role="tabpanel" aria-labelledby="albums-tab">
                    <div class="table-responsive text-nowrap pd-t-24px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Album ID</th>
                                    <th>Album Title</th>
                                    <th>Total Tracks</th>
                                    <th>Total Sales</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="albums-tbody" class="table-border-bottom-0">
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
                                    <th>Uploaded Date</th>
                                    <th>Size</th>
                                    <th>Length</th>
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
                        let fileSize = $('.dz-size').eq(dropzoneKey).text();
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
                                `<input type="hidden" name="${fileInputName}_file_size" value="${fileSize.match(/[\d.]+/)[0]}">`;
                        } else {
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_name[]" value="${$('.dz-filename').eq(dropzoneKey).text()}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_length[]" value="${response.duration}">`;
                            hiddenInputsContainer.innerHTML +=
                                `<input type="hidden" name="${fileInputName}_file_size[]" value="${fileSize.match(/[\d.]+/)[0]}">`;
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
                // initializeDropzone('#dropzone-img', 'image', 'images', 'image/*');
                initializeDropzone('#dropzone-artist-img', 'image', 'images', 'image/*');
                initializeDropzone('#dropzone-album-img', 'image', 'images', 'image/*');
                initializeDropzone('#dropzone-video', 'video', 'videos', 'video/*');
                initializeDropzone('#dropzone-album', 'album', 'audios', 'audio/*');
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
                    let section = $(this).attr('data-section');
                    $.ajax({
                        url: '{{ route('get.artist.detail') }}',
                        method: 'get',
                        data: {
                            id: id,
                            section: section
                        },
                        success: function(response) {
                            // Log the response to see the structure
                            console.log(response);

                            // Clear existing data
                            $('#songs-tbody').empty();
                            $('#albums-tbody').empty();
                            $('#videos-tbody').empty();

                            // Update Songs Tab
                            if (response.songs && response.songs.length > 0) {
                                response.songs.forEach(song => {
                                    $('#songs-tbody').append(`
                                        <tr>
                                            <td>${song.custom_id || song._id}</td>
                                            <td>${song.name}</td>
                                            <td><audio src="{{ asset('storage/${song.audio}') }}" controls ></audio></td>
                                            <td>${song.total_listen || 'N/A'}</td>
                                            <td>${new Date(song.created_at).toLocaleDateString()}</td>
                                            <td>${song.file_size} MB</td>
                                            <td>${song.length}</td>
                                            <td><button class="btn btn-sm btn-primary">Option</button></td>
                                        </tr>
                                    `);
                                });
                            } else {
                                $('#songs-tbody').append(
                                    '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                                );
                            }

                            // Update Albums Tab
                            if (response.albums && response.albums.length > 0) {
                                response.albums.forEach(album => {
                                    let totalFileSize = 0;
                                    if (album.artist.songs && album.artist.songs.length > 0) {
                                        totalFileSize = album.artist.songs.reduce((sum, song) =>
                                            sum + parseFloat(song.file_size), 0);
                                    }
                                    $('#albums-tbody').append(`
                                        <tr>
                                            <td>${album.custom_id || album._id}</td>
                                            <td>${album.title}</td>
                                            <td>${album.artist.songs.length}</td>
                                            <td>${album.total_sales || 'N/A'}</td>
                                            <td>${album.price || 'N/A'}</td>
                                            <td>${totalFileSize.toFixed(2)} MB</td>
                                            <td><button class="btn btn-sm btn-primary">Option</button></td>
                                        </tr>
                                    `);
                                });
                            } else {
                                $('#albums-tbody').append(
                                    '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                                );
                            }

                            // Update Videos Tab
                            if (response.clips && response.clips.length > 0) {
                                response.clips.forEach(video => {
                                    $('#videos-tbody').append(`
                                        <tr>
                                            <td>${video.custom_id || video._id}</td>
                                            <td>${video.video_file_name}</td>
                                            <td><video src="{{ asset('storage/${video.video}') }}" width="100" height="60"></video></td>
                                            <td>${video.total_listen || 'N/A'}</td>
                                            <td>${new Date(video.created_at).toLocaleDateString()}</td>
                                            <td>${video.video_file_size} MB</td>
                                            <td>${video.video_file_length || 'N/A'}</td>
                                            <td><button class="btn btn-sm btn-primary">Option</button></td>
                                        </tr>
                                    `);
                                });
                            } else {
                                $('#videos-tbody').append(
                                    '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                                );
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
@endsection
