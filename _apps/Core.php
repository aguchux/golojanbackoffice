<?php

//Write your custome class/methods here
//credit: https://www.sitepoint.com/hierarchical-data-database-2/


namespace Apps;

use stdClass;
use \Apps\Model;
use \Apps\MysqliDb;

use \Apps\EmailTemplate;

use function GuzzleHttp\json_decode;

class Core extends Model
{

	public $token = NULL;
	public $ngn = "&#x20A6;";


	/** @return exit  */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param int $length 
	 * @return string 
	 */
	public function GenPassword($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	/**
	 * @param int $length 
	 * @return string 
	 */
	public function GenOTP($length = 10)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return strtoupper($randomString);
	}



	/**
	 * @param mixed $amount 
	 * @return string 
	 */
	public function ToMoney($amount)
	{
		$curr_code = "&#36;";
		$template = new Template;
		if ($template->auth) {
			$accid = $template->storage("accid");
			$loc = $this->LocationInfo($this->UserInfo($accid, "location"));
			$curr_code = $loc->currency_code;
		}
		$amount = number_format($amount, 2, ".", ",");
		return "{$curr_code}{$amount}";
	}


	public function Monify($amount)
	{
		$curr_code = "&#36;";
		$sess = new Session;
		if ($sess->auth) {
			$accid = $sess->storage("accid");
			$loc = $this->LocationInfo($this->UserInfo($accid, "location"));
			$curr_code = $loc->currency_code;
		}
		$amount = number_format($amount, 0, ".", ",");
		return "{$curr_code}{$amount}";
	}


	/**
	 * Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
	 *
	 * @param int    $number  Number to shorten
	 * @return String   A number with a symbol
	 */
	function shorten($number)
	{
		$abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");

		foreach ($abbrevs as $exponent => $abbrev) {
			if ($number >= pow(10, $exponent)) {
				$display_num = $number / pow(10, $exponent);
				$decimals = ($exponent >= 3 && round($display_num) < 100) ? 2 : 1;
				return "&#x20A6; " . number_format($display_num, $decimals) . $abbrev;
			}
		}
	}


	public function Comma2Dec($amount)
	{
		$amount = 0 + str_replace(",", "", $amount);
		$amount = number_format($amount, 2, ".", "");
		return $amount;
	}

	/**
	 * @param mixed $string 
	 * @return string 
	 */
	public static function slugify($string)
	{
		$table = array(
			'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-', ',' => '', '&' => 'and'
		);
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/[^a-z0-9]/i'), ' ', $string);
		// -- Returns the slug
		return strtolower(strtr($string, $table));
	}

	/** @return string  */
	public function getURI()
	{
		$getURI = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return $getURI;
	}

	/**
	 * @param string $url 
	 * @return exit 
	 */
	public function redirect($url = "/")
	{
		header("Location: {$url}");
		exit();
	}

	/**
	 * @param mixed $password 
	 * @return string 
	 */
	public function Passwordify($password)
	{
		$Passwordify = $this->encode($password);
		return $Passwordify;
	}
	/**
	 * @param mixed $data 
	 * @return string 
	 */
	public function encode($data)
	{
		$encode = sha1(md5($data . encrypt_salt));
		return $encode;
	}


	public function phpDateRange($stamp = "today", $day = 1)
	{
		$dateobj = new stdClass;
		$date = new \DateTime();
		switch ($stamp) {
			case 'today':
				$date = new \DateTime();
				$dateobj->from =  $date->format('Y-m-d');
				$dateobj->to =  $date->format('Y-m-d');
				break;
			case 'yesterday':
				$date = new \DateTime();
				$date->add(\DateInterval::createFromDateString('yesterday'));
				$dateobj->from =  $date->format('Y-m-d');
				$dateobj->to =  $date->format('Y-m-d');
				break;
			case 'thisweek':
				$dateobj->from  = date("Y-m-d", strtotime("last Monday"));
				$dateobj->to = date("Y-m-d", strtotime("next Monday"));
				break;
			case 'lastweek':
				$previous_week = strtotime("-1 week +1 day");
				$start_week = strtotime("last sunday midnight", $previous_week);
				$end_week = strtotime("next saturday", $start_week);
				$dateobj->from = date("Y-m-d", $start_week);
				$dateobj->to = date("Y-m-d", $end_week);
				break;
			case 'thismonth':
				$dateobj->from  = date("Y-m-d", strtotime("first day of this month"));
				$dateobj->to = date("Y-m-d", strtotime("last day of this month"));
				break;
			case 'lastmonth':
				$dateobj->from = date("Y-m-d", strtotime("first day of previous month"));
				$dateobj->to = date("Y-m-d", strtotime("last day of previous month"));
				break;
			case 'last':
				if (!$day) {
					$date = new \DateTime();
					$dateobj->from =  $date->format('Y-m-d');
					$dateobj->to =  $date->format('Y-m-d');
				} else {
					$date = new \DateTime();
					$dateobj->from =  date("Y-m-d", strtotime("{$day} days ago"));
					$dateobj->to =  $date->format('Y-m-d');
				}
				break;
			default:
				$date = new \DateTime();
				$dateobj->from =  $date->format('Y-m-d');
				$dateobj->to =  $date->format('Y-m-d');
				break;
		}

		return $dateobj;
	}

