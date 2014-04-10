<?php

include_once 'global.php';

$tpl->Load('page-index');


if(isset($_POST['credentials_username']) && isset($_POST['credentials_password']))
{
	if($Habbo->Login($_POST['credentials_username'], $_POST['credentials_password']) == 'nope');
	{
		$tpl->AddParam('login_error', '<div id="loginerrorfieldwrapper"><div id="loginerrorfield"><div>Je gebruikersnaam en/of wachtwoord zijn niet correct ingevuld, probeer het opnieuw.</div></div></div>');
	}
	
	if($Habbo->Login($_POST['credentials_username'], $_POST['credentials_password']) != 'nope')
	{
		$Habbo->StartSession($_POST['credentials_username']);
		echo '<script>window.location.replace("../me");</script>';
	}

}
else
{
	$tpl->AddParam('login_error', '');
}
$tpl->Render();
