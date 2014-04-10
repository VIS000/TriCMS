<?php
include_once 'class.core.php';

class Template extends Core
{
	private $page;
	
	public function __construct($CONFIG)
	{
		parent::__construct($CONFIG);
	}
	
	public function Load($file)
	{
		$uri = 'templates/'.$file.'.html';
		
		if(file_exists($uri))
		{
			$this->page = file_get_contents($uri);
		}
		else
		{
			$this->ThrowError('Template failed to load');
		}
	}
	
	public function AddParam($key, $value)
	{
		$this->page = str_replace('{'.$key.'}', $value, $this->page);
	}
	
	public function AddComponent($key, $component)
	{
		$uri = 'components/'.$component.'.php';
		ob_start();
		include $uri;
		$loadedcomp = ob_get_contents();
		ob_end_clean();
		$this->AddParam($key, $loadedcomp);
	}
	
	public function CreateBeanError($msg)
	{
		$this->AddParam('bean_error', '<div class="cb" id="error-messages-container"><div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3"><div class="rounded-container"><div style="background-color: rgb(0, 0, 0);"><div style="margin: 0px 4px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(118, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(171, 28, 28);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(197, 32, 32);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div></div></div><div style="margin: 0px 2px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(119, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(202, 33, 33);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(152, 25, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(119, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(202, 33, 33);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(118, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(171, 28, 28);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(197, 32, 32);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div><div class="rounded-done" style="background-color: #cb2121;"><div id="error-title" class="error">'.$msg.'</div></div><div style="background-color: rgb(0, 0, 0);"><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(197, 32, 32);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(171, 28, 28);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(118, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(202, 33, 33);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(119, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(152, 25, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div><div style="margin: 0px 2px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(119, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(202, 33, 33);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div></div><div style="margin: 0px 4px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(118, 19, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(171, 28, 28);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(197, 32, 32);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(203, 33, 33);"></div></div></div></div></div></div></div></div></div></div><div class="bb"><div></div></div></div>');
	}
	
	public function GlobalParams()
	{
		$this->AddParam('online', $this->OnlineUsers());
		$this->AddParam('hotel_name', $this->CONFIG['TPL']['hotelname']);
		$this->AddParam('url', $this->CONFIG['TPL']['hotellink']);
		$this->AddParam('copyright', $this->CONFIG['TPL']['copyright']);
	
		if(isset($_SESSION['user']->username))
		{
			$userdata = $_SESSION['user'];
			$this->AddParam('username', $userdata->username);
			$this->AddParam('motto', $userdata->motto);
			$this->AddParam('look', $userdata->look);
			$this->AddParam('credits', $userdata->credits);
			$this->AddParam('pixels', $userdata->activity_points);
			$this->AddParam('last_online', $this->TimeToStr($userdata->last_online));
			
		}
	}
	
	public function Render()
	{
		$this->GlobalParams();
		echo $this->page;
	}
}