<div class="page-content">
    <div class="card card-style" style=" padding-bottom: 20px;">
        <div class="content mb-0">                    
            <form method="post" action="<?php echo current_url(); ?>">

            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="password" required name="oldpassword" id="oldpassword" class="form-control validate-password"  placeholder="Current Password">
                <label for="oldpassword" class="color-highlight">Current Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="divider divider-margins"></div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="password" required name="newpassword" id="newpassword" class="form-control validate-password"  placeholder="New Password">
                <label for="newpassword" class="color-highlight">New Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="password" required name="repeatpassword" id="repeatpassword" class="form-control validate-password"  placeholder="Repeat Password">
                <label for="repeatpassword" class="color-highlight">Repeat Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

                    
            
            
            <button type="submit" value="btnsubmitchangepassword" name="btnsubmitchangepassword" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-blue-dark mt-4">Change Password</button>
            
            
            </form>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('notif')) { ?>
    <div id="notification-6" data-dismiss="notification-6" data-bs-delay="3000" data-bs-autohide="true" class="notification <?php if($this->session->flashdata('notif') == 'success') { ?>bg-green-dark<?php } else { ?>bg-red-dark<?php } ?> shadow-xl opacity-95">
        <div class="toast-body color-white p-3">
            <h1 class="ms-0 ps-0 pb-2 mt-0 color-white"><?php if($this->session->flashdata('notif') == 'success') { echo 'Success'; } else { echo 'Failed'; } ?></h1>
            <?php echo $this->session->flashdata('notif_msg'); ?>
        </div>
    </div>
<?php } ?>