<?php


$Route->add('/ajax/exists/{param}', function ($param) {
    $Core = new Apps\Core();
    $param = "email";
    if ($param == "email") {
        die(1);
    } elseif ($param == "mobile") {
        die(2);
    }
}, 'POST');


$Route->add('/ajax/stores/{product}/addproduct', function ($product) {

    $Done = array();

    $done = 0;
    $added = 1;

    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $Core->HasStore($accid);

    $StoreInfo = $Core->StoreInfo($accid);
    $Productinfo = $Core->Productinfo($product);
    $Paroducts_Array = json_decode($StoreInfo->products);

    $store_capacity = (float)$StoreInfo->capacity;
    $store_total = (float)$StoreInfo->store_total;
    $product_total = (float)$Productinfo->selling;

    if (in_array($product, $Paroducts_Array)) {
       
        //Remove from stock//
        if ($store_total >= $product_total) {
            $store_total -= $product_total;

            $key = array_search($product, $Paroducts_Array);
            unset($Paroducts_Array[$key]);
            $StorCNT = count($Paroducts_Array);

        }
        $Paroducts_Data = json_encode($Paroducts_Array);

    } else {
       
        //Add to stock//
        $total_to_compare = $store_total + $product_total;
        if ($total_to_compare <= $store_capacity) {
            $store_total += $product_total;
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

    //$StoreInfo_new = $Core->StoreInfo($accid);
    //$finalcapacity = (float) ($StoreInfo_new->capacity - $StoreInfo_new->store_total);
    $Done['capacity'] = $Core->Naira(50000000);

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
