<?php

	/**
	 * 
	 */
	class Bankaccount
	{
		public $account = 70;
		public $type ='';
		public function tie($in){
			$this->type = $in;
		} 
		public function Display()
		{
			echo "Your Balance is $" . $this->account . '<br>' ;	
		}
		public function withdraw($amount){
			if (($this->account)<$amount) {
				echo "Insufficient Fund!! Try again when you get money!! ";
			}else{
				$this->account = $this->account-$amount;
			}	
		}
		public function deposit($amount){
			$this->account = $this->account+$amount;	
		}
	}

	/**
	 * 
	 */
	class savings extends Bankaccount
	{
		

	}

	$alex = new Bankaccount;
	$alex->deposit(500);
	$alex->withdraw(75);
	$alex->tie('Diamond'); 
	echo 'For Your ' . $alex->type . ' Account, ' . $alex->Display();

	$alex = new savings;
	$alex->deposit(20);
	$alex->Display();

	$ali = new Bankaccount;
	$ali->deposit(50);
	$ali->withdraw(795);
	$ali->Display();
?>