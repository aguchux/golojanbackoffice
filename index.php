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


$Route->add('/network/{accid}/{level}', function ($accid, $level) {
    $Template = new Apps\Template;
    $Core = new Apps\Core;

    $Network = $Core->MyNetwork($accid, $level);
    $Template->debug(($Network));
}, 'GET');
//Home page//

require_once DOT . "/_public/authpages.php";
require_once DOT . "/_public/dashboard.php";
require_once DOT . "/_public/ajax.php";



$Route->add('/device/connection', function () {
    $Device = new Apps\Device;
    echo $Device->get_ip();
}, 'GET');


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
