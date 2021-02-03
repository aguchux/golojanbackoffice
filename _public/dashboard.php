<?php


$Route->add('/dashboard', function () {
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "dashboard");
    $Template->render("dashboard.dashboard");
}, 'GET');



$Route->add('/dashboard/{page}', function ($page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "{$page}");

    if($page=="support"){
        $ListFAQs = $Core->ListFAQs();
        $Template->assign("ListFAQs", $ListFAQs);
    }elseif($page=="tutorials"){
        $ListVideos = $Core->ListVideos();
        $Template->assign("ListVideos", $ListVideos);
    }

    $Template->assign("category", 0);
    $Template->assign("Products", $Core->CategoryProducts(0)); 
    $Template->render("dashboard.{$page}");
}, 'GET');



$Route->add('/dashboard/category/{catid}/marketplace', function ($catid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("category", $catid); 
    $Template->assign("Products", $Core->CategoryProducts($catid)); 
    $Template->assign("menukey", "marketplace");
    $Template->render("dashboard.marketplace");
}, 'GET');



$Route->add('/dasboard/tutorials/{vid}/learn', function ($vid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("VideoInfo", $Core->VideoInfo($vid));
    $Template->assign("menukey", "tutorials");
    $Template->render("dashboard.tutorials_learn");
}, 'GET');

