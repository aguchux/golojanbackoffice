<?php

$UserInfo = $Core->UserInfo($Self->data['accid']);
$Wallet = $Core->Wallet($Self->data['accid']);
$StoreInfo = $Core->StoreInfo($Self->data['accid']);
$LevelInfo = $Core->LevelInfo($UserInfo->level);
$LocationInfo = $Core->LocationInfo($UserInfo->location);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $assets ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= $assets ?>css/daterangepicker.css">

    <?php if (isset($editproduct)) : ?>
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <?php endif; ?>

    <link rel="stylesheet" href="<?= $assets ?>css/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />

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
        <div class="spinner-grow text-white" role="status"></div>
    </div>
    <!-- * loader -->


    <?php if ($menukey == "dashboard") : ?>
        <!-- App Header -->
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                    <ion-icon name="menu-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle text-center pt-4 pb-1">
                <h1 class="text-white text-center" style="line-height: 0.5em;"><img src="./_store/flags/<?= "{$LocationInfo->flag}.png" ?>" class="imaged rounded w36 mt-n2 p-0 mr-1"><?= "{$UserInfo->accid}" ?><br /><small class="text-white" style="font-size: 40%;"><?= "{$LevelInfo->name}" ?></small></h1>
            </div>
            <div class="right">
                <a href="/dashboard/notifications" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">0</span>
                </a>
                <a href="/dashboard/profile" class="headerButton">
                    <img src="<?= $UserInfo->avatar ?>" class="imaged w32" id="UserInfoAvatarTop">
                </a>
            </div>
        </div>
        <!-- * App Header -->
    <?php else : ?>
        <!-- App Header -->
        <div class="appHeader">
            <div class="left">
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">
                <?= isset($heading) ? $heading : strtoupper($menukey) ?>
            </div>
            <div class="right">
                <a href="#" class="headerButton">
                    <img src="<?= $UserInfo->avatar ?>" class="imaged w32" id="UserInfoAvatarTop">
                </a>
            </div>
        </div>
        <!-- * App Header -->
    <?php endif; ?>


    <!-- App Capsule -->
    <div id="appCapsule">