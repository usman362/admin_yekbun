@extends('layouts/layoutMaster')

@section('title', 'Histories')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
<style>
    .btn-primary {
    color: #fff !important;
    background-color: #696cff !important;
    border-color: #696cff !important;
    box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
}
.modal-content {
    overflow: unset !important;
}
</style>
    @endsection

    @section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <!-- Concatenated js plugins and jQuery -->
    <script src="{{ asset('assets/friendkit/js/app.js') }}"></script>

    <!-- Core js -->
    <script src="{{ asset('assets/friendkit/js/global.js') }}"></script>

    <!-- Navigation options js -->
    <script src="{{ asset('assets/friendkit/js/navbar-v1.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-v2.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-mobile.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-options.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/sidebar-v1.js') }}"></script>

    <!-- Core instance js -->
    <script src="{{ asset('assets/friendkit/js/main.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/chat.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/touch.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/tour.js') }}"></script>

    <!-- Components js -->
    <script src="{{ asset('assets/friendkit/js/explorer.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/modal-uploader.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/popovers-pages.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
@endsection

@section('content')
<script>
    const dropZoneInitFunctions = [];
</script>

    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="view-wrapper">
                <div id="main-feed" class="container">
                    <div id="activity-feed" class="view-wrap true-dom">

                        <div class="columns">
                            <div class="column is-3 is-hidden-mobile">
                                <div class="card">
                                    <div class="card-body p-0 border-none">
                                        <div class="list-group nav nav-tab" role="tablist">
                                            {{-- <a class="list-group-item list-group-item-action {{ request('type') == 'admin-feeds' ? 'active' : '' }}"
                                                href="#tab1">
                                                Add History<br>

                                            </a> --}}
                                            <button class="btn btn-primary add-history" data-bs-toggle="modal"
                                                data-bs-target="#createhistoryModal"><i class="bx bx-plus me-0 me-sm-1"></i>
                                                Add History</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column column is-6 tab-content" id="tab1">
                                <input type="hidden" name="post_feed_id" id="post_feed_id">
                                <input type="hidden" name="comment_parent_id" id="comment_parent_id">
                                @foreach ($history as $feed)
                                    <div id="feed-post-1" class="card is-post">
                                        <div class="content-wrap">
                                            <!-- Post header -->
                                            <div class="card-heading">
                                                <div class="user-block">
                                                    <div class="image">
                                                        <img src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                            data-demo-src="{{ asset('storage/' . (optional($feed->user)->image ?? '')) }}"
                                                            data-user-popover="1" alt="User Image"
                                                            onerror="this.src='https://www.w3schools.com/w3images/avatar2.png'">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <a href="#">{{ optional($feed->user)->name ?? 'N/A' }}
                                                                {{ optional($feed->user)->last_name ?? 'N/A' }}</a>
                                                        </span>
                                                        <span class="time d-flex">
                                                            &nbsp; <i class="fa fa-circle pr-1"
                                                                style="font-size: 4px;margin-top: 7px;color: #c3c3c3;"></i>
                                                            {{ optional($feed->created_at)->diffForHumans() ?? 'Unknown time' }}
                                                            &nbsp; <i class="fa fa-circle"
                                                                style="font-size: 4px;margin-top: 7px;color: #c3c3c3;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Post body -->
                                            <div class="card-body col-sm-12">
                                                <div class="row">
                                                    <div class="post-image col-sm-12">
                                                        <a class="view-post" data-fancybox="post1"
                                                            data-lightbox-type="comments"
                                                            data-thumb="{{ asset('storage/' . $feed->thumbnail) }}"
                                                            href="{{ asset('storage/' . $feed->thumbnail) }}"
                                                            data-id="{{ $feed->_id }}"
                                                            data-demo-href="{{ asset('storage/' . $feed->thumbnail) }}">
                                                            <img src="{{ asset('storage/' . $feed->thumbnail) }}"
                                                                style="width:100%;object-fit:cover;border-radius:7px;padding:0;display:block">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Post footer -->
                                            <div class="card-footer">
                                                <div class="social-count">
                                                    <div class="shares-count" style="cursor: pointer">
                                                        <img src="{{ asset('assets/svg/icons/Share.svg') }}" width="20"
                                                            alt="">
                                                        <span>12k</span>
                                                    </div>
                                                    <div class="likes-count" style="cursor: pointer">
                                                        <img src="{{ asset('assets/svg/icons/views.svg') }}" width="20"
                                                            alt="">
                                                        <span>1225</span>
                                                    </div>
                                                    <div class="comments-count is-comment-light" style="cursor: pointer">
                                                        <img src="{{ asset('assets/svg/icons/Comments.svg') }}"
                                                            width="20" alt="">
                                                        <span>123</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="column is-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>

        <x-modal id="createhistoryModal" title="Create History" saveBtnText="Create" saveBtnType="submit"
            saveBtnForm="createForm" size="md">
            @include('content.include.history.createForm')
        </x-modal>
    </div>

    <script>
        function delete_service(el) {
            let link = $(el).data('id');
            $('.deleted-modal').modal('show');
            $('#delete_form').attr('action', link);
        }
    </script>


