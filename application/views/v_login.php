<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>AppKit Mobile</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/style.css'); ?>">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/css/fontawesome-all.min.css'); ?>">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('app/icons/icon-192x192.png'); ?>">
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">   
    <div class="page-content header-clear-medium">
        <?php if($this->session->flashdata('login_notif')) { ?>
        <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl <?php if($this->session->flashdata('login_notif') == 'failed') { ?>bg-red-dark<?php } else { ?>bg-green-dark<?php } ?>" role="alert">
            <span><i class="fa fa-times color-white"></i></span>
            <strong class="color-white" style="display: block;"><?php echo $this->session->flashdata('login_msg'); ?></strong>
            <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
        <?php } ?>

        <div class="card card-style">
            <div class="content">
                <form method="post" action="<?php echo current_url(); ?>">
                    <div class="text-center">
                        <img src="<?php echo base_url('images/wil_clean.png'); ?>" />
                    </div>
                    <p class="text-center">
                        Enter your credentials below to sign into your account.
                    </p>
                    
                    
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control validate-name" id="form1a" placeholder="Email" name="email">
                        <label for="form1a" class="color-highlight">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"s></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-password" id="form1ab" name="password" placeholder="Password">
                        <label for="form1ab" class="color-highlight">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <button type="submit" value="submit" name="btnsubmit" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Sign In</button>
                    
                    <div class="row pt-3 mb-3">
                        <div class="col-6 text-start">
                            <a href="#" data-menu="menu-forgot" class="color-highlight">Forgot Password?</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="#" data-menu="menu-signup" class="color-highlight" >Create Account</a>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-facebook mt-4 rounded-s"><i class="fab fa-facebook-f text-center"></i>Sign In with Facebook</a>
                    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-twitter mt-2 rounded-s"><i class="fab fa-twitter text-center"></i>Sign In with Twitter</a>
                    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-dark-dark mt-2 rounded-s"><i class="fab fa-apple text-center"></i>Sign In with Apple</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Page content ends here-->

    <div id="menu-signup" 
         class="menu menu-box-modal rounded-m" 
         data-menu-height="450" 
         data-menu-width="350">
        <div class="menu-title">
            <p class="color-highlight">Join Now for Free</p>
            <h1 class="font-24">Sign Up</h1>
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content mb-0 mt-2">
            <form method="post" action="<?php echo current_url(); ?>">
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="text" class="form-control validate-name" required id="nama_customer" placeholder="Name" name="nama_customer">
                    <label for="nama_customer" class="color-highlight font-11 font-500">Name</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="email" required class="form-control validate-email" id="email_customer" placeholder="Email" name="email_customer">
                    <label for="email_customer" class="color-highlight font-11 font-500">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-phone"></i>
                    <input type="text" required class="form-control validate-text" id="no_hp" placeholder="HP" name="no_hp">
                    <label for="no_hp" class="color-highlight font-11 font-500">HP</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="password" required class="form-control validate-password" id="password_register" name="password_register" placeholder="Password">
                    <label for="password" class="color-highlight font-11 font-500">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="form-control validate-password" id="repassword" name="repassword" placeholder="Repeat Password">
                    <label for="repassword" class="color-highlight font-11 font-500">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <button type="submit" value="btnsubmitregister" name="btnsubmitregister" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-blue-dark mt-4">Register</button>
        </form>
        </div>
    </div>

    <div id="menu-forgot" 
         class="menu menu-box-modal rounded-m" 
         data-menu-height="220" 
         data-menu-width="350">
         <form method="post" action="<?php echo current_url(); ?>">
            <div class="menu-title">
                <p class="color-highlight">This action will change your password with a new one</p>
                <h1 class="font-24">Reset Password</h1>
                <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
            </div>

            <div class="content mt-1">
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="form-control validate-email" id="forgotemail" name="forgotemail" placeholder="Email">
                    <label for="forgotemail" class="color-highlight font-11 font-500">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <button type="submit" value="btnsubmitforgotpass" name="btnsubmitforgotpass" class="btn btn-full btn-m shadow-l rounded-s bg-highlight font-600 mt-4">CHANGE MY PASSWORD</button>
            </div>
        </form>
    </div> 
    
    
    
</div>

<script type="text/javascript" src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('scripts/custom.js'); ?>"></script>
</body>
