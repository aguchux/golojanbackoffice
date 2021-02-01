<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $assets ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

    <meta name="description" content="">
    <meta name="keywords" content="" />

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


</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= $assets ?>img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="<?= $assets ?>img/logo.png" alt="logo" class="logo">
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">0</span>
            </a>
            <a href="app-settings.html" class="headerButton">
                <img src="<?= $assets ?>img/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                <span class="badge badge-danger">0</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->