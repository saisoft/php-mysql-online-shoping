<?php
require_once '../library/config.php';
require_once './library/functions.php';

checkUser();

$content = 'main.php';

$pageTitle = 'Hardware Admin';
$script = array();

require_once 'template.php';
?>