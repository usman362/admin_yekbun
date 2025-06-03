<style>
    .ck {
        height: 150px;
    }
    .modal-content{
        overflow: unset !important;
    }
</style>

<form id="createForm" method="POST" action="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="history_id">
    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Layout Title</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Layout Title"
                        name="title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card">
                    {{-- <h5 class="card-header">Video Upload</h5> --}}
                    <div class="card-body">
                        <div class="dropzone needsclick" action="/" id="dropzone-video">
                            <div class="dz-message needsclick">
                                Upload File <br>
                                <small style="font-size: 12px">JSON File</small>
                            </div>
                            <div class="fallback">
                                <input type="file" name="file" />
                            </div>
                        </div>
                        <div class="hidden-videos"></div> <!-- 🔹 Stores video hidden inputs -->
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
    <div class="dz-thumbnail" style="width:95%">
        <img data-dz-thumbnail>
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
                formData.append('folder', 'history');
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
                $('.generated-img').attr('src', '{{ asset('assets/img/thumbnail.svg') }}');
                // $('#thumbnail-history').css('display', 'none');
                // $('#generated-thumbnails').css('display', 'none');

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
                $('#error-thumbnail').text("");
                $('#thumbnail-history').css('display', 'block');
                $('#generated-thumbnails').css('display', 'block');
                let newSrc1 = response.thumbnail[0] + "?t=" + new Date().getTime();
                let newSrc2 = response.thumbnail[1] + "?t=" + new Date().getTime();
                let newSrc3 = response.thumbnail[2] + "?t=" + new Date().getTime();
                $("#thumbnail-history #img1").attr("src", newSrc1);
                $("#thumbnail-history #img2").attr("src", newSrc2);
                $("#thumbnail-history #img3").attr("src", newSrc3);
            },
            error: function() {
                $('#error-thumbnail').text("Failed to generate thumbnail.");
            }
        });
    };
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('.add-history').click(function() {
            $('#error-thumbnail').text("");
            // $('#thumbnail-history').css('display', 'none');
            // $('#generated-thumbnails').css('display', 'none');
        })

        $('.generated-img').click(function() {
            let src = $(this).attr('src');
            $('.dz-thumbnail img').attr('src', src);
            $('#thumbnail').val(src);
        })
    });
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
