<form id="createseasonForm" method="POST" action="{{ route('zarok.seriesStoreSeason') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="video_id">
    <input type="hidden" name="thumbnail" id="thumbnail">
    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                
                <div class="col-md-4">
                	<div class="form-group">
                        <label>Select Series</label>
                        <select name="series" class="form-control" required>
                        	<option value="">Select Series</option>
                        	@foreach ($videos as $video)
                            	<option value="{{$video->id}}" >{{$video->video_file_name}}</option>
                            	
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                	<div class="form-group">
                        <label>Season Name</label>
                        <input class="form-control" name="name" type="text" />
                    </div>
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
                            <div class="dropzone needsclick dropzone-images" id="dropzone-banner_s">
                                <div class="dz-message1 needsclick text-center">
                                    Movie Banner<br />
                                    1920 X 1080
                                </div>
                                <input type="file" name="banner" accept="image/*" id="banner-input_s" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-body">
                        	
                            <div class="col-md-6">
                                <div class="dropzone needsclick labelsectoin dropzone-label" id="dropzone-label_s">
                                    <div class="dz-message1 needsclick text-center">
                                        Upload Label<br />
                                        1920 X 1080
                                    </div>
                                    <input type="file" name="label" accept="image/*" id="label-input_s" />
                                </div>
                            </div>
                            <div class="col-md-6">
                            
                                <div class="dropzone needsclick info" action="/" id="dropzone-info">
                                	<h5>Video Info</h5>
                                    <div class="row">
                                    	<div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('hdcheck_s').click()">
                                                <div  class="infhead">
                                                       HD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_hd"  id="hdcheck_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('fkcheck_s').click()">
                                                <div class="infhead">
                                                       4K
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_4k"  id="fkcheck_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('uhdcheck_s').click()">
                                                <div  class="infhead">
                                                       UHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_uhd"  id="uhdcheck_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('qhdcheck_s').click()">
                                                <div class="infhead">
                                                       QHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_qhd"  id="qhdcheck_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row ends -->
                                        <!-- 3rd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('atmcheck_s').click()">
                                                <div  class="infhead">
                                                       ATM
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_atm"  id="atmcheck_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('v51check_s').click()">
                                                <div class="infhead">
                                                       QHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_v5"  id="v51check_s"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 3rd row ends -->
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="row text-center">
                                    	<!-- 4th row -->
                                        
                                        <div class="col-md-4 ">
                                        	<div class="robox active" onclick="selectRobox_s(this)">
                                            	6+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox_s(this)">
                                            	8+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox_s(this)">
                                            	12+
                                            </div>
                                        
                                        </div>
                                        <input type="hidden" name="selected_robox" id="selected_robox_s" value="6+">
                                        
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
                            <div class="dropzone needsclick" action="/" id="dropzone-video_s">
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


        let dropzoneMulti12 = new Dropzone('#dropzone-video_s', {
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
                formData.append('folder', 'zarok-videos');
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
					$('.seasonbtn').prop('disabled', false);
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
				$('.seasonbtn').prop('disabled', true);
                return this._updateMaxFilesReachedClass();

            }

        });

    });

    
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    
	function selectRobox_s(selected) {
		document.querySelectorAll('.robox').forEach(function(el) {
			el.classList.remove('active');
		});
		selected.classList.add('active');
	
		// update hidden input
		document.getElementById('selected_robox_s').value = selected.innerText.trim();
	}
	
	
    setupDropzone('dropzone-banner_s', 'banner-input_s');
    setupDropzone('dropzone-label_s', 'label-input_s');
	
</script>
