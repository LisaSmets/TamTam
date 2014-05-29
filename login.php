<?php 
	// is er gePOST?

	if(!empty($_POST))
	{
		
		$email = $_POST['username'];
		$salt = "kdjsfmjdsmkfjdsk..dj!";
		$wachtwoord = md5($_POST['password'] . $salt);
		

		//Connectie maken
		$conn = new mysqli("localhost", "root", "root", "tamtam");

		// controleren of user in database bestaat
		// QUERY: select * from users where email = $email AND password = md5(password+$salt)
		$sql = 	"SELECT * FROM login
				WHERE email ='".$conn->real_escape_string($email)."'
				AND wachtwoord = '$wachtwoord'";

		//print_r($sql);

		$result = $conn->query($sql);

		//echo "aantal rijen: " . $result->num_rows;

		$feedback = "";

		if($result->num_rows == 1)
		{
			$feedback = "";

			session_start();  //alles wat je meegeeft wordt opgeslagen op de server

			$_SESSION['email'] = $email;
			$_SESSION['wachtwoord'] = $wachtwoord;
			$_SESSION['loggedin'] = true;

			header('location: mijnpatienten.php');
		}
		else
		{
			$feedback = "Email of wachtwoord is foutief.";
		}

	}

	$conn = new mysqli("localhost", "root", "root", "tamtam");
	$sql ="select*from users;";
	$allUsers = $conn->query($sql);

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in</title>
	<link rel="stylesheet" href="css/reset.css" /> <!--reset VOOR de stylesheet!-->
	<link rel="stylesheet" href="css/custom.css" />
</head>
<body>

<div id="container">
	<img src="images/logowit.png" alt="logo Tamtam" id="logo">

	<form action="" method="post">
		<input type="text" class="tekstvak" name="username" placeholder="Email" required oninvalid="this.setCustomValidity('Vul in aub')">
		<input type="password" id="password" name="password" placeholder="Wachtwoord" required oninvalid="this.setCustomValidity('Vul in aub')">
		<input type="submit" value="LOG IN" id="btnlogin">
	</form>

	<p id="sorry">
			<?php 
				if(!empty($feedback))
				{
					echo $feedback;
				}
			 ?>
		</p>

	<a href="registreer.php" id="linkRegistreer">Nog geen login? Registreer hier.</a>
	
</div> <!-- container -->
</body>
</html>