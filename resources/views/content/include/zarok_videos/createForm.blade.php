<form id="{{ isset($form) ? $form : 'createForm'}}" method="POST" action="{{ route('video-clips.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="video_id" name="video_id">
    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <input type="hidden" name="thumbnail" id="thumbnail">
                <div class="col-md-12" id="generated-thumbnails" style="display: none">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div id="thumbnail-history" style="display: none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="img1" class="generated-img"
                                                style="width: 100%;height: 100px;margin: 12px 0 0 4px;border-radius: 5px;border: 2px solid #0000004f;cursor:pointer;"
                                                src="" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <img id="img2" class="generated-img"
                                                style="width: 100%;height: 100px;margin: 12px 0 0 4px;border-radius: 5px;border: 2px solid #0000004f;cursor:pointer;"
                                                src="" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <img id="img3" class="generated-img"
                                                style="width: 100%;height: 100px;margin: 12px 0 0 4px;border-radius: 5px;border: 2px solid #0000004f;cursor:pointer;"
                                                src="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-12">
                  <div class="card box-shadow-none">
                    <div class="card-body">
                        <div class="dropzone needsclick" action="/" id="dropzone-video">
                            <div class="dz-message needsclick">
                                Drop files here or click to upload
                            </div>
                            <div class="fallback">
                                <input type="file" name="video[]"  accept="video/*" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
