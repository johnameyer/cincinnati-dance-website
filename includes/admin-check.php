<?php
require_once 'init.php';
require_once 'session.php';
if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
	header('Location: ' . ($base ?: '/'));
	exit();
}