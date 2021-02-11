<?php

$Route->add('/payments/addaccount', function ($fundid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $accid = $Template->storage("accid");
    $data = $Core->post($_POST);

    $saved_account_number = $data->saved_account_number;
    $banker = $data->banker;
    $account_name = $data->account_name;
    $Banker = $Core->BankerInfo($banker);
    $bank_name = $Banker->name;

    $added = $Core->AddNewBanker($accid, $banker, $saved_account_number, $account_name, $bank_name);
    $Template->redirect("/dashboard/accounts");
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





$Route->add('/payments/withdrawal/{withid}/finalize', function ($withid) {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;

    $data = $Core->post($_POST);
    $OTP = $data->otp;

    $accid = $Template->storage("accid");

    //Securing script//
    $token = $Template->storage("token");
    $Template->token($token, "/dashboard");

    $WithdrawalInfo = $Core->WithdrawalInfo($withid);
    $amount = $WithdrawalInfo->amount;

    $withdrawal_otp = $WithdrawalInfo->otp;
    if ($OTP == $withdrawal_otp) {
        //There is OTP MAtch//

        // Setup Transfer Proper//
        $PaystackBanking = new Apps\PaystackBanking(paystack_secrete_live);
        $Transfer =  $PaystackBanking->Transfer($amount, $WithdrawalInfo->recipient_code, $WithdrawalInfo->description);
        $TransferData = json_decode($Transfer);
        $status = $TransferData->status;
        if ($status == true) {

            if ($Core->DebitWallet($accid, $amount)) {

                $TransferData = $TransferData->data;

                $reference = $TransferData->reference;
                $Core->SetWithdrawalInfo($withid, "pay_reference", $reference);

                $pay_status = $TransferData->status;
                $Core->SetWithdrawalInfo($withid, "pay_status", $pay_status);
                $Core->SetWithdrawalInfo($withid, "status", $pay_status);

                $transfer_code = $TransferData->transfer_code;
                $Core->SetWithdrawalInfo($withid, "pay_transfer_code", $transfer_code);

                $pay_id = $TransferData->id;
                $Core->SetWithdrawalInfo($withid, "pay_id", $pay_id);
            } else {
                $Core->SetWithdrawalInfo($withid, "pay_status", "failed");
                $Core->SetWithdrawalInfo($withid, "status", "failed");
            }
        }else{
            $Core->SetWithdrawalInfo($withid, "pay_status", "failed");
            $Core->SetWithdrawalInfo($withid, "status", "failed");
        }
        //There is OTP MAtch//
    }
    $Template->redirect("/payments/withdrawal/{$withid}/completed");
}, 'POST');


$Route->add('/payments/withdrawal/{withid}/completed', function ($withid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");

    $WithdrawalInfo = $Core->WithdrawalInfo($withid);
    $Template->assign("WithdrawalInfo", $WithdrawalInfo);

    $BankInfo = $Core->BankInfo($WithdrawalInfo->bankerid);
    $Template->assign("BankInfo", $BankInfo);

    $BankerInfo = $Core->BankerInfo($BankInfo->bank_code);
    $Template->assign("BankerInfo", $BankerInfo);


    $Template->assign("status", "completed");

    $Template->assign("menukey", "withdrawal");
    $Template->render("dashboard.withdrawn");
}, 'GET');





$Route->add('/payments/withdrawfund', function () {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $data = $Core->post($_POST);

    $accid = $Template->storage("accid");
    $UserInfo = $Core->UserInfo($accid);

    //Securing script//
    $token = $Template->storage("token");
    $Template->token($token, "/dashboard");

    $amount = (float)$data->amount;
    $account = $data->account;

    $ThisBanker = $Core->BankInfo($account);

    $bank_code = $ThisBanker->bank_code;
    $account_number = $ThisBanker->account_number;
    $account_name = $ThisBanker->account_name;

    $transid = $Core->genWithdrawalId($accid);
    $description = "Withdrawal request by {$account_name} - Transaction Number: {$transid}";

    $PaystackBanking = new Apps\PaystackBanking(paystack_secrete_live);
    // Setup Transfer Receipient//
    $PayData = $PaystackBanking->AddReceipient($bank_code, $account_number, $account_name, $description);
    $PayData = json_decode($PayData);
    $status = $PayData->status;
    if ($status == true) {
        $PayData = $PayData->data;
        $withid = $Core->StartWithdrawal($accid, $transid, $PayData->recipient_code, $PayData->integration, $PayData->id, $amount, $description, $account);
        if ($withid) {

            $otp = $Core->GenOTP(6);

            $Core->SetWithdrawalInfo($withid, "otp", strtoupper($otp));
            $Core->SetWithdrawalInfo($withid, "otp_time", date("Y-m-d g:i:S"));

            $message = "NEVER DISCLOSE YOUR OTP TO ANYONE. Your OTP to transfer is <strong>{$otp}</strong>.";
            $subject = "Your OTP to Transfer is {$otp}";

            //Email Notix//
            $Mailer = new Apps\Emailer();
            $EmailTemplate = new Apps\EmailTemplate('mails.otp');
            $EmailTemplate->subject = $subject;
            $EmailTemplate->otp = $otp;
            $EmailTemplate->fullname = $UserInfo->fullname;
            $EmailTemplate->mailbody = $message;
            $Mailer->subject = $subject;
            $Mailer->SetTemplate($EmailTemplate);
            $Mailer->toEmail = $UserInfo->email;
            $Mailer->send();
            //Email Notix//

            $Template->redirect("/payments/withdrawal/{$withid}/otp");
        }
    }

    $Template->redirect($token, "/dashboard");
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
        $Paystack = new Yabacon\Paystack(paystack_secrete_live);
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
    $Template->redirect("/dashboard");
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
        $Core->SetTransferInfo($transferid, "status", "cancelled");
    } elseif (isset($data->confirm)) {
        $transfer = (int)$Core->TransferFund($accid_from, $accid_to, $amount);
        if ($transfer) {
            $Core->SetTransferInfo($transferid, "status", "completed");
        } else {
            $Core->SetTransferInfo($transferid, "status", "failed");
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


$Route->add('/payments/withdrawal/{withid}/otp', function ($withid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");

    $WithdrawalInfo = $Core->WithdrawalInfo($withid);
    $Template->assign("WithdrawalInfo", $WithdrawalInfo);

    $BankInfo = $Core->BankInfo($WithdrawalInfo->bankerid);
    $Template->assign("BankInfo", $BankInfo);

    $BankerInfo = $Core->BankerInfo($BankInfo->bank_code);
    $Template->assign("BankerInfo", $BankerInfo);

    $Template->assign("menukey", "confirm otp");
    $Template->render("dashboard.withdrawalotp");
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
    $Paystack = new Yabacon\Paystack(paystack_secrete_live);
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
