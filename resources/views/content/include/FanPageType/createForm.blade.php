<form id="createForm" method="POST" action="{{ route('fan-page-type.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Title</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Title" name="title">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Icon</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick" action="/" id="dropzone-img">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>
                                <div class="fallback">
                                    <input type="file" name="icon"  id="icon" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <label for="Services">Services</label>
                <div class="col-md-2">
                    <label class="col-md-1 col-form-label">Concerts</label>
                    <div class="col-md-11 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="confirmSettingUpdate(event)" type="checkbox" name="option[]" value="concerts">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="col-md-1 col-form-label">Demostration</label>
                    <div class="col-md-11 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="confirmSettingUpdate(event)" type="checkbox" name="option[]" value="demostration">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="col-md-1 col-form-label">Conference</label>
                    <div class="col-md-11 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="confirmSettingUpdate(event)" type="checkbox" name="option[]" value="conference">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="col-md-12 col-form-label">Upload Video</label>
                    <div class="col-md-11 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="confirmSettingUpdate(event)" type="checkbox" name="option[]" value="upload_video">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    'use strict';

    dropZoneInitFunctions.push(function (){
            // previewTemplate: Updated Dropzone default previewTemplate

            const previewTemplate = `<div class="row"><di class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100">
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
                                    </div></div></di>`;

            // for image
            const dropzoneMulti1 = new Dropzone('#dropzone-img', {
                url: '{{ route('file.upload') }}',
                previewTemplate: previewTemplate,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                sending: function (file, xhr, formData) {
                    formData.append('folder', 'music');
                },
                success: function (file, response) {
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-success");
                    }
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector('.hidden-inputs');
                    hiddenInputsContainer.innerHTML += `<input type="hidden" name="icon" value="${response.path}" data-path="${response.path}">`;


                },
                removedfile: function (file) {
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector('.hidden-inputs');
                    hiddenInputsContainer.querySelector(`input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }

                    $.ajax({
                        url: '{{ route("file.delete") }}',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {path: file.previewElement.dataset.path},
                        success: function () {}
                    });
                    
                    return this._updateMaxFilesReachedClass();
                }
            });
        });
</script>