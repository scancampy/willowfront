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

        <?php if($eligible['result'] == 'true') { ?>
        <form method="post" action="<?php echo current_url(); ?>">
            <div class="card card-style">
                <div class="content">
                    <h1 class="mb-n3">Chance to Win a Voucher</h1>
                    <br/>
                    <p class="font-14 mb-3">You have the opportunity to get a voucher. Click the button below, and good luck.</p>
                    <button type="submit" name="btncollect" value="collect" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-900 shadow-s bg-green-dark">Wish Me Luck</button>
                </div>
            </div>
            </form>
        <?php } else { ?>
<div class="card card-style">
                <div class="content">
                    <p class="font-14 mb-3 text-muted">
                        <?php if($eligible['msg'] == 'notinevent') { ?>The event has not started yet .
                        <?php } else if($eligible['msg'] == 'notactive') { ?>The event not yet active.
                        <?php } else if($eligible['msg'] == 'overquota') { ?>Unfortunately, the voucher quota has run out. Please try again tomorrow.
                        <?php } else if($eligible['msg'] == 'claimedtoday') { ?>You have already claimed the voucher on this tenant today. Please try again tomorrow.<?php } ?>
                        </p>
                </div>
            </div>
       <?php } ?>

    </div>
    <!-- Page content ends here-->

    
<?php if($this->session->flashdata('notif')) { ?>
    <div id="notification-6" data-dismiss="notification-6" data-bs-delay="3000" data-bs-autohide="true" class="notification <?php if($this->session->flashdata('notif') == 'success') { ?>bg-green-dark<?php } else { ?>bg-orange-dark<?php } ?> shadow-xl opacity-95">
        <div class="toast-body color-white p-3">
            <h1 class="ms-0 ps-0 pb-2 mt-0 color-white"><?php if($this->session->flashdata('notif') == 'success') { echo 'Success'; } else { echo 'Unlucky'; } ?></h1>
            <?php echo $this->session->flashdata('notif_msg'); ?>
        </div>
    </div>
<?php } ?>
