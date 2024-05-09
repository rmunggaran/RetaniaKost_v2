<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title  -->
    <title>Retania | KOST</title>

    <!-- Favicon  -->
    <link href="<?php echo base_url() ?>public/Logo/SVG/Logo V!-1.svg" rel="icon">
    <link href="<?php echo base_url() ?>public/Logo/SVG/Logo V!-1.svg" rel="apple-touch-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/sona/css/style.css" type="text/css">

    <style>

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .modal button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal button.cancel {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>

<?php if (isset($notification)): ?>
    <div class="alert alert-success" role="alert">
        <?= $notification ?>
    </div>
<?php endif; ?>

    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=Kosan">Kosan</a></li>
                <li><a href="">About Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="<?= $fb['link'] ?>" target="_blank"><i class="fa fa-facebook fa-lg"> </i></a>
            <a href="<?= $ig['link'] ?>" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
        </div>
        <ul class="top-widget">
                <li><i class="fa fa-phone"></i> <?= $hp['link'] ?> </li>
                <li><i class="fa fa-envelope"></i> <?= $email['link']; ?></li>
        </ul>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> <?= $tlp['link'] ?> </li>
                            <li><i class="fa fa-envelope"></i> <?= $email['link']; ?></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="<?= $fb['link'] ?>" target="_blank"><i class="fa fa-facebook fa-lg"> </i></a>
                                <a href="<?= $ig['link'] ?>" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
                                <?php if ($this->session->userdata('admin_logged_in') || $this->session->userdata('user_logged_in')): ?>
                                    <?php if ($this->session->userdata('admin_logged_in')): ?>
                                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-outline-danger"> dashboard</a>
                                    <?php else : ?>
                                    <a href="<?= site_url('user'); ?>" class="btn btn-outline-danger"> dashboard</a>
                                    <?php endif ; ?>
                                <?php else: ?>
                                    <!-- Jika pengguna belum login -->
                                    <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-outline-danger">Login</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="<?php echo base_url() ?>public/logo/PNG/3xlogonew.png" width="200px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li <?= (uri_string() == 'index') ? 'class="active"' : '' ?>>
                                        <a href="/webkost/index">Home</a>
                                    </li>
                                    <li <?= (uri_string() == 'kosan') ? 'class="active"' : '' ?>>
                                        <a href="/webkost/kosan">Kosan</a>
                                    </li>
                                    <li <?= (uri_string() == 'about') ? 'class="active"' : '' ?>>
                                        <a href="/webkost/about">About Us</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->