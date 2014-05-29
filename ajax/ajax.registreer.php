<?php 
	
	include_once("../classes/db.class.php");
	include_once("../classes/user.class.php");
	$user = new user();

	if(!empty($_POST['email']))
	{

		$user->email = $_POST['email'];

		$available = $user->checkemail();

		if($available === false)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}

	}
 ?>