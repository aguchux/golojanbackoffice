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

define("domain", "https://litimus.com/");

define("db_host","localhost");
define("db_user","meefzppr_golonet");
define("db_password","q0DU50X8pwzSCAlttGOryk27XBxjylXCD3nDm");
define("db_name","meefzppr_golonet");
define("db_port",null);
define("db_charset","utf8");
define("db_socket",null);



define("enable_otp_on_logon", true);
define("otp_live_time", 1);
define("otp_code_digits", 6);

//define("paystack_secrete","sk_test_2cb2fbb56d2c87a9a6991ddaad401e3bdfb7ddc7");
define("paystack_secrete", "sk_live_37f8df71edc6cabe84e0392ef0825d03f730d93f");

define("use_express_login", true);
define("reset_with_temp_password", true);

define("smslive_owner_email", "agu.chux@yahoo.com");
define("smslive_subaccount", "EBSGFINANCE");
define("smslive_subaccount_password", "q0DU50X8pwzSCAlttGOryk27XBxjylXCD3nDm");
define("smslive_api_key", "acdd4023-b6af-4479-a8a7-9ee45278c319");

define("smslive_callback_url", "https://ebsgfinance.net/auth/smslive247/callback");

//FCMB.Developers.API//
define("fcmb_client_secrete","iG8eD5qF4wQ1hR3oC6lG1xW3kU3wI1jX2kW4fF4aS2jU1wO6kR");
define("fcmb_client_id","b1545075-636d-4fc3-bba0-9a78c23ae9dc");
define("fcmb_callback_url", "https://ebsgfinance.net/api/fcmb/callback");

//ZENITH.Developers.API//
define("zenith_api_url","EbonyiStateGov");
define("zenith_caller_name","EbonyiStateGov");
define("zenith_caller_password","3atesghdb56s??jk");

define("zenith_postman_token","c97014d3-2a98-aa6d-4ff4-b7f4555268cc");
define("zenith_callback_url", "https://ebsgfinance.net/api/zenith/callback");

//UBA.Developers.API//
define("uba_consumer_key","Ny8YACCcwcHnrJVEX9BWkcQZodQa");
define("uba_consumer_secret","Zi3nE6JyWcy5vgGwO4Qw2ROVupEa");
define("uba_access_token","75d713cd-63cd-39ca-864b-5736322dba76");
define("uba_callback_url", "https://ebsgfinance.net/api/uba/callback");

//FBN.Developers.API//
define("fbn_passkey","eb156984557391o341034n027255yi");
define("fbn_callback_url", "https://ebsgfinance.net/api/fbn/callback");

define("default_transaction_days",30);
define("pre_show_transactions",false);