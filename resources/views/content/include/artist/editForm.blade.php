<style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>


<form id="editForm{{ $artist->id }}" class="edit-form" method="post" action="{{ route('artist.update', $artist->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="hidden-inputs">
        <input type="hidden" name="image" value="{{ $artist->image }}" data-path="{{ $artist->image }}">
    </div>
    <div class="row">


        <div class="col-md-6">
            <label class="form-label" for="fullname">Gender</label>
            <select name="gender" class="form-select">
                <option>Select Gender</option>
                @if ($artist->gender == 'male')
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                @else
                    <option value="female" selected>Female</option>
                    <option value="male">Male</option>
                @endif
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="fullname">Province</label>
            <select name="province" class="form-control province_id" id="province_id" data-url={{ url('get/city') }}
                value="{{ old('province_id') }}" data-selected="{{ $artist->city_id }}">
                <option value="">Select province</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" {{ $province->id == $artist->province_id ? 'selected' : '' }}>
                        {{ $province->name ?? '' }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-2">
            <label class="form-label" for="fullname">Artist Name - Lastname</label>
            <input type="text" id="fullname" class="form-control" placeholder="lorem" name="name"
                value="{{ $artist->name ?? '' }}">
        </div>

        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Image</h5>
                <div class="card-body">
                    <div class="dropzone needsclick" action="/" id="dropzone-img{{ $artist->id }}">
                        <div class="dz-message needsclick">
                            Drop files here or click to upload
                        </div>
                        <div class="fallback">
                            <input type="file" name="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" name="status">
                <option selected value="">Select</option>
                <option value="1" {{ $artist->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $artist->status == 0 ? 'selected' : '' }}>UnPublish</option>

            </select>

        </div>
    </div>
</form>

<script>
    'use strict';

    function initializeDropzones() {
        if (window.dropzonesInitialized) return; // Prevent multiple initializations
        window.dropzonesInitialized = true;

        document.querySelectorAll(".dropzone").forEach((dropzoneElement) => {
            if (dropzoneElement.dataset.initialized) return; // Prevent duplicate initialization

            dropzoneElement.dataset.initialized = true; // Mark as initialized

            const dropzoneInstance = new Dropzone(dropzoneElement, {
                url: '{{ route('file.upload') }}',
                previewTemplate: `<div class="row">
                    <div class="col-md-12 col-12 d-flex justify-content-center">
                        <div class="dz-preview dz-file-preview w-100">
                            <div class="dz-details">
                                <div class="dz-thumbnail" style="width:95%">
                                    <img data-dz-thumbnail >
                                    <span class="dz-nopreview">No preview</span>
                                    <div class="dz-success-mark"></div>
                                    <div class="dz-error-mark"></div>
                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                </div>
                                <div class="dz-filename" data-dz-name></div>
                                <div class="dz-size" data-dz-size></div>
                            </div>
                        </div>
                    </div>
                </div>`,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                acceptedFiles: 'image/*',
                maxFiles: 1,
                sending: function(file, xhr, formData) {
                    formData.append('folder', 'music');
                },
                success: function(file, response) {
                    file.previewElement.classList.add("dz-success");
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.innerHTML +=
                        `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;
                },
                removedfile: function(file) {
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.querySelector(
                        `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    file.previewElement.parentNode.removeChild(file.previewElement);

                    $.ajax({
                        url: '{{ route('artists.delete-img', $artist->id) }}',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        },
                        success: function() {}
                    });

                    return this._updateMaxFilesReachedClass();
                }

            });
        });
    }
    initializeDropzones();
    // Attach event listener to the button
    // document.getElementById("initDropzones").addEventListener("click", initializeDropzones);
</script>
<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], {
            type: blob.type
        });

        return file;
    }
</script>
