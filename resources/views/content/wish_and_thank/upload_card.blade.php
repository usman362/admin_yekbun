<style>
    .modal .modal-header .btn-close {
    margin-top: -1.25rem;
    position: fixed;
    margin-left: 495px;
}
.dropify-wrapper .dropify-message span.file-icon{
    display:block !important;
    line-height: 50px;
    display: block !important;
    width: 100%;
}
.dropify-wrapper .dropify-message p {
    margin: 5px 0 0 ;
    font-size: 31px !important;
}
</style>

@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/core.css')}}" />
<link href="
https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css
" rel="stylesheet">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="
https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js
">
@endsection

@section('page-script')
<script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
<script src="{{asset('assets/js/modal-edit-cc.js')}}"></script>
<script src="{{asset('assets/js/modal-add-new-cc.js')}}"></script>
<script src="{{asset('assets/js/modal-add-new-address.js')}}"></script>
<script src="{{asset('assets/js/app-user-view.js')}}"></script>
<script src="{{asset('assets/js/app-user-view-billing.js')}}"></script>
<script>  $('.dropify').dropify();</script>
  <script>
   $(document).ready(function() {
      $(document).on('click','.popup',function(){
          Swal.fire({
      title: 'Are you sure?',
      text: "Are you sure you want to delete this?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      customClass: {
        confirmButton: 'btn btn-danger me-3',
        cancelButton: 'btn btn-label-secondary'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        callback();
      }
    });
      });
    });

</script>
@endsection

@section('content')
<style>
    .modal .modal-header .btn-close {
    margin-top: -1.25rem;
    position: fixed;
    margin-left: 495px;
}
.dropify-wrapper .dropify-message span.file-icon{
    display:block !important;
    line-height: 50px;
    display: block !important;
    width: 100%;
}
</style>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pray</span> /Add Cards
</h4>

  <!--/ User Sidebar -->
<ul class="nav nav-pills flex-column flex-md-row mb-3 d-flex justify-content-end align-item-end">
                <!--<li class="nav-item"><a class="nav-link" href="{{url('app/user/view/account')}}"><i class="bx bx-user me-1"></i>Add New Cards</a></li>-->
      <!--<li class="nav-item"><a class="nav-link" href="{{url('app/user/view/security')}}"><i class="bx bx-detail me-1"></i>Post</a></li>-->
      <!--<li class="nav-item"><a class="nav-link active" href="{{url('app/user/view/billing')}}"><i class="bx bx-video me-1"></i>Videos</a></li>-->
      <!--<li class="nav-item"><a class="nav-link" href="{{url('app/user/view/notifications')}}"><i class="bx bx-bell me-1"></i>Activity</a></li>-->
      <!--<li class="nav-item"><a class="nav-link active" href="#">Add New Cards</a></li>-->
      
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createcategoryModal">Add New Cards</button>
            </ul>
 <div class="col-xl-12 col-lg-12 col-md-12 order-0 order-md-12">
