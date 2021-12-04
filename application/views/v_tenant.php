<div class="page-content">


        <div class="card card-style">
            <div class="card mb-0 rounded-0 bg-24" data-card-height="250" style="background-image: url(<?php echo $master_path.'tenant/'.$detail[0]->logo; ?>);">
            </div>
            <div class="content">
                <h1 class="font-30 font-800"><?php echo $detail[0]->nama; ?></h1>
                <p class="font-14 mb-3">
                    <?php echo $detail[0]->deskripsi; ?>
                </p>
                <p class="opacity-80">
                    <i class="fa icon-30 text-center fa-star pe-2"></i><?php echo $events[0]->nama; ?> <span class="badge bg-transparent border border-red-dark color-red-dark ms-2">EVENT</span><br>
                    <i class="fa icon-30 text-center fa-calendar pe-2"></i>
                    <?php if($events[0]->tanggal_mulai == $events[0]->tanggal_selesai) { echo strftime("%d %B %Y", strtotime($events[0]->tanggal_mulai)); } else { echo strftime("%d %B %Y", strtotime($events[0]->tanggal_mulai)).' - '.strftime("%d %B %Y", strtotime($events[0]->tanggal_selesai)); } ?>
                </p>

                <a href="<?php echo $master_path.'tenant/'.$detail[0]->promo_pdf; ?>" target="_blank" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-900 shadow-s bg-blue-dark">Download Promo</a>

               
            </div>
        </div>

        <div class="card card-style">
            <div class="content">
                <h1 class="mb-n3">Just For You</h1>
                <div class="row mb-0 mt-n2">
                   <a href="#" class="btn btn-full btn-margins rounded-sm gradient-highlight font-14 font-600 btn-xl">Collect Voucher</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Page content ends here-->
