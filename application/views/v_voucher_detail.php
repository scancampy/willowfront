<div class="page-content">

       <div class="card card-style">
            <?php if($voucher[0]->voucher_image != '') { ?><div class="card mb-0 bg-6" data-card-height="150"  style="height: 150px; background-image:url('<?php echo $master_path.'voucher/'.$voucher[0]->voucher_image; ?>'); "></div><?php } ?>
            
            <div class="content mt-3">
                <p class="color-highlight font-500 mb-n1"><?php echo $voucher[0]->nama; ?> 
                <?php if($voucher[0]->is_read == 0) { ?><span class="badge bg-transparent border border-blue-dark color-blue-dark ms-2">NEW</span><?php } ?></p>
                <h1><?php echo $voucher[0]->code; ?></h1>
            
                <p class="mb-3">
                    <?php echo $voucher[0]->deskripsi; ?>
                </p>
                <i class="fa icon-30 text-center fa-calendar pe-2"></i>
                    Collected on <?php echo strftime("%d %B %Y", strtotime($voucher[0]->digital_claimed_date));  ?>
            </div>
        </div>

        <div class="card card-style">
            <div class="content mt-3">
                <?php if($voucher[0]->physical_claimed_date == null) { ?>
                <p class="color-highlight font-500 mb-n1">This voucher is digitally collected.</p>

                <p class="mb-3">
                    Show this voucher to our staff to <span class="color-blue-light">trade it with an actual/physical voucher</span>. <br/><br/><span class="color-red-light">Warning:</span> only staff is allowed to swipe the trade button below. Accidental swipe is beyond our responsibility.
                </p>
                <p>
                    <div class="row mb-3" style="margin:10px;">
                    <div id="slider1" class="col-sm-5 slideToUnlock locked"> <div class="progressBar unlocked"></div><div class="text">Slide To Trade</div><div class="drag locked_handle ">  </div></div>
                  </div>
                </p>
                <?php } else { ?>
                    <p class="color-gray-dark font-500 mb-n1">You have had traded this voucher.</p>
                <?php } ?>
            </div>
        </div>

       
    </div>
    <!-- Page content ends here-->
