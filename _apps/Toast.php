<?php

//Write your custome class/methods here
//credit: https://www.sitepoint.com/hierarchical-data-database-2/


namespace Apps;

use stdClass;
use \Apps\Model;

class Toast extends MysqliDb
{

	public $route = null;
	public $toast = null;
	public $status = null;
	public $icon = null;


	/** @return exit  */
	public function __construct()
	{
		parent::__construct();
	}

	public  function toast($route,  $title, $toast,  $status = 'info',  $icon = 'information-circle-outline ')
	{

		$done = $this->insert(
			"golojan_toasts",
			[
				'route' => $route,
				'title' => $title,
				'toast' => $toast,
				'status' => $status
			]
		);
		return $done;
	}
}
