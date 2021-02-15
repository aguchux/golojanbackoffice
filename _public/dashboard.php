<?php



$Route->add('/dashboard', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");
    $Core->Relocation($accid);
    $Template->assign("menukey", "dashboard");
    $Template->render("dashboard.{$root}.dashboard");
}, 'GET');


$Route->add('/spill', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");


    $spill = $Core->getSpillover(12000);
    $Template->debug($spill);
}, 'GET');



$Route->add('/locations/setup', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Locations = $Core->Locations();
    $Template->assign("Locations", $Locations);

    $Template->assign("menukey", "locations");
    $Template->render("dashboard.setlocation");
}, 'GET');




$Route->add('/dashboard/{root}/switch', function ($root) {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;

    $accid = $Template->storage("accid");
    $Core->SetUserInfo($accid, "root", $root);

    $Template->redirect("/dashboard");
}, 'GET');



$Route->add('/dashboard/locations/{location}/switch', function ($location) {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Core->SetUserInfo($accid, "location", $location);
    $Template->redirect("/dashboard");
}, 'GET');


$Route->add('/dashboard/{page}', function ($page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "{$page}");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    if ($page == "support") {
        $ListFAQs = $Core->ListFAQs();
        $Template->assign("ListFAQs", $ListFAQs);
    } elseif ($page == "accounts") {
        $PaystackBanking = new Apps\PaystackBanking(paystack_secrete_live);
        $ListBankers = json_decode($PaystackBanking->getBanks());
        $ListBankers = $ListBankers->data;
        $Template->assign("ListBankers", $ListBankers);
        $Bankers = $Core->Bankers($accid);
        $Template->assign("Bankers", $Bankers);

    } elseif ($page == "locations") {
        $this_user = $Core->UserInfo($accid);
        $Locations = $Core->Locations();
        $Template->assign("Locations", $Locations);
    } elseif ($page == "stories") {
        $this_user = $Core->UserInfo($accid);
        $Stories = $Core->Stories($this_user->level);
        $Template->assign("Stories", $Stories);
    } elseif ($page == "tutorials") {
        $ListVideos = $Core->ListVideos();
        $Template->assign("ListVideos", $ListVideos);
    }

    $Template->render("dashboard.{$page}");
}, 'GET');







$Route->add('/dasboard/tutorials/{vid}/learn', function ($vid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Template->assign("VideoInfo", $Core->VideoInfo($vid));
    $Template->assign("menukey", "tutorials");
    $Template->render("dashboard.tutorials_learn");
}, 'GET');
