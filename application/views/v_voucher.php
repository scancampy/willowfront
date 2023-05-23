<div class="page-content">

    <?php if(count($voucher) == 0) { ?>
        <div>
            <img style="width:100%;" src="<?php echo base_url('images/undraw_friends_r511.png'); ?>" />
        </div>
        <div class="card card-style bg-gray-dark">
            <div class="content">
                <h1 class="color-white">No Voucher Yet</h1>
                <p class="color-white opacity-60">
                    You do not have a voucher yet. Please scan the tenant's QR code and get a chance to get vouchers during the event.
                </p>
            </div>
        </div>
        <div class="divider divider-margins"></div>
    <?php } ?>
        <?php foreach($voucher as $key => $value) { ?>
        <div class="card card-style  <?php if($value->physical_claimed_date != null) { ?>bg-gray-light<?php } ?>">
            <?php if($value->voucher_image != '') { ?><div class="card mb-0 bg-6" data-card-height="150"  style="height: 150px; background-image:url('<?php echo $master_path.'voucher/'.$value->voucher_image; ?>'); "></div><?php } ?>
            
            <div class="content mt-3 ">
                <p class="color-highlight font-500 mb-n1"><?php echo $value->nama; ?> 
                <?php if($value->is_read == 0) { ?><span class="badge bg-transparent border border-blue-dark color-blue-dark ms-2">NEW</span><?php } ?></p>
                <h1><?php echo $value->code; ?></h1>
            
                <p class="mb-3">
                    <?php echo $value->highlight; ?>
                </p>

                <?php if($value->physical_claimed_date != null) { ?>
                <strong class="mb-3 color-red-dark">This voucher has been traded on <?php echo strftime("%d %B %Y", strtotime($value->physical_claimed_date)); ?></strong>
                <?php } ?>
                            
                <div class="col-6 float-end mt-3">
                    <a href="<?php echo base_url('voucher/detail/'.$value->code); ?>" class="btn btn-border btn-m btn-full  rounded-sm text-uppercase font-900 border-gray-dark color-gray-dark bg-theme">Details</a>
                </div>
            </div>
        </div>
    <?php } ?>

       
    </div>
    <!-- Page content ends here-->
