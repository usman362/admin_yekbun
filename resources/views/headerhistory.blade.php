<div class="modal fade" id="headerhistory{{ $language->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('languages.saveSectionhistory') }}" method="POST">
                    @csrf
                    <input type="hidden" name="language_id" value="{{ $language->id }}">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>English Language</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $language->title }} Language</h5>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Categories</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="categories" placeholder="Categories">
                            </div>
                        </div>

                        <!-- Newst Upload -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Newst Upload</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="newst_upload" placeholder="Newst Upload">
                            </div>
                        </div>

                        <!-- Must Viewed -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Must Viewed</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="must_viewed" placeholder="Must Viewed">
                            </div>
                        </div>

                        <!-- Share on Yekbun -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Share on Yekbun</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="share_on_yekbun" placeholder="Share on Yekbun">
                            </div>
                        </div>

                        <!-- Public -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Public</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="public" placeholder="Public">
                            </div>
                        </div>

                        <!-- Friends -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Friends</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="friends" placeholder="Friends">
                            </div>
                        </div>

                        <!-- Family -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Family</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="family" placeholder="Family">
                            </div>
                        </div>

                        <!-- Write a Comment -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Write a Comment</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="write_a_comment" placeholder="Write a Comment">
                            </div>
                        </div>

                        <!-- Post Media Comment -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Post Media Comment</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="post_media_comment" placeholder="Post Media Comment">
                            </div>
                        </div>

                        <!-- Add Voice -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>Add Voice</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="add_voice" placeholder="Add Voice">
                            </div>
                        </div>

                        <!-- See All -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6>See All</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="see_all" placeholder="See All">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-label-secondary" data-bs-dismiss="modal">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
