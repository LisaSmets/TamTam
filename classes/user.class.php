<?php  

	include_once("db.class.php");

	class user
	{
		private $m_sVoornaam;
		private $m_sAchternaam;
		private $m_sFunctie;
		private $m_sEmail;
		private $m_sWachtwoord;  // ABSTRACTIE & INKAPSELING

		//om te controleren wat er in wordt gestoken getters en setters

		public function __set ($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'voornaam':
					$this->m_sVoornaam = $p_vValue;
					break;

				case 'achternaam':
					$this->m_sAchternaam = $p_vValue;
					break;

				case 'functie':
					$this->m_sFunctie = $p_vValue;
					break;
				
				case 'email':
					$this->m_sEmail = $p_vValue;
					break;

				case 'wachtwoord':
					//if(strlen($p_vValue) < 5) // strlen = stringlength
					//{
					//	throw new Exception ("Password not long enough!");
					//}
					$salt = "kdjsfmjdsmkfjdsk..dj!";
					$this->m_sWachtwoord = md5($p_vValue.$salt);
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
				case 'voornaam':
					return $this->m_sVoornaam;
					break;

				case 'achternaam':
					return $this->m_sAchternaam;
					break;

				case 'functie':
					return $this->m_sFunctie;
					break;

				case 'email':
					return $this->m_sEmail;
					break;

				case 'wachtwoord':
					return $this->m_sWachtwoord;
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
			$sql= "INSERT INTO login(email, wachtwoord, voornaam, achternaam, functie) 
					VALUES (
						'".$db->conn->real_escape_string($this->m_sEmail)."',
						'".$this->m_sWachtwoord."',
						'".$db->conn->real_escape_string($this->m_sVoornaam)."',
						'".$db->conn->real_escape_string($this->m_sAchternaam)."',
						'".$db->conn->real_escape_string($this->m_sFunctie)."'
						)";
			
			$db->conn->query($sql);

			//echo ($sql);

			//real escape string moet altijd op de connectie gedaan worden
		}

		public function checkemail()
		{
			$db = new db();
			$sql = "SELECT * FROM login WHERE email = '".$this->m_sEmail."';";
			$result = $db->conn->query($sql);

			//print_r($result);

			if($result)
			{
				if(mysqli_num_rows($result) === 0)
				{
					$available = true;
				}
				else
				{
					$available = false;
					//$this->errors['errorAvailable'] = 'Dit emailadres is al geregistreerd.';
				}
			}
			else
			{
				$available = false;
				$this->errors['errorDB'] = "Er is geen connectie met de databank.";
			}

			return $available;

		}

		public function getuserinfo()
		{
			$db = new db();

			$sql = "SELECT * FROM login WHERE email = '".$this->email."';";
	
			return $db->conn->query($sql);
			
		}

	}

 ?>