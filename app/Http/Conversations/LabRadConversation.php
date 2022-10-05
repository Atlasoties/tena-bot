<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class LabRadConversation extends Conversation {

	protected $image;

	protected $service;

	public function run() {
				$this->say('1. Laboratory');
				$this->say('2. Radiology');

		$this->ask('እባክዎ የፈለጉትን አገልግሎት ይምረጡ? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a service.');
				return $this->repeat();
			}

		
			$this->service = $value;
			$this->getImage();
		});

	}


public function getImage() {


		$this->ask('የእባክዎ የሀኪም ማዘዣ ወረቀቶን ፎቶ አንስተው ይላኩልን 
ወይም መመርመር የፈለጉትን የምርመራ አይነት ይፃፋልን  ' , function($answer){
			// $value = $answer->getText();

			// if(trim($value === '')) {

			// 	$this->say('This doesn\'t look like a real image.');
			// 	return $this->repeat();
			// }

			// $this->say('I\'ll provide what i get after my creator allow me to do so. ' );

			// $this->image = $value;

	$this->say('I\'ll let you know when my creator allow me to interact with tenawo database ');

		});

	}



}