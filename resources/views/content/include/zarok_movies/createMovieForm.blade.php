<form id="createmovieForm" method="POST" action="{{ route('zarok.moviesStore') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="video_id">
    <input type="hidden" name="thumbnail" id="thumbnail">
    <input type="hidden" name="is_trailer" value="0" />
    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                
                <div class="col-md-7">
                	<div class="form-group">
                        <label>Trailer Title</label>
                        <input class="form-control" placeholder="Trailer Title..." required="required" name="title" />
                    </div>
                </div>
                <div class="col-md-1">
                	&nbsp;
                </div>
                <div class="col-md-4">
                	<div class="form-group">
                        <label>Start Date</label>
                        <input class="form-control" name="st_date" type="date" />
                    </div>
                </div>
                
                <div class="col-md-12">
                	<div class="form-group">
                        <textarea placeholder="Describe the Movie"  class="form-control" name="description"></textarea>
                    </div>
                </div>
                
               
                
                <div class="col-md-12">
                    <div class="card1">
                        <div class="card-body1">
                            <div class="dropzone needsclick dropzone-images" id="dropzone-banner_m">
                                <div class="dz-message1 needsclick text-center">
                                    Movie Banner<br />
                                    1920 X 1080
                                </div>
                                <input type="file" name="banner" accept="image/*" id="banner-input_m" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-body">
                        	
                           
                            <div class="col-md-6">
                                <div class="dropzone needsclick labelsectoin dropzone-label" id="dropzone-label_m">
                                    <div class="dz-message1 needsclick text-center">
                                        Upload Label<br />
                                        1920 X 1080
                                    </div>
                                    <input type="file" name="label" accept="image/*" id="label-input_m" />
                                </div>
                            </div>
                            <div class="col-md-6">
                            
                                <div class="dropzone needsclick info" action="/" id="dropzone-info">
                                	<h5>Video Info</h5>
                                    <div class="row">
                                    	<div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('hdcheck_m').click()">
                                                <div  class="infhead">
                                                       HD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_hd"  id="hdcheck_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('fkcheck_m').click()">
                                                <div class="infhead">
                                                       4K
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_4k"  id="fkcheck_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('uhdcheck_m').click()">
                                                <div  class="infhead">
                                                       UHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_uhd"  id="uhdcheck_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('qhdcheck_m').click()">
                                                <div class="infhead">
                                                       QHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_qhd"  id="qhdcheck_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row ends -->
                                        <!-- 3rd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('atmcheck_m').click()">
                                                <div  class="infhead">
                                                       ATM
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_atm"  id="atmcheck_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('v51check_m').click()">
                                                <div class="infhead">
                                                       5.1
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_v5"  id="v51check_m"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 3rd row ends -->
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="row text-center">
                                    	<!-- 4th row -->
                                        
                                        <div class="col-md-4 ">
                                        	<div class="robox active" onclick="selectRobox(this)">
                                            	6+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox(this)">
                                            	8+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox(this)">
                                            	12+
                                            </div>
                                        
                                        </div>
                                        <input type="hidden" name="selected_robox" id="selected_robox_m" value="6+">
                                        
                                        <!-- 4th row end -->
                                    </div>
                                	
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropzone needsclick" action="/" id="dropzone-movie">
                                <div class="dz-message needsclick">
                                    Upload Movie Trailer
                                    <div class="text-muted font14">
                                    	Select the Trailer
                                    </div>
                                </div>
                               
                                <div class="fallback">
                                    <input type="file" name="video[]" accept="video/*" />
                                </div>
                            </div>
                            <div class="hidden-videos"></div> 
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropzone needsclick" action="/" id="dropzone-movie-real">
                                <div class="dz-message needsclick">
                                    Upload Movie 
                                    <div class="text-muted font14">
                                    	Select the Movie
                                    </div>
                                </div>
                               
                                <div class="fallback">
                                    <input type="file" name="video_mov[]" accept="video/*" />
                                </div>
                            </div>
                            <div class="hidden-videos"></div> 
                        </div>
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


        let dropzoneMulti1 = new Dropzone('#dropzone-movie', {
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
                formData.append('folder', 'zarok-movies');
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
            <input type="hidden" name="video_paths[]" id="movie_path" value="${response.path}" data-path="${response.path}">
            <input type="hidden" name="video_sizes[]" value="${fileSizeMB}" data-path="${response.path}">
            <input type="hidden" name="video_durations[]" id="movie_duration" value="${duration}" data-path="${response.path}">
            <input type="hidden" name="video_name[]" value="${file.name}" data-path="${response.path}">
        `;
					$('.moviewbtn').prop('disabled', false);
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
                $('.generated-img').attr('src','{{asset("assets/img/thumbnail.svg")}}');
                // $('#thumbnail-history').css('display', 'none');
                // $('#generated-thumbnails').css('display', 'none');
				
				$('.moviewbtn').prop('disabled', true);

                return this._updateMaxFilesReachedClass();

            }

        });

    });
	
	
	dropZoneInitFunctions.push(function () {
    const previewTemplate = `<div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100">
<div class="dz-details">
    <div class="dz-thumbnail" style="width:95%">
        <video width="100%" controls data-dz-thumbnail style="display:none;"></video>
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

    let dropzoneMovieReal = new Dropzone('#dropzone-movie-real', {
        url: '{{ url('file/upload') }}',
        previewTemplate: previewTemplate,
        parallelUploads: 1,
        maxFiles: 1,
        maxFilesize: 1000, // in MB
        addRemoveLinks: true,
        acceptedFiles: 'video/*',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        sending: function (file, xhr, formData) {
            formData.append('folder', 'zarok-movie-real');
        },
        success: function (file, response) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }

            file.previewElement.classList.add("dz-success");
            file.previewElement.dataset.path = response.path;

            const container = file.previewElement.closest('form').querySelector('.hidden-videos');

            const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);

            container.innerHTML += `
                <input type="hidden" name="movie_real_path[]" value="${response.path}" data-path="${response.path}">
                <input type="hidden" name="movie_real_size[]" value="${fileSizeMB}" data-path="${response.path}">
                <input type="hidden" name="movie_real_name[]" value="${file.name}" data-path="${response.path}">
            `;

            
        },
        removedfile: function (file) {
            const container = file.previewElement.closest('form').querySelector('.hidden-videos');
            const hiddenInputs = container.querySelectorAll(`input[data-path="${file.previewElement.dataset.path}"]`);
            hiddenInputs.forEach(input => input.remove());

            if (file.previewElement && file.previewElement.parentNode) {
                file.previewElement.parentNode.removeChild(file.previewElement);
            }

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

    async function imageUrlToFile_m(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], {
            type: blob.type
        });
        return file;
    }
	
	function selectRobox_m(selected) {
		document.querySelectorAll('.robox').forEach(function(el) {
			el.classList.remove('active');
		});
		selected.classList.add('active');
	
		// update hidden input
		document.getElementById('selected_robox_m').value = selected.innerText.trim();
	}
	
	/*
	function setupDropzone_m(dropzoneId, inputId) {
		//alert("coming");
        const dropzone = document.getElementById(dropzoneId);
        const input = document.getElementById(inputId);

        dropzone.addEventListener('click', () => input.click());

        input.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    dropzone.style.backgroundImage = `url(${e.target.result})`;
                    const message = dropzone.querySelector('.dz-message1');
                    if (message) message.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }
	*/

   	setupDropzone('dropzone-banner_m', 'banner-input_m');
    setupDropzone('dropzone-label_m', 'label-input_m');
	
</script>
