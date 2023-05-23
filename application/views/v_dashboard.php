    <div class="page-content">

        <div class="card card-style">
            <div class="card mb-0 rounded-0 bg-24" data-card-height="250" style="background-image: url(<?php echo $master_path.'events/'.$events[0]->banner_img; ?>);">
            </div>
            <div class="content">
                <p class="font-14 mb-3 text-center">
                    <?php echo $events[0]->singkat; ?><br/>
                    <?php if($events[0]->tanggal_mulai == $events[0]->tanggal_selesai) { echo strftime("%d %B %Y", strtotime($events[0]->tanggal_mulai)); } else { echo strftime("%d %B %Y", strtotime($events[0]->tanggal_mulai)).' - '.strftime("%d %B %Y", strtotime($events[0]->tanggal_selesai)); } ?>
                </p>
                <div class="">
                <a href="<?php echo base_url('event/detail/'.$events[0]->id.'/'.url_title($events[0]->nama)); ?>" class="btn btn-m btn-center-l rounded-sm bg-red-dark mb-3 font-700 scale-box">Event Detail</a>
            </div>
            </div>
           
        </div>

        <div class="divider divider-margins"></div>

      
        <div>
            <img src="<?php echo base_url('images/undraw_quality_time_wiyl.png'); ?>" style="width: 100%;" />
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