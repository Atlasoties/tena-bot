<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class MedicineConversation extends Conversation {

	protected $medicine;

	public function run() {


		$this->ask('እባክዎ የመድኃኒት ማዘዣ ወረቀቶን ፍቶ አንስተው ይላኩልን !
		 እባክዎ የፈለጉትን የመድኃኒት ስም ይፃፉልን ! ' , function($answer){
			// $value = $answer->getText();

			// if(trim($value === '')) {

			// 	$this->say('This doesn\'t look like a real medicine name.');
			// 	return $this->repeat();
			// }
			$this->say('I\'ll let you know the result when my creator allow me to interact with tenawo database ');
			$this->say('Have a good time');
			
		
			// $this->medicine = $value;
		});

	}

}