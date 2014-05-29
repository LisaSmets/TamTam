<?php 
		if(!empty($_POST))
		{
			include_once("classes/user.class.php");
			
			$u=new User(); // object user die verschillende waarden heeft (name, email en password)
			$u->voornaam = $_POST['voornaam'];
			$u->achternaam = $_POST['achternaam'];
			$u->functie = $_POST['functie'];
			$u->email = $_POST['username'];
			$u->wachtwoord = $_POST['password'];
			$u->Save();

			session_start();  //alles wat je meegeeft wordt opgeslagen op de server

			$_SESSION['voornaam'] = $u->voornaam;
			$_SESSION['achternaam'] = $u->achternaam;
			$_SESSION['functie'] = $u->functie;
			$_SESSION['email'] = $u->email;
			$_SESSION['wachtwoord'] = $u->wachtwoord;
			$_SESSION['loggedin'] = true;

			header('location: mijnpatienten.php');

		}
		
		

	 ?><!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registreer</title>
		<link rel="stylesheet" href="css/reset.css" /> <!--reset VOOR de stylesheet!-->
		<link rel="stylesheet" href="css/custom.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#email").on('keyup', function(){
					var emailadres = $("#email").val();
					$(".emailcheck").hide('slow');
					console.log(emailadres);

				$.ajax
				({
				  type: "POST",
				  url: "ajax/ajax.registreer.php",
				  data: { email: emailadres }
				})
				.done(function(result) 
				{
					console.log(result);
					if(result == 'false')
					{
						$(".emailcheck").show('slow');
						$(".emailcheck").html("<p id='sorry'>Whoops, dit emailadres is al geregistreerd.</p>");
					}
			    });

				return(false);
				});
		});
	</script>
	</head>

	<body>

		<div id="container">
		<img src="images/logowit.png" alt="logo Tamtam" id="logo">

		<form action="" method="post">
			<input type="text" class="tekstvak" name="voornaam" placeholder="Voornaam" required >
			<input type="text" class="tekstvak" name="achternaam" placeholder="Achternaam" required >
			<input type="text" class="tekstvak" name="functie" placeholder="Functie" required >
			<input type="text" class="tekstvak" id="email" name="username" placeholder="Email" required >
				<div class="emailcheck"></div>
			<input type="password" id="password" name="password" placeholder="Wachtwoord" required>
			<input type="submit" value="REGISTREER" id="btnlogin">
		</form>

		<p id="sorry">
				<?php 
					if(!empty($feedback))
					{
						echo $feedback;
					}
				 ?>
			</p>

			<a href="login.php" id="linkRegistreer">Terug naar login</a>
		</div> <!-- container -->
	</body>
	</html>