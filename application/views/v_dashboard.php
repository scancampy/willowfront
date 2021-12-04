    <div class="page-content">

        <div class="splide single-slider slider-no-arrows visible-slider slider-no-dots" id="single-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                   
                    <?php foreach($events as $key => $value) { ?>
                        
                    <div class="splide__slide">
                         <a href="<?php echo base_url('event/detail/'.$value->id.'/'.url_title($value->nama)); ?>">
                         <?php if($value->banner_img != '') { ?>
                        <div class="card card-style ms-3" style="background-image:url(<?php echo $master_path.'events/'.$value->banner_img; ?>);" data-card-height="300">
                        <?php } else { ?>
                        <div class="card card-style ms-3" style="background-image:url(images/pictures/1t.jpg);" data-card-height="300">
                        <?php } ?>
                            <div class="card-top px-3 py-3">
                               <!-- <a href="#" data-menu="menu-heart" class="bg-white rounded-sm icon icon-xs float-end"><i class="fa fa-heart color-red-dark"></i></a> -->
                                <!--<a href="#" class="bg-white color-black rounded-sm btn btn-xs float-start font-700 font-12">View Event</a>-->
                            </div>
                            <div class="card-bottom px-3 py-3">
                                <h1 class="color-white"><?php echo $value->nama; ?></h1>
                                <div class="divider bg-white opacity-20 mb-3"></div>
                                <!--<div class="d-flex">
                                    <div class="align-self-center">
                                        <img src="images/pictures/6s.jpg" class="rounded-xl border border-dark-light"  width="25">
                                        <img src="images/pictures/9s.jpg" class="rounded-xl border border-dark-light ms-n3" width="25">
                                        <img src="images/pictures/5s.jpg" class="rounded-xl border border-dark-light ms-n3" width="25">
                                        <img src="images/pictures/7s.jpg" class="rounded-xl border border-dark-light ms-n3" width="25">
                                        <img src="images/pictures/13s.jpg" class="rounded-xl border border-dark-light ms-n3" width="25">
                                    </div>
                                    <div class="align-self-center">
                                        <span class="ps-3 font-11 opacity-70 font-600 color-white">24k+ attending</span>
                                    </div>
                                </div>-->
                            </div>
                            <div class="card-overlay bg-gradient opacity-30"></div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                        </a>
                    </div>
                    
                    <?php } ?>
                
                </div>
            </div>
        </div>

        <div class="content mt-0 mb-0">
            <div class="d-flex">
                <div class="align-self-center">
                    <h1 class="mb-0 font-18">Events Near You</h1>
                </div>
                <div class="ms-auto align-self-center">
                    <a href="#" class="float-end font-12 font-400">See All</a>
                </div>
            </div>
        </div>

        <div class="splide double-slider visible-slider slider-no-arrows slider-no-dots ps-2" id="double-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="card m-2 card-style">
                            <img src="images/pictures/31t.jpg" class="img-fluid">
                            <div class="p-2 bg-theme rounded-sm">
                                <h4 class="font-14 line-height-s pb-1">Unplugged Live Guitar Session</h4>
                                <p class="font-10 mb-0"><i class="fa fa-map-marker color-red-dark pe-2"></i>5 Minutes Away</p>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card m-2 card-style">
                            <img src="images/pictures/6t.jpg" class="img-fluid">
                            <div class="p-2 bg-theme rounded-sm">
                                <h4 class="font-14 line-height-s pb-1">Neon Music Festival</h4>
                                <p class="font-10 mb-0"><i class="fa fa-map-marker color-red-dark pe-2"></i>15 Minutes Away</p>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card m-2 card-style">
                            <img src="images/pictures/20t.jpg" class="img-fluid">
                            <div class="p-2 bg-theme rounded-sm">
                                <h4 class="font-14 line-height-s pb-1">Karaoke Live Singing</h4>
                                <p class="font-10 mb-0"><i class="fa fa-map-marker color-red-dark pe-2"></i>25 Minutes Away</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mb-0">
            <div class="d-flex">
                <div class="align-self-center">
                    <h1 class="mb-0 font-18">Recommended by Us</h1>
                </div>
                <div class="ms-auto align-self-center">
                    <a href="#" class="float-end font-12 font-400">See All</a>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-6 pe-1">
                    <div class="card card-style mx-0" style="background-image:url(images/pictures/16t.jpg);" data-card-height="350">
                        <div class="card-bottom p-3">
                            <h2 class="color-white">Sports</h2>
                            <p class="color-white opacity-60 line-height-s">
                                Run, Lift. Bike. Show us what you can do.
                            </p>
                        </div>
                        <div class="card-overlay bg-gradient opacity-30"></div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-style mx-0 mb-2" style="background-image:url(images/pictures/24t.jpg);" data-card-height="170">
                        <div class="card-bottom p-3">
                            <h2 class="color-white">Parties</h2>
                            <p class="color-white opacity-60 line-height-s font-12">
                                Dance all Night.
                            </p>
                        </div>
                        <div class="card-overlay bg-gradient opacity-30"></div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                    <div class="card card-style mx-0 mb-0" style="background-image:url(images/pictures/29t.jpg);" data-card-height="170">
                        <div class="card-bottom p-3">
                            <h2 class="color-white">Concerts</h2>
                            <p class="color-white opacity-60 line-height-s font-12">
                                Sing your heart out!
                            </p>
                        </div>
                        <div class="card-overlay bg-gradient opacity-30"></div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mb-0">
            <div class="d-flex">
                <div class="align-self-center">
                    <h1 class="mb-0 font-18">Attended by your Friends</h1>
                </div>
                <div class="ms-auto align-self-center">
                    <a href="#" class="float-end font-12 font-400">See All</a>
                </div>
            </div>
        </div>

        <div class="splide double-slider visible-slider slider-no-arrows slider-no-dots ps-2" id="double-slider-3">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div data-card-height="160" class="card rounded-m m-2 shadow-l" style="background-image:url(images/pictures/3s.jpg)">
                            <div class="card-bottom mb-2">
                                <h5 class="color-white font-15 px-2 line-height-s pb-1">Running Marathon</h5>
                                <p class="color-white mb-0 mt-n2 font-11 opacity-50 px-2">John Attended</p>
                            </div>
                            <div class="card-overlay bg-gradient opacity-30"></div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div data-card-height="160" class="card rounded-m m-2 shadow-l" style="background-image:url(images/pictures/4s.jpg)">
                            <div class="card-bottom mb-2">
                                <h5 class="color-white font-15 px-2 line-height-s pb-1">Neon House Party Night</h5>
                                <p class="color-white mb-0 mt-n2 font-11 opacity-50 px-2">David Attended</p>
                            </div>
                            <div class="card-overlay bg-gradien opacity-30t"></div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div data-card-height="160" class="card rounded-m m-2 shadow-l" style="background-image:url(images/pictures/1s.jpg)">
                            <div class="card-bottom mb-2">
                                <h5 class="color-white font-15 px-2">Karaoke Live Singing Night</h5>
                                <p class="color-white mb-0 mt-n2 font-11 opacity-30 px-2">Alexandra Attended</p>
                            </div>
                            <div class="card-overlay bg-gradient opacity-30"></div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="notification-6" data-dismiss="notification-6" data-bs-delay="1500" data-bs-autohide="true" class="notification bg-red-dark shadow-xl opacity-95">
        <div class="toast-body color-white p-3">
            <h1 class="ms-0 ps-0 pb-2 mt-0 color-white">Invalid QR Code</h1>
            Please rescan the code or try with a new one.
        </div>
    </div>

     <div id="notification-7" data-dismiss="notification-7" data-bs-delay="1500" data-bs-autohide="true" class="notification bg-red-dark shadow-xl opacity-95">
        <div class="toast-body color-white p-3">
            <h1 class="ms-0 ps-0 pb-2 mt-0 color-white">Event not Found</h1>
            Please try again later.
        </div>
    </div>


    </div>
    <!-- Page content ends here-->