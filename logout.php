<?php
require_once 'components/Check.php';

$check = new Check();
$check->clearCookie();
header("Location: index.php");