<?php

//Write your custome class/methods here
namespace Apps;

use stdClass;
use \Apps\Model;
use \Apps\Session;
use \Apps\MysqliDb;

use \Apps\EmailTemplate;


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
		$amount = number_format($amount, 2, ".", ",");
		return "&#x20A6;" . $amount;
	}

	/**
	 * @param mixed $amount 
	 * @return string 
	 */
	public function Naira($amount)
	{
		$amount = number_format($amount, 0, ".", ",");
		return "&#x20A6;" . $amount;
	}

	/**
	 * @param mixed $amount 
	 * @return string 
	 */
	public function ToNGN($amount)
	{
		$amount = number_format($amount, 2, ".", ",");
		return "NGN " . $amount;
	}

	/** @return string  */
	public function NGN()
	{
		return "&#x20A6;";
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


	/**
	 * @param mixed $amount 
	 * @return string 
	 */
	public function Monify($amount)
	{
		$amount = number_format($amount, 0, ".", ",");
		return "&#x20A6;" . $amount;
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
		$Passwordify = md5($password);
		return $Passwordify;
	}
	/**
	 * @param mixed $data 
	 * @return string 
	 */
	public function encode($data)
	{
		$encode = sha1(md5($data));
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
		mysqli_query($this->dbCon, "INSERT INTO golojan_accounts(fullname,email,mobile,password) VALUES('$fullname','$email','$mobile','$password')");
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
		$UserLogin = mysqli_query($this->dbCon, "select * from golojan_accounts where (email='$username' OR mobile='$username') AND password='$password'");
		$UserLogin = mysqli_fetch_object($UserLogin);
		$this->SetUserInfo($UserLogin->accid, "lastseen", date("Y-m-d g:i:s"));
		return $UserLogin;
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
	public function UserInfo($username)
	{
		$UserInfo = mysqli_query($this->dbCon, "select * from golojan_accounts where email='$username' OR accid='$username' OR mobile='$username'");
		$UserInfo = mysqli_fetch_object($UserInfo);
		return $UserInfo;
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


	public function UserExists($username)
	{
		$UserExists = mysqli_query($this->dbCon, "select * from golojan_accounts where email='$username' OR accid='$username' OR mobile='$username'");
		$UserExists = mysqli_fetch_object($UserExists);
		if (isset($UserExists->accid)) {
			return true;
		}
		return false;
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


	//NETWORKING//
	public function MyNetwork($accid, $level = 0)
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


		switch ($level) {
			case '1':
				# code...
				$L1 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$accid'");
				while ($l1 = mysqli_fetch_object($L1)) {
					$l1_accids_array[] = $l1->accid;
				}
				return $l1_accids_array;
				break;
			case '2':
				# code...
				$Lr1 = $this->MyNetwork($accid, 1);
				if (!count($Lr1)) return $l2_accids_array;
				foreach ($Lr1 as $lr1) {
					$L2 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$lr1'");
					while ($l2 = mysqli_fetch_object($L2)) {
						$l2_accids_array[] = $l2->accid;
					}
					return $l2_accids_array;
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
					}
					return $l3_accids_array;
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
					}
					return $l4_accids_array;
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
					}
					return $l5_accids_array;
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
					}
					return $l6_accids_array;
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
					}
					return $l7_accids_array;
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
					}
					return $l8_accids_array;
				}
				break;
			default:
				# code...
				return $l0_accids_array;
				break;
		}
	}


	public function MyTree($accid, $level = 0)
	{

		$TreeRootUSer = $this->UserInfo($accid);

		$script = "<script type=\"text/javascript\">";
		$script .= "var count = 1;";
		$script .= "var root = new TreeNode(\"{$TreeRootUSer->accid}({$TreeRootUSer->fullname})\");";

		# code...
		$L1 = mysqli_query($this->dbCon, "SELECT * FROM golojan_accounts WHERE sponsor='$accid'");
		while ($l1 = mysqli_fetch_object($L1)){

			$TreeRootUSer = $this->UserInfo($l1->accid);
			$script .= "root.addChild({{$TreeRootUSer->accid}({$TreeRootUSer->fullname})});";
		}
		$script .= "var view = new TreeView(root, \"#xNetTree\");";
		
		echo $script;
	}



	public function adminUsers()
	{
		$adminUsers = mysqli_query($this->dbCon, "select * from golojan_accounts ORDER BY accid ASC");
		return $adminUsers;
	}



	public function Mdas()
	{
		$Mdas = mysqli_query($this->dbCon, "select * from golojan_mdas where enabled='1'");
		return $Mdas;
	}


	public function BankerInfo($id)
	{
		$BankerInfo = mysqli_query($this->dbCon, "select * from golojan_bankers where id='$id'");
		$BankerInfo = mysqli_fetch_object($BankerInfo);
		return $BankerInfo;
	}

	public function SetBankerInfo($id, $key, $val)
	{
		mysqli_query($this->dbCon, "UPDATE golojan_bankers SET $key='$val' WHERE id='$id'");
		return mysqli_affected_rows($this->dbCon);
	}


	public function BankerInfoToBank($id)
	{
		$result = new \stdClass;

		$BankerInfo = mysqli_query($this->dbCon, "select * from golojan_bankers where id='$id'");
		$BankerInfo = mysqli_fetch_object($BankerInfo);

		$result->accountname = $BankerInfo->accountname;
		$result->accountnumber = $BankerInfo->accountnumber;

		$Banker = $this->BankInfo($BankerInfo->bankid);
		$result->bank = $Banker->bank;

		return $result;
	}

	public function Bankers()
	{
		$Bankers = mysqli_query($this->dbCon, "select * from golojan_bankers");
		return $Bankers;
	}

	public function MdaBankers($mda)
	{
		$MdaBankers = mysqli_query($this->dbCon, "select * from golojan_bankers where mda='$mda'");
		return $MdaBankers;
	}

	public function Accounts()
	{
		$Accounts = mysqli_query($this->dbCon, "select * from golojan_accounts");
		return $Accounts;
	}

	public function CountUsers()
	{
		$result = new \stdClass;

		//SELECT id, category_id, post_title FROM posts WHERE id IN(SELECT MAX(id) FROM posts GROUP BY category_id);
		$CountUsers = mysqli_query($this->dbCon, "select count(accid) as nusers from golojan_accounts");
		$CountUsers = mysqli_fetch_object($CountUsers);
		$result->nusers = $CountUsers->nusers;

		$now_time = time();

		$CountOnlineUsers = mysqli_query($this->dbCon, "SELECT count(*) As ousers FROM `golojan_accounts` WHERE `lastaction` >= DATE_SUB(NOW(), INTERVAL {$this->session_timout} MINUTE)");
		$CountOnlineUsers = mysqli_fetch_object($CountOnlineUsers);
		$result->ousers = $CountOnlineUsers->ousers;

		return $result;
	}


	public function MdaInfo($mda)
	{
		$MdaInfo = mysqli_query($this->dbCon, "select * from golojan_mdas where id='$mda'");
		$MdaInfo = mysqli_fetch_object($MdaInfo);
		return $MdaInfo;
	}


	public function CreateMDA($parent, $category, $mda, $orgcode)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_mdas(parent,category,mda,orgcode) VALUES('$parent','$category','$mda','$orgcode')");
		return (int)mysqli_insert_id($this->dbCon);
	}

	public function CreateNewMDA($orgcode, $mda)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_mdas(orgcode,mda) VALUES('$orgcode','$mda')");
		return (int)mysqli_insert_id($this->dbCon);
	}


	public function MDAexists($orgcode)
	{
		$MDAexists = mysqli_query($this->dbCon, "select count(id) as ismda from golojan_mdas where orgcode='$orgcode'");
		$MDAexists = mysqli_fetch_object($MDAexists);
		return $MDAexists->ismda;
	}


	public function MdaAccountExists($bankid, $accountnumber, $mda)
	{
		$MdaAccountExists = mysqli_query($this->dbCon, "select count(id) as mdacnt from golojan_bankers where mda='$mda' AND (accountnumber='$accountnumber' AND bankid='$bankid')");
		$MdaAccountExists = mysqli_fetch_object($MdaAccountExists);
		return (int)$MdaAccountExists->mdacnt;
	}


	public function BankInfo($bankerid)
	{
		$BankInfo = mysqli_query($this->dbCon, "select * from golojan_banks where id='$bankerid'");
		$BankInfo = mysqli_fetch_object($BankInfo);
		return $BankInfo;
	}

	public function CreateAccount($category, $sn, $fn, $email, $mobile, $username, $password, $office)
	{
		$roots = ($category == "admin") ? "my" : "user";
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_accounts(category,roots,lastname,firstname,email,mobile,username,password,office) VALUES('$category','$roots','$sn','$fn','$email','$mobile','$username','$password','$office')");
		return (int)mysqli_insert_id($this->dbCon);
	}

	public function ListBankers()
	{
		$ListBankers = mysqli_query($this->dbCon, "select * from golojan_bankers where mda=0");
		return $ListBankers;
	}

	public function ListBanks()
	{
		$ListBanks = mysqli_query($this->dbCon, "select * from golojan_banks");
		return $ListBanks;
	}

	public  function setBankInfo($id, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE golojan_banks SET `$name`='$value' WHERE id='$id'");
		return $this->countAffected();
	}


	public function GroupBankersForDasboard()
	{
		$GroupBankersForDasboard = mysqli_query($this->dbCon, "select COUNT(bankid) as bcount, bankid from golojan_bankers where mda='0' group by bankid");
		return $GroupBankersForDasboard;
	}

	public function GroupMDABankersForDasboard()
	{
		$GroupMDABankersForDasboard = mysqli_query($this->dbCon, "select COUNT(bankid) as bcount, bankid, mda from golojan_bankers where mda!='0' group by mda");
		return $GroupMDABankersForDasboard;
	}

	public function GetBankersForSubDasboard($bankid)
	{
		$GetBankersForSubDasboard = mysqli_query($this->dbCon, "select * from golojan_bankers where bankid = '$bankid'");
		return $GetBankersForSubDasboard;
	}

	public function GetMDABankersForSubDasboard($mda)
	{
		$GetBankersForSubDasboard = mysqli_query($this->dbCon, "select * from golojan_bankers where mda = '$mda'");
		return $GetBankersForSubDasboard;
	}

	public function CountMdaBankers($mda)
	{
		$CountMdaBankers = mysqli_query($this->dbCon, "select count(id) AS bnum from golojan_bankers where mda='$mda'");
		$CountMdaBankers = mysqli_fetch_object($CountMdaBankers);
		return $CountMdaBankers->bnum;
	}


	public function CounMDAs()
	{
		$CountMdAs = mysqli_query($this->dbCon, "select count(id) AS bnum from golojan_bankers where mda!='0'");
		$CountMdAs = mysqli_fetch_object($CountMdAs);
		return $CountMdAs->bnum;
	}



	/** @return mixed  */
	public function CounBankers()
	{
		$CounBankers = mysqli_query($this->dbCon, "SELECT COUNT(id) AS tigr FROM golojan_bankers where mda='0'");
		$CounBankers = mysqli_fetch_object($CounBankers);
		return $CounBankers->tigr;
	}



	public function GetIGRBankersForSubDasboard()
	{
		$GetIGRBankersForSubDasboard = mysqli_query($this->dbCon, "select * from golojan_bankers where is_igr = '1'");
		return $GetIGRBankersForSubDasboard;
	}

	public function CreateBank($banker, $branch, $accountname, $accountnumber)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_bankers(bankid,branch,accountname,accountnumber) VALUES('$banker','$branch','$accountname','$accountnumber')");
		return (int)mysqli_insert_id($this->dbCon);
	}

	public function CreateBankAccount($banker, $accountname, $accnum)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_bankers(`bankid`,`bank_id`,`bank_code`,`accountname`,`accountnumber`) VALUES('$banker','$accountname','$accnum')");
		return (int)mysqli_insert_id($this->dbCon);
	}

	public function setConnection($accid, $ip, $os, $browser, $device)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_connections(accid,ip,os,browser,device) VALUES('$accid','$ip','$os','$browser','$device')");
		return (int)mysqli_insert_id($this->dbCon);
	}
	public function Connections()
	{
		$Connections = mysqli_query($this->dbCon, "select * from golojan_connections ORDER BY created");
		return $Connections;
	}


	public function AllIGRBankerIDsToArray()
	{
		$AllIGRBankerIDsToArray_array = array();
		$AllIGRBankerIDsToArray = mysqli_query($this->dbCon, "SELECT id FROM golojan_bankers WHERE is_igr='1'");
		while ($banker_id = mysqli_fetch_object($AllIGRBankerIDsToArray)) {
			$AllIGRBankerIDsToArray_array[] = $banker_id->id;
		}

		$AllIGRBankerIDsToArray_array = array_map('intval', $AllIGRBankerIDsToArray_array);
		$AllIGRBankerIDsToArray_array = implode("','", $AllIGRBankerIDsToArray_array);

		return $AllIGRBankerIDsToArray_array;
	}

	public function AddBankerTrigger($accid, $type, $mode, $amount, $bankerid, $bankid)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_triggers(accid,type,mode,amount,bankerid,bankid) VALUES('$accid','$type','$mode','$amount','$bankerid','$bankid')");
		return (int)mysqli_insert_id($this->dbCon);
	}


	public function AddBankTrigger($accid, $type, $mode, $amount, $bankid)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_triggers(accid,type,mode,amount,bankid) VALUES('$accid','$type','$mode','$amount','$bankid')");
		return (int)mysqli_insert_id($this->dbCon);
	}


	public function AddTransaction($bankerid, $acct, $mode, $amount, $balance, $vdate, $memo)
	{
		$query = mysqli_query($this->dbCon, "INSERT INTO golojan_transactions(bankerid,accountnumber,mode,amount,balance,valuedate,memo) VALUES('$bankerid','$acct','$mode','$amount','$balance','$vdate','$memo')");
		return (int)mysqli_insert_id($this->dbCon);
	}



	/** @return mixed  */
	public function CountUserTriggers($accid)
	{
		$CountUserTriggers = mysqli_query($this->dbCon, "SELECT COUNT(id) AS tigr FROM golojan_triggers where accid='$accid'");
		$CountUserTriggers = mysqli_fetch_object($CountUserTriggers);
		return (int)$CountUserTriggers->tigr;
	}


	/** @return mixed  */
	public function CountBankerTriggers($bankerid)
	{
		$CountBankerTriggers = mysqli_query($this->dbCon, "SELECT COUNT(id) AS tigr FROM golojan_triggers where bankerid='$bankerid'");
		$CountBankerTriggers = mysqli_fetch_object($CountBankerTriggers);
		return (int)$CountBankerTriggers->tigr;
	}


	/** @return mixed  */
	public function UserTriggers($accid)
	{
		$UserTriggers = mysqli_query($this->dbCon, "SELECT * FROM golojan_triggers where accid='$accid'");
		return $UserTriggers;
	}


	/** @return mixed  */
	public function BankerTriggers($bankerid)
	{
		$BankerTriggers = mysqli_query($this->dbCon, "SELECT * FROM golojan_triggers where bankerid='$bankerid'");
		return $BankerTriggers;
	}



	/**
	 * @param mixed $accid 
	 * @return \mysqli_result|bool 
	 */
	public function UserSupports($accid)
	{
		$UserSupports = mysqli_query($this->dbCon, "SELECT * FROM golojan_supports where accid='$accid'");
		return $UserSupports;
	}




	public function Transactions($accountnumber)
	{
	}






	public function AllTimeBankerBalance($bankerid)
	{
		return 0;
	}

	public function AllTimeAccountBalance($accountnumber)
	{
		return 0;
	}


	public function CountBankers($bankid)
	{
		$CountBankers = mysqli_query($this->dbCon, "SELECT COUNT(id) AS cnt FROM golojan_bankers where bankid='$bankid'");
		$CountBankers = mysqli_fetch_object($CountBankers);
		return (int)$CountBankers->cnt;
	}


	public function AllTimeBalance()
	{
		$AllTimeBalance = mysqli_query($this->dbCon, "SELECT SUM(availablebalance) AS balance FROM golojan_banks");
		$AllTimeBalance = mysqli_fetch_object($AllTimeBalance);
		return (float)$AllTimeBalance->balance;
	}


	public function BankBalance($bankid)
	{
		$BankBalance = mysqli_query($this->dbCon, "SELECT availablebalance FROM golojan_banks WHERE id='$bankid'");
		$BankBalance = mysqli_fetch_object($BankBalance);
		return (float)$BankBalance->availablebalance;
	}


	public function BankerBalance($bankerid)
	{
		$BankerBalance = mysqli_query($this->dbCon, "SELECT balance FROM golojan_bankers WHERE id='$bankerid'");
		$BankerBalance = mysqli_fetch_object($BankerBalance);
		return (float)$BankerBalance->balance;
	}

	public function AllTimeBankBalance($bankid)
	{
		$Bankers = mysqli_query($this->dbCon, "SELECT balance FROM golojan_bankers where bankid='$bankid'");
		$FinalSum = 0;
		while ($banker = mysqli_fetch_object($Bankers)) {
			$FinalSum += $banker->balance;
		}
		return floatval($FinalSum);
	}


	public function AllTimeAccountCredit($accountnumber)
	{
		return 0;
	}

	public function AllTimeAccountDebit($accountnumber)
	{
		return 0;
	}




	public function AllTimeCredit()
	{
		return 0;
	}

	public function AllTimeDebit()
	{
		return 0;
	}

	public function SumBankersAllTimeBalanceForDasboard($bankerid)
	{
		return 0;
	}


	public function SumBankersAllTimeCreditForDasboard($bankerid)
	{
		return 0;
	}

	public function SumBankersAllTimeDebitForDasboard($bankerid)
	{
		return 0;
	}

	public function SumMDABankersAllTimeBalanceForDasboard($mda)
	{
		return 0;
	}

	public function SumMDABankersAllTimeCreditForDasboard($mda)
	{
		return 0;
	}

	public function SumMDABankersAllTimeDebitForDasboard($mda)
	{
		return 0;
	}

	public function SumBankersCreditForSubDasboard($bankid)
	{
		return 0;
	}
	public function SumBankersDebitForSubDasboard($bankid)
	{
		return 0;
	}

	public function SumMDABankersCreditForSubDasboard($mda)
	{
		return 0;
	}

	public function SumMDABankersDebitForSubDasboard($mda)
	{
		return 0;
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















	// Function to get the client IP address
	/** @return string|array|false  */
	public function getIP()
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if (getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if (getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if (getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if (getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if (getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}


	// Admin//

}
