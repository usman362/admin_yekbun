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

    .btn-close {
        position: fixed !important;
        right: -10px !important;
        top: 50px !important;
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
        background-color: #eaeaea;
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
        border: 2px solid #000;
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
</style>

<div id="shahretext" class="share-content">
    <div style="padding:0px 2.75rem;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div style="background-image:url('{{ asset('assets/img/hand.png') }}');height: 240px; width: 119%;margin-top:-28px;margin-left:-44px; background-size: 100% 100%;background-repeat: no-repeat;"
                class="carousel-inner" id="feed-text-background">
                <div class="carousel-item active">
                    <h2 style="font-size:28px;color:whitesmoke;margin-top:20px;text-align:center;" class="">User
                        Text Will be then <br> showed here</h2>
                </div>
            </div>
        </div>
    </div>

    <!--add-->
    <hr style="    width: 131px;
    margin: auto;margin-top:20px;">

    <div style="padding:0px 2.75rem;">
        <div style="background: #eaeaea;border-radius:5px 5px 0px 0px;" class="d-flex mt-3">
            <div class="d-flex justify-content-center align-items-center mt-3"> <i style="font-size:4px;color:gray"
                    class="fa fa-circle p-1"></i>
                <label>Select Feed Background</label>
                <i style="font-size:4px;color:gray" class="fa fa-circle p-1"></i>
            </div>
        </div>

        <div style="padding:10px !important;background-color:#eaeaea;border-radius:0px 0px 5px 5px;" id="owl-example"
            class="owl-carousel">
            @php
                $bgs = \App\Models\BackgroundFeed::all();
            @endphp
            @foreach ($bgs as $bg)
                <a href="javascript:void(0)" class="feed-bg" data-url="{{ asset('storage/' . $bg->image) }}"><img
                        class="clickborder" style="height:55px;width:82px;padding: 0px 12px;"
                        src="{{ asset('storage/' . $bg->image) }}" alt=""></a>
            @endforeach
        </div>
        <input type="hidden" name="feed_background_image" value="{{ asset('assets/img/hand.png') }}"
            id="feed_background_image">
        <input type="hidden" name="feed_text_color" value="black" id="feed_text_color">
        <hr style="width: 131px;
    margin: auto;margin-top:20px;">
        <div style="background: #eaeaea;border-radius:5px 5px 0px 0px;" class="d-flex  align-items-center pt-3 mt-3"> <i
                style="font-size:4px;color:gray" class="fa fa-circle p-1"></i>
            <label>Select Font Color</label>
            <i style="font-size:4px;color:gray" class="fa fa-circle p-1"></i>
        </div>

        <!--add color select-->
        <div class="color-selector">
            <div class="cursor-pointer color-option" style="background:black" data-color="black"></div>
            <div class="cursor-pointer color-option" style="background:pink" data-color="pink"></div>
            <div class="cursor-pointer color-option" style="background:blue" data-color="blue"></div>
            <div class="cursor-pointer color-option" style="background:green" data-color="green"></div>
            <div class="cursor-pointer color-option" style="background:white" data-color="white"></div>
            <div class="cursor-pointer color-option" style="background:red" data-color="red"></div>
            <div class="cursor-pointer color-option" style="background:skyblue" data-color="skyblue"></div>
        </div>
    </div>
</div>

<!--share image-->
<div id="shahreimage" class="share-content">
    <div class="shareimage">
        <div style="margin-top:-28px;" id="image11new" class="image-contentnew">

            <div style="margin-top: -36px;" class="w-100">
                <input style="border-radius:20px;" name="file1" type="file" class="dropify" data-height="250"
                    data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
            </div>
            <!--code-->
        </div>
        <!--image 1 end-->

        <div style="margin-top:-28px;width:105%;" id="image22new"
            class="col-sm-12 image-contentnew row  justify-content-around  justify-content-center">
            <!--2 image 1st tab-->
            <div class="row image-changecontentimage p-0" id="imagechangeone1new">
                <div style="padding-right:0px;" class="col-sm-6 customborderradiustopleft">
                    <input name="file1" type="file" class="dropify" data-height="150"
                        data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                </div>

                <div style="padding-left:0px;" class="col-sm-6 customborderradiustopleft">
                    <input name="file1" type="file" class="dropify" data-height="150"
                        data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                </div>
            </div>
            <!--2 image 1st tab-->
            <!--2 image second tab-->
            <div class="row image-changecontentimage p-0" id="imagechangeone2new">

                <div class="col-sm-12">
                    <input name="file1" type="file" class="dropify" data-height="100"
                        data-default-file="{{ asset('assets/img/banner2.jpg') }}" />
                </div>
                <div class="col-sm-12">
                    <input name="file1" type="file" class="dropify" data-height="100"
                        data-default-file="{{ asset('assets/img/banner2.jpg') }}" />
                </div>
            </div>

            <!--2 image second tab-->


            <hr style="width: 131px;margin: auto;margin-top:20px;">

            <!--</div> -->
            <div style="padding:0px 2.75rem;">
                <div style="margin-left:5px;margin-top:20px;" class="row pick-content d-flex justify-content-around">
                    <div style="width:33.3%" class="carousel-inner ">
                        <h6 style="text-align:center;">Modern</h6>

                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/thanks3.png') }}"
                            data-original="{{ asset('assets/img/thanks3.png') }}"
                            data-default="{{ asset('assets/img/colorimage.PNG') }}" width="80" height="80"
                            class="carousel-inner grid_change imagechangeclassimageone"
                            data-imagechangeimageone="#imagechangeone1new" data-value="modern"></object>

                    </div>

                    <div style="width:33.3%" class="carousel-inner  ">
                        <h6 style="text-align:center;">Elegant</h6>

                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/thanks2.png') }}"
                            data-original="{{ asset('assets/img/thanks2.png') }}"
                            data-default="{{ asset('assets/img/thanks2 (1).png') }}" width="80" height="80"
                            class="carousel-inner grid_change imagechange2 imagechangeclassimageone"
                            data-imagechangeimageone="#imagechangeone2new" data-value="elegant"></object>

                    </div>
                </div>
            </div>
        </div>

        <!--3 image new-->
        <!--3 image new-->
        <div style="margin-top:-28px;margin-left:-1px;" style="display:contents;" id="image33new"
            class="col-sm-12 image-contentnew row ">

            <!--3 image 1st tab-->
            <div class="col-sm-12 image-changecontent2new" id="imagechangetwo1new">
                <div style="padding:0px;width:105%;margin-left:-12px;margin-top:-9px;" class="col-sm-12 ">
                    <input name="file1" type="file" class="dropify" data-height="100"
                        data-default-file="{{ asset('assets/img/banner2.jpg') }}" />
                    <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                </div>

                <div class="row">
                    <div style="padding:0px;" class="col-sm-6 ">
                        <input name="file1" type="file" class="dropify" data-height="90"
                            data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                        <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                        <!--</div>-->
                    </div>
                    <div style="padding:0px;" class="col-sm-6 ">
                        <input name="file1" type="file" class="dropify" data-height="90"
                            data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                        <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <!--3 image 1st tab-->


            <!--3 image 2nd tab-->

            <div style="padding:0px;" class="col-sm-12 image-changecontent2new" id="imagechangetwo2new">
                <div style="padding:0px;" class="col-sm-12 ">
                    <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                    <div class="row">
                        <div style="padding:0px;" class="col-sm-8">
                            <input name="file1" type="file" class="dropify" data-height="170"
                                data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                        </div>
                        <div style="padding:0px;margin-left:-12px;" class="col-sm-4">
                            <div class="col-sm-12">
                                <input name="file1" type="file" class="dropify" data-height="80"
                                    data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                            </div>
                            <div class="col-sm-12">
                                <input name="file1" type="file" class="dropify" data-height="80"
                                    data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div>
                <hr style="width: 131px;margin: auto;margin-top:20px;">
                <div style="padding:0px 2.75rem;">
                    <div style="margin-left:5px;margin-top:20px;"
                        class="row pick-content d-flex justify-content-around">
                        <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                            data-imagetwo="#image22new">
                            <h6 style="text-align:center;">Modern</h6>

                            <object style="height:80px;width:80px;margin:auto;display:flex;"
                                data="{{ asset('assets/img/three3.png') }}"
                                data-original2="{{ asset('assets/img/three3.png') }}"
                                data-default2="{{ asset('assets/img/threedef1.png') }}" width="80"
                                height="80" class="carousel-inner grid_change imagechangetwo2image"
                                data-imagechangetwoimage="#imagechangetwo1new" data-value="modern"></object>
                        </div>


                        <div style="width:33.3%" class="carousel-inner brchg imagepicker "
                            data-imagetwo="#image33new">
                            <h6 style="text-align:center;">Elegant</h6>

                            <object style="height:80px;width:80px;margin:auto;display:flex;"
                                data="{{ asset('assets/img/three3(2).png') }}"
                                data-original2="{{ asset('assets/img/three3(2).png') }}"
                                data-default2="{{ asset('assets/img/threedef2.png') }}" width="80"
                                height="80" class="carousel-inner grid_change imagechangetwo2image"
                                data-imagechangetwoimage="#imagechangetwo2new" data-value="elegant"></object>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display:contents;" id="image44new" class="col-sm-12 image-contentnew row  ">
            <!--four tab 1-->
            <div style="margin-top:-28px;padding:0px" class="imagecontentfournew" id="imagecontentfour1new">
                <div class="d-flex flex-wrap ">
                    <div style="padding:0px;width:50%" class="">
                        <input name="file1" type="file" class="dropify" data-height="80"
                            data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                    </div>
                    <div style="padding:0px;width:50%" class="">
                        <input name="file1" type="file" class="dropify" data-height="120"
                            data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                    </div>
                    <div style="width:50%;padding:0px;margin-top:-41px;" class="">
                        <input name="file1" type="file" class="dropify" data-height="120"
                            data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                    </div>
                    <div style="width:50%;padding:0px;margin-top:0px;" class="">
                        <input name="file1" type="file" class="dropify" data-height="80"
                            data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                    </div>

                </div>
            </div>
            <!--four tab 1-->

            <!--four tab 2-->
            <div style="margin-top:-38px;padding:0px" class="imagecontentfournew" id="imagecontentfour2new">
                <div style="padding:10px;" class="col-sm-12 ">
                    <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                    <div class="row">
                        <div style="padding:0px;" class="col-sm-8 ">
                            <input name="file1" type="file" class="dropify" data-height="175"
                                data-default-file="{{ asset('assets/img/spiderman.jpg') }}" />
                        </div>
                        <div style="padding:0px;" class="col-sm-4 ">
                            <div class="col-sm-12 ">
                                <input name="file1" type="file" class="dropify" data-height="50"
                                    data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                            </div>
                            <div class="col-sm-12 ">
                                <input name="file1" type="file" class="dropify" data-height="50"
                                    data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                            </div>
                            <div class="col-sm-12 ">
                                <input name="file1" type="file" class="dropify" data-height="50"
                                    data-default-file="{{ asset('assets/img/spidercurve.jpg') }}" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--four tab 2-->

            <hr style="width: 131px;
      margin: auto;margin-top:20px;">

            <div style="padding:0px 2.75rem;">
                <div style="margin-left:5px;margin-top:20px;" class="row pick-content d-flex justify-content-around">
                    <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                        <h6 style="text-align:center;">Modern</h6>
                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/four4.png') }}"
                            data-original3="{{ asset('assets/img/four4.png') }}"
                            data-default3="{{ asset('assets/img/fourdef2.png') }}" width="80" height="80"
                            class="carousel-inner grid_change imagechangefourclass"
                            data-contentfour2new="#imagecontentfour1new" data-value="modern"></object>
                    </div>

                    <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                        <h6 style="text-align:center;">Elegant</h6>
                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/four4(4).png') }}"
                            data-original3="{{ asset('assets/img/four4(4).png') }}"
                            data-default3="{{ asset('assets/img/fourdef1.png') }}" width="80" height="80"
                            class="carousel-inner imagechangefourclass grid_change"
                            data-contentfour2new="#imagecontentfour2new" data-value="elegant"></object>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding:0px 2.75rem;">
        <div style="border-radius:5px 5px 5px 5px;" class="d-flex justify-content-start mt-5 ">

            <div style="width:-webkit-fill-available;" class="">
                <div style="width:-webkit-fill-available;" class="btn-group" role="group"
                    aria-label="Basic example">
                    <label for="one_image"
                        class="btn btn-label-secondary btn btn-outline-secondary imgqtypicker active" data-imagetabs="#image11new">
                        <input type="radio" class="form-check-input" name="image_qty" value="one_image"
                            id="one_image" checked />1 Image</label>
                    <label for="two_image" class="btn btn-label-secondary btn btn-outline-secondary imgqtypicker" data-imagetabs="#image22new">
                        <input type="radio" class="form-check-input" name="image_qty" value="two_image"
                            id="two_image" />2 Image</label>
                    <label for="three_image" class="btn btn-label-secondary  btn btn-outline-secondary imgqtypicker" data-imagetabs="#image33new">
                        <input type="radio" class="form-check-input" name="image_qty" value="three_image"
                            id="three_image" />3 Image</label>
                    <label for="four_image" class="btn btn-label-secondary  btn btn-outline-secondary imgqtypicker" data-imagetabs="#image44new">
                        <input type="radio" class="form-check-input" name="image_qty" value="four_image"
                            id="four_image" />4+ Image</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!--share image-->
<div id="shahrevideo" class="share-content">


    <!-- Main container -->
    <div style="margin-top:-38px;" id="video11" class="video-content1">

        <!-- File input and button -->
        <input type="file" hidden id="videoupl">


        <!-- Video player -->
        <div style="height: 310px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat; position: relative;"
            class="carousel-inner videoclass">
            <video controls class="videoclass videohoverclass">
                <source src="{{ asset('assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
            </video>

            <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                id="videohover" class="videohover">
                <a style="top:5px;padding:8px;" href="javascript:void(0)"
                    class="btn btn-primary text-nowrap upload-btn">
                    <label for="videoupl" class="">Remove
                        <!--<i class="fa fa-upload"></i>-->
                    </label>
                </a>
                <p>Drag and drop or click to replace</p>
            </div>
        </div>
    </div>

    <div style="margin-top:-28px;" id="video22" class="col-sm-12 video-content1 row  justify-content-center">
        <!--2 image 1st tab-->
        <div style="margin-left:14px;padding:0px" class="row video-changecontent" id="videochangeone1">
            <div style="padding: 0px 0px 0px 0px;" class="col-sm-6 ">
                <div style="height: 150px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                    class="carousel-inner">


                    <input type="file" hidden id="videoupl2one">

                    <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                        controls="" class="videoclass2one videohoverclass">
                        <source src="{{ asset('assets/img/straight.mp4') }}">
                    </video>
                    <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                        id="videohover2one" class="videohover">
                        <a style="top:5px;padding:8px;" href="javascript:void(0)"
                            class="btn btn-primary text-nowrap upload-btn">
                            <label for="videoupl2one" class="">Remove
                                <!--<i class="fa fa-upload"></i>-->
                            </label>
                        </a>
                        <p>Drag and drop or click to replace</p>
                    </div>
                </div>

            </div>
            <div style="padding: 0px 0px 0px 0px;" class="col-sm-6">
                <div style="height: 150px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                    class="carousel-inner">
                    <input type="file" hidden id="videoupl2two">

                    <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                        controls="" class="videoclass2two videohoverclass">
                        <source src="{{ asset('assets/img/straight.mp4') }}">
                    </video>

                    <!--c-->
                    <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                        id="videohover2two" class="videohover">
                        <a style="top:5px;padding:8px;" href="javascript:void(0)"
                            class="btn btn-primary text-nowrap upload-btn">
                            <label for="videoupl2two" class="">Remove
                            </label>
                        </a>
                        <p>Drag and drop or click to replace</p>
                    </div>

                    <!--c-->

                </div>
            </div>
        </div>
        <div style="margin-left:14px;padding:0px" class="row video-changecontent" id="videochangeone2">

            <div style="padding: 0px 0px 0px 0px;" class="col-sm-12">
                <div style="height: 315px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                    class="carousel-inner">

                    <input type="file" hidden id="videoupl22one">


                    <video style="position:relative;" controls="" class="videoclass22one videohoverclass">
                        <source src="{{ asset('assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
                    </video>
                    <!--c-->
                    <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                        id="videohover2twoone" class="videohover">
                        <a style="top:5px;padding:8px;" href="javascript:void(0)"
                            class="btn btn-primary text-nowrap upload-btn">
                            <label for="videoupl22one" class="">Remove
                                <!--<i class="fa fa-upload"></i>-->
                            </label>
                        </a>
                        <p>Drag and drop or click to replace</p>
                    </div>

                    <!--c-->

                </div>
            </div>
            <div style="padding:0px" class="col-sm-12">
                <div style="height: 315px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                    class="carousel-inner">

                    <input type="file" hidden id="videoupl22two">

                    <video style="position:relative;" controls="" class="videoclass22two videohoverclass">
                        <source src="{{ asset('assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
                    </video>
                    <!--c-->
                    <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                        id="videohover2twotwo" class="videohover">
                        <a style="top:5px;padding:8px;" href="javascript:void(0)"
                            class="btn btn-primary text-nowrap upload-btn">
                            <label for="videoupl22two" class="">Remove
                            </label>
                        </a>
                        <p>Drag and drop or click to replace</p>
                    </div>
                </div>
            </div>
        </div>

        <hr style="width: 131px;
  margin: auto;margin-top:20px;">
        <div style="padding:0px 2.75rem;">
            <div style="margin-left:5px;margin-top:20px;" class="row pick-content d-flex justify-content-around">

                <div style="width:33.3%" class="carousel-inner ">
                    <h6 style="text-align:center;">Modern</h6>
                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                        data="{{ asset('assets/img/thanks3.png') }}"
                        data-original="{{ asset('assets/img/thanks3.png') }}"
                        data-default="{{ asset('assets/img/colorimage.PNG') }}" width="80" height="80"
                        class="carousel-inner grid_change videochangeclass" data-videochange="#videochangeone1" data-value="modern"></object>

                </div>

                <div style="width:33.3%" class="carousel-inner  ">
                    <h6 style="text-align:center;">Elegant</h6>
                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                        data="{{ asset('assets/img/thanks2.png') }}"
                        data-original="{{ asset('assets/img/thanks2.png') }}"
                        data-default="{{ asset('assets/img/thanks2 (1).png') }}" width="80" height="80"
                        class="carousel-inner grid_change videochangeclass" data-videochange="#videochangeone2" data-value="elegant"></object>
                </div>
            </div>
        </div>
    </div>
    <!--video 2-->
    <div style="display:contents;" id="video33" class="col-sm-12 video-content1 row  ">

        <!--3 image 1st tab-->
        <div style="padding:0px;" class="video-container">
            <div style="margin-top:-40px;padding:0px;" class="col-sm-12 video-changecontent2" id="videochangetwo1">
                <div class="col-sm-12 ">
                    <div style="height: 315px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                        class="carousel-inner">
                        <input type="file" hidden id="videoupl31one">
                        <video style="position:relative;" controls="" class="videoclass31one videohoverclass">
                            <source src="{{ asset('/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
                        </video>
                        <!--c-->
                        <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                            id="videohover3onetwo" class="videohover">
                            <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                class="btn btn-primary text-nowrap upload-btn">
                                <label for="videoupl31one" class="">Remove
                                    <!--<i class="fa fa-upload"></i>-->
                                </label>
                            </a>
                            <p>Drag and drop or click to replace</p>
                        </div>

                        <!--c-->
                    </div>
                    <!--<input name="file1" type="file" class="dropify" data-height="100" data-default-file="{{ asset('assets/img/hand.png') }}" />-->
                    <!-- <div  style="background-image:url('{{ asset('assets/img/jamunda.png') }}');height: 250px; width: 100%; background-size: 100% 100%;background-repeat: no-repeat;" class="carousel-inner">-->
                </div>

                <div class="row">
                    <div style="padding:0px;" class="col-sm-6 ">
                        <!--<input name="file1" type="file" class="dropify" data-height="100" data-default-file="{{ asset('assets/img/hand.png') }}" />-->
                        <div style=" width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                            class="carousel-inner">
                            <input type="file" hidden id="videoupl31two">

                            <video style="position:relative;" controls="" class="videoclass31two videohoverclass">
                                <source
                                    src="{{ asset('/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
                            </video>

                            <!--c-->
                            <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;height:95%;"
                                id="videohover3oneone" class="videohover">
                                <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                    class="btn btn-primary text-nowrap upload-btn">
                                    <label for="videoupl31two" class="">Remove
                                        <!--<i class="fa fa-upload"></i>-->
                                    </label>
                                </a>
                                <p>Drag and drop or click to replace</p>
                            </div>

                            <!--c-->

                        </div>
                    </div>
                    <div style="padding:0px;" class="col-sm-6 ">

                        <div style="width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                            class="carousel-inner">
                            <input type="file" hidden id="videoupl31three">

                            <video style="position:relative;" controls=""
                                class="videoclass videoclass31three videohoverclass">
                                <source
                                    src="{{ asset('/assets/img/pexels-pressmaster-3195394-3840x2160-25fps_2.mp4') }}">
                            </video>
                            <!--c-->
                            <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;height:95%;"
                                id="videohover3onethree" class="videohover">
                                <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                    class="btn btn-primary text-nowrap upload-btn">
                                    <label for="videoupl31three" class="">Remove
                                        <!--<i class="fa fa-upload"></i>-->
                                    </label>
                                </a>
                                <p>Drag and drop or click to replace</p>
                            </div>

                            <!--c-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--3 image 1st tab-->

        <!--3 image 2nd tab-->
        <div style="padding:0px;margin-top:-40px" class="col-sm-12 video-changecontent2" id="videochangetwo2">
            <div style="padding:0px;" class="col-sm-12 ">
                <div class="row">
                    <div style="padding: 0px 0px 0px 0px;" class="col-sm-8">
                        <div style="height: 200px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                            class="carousel-inner">
                            <input type="file" hidden id="videoupl32one">

                            <video
                                style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                controls="" class="videoclass videoclass32one videohoverclass">
                                <source src="{{ asset('assets/img/straight.mp4') }}">
                            </video>
                            <!--c-->
                            <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                id="videohover3twoone" class="videohover">
                                <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                    class="btn btn-primary text-nowrap upload-btn">
                                    <label for="videoupl32one" class="">Remove
                                    </label>
                                </a>
                                <p>Drag and drop or click to replace</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 0px;" class="col-sm-4">
                        <div class="col-sm-12">
                            <div style="height: 100px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                                class="carousel-inner">
                                <input type="file" hidden id="videoupl32two">

                                <video
                                    style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                    controls="" class="videoclass videoclass32two videohoverclass">
                                    <source src="{{ asset('assets/img/straight.mp4') }}">
                                </video>
                                <!--c-->
                                <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                    id="videohover3twotwo" class="videohover">
                                    <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                        class="btn btn-primary text-nowrap upload-btn">
                                        <label for="videoupl32two" class="">Remove
                                            <!--<i class="fa fa-upload"></i>-->
                                        </label>
                                    </a>
                                    <p>Drag and drop or click to replace</p>
                                </div>

                                <!--c-->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div style="height: 100px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                                class="carousel-inner">
                                <input type="file" hidden id="videoupl32three">

                                <video style="height:-webkit-fill-available;width:-webkit-fill-available"
                                    controls="" class="videoclass videoclass32three videohoverclass">
                                    <source src="{{ asset('assets/img/straight.mp4') }}">
                                </video>
                                <!--c-->
                                <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                    id="videohover3twothree" class="videohover">
                                    <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                        class="btn btn-primary text-nowrap upload-btn">
                                        <label for="videoupl32three" class="">Remove
                                        </label>
                                    </a>
                                    <p>Drag and drop or click to replace</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--3 image 2nd tab-->
        <div>
            <hr style="width: 131px;margin: auto;margin-top:20px;">
            <div style="padding:0px 2.75rem;">
                <div style="margin-left:5px;margin-top:20px;" class="row pick-content d-flex justify-content-around">
                    <div style="width:33.3%" class="carousel-inner brchg imagepicker " data-imagetwo="#image22new">
                        <h6 style="text-align:center;">Modern</h6>
                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/three3.png') }}"
                            data-original2="{{ asset('assets/img/three3.png') }}"
                            data-default2="{{ asset('assets/img/threedef1.png') }}" width="80" height="80"
                            class="carousel-inner grid_change videochangetwo2" data-videochangetwo="#videochangetwo1" data-value="modern"></object>
                    </div>
                    <div style="width:33.3%" class="carousel-inner brchg imagepicker " data-imagetwo="#image33new">
                        <h6 style="text-align:center;">Elegant</h6>
                        <object style="height:80px;width:80px;margin:auto;display:flex;"
                            data="{{ asset('assets/img/three3(2).png') }}"
                            data-original2="{{ asset('assets/img/three3(2).png') }}"
                            data-default2="{{ asset('assets/img/threedef2.png') }}" width="80" height="80"
                            class="carousel-inner grid_change videochangetwo2" data-videochangetwo="#videochangetwo2" data-value="elegant"></object>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--video 3-->

    <!--video 4-->

    <div style="margin-top:-28px;" id="video44" class="col-sm-12 video-content1 row  ">
        <!--four tab 1-->
        <div style="margin-left:13px;padding:0px" class="videocontentfour" id="videocontentfour1">
            <div class="d-flex flex-wrap ">
                <div style="padding:0px;width:50%">
                    <div style="height: 90px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                        class="carousel-inner">
                        <input type="file" hidden id="videoupl41one">
                        <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                            controls="" class="videoclass videoclass41one videohoverclass">
                            <source src="{{ asset('assets/img/straight.mp4') }}">
                        </video>
                        <!--c-->
                        <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                            id="videohover4oneone" class="videohover">
                            <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                class="btn btn-primary text-nowrap upload-btn">
                                <label for="videoupl41one" class="">Remove
                                </label>
                            </a>
                            <p>Drag and drop or click to replace</p>
                        </div>
                    </div>
                </div>
                <div style="padding:0px;width:50%">
                    <div style="height: 150px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                        class="carousel-inner">
                        <input type="file" hidden id="videoupl41two">
                        <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                            controls="" class="videoclass videoclass41two videohoverclass">
                            <source src="{{ asset('assets/img/straight.mp4') }}">
                        </video>
                        <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                            id="videohover4onetwo" class="videohover">
                            <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                class="btn btn-primary text-nowrap upload-btn">
                                <label for="videoupl41two" class="">Remove
                                </label>
                            </a>
                            <p>Drag and drop or click to replace</p>
                        </div>
                    </div>
                </div>
                <div style="width:50%;padding:0px;margin-top:-60px;">
                    <div style="height: 150px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                        class="carousel-inner">
                        <input type="file" hidden id="videoupl41three">

                        <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                            controls="" class="videoclass videoclass41three videohoverclass">
                            <source src="{{ asset('assets/img/straight.mp4') }}">
                        </video>
                        <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                            id="videohover4onethree" class="videohover">
                            <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                class="btn btn-primary text-nowrap upload-btn">
                                <label for="videoupl41three" class="">Remove
                                </label>
                            </a>
                            <p>Drag and drop or click to replace</p>
                        </div>
                    </div>
                </div>
                <div style="width:50%;padding:0px;">
                    <div style="height: 90px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                        class="carousel-inner">
                        <input type="file" hidden id="videoupl41four">

                        <video style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                            controls="" class="videoclass videoclass41four videohoverclass">
                            <source src="{{ asset('assets/img/straight.mp4') }}">
                        </video>
                        <!--c-->
                        <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                            id="videohover4onefour" class="videohover">
                            <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                class="btn btn-primary text-nowrap upload-btn">
                                <label for="videoupl41four" class="">Remove
                                </label>
                            </a>
                            <p>Drag and drop or click to replace</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--four tab 1-->

        <!--four tab 2-->
        <div class="videocontentfour" id="videocontentfour2">
            <div style="padding:0px;margin-left:14px;" class="col-sm-12 ">
                <div class="row">
                    <div style="padding: 0px 0px 0px 0px;" class="col-sm-8">
                        <div style="height: 300px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;"
                            class="carousel-inner">
                            <input type="file" hidden id="videoupl42one">
                            <video
                                style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                controls="" class="videoclass videoclass42one videohoverclass">
                                <source src="{{ asset('assets/img/straight.mp4') }}">
                            </video>
                            <!--c-->
                            <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                id="videohover42one" class="videohover">
                                <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                    class="btn btn-primary text-nowrap upload-btn">
                                    <label for="videoupl42one" class="">Remove
                                    </label>
                                </a>
                                <p>Drag and drop or click to replace</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 0px 0px 0px 0px;" class="col-sm-4">
                        <div style="padding: 0px 0px 0px 0px;" class="col-sm-12">
                            <div style="height: 100px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat"
                                class="carousel-inner">
                                <input type="file" hidden id="videoupl42two">

                                <video
                                    style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                    controls="" class="videoclass videoclass42two videohoverclass">
                                    <source src="{{ asset('assets/img/straight.mp4') }}">
                                </video>
                                <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                    id="videohover42two" class="videohover">
                                    <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                        class="btn btn-primary text-nowrap upload-btn">
                                        <label for="videoupl42two" class="">Remove
                                        </label>
                                    </a>
                                    <p>Drag and drop or click to replace</p>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px 0px 0px 0px;" class="col-sm-12">
                            <div style="height: 100px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat"
                                class="carousel-inner">
                                <input type="file" hidden id="videoupl42three">

                                <video
                                    style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                    controls="" class="videoclass videoclass42three videohoverclass">
                                    <source src="{{ asset('assets/img/straight.mp4') }}">
                                </video>
                                <!--c-->
                                <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                    id="videohover42three" class="videohover">
                                    <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                        class="btn btn-primary text-nowrap upload-btn">
                                        <label for="videoupl42three" class="">Remove
                                        </label>
                                    </a>
                                    <p>Drag and drop or click to replace</p>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px 0px 0px 0px;" class="col-sm-12">
                            <div style="height: 100px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat"
                                class="carousel-inner">
                                <input type="file" hidden id="videoupl42four">

                                <video
                                    style="height:-webkit-fill-available;width:-webkit-fill-available;position:relative;"
                                    controls="" class="videoclass videoclass42four videohoverclass">
                                    <source src="{{ asset('assets/img/straight.mp4') }}">
                                </video>
                                <!--c-->
                                <div style="background: #0000006e;color: white;position:absolute;top:0;display: flex;align-items: center;justify-content: center;height:100%;width:100%;text-align:center;visibility:hidden;"
                                    id="videohover42four" class="videohover">
                                    <a style="top:5px;padding:8px;" href="javascript:void(0)"
                                        class="btn btn-primary text-nowrap upload-btn">
                                        <label for="videoupl42four" class="">Remove
                                            <!--<i class="fa fa-upload"></i>-->
                                        </label>
                                    </a>
                                    <p>Drag and drop or click to replace</p>
                                </div>
                                <!--c-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--four tab 2-->

        <hr style="width: 131px;margin: auto;margin-top:20px;">
        <div style="padding:0px 2.75rem;">
            <div style="margin-left:5px;margin-top:20px;" class="row pick-content d-flex justify-content-around">
                <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                    <h6 style="text-align:center;">Modern</h6>
                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                        data="{{ asset('assets/img/four4.png') }}"
                        data-original3="{{ asset('assets/img/four4.png') }}"
                        data-default3="{{ asset('assets/img/fourdef2.png') }}" width="80" height="80"
                        class="carousel-inner grid_change videochangefour" data-contentfour2="#videocontentfour1" data-value="modern"></object>
                </div>
                <div style="width:33.3%" class="carousel-inner brchg imagepicker ">
                    <h6 style="text-align:center;">Elegant</h6>
                    <object style="height:80px;width:80px;margin:auto;display:flex;"
                        data="{{ asset('assets/img/four4(4).png') }}"
                        data-original3="{{ asset('assets/img/four4(4).png') }}"
                        data-default3="{{ asset('assets/img/fourdef1.png') }}" width="80" height="80"
                        class="carousel-inner grid_change videochangefour" data-contentfour2="#videocontentfour2" data-value="elegant"></object>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="grid_style" id="feed_grid_style" value="modern">
    <!--video 4-->
    <hr style="width: 131px;margin: auto;margin-top:20px;">
    <div style="padding:0px 2.75rem;">
        <div style="border-radius:5px 5px 5px 5px;" class="d-flex justify-content-start mt-5 ">

            <div style="width:-webkit-fill-available;" class="">
                <div style="width:-webkit-fill-available;" class="btn-group" role="group"
                    aria-label="Basic example">
                    <label for="one_video"
                        class="btn btn-label-secondary btn btn-outline-secondary videoa videopicker active" data-videoone="#video1" data-videotwo="#video11">
                        <input type="radio" class="form-check-input" name="video_qty" value="one_video"
                            id="one_video" checked />1 Video</label>
                    <label for="two_video" class="btn btn-label-secondary btn btn-outline-secondary videoa videopicker" data-videoone="#video2" data-videotwo="#video22">
                        <input type="radio" class="form-check-input" name="video_qty" value="two_video"
                            id="two_video" />2 Videos</label>
                    <label for="three_video"
                        class="btn btn-label-secondary  btn btn-outline-secondary videoa videopicker" data-videoone="#video3" data-videotwo="#video33">
                        <input type="radio" class="form-check-input" name="video_qty" value="three_video"
                            id="three_video" />3 Videos</label>
                    <label for="four_video" class="btn btn-label-secondary  btn btn-outline-secondary videoa videopicker" data-videoone="#video4" data-videotwo="#video44">
                        <input type="radio" class="form-check-input" name="video_qty" value="four_video"
                            id="four_video" />4+ Videos</label>
                </div>
            </div>
        </div>
    </div>
    <!--add code-->
</div>
<div style="padding:0px 2.75rem;">
    <hr style="width: 131px;margin: auto;margin-top:20px">
    <div style="background: #eaeaea;border-radius:5px 5px 0px 0px;" class="d-flex mt-3  ">
        <input style="height: 90px;" type="text" class="form-control w-100" placeholder="Enter The description">
    </div>
</div>
<hr style="width: 131px;margin: auto;margin-top:20px;">
<div style="padding:0px 2.75rem;">
    <div style="border-radius:5px 5px 5px 5px;" class="d-flex justify-content-start mt-5 ">

        <div style="width:-webkit-fill-available;" class="">
            <div style="width:-webkit-fill-available;" class="btn-group" role="group" aria-label="Basic example">
                <label for="all" class="btn btn-label-secondary btn btn-outline-secondary usertypepicker active">
                    <input type="radio" class="form-check-input" name="user_type" value="all" id="all"
                        checked />All</label>
                <label for="standard" class="btn btn-label-secondary btn btn-outline-secondary usertypepicker">
                    <input type="radio" class="form-check-input" name="user_type" value="standard"
                        id="standard" />Standard</label>
                <label for="premium" class="btn btn-label-secondary  btn btn-outline-secondary usertypepicker">
                    <input type="radio" class="form-check-input" name="user_type" value="premium"
                        id="premium" />Premium</label>
                <label for="vip" class="btn btn-label-secondary  btn btn-outline-secondary usertypepicker">
                    <input type="radio" class="form-check-input" name="user_type" value="vip"
                        id="vip" />VIP</label>
            </div>
        </div>
    </div>
</div>
<hr style="width: 131px;margin: auto;margin-top:20px">

<div style="padding:0px 2.75rem;">
    <div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups">
        <div style="width:100%;padding:10px;" class="btn-group ary" role="group" aria-label="First group">

            <label for="share_text" data-sharetext="#shahretext"
                class="btn btn-label-secondary btn btn-outline-secondary geo ary active active">
                <input type="radio" class="form-check-input" name="feed_type" value="share_text" id="share_text"
                    checked />Share Text</label>
            <label for="share_image" data-sharetext="#shahreimage"
                class="btn btn-label-secondary btn btn-outline-secondary geo shareimage ary">
                <input type="radio" class="form-check-input" name="feed_type" value="share_image"
                    id="share_image" />Share Image</label>
            <label for="share_video" data-sharetext="#shahrevideo"
                class="btn btn-label-secondary  btn btn-outline-secondary geo ary">
                <input type="radio" class="form-check-input" name="feed_type" value="share_video"
                    id="share_video" />Share
                Video</label>
        </div>
    </div>
</div>

<div style="padding:10px;" class="col-md-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-label-primary">
        Submit
    </button>
</div>

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
            })
        });
    </script>
@endpush
