<?php


$Route->add('/ajax/exists/{param}', function ($param) {
    $result = 0;
    $Core = new Apps\Core();
    $Template = new Apps\Template;
    $data = $Core->post($_POST);
    $dataval = $data->dataval;
    $param = "email";
    if ($param == "email") {
        $UserEmail = $Core->UserInfo($dataval);
        if (isset($UserEmail->accid)) {
            $result = 1;
        }
    } elseif ($param == "mobile") {
        $UserMobile = $Core->UserInfo($dataval);
        if (isset($UserMobile->accid)) {
            $result = 1;
        }
    }
    $Template->debug($result);
}, 'POST');


$Route->add('/ajax/profile/{sponsorid}/sponsor', function ($sponsorid) {
    $Done = array();
    $Core = new Apps\Core();
    $Template = new Apps\Template;

    $Sponsor = $Core->UserInfo($sponsorid);
    if ((int)$Sponsor->accid) {
        $Done['accid'] = $sponsorid;
        $Done['avatar'] = $Sponsor->avatar;
        $Done['name'] = $Sponsor->fullname;
        $Done['created'] = date("jS M Y", strtotime($Sponsor->created));
    } else {
        $Done['accid'] = 0;
    }
    $Done = json_encode($Done);

    $Template->debug($Done);
}, 'POST');


$Route->add('/ajax/profile/upload', function () {
    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $result = array();

    $accid = $Template->storage("accid");

    $FileDir = "./_store/accounts/profile/{$accid}";

    $handle = new \Verot\Upload\Upload($_FILES['imagefile']);
    if ($handle->uploaded) {

        $handle->file_new_name_body = sha1($_FILES['imagefile']['name'] .  time());

        $handle->dir_auto_create = true;
        $handle->image_resize    = true;
        $handle->image_ratio_crop = true;
        $handle->image_y    =  160;
        $handle->image_x    =  160;

        $handle->file_overwrite = true;
        $handle->dir_chmod = 0777;
        $handle->image_ratio = true;

        $handle->process($FileDir);
        if ($handle->processed) {
            $img_url =  $handle->file_dst_pathname;
            $handle->clean();
            $result['done'] = 1;
            $result['image'] = $img_url;
            $Core->SetUserInfo($accid, "avatar", $img_url);
        } else {
            $result['done'] = 0;
        }
        echo json_encode($result);
    }
}, 'POST');


$Route->add('/ajax/stores/{product}/addproduct', function ($product) {

    $Done = array();

    $done = 0;
    $added = 1;

    $StorCNT = 0;
    $Paroducts_Data = null;

    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");

    //create store if not exists
    $Core->HasStore($accid);

    //Read product info//
    $Productinfo = $Core->Productinfo($product);

    //Is product in stock om user//
    $in_stock = (int)$Core->inStock($product, $accid);
    if ($in_stock) {
        // Remove Product//
        $done = $Core->AddStock($product, $accid);
    } else {
        // Add the products//
        $done = $Core->RemoveStock($product, $accid);
    }


    //Read store info//
    $StoreInfo = $Core->StoreInfo($accid);
    //Get store capacity//
    $store_capacity = (float)$StoreInfo->capacity;

    //Get store total and aty socked//
    $StoreComputed = $Core->ComputeStore($accid);
    
    //Recompute Store Details//
    $done += $Core->SetStoreInfo($accid, "store_count", $StorCNT);
    $done += $Core->SetStoreInfo($accid, "products", $Paroducts_Data);
    $done += $Core->SetStoreInfo($accid, "store_total", $store_total);



    $Paroducts_Array = json_decode($StoreInfo->products);



    $product_total = (float)$Productinfo->selling;

    $in_array = (int)in_array($product, $Paroducts_Array);

    if ($in_array) {

        //Remove from stock//
        if ($store_total >= $product_total) {
            $store_total = $store_total - $product_total;
            $key = array_search($product, $Paroducts_Array);
            unset($Paroducts_Array[$key]);
            $Paroducts_Array = array_values($Paroducts_Array);
            $StorCNT = count($Paroducts_Array);
        }
        $Paroducts_Data = json_encode($Paroducts_Array);
    } else {

        //Add to stock//
        $total_to_compare = $store_total + $product_total;
        if ($total_to_compare <= $store_capacity) {
            $store_total = $store_total + $product_total;
        } else {
            $added = 0;
        }
        $Paroducts_Array[] = $product;
        $StorCNT = count($Paroducts_Array);
        $Paroducts_Data = json_encode($Paroducts_Array);
    }

    $done += $Core->SetStoreInfo($accid, "store_count", $StorCNT);
    $done += $Core->SetStoreInfo($accid, "products", $Paroducts_Data);
    $done += $Core->SetStoreInfo($accid, "store_total", $store_total);

    $Done['done'] = $done;
    $Done['added'] = $added;
    $Done['count'] = $StorCNT;

    $StoreInfo_new = $Core->StoreInfo($accid);
    $finalcapacity = (float) ($StoreInfo_new->capacity - $StoreInfo_new->store_total);

    $Done['capacity'] = $Core->Naira($finalcapacity);

    echo json_encode($Done);
}, 'POST');




$Route->add('/ajax/settings/{param}', function ($param) {
    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $User = $Core->UserInfo($accid);
    $done = 0;
    $enable_otp = 1;
    if ($param == "enable_otp") {
        if ($User->enable_otp) {
            $enable_otp = 0;
        }
        $done += $Core->SetUserInfo($accid, "enable_otp", $enable_otp);
        $Template->store("toast", "OTP Enabled successfully");
    }
    $sms_notix = 1;
    if ($param == "sms_notix") {
        if ($User->sms_notix) {
            $sms_notix = 0;
        }
        $done += $Core->SetUserInfo($accid, "sms_notix", $sms_notix);
    }
    $email_notix = 1;
    if ($param == "email_notix") {
        if ($User->email_notix) {
            $email_notix = 0;
        }
        $done += $Core->SetUserInfo($accid, "email_notix", $email_notix);
    }
    $device_protection = 1;
    if ($param == "device_protection") {
        if ($User->device_protection) {
            $device_protection = 0;
        }
        $done += $Core->SetUserInfo($accid, "device_protection", $device_protection);
    }

    echo $done;
}, 'POST');
