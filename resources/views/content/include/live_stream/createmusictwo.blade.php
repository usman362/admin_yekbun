<style>
    .modal-footer {
        display: none;
    }

    .modal-content{
        width: 450px !important;
    }

    .bgchn {
        cursor: pointer;
    }

    .owl-buttons {
        display: none;
    }


    .owl-carousel:hover .owl-buttons {
        display: block;
    }

    .owl-item {
        text-align: center;
    }

    .owl-nav {
        display: none !important;
    }

    .owl-theme .owl-controls .owl-buttons div {
        background: transparent;
        color: #869791;
        font-size: 40px;
        line-height: 300px;
        margin: 0;
        padding: 0 60px;
        position: absolute;
        top: 0;
    }

    .owl-theme .owl-controls .owl-buttons .owl-prev {
        left: 0;
        padding-left: 20px;
    }

    .owl-theme .owl-controls .owl-buttons .owl-next {
        right: 0;
        padding-right: 20px;
    }

    .owl-item {
        width: auto !important;
    }

    .carousel-indicators [data-bs-target] {
        background-color: black !important;
    }

    .owl-dots {
        display: none !important;
    }

    .modal-content {
        scrollbar-width: none;
    }

    #requestpopuptwo .btn-close {
        position: fixed !important;
        right: 76px !important;
        top: 30px !important;
        z-index: 2 !important;
    }

    .modal-content {
        /*overflow:scroll !important;*/
    }

    .dropify-wrapper .dropify-message span.file-icon {
        width: 100% !important;
    }

    .modal-content {
        padding: 20px !important;
    }

    .dropify-message .file-icon p {
        font-size: 24px !important;
    }

    .color-selector {
        /* background-color: #eaeaea; */
        border-radius: 0px 0px 5px 5px;
        /* padding: 10px; */
        display: flex;
        justify-content: space-between;
    }

    .color-option {
        height: 35px;
        width: 35px;
        border-radius: 100%;
        cursor: pointer;
    }

    .selected {
        border: 2px solid #000 !important;
        /* You can customize this border as you wish */
    }

    #sharevideo {
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #shareimage {
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .modal-content {
        padding: 0px !important;
    }

    .modal-body {
        padding: 0px !important;
    }

    /*.customborderradiustopleft .dropify-wrapper {*/
    /*        border-radius:15px 0px 0px 0px;*/

    /*}*/
    /*.customborderradiustopright .dropify-wrapper{*/
    /*       border-radius:0px 15px 0px 0px;*/
    /*}*/

    /*    .dropify-wrapper{*/
    /*        border-radius:15px !important;*/
    /*    }*/

    .dropify-preview {
        padding: 0px !important;
    }

    .dropify-wrapper {
        border: none !important;
    }

    /*.dropify-wrapper:hover{*/
    /*    border-radius:15px !important;*/
    /*}*/
    .modal-content {
        border-radius: 15px;
    }

    .upload-btn {
        position: absolute;
        top: 2px;
        right: 13px;
        padding: 6px;
        z-index: 99999;
    }


    /*css add*/


    /* input image */
    /* input image */
    /* input image */
    .card-input-image {
        height: 300px;
        /* Set a fixed height */
        width: 100%;
        /* Make it full width */
        border-radius: 8px;
        position: relative;
        margin: 0 auto 12px auto;
        overflow: hidden;
        /* Prevent child elements from overflowing */
    }

    .card-input-image .label-upload-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        color: #629ef5;
        font-weight: 700;
        font-size: 14px;
        line-height: 21px;
        border: 2px dashed #b0cffa;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        z-index: 1;
        /* Ensure the label is above the image */
    }

    .card-input-image input {
        width: 100%;
        height: 100%;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        /* Ensure the input is above the label */
    }

    .card-input-image .image-preview {
        width: 100%;
        height: 100%;
        border-radius: 8px;
        object-fit: cover;
    }

    .card-input-image .btn-delete {
        background: #ef4e4e;
        border-radius: 14.5455px;
        color: #ffffff;
        font-weight: 700;
        font-size: 10px;
        line-height: 10px;
        border: none;
        padding: 7.27273px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
        z-index: 3;
        /* Ensure the delete button is above other elements */
    }

    /* input image active state */
    .card-input-image.active .label-upload-image {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45));
        color: #ffffff;
        border: none;
    }

    .card-input-image.active .image-preview {
        display: initial;
    }

    .card-input-image.active .btn-delete {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .videoclass:hover #videohover {
        visibility: visible !important;
    }

    /* New Css */

    .dz-size {
        font-size: 12px !important;
        padding: 0 !important;
    }

    .dropzone .dz-preview .dz-details .dz-size {
        margin-bottom: 0 !important;
    }

    .row.dz-processing.dz-image-preview.dz-success.dz-complete {
        width: 100% !important;
        margin: 0 auto !important;
        background-color: #fff !important;
    }

    .dz-thumbnail {
        width: 90px !important;
        height: 90px !important;
        margin: 0 auto !important;
    }

    .dropzone .dz-preview .dz-details {
        position: relative !important;
    }

    a.dz-remove {
        width: 95%;
        margin: 0 auto;
    }

    .feed-btn {
        border: none;
        outline: none;
        border-radius: 7px;
        width: 52px;
        height: auto;
    }
</style>

