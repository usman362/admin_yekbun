<form id="createepisodeForm" method="POST" action="{{ route('malbat.seriesStoreEpisode') }}" enctype="multipart/form-data">
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
                        <select class="form-control" name="series" id="seriesSelect">
                        	<option value="">Select Series</option>
                        	@foreach ($videos as $video)
                            	<option value="{{$video->id}}" >{{$video->video_file_name}}</option>
                            	
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                	<div class="form-group">
                        <label>Select Season</label>
                        <select class="form-control" name="season"  id="seasonSelect">
                        
                        </select>
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
                        <textarea placeholder="The Information added before in trailer will appear here"  class="form-control" name="description"></textarea>
                    </div>
                </div>
                
               
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-body">
                        	
                            <div class="col-md-6">
                               <div class="dropzone needsclick" action="/" id="dropzone-video_e">
                                <div class="dz-message needsclick">
                                    Upload New Episode
                                    <div class="text-muted font14">
                                    	MP4 or AVI
                                    </div>
                                </div>
                               
                                <div class="fallback">
                                    <input type="file" name="video[]" accept="video/*" />
                                </div>
                            </div>
                            <div class="hidden-videos"></div> 
                            </div>
                            <div class="col-md-6">
                            
                                <div class="dropzone needsclick info" action="/" id="dropzone-info">
                                	<h5>Video Info</h5>
                                    <div class="row">
                                    	<div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('hdcheck_e').click()">
                                                <div  class="infhead">
                                                       HD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_hd"  id="hdcheck_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('fkcheck_e').click()">
                                                <div class="infhead">
                                                       4K
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_4k"  id="fkcheck_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('uhdcheck_e').click()">
                                                <div  class="infhead">
                                                       UHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_uhd"  id="uhdcheck_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('qhdcheck_e').click()">
                                                <div class="infhead">
                                                       QHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_qhd"  id="qhdcheck_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 2nd row ends -->
                                        <!-- 3rd row -->
                                        
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('atmcheck_e').click()">
                                                <div  class="infhead">
                                                       ATM
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_atm"  id="atmcheck_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <div class="infbox" onclick="document.getElementById('v51check_e').click()">
                                                <div class="infhead">
                                                       QHD
                                                </div>
                                                <div class="form-check form-switch green-line">
                                                    <input class="form-check-input closetogglebtn" type="checkbox" name="check_v5"  id="v51check_e"  onclick="event.stopPropagation()">
                                                </div>
                                             </div>
                                        </div>
                                        
                                        <!-- 3rd row ends -->
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="row text-center">
                                    	<!-- 4th row -->
                                        
                                        <div class="col-md-4 ">
                                        	<div class="robox active" onclick="selectRobox_e(this)">
                                            	6+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox_e(this)">
                                            	8+
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                        	<div class="robox" onclick="selectRobox_e(this)">
                                            	12+
                                            </div>
                                        
                                        </div>
                                        <input type="hidden" name="selected_robox" id="selected_robox_e" value="6+">
                                        
                                        <!-- 4th row end -->
                                    </div>
                                	
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                
                <div class="row">
                                    <div id="thumbnail-history" style="display: block">
                                    	<div class="col-md-12" style="margin-top:20px;">
                                        	Select Thumbnail
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img id="img1" class="generated-img"
                                                    src="{{asset('assets/img/plus-solid.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-3">
                                                <img id="img2" class="generated-img"
                                                    src="{{asset('assets/img/plus-solid.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-3">
                                                <img id="img3" class="generated-img" 
                                                    src="{{asset('assets/img/plus-solid.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-3">
                                                <img id="img3" class="generated-img" 
                                                    src="{{asset('assets/img/plus-solid.svg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center text-center">
                                        <div class="col-md-6">
                                            <div class="regnerate"><i class="fas fa-rotate-right"></i>&nbsp;New Thumbnail</div>
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


        let dropzoneMulti1 = new Dropzone('#dropzone-video_e', {
            url: '{{ url('file/upload') }}',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFiles: 1,
            maxFilesize: 1000, // Max file size in MB
            addRemoveLinks: true,
            acceptedFiles: 'video/*',
            //headers: {
              //  'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //},
			
			sending: function(file, xhr, formData) {
				const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				xhr.setRequestHeader('X-CSRF-TOKEN', token);
		
				//formData.append('folder', 'malbat-series');
			},
			
            //sending: function(file, xhr, formData) {
             //   formData.append('folder', 'malbat-series');
            //},
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
					$('.episodebtn').prop('disabled', false);
					
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
				$('.episodebtn').prop('disabled', true);
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
	
	function selectRobox_e(selected) {
		document.querySelectorAll('.robox').forEach(function(el) {
			el.classList.remove('active');
		});
		selected.classList.add('active');
	
		// update hidden input
		document.getElementById('selected_robox_e').value = selected.innerText.trim();
	}
	
	
	$('#seriesSelect').on('change', function () {
        let seriesId = $(this).val();
        $('#seasonSelect').html('<option>Loading...</option>');

        if (seriesId) {
            $.ajax({
                url: '{{ route("malbat.getSeasonsBySeries") }}',
                type: 'GET',
                data: { series_id: seriesId },
                success: function (data) {
                    let options = '<option value="">Select Season</option>';
                    data.forEach(function (season) {
                        options += `<option value="${season._id}">${season.video_file_name}</option>`;
                    });
                    $('#seasonSelect').html(options);
                },
                error: function () {
                    alert('Failed to fetch seasons.');
                    $('#seasonSelect').html('<option value="">-- Select Season --</option>');
                }
            });
        } else {
            $('#seasonSelect').html('<option value="">-- Select Season --</option>');
        }
    });
	
</script>
