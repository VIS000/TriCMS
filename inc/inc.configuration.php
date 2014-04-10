<?php
/*
	 __ __|   _)   __|   \  |   __| 
		|   _| |  (     |\/ | \__ \ 
	   _| _|  _| \___| _|  _| ____/ 
	 Habbo Content Management System
	   Made By VIS000 (5th Project)
*/

$CONFIG = array();
session_start();

$CONFIG['DB'] = array(
'hostname' => 'p:127.0.0.1',
'username' => 'root',
'password' => '',
'database' => 'phx'
);

$CONFIG['TPL'] = array(
'hotelname' => 'Tri',
'hotellink' => 'http://localhost',
'copyright' => 'Copyright &copy ' .date('Y'). ' TriCMS - Tri Hotel. Alle rechten voorbehouden'
);
