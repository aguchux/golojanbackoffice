<?

/*
 * Copyright (C) 2014-2020 De-Golojan Technologies Ltd. (www.golojan.com)
 * Distributed under the terms of the license described in COPYING
 * Constants
 */

define("appname","Backoffice");
define("version","1.1.0");
define("debug",true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('DIR', __DIR__);
define("display_error",true);
define("language","en_US");
define("url",__DIR__);
define("baseurl",__DIR__);
define("apps_dir","./_apps/");
define("template_file_extension","php");
define("templates_dir","./templates/");
define("templates_default","404");
define("templates_default_route","/error/404/");
define("vendor_dir","./vendor/");
define("assets_dir","./templates/assets/");
define("layouts_dir","./templates/layouts/");
define("store_dir","./_store/");
define("public_dir","./_public/");
define("dart_dir","./_dart/");
define("plugins_dir","./_plugins/");
define("server","remote");
define("use_token_security",true);
define("encrypt_salt","7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW");
define("default_timezone","Africa/Lagos");
define("offset_timezone",true);
define("session_path","./_sessions/");
define("session_timout",20);
define("session_delete_timout",30);
define("auth_session_key","logged_in");
define("auth_url","/auth/login");

define("domain", "https://myhq.golojan.com/");

//define("db_host","localhost");
//define("db_user","meefzppr_golonet");
//define("db_password","q0DU50X8pwzSCAlttGOryk27XBxjylXCD3nDm");
//define("db_name","meefzppr_golonet");
//define("db_port",null);
//define("db_charset","utf8");
//define("db_socket",null);

define("db_host","localhost");
define("db_user","golojan_mlms");
define("db_password","q0DU50X8pwzSCAlttGOryk27XBxjylXCD3nDm");
define("db_name","golojan_mlms");
define("db_port",null);
define("db_charset","utf8");
define("db_socket",null);

define("enable_otp_on_logon", true);
define("otp_live_time", 30);
define("otp_code_digits", 6);

define("enable_sms_otp", false);
define("enable_email_otp", false);

define("use_express_login", true);
define("reset_with_temp_password", true);

define("smslive_owner_email", "agu.chux@yahoo.com");
define("smslive_subaccount", "EBSGFINANCE");
define("smslive_subaccount_password", "q0DU50X8pwzSCAlttGOryk27XBxjylXCD3nDm");
define("smslive_api_key", "acdd4023-b6af-4479-a8a7-9ee45278c319");
define("smslive_callback_url", "https://ebsgfinance.net/auth/smslive247/callback");

define("default_transaction_days",30);
define("pre_show_transactions",false);

//Cloudinary.Developers.API//
define("CloudName","golojan-com");
define("APIKey","981315561269929");
define("APISecret","EY-_3X-iL3OFHbQ0PKoZD121H0Y");
define("APIEnvironmentVariable","CLOUDINARY_URL=cloudinary://981315561269929:EY-_3X-iL3OFHbQ0PKoZD121H0Y@golojan-com");


define("initial_store_capacity", 2000000);
define("enable_DKIM_keys",true);

define("root_accid",0);