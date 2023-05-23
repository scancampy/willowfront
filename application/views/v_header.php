<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Willow Baby & Kids Event</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slideunlock/iphone.theme.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slideunlock/slideToUnlock.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/style.css'); ?>">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/css/fontawesome-all.min.css'); ?>">
<link rel="manifest" href="<?php echo base_url('_manifest.json'); ?>" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('app/icons/icon-192x192.png'); ?>">



</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="<?php echo base_url('dashboard'); ?>" class="header-title">Welcome</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div id="footer-bar" class="footer-bar-6">

        <a href="<?php echo base_url('dashboard'); ?>" class="<?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "tenant"  || $this->uri->segment(1) == "event") { echo 'active-nav'; } ?>"><i class="fa fa-home"></i><span>Home</span></a>
        <a href="<?php echo base_url('voucher'); ?>" class="<?php if ($this->uri->segment(1) == "voucher") { echo 'active-nav'; } ?>"><i class="fa fa-ticket-alt"></i><span>Voucher</span>
            <?php if(@$unreadvoucher >0) { ?><em class="badge bg-highlight"><?php echo $unreadvoucher; ?></em><?php } ?></a>
        <a href="#" data-menu="menu-cookie-modal" id="btnscan" class="circle-nav "><i class="fa fa-qrcode"></i><span>Scan Now</span></a>
        <a href="<?php echo base_url('profile'); ?>" class="<?php if ($this->uri->segment(1) == "profile") { echo 'active-nav'; } ?>"><i class="fa fa-user"></i><span>Profile</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>

    <div class="page-title page-title-fixed">
        <h1><?php echo $judul; ?></h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>