<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class EquipmentSellConversation extends Conversation {

	protected $productName;

	protected $quantity;

	protected $measurement;

	protected $detail;


	public function run() {

		$this->ask('እባክዎ የሚፈልጉትን የህክምና እቃ ወይም መድሀኒት ስም  ይፃፋልን! ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real product name.');
				return $this->repeat();
			}

		
			$this->productName = $value;
			$this->getQuantity();
		});

	}


public function getQuantity() {


		$this->ask('ብዛት? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real quantity.');
				return $this->repeat();
			}

			$this->quantity = $value;
			$this->getMeasurement();

		});

	}

	public function getMeasurement() {


		$this->ask('መለኪያ ? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real measurement of incident.');
				return $this->repeat();
			}

			$this->say('እባኮ ጥቂት ይታገሱን!እናመሰግናለን');
		
			$this->measurement = $value;
			$this->getDetail();

		});

	}

	public function getDetail() {


		$this->ask('አጠቃላይ ዝርዝር ሁኔታ ይፃፋልን ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real an explanation.');
				return $this->repeat();
			}

			$this->say('I\'ll let you know the result when my creator allow me to interact with tenawo database ');
			$this->say('Have a good time');
		
			$this->detail = $value;

		});

	}

}