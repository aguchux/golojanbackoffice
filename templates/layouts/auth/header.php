<?php
if ($Self->auth) {
    $UserInfo = $Core->UserInfo($Self->data['accid']);
    $Wallet = $Core->Wallet($Self->data['accid']);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $assets ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= $assets ?>css/daterangepicker.css">
    <link rel="stylesheet" href="<?= $assets ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <!-- icons -->
    <link rel="shortcut icon" href="<?= "{$assets}" ?>img\icons\favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= "{$assets}" ?>img\icons\apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= "{$assets}" ?>img\icons\apple-touch-icon-180x180.png" />
    <!-- icons -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= $assets ?>img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <?php if ($Me->auth) : ?>
        <?php if ($menukey == "dashboard") : ?>
            <!-- App Header -->
            <div class="appHeader bg-primary text-light">
                <div class="left">
                    <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                        <ion-icon name="menu-outline"></ion-icon>
                    </a>
                </div>
                <div class="pageTitle">
                    <h1 class="text-white"><?= $UserInfo->accid ?></h1>
                </div>
                <div class="right">
                    <a href="#" class="headerButton">
                        <ion-icon class="icon" name="notifications-outline"></ion-icon>
                        <span class="badge badge-danger">0</span>
                    </a>
                    <a href="#" class="headerButton">
                        <img src="<?= $UserInfo->avatar ?>" class="imaged w32">
                        <span class="badge badge-danger">0</span>
                    </a>
                </div>
            </div>
            <!-- * App Header -->
        <?php else : ?>
            <!-- App Header -->
            <div class="appHeader">
                <div class="left">
                    <a href="#goBack" class="headerButton goBack">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </a>
                </div>
                <div class="pageTitle">
                    <?= isset($heading) ? $heading : strtoupper($menukey) ?>
                </div>
                <div class="right">
                    <a href="#" class="headerButton">
                        <ion-icon class="icon" name="notifications-outline"></ion-icon>
                        <span class="badge badge-danger">0</span>
                    </a>
                    <a href="#" class="headerButton">
                        <img src="<?= $UserInfo->avatar ?>" class="imaged w32">
                        <span class="badge badge-danger">0</span>
                    </a>
                </div>
            </div>
            <!-- * App Header -->
        <?php endif; ?>
    <?php else : ?>
        <!-- App Header -->
        <div class="appHeader no-border transparent position-absolute">
            <div class="left">
                <a href="#goBack" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle"></div>
            <div class="right">
            </div>
        </div>
        <!-- * App Header -->
    <?php endif; ?>


    <!-- App Capsule -->
    <div id="appCapsule">