<form action="{{ route('admin_activity.store_feeds') }}" id="feedsForm" method="post" enctype="multipart/form-data"
    style="background-color:#eaeaea;">
    @csrf
    <div class="hidden-inputs"></div>
    <div id="shahretext" class="share-content">
        <div style="padding:0px 2.75rem;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div style="background-image:url('{{ asset('assets/img/hand.png') }}');height: 200px; width: 125%;margin-top:-28px;margin-left:-44px; background-size: 100% 100%;background-repeat: no-repeat;"
                    class="carousel-inner" id="feed-text-background">
                    <div class="carousel-item active">
                        <h2 style="font-size:28px;color:rgb(163, 138, 138);margin-top:20px;text-align:center;"
                            class="feed-text">User
                            Text Will be then <br> showed here</h2>
                    </div>
                </div>
            </div>
        </div>

        <!--add-->

        <div style="padding:0px 0.5rem;">
            <input type="hidden" name="feed_background_image" value="{{ asset('assets/img/hand.png') }}"
                id="feed_background_image">
            <input type="hidden" name="feed_text_color" value="black" id="feed_text_color">

            {{-- //Fonts --}}

            <div
                style="background-color:white; padding-left: 14px; padding-right: 14px; border-radius:7px;margin-top:10px">
                <div class="section-head d-flex">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <img src="{{ asset('assets/svg/fonts-icon.svg') }}" alt="">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <span>Fonts</span>
                </div>
                <div class="fonts-selector mt-2">
                    <div class="cursor-pointer"
                        style="width: 65px; height: 65px;border-radius: 0 0 15px 15px; display: inline-block;">
                        <img src="{{ asset('assets/svg/fonts1.svg') }}" alt="">
                    </div>
                    <div class="cursor-pointer"
                        style="width: 65px; height: 65px;border-radius: 0 0 15px 15px; display: inline-block;">
                        <img src="{{ asset('assets/svg/fonts2.svg') }}" alt="">
                    </div>
                    <div class="cursor-pointer"
                        style="width: 65px; height: 65px;border-radius: 0 0 15px 15px;   display: inline-block;">
                        <img src="{{ asset('assets/svg/fonts3.svg') }}" alt="">
                    </div>
                    <div class="cursor-pointer"
                        style="width: 65px; height: 65px;border-radius: 0 0 15px 15px;  display: inline-block;">
                        <img src="{{ asset('assets/svg/fonts4.svg') }}" alt="">
                    </div>
                    <div class="cursor-pointer"
                        style="width: 65px; height: 65px;border-radius: 0 0 15px 15px;  display: inline-block;">
                        <img src="{{ asset('assets/svg/fonts4.svg') }}" alt="">
                    </div>
                </div>

            </div>

            <!--add color select-->
            <div style="background-color:white;height:95px;padding:4px 14px; border-radius:5px;margin-top:10px">
                <div class="section-head d-flex">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <img src="{{ asset('assets/svg/colors-icon.svg') }}" alt="">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <span>Colors</span>
                </div>
                <div class="color-selector">
                    <div class="cursor-pointer color-option"
                        style="background:black;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="black"></div>
                    <div class="cursor-pointer color-option"
                        style="background:pink ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="pink"></div>
                    <div class="cursor-pointer color-option"
                        style="background:blue ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="blue"></div>
                    <div class="cursor-pointer color-option"
                        style="background:green ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="green"></div>
                    <div class="cursor-pointer color-option"
                        style="background:white ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="white"></div>
                    <div class="cursor-pointer color-option"
                        style="background:red ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="red"></div>
                    <div class="cursor-pointer color-option"
                        style="background:skyblue ;width: 44px; height: 44px; border-radius: 15px; display: inline-block; margin: 10px 0;border: 1px solid #0000004f"
                        data-color="skyblue"></div>
                </div>
            </div>

            <div style="background-color:white;height:95px;padding:4px 14px; border-radius:5px;margin-top:10px">
                <div class="section-head d-flex">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <img src="{{ asset('assets/svg/background-image-icon.svg') }}" alt="">
                    <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                    <span>Backgrounds</span>
                </div>
                <div id="owl-example" class="owl-carousel">
                    @php
                        $bgs = \App\Models\BackgroundFeed::all();
                    @endphp
                    @foreach ($bgs as $bg)
                        <a href="javascript:void(0)" class="feed-bg"
                            data-url="{{ asset('storage/' . $bg->image) }}"><img class="clickborder"
                                style="height:55px;width:55px;border-radius:5px"
                                src="{{ asset('storage/' . $bg->image) }}" alt=""></a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!--share image-->
    <div id="shahreimage" class="share-content">
        <div class="shareimage">
            <!--codee-->
            <div id="" class="">
                <div style="" id="feeds-image" class="">
                    <div class="dropzone needsclick" action="/" id="feeds-dropzone-img">
                        <div class="dz-message needsclick">
                            Drop files here or click to upload
                        </div>
                        <div class="fallback">
                            <input type="file" name="image" multiple />
                        </div>
                    </div>
                    <!--code-->
                </div>
                <div class="shareimage">
                    <div style="width:105%;display:contents;" id="feedimage22"
                        class="col-sm-12 image-content1 row  justify-content-around  justify-content-center">

                        <!--line here-->

                        <hr style="width: 131px;margin: auto;margin-top:20px;">
                        <div style="padding:0px 2.75rem;">
                            <div style="margin-left:5px;margin-top:20px;"
                                class="row pick-content d-flex justify-content-around ">
                                <div style="width:33.3%" class="carousel-inner ">
                                    <h6 style="text-align:center;">Modern</h6>
                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/thanks3.png') }}"
                                        data-original="{{ asset('assets/img/thanks3.png') }}"
                                        data-default="{{ asset('assets/img/colorimage.PNG') }}" width="80"
                                        height="80" class="carousel-inner imagechangeclass grid_change"
                                        data-imagechange="#imagechangeone1" data-value="modern"></object>
                                </div>
                                <div style="width:33.3%" class="carousel-inner  ">
                                    <h6 style="text-align:center;">Elegant</h6>

                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/thanks2.png') }}"
                                        data-original="{{ asset('assets/img/thanks2.png') }}"
                                        data-default="{{ asset('assets/img/thanks2 (1).png') }}" width="80"
                                        height="80"
                                        class="carousel-inner imagechange2 grid_change imagechangeclass"
                                        data-imagechange="#imagechangeone2" data-value="elegant"></object>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-left:-1px;" style="display:contents;" id="feedimage33"
                        class="col-sm-12 image-content1 row ">

                        <div>
                            <hr style="width: 131px;margin: auto;margin-top:20px;">
                            <div style="padding:0px 2.75rem;">
                                <div style="margin-left:5px;margin-top:20px;"
                                    class="row pick-content d-flex justify-content-around">
                                    <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                                        data-imagetwo="#feedimage22">
                                        <h6 style="text-align:center;">Modern</h6>

                                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                                            data="{{ asset('assets/img/three3.png') }}"
                                            data-original2="{{ asset('assets/img/three3.png') }}"
                                            data-default2="{{ asset('assets/img/threedef1.png') }}" width="80"
                                            height="80" class="carousel-inner grid_change imagechangetwo2"
                                            data-imagechangetwo="#imagechangetwo1" data-value="modern"></object>
                                    </div>
                                    <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                                        data-imagetwo="#feedimage33">
                                        <h6 style="text-align:center;">Elegant</h6>
                                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                                            data="{{ asset('assets/img/three3(2).png') }}"
                                            data-original2="{{ asset('assets/img/three3(2).png') }}"
                                            data-default2="{{ asset('assets/img/threedef2.png') }}" width="80"
                                            height="80" class="carousel-inner grid_change imagechangetwo2"
                                            data-imagechangetwo="#imagechangetwo2" data-value="elegant"></object>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display:contents;" id="feedimage44" class="col-sm-12 image-content1 row  ">
                        <!--add upp-->

                        <hr style="width: 131px;margin: auto;margin-top:20px;">

                        <div style="padding:0px 2.75rem;">
                            <div style="margin-left:5px;margin-top:20px;"
                                class="row pick-content d-flex justify-content-around">
                                <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                                    <h6 style="text-align:center;">Modern</h6>
                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/four4.png') }}"
                                        data-original3="{{ asset('assets/img/four4.png') }}"
                                        data-default3="{{ asset('assets/img/fourdef2.png') }}" width="80"
                                        height="80" class="carousel-inner grid_change imagechangefour"
                                        data-contentfour2="#imagecontentfour1" data-value="modern"></object>
                                </div>
                                <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                                    <h6 style="text-align:center;">Elegant</h6>
                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/four4(4).png') }}"
                                        data-original3="{{ asset('assets/img/four4(4).png') }}"
                                        data-default3="{{ asset('assets/img/fourdef1.png') }}" width="80"
                                        height="80" class="carousel-inner grid_change imagechangefour"
                                        data-contentfour2="#imagecontentfour2" data-value="elegant"></object>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--code end-->
        </div>
    </div>
    <!--share image-->
    <div id="shahrevideo" class="share-content">
        <!--codee-->
        <div id="" class="">
            <div style="" id="video-image" class="">
                <div class="dropzone needsclick" action="/" id="video-dropzone-img">
                    <div class="dz-message needsclick">
                        Drop files here or click to upload
                    </div>
                    <div class="fallback">
                        <input type="file" name="image" multiple />
                    </div>
                </div>
                <!--code-->
            </div>
            <div class="shareimage">
                <div style="width:105%;display:contents;" id="videoimage22"
                    class="col-sm-12 image-content1 row  justify-content-around  justify-content-center">

                    <!--line here-->

                    <hr style="width: 131px;margin: auto;margin-top:20px;">
                    <div style="padding:0px 2.75rem;">
                        <div style="margin-left:5px;margin-top:20px;"
                            class="row pick-content d-flex justify-content-around ">
                            <div style="width:33.3%" class="carousel-inner ">
                                <h6 style="text-align:center;">Modern</h6>
                                <object style="height:80px;width:80px;margin:auto;display:flex;"
                                    data="{{ asset('assets/img/thanks3.png') }}"
                                    data-original="{{ asset('assets/img/thanks3.png') }}"
                                    data-default="{{ asset('assets/img/colorimage.PNG') }}" width="80"
                                    height="80" class="carousel-inner imagechangeclass grid_change"
                                    data-imagechange="#imagechangeone1" data-value="modern"></object>
                            </div>
                            <div style="width:33.3%" class="carousel-inner  ">
                                <h6 style="text-align:center;">Elegant</h6>

                                <object style="height:80px;width:80px;margin:auto;display:flex;"
                                    data="{{ asset('assets/img/thanks2.png') }}"
                                    data-original="{{ asset('assets/img/thanks2.png') }}"
                                    data-default="{{ asset('assets/img/thanks2 (1).png') }}" width="80"
                                    height="80" class="carousel-inner imagechange2 grid_change imagechangeclass"
                                    data-imagechange="#imagechangeone2" data-value="elegant"></object>

                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-left:-1px;" style="display:contents;" id="videoimage33"
                    class="col-sm-12 image-content1 row ">

                    <div>
                        <hr style="width: 131px;margin: auto;margin-top:20px;">
                        <div style="padding:0px 2.75rem;">
                            <div style="margin-left:5px;margin-top:20px;"
                                class="row pick-content d-flex justify-content-around">
                                <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                                    data-imagetwo="#videoimage22">
                                    <h6 style="text-align:center;">Modern</h6>

                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/three3.png') }}"
                                        data-original2="{{ asset('assets/img/three3.png') }}"
                                        data-default2="{{ asset('assets/img/threedef1.png') }}" width="80"
                                        height="80" class="carousel-inner grid_change imagechangetwo2"
                                        data-imagechangetwo="#imagechangetwo1" data-value="modern"></object>
                                </div>
                                <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                                    data-imagetwo="#videoimage33">
                                    <h6 style="text-align:center;">Elegant</h6>
                                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                                        data="{{ asset('assets/img/three3(2).png') }}"
                                        data-original2="{{ asset('assets/img/three3(2).png') }}"
                                        data-default2="{{ asset('assets/img/threedef2.png') }}" width="80"
                                        height="80" class="carousel-inner grid_change imagechangetwo2"
                                        data-imagechangetwo="#imagechangetwo2" data-value="elegant"></object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display:contents;" id="videoimage44" class="col-sm-12 image-content1 row  ">
                    <!--add upp-->

                    <hr style="width: 131px;margin: auto;margin-top:20px;">

                    <div style="padding:0px 2.75rem;">
                        <div style="margin-left:5px;margin-top:20px;"
                            class="row pick-content d-flex justify-content-around">
                            <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                                <h6 style="text-align:center;">Modern</h6>
                                <object style="height:80px;width:80px;margin:auto;display:flex;"
                                    data="{{ asset('assets/img/four4.png') }}"
                                    data-original3="{{ asset('assets/img/four4.png') }}"
                                    data-default3="{{ asset('assets/img/fourdef2.png') }}" width="80"
                                    height="80" class="carousel-inner grid_change imagechangefour"
                                    data-contentfour2="#imagecontentfour1" data-value="modern"></object>
                            </div>
                            <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                                <h6 style="text-align:center;">Elegant</h6>
                                <object style="height:80px;width:80px;margin:auto;display:flex;"
                                    data="{{ asset('assets/img/four4(4).png') }}"
                                    data-original3="{{ asset('assets/img/four4(4).png') }}"
                                    data-default3="{{ asset('assets/img/fourdef1.png') }}" width="80"
                                    height="80" class="carousel-inner grid_change imagechangefour"
                                    data-contentfour2="#imagecontentfour2" data-value="elegant"></object>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--code end-->
    </div>
    <div style="padding:0px 0.5rem;">
        <div style="border-radius:5px 5px 0 0; background-color:white;padding:0 14px 10px 14px"
            class="align-items-center mt-3">
            <div class="section-head d-flex">
                <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                <img src="{{ asset('assets/svg/description-icon.svg') }}" alt="">
                <img class="ellipse" src="{{ asset('assets/img/ellipse.png') }}" alt="">
                <span>Description</span>
            </div>

            <input style="height: 90px; border: none;" name="description" type="text"
                class="form-control feed-description w-100" placeholder="Enter The description">
        </div>
    </div>

    <input type="hidden" name="grid_style" id="feed_grid_style" value="modern">

    {{-- <div style="padding:0px 2.75rem;">
        <div style="border-radius:5px 5px 5px 5px;" class="d-flex justify-content-start  ">

            <div style="width:-webkit-fill-available;" class="">
                <div style="width:-webkit-fill-available;" class="btn-group" role="group"
                    aria-label="Basic example">
                    <label for="all" data-val="all-feed"
                        class="btn btn-label-secondary btn btn-outline-secondary usertypepicker active">
                        <input type="radio" class="form-check-input" name="user_type" value="all"
                            id="all-feed" checked />All</label>
                    <label for="educated" data-val="educated-feed"
                        class="btn btn-label-secondary btn btn-outline-secondary usertypepicker">
                        <input type="radio" class="form-check-input" name="user_type" value="educated"
                            id="educated-feed" />Educated</label>
                    <label for="cultivated" data-val="cultivated-feed"
                        class="btn btn-label-secondary  btn btn-outline-secondary usertypepicker">
                        <input type="radio" class="form-check-input" name="user_type" value="cultivated"
                            id="cultivated-feed" />Cultivated</label>
                    <label for="academic" data-val="academic-feed"
                        class="btn btn-label-secondary  btn btn-outline-secondary usertypepicker">
                        <input type="radio" class="form-check-input" name="user_type" value="academic"
                            id="academic-feed" />Academic</label>
                </div>
            </div>
        </div>
    </div> --}}
    <input type="hidden" name="visibility" id="visibility" value="public">
    <div style="padding:0px 0.5rem;">
        <div class="fonts-selector"
            style="background-color:white;border-radius:5px; padding-left: 14px; padding-right: 14px; margin-top:10px">
            <center>
                <button class="cursor-pointer visibilitypicker active" data-val="public">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M2.82471 9.6047C2.82471 6.94005 2.82471 5.60772 3.1393 5.15949C3.4539 4.71127 4.70664 4.28245 7.21213 3.42481L7.68948 3.26142C8.99553 2.81435 9.64855 2.59082 10.3247 2.59082C11.0009 2.59082 11.6539 2.81435 12.9599 3.26142L13.4373 3.42481C15.9428 4.28245 17.1955 4.71127 17.5101 5.15949C17.8247 5.60772 17.8247 6.94005 17.8247 9.6047C17.8247 10.0072 17.8247 10.4437 17.8247 10.917C17.8247 15.6153 14.2922 17.8954 12.0759 18.8635C11.4747 19.1262 11.1741 19.2575 10.3247 19.2575C9.47532 19.2575 9.17472 19.1262 8.57351 18.8635C6.35718 17.8954 2.82471 15.6153 2.82471 10.917C2.82471 10.4437 2.82471 10.0072 2.82471 9.6047Z"
                            stroke="white" />
                        <path style="fill: #ababab"
                            d="M14.4914 10.924C14.4914 11.4712 14.3836 12.013 14.1742 12.5185C13.9648 13.024 13.6579 13.4834 13.271 13.8703C12.8841 14.2572 12.4247 14.5641 11.9192 14.7735C11.4137 14.9829 10.8719 15.0907 10.3247 15.0907C9.77751 15.0907 9.2357 14.9829 8.73017 14.7735C8.22465 14.5641 7.76532 14.2572 7.37841 13.8703C6.9915 13.4834 6.68458 13.024 6.47519 12.5185C6.26579 12.013 6.15802 11.4712 6.15802 10.924C6.15802 10.3768 6.26579 9.835 6.47519 9.32948C6.68458 8.82395 6.9915 8.36462 7.37841 7.97771C7.76532 7.5908 8.22465 7.28389 8.73017 7.07449C9.2357 6.8651 9.77751 6.75732 10.3247 6.75732C10.8719 6.75732 11.4137 6.8651 11.9192 7.07449C12.4247 7.28389 12.8841 7.5908 13.271 7.97771C13.6579 8.36462 13.9648 8.82395 14.1742 9.32948C14.3836 9.835 14.4914 10.3768 14.4914 10.924L14.4914 10.924Z"
                            stroke="white" />
                        <path style="fill: #ababab"
                            d="M11.8645 12.5185C11.9482 12.013 11.9914 11.4712 11.9914 10.924C11.9914 10.3768 11.9482 9.835 11.8645 9.32948C11.7807 8.82395 11.658 8.36462 11.5032 7.97771C11.3484 7.5908 11.1647 7.28389 10.9625 7.07449C10.7603 6.8651 10.5436 6.75732 10.3247 6.75732C10.1058 6.75732 9.88909 6.8651 9.68688 7.07449C9.48467 7.28389 9.30094 7.5908 9.14618 7.97771C8.99141 8.36462 8.86865 8.82395 8.78489 9.32948C8.70113 9.835 8.65802 10.3768 8.65802 10.924C8.65802 11.4712 8.70113 12.013 8.78489 12.5185C8.86864 13.024 8.99141 13.4834 9.14617 13.8703C9.30094 14.2572 9.48467 14.5641 9.68688 14.7735C9.88909 14.9829 10.1058 15.0907 10.3247 15.0907C10.5436 15.0907 10.7603 14.9829 10.9625 14.7735C11.1647 14.5641 11.3484 14.2572 11.5032 13.8703C11.658 13.4834 11.7807 13.024 11.8645 12.5185Z"
                            stroke="white" />
                        <path d="M6.15802 10.9241H14.4914" stroke="white" stroke-linecap="round" />
                    </svg>
                    <p>Public</p>
                </button>
                <button class="cursor-pointer visibilitypicker" data-val="friends">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8.84554" cy="5.92415" r="3.33333" stroke="#1C274C" />
                        <path opacity="0.5"
                            d="M15.5122 15.5073C15.5122 17.5784 15.5122 19.2573 8.8455 19.2573C2.17883 19.2573 2.17883 17.5784 2.17883 15.5073C2.17883 13.4363 5.1636 11.7573 8.8455 11.7573C12.5274 11.7573 15.5122 13.4363 15.5122 15.5073Z"
                            stroke="#1C274C" />
                        <path
                            d="M15.586 11.3729L15.8894 10.9754L15.586 11.3729ZM16.3456 8.1271L15.991 8.47962C16.0848 8.57402 16.2125 8.6271 16.3456 8.6271C16.4787 8.6271 16.6063 8.57402 16.7002 8.47962L16.3456 8.1271ZM17.1051 11.3729L16.8018 10.9754L17.1051 11.3729ZM15.8894 10.9754C15.4915 10.6718 15.1124 10.4143 14.8084 10.0829C14.5216 9.77027 14.3456 9.43431 14.3456 9.00726H13.3456C13.3456 9.75721 13.672 10.3234 14.0715 10.7589C14.4538 11.1757 14.9449 11.5126 15.2827 11.7703L15.8894 10.9754ZM14.3456 9.00726C14.3456 8.61491 14.5742 8.29228 14.8761 8.1587C15.1504 8.03728 15.558 8.04408 15.991 8.47962L16.7002 7.77459C16.0082 7.07857 15.1658 6.93694 14.4714 7.24424C13.8045 7.53938 13.3456 8.2226 13.3456 9.00726H14.3456ZM15.2827 11.7703C15.4079 11.8659 15.5622 11.9836 15.7232 12.0746C15.8844 12.1659 16.0977 12.2575 16.3456 12.2575V11.2575C16.3435 11.2575 16.3068 11.2559 16.2156 11.2043C16.1242 11.1526 16.0237 11.0779 15.8894 10.9754L15.2827 11.7703ZM17.4085 11.7703C17.7462 11.5126 18.2373 11.1757 18.6197 10.7589C19.0192 10.3234 19.3456 9.75721 19.3456 9.00726H18.3456C18.3456 9.43431 18.1695 9.77027 17.8827 10.0829C17.5788 10.4143 17.1996 10.6718 16.8018 10.9754L17.4085 11.7703ZM19.3456 9.00726C19.3456 8.2226 18.8867 7.53938 18.2198 7.24424C17.5254 6.93694 16.683 7.07857 15.991 7.77459L16.7002 8.47962C17.1332 8.04408 17.5407 8.03728 17.8151 8.1587C18.1169 8.29228 18.3456 8.61491 18.3456 9.00726H19.3456ZM16.8018 10.9754C16.6675 11.0779 16.567 11.1526 16.4756 11.2043C16.3844 11.2559 16.3477 11.2575 16.3456 11.2575V12.2575C16.5935 12.2575 16.8068 12.1659 16.968 12.0746C17.129 11.9836 17.2832 11.8659 17.4085 11.7703L16.8018 10.9754Z"
                            fill="#1C274C" />
                    </svg>
                    <p>Friends</p>
                </button>
                <button class="cursor-pointer visibilitypicker" data-val="family">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8.84554" cy="5.92415" r="3.33333" stroke="#1C274C" />
                        <path opacity="0.5"
                            d="M15.5122 15.5073C15.5122 17.5784 15.5122 19.2573 8.8455 19.2573C2.17883 19.2573 2.17883 17.5784 2.17883 15.5073C2.17883 13.4363 5.1636 11.7573 8.8455 11.7573C12.5274 11.7573 15.5122 13.4363 15.5122 15.5073Z"
                            stroke="#1C274C" />
                        <path
                            d="M15.586 11.3729L15.8894 10.9754L15.586 11.3729ZM16.3456 8.1271L15.991 8.47962C16.0848 8.57402 16.2125 8.6271 16.3456 8.6271C16.4787 8.6271 16.6063 8.57402 16.7002 8.47962L16.3456 8.1271ZM17.1051 11.3729L16.8018 10.9754L17.1051 11.3729ZM15.8894 10.9754C15.4915 10.6718 15.1124 10.4143 14.8084 10.0829C14.5216 9.77027 14.3456 9.43431 14.3456 9.00726H13.3456C13.3456 9.75721 13.672 10.3234 14.0715 10.7589C14.4538 11.1757 14.9449 11.5126 15.2827 11.7703L15.8894 10.9754ZM14.3456 9.00726C14.3456 8.61491 14.5742 8.29228 14.8761 8.1587C15.1504 8.03728 15.558 8.04408 15.991 8.47962L16.7002 7.77459C16.0082 7.07857 15.1658 6.93694 14.4714 7.24424C13.8045 7.53938 13.3456 8.2226 13.3456 9.00726H14.3456ZM15.2827 11.7703C15.4079 11.8659 15.5622 11.9836 15.7232 12.0746C15.8844 12.1659 16.0977 12.2575 16.3456 12.2575V11.2575C16.3435 11.2575 16.3068 11.2559 16.2156 11.2043C16.1242 11.1526 16.0237 11.0779 15.8894 10.9754L15.2827 11.7703ZM17.4085 11.7703C17.7462 11.5126 18.2373 11.1757 18.6197 10.7589C19.0192 10.3234 19.3456 9.75721 19.3456 9.00726H18.3456C18.3456 9.43431 18.1695 9.77027 17.8827 10.0829C17.5788 10.4143 17.1996 10.6718 16.8018 10.9754L17.4085 11.7703ZM19.3456 9.00726C19.3456 8.2226 18.8867 7.53938 18.2198 7.24424C17.5254 6.93694 16.683 7.07857 15.991 7.77459L16.7002 8.47962C17.1332 8.04408 17.5407 8.03728 17.8151 8.1587C18.1169 8.29228 18.3456 8.61491 18.3456 9.00726H19.3456ZM16.8018 10.9754C16.6675 11.0779 16.567 11.1526 16.4756 11.2043C16.3844 11.2559 16.3477 11.2575 16.3456 11.2575V12.2575C16.5935 12.2575 16.8068 12.1659 16.968 12.0746C17.129 11.9836 17.2832 11.8659 17.4085 11.7703L16.8018 10.9754Z"
                            fill="#1C274C" />
                    </svg>
                    <p>Family</p>
                </button>
                {{-- <img src="{{ asset('assets/svg/share2.svg') }}" alt="" style="width: 100px; height:100px"> --}}
                <button type="button" class="feed-btn">
                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.423705 1.27994C0.273437 0.93596 0.349116 0.535053 0.614442 0.269525C0.879768 0.00399709 1.28062 -0.071987 1.62471 0.0780205L21.5198 8.60371C21.8558 8.74733 22.0737 9.07749 22.0737 9.44286C22.0737 9.80823 21.8558 10.1384 21.5198 10.282L1.59642 18.7958C1.25406 18.9418 0.857348 18.8653 0.593871 18.6024C0.330394 18.3395 0.252947 17.943 0.398152 17.6003L3.23822 10.909C3.37507 10.5867 3.68428 10.3711 4.03403 10.3541L6.2526 10.2455C6.75663 10.2488 7.16788 9.84285 7.17115 9.33882C7.17443 8.8348 6.76849 8.42355 6.26447 8.42027L3.99752 8.28247C3.65485 8.26141 3.353 8.04983 3.21632 7.73489L0.423705 1.27994Z"
                            fill="#4CD964" />
                    </svg>
                    <p>Share</p>
                </button>
            </center>
        </div>
    </div>
    {{-- <hr style="width: 131px;margin: auto;margin-top:20px"> --}}
    <input type="hidden" name="feed_type" id="feed_type" value="share_text">

    <div class="fonts-selector feeds-type mt-2">
        <div class="section-head d-flex">
            <img src="{{ asset('assets/svg/feed-type-icon.svg') }}" alt="">
            <span>Please Select</span>
        </div>
        <center>

            <!-- Share Text -->
            <button type="button" class="cursor-pointer active ary" data-sharetext="#shahretext" data-val="share_text">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.704102 28.8728C0.704102 28.1447 1.27974 27.5544 1.98982 27.5544H29.4184C30.1285 27.5544 30.7041 28.1447 30.7041 28.8728C30.7041 29.6008 30.1285 30.1911 29.4184 30.1911H1.98982C1.27974 30.1911 0.704102 29.6008 0.704102 28.8728Z"
                        fill="#1C274C" />
                    <path opacity="0.5"
                        d="M25.8893 7.89569C27.6446 6.13356 27.6446 3.27659 25.8893 1.51447C24.1339 -0.24766 21.2879 -0.24766 19.5325 1.51447L18.5186 2.53229C18.5325 2.57438 18.5469 2.61705 18.5618 2.66027C18.9335 3.73558 19.6347 5.14522 20.9538 6.46938C22.2728 7.79354 23.6771 8.49744 24.7483 8.87051C24.7911 8.88544 24.8334 8.89983 24.8752 8.91371L25.8893 7.89569Z"
                        fill="#1C274C" />
                    <path
                        d="M18.5618 2.48657L18.5181 2.5304C18.532 2.57248 18.5464 2.61515 18.5613 2.65838C18.933 3.73369 19.6342 5.14333 20.9532 6.46749C22.2723 7.79165 23.6765 8.49555 24.7477 8.86862C24.7902 8.88342 24.8322 8.89769 24.8736 8.91146L15.0887 18.734C14.429 19.3963 14.0991 19.7274 13.7354 20.0122C13.3063 20.3481 12.8421 20.6361 12.3509 20.8711C11.9346 21.0703 11.492 21.2184 10.6069 21.5146L5.93949 23.0764C5.50392 23.2221 5.02371 23.1083 4.69906 22.7824C4.3744 22.4565 4.26104 21.9745 4.40623 21.5372L5.96203 16.8518C6.25707 15.9633 6.40458 15.5191 6.60302 15.1011C6.83711 14.608 7.12401 14.142 7.45865 13.7113C7.74232 13.3462 8.07218 13.0151 8.73182 12.3529L18.5618 2.48657Z"
                        fill="#1C274C" />
                </svg>
                <p>Text</p>
            </button>
            <!-- Share Image -->
            <button type="button" class="cursor-pointer ary" data-sharetext="#shahreimage" data-val="share_image">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M24.1205 15.8215C24.1205 16.9295 23.1336 17.8278 21.9161 17.8278C20.6987 17.8278 19.7117 16.9295 19.7117 15.8215C19.7117 14.7135 20.6987 13.8152 21.9161 13.8152C23.1336 13.8152 24.1205 14.7135 24.1205 15.8215Z"
                        fill="#1C274C" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M25.5223 8.98051C24.1083 8.79951 22.2858 8.79953 20.0142 8.79956H10.5918C8.32016 8.79953 6.49764 8.79951 5.08362 8.98051C3.62068 9.16778 2.40223 9.56961 1.49637 10.5113C0.590506 11.453 0.313897 12.6053 0.303294 13.9498C0.293045 15.2494 0.533941 16.8936 0.834194 18.9429L1.4433 23.1006C1.67798 24.7027 1.86793 25.9994 2.16324 27.0148C2.47064 28.0717 2.92446 28.948 3.77603 29.6266C4.62759 30.3051 5.64193 30.5987 6.83366 30.7364C7.97855 30.8686 9.41593 30.8686 11.1918 30.8685H19.4141C21.19 30.8686 22.6274 30.8686 23.7723 30.7364C24.964 30.5987 25.9784 30.3051 26.8299 29.6266C27.6815 28.948 28.1353 28.0717 28.4427 27.0148C28.738 25.9994 28.928 24.7027 29.1627 23.1005L29.7718 18.9429C30.072 16.8936 30.3129 15.2494 30.3027 13.9498C30.2921 12.6053 30.0155 11.453 29.1096 10.5113C28.2037 9.56961 26.9853 9.16778 25.5223 8.98051ZM5.39064 10.9672C4.17912 11.1223 3.56635 11.4052 3.15491 11.8329C2.74347 12.2606 2.5164 12.8508 2.50762 13.9642C2.49861 15.1062 2.71635 16.6102 3.03068 18.7558L3.11403 19.3248L3.73334 18.9165C5.33149 17.8631 7.69277 17.9149 9.21258 19.0598L14.8531 23.309C15.3862 23.7106 16.3048 23.7856 16.9678 23.4346L17.3599 23.2271C19.2354 22.2341 21.7489 22.3388 23.4795 23.5122L26.5326 25.5822C26.6831 24.8388 26.818 23.9249 26.9874 22.7684L27.5753 18.7558C27.8896 16.6102 28.1074 15.1062 28.0983 13.9642C28.0896 12.8508 27.8625 12.2606 27.451 11.8329C27.0396 11.4052 26.4268 11.1223 25.2153 10.9672C23.9728 10.8082 22.306 10.8058 19.9276 10.8058H10.6783C8.29999 10.8058 6.63315 10.8082 5.39064 10.9672Z"
                        fill="#1C274C" />
                    <g opacity="0.7">
                        <path
                            d="M6.76901 4.61841C4.68308 4.61841 2.97268 5.87802 2.40189 7.54907C2.38999 7.58391 2.37858 7.61892 2.36768 7.6541C2.9649 7.47325 3.58645 7.3551 4.21565 7.27443C5.83621 7.06668 7.88422 7.06679 10.2633 7.06691L10.4409 7.06692L20.6014 7.06691C22.9805 7.06679 25.0285 7.06668 26.649 7.27443C27.2782 7.3551 27.8998 7.47325 28.497 7.6541C28.4861 7.61892 28.4747 7.58391 28.4628 7.54907C27.892 5.87802 26.1816 4.61841 24.0957 4.61841H6.76901Z"
                            fill="#1C274C" />
                    </g>
                    <g opacity="0.4">
                        <path
                            d="M10.068 0.868419H20.5382C20.8869 0.868332 21.1543 0.868266 21.388 0.891128C23.0497 1.05368 24.4099 2.05277 24.9866 3.39855H5.61963C6.1964 2.05277 7.55653 1.05368 9.21826 0.891128C9.45197 0.868266 9.71933 0.868332 10.068 0.868419Z"
                            fill="#1C274C" />
                    </g>
                </svg>

                <p>Images</p>
            </button>
            <!-- Share Video -->
            <button type="button" class="cursor-pointer ary" data-sharetext="#shahrevideo" data-val="share_video">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.50708 15.9426C0.50708 14.0875 0.50708 12.4757 0.546747 11.0676H30.4674C30.5071 12.4757 30.5071 14.0875 30.5071 15.9426C30.5071 23.0137 30.5071 26.5492 28.3104 28.7459C26.1137 30.9426 22.5782 30.9426 15.5071 30.9426C8.43602 30.9426 4.90048 30.9426 2.70378 28.7459C0.50708 26.5492 0.50708 23.0137 0.50708 15.9426Z"
                        fill="#1C274C" />
                    <path
                        d="M20.0071 19.6926C20.0071 18.7426 19.0141 18.1019 17.028 16.8204C15.0149 15.5215 14.0083 14.872 13.2577 15.3489C12.5071 15.8258 12.5071 17.1147 12.5071 19.6926C12.5071 22.2705 12.5071 23.5595 13.2577 24.0364C14.0083 24.5132 15.0149 23.8637 17.0281 22.5648C19.0141 21.2834 20.0071 20.6427 20.0071 19.6926Z"
                        fill="#1C274C" />
                    <path
                        d="M15.5068 0.942627C18.2747 0.942627 20.5008 0.942627 22.317 1.07437L17.1548 8.81767H10.1089L15.3589 0.942627H15.5068Z"
                        fill="#1C274C" />
                    <path
                        d="M2.70352 3.13933C4.58207 1.26078 7.43973 0.988705 12.6503 0.9493L7.40474 8.81767H0.663086C0.88396 6.17152 1.41702 4.42583 2.70352 3.13933Z"
                        fill="#1C274C" />
                    <path
                        d="M30.3506 8.81767C30.1297 6.17152 29.5966 4.42583 28.3102 3.13933C27.4142 2.24334 26.2954 1.71281 24.8049 1.39867L19.8589 8.81767H30.3506Z"
                        fill="#1C274C" />
                </svg>

                <p>Videos</p>
            </button>
            <!-- Another Option -->
            {{-- <button type="button" class="cursor-pointer ary" data-sharetext="#shahreother" data-val="share_other"> --}}
            <button type="button" class="cursor-pointer ary" data-sharetext="#shahretext" data-val="share_text">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle opacity="0.5" cx="15.6489" cy="15.9587" r="15" fill="#1C274C" />
                    <path
                        d="M10.5117 12.1298C10.2308 9.00348 7.81982 6.09032 6.64946 5.02453L6.00293 4.47158C8.6108 2.27929 11.9759 0.95874 15.6495 0.95874C18.9695 0.95874 22.0377 2.03739 24.5226 3.86338C24.8737 4.92917 24.205 7.15611 23.5027 8.2219C23.2484 8.60795 22.6716 9.08722 22.0393 9.54152C20.6135 10.5659 18.8143 11.0726 17.8995 12.9587C17.638 13.4979 17.6491 14.025 17.7749 14.4831C17.8653 14.8125 17.9231 15.1705 17.924 15.5207C17.927 16.6531 16.7818 17.4711 15.6495 17.4587C12.703 17.4266 10.7742 15.052 10.5117 12.1298Z"
                        fill="#1C274C" />
                    <path
                        d="M17.8036 25.3728C19.2858 22.5797 24.2263 22.5797 24.2263 22.5797C29.3742 22.526 30.0697 19.4004 30.5345 17.8206C29.7025 24.5426 24.423 29.8861 17.7317 30.8156C17.2478 29.7972 16.6745 27.5006 17.8036 25.3728Z"
                        fill="#1C274C" />
                </svg>

                <p>Link</p>
            </button>
        </center>
    </div>

    {{-- <div style="padding:10px;" class="col-md-12 d-flex justify-content-center">
        <button type="button" class="btn btn-label-primary feed-btn">
            Submit
        </button>
    </div> --}}
</form>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.feed-bg').click(function() {
                let url = $(this).attr('data-url');
                $('#feed-text-background').css('background-image', `url('${url}')`);
                $('#feed_background_image').val(url);
            });

            $('.color-option').click(function() {
                let color = $(this).attr('data-color');
                $('#feed_text_color').val(color);
                $('.feed-text').css('color', color);
            })

            $('.feed-description').keyup(function() {
                let text = $(this).val();
                $('.feed-text').text(text);
            })
        });
    </script>
@endpush
