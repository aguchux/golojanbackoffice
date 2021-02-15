<?php


$Route->add('/dashboard/merchant/{page}', function ($root, $page) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Template->assign("MyProducts", $Core->MyProducts($accid));

    $Template->assign("menukey", "{$page}");
    
    $Template->render("dashboard.{$root}.{$page}");
}, 'GET');



$Route->add('/dashboard/merchant/category/{catid}/warehousing', function ($catid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $Template->assign("category", $catid);
    $Template->assign("Products", $Core->MyCategoryProducts($accid, $catid));

    $Template->assign("MyProducts", $Core->MyProducts($accid));
    $Template->assign("MyProducts", $Core->MyProducts($accid));

    $Template->assign("menukey", "warehousing");
    $Template->render("dashboard.{$root}.warehousing");
}, 'GET');





$Route->add('/merchants/sellitem', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $data = $Core->post($_POST);
    $array_of_uploaded_photos = $data->array_of_uploaded_photos;
    $photos = trim($array_of_uploaded_photos, ",");
    $photos = explode(",", $photos);
    $photo = $photos[array_rand($photos)];
    $photos = json_encode($photos);
    $main_category = $data->main_category;
    $sub_category = $data->sub_category;
    $title = $data->title;
    $description = $data->description;
    $enable_pos_sales = $data->enable_pos_sales;
    $bulkprice = $data->bulkprice;
    $retailprice = $data->retailprice;

    $added = $Core->MerchantAddProduct($accid, $title, $description, $main_category, $sub_category, $bulkprice, $retailprice, $photo, $photos, $enable_pos_sales);
    if ($added) {
        $Template->redirect("/dashboard/merchant/products");
    }
}, 'POST');
