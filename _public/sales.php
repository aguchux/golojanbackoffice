<?php


$Route->add('/dashboard/sales/warehousing', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $Template->assign("category", 0);
    $Template->assign("Products", $Core->CategoryProducts(0));

    $Template->assign("menukey", "warehouse");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Template->render("dashboard.{$root}.warehousing");
}, 'GET');



$Route->add('/dashboard/sales/category/{catid}/warehousing', function ($catid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Template->assign("category", $catid);
    $Template->assign("Products", $Core->CategoryProducts($catid));
    $Template->assign("menukey", "marketplace");
    $Template->render("dashboard.{$root}.warehousing");
}, 'GET');
