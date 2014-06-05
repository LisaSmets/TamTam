<?php 

session_start(); 
//zorgt ervoor dat de sessie aan de user wordt gekoppeld

	//enkel welkem indien session bestaat
	if(isset($_SESSION['email']))
	{
		include_once("classes/patient.class.php");
		include_once("classes/boodschap.class.php");
		include_once("classes/user.class.php");

		$pid = $_GET['id'];

		$patient=new patient();
		$patient->emailgebruiker = $_SESSION['email'];
		$patient->id = $pid;
		//echo ($patient->id);

		$res = $patient->getone();

		while($patientinfo = $res->fetch_assoc())
		{
			$patient->voornaam=$patientinfo['voornaam'];
			$patient->achternaam=$patientinfo['achternaam'];
			$patient->straat=$patientinfo['straat'];
			$patient->nr=$patientinfo['nr'];
			$patient->woonplaats=$patientinfo['woonplaats'];
			$patient->rijksregisternr=$patientinfo['rijksregisternr'];

			$voornaam = $patientinfo['voornaam'];
			$achternaam = $patientinfo['achternaam'];
			$straat = $patientinfo['straat'];
			$nr = $patientinfo['nr'];
			$woonplaats = $patientinfo['woonplaats'];	

		}

		// echo $voornaam;
		// echo $achternaam;
		// echo $straat;
		// echo $nr;
		// echo $woonplaats;

		if(!empty($_POST['btn_edit']))
		{
			$patient->id = $pid;
			// echo ($patient->id);
			$patient->voornaam = $_POST['patientvn'];
			$patient->achternaam = $_POST['patientan'];
			$patient->straat = $_POST['patientstraat'];
			$patient->nr = $_POST['patientnr'];
			$patient->woonplaats = $_POST['patientwoonplaats'];
			$patient->rijksregisternr = $_POST['patientrijksregnr'];
			$infoupdate = $patient->Update();
		}

		if(!empty($_POST['btn_postbericht']))
		{
			
			$boodschap = new boodschap();

			$res = $patient->getone();

			while($patientinfo = $res->fetch_assoc())
			{
				$boodschap->rijksregisternr = $patientinfo['rijksregisternr'];
			}

			$user = new user();
			$user->email = $_SESSION['email'];
			$resuser = $user->getuserinfo();
			
			while($userinfo = $resuser->fetch_assoc())
			{
				$boodschap->uservoornaam = $userinfo['voornaam'];
				$boodschap->userachternaam = $userinfo['achternaam'];
				$boodschap->userfunctie = $userinfo['functie'];
			}
			$boodschap->boodschap = $_POST['newboodschap'];
			$boodschap->datum = date("j M. Y");
			$boodschap->Save();
		}

		



	}
	else
	{
		header("location: login.php");
	}
			


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

         $("#btn_edit").click(function(){
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
        });
	   	$( ".boodschap:odd" ).addClass("talkbubbleleft");
        $( ".boodschap:even").addClass("talkbubbleright");
        $( ".pboodschap:even").css('text-align','right');
        $( ".pboodschap:even").css('padding-right','3rem');
        

        $("#btn_edit").click(function(){
        	var updateid = $("updateO").val();
        	var updatevn = $("#update1").val();
        	var updatean = $("#update2").val();
        	var updatestraat = $("#update3").val();
        	var updatenr = $("#update4").val();
        	var updatewp = $("#update5").val();
        	var updaterijksregnr = $("#update6").val();

        	console.log(updatevn + updatean + updatestraat + updatenr + updatewp);
        	
        	$("#infonaam").text(updatevn+" "+updatean);
        	$("#infostraatnr").text(updatestraat+" "+updatenr);
        	$("#infowoonplaats").text(updatewp);
        	$("#inforijksregisternr").text(updaterijksregnr);
        });


    });
	</script>

 	<div id="container">
 		<a href="mijnpatienten.php" id="pijlterug">terug</a>
		<h1 class='title'><?php echo $patient->voornaam ." ".$patient->achternaam ?></h1>
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
		    		
			        <p class="info" id='infonaam'><?php echo $patient->voornaam." ".$patient->achternaam ; ?></p>
			        <p class="info" id='infostraatnr'><?php echo $patient->straat." ".$patient->nr ; ?></p>
			        <p class="info" id='infowoonplaats'><?php echo $patient->woonplaats ; ?></p>
			      	<p class="info" id='inforijksregisternr'><?php echo $patient->rijksregisternr ; ?></p>
			        <a id='edit' href="#">edit</a>
		    	</div>

		    	<div id="bewerkpatient">
		    		
		    			<?php 	
		    				echo "<form action='' method='post'>";
		    				echo "<label for='patientvn'>Naam </label>";
		    				echo "<input type='hidden' id='update0' class='inputvak' name='patientvn' value='".$patient->id."'/>";
		    				echo "<input type='text' id='update1' class='inputvak' name='patientvn' value='".$patient->voornaam."'/>";
		    				echo "<input type='text' id='update2' class='inputvak'name='patientan' value='".$patient->achternaam."'/>";
		    				echo "<label for='patientstraat'>Adres </label>";
		    				echo "<input type='text' id='update3' class='inputvak' name='patientstraat' value='".$patient->straat."'/>";
		    				echo "<input type='text' id='update4' class='inputvak' name='patientnr' value='".$patient->nr."'/>";
		    				echo "<input type='text' id='update5' class='inputvak' name='patientwoonplaats' value='".$patient->woonplaats."'/>";
		    				echo "<label for='patientrijksregnr'>Rijksregisternummer</label>";
		    				echo "<input type='text' id='update6' class='inputvak' name='patientrijksregnr' value='".$patient->rijksregisternr."'/>";
		    				echo "<input type='submit' name='btn_edit' id='slaop' value='Sla wijzigingen op'/>";
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
					
					<div id='lijstboodschap'>
						<?php 
							$boodschap = new boodschap();
							$patient = new patient();
							$patient->id = $_GET['id'];

							$resp = $patient->getone();
							//print_r($resp);

							while($p = $resp->fetch_assoc())
							{
								$boodschap->rijksregisternr = $p['rijksregisternr'];
							}

							$resb = $boodschap->Getmessages();
							//print_r($resb);
							while($b = $resb->fetch_assoc())
							{
								echo "<p class='pboodschap'>";
								echo $b['uservoornaam']." ".$b['userachternaam']." - ".$b['userfunctie'];
								echo "<br/>";
								echo $b['datum'];
								echo "</p>";
								echo "<div class='boodschap'>";
								echo $b['boodschap'];
								echo "</div>";
							}

						?>
					</div>
					

		        </div>

		        <div id='nieuwbericht'>
		        	<form action="" method='POST'>
		        		<textarea class='inputvak' id='oranje' name='newboodschap' placeholder='Schrijf hier uw nieuw bericht...'></textarea>
			        	<!-- 	<a id='btn_postbericht' href="#">Bericht plaatsen</a> -->
						<input type="submit" name='btn_postbericht' id='btn_postbericht' value='Bericht plaatsen'>
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
