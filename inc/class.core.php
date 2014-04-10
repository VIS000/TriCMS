<?php
include_once 'MySQLi/OBJ_mysql.php';

class Core
{
	public static $DB;
	public $CONFIG;
	private $salt = 'TriCMS423497H&*%JGEGYF&fSO';
	
	public function __construct($CONFIG)
	{
		$this->InstallCMS($CONFIG['DB']);
		$this->CONFIG = $CONFIG;
	}
	
	protected function InstallCMS($DB)
	{
		date_default_timezone_set("Europe/Amsterdam");
		self::$DB = new OBJ_mysql($DB);
		
		self::$DB->_default_result_type = 'array';
	}
	
	public function ThrowError($error)
	{
		if(isset($error))
		{
			exit('TriCMS Error: '. $error);
		}
	}
	
	public function TimeToStr($time)
	{
		if(isset($time) && is_string($time) && $time != '')
		{
			return date('d M \o\m H:i', $time);
		}
		else
		{
			return 'Nooit';
		}
		
	}
	
	public function GetArticles()
	{
		$Result = self::$DB->query('SELECT * FROM cms_news');
		return $Result->fetchAll();
	}
	
	public function GetArticle($id)
	{
		$Result = self::$DB->query('SELECT * FROM cms_news WHERE id=?', array($id));
		return $Result->fetchAll()[0];
	}
	
	public function OnlineUsers()
	{
		$Result = self::$DB->query('SELECT users_online FROM server_status');
		return $Result->fetchAll()[0]->users_online;
	}
	
	public function Hash($string)
	{
		return sha1(md5($string.$this->salt));
	}
	
	public function RemoteIP()
	{
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			return $_SERVER['REMOTE_ADDR'];
		}
	}
	
	
}