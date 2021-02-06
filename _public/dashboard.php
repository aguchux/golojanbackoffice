<?php


$Route->add('/dashboard', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");

    $accid = $Template->storage("accid");
    $root = $Core->UserInfo($accid,"root");


    $Template->assign("menukey", "dashboard");
    $Template->render("dashboard.{$root}.dashboard");

}, 'GET');


$Route->add('/dashboard/{root}/switch', function ($root) {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $accid = $Template->storage("accid");
    $Core->SetUserInfo($accid,"root",$root);
    $Template->redirect("/dashboard");
}, 'GET');



$Route->add('/dashboard/locations/{location}/switch', function ($location) {
    $Template = new Apps\Template("/auth/login");
    $Core = new Apps\Core;
    $accid = $Template->storage("accid");
    $Core->SetUserInfo($accid,"location",$location);
    $Template->redirect("/dashboard");
}, 'GET');



$Route->add('/dashboard/{page}', function ($page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "{$page}");
    $accid = $Template->storage("accid");
    if($page=="support"){
        $ListFAQs = $Core->ListFAQs();
        $Template->assign("ListFAQs", $ListFAQs);

    }elseif($page=="networks"){
        
        $Level1 = $Core->MyNetwork($accid,1);
        $Template->assign("Level1", $Level1);

        $Level2 = $Core->MyNetwork($accid,2);
        $Template->assign("Level2", $Level2);

        $Level3 = $Core->MyNetwork($accid,3);
        $Template->assign("Level3", $Level3);

        $Level4 = $Core->MyNetwork($accid,4);
        $Template->assign("Level4", $Level4);

        $Level5 = $Core->MyNetwork($accid,5);
        $Template->assign("Level5", $Level5);

        $Level6 = $Core->MyNetwork($accid,6);
        $Template->assign("Level6", $Level6);

        $Level7 = $Core->MyNetwork($accid,7);
        $Template->assign("Level7", $Level7);

        $Level8 = $Core->MyNetwork($accid,8);
        $Template->assign("Level8", $Level8);

    }elseif($page=="locations"){

        $this_user = $Core->UserInfo($accid);
        $Locations = $Core->Locations();
        $Template->assign("Locations", $Locations);

    }elseif($page=="stories"){
        $this_user = $Core->UserInfo($accid);
        $Stories = $Core->Stories($this_user->level);
        $Template->assign("Stories", $Stories);

    }elseif($page=="tutorials"){
        $ListVideos = $Core->ListVideos();
        $Template->assign("ListVideos", $ListVideos);
    }

    $Template->assign("category", 0);
    $Template->assign("Products", $Core->CategoryProducts(0)); 
    $Template->render("dashboard.{$page}");
}, 'GET');







$Route->add('/dashboard/category/{catid}/marketplace', function ($catid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("category", $catid); 
    $Template->assign("Products", $Core->CategoryProducts($catid)); 
    $Template->assign("menukey", "marketplace");
    $Template->render("dashboard.marketplace");
}, 'GET');

$Route->add('/dasboard/tutorials/{vid}/learn', function ($vid) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("VideoInfo", $Core->VideoInfo($vid));
    $Template->assign("menukey", "tutorials");
    $Template->render("dashboard.tutorials_learn");
}, 'GET');

