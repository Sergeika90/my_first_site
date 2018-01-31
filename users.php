<?php 
	require "db.php";
			
	include_once "lib/Smarty.class.php";
			
	if(isset($_SESSION['logged_user'])) 
	require "header/header.php";
			else  
			require "header/header1.php";
		
	$smarty = new Smarty();
	
	$user = R::getAll("SELECT * FROM `users` ORDER BY `email`");
		
	$smarty->assign('user',$user);
	
	$smarty->display('users.tpl');
?>
			