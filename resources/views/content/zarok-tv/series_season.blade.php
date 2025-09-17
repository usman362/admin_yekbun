<div>Series: {{$name}}</div>

@foreach ($seasons as $season)
    <div class="col-md-3">
        <div class="post-image">

        <div id="feed-post-1" class=""
                                data-fancybox="post1" data-lightbox-type="comments"
                                data-thumb="{{ asset('storage/' . $season->video) }}"
                                href="{{ asset('storage/' . $season->video) }}" data-id="{{ $season->id }}"
                                data-demo-href="{{ asset('storage/' . $season->video) }}">

            <div class="card is-post mt-4 pt-3 pl-4 pr-4 postitem view-post card-post">
                <div class="content-wrap">
                    <div class="card-body p-0">

                    	@php
                                        $filenameOnly = pathinfo($season->video_file_name, PATHINFO_FILENAME);
                                        $shortName = strlen($filenameOnly) > 40 ? substr($filenameOnly, 0, 40) . '...' : $filenameOnly;
                                        $totalSeconds = floor($season->video_file_length);
                                        $minutes = floor($totalSeconds / 60);
                                        $seconds = $totalSeconds % 60;
                                        $durationFormatted = sprintf('%02d:%02d', $minutes, $seconds);
                                    @endphp


                        <div style="background-image: url('{{ asset('storage/' . $season->banner) }}');"
                             class="card-post-thumbnail">
                            <div class="video-overlay-gradient">
                                                <span class="video-thumbnail-title">{{$shortName}}</span>
                                                <span class="video-thumbnail-duration">{{$durationFormatted}}</span>
                                            </div>
                        </div>
                    </div>
                    <div class="card-footer card_foot mt-0">
                        <div class="user-block">
                            <div class="user-info">
                                <div class="row">
                                    <div class="col-md-2 p-0">
                                        <img src="{{asset('images/user-clips-report-user.png')}}"
                                             style="width: 100px !important;height:35px !important;">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mt-0">
                                            <p class="m-0" title="Şeyda Were">
                                                <b>Admin User</b>
                                            </p>
                                            <small class="time"><i>{{ now()->format('d M Y') }}</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item dropdown d-block"
                                style="margin-top: 0;position: absolute;right: 24px;top: 240px;bottom: auto;">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu text-center dropdown-menu-end"
                                    style="min-width: unset; width: 100px;">
                                    <span style="font-family:Genos;color:#c0c0c0">Options</span>
                                    <div class="row ml-0" style="width:100px;">

                                        <div class="col-md-6" style="border-right: 1px solid #c0c0c0; display:none;">
                                            <a class="dropdown-item edit-video" style="padding: 0"
                                                href="javascript:void(0)" data-id="{{$season->id}}"
                                                data-thumbnail="https://admin.yekbun.net/storage/thumbnails/6812114dabdb3___Şeyda_-_Were_thumb_2.jpg"
                                                data-artist_id="68109b6fcca2aa23040cf172" data-status="1"
                                                for="customRadioPrime">
                                                <img class="pop_action_image" style="height: 26px"
                                                    src="{{asset('assets/svg/edit.svg')}}"></a>
                                        </div>
                                        <div class="col-md-12">
                                            <form action="{{ route('zarokSeriesseason.destroy', $season->_id) }}" onsubmit="handleDeleteSubmit(event)"
                                         method="post"
                                        class="delete-confirm-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            data-bs-original-title="Remove">
                                            <img class="pop_action_image" style="height: 26px"
                                                    src="{{asset('assets/svg/delete.svg')}}">
                                        </button>
                                        {{-- @can('donation.delete')
                                        @endcan --}}
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>
            </div>
            </div>
        </div>
    </div>
@endforeach
