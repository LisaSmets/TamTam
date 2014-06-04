<?php 
	session_start();

	if(isset($_SESSION['email']))
	{
		if(!empty($_POST))
		{
			include_once("classes/patient.class.php");
			
			$p=new patient(); // object user die verschillende waarden heeft (name, email en password)
			//$p->id = $_SESSION['patientid'];
			$p->voornaam = $_POST['voornaam'];
			$p->achternaam = $_POST['achternaam'];
			$p->straat = $_POST['straat'];
			$p->nr = $_POST['nr'];
			$p->woonplaats = $_POST['woonplaats'];
			$p->rijksregisternr = $_POST['rijksregisternr'];
			$p->emailgebruiker = $_SESSION['email'];
			
			$res = $p->Save();


			// session_start();  //alles wat je meegeeft wordt opgeslagen op de server

			// $_SESSION['voornaam'] = $u->voornaam;
			// $_SESSION['achternaam'] = $u->achternaam;
			// $_SESSION['functie'] = $u->functie;
			// $_SESSION['email'] = $u->email;
			// $_SESSION['wachtwoord'] = $u->wachtwoord;
			// $_SESSION['loggedin'] = true;

			if (!empty($res))
			{
				header("location: mijnpatienten.php");
			}
		} 
	}
	else
	{
		header("location: login.php");
	}
	

		


 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patiënt toevoegen</title>
	<link rel="stylesheet" href="css/reset.css" /> <!--reset VOOR de stylesheet!-->
	<link rel="stylesheet" href="css/mijnpatienten.css" />
</head>
<body>

	<div id="container">
		
		<a href="mijnpatienten.php" id="terug">Terug</a>

		<h1 class='title'>Patiënten toevoege</h1>

		<a href="logout.php" id="logout">Log out</a>

		<hr noshade id='linetop'>

		<form action="" method="post">
				<input type="text" id='first' class="tekstvak" name="voornaam" placeholder="Voornaam" required >
				<input type="text" class="tekstvak" name="achternaam" placeholder="Achternaam" required >
				<input type="text" class="tekstvak" name="straat" placeholder="Straat" required >
				<input type="text" class="tekstvak" name="nr" placeholder="Nummer" required >
				<input type="text" class="tekstvak" name="woonplaats" placeholder="Woonplaats" required>
				<input type="text" class="tekstvak" name="rijksregisternr" placeholder="Rijksregisternummer" required>
				<input type="submit" value="Toevoegen aan lijst" class="button">
		</form>

	</div> <!-- container -->
</body>
</html>