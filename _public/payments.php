<?php

$Route->add('/payments/addaccount', function ($fundid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->post($_POST);

    $saved_account_number = $data->saved_account_number;
    $banker = $data->banker;
    $account_name = $data->account_name;

    $Template->debug($data);
    
}, 'POST');


$Route->add('/payments/transfer', function () {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $data = $Core->post($_POST);

    $accid = $Template->storage("accid");

    //Securing script//
    $token = $Template->storage("token");
    $Template->token($token, "/dashboard");

    $amount = $data->amount;
    $receipient = $data->receipient;

    $transid = $Core->genTransferId($accid);
    $start = $Core->StartTransfer($accid, $transid, $amount, $receipient);
    if ($start) {
        $Template->redirect("/payments/{$start}/pretransfer");
    }

    $Template->token($token, "/dashboard");

}, 'POST');



$Route->add('/payments/addfund', function () {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $data = $Core->post($_POST);

    $accid = $Template->storage("accid");

    //Securing script//
    $token = $Template->storage("token");
    $Template->token($token, "/dashboard");

    $amount = $data->amount;
    $method = $data->method;

    $ToUser = $Core->UserInfo($accid);

    $transid = $Core->genTransid($accid);
    $start = $Core->StartFunding($accid, $transid, $amount, $method, $accid);
    if ($start) {

        $amount = floatval($amount * 100);
        $Paystack = new Yabacon\Paystack(paystack_secrete);
        $reference = md5($start . $accid . $accid . $accid . time());
        
        try {

            $tranx = $Paystack->transaction->initialize([
                'amount' => $amount,
                'email' => $ToUser->email,
                'mobile' => $ToUser->mobile,
                'reference' => $reference
            ]);

            $data = $tranx->data;
            $authorization_url = $data->authorization_url;
            $access_code = $data->access_code;
            $reference = $data->reference;

            $Core->SetFundingInfo($start, "authorization_url", $authorization_url);
            $Core->SetFundingInfo($start, "access_code", $access_code);
            $Core->SetFundingInfo($start, "method", $method);
            $Core->SetFundingInfo($start, "reference", $reference);

            $Template->redirect("/payments/{$start}/prefund");
        } catch (\Yabacon\Paystack\Exception\ApiException $e) {
            $Core->debug($e);
        }
    }
    $Template->token($token, "/dashboard");
}, 'POST');


$Route->add('/payments/{fundid}/paynow', function ($fundid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $PaymentInfo = $Core->FundingInfo($fundid);
    $data = $Core->post($_POST);
    if (isset($data->paynow)) {
        $Template->redirect($PaymentInfo->authorization_url);
    } elseif (isset($data->cancelnow)) {
        $Core->SetFundingInfo($fundid, "status", "cancelled");
        $Template->redirect("/payments/{$fundid}/completed");
    }
}, 'POST');



$Route->add('/payments/{transferid}/transfernow', function ($transferid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $TransferInfo = $Core->TransferInfo($transferid);

    $accid_from = $TransferInfo->accid_from;
    $accid_to = $TransferInfo->accid_to;
    $amount = $TransferInfo->amount;

    $data = $Core->post($_POST);
    if (isset($data->cancel)) {
        $Core->SetTransferInfo($transferid,"status","cancelled");
    } elseif (isset($data->confirm)) {
        $transfer = (int)$Core->TransferFund($accid_from,$accid_to,$amount);
        if($transfer){
            $Core->SetTransferInfo($transferid,"status","completed");
        }else{
            $Core->SetTransferInfo($transferid,"status","failed");
        }
    }
    $Template->redirect("/payments/transfer/{$transferid}/completed");
}, 'POST');



$Route->add('/payments/transfer/{transferid}/completed', function ($transferid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");

    $TransferInfo = $Core->TransferInfo($transferid);
    $Template->assign("TransferInfo", $TransferInfo);

    $Template->assign("menukey", "transfer fund");
    $Template->render("dashboard.transfered");

}, 'GET');



$Route->add('/payments/{fundid}/completed', function ($fundid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");

    $FundingInfo = $Core->FundingInfo($fundid);
    $Template->assign("FundingInfo", $FundingInfo);

    $Template->assign("status", "completed");

    $Template->assign("menukey", "payments");
    $Template->render("dashboard.funded");
}, 'GET');


$Route->add('/payments/{fundid}/prefund', function ($fundid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $FundingInfo = $Core->FundingInfo($fundid);
    $Template->assign("FundingInfo", $FundingInfo);


    $Template->assign("menukey", "payments");
    $Template->render("dashboard.prefund");
}, 'GET');



$Route->add('/payments/{fundid}/pretransfer', function ($fundid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid, "root");

    $TransferInfo = $Core->TransferInfo($fundid);
    $Template->assign("TransferInfo", $TransferInfo);


    $Template->assign("menukey", "transfer fund");
    $Template->render("dashboard.pretransfer");
}, 'GET');



$Route->add('/payments/callback', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $data = $Core->post($_REQUEST);
    $reference = $data->reference;
    $PaymentInfo = $Core->FundingInfo($reference);
    $PayID = $PaymentInfo->id;
    $Paystack = new Yabacon\Paystack(paystack_secrete);
    try {
        $tranx = $Paystack->transaction->verify([
            'reference' => $reference,
        ]);
        //Collected Data//
        $tranx_status = $tranx->status;
        if ($tranx_status == true) {

            $data = $tranx->data;

            if ($data->status == 'success') {
                //When Success//
                $Core->SetFundingInfo($PayID, "status", "completed");
                //Store Data
                $data = $tranx->data;
                $Core->SetFundingInfo($PayID, "paydata", json_encode($data));
                $id = $data->id;
                $Core->SetFundingInfo($PayID, "tranx_id", $id);

                $paid_at = $data->paid_at;
                $Core->SetFundingInfo($PayID, "tranx_paid_at", $paid_at);
                $Core->SetFundingInfo($PayID, "date_funded", date("Y-m-d g:i a"));
                $currency = $data->currency;
                $Core->SetFundingInfo($PayID, "tranx_currency", $currency);
                //Store Log

                //Credit Account//
                $Core->CreditWallet($PaymentInfo->to_accid, $PaymentInfo->amount);
                //Credit Account//

                $Template->redirect("/payments/{$PayID}/completed");
            } else {
                $Core->SetFundingInfo($PayID, "status", "failed");
            }
        }
        $Template->redirect("/payments/{$PayID}/completed");
        //Collected Data//
    } catch (\Yabacon\Paystack\Exception\ApiException $e) {
        $Template->redirect("/payments");
    }
}, 'GET');
