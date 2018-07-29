<?php
require_once 'init.php';
require_once 'session.php';
if(!isset($_SESSION['email'])){
	header('Location: ' . ($base ?: '/'));
	exit();
}