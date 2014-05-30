<?php 

session_start(); 
//zorgt ervoor dat de sessie aan de user wordt gekoppeld

	//enkel welkem indien session bestaat
	if(isset($_SESSION['email']))
	{
		include_once("classes/patient.class.php");

		$pid = $_GET['id'];

		$patient=new patient();
		$patient->emailgebruiker = $_SESSION['email'];
		$patient->id = $pid;
		echo ($patient->id);

		// $patient->voornaam = $_SESSION['patientvoornaam'];
		// $patient->achternaam = $_SESSION['patientachternaam'];
		// $patient->straat = $_SESSION['patientstraat'];
		// $patient->nr = $_SESSION['patientnr'];
		// $patient->woonplaats =$_SESSION['patientwoonplaats'];
		$res = $patient->getone();

		//print_r($res);

		if(!empty($_POST['btn_edit']))
		{
			$patient->id = $_SESSION['patientid'];
			// echo ($patient->id);
			$patient->voornaam = $_POST['patientvn'];
			$patient->achternaam = $_POST['patientan'];
			$patient->straat = $_POST['patientstraat'];
			$patient->nr = $_POST['patientnr'];
			$patient->woonplaats = $_POST['patientwoonplaats'];
			$patient->Update();

		}

	}
	else
	{
		header("location: login.php");
	}


	// if(!empty($_POST['edit']))
	// {
	// 	try
	// 	{	
	// 		$nieuwMenu->id = $_POST['gerechtid'];
	// 		$nieuwMenu->naam = $_POST['gerechtnaam'];
	// 		$nieuwMenu->details = $_POST['gerechtdetails'];
	// 		$nieuwMenu->prijs = $_POST['gerechtprijs'];
	// 		$nieuwMenu->Update();

	// 	}

	// 	catch (Exception $e) 
	// 	{
	// 		$feedback = $e->getMessage();
	// 	}
			


 ?><!doctype html>
 <html lang="en">
 <head>
	<link rel="stylesheet" href="css/reset.css" /> <!--reset VOOR de stylesheet!-->
	<link rel="stylesheet" href="css/jqx.base.css" type="text/css" />
	
	<link rel="stylesheet" href="css/mijnpatienten.css" />
