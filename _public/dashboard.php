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
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "dashboard");
    $Template->assign("category", 0);
    $Template->render("dashboard.{$page}");
}, 'GET');

$Route->add('/dashboard/category/{catid}/marketplace', function ($catid) {
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("category", $catid);
    $Template->assign("menukey", "dashboard");
    $Template->render("dashboard.marketplace");
}, 'GET');

