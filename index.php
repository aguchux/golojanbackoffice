<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "Golojan | Back Office");
    $Template->render("home");
}, 'GET');
//Home page//



$Route->add('/dashboard', function () {
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $Template->assign("menukey", "dashboard");
    $Template->render("dashboard");
}, 'GET');



$Route->add('/device/connection', function () {
    $Device = new Apps\Device;
    echo $Device->get_ip();
}, 'GET');



require_once DOT . "/_public/authpages.php";


//Logout Sessions//
$Route->add(
    '/auth/logout',
    function () {
        $Template = new Apps\Template;
        $Template->expire();
        $Template->cleanAll(session_delete_timout);
        $Template->redirect(auth_url);
    },
    'GET'
);
//Logout Sessions//

$Route->run('/');