	public function timelap($time_ago, $format = 's')
	{

		$current_time    = time();
		$time_difference = $current_time - $time_ago;
		$seconds         = $time_difference;

		$minutes = round($seconds / 60); // value 60 is seconds
		$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
		$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
		$weeks   = round($seconds / 604800); // 7*24*60*60;
		$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
		$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		switch ($format) {
			case 'minutes':
				return $minutes;
				break;
			case 'hours':
				return $hours;
				break;
			case 'days':
				return $days;
				break;
			case 'weeks':
				return $weeks;
				break;
			case 'months':
				return $months;
				break;
			case 'years':
				return $years;
				break;
			default:
				return $seconds;
				break;
		}
	}

	/**
	 * @param mixed $time_ago 
	 * @return string 
	 */
	public function Cycle($time_ago)
	{
		$current_time    = time();
		$time_difference = $current_time - $time_ago;
		$seconds         = $time_difference;

		$minutes = round($seconds / 60); // value 60 is seconds
		$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
		$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
		$weeks   = round($seconds / 604800); // 7*24*60*60;
		$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
		$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "Just Now";
		} else if ($minutes <= 60) {
			if ($minutes == 1) {
				return "one minute ago";
			} else {
				return "$minutes minutes ago";
			}
		} else if ($hours <= 24) {
			if ($hours == 1) {
				return "an hour ago";
			} else {
				return "$hours hrs ago";
			}
		} else if ($days <= 7) {
			if ($days == 1) {
				return "yesterday";
			} else {
				return "$days days ago";
			}
		} else if ($weeks <= 4.3) {
			if ($weeks == 1) {
				return "a week ago";
			} else {
				return "$weeks weeks ago";
			}
		} else if ($months <= 12) {
			if ($months == 1) {
				return "a month ago";
			} else {
				return "$months months ago";
			}
		} else {
			if ($years == 1) {
				return "one year ago";
			} else {
				return "$years years ago";
			}
		}
	}

	/**
	 * @param mixed $mins 
	 * @return string 
	 */
	public function AddMinsToDate($mins)
	{
		$date = new \DateTime();
		$date->setTimezone(new \DateTimeZone('Africa/Lagos'));
		$date->modify("+{$mins} minutes");
		return $date->format('Y-m-d h:i:s');
	}

	/**
	 * @param mixed $days 
	 * @return string 
	 */
	public function AddDaysToDate($days)
	{
		$mins = $days * 24 * 60;
		$date = new \DateTime();
		$date->setTimezone(new \DateTimeZone('Africa/Lagos'));
		$date->modify("+{$mins} minutes");
		return $date->format('Y-m-d h:i:s');
	}

	/**
	 * @param mixed $mins 
	 * @return string 
	 */
	public function RemoveMinsFromDate($mins)
	{
		$date = new \DateTime();
		$date->setTimezone(new \DateTimeZone('Africa/Lagos'));
		$date->modify("-{$mins} minutes");
		return $date->format('Y-m-d h:i:s');
	}

	/**
	 * @param mixed $days 
	 * @return string 
	 */
	public function RemoveDaysFromDate($days)
	{
		$mins = $days * 24 * 60;
		$date = new \DateTime();
		$date->setTimezone(new \DateTimeZone('Africa/Lagos'));
		$date->modify("-{$mins} minutes");
		return $date->format('Y-m-d h:i:s');
	}

	/**
	 * @param mixed $path 
	 * @return bool 
	 */
	public function createPath($path)
	{
		if (is_dir($path)) return true;
		$prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
		$return = $this->createPath($prev_path);
		return ($return && is_writable($prev_path)) ? mkdir($path, 0777, true) : false;
	}

	/**
	 * @param mixed $start 
	 * @param mixed $end 
	 * @return \stdClass 
	 */
	public function dateDiff($start, $end)
	{

		$dateDiff = new \stdClass;

		// Declare and define two dates
		$date1 = strtotime($start);
		$date2 = strtotime($end);

		// Formulate the Difference between two dates
		$diff = abs($date2 - $date1);
		$dateDiff->diff = $diff;

		// To get the year divide the resultant date into
		// total seconds in a year (365*60*60*24)
		$years = floor($diff / (365 * 60 * 60 * 24));
		$dateDiff->years = $years;

		// To get the month, subtract it with years and
		// divide the resultant date into
		// total seconds in a month (30*60*60*24)
		$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
		$dateDiff->months = $months;

		// To get the day, subtract it with years and
		// months and divide the resultant date into
		// total seconds in a days (60*60*24)
		$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
		$dateDiff->days = $days;

		// To get the hour, subtract it with years,
		// months & seconds and divide the resultant
		// date into total seconds in a hours (60*60)
		$hours = floor(($diff - $years * 365 * 60 * 60 * 24  - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
		$dateDiff->hours = $hours;

		// To get the minutes, subtract it with years,
		// months, seconds and hours and divide the
		// resultant date into total seconds i.e. 60
		$minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
		$dateDiff->minutes = $minutes;

		// To get the minutes, subtract it with years,
		// months, seconds, hours and minutes
		$seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));
		$dateDiff->seconds = $seconds;

		return $dateDiff;
	}

	/**
	 * @param mixed $filepath 
	 * @return int 
	 */
	public function CountExcelRows($filepath)
	{
		$file = new \SplFileObject($filepath, 'r');
		$file->seek(PHP_INT_MAX);
		$CountExcelRows = $file->key() + 1;
		return $CountExcelRows;
	}


	/**
	 * @param mixed $imgpath 
	 * @return string 
	 */
	public function SetDivBg($imgpath)
	{
		$htm = "";
		$htm .= "background-image: url('{$imgpath}');";
		$htm .= "background-position:center;";
		$htm .= "background-repeat:no-repeat;";
		$htm .= "background-size:cover;";
		return $htm;
	}



	// Email Sending Codes//

	/**
	 * @param mixed $email 
	 * @param mixed $fullname 
	 * @param mixed $subject 
	 * @param mixed $body 
	 * @param string $type 
	 * @return void 
	 */
	public function sendMail($email, $fullname, $subject, $body, $template = 'mails.default')
	{
		$Mailer = new Emailer();
		$EmailTemplate = new EmailTemplate($template);
		$EmailTemplate->subject = $subject;
		$EmailTemplate->fullname = $fullname;
		$EmailTemplate->mailbody = $body;
		$Mailer->SetTemplate($EmailTemplate);
		$Mailer->toEmail = $email;
		$Mailer->toName = "{$fullname}";
		$Mailer->subject = "{$subject}";
		$Mailer->fromEmail = "notix@ebsgfinance.net";
		$Mailer->fromName = "EBSG.Finance";
		$sent = $Mailer->send();
	}
	// Email Sending Codes//


	public function emailExists($email)
	{
		$Mysqli = new MysqliDb;
		$Mysqli->where('email', $email);
		$email_exists = $Mysqli->getOne('golojan_accounts');
		return (int)$email_exists['accid'];
	}

	public function mobileExists($mobile)
	{
		$Mysqli = new MysqliDb;
		$Mysqli->where('mobile', $mobile);
		$mobile_exists = $Mysqli->getOne('golojan_accounts');
		return (int)$mobile_exists['accid'];
	}



	public function RegisterAccount($fullname, $email, $mobile, $password)
	{
		$pass_word = $this->Passwordify($password);

		mysqli_query($this->dbCon, "INSERT INTO golojan_accounts(fullname,email,mobile,password) VALUES('$fullname','$email','$mobile','$pass_word')");
		$accid = (int)$this->getLastId();
		if ($accid) {
			$this->NewStore($accid);
			$this->NewWallet($accid);
			return $accid;
		}
		return false;
	}


	public function NewWallet($accid)
	{
		mysqli_query($this->dbCon, "INSERT INTO golojan_wallets(accid) VALUES('$accid')");
		$wallid = (int)$this->getLastId();
		if ($wallid) {
			return $accid;
		}
		return false;
	}


	public function HasStore($accid)
	{
		$storeid = 0;
		$Mysqli = new MysqliDb;
		$Mysqli->where('accid', $accid);
		$HasStore = $Mysqli->getOne('golojan_stores');
		if (!(int)$HasStore['id']) {
			$storeid = $this->NewStore($accid);
		}
		return $storeid;
	}


	/**
	 * @param mixed $accid 
	 * @return int|false 
	 */
	public function NewStore($accid)
	{

		$initial_store_capacity = initial_store_capacity;
		mysqli_query($this->dbCon, "INSERT INTO golojan_stores(accid,capacity) VALUES('$accid','$initial_store_capacity')");
		$storid = (int)$this->getLastId();
		if ($storid) {
			return $storid;
		}
		return false;
	}


	public function SetStoreInfo($storeid, $key, $val)
	{
		mysqli_query($this->dbCon, "UPDATE golojan_stores SET $key='$val' where id='$storeid' OR accid='$storeid'");
		return mysqli_affected_rows($this->dbCon);
	}


	public function StoreInfo($storeid)
	{
		$StoreInfo = mysqli_query($this->dbCon, "select * from golojan_stores where id='$storeid' OR accid='$storeid'");
		$StoreInfo = mysqli_fetch_object($StoreInfo);
		return $StoreInfo;
	}


	/**
	 * @param mixed $username 
	 * @param mixed $password 
	 * @return object|null 
	 */
	public function UserLogin($username, $password)
	{
		$pass_word = $this->Passwordify($password);
		$UserLogin = mysqli_query($this->dbCon, "select * from golojan_accounts where (email='$username' OR mobile='$username') AND password='$pass_word'");
		$UserLogin = mysqli_fetch_object($UserLogin);
		if (isset($UserLogin->accid)) {
			$this->SetUserInfo($UserLogin->accid, "lastseen", date("Y-m-d g:i:s"));
			return $UserLogin;
		}
		return false;
	}



	public function VerifyOTP($accid, $otp)
	{

		$Sess = new Session;

		$VerifyOTP = mysqli_query($this->dbCon, "select * from golojan_accounts where accid='$accid'");
		$VerifyOTP = mysqli_fetch_object($VerifyOTP);

		$otp_pending = (int)$VerifyOTP->otp_pending;
		$otp_time = strtotime($VerifyOTP->otp_time);
		$savedotp = $VerifyOTP->otp;
		if ($otp_pending) {
			//Check if it hasn't expiered//
			$now_time = strtotime(date("Y-m-d g:i:s"));
			$t_diff = $now_time - $otp_time;
			$t_mins = round($t_diff / 60);
			if ($t_mins <= otp_live_time) {
				$otp_match = (int)$otp == $savedotp;
				$Sess->removedata('accid');
				return $otp_match;
			} else {
				$Sess->removedata('accid');
				return (int)false;
			}
		}
		return (int)false;
	}


	/**
	 * @param mixed $username 
	 * @return object|null 
	 */
	public function UserInfo($username, $keyname = null)
	{
		if ($keyname == null) {
			$UserInfo = mysqli_query($this->dbCon, "select * from golojan_accounts where email='$username' OR accid='$username' OR mobile='$username'");
			$UserInfo = mysqli_fetch_object($UserInfo);
			return $UserInfo;
		} else {
			$UserInfo = mysqli_query($this->dbCon, "select {$keyname} from golojan_accounts where email='$username' OR accid='$username' OR mobile='$username'");
			$UserInfo = mysqli_fetch_object($UserInfo);
			if (isset($UserInfo->$keyname)) {
				return $UserInfo->$keyname;
			}
			return false;
		}
	}




	/**
	 * @param mixed $username 
	 * @param mixed $key 
	 * @param mixed $val 
	 * @return int 
	 */
	public function SetUserInfo($username, $key, $val)
	{
		mysqli_query($this->dbCon, "UPDATE golojan_accounts SET $key='$val' where email='$username' OR accid='$username' OR mobile='$username'");
		return mysqli_affected_rows($this->dbCon);
	}





	public function getSponsor($accid)
	{
		$getSponsor = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE accid='$accid'");
		$getSponsor = mysqli_fetch_object($getSponsor);
		$sponsor = $getSponsor->sponsor;
		if (isset($sponsor)) {
			$MySponsor = $this->UserInfo($sponsor);
			if (isset($MySponsor->accid)) {
				return "{$MySponsor->fullname}({$MySponsor->accid})";
			}
		}
		return "---";
	}

	public function getReferrer($accid)
	{
		$getReferrer = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE accid='$accid'");
		$getReferrer = mysqli_fetch_object($getReferrer);
		$referrer = $getReferrer->referrer;
		if (isset($referrer)) {
			$MyReferrer = $this->UserInfo($referrer);
			if (isset($MyReferrer->accid)) {
				return "{$MyReferrer->fullname}({$MyReferrer->accid})";
			}
		}
		return "---";
	}




	public function UserExists($username)
	{
		$UserExists = mysqli_query($this->dbCon, "select * from golojan_accounts where email='$username' OR accid='$username' OR mobile='$username'");
		$UserExists = mysqli_fetch_object($UserExists);
		if (isset($UserExists->accid)) {
			return true;
		}
		return false;
	}

	public function LevelInfo($level)
	{
		$LevelInfo = mysqli_query($this->dbCon, "select * from golojan_levels where level='$level'");
		$LevelInfo = mysqli_fetch_object($LevelInfo);
		return $LevelInfo;
	}

	public function LoadUserBadge($accid)
	{
		$LoadBadges = mysqli_query($this->dbCon, "select badges from golojan_accounts where accid='$accid'");
		$LoadBadges = mysqli_fetch_object($LoadBadges);
		$badges = $LoadBadges->badges;
		$badges = json_decode($badges);
		$top_badge = max($badges);
		$BadgeInfo = $this->BadgeInfo($top_badge);
		return $BadgeInfo;
	}


	public function BadgeInfo($id)
	{
		$BadgeInfo = mysqli_query($this->dbCon, "select * from golojan_badges where id='$id'");
		$BadgeInfo = mysqli_fetch_object($BadgeInfo);
		return $BadgeInfo;
	}



	/**
	 * @param mixed $username 
	 * @return object|null 
	 */
	public function WalletInfo($username)
	{
		$WalletInfo = mysqli_query($this->dbCon, "select * from golojan_wallets where accid='$username'");
		$WalletInfo = mysqli_fetch_object($WalletInfo);
		return $WalletInfo;
	}



	public function Wallet($username)
	{
		$wallet = new stdClass;
		$WalletInfo = $this->WalletInfo($username);
		$wallet->open = (float) ($WalletInfo->open_balance);
		$wallet->closed = (float) $WalletInfo->closed_balance;
		$wallet->balance = (float) $WalletInfo->open_balance +  $WalletInfo->closed_balance;
		return $wallet;
	}


	public function Categories()
	{
		$Categories = mysqli_query($this->dbCon, "select * from golojan_categories where enabled='1'");
		return $Categories;
	}

	/**
	 * @param int $catid 
	 * @return string 
	 */
	public function LoadCategories($catid = 0)
	{
		$html = "<option value=\"\">SELECT Category</option>";
		$Categories = mysqli_query($this->dbCon, "SELECT * FROM golojan_categories WHERE enabled='1' ");
		while ($cat = mysqli_fetch_object($Categories)) {
			$selected = ($catid == $cat->id) ? "selected" : "";
			$html .= "<option {$selected} value=\"{$cat->id}\">{$cat->category}</option>";
		}
		return $html;
	}


	/**
	 * @param mixed $catid 
	 * @return object|null 
	 */
	public function CategoryInfo($catid)
	{
		$CategoryInfo = mysqli_query($this->dbCon, "select * from golojan_categories where id='$catid'");
		$CategoryInfo = mysqli_fetch_object($CategoryInfo);
		return $CategoryInfo;
	}

	public function Products()
	{
		$Products = mysqli_query($this->dbCon, "SELECT * FROM golojan_products WHERE enabled='1'");
		return $Products;
	}

	public function Productinfo($id)
	{
		$Productinfo = mysqli_query($this->dbCon, "select * from golojan_products where id='$id'");
		$Productinfo = mysqli_fetch_object($Productinfo);
		return $Productinfo;
	}

	public function CategoryProducts($catid = 0)
	{
		if ($catid == 0) {
			$Products = mysqli_query($this->dbCon, "SELECT * FROM golojan_products WHERE enabled='1'");
		} else {
			$Products = mysqli_query($this->dbCon, "SELECT * FROM golojan_products WHERE category='$catid' AND enabled='1'");
		}
		return $Products;
	}



	public function ListFAQs()
	{
		$ListFAQs = mysqli_query($this->dbCon, "select * from golojan_faqs ORDER BY id ASC");
		return $ListFAQs;
	}


	public function ListVideos()
	{
		$ListVideos = mysqli_query($this->dbCon, "select * from golojan_tutorials ORDER BY id ASC");
		return $ListVideos;
	}


	public function VideoBanner($videocode, $type = 'youtube')
	{

		switch ($type) {
			case 'youtube':
				$vidbanner = "https://img.youtube.com/vi/{$videocode}/0.jpg";
				break;

			case 'vimeo':
				$vidbanner = "./_store/imgs/playbtn.png";
				break;

			default:
				$vidbanner = "./_store/imgs/playbtn.png";
				break;
		}
		return $vidbanner;
	}



	public function VideoInfo($id)
	{
		$VideoInfo = mysqli_query($this->dbCon, "select * from golojan_tutorials where id='$id'");
		$VideoInfo = mysqli_fetch_object($VideoInfo);
		return $VideoInfo;
	}



	public function RunSwitch($product, $accid)
	{
		$inStock = mysqli_query($this->dbCon, "SELECT id FROM golojan_stock_list WHERE product='$product' AND accid='$accid'");
		$inStock = mysqli_fetch_object($inStock);
		if (isset($inStock->id)) {
			return " checked";
		}
		return " ";
	}

	public function inStock($product, $accid)
	{
		$inStock = mysqli_query($this->dbCon, "SELECT * FROM golojan_stock_list WHERE product='$product' AND accid='$accid'");
		$inStock = mysqli_fetch_object($inStock);
		if (isset($inStock->id)) {
			return $inStock->id;
		}
		return false;
	}

	public function ComputeStockList($accid)
	{
		$Computed = new stdClass;
		$count = $this->CountStock($accid);
		$sum = 0;
		$ComputeStockList = mysqli_query($this->dbCon, "SELECT product FROM golojan_stock_list WHERE accid='$accid'");
		while ($stock = mysqli_fetch_object($ComputeStockList)) {
			$ThisProduct = $this->Productinfo($stock->product);
			$sum += $ThisProduct->selling;
		}
		$Computed->sum = $sum;
		$Computed->count = $count;
		return $Computed;
	}



	public function StoreCapacity($accid)
	{
		$sum = 0;
		$AvailableStoreCapacity = mysqli_query($this->dbCon, "SELECT product FROM golojan_stock_list WHERE accid='$accid'");
		while ($stock = mysqli_fetch_object($AvailableStoreCapacity)) {
			$ThisProduct = $this->Productinfo($stock->product);
			$sum += $ThisProduct->selling;
		}
		$Store = $this->StoreInfo($accid);
		$capacity = $Store->capacity;
		$available = $capacity - $sum;
		return $available;
	}

	public function StockVolume($accid)
	{
		$ComputeStockList = $this->ComputeStockList($accid);
		$StockVolume = $ComputeStockList->sum;
		return $StockVolume;
	}


	public function AvailableStock($accid)
	{
		$ComputeStockList = $this->ComputeStockList($accid);
		$StockVolume = $ComputeStockList->sum;
		$ThisStore = $this->StoreInfo($accid);
		$AvailableStock = $ThisStore->capacity - $StockVolume;
		return (float)$AvailableStock;
	}


	public function CountStock($accid)
	{
		$CountStock = mysqli_query($this->dbCon, "SELECT COUNT(id) AS stocked FROM golojan_stock_list WHERE accid='$accid'");
		$CountStock = mysqli_fetch_object($CountStock);
		return $CountStock->stocked;
	}

	public function Stocklist($accid)
	{
		$StockInfo = mysqli_query($this->dbCon, "SELECT * FROM golojan_stock_list WHERE accid='$accid'");
		$StockInfo = mysqli_fetch_object($StockInfo);
		return $StockInfo;
	}

	public function StockInfo($ID)
	{
		$StockInfo = mysqli_query($this->dbCon, "SELECT * FROM golojan_stock_list WHERE id='$ID'");
		$StockInfo = mysqli_fetch_object($StockInfo);
		return $StockInfo;
	}


	public function AddStock($product, $accid)
	{
		if (!$this->inStock($product, $accid)) {
			mysqli_query($this->dbCon, "INSERT INTO golojan_stock_list(accid,product) VALUES('$accid','$product')");
			return true;
		}
		return false;
	}

	public function RemoveStock($product, $accid)
	{
		mysqli_query($this->dbCon, "DELETE golojan_stock_list.* FROM golojan_stock_list  WHERE product='$product' AND accid='$accid'");
		return $this->countAffected();
	}


	public function MyReferrals($accid)
	{
		mysqli_query($this->dbCon, "SELECT accid FROM golojan_accounts WHERE referrer='$accid'");
		return $this->countAffected();
	}

	public function MyTotalNetwork($accid)
	{
		$nsum = 0;
		$nsum += count($this->MyNetwork($accid, 1));
		$nsum += count($this->MyNetwork($accid, 2));
		$nsum += count($this->MyNetwork($accid, 3));
		$nsum += count($this->MyNetwork($accid, 4));
		$nsum += count($this->MyNetwork($accid, 5));
		$nsum += count($this->MyNetwork($accid, 6));
		$nsum += count($this->MyNetwork($accid, 7));
		$nsum += count($this->MyNetwork($accid, 8));
		return (int)$nsum;
	}




	public function GetUpliner($accid, $level = 0)
	{
		$upliner = root_accid;

		$User = $this->UserInfo($accid, "sponsor");
		$l1_sponsor = $User->sponsor;

		$User = $this->UserInfo($l1_sponsor, "sponsor");
		$l2_sponsor = $User->sponsor;

		$User = $this->UserInfo($l2_sponsor, "sponsor");
		$l3_sponsor = $User->sponsor;

		$User = $this->UserInfo($l3_sponsor, "sponsor");
		$l4_sponsor = $User->sponsor;

		$User = $this->UserInfo($l4_sponsor, "sponsor");
		$l5_sponsor = $User->sponsor;

		$User = $this->UserInfo($l5_sponsor, "sponsor");
		$l6_sponsor = $User->sponsor;

		$User = $this->UserInfo($l6_sponsor, "sponsor");
		$l7_sponsor = $User->sponsor;

		$User = $this->UserInfo($l7_sponsor, "sponsor");
		$l8_sponsor = $User->sponsor;

		switch ($level) {
			case 1:
				return $l1_sponsor;
				break;
			case 2:
				return $l2_sponsor;
				break;

			case 3:
				return $l3_sponsor;
				break;

			case 4:
				return $l4_sponsor;
				break;

			case 5:
				return $l5_sponsor;
				break;

			case 6:
				return $l6_sponsor;
				break;

			case 7:
				return $l7_sponsor;
				break;

			case 8:
				return $l8_sponsor;
				break;
			default:
				return $upliner;
				break;
		}
	}



	//NETWORKING//
	public function MyNetwork($accid, $level = 0, $category = "sponsor")
	{

		$l0_accids_array = array();
		$l1_accids_array = array();
		$l2_accids_array = array();
		$l3_accids_array = array();
		$l4_accids_array = array();
		$l5_accids_array = array();
		$l6_accids_array = array();
		$l7_accids_array = array();
		$l8_accids_array = array();

		$l0_referr_array = array();
		$l1_referr_array = array();
		$l2_referr_array = array();
		$l3_referr_array = array();
		$l4_referr_array = array();
		$l5_referr_array = array();
		$l6_referr_array = array();
		$l7_referr_array = array();
		$l8_referr_array = array();

		switch ($level) {
			case '1':
				# code...
				$L1 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$accid'");
				while ($l1 = mysqli_fetch_object($L1)) {
					$l1_accids_array[] = $l1->accid;
					$U1 = $this->UserInfo($l1->accid);
					if ($U1->referrer == $accid) {
						$l1_referr_array[] = $l1->accid;
					}
				}
				if ($category == "sponsor") {
					return $l1_accids_array;
				} elseif ($category == "referrer") {
					return $l1_referr_array;
				}
				break;
			case '2':
				# code...
				$Lr1 = $this->MyNetwork($accid, 1);
				if (!count($Lr1)) return $l2_accids_array;
				foreach ($Lr1 as $lr1) {
					$L2 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr1'");
					while ($l2 = mysqli_fetch_object($L2)) {
						$l2_accids_array[] = $l2->accid;
						$U2 = $this->UserInfo($l2->accid);
						if ($U2->referrer == $accid) {
							$l2_referr_array[] = $l2->accid;
						}
					}
					if ($category == "sponsor") {
						return $l2_accids_array;
					} elseif ($category == "referrer") {
						return $l2_referr_array;
					}
				}
				break;
			case '3':
				# code...
				$Lr2 = $this->MyNetwork($accid, 2);
				if (!count($Lr2)) return $l3_accids_array;
				foreach ($Lr2 as $lr2) {
					$L3 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr2'");
					while ($l3 = mysqli_fetch_object($L3)) {
						$l3_accids_array[] = $l3->accid;
						$U3 = $this->UserInfo($l3->accid);
						if ($U3->referrer == $accid) {
							$l3_referr_array[] = $l3->accid;
						}
					}
					if ($category == "sponsor") {
						return $l3_accids_array;
					} elseif ($category == "referrer") {
						return $l3_referr_array;
					}
				}
				break;
			case '4':
				# code...
				$Lr3 = $this->MyNetwork($accid, 3);
				if (!count($Lr3)) return $l4_accids_array;
				foreach ($Lr3 as $lr3) {
					$L4 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr3'");
					while ($l4 = mysqli_fetch_object($L4)) {
						$l4_accids_array[] = $l4->accid;
						$U4 = $this->UserInfo($l4->accid);
						if ($U4->referrer == $accid) {
							$l4_referr_array[] = $l4->accid;
						}
					}
					if ($category == "sponsor") {
						return $l4_accids_array;
					} elseif ($category == "referrer") {
						return $l4_referr_array;
					}
				}
				break;
			case '5':
				# code...
				$Lr4 = $this->MyNetwork($accid, 4);
				if (!count($Lr4)) return $l5_accids_array;
				foreach ($Lr4 as $lr4) {
					$L5 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr4'");
					while ($l5 = mysqli_fetch_object($L5)) {
						$l5_accids_array[] = $l5->accid;
						$U5 = $this->UserInfo($l5->accid);
						if ($U5->referrer == $accid) {
							$l5_referr_array[] = $l5->accid;
						}
					}
					if ($category == "sponsor") {
						return $l5_accids_array;
					} elseif ($category == "referrer") {
						return $l5_referr_array;
					}
				}
				break;
			case '6':
				# code...
				$Lr5 = $this->MyNetwork($accid, 5);
				if (!count($Lr5)) return $l6_accids_array;
				foreach ($Lr5 as $lr5) {
					$L6 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr5'");
					while ($l6 = mysqli_fetch_object($L6)) {
						$l6_accids_array[] = $l6->accid;
						$U6 = $this->UserInfo($l6->accid);
						if ($U6->referrer == $accid) {
							$l6_referr_array[] = $l6->accid;
						}
					}
					if ($category == "sponsor") {
						return $l6_accids_array;
					} elseif ($category == "referrer") {
						return $l6_referr_array;
					}
				}
				break;
			case '7':
				# code...
				$Lr6 = $this->MyNetwork($accid, 6);
				if (!count($Lr6)) return $l7_accids_array;
				foreach ($Lr6 as $lr6) {
					$L7 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr6'");
					while ($l7 = mysqli_fetch_object($L7)) {
						$l7_accids_array[] = $l7->accid;
						$U7 = $this->UserInfo($l7->accid);
						if ($U7->referrer == $accid) {
							$l7_referr_array[] = $l7->accid;
						}
					}
					if ($category == "sponsor") {
						return $l7_accids_array;
					} elseif ($category == "referrer") {
						return $l7_referr_array;
					}
				}
				break;

			case '8':
				# code...
				$Lr7 = $this->MyNetwork($accid, 7);
				if (!count($Lr7)) return $l8_accids_array;
				foreach ($Lr7 as $lr7) {
					$L8 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr7'");
					while ($l8 = mysqli_fetch_object($L8)) {
						$l8_accids_array[] = $l8->accid;
						$U8 = $this->UserInfo($l8->accid);
						if ($U8->referrer == $accid) {
							$l8_referr_array[] = $l8->accid;
						}
					}
					if ($category == "sponsor") {
						return $l8_accids_array;
					} elseif ($category == "referrer") {
						return $l8_referr_array;
					}
				}
				break;
			default:
				# code...
				if ($category == "sponsor") {
					return $l0_accids_array;
				} elseif ($category == "referrer") {
					return $l0_referr_array;
				}
				break;
		}
	}

	function MyTree($sponsor)
	{
		$children = array();
		// retrieve all children of $parent 
		$result = mysqli_query($this->dbCon, "SELECT accid,lleg,rleg,sponsor,(lleg+rleg) AS legs FROM golojan_accounts WHERE sponsor='$sponsor'");
		// display each child 
		while ($row = mysqli_fetch_object($result)) {
			// indent and display the data of this child'
			if ($row->legs == 0) {
				break;
			}
			$children[] = $row->accid;
			// call this function again to display this 	
			// child's children
			$this->MyTree($row->accid);
			die($row->legs);
		}
		return $children;
	}



	public function MyTree2($sponsor)
	{

		$sponsor_lleg = $this->UserInfo($sponsor, "lleg");
		$sponsor_rleg = $this->UserInfo($sponsor, "rleg");

		$right = array();

		die(0);

		// retrieve all children of $parent 
		$result = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE lleg BETWEEN $sponsor_lleg AND $sponsor_rleg");
		// display each child 
		while ($row = mysqli_fetch_array($result)) {
			// only check stack if there is one  
			if (count($right) > 0) {
				// check if we should remove a node from the stack  
				while ($right[count($right) - 1] < $row['rleg']) {
					array_pop($right);
				}
			}
			// display indented node title  
			// add this node to the stack  
			$right[] = $row['rleg'];
		}
	}


	public function Stories($level = 0)
	{
		$Stories = mysqli_query($this->dbCon, "select * from golojan_stories ORDER BY created ASC");
		return $Stories;
	}

	public function StoryInfo($id)
	{
		$StoryInfo = mysqli_query($this->dbCon, "select * from golojan_stories where id='$id'");
		$StoryInfo = mysqli_fetch_object($StoryInfo);
		return $StoryInfo;
	}


	//PONSORS & SPILLOVERS
	public function setSponsor($accid, $sponsor)
	{
		$netSP1 = $this->MyNetwork($sponsor, 1);
		$netCT1 = count($netSP1);
		if ($netCT1 < 2) {
			if ($this->FillLegs($sponsor, $accid)) {
				$h = $this->SetUserInfo($accid, "sponsor", $sponsor);
			}
			return true;
		} else {
			$new_sponsor = (int)$this->getSpillover($accid, $sponsor);
			if ($new_sponsor) {
				if ($this->FillLegs($sponsor, $accid)) {
					$this->SetUserInfo($accid, "sponsor", $new_sponsor);
				}
			}
			return false;
		}
	}



	public function FillLegs($sponsor, $accid)
	{
		$USER = $this->UserInfo($sponsor);
		$lleg = $USER->lleg;
		$rleg = $USER->rleg;
		if ($lleg == 0) {
			$this->SetUserInfo($sponsor, "lleg", $accid);
			return true;
		} else {
			if ($rleg == 0) {
				$this->SetUserInfo($sponsor, "rleg", $accid);
				return true;
			}
		}
		return false;
	}



	public function getSpillover($accid, $sponsor = 0)
	{
		if ($sponsor) {

			$netSP1 = $this->MyNetwork($sponsor, 1);

			$netSP2 = $this->MyNetwork($sponsor, 2);
			$netCT2 = count($netSP2);
			if ($netCT2 < 4) {
				foreach ($netSP1 as $netsp1) {
					$sub_net = $this->MyNetwork($netsp1, 1);
					if (count($sub_net) < 2) {
						return $netsp1;
					}
				}
			}

			$netSP3 = $this->MyNetwork($sponsor, 3);
			$netCT3 = count($netSP3);
			if ($netCT3 < 8) {
				foreach ($netSP2 as $netsp2) {
					$sub_net = $this->MyNetwork($netsp2, 1);
					if (count($sub_net) < 2) {
						return $netsp1;
					}
				}
			}


			$netSP4 = $this->MyNetwork($sponsor, 4);
			$netCT4 = count($netSP4);
			if ($netCT4 < 16) {
				foreach ($netSP3 as $netsp3) {
					$sub_net = $this->MyNetwork($netsp3, 1);
					if (count($sub_net) < 2) {
						return $netsp3;
					}
				}
			}
		} else {

			//Randomely Get Spillover//
			$new_sponsor = $this->RandomSpillover($accid);
			//$this->debug($new_sponsor);

			return $new_sponsor;
			//Randomely Get Spillover//

		}
	}


	public function RandomSpillover($accid, $params = array())
	{
		$RandomSpillover = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE (rleg='0' OR lleg='0') AND accid!='$accid' ORDER BY created ASC LIMIT 1");
		$RandomSpillover = mysqli_fetch_object($RandomSpillover);
		return $RandomSpillover->accid;
	}




	//Payments & Transactions//

	public function genTransid($accid)
	{
		$prefix = "GT-F";
		$genTransid = mysqli_query($this->dbCon, "SELECT MAX(id) AS  maxid from golojan_fundings");
		$genTransid = mysqli_fetch_object($genTransid);
		$maxid = $genTransid->maxid;
		$maxid = $maxid + 1;
		$maxid = str_pad($maxid, 6, '0', STR_PAD_LEFT);
		return "{$prefix}{$maxid}";
	}


	public function StartFunding($accid,$transid,$amount,$method,$to_accid)
	{
		mysqli_query($this->dbCon, "INSERT INTO golojan_fundings(accid,transid,amount,method,to_accid) VALUES('$accid','$transid','$amount','$method','$to_accid')");
		return (int)$this->getLastId();
	}




	//Locations

	/** @return \mysqli_result|bool  */
	public  function Locations()
	{
		$Locations = mysqli_query($this->dbCon, "SELECT * FROM golojan_locations WHERE enabled='1'");
		return $Locations;
	}


	public function LocationInfo($id)
	{
		$LocationInfo = mysqli_query($this->dbCon, "SELECT * FROM golojan_locations WHERE id='$id'");
		$LocationInfo = mysqli_fetch_object($LocationInfo);
		return $LocationInfo;
	}

	public function Relocation($accid)
	{
		$template = new Template;
		$loc = (int)$this->UserInfo($accid, "location");
		if ($loc == 0) {
			$template->redirect("/locations/setup");
		}
		return false;
	}

















	/** @return \mysqli_result|bool  */
	public  function SiteInfos()
	{
		$SiteInfos = mysqli_query($this->dbCon, "SELECT * FROM dati_siteinfo");
		return $SiteInfos;
	}

	/**
	 * @param mixed $name 
	 * @return mixed 
	 */
	public  function getSiteInfo($name)
	{
		$getSiteInfo = mysqli_query($this->dbCon, "SELECT `value` FROM dati_siteinfo WHERE name='$name'");
		$getSiteInfo = mysqli_fetch_object($getSiteInfo);
		return $getSiteInfo->value;
	}

	/**
	 * @param mixed $name 
	 * @param mixed $value 
	 * @return int 
	 */
	public  function setSiteInfo($name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE dati_siteinfo SET value='$value' WHERE name='$name'");
		return $this->countAffected();
	}
}
