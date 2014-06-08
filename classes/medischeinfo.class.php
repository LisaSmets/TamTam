<?php 
	include_once("db.class.php");

	class medischeinfo
	{
		private $m_iid;
		private $m_sRijksregisternr;
		private $m_sInfo1;
		private $m_sInfo2;
		private $m_sInfo3;
		private $m_sInfo4;
		private $m_sInfo5;
		private $m_sInfo6;
		private $m_sInfo7;
		private $m_sInfo8;
		private $m_sInfo9;
		private $m_sInfo10;

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

				case 'info1':
					$this->m_sInfo1 = $p_vValue;
					break;

				case 'info2':
					$this->m_sInfo2 = $p_vValue;
					break;

				case 'info3':
					$this->m_sInfo3 = $p_vValue;

				case 'info4':
					$this->m_sInfo4 = $p_vValue;
					break;

				case 'info5':
					$this->m_sInfo5 = $p_vValue;
					break;

				case 'info6':
					$this->m_sInfo6 = $p_vValue;
					break;

				case 'info7':
					$this->m_sInfo7 = $p_vValue;
					break;

				case 'info8':
					$this->m_sInfo8 = $p_vValue;
					break;

				case 'info9':
					$this->m_sInfo9 = $p_vValue;
					break;

				case 'info10':
					$this->m_sInfo10 = $p_vValue;
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
				

				case 'info1':
					return $this->m_sInfo1;
					break;

				case 'info2':
					return $this->m_sInfo2;
					break;

				case 'info3':
					return $this->m_sInfo3;
					break;

				case 'info4':
					return $this->m_sInfo4;
					break;

				case 'info5':
					return $this->m_sInfo5;
					break;

				case 'info6':
					return $this->m_sInfo6;
					break;

				case 'info7':
					return $this->m_sInfo7;
					break;

				case 'info8':
					return $this->m_sInfo8;
					break;

				case 'info9':
					return $this->m_sInfo9;
					break;

				case 'info10':
					return $this->m_sInfo10;
					break;
				
				default:
					echo "Getting property " .$p_sProperty. " does not exist.";
					break;
			}

		}

		public function Save()
		{
			$db = new db();

			$sql= "INSERT INTO `medischeinfo`(`rijksregisternr`) VALUES (
						'".$db->conn->real_escape_string($this->m_sRijksregisternr)."'
						)";
			
			$db->conn->query($sql);

			//echo ($sql);
		}


		public function Getall()
		{
			$db = new db();
			$sql = "SELECT * FROM `medischeinfo` WHERE `rijksregisternr` = '".$this->rijksregisternr."'";
			//echo $sql;
			return $db->conn->query($sql);
		}


		public function Update()
		{
			$db = new db();

			$sql = "UPDATE `medischeinfo` 
					SET 
						info1 = '".$db->conn->real_escape_string($this->info1)."',
						info2 = '".$db->conn->real_escape_string($this->info2)."',
						info3 = '".$db->conn->real_escape_string($this->info3)."',
						info4 = '".$db->conn->real_escape_string($this->info4)."',
						info5 = '".$db->conn->real_escape_string($this->info5)."',
						info6 = '".$db->conn->real_escape_string($this->info6)."',
						info7 = '".$db->conn->real_escape_string($this->info7)."',
						info8 = '".$db->conn->real_escape_string($this->info8)."',
						info9 = '".$db->conn->real_escape_string($this->info9)."',
						info10 = '".$db->conn->real_escape_string($this->info10)."'
						WHERE rijksregisternr = '".$this->rijksregisternr."'";	
			//print_r($sql);
			return $db->conn->query($sql);
		}
	}



 ?>