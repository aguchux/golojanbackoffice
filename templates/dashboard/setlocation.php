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
        <img src="<?= $assets ?>img/logo-icon.png" alt="Golojan.com" class="loading-icon">
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 px-4">
            <div class="row">
                <?php while ($location = mysqli_fetch_object($Locations)) : ?>
                    <div class="card col-12 col-sm-6 col-lg-3 col-md-3 col-xs-12 text-center m-2">
                        <div class="card">
                            <div class="card-body pt-3 pb-3">
                                <img src="./_store/flags/<?= "{$location->flag}.png" ?>" alt="<?= $location->location ?>" class="img-responsive img-rounded w-100">
                            </div>
                            <h4 class="card-footer h2"><a class="btn btn-primary btn-block btn-md" href="/dashboard/locations/<?= $location->id ?>/switch"> Switch to <?= $location->location ?></a></h4>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
    <!-- * App Capsule -->


    <!-- app footer -->
    <div class="appFooter d-none">
        <div class="footer-title">
            Copyright © Ebonyi State Government, 2020. All Rights Reserved.
        </div>
        Developed by <a href="#">Golojan</a>.
    </div>
    <!-- * app footer -->

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
    <script src="<?= $assets ?>js/jquery.mask.js"></script>
    <script src="<?= $assets ?>js/lib/offline.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous"></script>
    <!-- Base Js File -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="<?= $assets ?>js/bootstrap-select.min.js"></script>
    <script src="<?= $assets ?>js/daterangepicker.js"></script>
    <script src="<?= $assets ?>js/base.js"></script>

</body>

</html>