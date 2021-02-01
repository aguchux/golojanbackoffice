<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $assets ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

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

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <img src="<?= $assets ?>img/logo-icon.png" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">

    <form action="/auth/forms/splash" method="POST">
                    <?= $Self->tokenize() ?>
                    <div class="section">
                        <div class="splash-page mb-5 text-center">
                            <h1 class="mb-3"><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"></h1>
                            <h1 class="mb-2">Golojan BackOffice<br /><small><small>Network, Sales & Payments</small></small></h1>
                            <h4 class="text-muted">De-Golojan Technologies Ltd</h4>
                            <span class="GOLOJAN_device_status text-center text-muted"> <span> Connecting... </span> </span>
                        </div>
                    </div>
                    <div class="fixed-bar">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block ajax" id="splash">Sign in</button>
                            </div>
                        </div>
                    </div>
                </form>

    </div>
    <!-- * App Capsule -->


    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?= $assets ?>js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?= $assets ?>js/lib/popper.min.js"></script>
    <script src="<?= $assets ?>js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?= $assets ?>js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Offline Js File -->
    <script src="<?= $assets ?>js/lib/offline.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= $assets ?>js/base.js"></script>


</body>

</html>