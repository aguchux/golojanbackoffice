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



$Route->add('/dashboard/merchant/products', function ($root, $page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");
    $Template->assign("MyProducts", $Core->MyProducts($accid));
    $Template->assign("menukey", "{$page}");
    $Template->render("dashboard.{$root}.products");
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





$Route->add('/dashboard/merchant/products/{pid}/add', function ($pid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $ProductInfo = $Core->ProductInfo($pid);
    $Template->assign("ProductInfo", $ProductInfo);
    $Template->assign("ProductFeatures", $Core->ProductFeatures($pid));

    $Photos = json_decode($ProductInfo->photos);
    $Template->assign("Photos", $Photos);
    $CountPhotos = count($Photos);
    $Template->assign("CountPhotos",  $CountPhotos);

    $Template->assign("editproduct",  true);

    $Template->assign("menukey", "Product: {$ProductInfo->id}");
    $Template->render("dashboard.{$root}.add-product");
}, 'GET');





$Route->add('/dashboard/merchant/products/{pid}/edit', function ($pid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $ProductInfo = $Core->ProductInfo($pid);
    $Template->assign("ProductInfo", $ProductInfo);
    $Template->assign("ProductFeatures", $Core->ProductFeatures($pid));

    $Photos = json_decode($ProductInfo->photos);

    //$Template->debug($Photos);

    $Template->assign("Photos", $Photos);
    $CountPhotos = count($Photos);
    $Template->assign("CountPhotos",  $CountPhotos);

    $Template->assign("ProductFeatures", $Core->ProductFeatures($pid));
    $Template->assign("editproduct",  true);

    $Template->assign("menukey", "Product: {$ProductInfo->id}");
    $Template->render("dashboard.{$root}.edit-product");
}, 'GET');




$Route->add('/dashboard/merchant/products/{pid}/submit', function ($pid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $ProductInfo = $Core->ProductInfo($pid);
    $Template->assign("ProductInfo", $ProductInfo);

    $Template->assign("menukey", "Product: {$ProductInfo->id}");
    $Template->render("dashboard.{$root}.submit-product");
}, 'GET');



$Route->add('/dashboard/merchant/products/{pid}/delete', function ($pid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $ProductInfo = $Core->ProductInfo($pid);
    $Template->assign("ProductInfo", $ProductInfo);
    $Template->assign("ProductFeatures", $Core->ProductFeatures($pid));

    $Photos = $ProductInfo->photos;
    $Photos = json_decode($Photos);
    $Template->assign("Photos", $Photos);

    $Template->assign("menukey", "Product: {$ProductInfo->id}");
    $Template->render("dashboard.{$root}.delete-product");
}, 'GET');



$Route->add('/merchants/sellitem', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $data = $Core->post($_POST);
    
    $main_category = $data->main_category;
    $sub_category = $data->sub_category;
    $category = $data->root_category;

    $title = $data->title;
    $description = $data->description;

    $bulkprice = $data->bulkprice;
    $retailprice = $data->retailprice;

    $is_used_product = 0;
    if (isset($data->is_used_product)) {
        $is_used_product = $data->is_used_product;
    }
    $enable_pos_sales = 0;
    if (isset($data->enable_pos_sales)) {
        $enable_pos_sales = $data->enable_pos_sales;
    }
    $charge_vat = 0;
    if (isset($data->charge_vat)) {
        $charge_vat = $data->charge_vat;
    }
    $product_brand = $data->product_brand;
    $product_weight = $data->product_weight;
    $suplier_sku = $data->suplier_sku;
    $product_type = $data->product_type;


    $added = $Core->MerchantAdd($accid, $title, $description, $main_category, $sub_category, $category, $bulkprice, $retailprice, $is_used_product, $enable_pos_sales,$product_brand,$product_weight,$suplier_sku,$product_type,$charge_vat);

    if ($added) {
        $Template->redirect("/dashboard/merchant/products/{$added}/add");
    }
}, 'POST');



$Route->add('/merchants/{pid}/deleteitem', function ($pid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    //Makesure Delete will not affect other datase resources//
    $del = $Core->DeleteProduct($pid);
    //Makesure Delete will not affect other datase resources//
    if ($del) {
        $Template->redirect("/dashboard/merchant/products");
    }
    $Template->redirect("/dashboard/merchant/products/{$pid}/edit");
}, 'POST');


$Route->add('/merchants/{pid}/submitproduct', function ($pid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    //Makesure Delete will not affect other datase resources//
    $submitted = $Core->SubmitProduct($accid, $pid);
    //Makesure Delete will not affect other datase resources//
    if ($submitted) {
        $Template->redirect("/dashboard/merchant/products/{$pid}/submit");
    }
    $Template->redirect("/dashboard/merchant/products");
}, 'POST');



$Route->add('/merchants/{pid}/edititem', function ($pid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $data = $Core->post($_POST);

    $ProductInfo = $Core->ProductInfo($pid);
        
    $main_category = $data->main_category;
    $Core->UpdateProductInfo($pid, "maincategory", $main_category);

    $sub_category = $data->sub_category;
    $Core->UpdateProductInfo($pid, "subcategory", $sub_category);

    $root_category = $data->root_category;
    $Core->UpdateProductInfo($pid, "category", $root_category);

    $photos = $data->array_of_uploaded_photos;

    $photo_count = (int)count($photos);
    if ($photo_count) {
        $photo = $photos[0];
        $photos = json_encode($photos);
        $Core->UpdateProductInfo($pid, "photos", $photos);
        $Core->UpdateProductInfo($pid, "photo", $photo);
    }

    $title = $data->title;
    $Core->UpdateProductInfo($pid, "name", $title);
    $description = $data->description;
    $Core->UpdateProductInfo($pid, "description", $description);

    $is_used_product = 0;
    if (isset($data->is_used_product)) {
        $is_used_product = $data->is_used_product;
    }
    $Core->UpdateProductInfo($pid, "is_used_product", $is_used_product);

    $enable_pos_sales = 0;
    if (isset($data->enable_pos_sales)) {
        $enable_pos_sales = $data->enable_pos_sales;
    }
    $Core->UpdateProductInfo($pid, "enable_pos_sales", $enable_pos_sales);
    

    $bulkprice = $data->bulkprice;
    $Core->UpdateProductInfo($pid, "bulkprice", $bulkprice);

    $charge_vat = 0;
    if (isset($data->charge_vat)) {
        $charge_vat = $data->charge_vat;
    }
    $Core->UpdateProductInfo($pid, "charge_vat", $charge_vat);

    $retailprice = $data->retailprice;
    $Core->UpdateProductInfo($pid, "retailprice", $retailprice);


    $suplier_sku = $data->suplier_sku;
    $Core->UpdateProductInfo($pid, "suplier_sku", $suplier_sku);

    $product_type = $data->product_type;
    $Core->UpdateProductInfo($pid, "product_type", $product_type);

    $product_brand = $data->product_brand;
    $Core->UpdateProductInfo($pid, "product_brand", $product_brand);

    $product_weight = $data->product_weight;
    $Core->UpdateProductInfo($pid, "product_weight", $product_weight);
    

    $Template->redirect("/dashboard/merchant/products/{$pid}/edit");

}, 'POST');




