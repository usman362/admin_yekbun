<!-- resources/views/edit_footer_quick_section_modal.blade.php -->
<div class="modal fade" id="myprofilesection{{ $language->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('languages.myProfileHomeSection') }}" method="POST">
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

<div class="row mt-2">
    <div class="col-md-6">
        <h6>Update Profile image</h6>
    </div>
    <div class="col-md-6">
        <input type="file" class="form-control" name="update_profile_image" placeholder="Update Profile image">
    </div>
</div>

<!-- Select or Upload banner -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Select or Upload banner</h6>
    </div>
    <div class="col-md-6">
        <input type="file" class="form-control" name="select_or_upload_banner" placeholder="Select or Upload banner">
    </div>
</div>

<!-- Like -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Like</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="like" placeholder="Like">
    </div>
</div>

<!-- Following -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Following</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="following" placeholder="Following">
    </div>
</div>

<!-- Following (Posts) -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Following (Posts)</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="following_posts" placeholder="Following (Posts)">
    </div>
</div>

<!-- Menu -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Menu</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="menu" placeholder="Menu">
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

<!-- Upload Video -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Upload Video</h6>
    </div>
    <div class="col-md-6">
        <input type="file" class="form-control" name="upload_video" placeholder="Upload Video">
    </div>
</div>

<!-- Create Reels -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Create Reels</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="create_reels" placeholder="Create Reels">
    </div>
</div>

<!-- Go Live -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>Go Live</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="go_live" placeholder="Go Live">
    </div>
</div>

<!-- My Feed -->
<div class="row mt-2">
    <div class="col-md-6">
        <h6>My Feed</h6>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="my_feed" placeholder="My Feed">
    </div>
</div>
<div class="modal-footer">
    <button type="submit"
        class="btn btn-label-secondary"
        data-bs-dismiss="modal">Save</button>
</div>
                     </div>

                </form>
            </div>
        </div>
    </div>
</div>
