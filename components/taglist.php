<ul class="tag-list">
<?php
include_once 'global.php';

$Result = Core::$DB->query('SELECT * FROM user_tags WHERE user_id = ?', array($_SESSION['user']->id));
if($Result->num_rows >= 1)
{
	while($tag = $Result->fetchArray())
	{
		echo '<li><a href="/tag/'.$tag['tag'].'" class="tag" style="font-size: 10px;">'.$tag['tag'].'</a><a class="tag-remove-link" title="Verwijder tag" href="#"></a></li>';
	}
}
else
{
	echo 'Je hebt nog geen interesses aangegeven. Voeg ze hier toe of beantwoord voor een voorbeeld de vraag hieronder.';
}
?>
</ul>