<style>
    .modal-footer {
        display: none;
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
        right: -56px !important;
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
        padding: 10px;
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
        padding: 6px 16px;
        outline: none;
    }
</style>

<form action="{{ route('admin_activity.store_feeds') }}" id="feedsForm" method="post" enctype="multipart/form-data"
    style="background-color:#eaeaea;">
    @csrf
    <div class="hidden-inputs"></div>
    <div id="shahretext" class="share-content">
        <div style="padding:0px 2.75rem;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div style="background-image:url('{{ asset('assets/img/hand.png') }}');height: 240px; width: 119%;margin-top:-28px;margin-left:-44px; background-size: 100% 100%;background-repeat: no-repeat;"
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
                style="background-color:white; padding-left: 20px; padding-right: 20px; border-radius:7px;margin-top:10px">
                <label> <img src="{{ asset('assets/svg/fonts.svg') }}" style="width:100px" alt=""> </label>
                <div class="fonts-selector">
                    <div class="cursor-pointer color-option"
                        style="width: 85px; height: 85px;  border-radius: 0 0 15px 15px; display: inline-block; margin: 10px;">
                        <img src="{{ asset('assets/svg/fonts1.svg') }}" alt=""
                            style="width: 100px; height:100px">

                    </div>
                    <div class="cursor-pointer color-option"
                        style="width: 85px; height: 85px; border-radius: 0 0 15px 15px; display: inline-block; margin: 10px;">
                        <img src="{{ asset('assets/svg/fonts2.svg') }}" alt="" style="width: 85px; height:85px">

                    </div>
                    <div class="cursor-pointer color-option"
                        style="width: 85px; height: 85px; border-radius: 0 0 15px 15px;   display: inline-block; margin: 10px;">
                        <img src="{{ asset('assets/svg/fonts3.svg') }}" alt="" style="width: 85px; height:85px">

                    </div>
                    <div class="cursor-pointer color-option"
                        style="width: 85px; height: 85px; border-radius: 0 0 15px 15px;  display: inline-block; margin: 10px;">
                        <img src="{{ asset('assets/svg/fonts4.svg') }}" alt="" style="width: 85px; height:85px">

                    </div>
                    <div class="cursor-pointer color-option"
                        style="width: 85px; height: 85px; border-radius: 0 0 15px 15px; display: inline-block; margin: 10px;">
                        <img src="{{ asset('assets/svg/fonts5.svg') }}" alt="" style="width: 85px; height:85px">

                    </div>
                </div>

            </div>

            <!--add color select-->
            <div
                style="background-color:white;padding-left: 20px; padding-right: 20px; border-radius:5px;margin-top:10px">
                <label> <img src="{{ asset('assets/svg/color.svg') }}" style="width:100px" alt=""> </label>
                <div class="color-selector">
                    <div class="cursor-pointer color-option"
                        style="background:black;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="black"></div>
                    <div class="cursor-pointer color-option"
                        style="background:pink ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="pink"></div>
                    <div class="cursor-pointer color-option"
                        style="background:blue ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="blue"></div>
                    <div class="cursor-pointer color-option"
                        style="background:green ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="green"></div>
                    <div class="cursor-pointer color-option"
                        style="background:white ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="white"></div>
                    <div class="cursor-pointer color-option"
                        style="background:red ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="red"></div>
                    <div class="cursor-pointer color-option"
                        style="background:skyblue ;width: 60px; height: 60px; border-radius: 15px; display: inline-block; margin: 10px;border: 1px solid #0000004f"
                        data-color="skyblue"></div>
                </div>
            </div>

            <div
                style="background-color:white;padding-left: 20px; padding-right: 20px; border-radius:5px;margin-top:10px">
                <label> <img src="{{ asset('assets/svg/background.svg') }}" style="width:100px" alt="">
                </label>
            </div>

            <div style="padding:17px !important;background-color:white ;border-radius:0px 0px 5px 5px;" id="owl-example"
                class="owl-carousel">
                @php
                    $bgs = \App\Models\BackgroundFeed::all();
                @endphp
                @foreach ($bgs as $bg)
                    <a href="javascript:void(0)" class="feed-bg" data-url="{{ asset('storage/' . $bg->image) }}"><img
                            class="clickborder" style="height:65px;width:90px;padding: 0px 12px;"
                            src="{{ asset('storage/' . $bg->image) }}" alt=""></a>
                @endforeach
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
        <div style="border-radius:5px 5px 0 0; background-color:white;padding:20px"
            class="d-flex align-items-center pt-3 mt-3">
            <label>
                <img src="{{ asset('assets/svg/description.svg') }}" style="width:100px" alt="">
            </label>
        </div>
        <div style="background: white; border-radius:0 0 7px 7px; margin-top: -1px;" class="d-flex">
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
        style="background-color:white;border-radius:5px; padding-left: 20px; padding-right: 20px; margin-top:10px">
        <center>
            <div class="cursor-pointer visibilitypicker" data-val="public"
                style="border-radius: 15px; display: inline-block; margin: 10px;">
                <img src="{{ asset('assets/svg/public.svg') }}" alt="" style="width: 100px; height:100px">
            </div>
            <div class="cursor-pointer visibilitypicker" data-val="friends"
                style="border-radius: 15px; display: inline-block; margin: 10px;">
                <img src="{{ asset('assets/svg/friends.svg') }}" alt="" style="width: 100px; height:100px">
            </div>
            <div class="cursor-pointer visibilitypicker" data-val="family"
                style="border-radius: 15px; display: inline-block; margin: 10px;">
                <img src="{{ asset('assets/svg/doit.svg') }}" alt="" style="width: 100px; height:100px">
            </div>
            <div class="cursor-pointer color-option"
                style="border-radius: 15px; display: inline-block; margin: 10px;">
                {{-- <img src="{{ asset('assets/svg/share2.svg') }}" alt="" style="width: 100px; height:100px"> --}}
                <button type="button" class="feed-btn"><svg width="45" height="35" viewBox="0 0 45 35"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.4237 1.27994C11.2734 0.93596 11.3491 0.535053 11.6144 0.269525C11.8798 0.00399709 12.2806 -0.071987 12.6247 0.0780205L32.5198 8.60371C32.8558 8.74733 33.0737 9.07749 33.0737 9.44286C33.0737 9.80823 32.8558 10.1384 32.5198 10.282L12.5964 18.7958C12.2541 18.9418 11.8573 18.8653 11.5939 18.6024C11.3304 18.3395 11.2529 17.943 11.3982 17.6003L14.2382 10.909C14.3751 10.5867 14.6843 10.3711 15.034 10.3541L17.2526 10.2455C17.7566 10.2488 18.1679 9.84285 18.1712 9.33882C18.1744 8.8348 17.7685 8.42355 17.2645 8.42027L14.9975 8.28247C14.6549 8.26141 14.353 8.04983 14.2163 7.73489L11.4237 1.27994Z"
                            fill="#4CD964" />
                        <path
                            d="M3.29583 32.5569C3.5305 32.6956 3.8345 32.8022 4.20783 32.8769C4.59183 32.9409 4.9865 32.9836 5.39183 33.0049C5.79717 33.0156 6.14917 33.0209 6.44783 33.0209C6.56517 33.0209 6.6985 33.0209 6.84783 33.0209C7.00783 33.0102 7.1465 33.0049 7.26383 33.0049C7.64783 32.9942 7.98383 32.9516 8.27183 32.8769C8.55983 32.7916 8.7785 32.6529 8.92783 32.4609C9.08783 32.2689 9.16783 31.9969 9.16783 31.6449C9.16783 31.2076 9.0505 30.9249 8.81583 30.7969C8.59183 30.6689 8.26117 30.6049 7.82383 30.6049C7.6745 30.6049 7.5145 30.6049 7.34383 30.6049C7.17317 30.6049 6.97583 30.6049 6.75183 30.6049C6.5385 30.6049 6.28783 30.6049 5.99983 30.6049C5.67983 30.6049 5.35983 30.5889 5.03983 30.5569C4.71983 30.5249 4.43183 30.4556 4.17583 30.3489C3.91983 30.2316 3.71183 30.0502 3.55183 29.8049C3.39183 29.5489 3.31183 29.1916 3.31183 28.7329C3.31183 28.1996 3.40783 27.7782 3.59983 27.4689C3.79183 27.1596 4.0585 26.9356 4.39983 26.7969C4.75183 26.6476 5.15183 26.5516 5.59983 26.5089C6.0585 26.4662 6.55983 26.4449 7.10383 26.4449C7.42383 26.4449 7.77583 26.4502 8.15983 26.4609C8.54383 26.4716 8.91183 26.4982 9.26383 26.5409C9.61583 26.5729 9.88783 26.6316 10.0798 26.7169C10.3038 26.7382 10.4745 26.8076 10.5918 26.9249C10.7198 27.0316 10.7838 27.1702 10.7838 27.3409C10.7838 27.3729 10.7838 27.4262 10.7838 27.5009C10.7838 27.5756 10.7838 27.6449 10.7838 27.7089C10.7838 27.7729 10.7838 27.8209 10.7838 27.8529C10.6985 27.7462 10.5385 27.6662 10.3038 27.6129C10.0798 27.5489 9.82383 27.5009 9.53583 27.4689C9.24783 27.4369 8.96517 27.4156 8.68783 27.4049C8.42117 27.3836 8.19183 27.3729 7.99983 27.3729H6.91183C6.54917 27.3729 6.22383 27.4049 5.93583 27.4689C5.64783 27.5222 5.4185 27.6396 5.24783 27.8209C5.07717 27.9916 4.99183 28.2582 4.99183 28.6209C4.99183 28.8982 5.04517 29.1116 5.15183 29.2609C5.26917 29.3996 5.4345 29.4956 5.64783 29.5489C5.87183 29.5916 6.13317 29.6129 6.43183 29.6129C6.9225 29.6129 7.3385 29.6129 7.67983 29.6129C8.02117 29.6129 8.2825 29.6129 8.46383 29.6129C8.94383 29.6129 9.36517 29.6556 9.72783 29.7409C10.1012 29.8156 10.3892 29.9916 10.5918 30.2689C10.8052 30.5462 10.9118 30.9836 10.9118 31.5809C10.9118 32.1462 10.7892 32.5996 10.5438 32.9409C10.2985 33.2716 9.9625 33.5116 9.53583 33.6609C9.10917 33.7996 8.6185 33.8849 8.06383 33.9169C7.73317 33.9382 7.41317 33.9489 7.10383 33.9489C6.7945 33.9596 6.46917 33.9596 6.12783 33.9489C5.8185 33.9489 5.4985 33.9382 5.16783 33.9169C4.83717 33.8956 4.52783 33.8582 4.23983 33.8049C3.9625 33.7409 3.73317 33.6556 3.55183 33.5489C3.38117 33.4422 3.29583 33.2982 3.29583 33.1169V32.5569ZM13.0936 33.8689C12.8376 33.8689 12.6722 33.8316 12.5976 33.7569C12.5336 33.6822 12.5016 33.5276 12.5016 33.2929V25.8049H14.0056V27.6929C14.1336 27.6502 14.2989 27.6182 14.5016 27.5969C14.7149 27.5649 14.9389 27.5382 15.1736 27.5169C15.4189 27.4956 15.6429 27.4849 15.8456 27.4849C16.5176 27.4849 17.0509 27.5436 17.4456 27.6609C17.8402 27.7782 18.1336 27.9542 18.3256 28.1889C18.5282 28.4129 18.6616 28.6956 18.7256 29.0369C18.7896 29.3782 18.8216 29.7836 18.8216 30.2529V33.1329C18.8216 33.3462 18.8002 33.5062 18.7576 33.6129C18.7256 33.7196 18.6616 33.7889 18.5656 33.8209C18.4696 33.8529 18.3256 33.8689 18.1336 33.8689H17.3496V29.9649C17.3496 29.4849 17.2856 29.1222 17.1576 28.8769C17.0296 28.6316 16.8322 28.4662 16.5656 28.3809C16.3096 28.2849 15.9842 28.2369 15.5896 28.2369C15.4402 28.2369 15.2589 28.2476 15.0456 28.2689C14.8429 28.2796 14.6456 28.3009 14.4536 28.3329C14.2722 28.3542 14.1229 28.3916 14.0056 28.4449V33.8689H13.0936ZM23.398 33.9649C22.7366 33.9649 22.198 33.9329 21.782 33.8689C21.366 33.8156 21.046 33.7142 20.822 33.5649C20.598 33.4156 20.4433 33.2129 20.358 32.9569C20.2833 32.7009 20.246 32.3809 20.246 31.9969C20.246 31.4529 20.3046 31.0422 20.422 30.7649C20.55 30.4769 20.7633 30.2796 21.062 30.1729C21.3713 30.0662 21.782 30.0129 22.294 30.0129C22.5606 30.0129 22.854 30.0182 23.174 30.0289C23.5046 30.0396 23.8193 30.0556 24.118 30.0769C24.4273 30.0876 24.694 30.1036 24.918 30.1249C25.1526 30.1462 25.3073 30.1729 25.382 30.2049C25.382 29.7569 25.3446 29.4049 25.27 29.1489C25.1953 28.8929 25.0726 28.7009 24.902 28.5729C24.742 28.4449 24.5393 28.3596 24.294 28.3169C24.0486 28.2742 23.7606 28.2529 23.43 28.2529C23.0673 28.2529 22.7046 28.2636 22.342 28.2849C21.99 28.3062 21.654 28.3436 21.334 28.3969C21.0246 28.4502 20.7686 28.5196 20.566 28.6049V28.3009C20.566 28.0556 20.63 27.8796 20.758 27.7729C20.8966 27.6662 21.062 27.5969 21.254 27.5649C21.4673 27.5116 21.782 27.4689 22.198 27.4369C22.614 27.4049 23.0566 27.3942 23.526 27.4049C24.1233 27.4049 24.63 27.4369 25.046 27.5009C25.4726 27.5542 25.814 27.6716 26.07 27.8529C26.3366 28.0342 26.5286 28.3062 26.646 28.6689C26.774 29.0316 26.838 29.5169 26.838 30.1249V33.3889C26.742 33.5916 26.4166 33.7409 25.862 33.8369C25.3073 33.9222 24.486 33.9649 23.398 33.9649ZM23.398 33.2929C23.8246 33.2929 24.1713 33.2822 24.438 33.2609C24.7153 33.2289 24.9286 33.1916 25.078 33.1489C25.2273 33.0956 25.3286 33.0316 25.382 32.9569V30.7489C25.286 30.7169 25.1153 30.6902 24.87 30.6689C24.6246 30.6369 24.3686 30.6102 24.102 30.5889C23.8353 30.5676 23.6113 30.5569 23.43 30.5569C23.0353 30.5569 22.7153 30.5836 22.47 30.6369C22.2246 30.6902 22.0486 30.8129 21.942 31.0049C21.8353 31.1969 21.782 31.4956 21.782 31.9009C21.782 32.2316 21.8193 32.4982 21.894 32.7009C21.9686 32.9036 22.118 33.0529 22.342 33.1489C22.5766 33.2449 22.9286 33.2929 23.398 33.2929ZM29.9903 33.8689H28.9663C28.8063 33.8689 28.6837 33.8262 28.5983 33.7409C28.513 33.6556 28.4703 33.4956 28.4703 33.2609V27.8049C28.7263 27.7302 29.0837 27.6502 29.5423 27.5649C30.001 27.4796 30.5503 27.4369 31.1903 27.4369C31.8197 27.4369 32.3157 27.4796 32.6783 27.5649C33.041 27.6396 33.3077 27.7569 33.4783 27.9169C33.6597 28.0662 33.7717 28.2529 33.8143 28.4769C33.8677 28.6902 33.8943 28.9409 33.8943 29.2289H32.4543L32.4383 29.0049C32.4383 28.7489 32.369 28.5676 32.2303 28.4609C32.1023 28.3436 31.9477 28.2689 31.7663 28.2369C31.585 28.2049 31.4037 28.1889 31.2223 28.1889C30.945 28.1889 30.6943 28.2156 30.4703 28.2689C30.257 28.3222 30.097 28.3916 29.9903 28.4769V33.8689ZM38.2481 33.9649C37.5974 33.9649 37.0481 33.9222 36.6001 33.8369C36.1627 33.7516 35.8107 33.5916 35.5441 33.3569C35.2881 33.1222 35.1067 32.7969 35.0001 32.3809C34.8934 31.9649 34.8401 31.4262 34.8401 30.7649C34.8401 29.9756 34.9414 29.3356 35.1441 28.8449C35.3467 28.3542 35.7041 27.9969 36.2161 27.7729C36.7387 27.5382 37.4641 27.4209 38.3921 27.4209C39.1174 27.4209 39.6934 27.5116 40.1201 27.6929C40.5574 27.8636 40.8721 28.1356 41.0641 28.5089C41.2561 28.8822 41.3521 29.3569 41.3521 29.9329V30.9569H36.8561C36.8561 30.7862 36.8934 30.6476 36.9681 30.5409C37.0427 30.4342 37.1814 30.3809 37.3841 30.3809H40.0081L39.9921 29.9649C39.9814 29.3676 39.8534 28.9302 39.6081 28.6529C39.3734 28.3756 38.9467 28.2369 38.3281 28.2369C37.8161 28.2369 37.4161 28.3169 37.1281 28.4769C36.8401 28.6369 36.6374 28.8982 36.5201 29.2609C36.4027 29.6129 36.3441 30.1036 36.3441 30.7329C36.3441 31.3836 36.4081 31.8796 36.5361 32.2209C36.6747 32.5516 36.8987 32.7756 37.2081 32.8929C37.5281 33.0102 37.9707 33.0689 38.5361 33.0689C38.7387 33.0689 38.9734 33.0636 39.2401 33.0529C39.5174 33.0422 39.7947 33.0262 40.0721 33.0049C40.3601 32.9836 40.6161 32.9569 40.8401 32.9249C41.0641 32.8929 41.2134 32.8609 41.2881 32.8289V33.0529C41.2881 33.1702 41.2614 33.2876 41.2081 33.4049C41.1547 33.5222 41.0427 33.6182 40.8721 33.6929C40.6481 33.7996 40.3174 33.8689 39.8801 33.9009C39.4534 33.9436 38.9094 33.9649 38.2481 33.9649Z"
                            fill="#1C274C" fill-opacity="0.6" />
                    </svg>
                </button>
            </div>
        </center>
    </div>
    </div>
    {{-- <hr style="width: 131px;margin: auto;margin-top:20px"> --}}
    <input type="hidden" name="feed_type" id="feed_type" value="share_text">
    <div style="padding:0px 0.5rem;">
    <div style="border-radius:10px 10px 0px 0px; background-color:white;" class="d-flex mt-3">
        <div class="d-flex justify-content-center align-items-center mt-3">
            <label>
                <img src="{{ asset('assets/svg/select.svg') }}" alt="">
            </label>
        </div>
    </div>
    <div class="fonts-selector"
        style="background-color:white; padding-left: 20px; padding-right: 20px; border-radius: 0px 0px 10px 10px;">
        <!-- Share Text -->
        <div class="cursor-pointer ary" data-sharetext="#shahretext" data-val="share_text"
            style="width: 100px; height: 100px; border-radius: 15px; display: inline-block; margin: 18px;">
            <img src="{{ asset('assets/svg/select1.svg') }}" alt="" style="width: 100px; height:100px;">
        </div>
        <!-- Share Image -->
        <div class="cursor-pointer ary" data-sharetext="#shahreimage" data-val="share_image"
            style="width: 100px; height: 100px; border-radius: 15px; display: inline-block; margin: 18px;">
            <img src="{{ asset('assets/svg/select5.svg') }}" alt="" style="width: 100px; height:100px;">
        </div>
        <!-- Share Video -->
        <div class="cursor-pointer ary" data-sharetext="#shahrevideo" data-val="share_video"
            style="width: 100px; height: 100px; border-radius: 15px; display: inline-block; margin: 18px;">
            <img src="{{ asset('assets/svg/videos.svg') }}" alt="" style="width: 100px; height:100px;">
        </div>
        <!-- Another Option -->
        <div class="cursor-pointer color-option" data-sharetext="#shahreother" data-val="share_other"
            style="width: 100px; height: 100px; border-radius: 15px; display: inline-block; margin: 18px;">
            <img src="{{ asset('assets/svg/select4.svg') }}" alt="" style="width: 100px; height:100px;">
        </div>
    </div>
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
