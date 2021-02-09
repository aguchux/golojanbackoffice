<?php

$Route->add('/ajax/bankers/getinfo', function () {
    $Done = array();
    $Done['done'] = 0;

    $Core = new Apps\Core();
    $Template = new Apps\Template;

    $data = $Core->post($_POST);
   
    $accountnumber = $data->accountnumber;
    $bankcode = $data->bankcode;
    
    $PaystackBanking = new Apps\PaystackBanking(paystack_secrete_live);
    $AccountInfo = json_decode($PaystackBanking->verifyBank($accountnumber,$bankcode));
    $status = $AccountInfo->status;
    if($status==true){
        $Done['done'] = 1;
        $AccountData = $AccountInfo->data;
        $Done['account_number'] = $AccountData->account_number;
        $Done['account_name'] = $AccountData->account_name;
    }

    echo json_encode($Done);

}, 'POST');

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



$Route->add('/ajax/profile/{receipientid}/receipient', function ($receipientid) {

    $Done = array();
    $Done['accid'] = 0;
    $Done['sameperson'] = 0;

    $Core = new Apps\Core();
    $Template = new Apps\Template;
    $accid = $Template->storage("accid");

    $Receipient = $Core->UserInfo($receipientid);

    if (isset($Receipient->accid)) {
        $Done['sameperson'] = 0;
        if ($accid == $receipientid) {
            $Done['sameperson'] = 1;
        }
        $Done['accid'] = $receipientid;
        $Done['avatar'] = $Receipient->avatar;
        $Done['name'] = $Receipient->fullname;
        $Done['created'] = date("jS M Y", strtotime($Receipient->created));
    }

    $Done = json_encode($Done);

    echo $Done;
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

    echo $Done;
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

    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");

    //create store if not exists
    $Core->HasStore($accid);

    //Read product info//
    $Productinfo = $Core->Productinfo($product);

    //Read store info//
    $StoreInfo = $Core->StoreInfo($accid);

    //Is product in stock om user//
    $in_stock = (int)$Core->inStock($product, $accid);

    if ($in_stock) {
        // Remove Product//
        $done = (int)$Core->RemoveStock($product, $accid);
    } else {
        // Add the products//
        $_available = $Core->StockVolume($accid);
        $_new_volume = $_available + $Productinfo->selling;
        if ($StoreInfo->capacity >= $_new_volume) {
            $done = (int)$Core->AddStock($product, $accid);
        } else {
            $added = 0;
        }
    }

    //Get store capacity//
    $store_capacity = (float)$StoreInfo->capacity;

    //Get store total and aty socked//
    //Recompute Store Details//
    $StoreComputed = $Core->ComputeStockList($accid);
    //Total stocked
    $summed = $StoreComputed->sum;

    //Qty stocked
    $CountStock = $Core->CountStock($accid);
    $finalcapacity = (float) ($store_capacity - $summed);

    $Done['done'] = $done;
    $Done['added'] = $added;
    $Done['count'] = $CountStock;
    $Done['capacity'] = $Core->ToMoney($finalcapacity);

    echo json_encode($Done);
}, 'POST');




$Route->add('/ajax/settings/{param}', function ($param) {
    $Core = new Apps\Core();
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $User = $Core->UserInfo($accid);

    $data = $Core->post($_POST);

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

    if ($param == "domain") {
        $domain = $data->data;
        $done += $Core->SetStoreInfo($accid, "domain", $domain);
    }

    $enable_domain = 1;
    if ($param == "enable_domain") {
        if ($User->enable_domain) {
            $enable_domain = 0;
        }
        $done += $Core->SetUserInfo($accid, "enable_domain", $enable_domain);
    }


    echo $done;
}, 'POST');
