<?php
session_start(); 

$_SESSION['demosession'] = "belen abebe";
$_SESSION['program'] = "BSCS";


echo $_SESSION['demosession'];
echo $_SESSION['program'];



session_unset();

?>