<div class="row">
            <div class="column col-lg-3">
              <div id="feed-post-1" class="card is-post">
                  <!-- Main wrap -->
                  <div class="content-wrap">
                      <!-- Post header -->
                      <div class="card-heading justify-content-between">
                          <!-- User meta -->
                          <div class="user-block">
                              <div class="image">
                                  <!--<img src="https://dash.yekbun.net/assets/img/avatars/13.png" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">-->
                              </div>
                              <div class="user-info">
                                  <span class="d-flex"><a href="#">Alex Smith</a></span>
                                  <span class="time">Wed 29 Nov 1:49 pm</span>
                              </div>
                          </div>
                          <!-- Right side dropdown -->
                          <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                          <!--dele-->
                                <div class="d-flex justify-content-end align-item-end">
                                <!--<button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i>-->
                                <!--</button>-->
                                <button type="button" class="btn btn-sm btn-icon popup" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                            </div>
                            <!--dele-->
                        <!--  <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                        <!--    <div>-->
                        <!--        <div class="button">-->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="dropdown-menu" role="menu">-->
                        <!--        <div class="dropdown-content">-->
                        <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--                <div class="media">-->
                        <!--                    <div class="media-content">-->
                        <!--                        <h3>Remove the Feed</h3>-->
                        <!--                        <select class="form-control mt-1">-->
                        <!--                          <option value="">Select the Reason</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--              <div class="media">-->
                        <!--                  <div class="media-content">-->
                        <!--                      <h3>Remove Feed - Flag User</h3>-->
                        <!--                      <select class="form-control mt-1">-->
                        <!--                        <option value="">Select the Reason</option>-->
                        <!--                      </select>-->
                        <!--                      <select class="form-control mt-1">-->
                        <!--                        <option value="">Select the Flag</option>-->
                        <!--                      </select>-->
                        <!--                  </div>-->
                        <!--              </div>-->
                        <!--          </a>-->
                        <!--          <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--            <div class="media">-->
                        <!--                <div class="media-content">-->
                        <!--                  <h3>Remove Feed - Block User</h3>-->
                        <!--                  <select class="form-control mt-1">-->
                        <!--                    <option value="">Select the Reason</option>-->
                        <!--                  </select>-->
                        <!--                  <select class="form-control mt-1">-->
                        <!--                    <option value="">Select Downgrade User</option>-->
                        <!--                  </select>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </a>-->
                        <!--        <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--          <div class="media">-->
                        <!--              <div class="media-content">-->
                        <!--                <h3>Remove User Block Device</h3>-->
                        <!--                <select class="form-control mt-1">-->
                        <!--                  <option value="">Select the Reason</option>-->
                        <!--                </select>-->
                        <!--              </div>-->
                        <!--          </div>-->
                        <!--      </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                      </div>
                      <!-- /Post header -->

                      <!-- Post body -->
                      <div class="card-body">
                          <div class="post-image">
                              <a data-fancybox="post1" data-lightbox-type="comments">
                              <!--  <video controls="" class="">-->
                              <!--    <source src="https://dash.yekbun.net/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4">-->
                              <!--</video>-->
                               <img src="{{asset('assets/img/image.png')}}" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">
                              </a>
                              <!-- Action buttons -->

                          </div>
                      </div>
                      <!-- /Post body -->
                  </div>
                  <!-- /Main wrap -->

                  <!-- Post #1 Comments -->
                  <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                    <div class="comments-header">
                                          </div>
                      <!-- Comments body -->
                      <div class="comments-body has-slimscroll">
                        <img src="https://dash.yekbun.net/assets/svg/icons/Comment- area.svg" style="width: 100%" alt="">
                    </div>
                    <!-- /Comments body -->
                  </div>
                  <!-- /Post #1 Comments -->
              </div>
          </div>
          
          
            <div class="column col-lg-3">
              <div id="feed-post-1" class="card is-post">
                  <!-- Main wrap -->
                  <div class="content-wrap">
                      <!-- Post header -->
                      <div class="card-heading justify-content-between">
                          <!-- User meta -->
                          <div class="user-block">
                              <div class="image">
                                  <!--<img src="https://dash.yekbun.net/assets/img/avatars/13.png" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">-->
                              </div>
                              <div class="user-info">
                                  <span class="d-flex"><a href="#">Alex Smith</a></span>
                                  <span class="time">Wed 29 Nov 1:49 pm</span>
                              </div>
                          </div>
                          <!-- Right side dropdown -->
                          <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                          <!--dele-->
                                <div class="d-flex justify-content-end align-item-end">
                                <!--<button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i>-->
                                <!--</button>-->
                                <button type="button" class="btn btn-sm btn-icon popup" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                            </div>
                            <!--dele-->
                        <!--  <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                        <!--    <div>-->
                        <!--        <div class="button">-->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="dropdown-menu" role="menu">-->
                        <!--        <div class="dropdown-content">-->
                        <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--                <div class="media">-->
                        <!--                    <div class="media-content">-->
                        <!--                        <h3>Remove the Feed</h3>-->
                        <!--                        <select class="form-control mt-1">-->
                        <!--                          <option value="">Select the Reason</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--              <div class="media">-->
                        <!--                  <div class="media-content">-->
                        <!--                      <h3>Remove Feed - Flag User</h3>-->
                        <!--                      <select class="form-control mt-1">-->
                        <!--                        <option value="">Select the Reason</option>-->
                        <!--                      </select>-->
                        <!--                      <select class="form-control mt-1">-->
                        <!--                        <option value="">Select the Flag</option>-->
                        <!--                      </select>-->
                        <!--                  </div>-->
                        <!--              </div>-->
                        <!--          </a>-->
                        <!--          <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--            <div class="media">-->
                        <!--                <div class="media-content">-->
                        <!--                  <h3>Remove Feed - Block User</h3>-->
                        <!--                  <select class="form-control mt-1">-->
                        <!--                    <option value="">Select the Reason</option>-->
                        <!--                  </select>-->
                        <!--                  <select class="form-control mt-1">-->
                        <!--                    <option value="">Select Downgrade User</option>-->
                        <!--                  </select>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </a>-->
                        <!--        <a href="javascript:void(0)" class="dropdown-item">-->
                        <!--          <div class="media">-->
                        <!--              <div class="media-content">-->
                        <!--                <h3>Remove User Block Device</h3>-->
                        <!--                <select class="form-control mt-1">-->
                        <!--                  <option value="">Select the Reason</option>-->
                        <!--                </select>-->
                        <!--              </div>-->
                        <!--          </div>-->
                        <!--      </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                      </div>
                      <!-- /Post header -->

                      <!-- Post body -->
                      <div class="card-body">
                          <div class="post-image">
                              <a data-fancybox="post1" data-lightbox-type="comments">
                              <!--  <video controls="" class="">-->
                              <!--    <source src="https://dash.yekbun.net/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4">-->
                              <!--</video>-->
                               <img src="{{asset('assets/img/image.png')}}" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">
                              </a>
                              <!-- Action buttons -->

                          </div>
                      </div>
                      <!-- /Post body -->
                  </div>
                  <!-- /Main wrap -->

                  <!-- Post #1 Comments -->
                  <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                    <div class="comments-header">
                                          </div>
                      <!-- Comments body -->
                      <div class="comments-body has-slimscroll">
                        <img src="https://dash.yekbun.net/assets/svg/icons/Comment- area.svg" style="width: 100%" alt="">
                    </div>
                    <!-- /Comments body -->
                  </div>
                  <!-- /Post #1 Comments -->
              </div>
          </div>

          <div class="column col-lg-3">
            <div id="feed-post-1" class="card is-post">
                <!-- Main wrap -->
                <div class="content-wrap">
                    <!-- Post header -->
                    <div class="card-heading justify-content-between">
                        <!-- User meta -->
                        <div class="user-block">
                            <div class="image">
                                <!--<img src="https://dash.yekbun.net/assets/img/avatars/13.png" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">-->
                            </div>
                            <div class="user-info">
                                <span class="d-flex"><a href="#">Alex Smith</a></span>
                                <span class="time">Wed 29 Nov 1:49 pm</span>
                            </div>
                        </div>
                        <!-- Right side dropdown -->
                        <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                        <div class="d-flex justify-content-start align-items-center">
                                <!--<button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i>-->
                                <!--</button>-->
                                <button type="button" class="btn btn-sm btn-icon popup" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                            </div>

                      <!--  <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                      <!--    <div>-->
                      <!--        <div class="button">-->
                      <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>-->
                      <!--        </div>-->
                      <!--    </div>-->
                      <!--    <div class="dropdown-menu" role="menu">-->
                      <!--        <div class="dropdown-content">-->
                      <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                      <!--                <div class="media">-->
                      <!--                    <div class="media-content">-->
                      <!--                        <h3>Remove the Feed</h3>-->
                      <!--                        <select class="form-control mt-1">-->
                      <!--                          <option value="">Select the Reason</option>-->
                      <!--                        </select>-->
                      <!--                    </div>-->
                      <!--                </div>-->
                      <!--            </a>-->
                      <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                      <!--              <div class="media">-->
                      <!--                  <div class="media-content">-->
                      <!--                      <h3>Remove Feed - Flag User</h3>-->
                      <!--                      <select class="form-control mt-1">-->
                      <!--                        <option value="">Select the Reason</option>-->
                      <!--                      </select>-->
                      <!--                      <select class="form-control mt-1">-->
                      <!--                        <option value="">Select the Flag</option>-->
                      <!--                      </select>-->
                      <!--                  </div>-->
                      <!--              </div>-->
                      <!--          </a>-->
                      <!--          <a href="javascript:void(0)" class="dropdown-item">-->
                      <!--            <div class="media">-->
                      <!--                <div class="media-content">-->
                      <!--                  <h3>Remove Feed - Block User</h3>-->
                      <!--                  <select class="form-control mt-1">-->
                      <!--                    <option value="">Select the Reason</option>-->
                      <!--                  </select>-->
                      <!--                  <select class="form-control mt-1">-->
                      <!--                    <option value="">Select Downgrade User</option>-->
                      <!--                  </select>-->
                      <!--                </div>-->
                      <!--            </div>-->
                      <!--        </a>-->
                      <!--        <a href="javascript:void(0)" class="dropdown-item">-->
                      <!--          <div class="media">-->
                      <!--              <div class="media-content">-->
                      <!--                <h3>Remove User Block Device</h3>-->
                      <!--                <select class="form-control mt-1">-->
                      <!--                  <option value="">Select the Reason</option>-->
                      <!--                </select>-->
                      <!--              </div>-->
                      <!--          </div>-->
                      <!--      </a>-->
                      <!--        </div>-->
                      <!--    </div>-->
                      <!--</div>-->
                    </div>
                    <!-- /Post header -->

                    <!-- Post body -->
                    <div class="card-body">
                        <div class="post-image">
                            <a data-fancybox="post1" data-lightbox-type="comments">
                            <!--  <video controls="" class="">-->
                            <!--    <source src="https://dash.yekbun.net/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4">-->
                            <!--</video>-->
                             <img src="{{asset('assets/img/image.png')}}" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">
                            </a>
                            <!-- Action buttons -->

                        </div>
                    </div>
                    <!-- /Post body -->
                </div>
                <!-- /Main wrap -->

                <!-- Post #1 Comments -->
                <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                  <div class="comments-header">
                                      </div>
                    <!-- Comments body -->
                    <div class="comments-body has-slimscroll">
                      <img src="https://dash.yekbun.net/assets/svg/icons/Comment- area.svg" style="width: 100%" alt="">
                  </div>
                  <!-- /Comments body -->
                </div>
                <!-- /Post #1 Comments -->
            </div>
        </div>

        <div class="column col-lg-3">
          <div id="feed-post-1" class="card is-post">
              <!-- Main wrap -->
              <div class="content-wrap">
                  <!-- Post header -->
                  <div class="card-heading justify-content-between">
                      <!-- User meta -->
                      <div class="user-block">
                          <div class="image">
                              <!--<img src="https://dash.yekbun.net/assets/img/avatars/13.png" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">-->
                          </div>
                          <div class="user-info">
                              <span class="d-flex"><a href="#">Alex Smith</a></span>
                              <span class="time">Wed 29 Nov 1:49 pm</span>
                          </div>
                      </div>
                      <!-- Right side dropdown -->
                      <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                        <div class="d-flex justify-content-start align-items-center">
                                <!--<button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i>-->
                                <!--</button>-->
                                <button type="button" class="btn btn-sm btn-icon popup" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                            </div>

                    <!--  <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                    <!--    <div>-->
                    <!--        <div class="button">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="dropdown-menu" role="menu">-->
                    <!--        <div class="dropdown-content">-->
                    <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                    <!--                <div class="media">-->
                    <!--                    <div class="media-content">-->
                    <!--                        <h3>Remove the Feed</h3>-->
                    <!--                        <select class="form-control mt-1">-->
                    <!--                          <option value="">Select the Reason</option>-->
                    <!--                        </select>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </a>-->
                    <!--            <a href="javascript:void(0)" class="dropdown-item">-->
                    <!--              <div class="media">-->
                    <!--                  <div class="media-content">-->
                    <!--                      <h3>Remove Feed - Flag User</h3>-->
                    <!--                      <select class="form-control mt-1">-->
                    <!--                        <option value="">Select the Reason</option>-->
                    <!--                      </select>-->
                    <!--                      <select class="form-control mt-1">-->
                    <!--                        <option value="">Select the Flag</option>-->
                    <!--                      </select>-->
                    <!--                  </div>-->
                    <!--              </div>-->
                    <!--          </a>-->
                    <!--          <a href="javascript:void(0)" class="dropdown-item">-->
                    <!--            <div class="media">-->
                    <!--                <div class="media-content">-->
                    <!--                  <h3>Remove Feed - Block User</h3>-->
                    <!--                  <select class="form-control mt-1">-->
                    <!--                    <option value="">Select the Reason</option>-->
                    <!--                  </select>-->
                    <!--                  <select class="form-control mt-1">-->
                    <!--                    <option value="">Select Downgrade User</option>-->
                    <!--                  </select>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--        <a href="javascript:void(0)" class="dropdown-item">-->
                    <!--          <div class="media">-->
                    <!--              <div class="media-content">-->
                    <!--                <h3>Remove User Block Device</h3>-->
                    <!--                <select class="form-control mt-1">-->
                    <!--                  <option value="">Select the Reason</option>-->
                    <!--                </select>-->
                    <!--              </div>-->
                    <!--          </div>-->
                    <!--      </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                  </div>
                  <!-- /Post header -->

                  <!-- Post body -->
                  <div class="card-body">
                      <div class="post-image">
                          <a data-fancybox="post1" data-lightbox-type="comments">
                          <!--  <video controls="" class="">-->
                          <!--    <source src="https://dash.yekbun.net/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4">-->
                          <!--</video>-->
                           <img src="{{asset('assets/img/image.png')}}" data-demo-src="https://dash.yekbun.net/assets/img/avatars/13.png" data-user-popover="1" alt="">
                          </a>
                          <!-- Action buttons -->

                      </div>
                  </div>
                  <!-- /Post body -->
              </div>
              <!-- /Main wrap -->

              <!-- Post #1 Comments -->
              <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                <div class="comments-header">
                                  </div>
                  <!-- Comments body -->
                  <div class="comments-body has-slimscroll">
                    <img src="https://dash.yekbun.net/assets/svg/icons/Comment- area.svg" style="width: 100%" alt="">
                </div>
                <!-- /Comments body -->
              </div>
              <!-- /Post #1 Comments -->
          </div>
      </div>


            </div>
  <!-- User Content -->
   

            <!-- User Pills -->
          
            <!--/ User Pills -->





        </div>

    
  

<!-- Modal -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-edit-cc')
@include('_partials/_modals/modal-add-new-address')
@include('_partials/_modals/modal-add-new-cc')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modal -->

<x-modal
id="createcategoryModal"
title="Add Pray Card"
 saveBtnText="Add"
 saveBtnType="submit"
  saveBtnForm="createForm"
  size="md">

 @include('content.include.music.createfeeds')
</x-modal>

@endsection
