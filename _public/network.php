<?php



$Route->add('/dashboard/network/networks', function () {
        
        $Core = new Apps\Core();
        $Template = new Apps\Template('/auth/login');
        $Template->addheader("layouts.auth.header");
        $Template->addfooter("layouts.auth.footer");    
        $Template->assign("menukey", "my networks");    
        $Template->assign("title", "Golojan | Back Office");
        $accid = $Template->storage("accid");
        $root = $Core->UserInfo($accid, "root");

        $Template->assign("Level1", $Core->MyNetwork($accid,1));    
        $Template->assign("Level2", $Core->MyNetwork($accid,2));    
        $Template->assign("Level3", $Core->MyNetwork($accid,3));    
        $Template->assign("Level4", $Core->MyNetwork($accid,4));    
        $Template->assign("Level5", $Core->MyNetwork($accid,5));    
        $Template->assign("Level6", $Core->MyNetwork($accid,6));    
        $Template->assign("Level7", $Core->MyNetwork($accid,7));    
        $Template->assign("Level8", $Core->MyNetwork($accid,8));    
        
        $Template->render("dashboard.{$root}.networks");

}, 'GET');


$Route->add('/dashboard/network/referrals', function () {

        $Core = new Apps\Core();
        $Template = new Apps\Template('/auth/login');

        $Template->addheader("layouts.auth.header");
        $Template->addfooter("layouts.auth.footer");
        
        $Template->assign("menukey", "referrals");
        
        $Template->assign("title", "Golojan | Back Office");

        $accid = $Template->storage("accid");
        $root = $Core->UserInfo($accid, "root");

        $Template->assign("AccountReferrals", $Core->AccountReferrals($accid) );

        $Template->render("dashboard.{$root}.referrals");
}, 'GET');


$Route->add('/dashboard/network/commissions', function () {

        $Core = new Apps\Core();
        $Template = new Apps\Template('/auth/login');

        $Template->addheader("layouts.auth.header");
        $Template->addfooter("layouts.auth.footer");
        
        $Template->assign("menukey", "referrals");
        
        $Template->assign("title", "Golojan | Back Office");

        $accid = $Template->storage("accid");
        $root = $Core->UserInfo($accid, "root");

        $Template->assign("AccountReferrals", $Core->AccountReferrals($accid) );

        $Template->render("dashboard.{$root}.commissions");
}, 'GET');