<!-- 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
 	 -->
 	 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
 	<script type="text/javascript" src="js/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqxnavigationbar.js"></script>
    <script type="text/javascript" src="js/jqxmenu.js"></script>
    <script type="text/javascript" src="js/jqxexpander.js"></script>
    <script type="text/javascript" src="js/jquery.session.js"></script>

    <link rel="stylesheet" href="css/uniekepatient.css" />

 	<meta charset="UTF-8">
 	<title>uniekepatient</title>
 </head>
 <body>
 	<script type="text/javascript">
    $(document).ready(function(){

    	//var getid = $.session.get('patientid');

        // Create jqxNavigationBar
        $("#jqxnavigationbar").jqxNavigationBar({ width: "100%", height: '100%'});
		
		$("#bewerkpatient").hide();

        $("#edit").click(function(){
        	$("#infopatient").hide('slow');
        	$("#bewerkpatient").show('slow');
        });

        $("#btn_terug1").click(function(){
        	$("#bewerkpatient").hide('slow');
        	$("#infopatient").show('slow');
        });


        $("#nieuwbericht").hide();
        $("#berichtlabel").hide();

        $("#btn_nieuwbericht").click(function(){
        	$("#berichten").hide('slow');
        	$("#nieuwbericht").show('slow');
        });



        $("#btn_terug2").click(function(){
        	$("#nieuwbericht").hide('slow');
        	$("#berichten").show('slow');
        });

        $("#btn_label").click(function(){
        	$("#berichten").hide('slow');
        	$("#berichtlabel").show('slow');
        });

        $("#joubericht").hide();
        $("#btn_postbericht").click(function(){
        	$("#nieuwbericht").hide('slow');
        	$("#berichten").show('slow');
        	$("#joubericht").show('slow');
        });


    });
	</script>

 	<div id="container">
 		<a href="mijnpatienten.php" id="pijlterug">terug</a>
		<h1 class='title'><?php echo $_SESSION['patientvoornaam']." ".$_SESSION['patientachternaam'] ?></h1>
		<a href="logout.php" id="logout">Log out</a>

		<div id='jqxnavigationbar'>
		    <!--Header-->
		    <div>
		        Patiën
		    </div>
		    <!--Content-->
		    <div>
		    	<div id='infopatient'>
	
		    		<img  src="images/dummy.png" id='dummy' alt="dummypic">
		    		
			        <p class="info"><?php echo $patient->voornaam." ".$patient->achternaam ; ?></p>
			        <p class="info"><?php echo $patient->straat." ".$patient->nr ; ?></p>
			        <p class="info"><?php echo $patient->woonplaats ; ?></p>
			        <a id='edit' href="#">edit</a>
		    	</div>

		    	<div id="bewerkpatient">
		    		
		    			<?php 
		    			while($lijstp = $res->fetch_assoc())
		    			{	
		    				echo "<form action='' method='post'>";
		    				echo "<input type='hidden' name='inputid' value='".$_SESSION['patientid']."'/>";
		    				echo "<label for='patientvn'>Naam </label>";
		    				echo "<input type='text' class='inputvak' name='patientvn' value='".$lijstp['voornaam']."'/>";
		    				echo "<input type='text' class='inputvak'name='patientan' value='".$lijstp['achternaam']."'/>";
		    				echo "<label for='patientstraat'>Adres </label>";
		    				echo "<input type='text' class='inputvak' name='patientstraat' value='".$lijstp['straat']."'/>";
		    				echo "<input type='text' class='inputvak' name='patientnr' value='".$lijstp['nr']."'/>";
		    				echo "<input type='text' class='inputvak' name='patientwoonplaats' value='".$lijstp['woonplaats']."'/>";
		    				echo "<input type='submit' name='btn_edit' id='slaop' value='Sla wijzigingen op'/>";
		    			}
		    			 ?>
		    			 <a id='btn_terug1' href="#">Terug</a>
		    			
		    			
		    		</form>
		    		
		    	</div>
		    </div>
		    <!--Header-->
		    <div id="headerberichten">
		        Berichten
		    </div>
		    <!--Content-->
		    <div>
		        <div id='berichten'>
		        	<a id='btn_nieuwbericht' href="#">nieuw</a>
		        	<a id='btn_label' href="#">label</a>

		        	 <p class="info" style='padding-top: 5rem;'>Patricia Damen - Verpleegster</p>

		        	 <img id='tekstballon' src="images/tekstballon.png" alt="tekstballon">
		        	 <div id='joubericht'>
		        	 	<p class="info" style='padding-top: 17rem; text-allign:right;'>Jou naam hier - functie</p>
					 	<img id='tekstballon' src="images/joubericht.png" alt="jouwbericht">
		        	 </div>
		        </div>

		        <div id='nieuwbericht'>
		        	<form action="" method=''>
		        		<textarea class='inputvak' id='oranje' placeholder='Schrijf hier uw nieuw bericht...'></textarea>
		        		<a id='btn_postbericht' href="#">Bericht plaatsen</a>
						<!-- <input type="submit" name='btn_postbericht' id='btn_postbericht' value='Bericht plaatsen'> -->
		        	</form>
		        	<a id='btn_terug2' href="#">Terug</a>

		        </div>

		        <div id='berichtlabel'>
		        	

		        </div>

		    </div>
		    <!--Header-->
		    <div id='headerinfo'>
		       Medische info
		    </div>
		    <!--Content-->
		    <div>
		        <p class="info" style='padding-top:3rem;'>Patiënt is diabetisch</p>
				<p class="info" style='padding-top:3rem;'>Patiënt heeft sinds augustus 2013 een kusntheup.</p>
		   		<a id='editgroen' href="#">edit</a>
		    </div>
		    <!--Header-->
		     <div id='headerzorgverleners'>
		       Zorgverleners
		    </div>
		    <!--Content-->
		    <div>
		         <p class="info" style='padding-top:3rem;'>Patricia Damen - Verpleegster</p>
				<p class="info" style='padding-top:3rem;'>Eddy Peters - Poetshulp</p>
				<p class="info" style='padding-top:3rem;'>Mieke Segers - Kinesiste</p>
		    </div>

		</div>
		
		<link rel="stylesheet" href="css/uniekepatient.css" />
	</div> <!-- container -->
 	
 </body>
 </html>
