<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class DoctorConversation extends Conversation {

	protected $treatment;

	protected $type;


	public function run() {

		$this->say("1. በአካል ሀኪም ለማግኘት");
		$this->say("2. የኦላይን የዶክተር ምክር");
					

		$this->ask('እባክዎ የሚፈልጉትን የህክምና ምክር አይነት ይምረጡ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real type of treatment .');
				return $this->repeat();
			}

		
			$this->treatment = $value;
			$this->getType();
		});

	}


public function getType() {

		$this->say("1.የውስጥ ደዌ ህክምና");
		$this->say("2.ከአንገት በላይ ህክምና");
		$this->say("3.የማህፀን እና ፅንስ ህክምና");
		$this->say("4.የህፃናት ህክምና");
		$this->say("5.የጥርስ ህክምና");
		$this->say("6.የቆዳ ህክምና");
		$this->say("7.የአዕምሮ ህክምና");
		$this->ask('እባክዎ የሚፈልጉትን የህክምና አይነት ይምረጡ ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real appointment.');
				return $this->repeat();
			}
			$this->say('I\'ll get back to you after my creator allow me to do certain things. ' );
			$this->say('Have a good time' );

			$this->type = $value;
		});

	}

}