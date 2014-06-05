<?php 

	include_once("db.class.php");

	class boodschap
	{
		private $m_iid;
		private $m_sRijksregisternr;
		private $m_sUservoornaam;
		private $m_sUserachternaam;
		private $m_sUserfunctie;
		private $m_sBoodschap;
		private $m_sDatum;

		public function __set ($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'id':
					$this->m_iid = $p_vValue;
					break;

				case 'rijksregisternr':
					$this->m_sRijksregisternr = $p_vValue;
					break;

				case 'uservoornaam':
					$this->m_sUservoornaam = $p_vValue;
					break;

				case 'userachternaam':
					$this->m_sUserachternaam = $p_vValue;
					break;

				case 'userfunctie':
					$this->m_sUserfunctie = $p_vValue;

				case 'boodschap':
					$this->m_sBoodschap = $p_vValue;
					break;

				case 'datum':
					$this->m_sDatum = $p_vValue;
					break;
			}
		}

		public function __get ($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'id': 
					return $this->m_iid;
					break;

				case 'rijksregisternr':
					return $this->m_sRijksregisternr;
					break;
				

				case 'uservoornaam':
					return $this->m_sUservoornaam;
					break;

				case 'userachternaam':
					return $this->m_sUserachternaam;
					break;

				case 'userfunctie':
					return $this->m_sUserfunctie;
					break;

				case 'boodschap':
					return $this->m_sBoodschap;
					break;

				case 'datum':
					return $this->m_sDatum;
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

			$sql= "INSERT INTO `boodschap`(`rijksregisternr`, `uservoornaam`, `userachternaam`, `userfunctie`, `boodschap`, `datum`) VALUES  (
						'".$db->conn->real_escape_string($this->m_sRijksregisternr)."',
						'".$db->conn->real_escape_string($this->m_sUservoornaam)."',
						'".$db->conn->real_escape_string($this->m_sUserachternaam)."',
						'".$db->conn->real_escape_string($this->m_sUserfunctie)."',
						'".$db->conn->real_escape_string($this->m_sBoodschap)."',
						'".$db->conn->real_escape_string($this->m_sDatum)."'
						)";
			
	
			$db->conn->query($sql);

			//echo ($sql);

			//real escape string moet altijd op de connectie gedaan worden
		}
		
		public function Getmessages()
		{
			$db = new db();
			$sql = "SELECT * FROM `boodschap` WHERE `rijksregisternr` = '".$this->rijksregisternr."'";
			//echo $sql;
			return $db->conn->query($sql);
		}
	}



 ?>