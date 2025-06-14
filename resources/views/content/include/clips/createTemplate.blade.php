<style>
    .ck {
        height: 150px;
    }

    .modal-content {
        overflow: unset !important;
    }

    /* .dropzone .dz-preview{
        min-height: 200px !important;
    } */
    .light-style .dz-thumbnail {
        background: #fff !important;
    }

    .dropzone .dz-preview .dz-details {
        padding: 4px !important;
    }

    .dropzone .dz-preview .dz-details .dz-size {
        margin-bottom: 0 !important;
        font-size: 12px !important;
    }
</style>

<form id="createForm" method="POST" action="{{ route('store.clips') }}" enctype="multipart/form-data">
    @csrf
    {{-- <input type="hidden" name="history_id"> --}}
    {{-- <div class="hidden-inputs"></div> --}}
    <input type="hidden" name="thumbnail" id="thumbnail">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Layout Title</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Layout Title" name="title"
                        required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card">
                    {{-- <h5 class="card-header">Video Upload</h5> --}}
                    <div class="card-body">
                        <div class="dropzone needsclick" action="/" id="dropzone-json">
                            <div class="dz-message needsclick">
                                Upload File <br>
                                <small style="font-size: 12px">JSON File</small>
                            </div>
                            <div class="fallback">
                                <input type="file" name="json_file" />
                            </div>
                        </div>
                        <div class="hidden-json"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="inputTitle">Educated Price</label>
                    <select class="form-control" name="educated_price" id="educated_price">
                        <option value="free">Free</option>
                        <option value="0.99">0,99 €</option>
                    </select>
                    @error('educated_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="inputTitle">Cultivated Price</label>
                    <select class="form-control" name="cultivated_price" id="cultivated_price">
                        <option value="free">Free</option>
                        <option value="0.49">0,49 €</option>
                    </select>
                    @error('cultivated_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card">
                    {{-- <h5 class="card-header">Video Upload</h5> --}}
                    <div class="card-body">
                        <div class="dropzone needsclick" action="/" id="dropzone-video">
                            <div class="dz-message needsclick">
                                Upload Video <br>
                                <small style="font-size: 12px">Video File</small>
                            </div>
                            <div class="fallback">
                                <input type="file" name="video" />
                            </div>
                        </div>
                        <div class="hidden-videos"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>


<script>
    dropZoneInitFunctions.push(function() {
        const previewTemplate = `<div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100">
            <div class="dz-details">
                <div class="dz-thumbnail" style="width:95%;height:0;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1321.45 1333.33" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M221.37 618.44h757.94V405.15H755.14c-23.5 0-56.32-12.74-71.82-28.24-15.5-15.5-25-43.47-25-66.97V82.89H88.39c-1.99 0-3.49 1-4.49 2-1.5 1-2 2.5-2 4.5v1155.04c0 1.5 1 3.5 2 4.5 1 1.49 3 1.99 4.49 1.99H972.8c2 0 1.89-.99 2.89-1.99 1.5-1 3.61-3 3.61-4.5v-121.09H221.36c-44.96 0-82-36.9-82-81.99V700.44c0-45.1 36.9-82 82-82zm126.51 117.47h75.24v146.61c0 30.79-2.44 54.23-7.33 70.31-4.92 16.03-14.8 29.67-29.65 40.85-14.86 11.12-33.91 16.72-57.05 16.72-24.53 0-43.51-3.71-56.94-11.06-13.5-7.36-23.89-18.1-31.23-32.3-7.35-14.14-11.69-31.67-12.99-52.53l71.5-10.81c.11 11.81 1.07 20.61 2.81 26.33 1.76 5.78 4.75 10.37 9 13.95 2.87 2.33 6.94 3.46 12.25 3.46 8.4 0 14.58-3.46 18.53-10.37 3.9-6.92 5.87-18.6 5.87-35V735.92zm112.77 180.67l71.17-4.97c1.54 12.81 4.69 22.62 9.44 29.28 7.74 10.88 18.74 16.34 33.09 16.34 10.68 0 18.93-2.76 24.68-8.36 5.81-5.58 8.7-12.07 8.7-19.41 0-6.97-2.71-13.26-8.2-18.79-5.47-5.53-18.23-10.68-38.28-15.65-32.89-8.17-56.27-19.1-70.26-32.74-14.12-13.57-21.18-30.92-21.18-52.03 0-13.83 3.61-26.89 10.85-39.21 7.22-12.38 18.07-22.06 32.59-29.09 14.52-7.04 34.4-10.56 59.65-10.56 31 0 54.62 6.41 70.88 19.29 16.28 12.81 25.92 33.24 29.04 61.27l-70.5 4.65c-1.87-12.25-5.81-21.17-11.81-26.7-6.05-5.6-14.35-8.36-24.9-8.36-8.71 0-15.31 2.07-19.73 6.16-4.4 4.09-6.59 9.12-6.59 15.02 0 4.27 1.81 8.11 5.37 11.57 3.45 3.59 11.8 6.85 25.02 9.93 32.75 7.86 56.2 15.84 70.31 23.87 14.18 8.05 24.52 17.98 30.96 29.92 6.44 11.88 9.66 25.2 9.66 39.96 0 17.29-4.3 33.24-12.88 47.89-8.63 14.58-20.61 25.7-36.08 33.24-15.41 7.54-34.85 11.31-58.33 11.31-41.24 0-69.81-8.86-85.68-26.52-15.88-17.65-24.85-40.09-26.96-67.3zm248.74-45.5c0-44.05 11.02-78.36 33.09-102.87 22.09-24.57 52.82-36.82 92.24-36.82 40.38 0 71.5 12.07 93.34 36.13 21.86 24.13 32.77 57.94 32.77 101.37 0 31.54-4.75 57.36-14.3 77.54-9.54 20.18-23.37 35.89-41.4 47.13-18.07 11.24-40.55 16.84-67.48 16.84-27.33 0-49.99-4.83-67.94-14.52-17.92-9.74-32.49-25.07-43.62-46.06-11.13-20.92-16.72-47.19-16.72-78.74zm74.89.19c0 27.21 4.57 46.81 13.68 58.68 9.13 11.88 21.57 17.85 37.26 17.85 16.1 0 28.65-5.84 37.45-17.47 8.87-11.68 13.28-32.54 13.28-62.77 0-25.39-4.63-43.92-13.84-55.61-9.26-11.76-21.75-17.6-37.56-17.6-15.13 0-27.34 5.97-36.49 17.85-9.21 11.88-13.78 31.61-13.78 59.07zm209.08-135.36h69.99l90.98 149.05V735.91h70.83v269.96h-70.83l-90.48-148.24v148.24h-70.49V735.91zm67.71-117.47h178.37c45.1 0 82 37.04 82 82v340.91c0 44.96-37.03 81.99-82 81.99h-178.37v147c0 17.5-6.99 32.99-18.5 44.5-11.5 11.49-27 18.5-44.5 18.5H62.97c-17.5 0-32.99-7-44.5-18.5-11.49-11.5-18.5-27-18.5-44.5V63.49c0-17.5 7-33 18.5-44.5S45.97.49 62.97.49H700.1c1.5-.5 3-.5 4.5-.5 7 0 14 3 19 7.49h1c1 .5 1.5 1 2.5 2l325.46 329.47c5.5 5.5 9.5 13 9.5 21.5 0 2.5-.5 4.5-1 7v250.98zM732.61 303.47V96.99l232.48 235.47H761.6c-7.99 0-14.99-3.5-20.5-8.49-4.99-5-8.49-12.5-8.49-20.5z"/></svg>
                    <div class="dz-success-mark"></div>
                    <div class="dz-error-mark"></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                    </div>
                    <div class="dz-filename" data-dz-name></div>
                    <div class="dz-size" data-dz-size></div>
                </div>
            </div>
            </div></div></div>`;


        let dropzoneMulti1 = new Dropzone('#dropzone-json', {
            url: '{{ url('file/upload') }}',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFiles: 1,
            maxFilesize: 1000, // Max file size in MB
            addRemoveLinks: true,
            acceptedFiles: '.json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'json_files');
            },
            success: function(file, response) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]); // ✅ Remove the previous file
                }

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }

                file.previewElement.dataset.path = response.path;

                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-json');

                // ✅ Convert file size to MB
                const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);

                // ✅ Get video duration
                // const video = document.createElement('video');
                // video.preload = 'metadata';
                // video.src = URL.createObjectURL(file);
                // video.onloadedmetadata = function() {
                //     const duration = video.duration.toFixed(2);

                hiddenInputsContainer.innerHTML += `
            <input type="hidden" name="json_paths[]" id="json_path" value="${response.path}" data-path="${response.path}">
            <input type="hidden" name="json_sizes[]" value="${fileSizeMB}" data-path="${response.path}">
            <input type="hidden" name="json_name[]" value="${file.name}" data-path="${response.path}">
        `;
                // generateThumbnails();
                // };

            },

            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-videos');

                // ✅ Select all matching inputs with the same data-path
                const hiddenInputs = hiddenInputsContainer.querySelectorAll(
                    `input[data-path="${file.previewElement.dataset.path}"]`);

                // ✅ Remove each matching input
                hiddenInputs.forEach(input => input.remove());

                // ✅ Remove the file preview element
                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                // ✅ Send an AJAX request to delete the file from the server
                $.ajax({
                    url: '{{ url('file/delete') }}',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    }
                });

                $('#error-thumbnail').text("");
                // $('.generated-img').attr('src', '{{ asset('assets/img/thumbnail.svg') }}');
                // $('#thumbnail-history').css('display', 'none');
                // $('#generated-thumbnails').css('display', 'none');

                return this._updateMaxFilesReachedClass();

            }

        });

    });

    //For Video

    dropZoneInitFunctions.push(function() {

        const previewTemplate = `<div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100" style="height: 160px;" >
            <div class="dz-details">
            <div class="dz-thumbnail" style="width:95%;height:100px;">
            <img id="dz-thumbnail" data-dz-thumbnail>
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


        let dropzoneMulti1 = new Dropzone('#dropzone-video', {
            url: '{{ url('file/upload') }}',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFiles: 1,
            maxFilesize: 1000, // Max file size in MB
            addRemoveLinks: true,
            acceptedFiles: 'video/*',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'clips');
            },
            success: function(file, response) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]); // ✅ Remove the previous file
                }

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }

                file.previewElement.dataset.path = response.path;

                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-videos');

                // ✅ Convert file size to MB
                const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);

                // ✅ Get video duration
                const video = document.createElement('video');
                video.preload = 'metadata';
                video.src = URL.createObjectURL(file);
                video.onloadedmetadata = function() {
                    const duration = video.duration.toFixed(2); // ✅ Video duration in seconds

                    hiddenInputsContainer.innerHTML += `
                        <input type="hidden" name="video_paths[]" id="video_path" value="${response.path}" data-path="${response.path}">
                        <input type="hidden" name="video_sizes[]" value="${fileSizeMB}" data-path="${response.path}">
                        <input type="hidden" name="video_durations[]" id="video_duration" value="${duration}" data-path="${response.path}">
                        <input type="hidden" name="video_name[]" value="${file.name}" data-path="${response.path}">
                    `;
                    generateThumbnails();
                };

            },

            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-videos');

                // ✅ Select all matching inputs with the same data-path
                const hiddenInputs = hiddenInputsContainer.querySelectorAll(
                    `input[data-path="${file.previewElement.dataset.path}"]`);

                // ✅ Remove each matching input
                hiddenInputs.forEach(input => input.remove());

                // ✅ Remove the file preview element
                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                // ✅ Send an AJAX request to delete the file from the server
                $.ajax({
                    url: '{{ url('file/delete') }}',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    }
                });

                $('#error-thumbnail').text("");
                return this._updateMaxFilesReachedClass();

            }

        });

    });

    function generateThumbnails() {
        let videoPath = $('#video_path').val();
        let videoDuration = parseInt($('#video_duration').val());
        let timestamp = $("#timestamp").val();

        if (!videoPath) {
            $('#error-thumbnail').text("Please Select Video first!");
            return;
        }

        if (timestamp > videoDuration) {
            $('#error-thumbnail').text("Video Duration is " + videoDuration + " seconds");
            return;
        }

        $.ajax({
            url: "/generate-thumbnail", // Laravel route
            type: "POST",
            data: {
                video_path: videoPath,
                duration: videoDuration,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                let newSrc = response.thumbnail[0] + "?t=" + new Date().getTime();
                $("#thumbnail").val(newSrc);
                $('#dz-thumbnail').attr('src', newSrc);

            },
            error: function() {
                $('#error-thumbnail').text("Failed to generate thumbnail.");
            }
        });
    };
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
