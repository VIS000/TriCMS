<ul class="tag-list">

<?php
include_once 'global.php';

$Result = Core::$DB->query('select tag, count(tag) from user_tags group by tag order by tag desc LIMIT 0,20;');
while($tag = $Result->fetchArray())
{
	echo '<li><a href="/tag/" class="tag" style="font-size:100%">'.$tag['tag'].'</a> </li>';
}
?>
</ul>