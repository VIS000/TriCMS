<?php

include_once 'global.php';

$tpl->Load('page-me');
$tpl->AddComponent('news', 'news');
$tpl->AddComponent('list', 'ritchestplayers');
$tpl->AddComponent('tags', 'taglist');
$tpl->Render();