<div style="padding-top:0px;" class="column column is-6 tab-content" id="tab1">
    @foreach ($feeds as $key => $feed)
        <div id="feed-post-{{ $key }}" class="card is-post">
            <!-- Main wrap -->
            <div class="content-wrap">
                <!-- Post header -->
                <div class="card-heading">
                    <!-- User meta -->
                    <div class="user-block">
                        <div class="image">
                            <img src="https://www.w3schools.com/howto/img_avatar.png"
                                data-demo-src="https://www.w3schools.com/howto/img_avatar.png"
                                data-user-popover="1" alt="">
                        </div>
                        <div class="user-info">
                            <span class="d-flex"><a href="#">Yekbun</a>
                                {{-- <i class="bx bx-world ml-2"></i> --}}
                            </span>
                            <span class="time">. CEO .</span>
                        </div>
                    </div>
                    <!-- Right side dropdown -->
                    <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                    <div
                        class="dropdown is-spaced post_time is-right is-neutral dropdown-trigger">
                        <i class="bx bx-trash me-1"></i>
                    </div>
                </div>
                <!-- /Post header -->

                <!-- Post body -->
                <div class="card-body pt-0">
                    <!-- Post body text -->
                    @if ($feed->feed_type == 'share_text')
                        <div class="post-text mt-1">
                            <div
                                style="background-size:cover;background-image:url({{ $feed->feed_background_image }});display: flex;justify-content: center;align-items: center;height: 50vh;text-align: center;">
                                <p style="color:{{ $feed->feed_text_color }};font-weight:bold;font-size:24px"
                                    class="p-1">
                                    {{ $feed->description }}
                                </p>
                            </div>
                        </div>
                    @else
                        @if ($feed->feed_type == 'share_video')
                            @php
                                $imgUrl = $feed->video
                                    ? asset('storage/' . $feed->video[0])
                                    : asset('assets/img/feed-image.jpeg');
                            @endphp
                        @else
                            @php
                                $imgUrl = $feed->image
                                    ? asset('storage/' . $feed->image[0])
                                    : asset('assets/img/feed-image.jpeg');
                            @endphp
                        @endif

                        <div class="row">
                            @if ($feed->image_type == 2)
                                @if ($feed->grid_style == 'modern')
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">
                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @elseif($feed->image_type == 3)
                                @if ($feed->grid_style == 'modern')
                                    <div class="col-md-12">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @elseif($feed->image_type == 4)
                                @if ($feed->grid_style == 'modern')
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-image">
                                            <a data-fancybox="post1"
                                                data-lightbox-type="comments"
                                                data-thumb="{{ $imgUrl }}"
                                                href="{{ $imgUrl }}"
                                                data-demo-href="{{ $imgUrl }}">

                                                @if ($feed->feed_type == 'share_video')
                                                    <video src="{{ $imgUrl }}" controls
                                                        style="width: 100%"></video>
                                                @else
                                                    <img src="{{ $imgUrl }}"
                                                        data-demo-src="{{ $imgUrl }}"
                                                        alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-md-12">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            @if ($feed->feed_type == 'share_video')
                                                <video src="{{ $imgUrl }}" controls
                                                    style="width: 100%"></video>
                                            @else
                                                <img src="{{ $imgUrl }}"
                                                    data-demo-src="{{ $imgUrl }}"
                                                    alt="">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="article_details">

                                    <div class="artilce_title">
                                        {{ $feed->title ?? 'Title' }}
                                    </div>
                                    <div class="article_time">
                                        {{ \Carbon\Carbon::parse($feed->created_at)->format('d.m.Y - H:m') ?? '0.0.0' }}
                                    </div>

                                    <div class="article_txt">
                                        {{ $feed->description ?? 'Description' }}
                                    </div>

                                </div>
                            </div>

                        </div>

                    @endif
                </div>
                <!-- /Post body -->

                <!-- Post footer -->
                <div class="card-footer pt-2">
                    <!-- Followers avatars -->
                    <div class="likers-group">
                        <img src="{{ asset('assets/svg/icons/haha-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/haha-emoji.svg') }}"
                            data-user-popover="1" alt="">
                        <img src="{{ asset('assets/svg/icons/love-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/love-emoji.svg') }}"
                            data-user-popover="4" alt="">
                        <img src="{{ asset('assets/svg/icons/sad-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/sad-emoji.svg') }}"
                            data-user-popover="5" alt="">
                    </div>
                    <!-- Followers text -->
                    <div class="likers-text">

                    </div>
                    <!-- Post statistics -->
                    <div class="social-count">
                        <div class="shares-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/Share.svg') }}"
                                width="15" alt="">
                            <span>9</span>
                        </div>
                        <div class="likes-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/views.svg') }}"
                                width="15" alt="">
                            <span>27</span>
                        </div>
                        <div class="comments-count is-comment-light" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/Comments.svg') }}"
                                width="15" alt="">
                            <span>3</span>
                        </div>
                        <div class="comments-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/voice.svg') }}"
                                width="15" alt="">
                            <span>3</span>
                        </div>
                    </div>
                </div>
                <!-- /Post footer -->
            </div>
            <!-- /Main wrap -->

            <!-- Post #1 Comments -->
            <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                <div class="comments-header">
                    @if (request('type') === 'flag')
                        <img src="{{ asset('assets/img/exclamation-mark.png') }}"
                            style="position: absolute;top:1rem;right:3.5rem" width="15"
                            alt="">
                    @endif
                </div>
            </div>
            <!-- /Post #1 Comments -->
        </div>
    @endforeach
