<?php
include_once 'global.php';

if($_GET['step'] == 1)
{
	$tpl->Load('reg-step1');
	$tpl->Render();
	
	if(isset($_POST['bean_gender']))
	{
		if($_POST['bean_gender'] == 'male')
		{
			$_SESSION['reg']['gender'] = 'M';
		}
		else
		{
			$_SESSION['reg']['gender'] = 'F';
		}
		
		echo '<script>window.location.replace("email_password");</script>';
	}
}

if($_GET['step'] == 2)
{
	
	$tpl->Load('reg-step2');
	
	if(isset($_POST['bean_username']))
	{
		$Res1 = Core::$DB->query('SELECT * FROM users WHERE username=?', array($_POST['bean_username']));
		if($Res1->num_rows == 1)
		{
			$tpl->CreateBeanError('De gebruikersnaam is al in gebruik!');
		}
		else
		{
			if(strlen($_POST['bean_username']) < 2)
			{
				$tpl->CreateBeanError('Gebruikersnaam/Wachtwoord is te kort');
			}
			else
			{
				if(!filter_var($_POST['bean_email'], FILTER_VALIDATE_EMAIL))
				{
					$tpl->CreateBeanError('Ongeldige Email');
				}
				else
				{
					if($_POST['bean_password'] != $_POST['bean_retypedPassword'])
					{
						$tpl->CreateBeanError('Wachtwoorden zijn niet hetzelfde!');
					}
					else
					{
						if($_POST['bean_termsOfServiceSelection'] != 'true')
						{
							$tpl->CreateBeanError('Je moet akkoord gaan met de Algemene Voorwaarden');
						}
						else
						{
							foreach($_POST as $key => $value)
							{
								$_SESSION['reg'][$key] = $value;
							}
							
							echo '<script>window.location.replace("captcha");</script>';
						}
					}
				}
			}
			
		}
	}
	else
	{
		$tpl->AddParam('bean_error', '');
	}
	$tpl->Render();
}

if($_GET['step'] == 3)
{
	$tpl->Load('reg-step3');
	include_once 'captcha/securimage.php';
	$captcha = new Securimage();
	if(isset($_POST['captcha_code']))
	{
		if ($captcha->check(@$_POST['captcha_code']) == false)
		{
			$tpl->CreateBeanError('De ingevoerde captcha is incorrect');
		}
		else
		{
			$Habbo->Register($_SESSION['reg']);
			$Habbo->StartSession($_SESSON['reg']['bean_username']);
			echo '<script>window.location.replace("../me");</script>';
		}
	}
	else
	{
		$tpl->AddParam('bean_error', '');
	}
	
	$tpl->Render();
}