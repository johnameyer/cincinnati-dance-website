<?php
session_start();

session_unset(); 

session_destroy(); 

$_SESSION = [];
header("Location: " . (getenv('CINCI_DANCE_BASE') ?: '/'));
exit();
?>