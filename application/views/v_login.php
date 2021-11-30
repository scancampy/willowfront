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
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">   
    <div class="page-content header-clear-medium">
        
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
                            <a href="page-forgot-1.html" class="color-highlight">Forgot Password?</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="page-signup-1.html" class="color-highlight">Create Account</a>
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
    
    
    
</div>

<script type="text/javascript" src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('scripts/custom.js'); ?>"></script>
</body>
