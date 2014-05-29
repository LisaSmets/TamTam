<?php 

	include_once("db.class.php");

	class patient
	{
		private $m_iid;
		private $m_sVoornaam;
		private $m_sAchternaam;
		private $m_sStraat;
		private $m_iNr;
		private $m_sWoonplaats;  // ABSTRACTIE & INKAPSELING
		private $m_sEmailgebruiker;

		//om te controleren wat er in wordt gestoken getters en setters

		public function __set ($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'id':
					$this->m_iid = $p_vValue;
					break;

				case 'voornaam':
					$this->m_sVoornaam = $p_vValue;
					break;

				case 'achternaam':
					$this->m_sAchternaam = $p_vValue;
					break;

				case 'straat':
					$this->m_sStraat = $p_vValue;
					break;
				
				case 'nr':
					$this->m_iNr = $p_vValue;
					break;

				case 'woonplaats':
					$this->m_sWoonplaats = $p_vValue;
					break;

				case 'emailgebruiker':
					$this->m_sEmailgebruiker = $p_vValue;
					break;
				/*
				default: // handig om fouten op te sporen wanneer je je vergist qua syntax
					echo "Setting property " .$p_sProperty. " does not exist.";
					break;
				*/
			}
		}

		public function __get ($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'id': 
					$vResult = $this->m_iid;
					break;

				case 'voornaam':
					return $this->m_sVoornaam;
					break;

				case 'achternaam':
					return $this->m_sAchternaam;
					break;

				case 'straat':
					return $this->m_sStraat;
					break;

				case 'nr':
					return $this->m_iNr;
					break;

				case 'woonplaats':
					return $this->m_sWoonplaats;
					break;

				case 'emailgebruiker':
					return $this->m_sEmailgebruiker;
					break;
				
				default:
					echo "Getting property " .$p_sProperty. " does not exist.";
					break;
			}

		}

		public function Save()
		{
			// save user to database
			$db = new db();

			$sql= "INSERT INTO patienten(`voornaam`, `achternaam`, `straat`, `nr`, `woonplaats`, `emailgebruiker`) 
					VALUES (
						'".$db->conn->real_escape_string($this->m_sVoornaam)."',
						'".$db->conn->real_escape_string($this->m_sAchternaam)."',
						'".$db->conn->real_escape_string($this->m_sStraat)."',
						'".$db->conn->real_escape_string($this->m_iNr)."',
						'".$db->conn->real_escape_string($this->m_sWoonplaats)."',
						'".$db->conn->real_escape_string($this->m_sEmailgebruiker)."'
						)";
			
			
			return $db->conn->query($sql);

			//echo ($sql);

			//real escape string moet altijd op de connectie gedaan worden
		}

		public function getone()
		{
			$db = new db();
			$sql = "SELECT * FROM patienten WHERE id ='".$_SESSION['patientid']."'";
			// echo('id='.$_SESSION['patientid']);
			//echo($sql);
	    	return $db->conn->query($sql);
		}

		public function Update()
		{
			$db = new db();

			$sql = "UPDATE patienten 
					SET 
						voornaam = '".$db->conn->real_escape_string($this->voornaam)."',
						achternaam = '".$db->conn->real_escape_string($this->achternaam)."',
						straat = '".$db->conn->real_escape_string($this->straat)."',
						nr = '".$db->conn->real_escape_string($this->nr)."',
						woonplaats = '".$db->conn->real_escape_string($this->woonplaats)."'
						WHERE id = '".$this->id."'";	
			//print_r($sql);
			$db->conn->query($sql);
		}
		
		public function Geta()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'A%' AND emailgebruiker ='".$this->emailgebruiker."' )";
			//echo('email' .$this->emailgebruiker);
			//echo($sql);
	    	return $db->conn->query($sql);

		}
		public function Getb()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'B%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getc()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'C%'AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getd()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'D%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}

		public function Gete()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'E%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}

		public function Getf()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'F%' AND emailgebruiker= '" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getg()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'G%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Geth()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'H%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Geti()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'I%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getj()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'J%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getk()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'K%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getl()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'L%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getm()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'M%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getn()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'N%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Geto()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'O%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getp()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'P%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getq()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'Q%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getr()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'R%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Gets()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'S%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Gett()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'T%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getu()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'U%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getv()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'V%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getw()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'W%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getx()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'X%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Gety()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'Y%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}
		public function Getz()
		{
			$db = new db();
			$sql = "select * from patienten WHERE (achternaam LIKE 'Z%' AND emailgebruiker ='" . $this->emailgebruiker . "' )";
			//echo($sql);
	    	return $db->conn->query($sql);
		}

	}	

		
 ?>