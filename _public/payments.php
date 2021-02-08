<?php


$Route->add('/payments/addfund', function () {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $data = $Core->post($_POST);

    $accid = $Template->storage("accid");

    //Securing script//
    $token = $Template->storage("token");
    $Template->token($token,"/dashboard");

    $amount = $data->amount;
    $method = $data->method;
    $to_accid = $data->account;

    $transid = $Core->genTransid($accid);
    $start = $Core->StartFunding($accid,$transid,$amount,$method,$to_accid);
    if($start){
        $Template->redirect("/payments/prefund");
    }
    $Template->token($token,"/dashboard");
    
}, 'POST');



$Route->add('/payments/prefund', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Golojan | Back Office");

    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid,"root");

    $Template->assign("menukey", "payments");
    $Template->render("dashboard.{$root}.prefund");

}, 'GET');