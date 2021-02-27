<?php


$Route->add('/dashboard/hunter/{page}', function ($page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $accid = $Template->storage("accid");

    $root = $Core->UserInfo($accid, "root");
    switch ($page) {
        case 'merchants':
            # code...
            $Template->assign("AdminListAccount", $Core->MerchantListAccounts($accid));
            break;
        case 'products':
            # code...
            $Template->assign("AdminListProducts", $Core->AdminListProducts($accid));
            break;
        case 'submissions':
            # code...
            $Template->assign("AdminListSubmissions", $Core->AdminListSubmissions());
            break;
        default:
            # code...
            break;
    }

    $Template->assign("menukey", "{$page}");
    $Template->render("dashboard.{$root}.{$page}");
    
}, 'GET');
