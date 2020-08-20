<?php
	
	/**
	 * 
	 */
	class datacon
	{
		
		public function __construct($db_host,$db_username,$db_password)
		{
			if (!$this->connect($db_host,$db_username,$db_password) )
			{
				echo "Connection Error!! ";
			}
			else
			{
				echo "Connection Successful!!";
			}
		}
		public function connect($db_host,$db_username,$db_password){

		}
	}

	$base = new datacon('localhost','root','');




?>