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

require_once DOT . "/_public/authpages.php";
require_once DOT . "/_public/dashboard.php";
require_once DOT . "/_public/payments.php";
require_once DOT . "/_public/sales.php";
require_once DOT . "/_public/merchant.php";
require_once DOT . "/_public/network.php";
require_once DOT . "/_public/ajax.php";



$Route->add('/device/connection', function () {
    $Device = new Apps\Device;
    $Dinfo = array();
    $ip = $Device->get_ip();
    $is_ip = filter_var($ip, FILTER_VALIDATE_IP);
    if ($is_ip) {
        $Dinfo['connected'] = 1;
        $Dinfo['os'] = $Device->get_os();
        $Dinfo['browser'] = $Device->get_browser();
        $Dinfo['device'] = $Device->get_device();
        $Dinfo['ip'] = $Device->get_ip();
    }else{
        $Dinfo['connected'] = 0;
    }
    $Dinfo = json_encode($Dinfo);
    echo $Dinfo;
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
