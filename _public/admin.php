<?php


$Route->add('/dashboard/admin/{page}', function ($page) {
    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Golojan | Back Office");
    $accid = $Template->storage("accid");

    $root = $Core->UserInfo($accid, "root");
    switch ($page) {
        case 'accounts':
            # code...
            $Template->assign("AdminListAccount", $Core->AdminListAccount());
            break;
        case 'deposits':
            # code...
            $Template->assign("AdminListDeposits", $Core->AdminListDeposits());
            break;
        case 'withdrawals':
            # code...
            $Template->assign("AdminListWithdrawals", $Core->AdminListWithdrawals());
            break;
        case 'transfers':
            # code...
            $Template->assign("AdminListTransfers", $Core->AdminListTransfers());
            break;
        case 'submissions':
            # code...
            $Template->assign("AdminListSubmissions", $Core->AdminListSubmissions());
            break;
        default:
            # code...
            break;
    }

    $Template->assign("menukey", "{$page}");
    $Template->render("dashboard.{$root}.{$page}");
    
}, 'GET');