</div>

<div style="padding-top:0px;" class="column column is-6 tab-content" id="tab2">
    @foreach ($news as $key => $newz)
        <div id="news-post-{{ $key }}" class="card is-post">
            <!-- Main wrap -->
            <div class="content-wrap">
                <!-- Post header -->
                <div class="card-heading">
                    <!-- User meta -->
                    <div class="user-block">
                        @php
                            $imgUrl = $newz->image
                                ? asset('storage/' . $newz->image[0])
                                : asset('assets/img/feed-image.jpeg');
                        @endphp
                        <div class="image">
                            <img src="https://www.w3schools.com/howto/img_avatar.png"
                                data-demo-src="https://www.w3schools.com/howto/img_avatar.png"
                                data-user-popover="1" alt="">
                        </div>
                        <div class="user-info">
                            <span class="d-flex"><a href="#">Yekbun</a>
                                {{-- <i class="bx bx-world ml-2"></i> --}}
                            </span>
                            <span class="time">. CEO .</span>
                        </div>
                    </div>
                    <!-- Right side dropdown -->
                    <div
                        class="dropdown is-spaced post_time is-right is-neutral dropdown-trigger">
                        <i class="bx bx-trash me-1"></i>
                        {{-- <div>
                            <div class="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </div>
                        </div> --}}
                        {{-- <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="javascript:void(0)" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-content">
                                            <h3>Remove Feed</h3>
                                            <small>Feed Removed Only</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-content">
                                            <h3>Repost the Feed</h3>
                                            <small>Post it again</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- /Post header -->

                <!-- Post body -->
                <div class="card-body pt-0">
                    <!-- Post body text -->
                    <div class="row">
                        @if ($newz->image_type == 2)
                            @if ($newz->grid_style == 'modern')
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @elseif($newz->image_type == 3)
                            @if ($newz->grid_style == 'modern')
                                <div class="col-md-12">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-8">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @elseif($newz->image_type == 4)
                            @if ($newz->grid_style == 'modern')
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-8">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="post-image">
                                        <a data-fancybox="post1" data-lightbox-type="comments"
                                            data-thumb="{{ $imgUrl }}"
                                            href="{{ $imgUrl }}"
                                            data-demo-href="{{ $imgUrl }}">

                                            <img src="{{ $imgUrl }}"
                                                data-demo-src="{{ $imgUrl }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="col-md-12">
                                <div class="post-image">
                                    <a data-fancybox="post1" data-lightbox-type="comments"
                                        data-thumb="{{ $imgUrl }}"
                                        href="{{ $imgUrl }}"
                                        data-demo-href="{{ $imgUrl }}">

                                        <img src="{{ $imgUrl }}"
                                            data-demo-src="{{ $imgUrl }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="article_details">

                                <div class="artilce_title">
                                    {{ $newz->title ?? 'Title' }}
                                </div>
                                <div class="article_time">
                                    {{ \Carbon\Carbon::parse($newz->created_at)->format('d.m.Y - H:m') ?? '0.0.0' }}
                                </div>

                                <div class="article_txt">
                                    {{ $newz->description ?? 'Description' }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Post body -->

                <!-- Post footer -->
                <div class="card-footer pt-2">
                    <!-- Followers avatars -->
                    <div class="likers-group">
                        <img src="{{ asset('assets/svg/icons/haha-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/haha-emoji.svg') }}"
                            data-user-popover="1" alt="">
                        <img src="{{ asset('assets/svg/icons/love-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/love-emoji.svg') }}"
                            data-user-popover="4" alt="">
                        <img src="{{ asset('assets/svg/icons/sad-emoji.svg') }}"
                            data-demo-src="{{ asset('assets/svg/icons/sad-emoji.svg') }}"
                            data-user-popover="5" alt="">
                    </div>
                    <!-- Followers text -->
                    <div class="likers-text">

                    </div>
                    <!-- Post statistics -->
                    <div class="social-count">
                        <div class="shares-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/Share.svg') }}"
                                width="15" alt="">
                            <span>9</span>
                        </div>
                        <div class="likes-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/views.svg') }}"
                                width="15" alt="">
                            <span>27</span>
                        </div>
                        <div class="comments-count is-comment-light" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/Comments.svg') }}"
                                width="15" alt="">
                            <span>3</span>
                        </div>
                        <div class="comments-count" style="cursor: pointer">
                            <img src="{{ asset('assets/svg/icons/voice.svg') }}"
                                width="15" alt="">
                            <span>3</span>
                        </div>
                    </div>
                </div>
                <!-- /Post footer -->
            </div>
            <!-- /Main wrap -->

            <!-- Post #1 Comments -->
            <div class="comments-wrap is-hidden" style="top: 0rem;position: relative;">
                <div class="comments-header">
                    @if (request('type') === 'flag')
                        <img src="{{ asset('assets/img/exclamation-mark.png') }}"
                            style="position: absolute;top:1rem;right:3.5rem" width="15"
                            alt="">
                    @endif
                </div>
            </div>
            <!-- /Post #1 Comments -->
        </div>
    @endforeach
</div>

<div style="margin-top: -35px;" class="column column is-6 tab-content" id="tab3">
    <div class="column column is-12">
        @foreach ($events as $key => $event)
            <div class="card p-2 mb-4">
                <div class="card-body">
                    <h4 class="mb-2 pb-1">Upcoming Webinar</h4>
                    <p class="small">{{ $event->description }}</p>
                    <div class="row mb-3 g-3">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="avatar flex-shrink-0 me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bx-calendar-exclamation bx-sm"></i></span>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-nowrap">
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d M y') }}
                                    </h6>
                                    <small>Date</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="avatar flex-shrink-0 me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bx-time-five bx-sm"></i></span>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-nowrap">
                                        {{ \Carbon\Carbon::parse($event->start_time)->diffForHumans(\Carbon\Carbon::parse($event->end_time), true) }}
                                    </h6>
                                    <small>Duration</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid"
                            data-bs-toggle="modal" data-bs-target="#addNewAddress">Join the
                            event</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--statt-->
</div>