@section('page-script')
    <script>
        $('.nav-tab a:first-child').addClass('active');
        $('.tab-content').hide();
        let ii = $('.tab-content');
        ii[1].style.display = 'block';
        // Click function
        $('.nav-tab a').click(function() {
            $('.nav-tab a').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').hide();

            var activeTab = $(this).attr('href');
            $(activeTab).fadeIn();
            return false;
        });
    </script>
    <script>
        function confirmAction(event, callback) {
            event.preventDefault();
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
            }).then(function(result) {
                if (result.value) {
                    callback();
                }
            });
        }
    </script>

    <script>
        function getComments(data) {
            let comments = '';
            data.data.comments.forEach(function(data, index) {
                let child = '';
                if (data.child_comments.length > 0) {
                    comments += `
                            <div class="media is-comment com_container" data-id="${data._id}">
                                <div class="comment-line"></div>
                                <figure class="media-left">
                                    <p class="image is-32x32">
                                        <img src="/public/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
                                    </p>
                                </figure>

                                <div class="media-content pb-0">
                                    <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                        <div class="username">${data?.user?.name} ${data?.user?.last_name}</div>
                                        <span>${moment(data.created_at).fromNow()}</span>
                                    </div>
                                    <p class="mb-2">${data.comment}</p>
                                </div>
                                <a href="javascript:void(0)" class="comment-reply" data-username="@${data?.user?.username}" data-parent_id="${data._id}"><i class="fas fa-reply"></i></a>
                            </div>`;

                    data.child_comments.forEach(function(child, index) {
                        ++index;

                        let height = 65;
                        if (child.child_comments.length > 0) {
                            height += 85 * child.child_comments.length;
                            let commentLine2 =
                                `<div class="comment-line-2" style="height:calc(${height}px)"></div>`;
                            let commentLine3 =
                                '<div class="comment-line-3"></div>';
                            comments +=
                                `<div class="media is-comment is-nested com_container"  data-id="${child._id}">
                                    ${index == data.child_comments.length ? '' : commentLine2}

                                    ${commentLine3}

                                    <div class="arrow-line 3"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/public/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${child?.user?.name} ${child?.user?.last_name}</div>
                                            <span>${moment(child?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${child?.comment}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${child?.user?.username}" data-parent_id="${child._id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                            child.child_comments.forEach(function(childUltra,
                                index3) {
                                ++index3

                                let commentLine2 =
                                    `<div class="comment-line-2" ></div>`;
                                comments +=
                                    `<div class="media is-comment is-nested com_container" data-id="${childUltra._id}" style="margin-left: 38.5px !important">
                                    ${index3 == child.child_comments.length ? '' : commentLine2}

                                    <div class="arrow-line"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/public/storage/${childUltra?.user?.image}" alt="" data-user-popover="${childUltra?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${childUltra?.user?.name} ${childUltra?.user?.last_name}</div>
                                            <span>${moment(childUltra?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${childUltra?.comment}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${childUltra?.user?.username}" data-parent_id="${childUltra.parent_id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                            });

                        } else {
                            let commentLine2 =
                                `<div class="comment-line-2" style="height:calc(${height}px)"></div>`;
                            comments += `<div class="media is-comment is-nested com_container"  data-id="${child._id}">

                                    ${index == data.child_comments.length ? '' : commentLine2}

                                    <div class="arrow-line"></div>
                                    <figure class="media-left">
                                        <p class="image is-32x32">
                                            <img src="/public/storage/${child?.user?.image}" alt="" data-user-popover="${child?.user?.id}">
                                        </p>
                                    </figure>

                                    <div class="media-content pb-0">
                                        <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                            <div class="username">${child?.user?.name} ${child?.user?.last_name}</div>
                                            <span>${moment(child?.created_at).fromNow()}</span>
                                        </div>
                                        <p class="mb-2">${child?.comment}</p>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-reply" data-username="@${child?.user?.username}" data-parent_id="${child._id}"><i class="fas fa-reply"></i></a>
                                </div>`;
                        }

                    });
                } else {
                    comments += `
                            <div class="media is-comment" data-id="${data._id}">
                                <figure class="media-left">
                                    <p class="image is-32x32">
                                        <img src="/public/storage/${data?.user?.image}" alt="" data-user-popover="${data?.user?.id}">
                                    </p>
                                </figure>

                                <div class="media-content pb-0">
                                    <div class="d-flex justify-content-between comment-actions mb-2" style="margin-top:-7px;">
                                        <div class="username">${data?.user?.name} ${data?.user?.last_name}</div>
                                        <span>${moment(data.created_at).fromNow()}</span>
                                    </div>
                                    <p class="mb-2">${data.comment}</p>
                                </div>
                                <a href="javascript:void(0)" class="comment-reply" data-username="@${data?.user?.username}" data-parent_id="${data._id}"><i class="fas fa-reply"></i></a>
                            </div>`;
                }


            });

            return comments;
        }
    </script>
    <script>
        function closeFancyBox() {
            $('body').css('position', 'relative');
            $('.comments-list').html('');
        }

        $('.view-post').click(function() {
            $('#post_feed_id').val($(this).attr('data-id'));
            $.ajax({
                url: "{{ route('historyComments') }}",
                type: 'GET',
                data: {
                    history_id: $('#post_feed_id').val(),
                },
                success: function(response) {
                    let comments = '';
                    console.log(response);
                    $('.comment-controls img').attr('src', '/public/storage/' + response?.data?.user
                        ?.image);
                    $('.comment-controls img').css('display', 'block');
                    $('.fancybox-caption__body .header img').attr('src', '/public/storage/' + response
                        ?.data
                        ?.feed?.user?.image);
                    $('.fancybox-caption__body .header img').css('display', 'block')
                    $('.fancybox-caption__body .user-meta .name').text(response?.data?.feed?.user
                        ?.name + ' ' + response?.data?.feed?.user?.last_name);
                    $('.post-date').text(moment(response?.data?.feed?.created_at).fromNow())
                    $('.views-count-1').text(response?.data?.comments_count);

                    comments = getComments(response);

                    if (response.data.liked == true) {
                        $('.like-btn').addClass('liked');
                    } else {
                        $('.like-btn').removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                    $('.comments-list').html(comments);
                    $('.comments-list').animate({
                        scrollTop: $('.comments-list')[0].scrollHeight
                    }, 500);
                    $('body').css('position', 'fixed');
                }

            });
        })

        $('body').on('click', '.send-comment', function() {
            $.ajax({
                url: "{{ route('store.historyComments') }}",
                type: 'POST',
                data: {
                    comment: $('.comment-textarea').val(),
                    history_id: $('#post_feed_id').val(),
                    parent_id: $('#comment_parent_id').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let comments = '';

                    comments = getComments(response);

                    if (response.data.liked == true) {
                        $('.like-btn').addClass('liked');
                    } else {
                        $('.like-btn').removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                    $('.views-count-1').text(response.data.comments_count);
                    $('.comment-textarea').val('');
                    $('.comments-list').html(comments);
                    if ($('#comment_parent_id').val() == "" || $('#comment_parent_id').val() == null) {
                        $('.comments-list').animate({
                            scrollTop: $('.comments-list')[0].scrollHeight
                        }, 500);
                    }
                    $('#comment_parent_id').val('');
                }

            });
        })

        $('body').on('click', '.comment-reply', function() {
            $('.comment-textarea').val('');
            $('.comment-textarea').attr('autofocus', true);
            $('.comment-textarea').val($(this).attr('data-username') + ' ');
            $('#comment_parent_id').val($(this).attr('data-parent_id'));
        });


        $(document).on('click', '.like-btn', function() {
            let button = $(this);
            let postId = $('#post_feed_id').val();
            $.ajax({
                url: "{{ route('historyLikes') }}",
                type: "POST",
                data: {
                    history_id: postId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.data.liked == true) {
                        button.addClass('liked');
                    } else {
                        button.removeClass('liked');
                    }
                    $('.likes-count span').text(response?.data?.like_count);
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                }
            });
        });
    </script>

    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('11724793b536f9ff5908', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('history-comments');
        channel.bind('history-event', function(data) {

            let comments = '';
            comments = getComments(data);
            $('.views-count-1').text(data.data.comments_count);
            $('.comments-list').html(comments);
            $('.likes-count span').text(data?.data?.like_count);
        });
    </script> --}}

    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>


@endsection
@endsection
