<?php


$Route->add('/auth/register', function () {
    $Template = new Apps\Template();
    if ($Template->auth) {
        $Template->redirect("/dashboard");
    }
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Secure Register");
    $Template->assign("menukey", "register");
    $Template->render("register");
}, 'GET');



$Route->add('/auth/login', function () {
    $Template = new Apps\Template();
    if ($Template->auth) {
        $Template->redirect("/dashboard");
    }
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Secure Login");
    $Template->assign("menukey", "login");
    $Template->render("login");
}, 'GET');


$Route->add('/auth/reset', function () {
    $Template = new Apps\Template();
    if ($Template->auth) {
        $Template->redirect("/dashboard");
    }
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Reset Account ");
    $Template->assign("menukey", "login");
    $Template->render("reset");
}, 'GET');


$Route->add('/auth/otp', function () {
    $Template = new Apps\Template();
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Enter Secure OTP ");
    $Template->assign("menukey", "login");
    $Template->render("otp");
}, 'GET');


$Route->add('/auth/forms/{action}', function ($action) {
    $Core = new Apps\Core;
    $Template = new Apps\Template();
    $Template->token($Template->data['token']);
    $data = $Core->post($_POST);
    $SMSLive = new Apps\SMSLive;

    if ($action == "splash") {
        $Template->redirect("/auth/login");
  
    } elseif ($action == "register") {

        $fullname = $data->fullname;
        $email = $data->email;
        $mobile = $data->mobile;
        $password = $data->password;

        $sponsor = (int)$data->sponsor;

        $mobileExists = $Core->mobileExists($mobile);
        $emailExists = $Core->emailExists($email);

        if ($mobileExists || $emailExists) {
            $Template->redirect("/auth/register");
        }

        //Process Referral//
        $Sponsor = $Core->UserInfo($sponsor);
        $new_sponsor = $Core->Spillover($sponsor);
        if (isset($Sponsor->accid)) {
            $referrer = $sponsor;
        } else {
            $referrer = root_referrer;
        }
        //Process Referral//

        $accid = $Core->RegisterAccount($fullname, $email, $mobile, $password);
        if ($accid) {

            $Core->setSponsor($accid, $new_sponsor);
            $Core->SetUserInfo($accid, "referrer", $referrer);

            $Login = $Core->UserInfo($accid);
            //Check if OTP is enabled//
            $otp = $Core->GenOTP(6);
            $Core->SetUserInfo($accid, "otp_pending", 1);
            $Core->SetUserInfo($accid, "otp", strtoupper($otp));
            $Core->SetUserInfo($accid, "otp_time", date("Y-m-d g:i:S"));
            $Template->store("accid", $accid);

            $message = "NEVER DISCLOSE YOUR OTP TO ANYONE. Your OTP to login is {$otp}. Enquiry? Call: 08068573376";
            $subject = "Your OTP to login is {$otp}";
            if (enable_sms_otp) {
                if ($Login->sms_notix) {
                    $sent = $SMSLive->send($Login->mobile, $message);
                }
            } else {
            }

            if (enable_email_otp) {
                if ($Login->email_notix) {
                    //Email Notix//
                    $Mailer = new Apps\Emailer();
                    $EmailTemplate = new Apps\EmailTemplate('mails.otp');
                    $EmailTemplate->subject = $subject;
                    $EmailTemplate->otp = $otp;
                    $EmailTemplate->fullname = $Login->fullname;
                    $EmailTemplate->mailbody = $message;
                    $Mailer->subject = $subject;
                    $Mailer->SetTemplate($EmailTemplate);
                    $Mailer->toEmail = $Login->email;
                    $Mailer->send();
                    //Email Notix//
                    $Template->redirect("/auth/otp");
                }
            } else {
                //Email Notix//
                $Template->authorize($accid);
                $Template->redirect("/dashboard");
            }
        }
    } elseif ($action == "login") {

        if ($Template->auth) {
            $Template->redirect("/dashboard");
        }

        $username = $data->username;
        $password = $data->password;

        $Login = $Core->UserLogin($username, $password);

        if ((int)$Login->accid) {

            if (use_express_login) {
                $Template->authorize($Login->accid);
                $Template->redirect("/dashboard");
            } else {

                if (enable_email_otp) {
                    if ($Login->enable_otp) {

                        //Check if OTP is enabled//
                        $otp = $Core->GenOTP(6);
                        $Core->SetUserInfo($Login->accid, "otp_pending", 1);
                        $Core->SetUserInfo($Login->accid, "otp", strtoupper($otp));
                        $Core->SetUserInfo($Login->accid, "otp_time", date("Y-m-d g:i:S"));
                        $Template->store("accid", $Login->accid);

                        $message = "NEVER DISCLOSE YOUR OTP TO ANYONE. Your OTP to login is {$otp}. Enquiry? Call: 08068573376";
                        $subject = "Your OTP to login is {$otp}";

                        if (enable_sms_otp) {
                            if ($Login->sms_notix) {
                                $sent = $SMSLive->send($Login->mobile, $message);
                            }
                        }

                        if (enable_email_otp) {

                            if ($Login->email_notix) {
                                //Email Notix//
                                $Mailer = new Apps\Emailer;
                                $EmailTemplate = new Apps\EmailTemplate('mails.default');
                                $EmailTemplate->subject = $subject;
                                $EmailTemplate->otp = $otp;
                                $EmailTemplate->fullname = $Login->fullname;
                                $EmailTemplate->mailbody = $message;
                                $Mailer->subject = $subject;

                                $Mailer->SetTemplate($EmailTemplate);

                                $Mailer->toEmail = $Login->email;
                                $Mailer->toName = $Login->fullname;

                                $Mailer->fromEmail = "otp@litimus.com";
                                $Mailer->fromName = "Litimus";
                                $Mailer->replyEmail = "otp@litimus.com";
                                $Mailer->replyName = "Litimus";

                                $Mailer->send();

                                //Email Notix//
                            }
                        }

                        $Template->redirect("/auth/otp");
                        //Check if OTP is enabled//

                    } else {
                        $Template->authorize($Login->accid);
                        $Template->redirect("/dashboard");
                    }
                } else {
                    $Template->authorize($Login->accid);
                    $Template->redirect("/dashboard");
                }
            }
        } else {
            $Template->redirect("/auth/login");
        }
    } elseif ($action == "reset") {

        if ($Template->auth) {
            $Template->redirect("/dashboard");
        }

        $username = $data->username;
        $UserInfo = $Core->UserInfo($username);

        if ($UserInfo->accid) {
            $password = $Core->GenPassword(5);
            $Core->SetUserInfo($UserInfo->accid, "password", $Core->Passwordify($password));

            $message = "Your temporary password to login is {$password}. Enquiry? Call: 08068573376";
            //$sent = $SMSLive->send($UserInfo->mobile, $message);
            die($password);
            $subject = "New Password Reset";

            //Email Notix//
            $Mailer = new Apps\Emailer();
            $EmailTemplate = new Apps\EmailTemplate('mails.reset');
            $EmailTemplate->subject = $subject;
            $EmailTemplate->fullname = $UserInfo->fullname;
            $EmailTemplate->mailbody = $message;
            $Mailer->subject = $subject;
            $Mailer->SetTemplate($EmailTemplate);
            $Mailer->toEmail = $UserInfo->email;
            $Mailer->send();
            //Email Notix//

        }

        $Template->redirect("/auth/login");
    } elseif ($action == "otp") {

        if ($Template->auth) {
            $Template->redirect("/dashboard");
        }

        if (!isset($Template->data['accid'])) {
            $Template->redirect("/auth/login");
        }

        $accid = $Template->data['accid'];
        $otp = strtoupper($data->otp);
        $VerifyOTP = $Core->VerifyOTP($accid, $otp);

        if ($VerifyOTP) {
            //Authorize this login//
            $Core->SetUserInfo($accid, "otp_pending", 0);
            $Core->SetUserInfo($accid, "otp", "");
            $Template->authorize($accid);
            $Template->redirect("/dashboard");
            //Authorize this login//
        }
        $Template->redirect("/auth/otp");
    } elseif ($action == "profile") {

        $accid = $Template->storage("accid");
        $User = $Core->UserInfo($accid);

        $fullname = $data->fullname;
        $Core->SetUserInfo($accid, "fullname", $fullname);

        if (!empty($data->password) && !empty($data->re_password)) {
            $match = (int)($data->password == $data->re_password);
            if ($match) {
                $paswodified = $Core->Passwordify($data->re_password);
                $Core->SetUserInfo($accid, "password", $paswodified);
            }
        }

        //$Toast = new Apps\Toast;
        //$Toast->toast('/dashboard/profile','Welcome','Your profile was updated','success');

        $Template->redirect("/dashboard/profile");
    } else {
        $Template->redirect("/auth/login");
    }
}, 'POST');
