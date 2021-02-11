<?php 



$Route->add('/dashboard/network/{page}', function ($page) {
    
$Core = new Apps/Core();
$Template = new Apps/Template('/auth/login');
$Template->addheader("layouts.auth.header");
$Template->addfooter("layouts.auth.footer");
$Template->assign("title", "Golojan | Back Office");

$accid = $Template->storage("accid");
$root = $Core->UserInfo($accid, "root");

        $Level1 = $Core->MyNetwork($accid, 1);
        $Template->assign("Level1", $Level1);

        $Level2 = $Core->MyNetwork($accid, 2);
        $Template->assign("Level2", $Level2);

        $Level3 = $Core->MyNetwork($accid, 3);
        $Template->assign("Level3", $Level3);

        $Level4 = $Core->MyNetwork($accid, 4);
        $Template->assign("Level4", $Level4);

        $Level5 = $Core->MyNetwork($accid, 5);
        $Template->assign("Level5", $Level5);

        $Level6 = $Core->MyNetwork($accid, 6);
        $Template->assign("Level6", $Level6);

        $Level7 = $Core->MyNetwork($accid, 7);
        $Template->assign("Level7", $Level7);

        $Level8 = $Core->MyNetwork($accid, 8);
        $Template->assign("Level8", $Level8);
        

$Template->render("dashboard.{$root}.{$page}");

}, 'GET');
