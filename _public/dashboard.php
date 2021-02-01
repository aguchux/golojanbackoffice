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
    $Template->render("dashboard.{$page}");
}, 'GET');

