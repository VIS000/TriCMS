<?php
include_once 'global.php';
if(isset($_POST['tagName']))
{
	if(strlen($_POST['tagName']) > 20 || strlen($_POST['tagName']) < 1)
	{
	$return = 'invalidtag';
	}
	elseif(Core::$DB->query('SELECT * FROM user_tags WHERE user_id=? and tag=?', array($_SESSION['user']->id, $_POST['tagName']))->num_rows >=1 )
	{
		$return = 'invalidtag';
	}
	else
	{
		$return = 'validtag';
		Core::$DB->query('INSERT INTO user_tags (user_id, tag) VALUES (?, ?)', array($_SESSION['user']->id, $_POST['tagName']));
	}

	
	echo $return;
}
?>