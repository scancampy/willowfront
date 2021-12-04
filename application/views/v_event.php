<div class="page-content">
        <div class="card card-style">
            <div class="card mb-0 rounded-0 bg-24" data-card-height="250" style="background-image: url(<?php echo $master_path.'events/'.$event[0]->banner_img; ?>);">
            </div>
            <div class="content">
                <h1 class="font-30 font-800"><?php echo $event[0]->nama; ?></h1>
                <p class="font-14 mb-3">
                    <?php echo $event[0]->deskripsi; ?>
                </p>
                <p class="opacity-80">
                    <i class="fa icon-30 text-center fa-star pe-2"></i><?php echo $event[0]->nama; ?>

                    <?php if(strtotime(date('Y-m-d h:i:s')) >= strtotime($event[0]->tanggal_mulai) && strtotime(date('Y-m-d h:i:s')) <= strtotime($event[0]->tanggal_selesai)) { ?>
                    <span class="badge bg-transparent border border-red-dark color-red-dark ms-2">ONGOING EVENT</span>
                    <?php } ?>
                    <br>
                    <i class="fa icon-30 text-center fa-calendar pe-2"></i>
                    <?php if($event[0]->tanggal_mulai == $event[0]->tanggal_selesai) { echo strftime("%d %B %Y", strtotime($event[0]->tanggal_mulai)); } else { echo strftime("%d %B %Y", strtotime($event[0]->tanggal_mulai)).' - '.strftime("%d %B %Y", strtotime($event[0]->tanggal_selesai)); } ?>
                </p>

            </div>
        </div>
        <?php if(count($tenants) > 0) { ?>
        <div class="card card-style">
            <div class="content">
                <h1>Registered Tenants</h1>
                <?php foreach($tenants as $key => $value) { 
                    if($key != 0) { ?><div class="divider mb-3"></div><?php }
                    ?>
                <div class="d-flex mb-3">
                    <div class="w-100 pe-3">
                        <h5><?php echo $value->nama; ?></h5>
                        <p>
                            <?php echo $value->deskripsi; ?>
                        </p>    
                    </div>
                    <div class="me-auto">
                        <img src="<?php echo $master_path.'tenant/'.$value->logo; ?>" width="100" class="rounded-s"> 
                    </div>
                </div>                
                <?php } ?>
            </div>
        </div>
    <?php } ?>


        <div data-menu-load="<?php echo base_url('menu-footer.html'); ?>"></div>
    </div>
    <!-- Page content ends here-->
