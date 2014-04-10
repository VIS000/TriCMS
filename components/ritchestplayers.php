<?php
include_once 'global.php';
$Result = Core::$DB->query('SELECT * FROM users ORDER BY vip_points DESC LIMIT 0,10 ');

$number = 1;
while($player = $Result->fetchArray())
{
  echo '<tr>
  <td class="tablerow1" align="center">'.$number.'</td>
  <td class="tablerow2" align="center">
  <a href="/home/'.$player['username'].'">'.$player['username'].'</a>
  </td>
  <td class="tablerow3" align="center">'.$player['vip_points'].'</td></tr>';
  $number++;
}