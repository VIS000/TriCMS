<?php

include_once 'class.core.php';

class Habbo extends Core
{
	public function __construct($CONFIG)
	{
		parent::__construct($CONFIG);	
	}
	
	public function Login($username, $password)
	{
		$Result = self::$DB->query('SELECT * FROM users WHERE password=? AND username=?', array($this->Hash($password), $username));
		
		if($Result->num_rows == 1)
		{
			return 'great';
		}
		else
		{
			return 'nope';
		}
	}
	
	public function StartSession($username)
	{
		$Result = self::$DB->query('SELECT * FROM users WHERE username=?', array($username));
		$Userdata = $Result->fetchAll()[0];
		$_SESSION['user'] = $Userdata;
		
	}
	
	public function Register($CRED)
	{
		if($CRED['gender'] = 'M')
		{
			$look = 'ea-1406-63.ch-240-93.lg-270-82.sh-295-91.hr-110-42.hd-180-1';
		}
		else
		{
			$look = 'hd-600-1.ch-3135-82.hr-3040-1400.lg-3202-82-91';
		}
		
		self::$DB->insert('users', array(
		'username' => $CRED['bean_username'],
		'password' => $this->Hash($CRED['bean_password']),
		'mail'	   => $CRED['bean_email'],
		'gender'   => $CRED['gender'],
		'credits'  => 1000000,
		'activity_points' => 9000,
		'ip_reg'	=> $this->RemoteIP(),
		'ip_last'	=> $this->RemoteIP(),
		'account_created' => time(),
		'motto'	=> 'Hoi! ik ben '. $CRED['bean_username'],
		'rank' => 1
		));
		
		session_destroy();
		
		Header('Location ../me');
	}
}