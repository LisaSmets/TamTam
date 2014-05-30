<?php
	session_start(); //zorgt ervoor dat de sessie aan de user wordt gekoppeld

	//enkel welkem indien session bestaat
	if(isset($_SESSION['email']))
	{
		include_once("classes/patient.class.php");

		$patient=new patient();
		$patient->emailgebruiker = $_SESSION['email'];
	}
	else
	{
		header("location: login.php");
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mijn patiënten</title>
	<link rel="stylesheet" href="css/reset.css" /> <!--reset VOOR de stylesheet!-->
	<link rel="stylesheet" href="css/mijnpatienten.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.session.js"></script>
</head>
<!--
	<script type="text/javascript">
    $(document).ready(function(){

        $("#btn_naarinfo").click(function(){
        	var resid = $(this).next('input').val();
        	$.session.set('patientid', resid);
        	// var test = $.session.get('patientid');
        	// window.alert(test);
        });
    });
	</script>
-->
<body>
	<div id="container">

		<h1 class='title'>Mijn patiënte</h1>

		<a href="logout.php" id="logout">Log out</a>

		<hr noshade id='linetop'>

		<div id='divlijstpatienten'>
		
		<?php 
		$res = $patient->Geta();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<ul id='lijst'>";
			echo "<h2 class='letteraz'>A</h2>";

			while($lijstpatienten = $res->fetch_assoc())
				{
					echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "</li>";					
				}
		}
		
		 ?>
		
		<?php 
		$res = $patient->Getb();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>B</h2>";

		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];

				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		
		<?php 
		$res = $patient->Getc();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>C</h2>";
			while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];

				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
	
		<?php 
		$res = $patient->Getd();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>D</h2>";
			while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];

				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		 <?php 
		$res = $patient->Gete();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>E</h2>";
			while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		 <?php 
		$res = $patient->Getf();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>F</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		<?php 
			$res = $patient->Getg();
			if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>G</h2>";
			while($lijstpatienten = $res->fetch_assoc())
				{
					$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
					echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
				}
		}
			
			 ?>

			 <?php 
		$res = $patient->Geth();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>H</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		  <?php 
		$res = $patient->Geti();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>I</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		  <?php 
		$res = $patient->Getj();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>J</h2>";
			while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		  <?php 
		$res = $patient->Getk();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>K</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
			$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];	
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>

		  <?php 
		$res = $patient->Getl();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>L</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getm();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>M</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getn();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>N</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Geto();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>O</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getp();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>P</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getq();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>Q</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getr();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>R</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Gets();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>S</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Gett();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>T</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getu();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>U</h2>";
				
			while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getv();
		if(mysqli_num_rows($res)>=1)
		{
			//print_r($res);
		echo "<h2 class='letteraz'>V</h2>";
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];

					echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getw();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>W</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getx();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>X</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Gety();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>Y</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		 ?>
		  <?php 
		$res = $patient->Getz();
		if(mysqli_num_rows($res)>=1)
		{
			echo "<h2 class='letteraz'>Z</h2>";
				
		while($lijstpatienten = $res->fetch_assoc())
			{
				$_SESSION['patientid'] = $lijstpatienten['id'];
					$_SESSION['patientvoornaam'] =$lijstpatienten['voornaam'];
					$_SESSION['patientachternaam'] =$lijstpatienten['achternaam'];
					$_SESSION['patientstraat'] =$lijstpatienten['straat'];
					$_SESSION['patientnr'] =$lijstpatienten['nr'];
					$_SESSION['patientwoonplaats'] =$lijstpatienten['woonplaats'];
				echo "<li class='lipatient'>";
					echo "<a id='btn_naarinfo' href='uniekepatient.php?id=".$lijstpatienten['id']."'>".$lijstpatienten['achternaam']." ".$lijstpatienten['voornaam']."</a>";
					echo "<input type='hidden' value='".$lijstpatienten['id']."'/>";
					echo "</li>";
			}
		}
		
		echo "</ul>";
		 ?>
		 
		</div> <!-- divlijstpatienten -->
		<div id='footer'>
		<hr noshade id='linebottom'>

		<a href="patienttoevoegen.php" class='btn_voegtoe'>Voeg een patiënt toe</a>
		</div>
	</div> <!--container"-->
</body>
</html>