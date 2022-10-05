<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class AppointmentConversation extends Conversation {

	protected $treatment;

	protected $time;


	public function run() {

		$this->say("1.የውስጥ ደዌ ህክምና");
		$this->say("2.ከአንገት በላይ ህክምና");
		$this->say("3.የማህፀን እና ፅንስ ህክምና");
		$this->say("4.የህፃናት ህክምና");
		$this->say("5.የጥርስ ህክምና");
		$this->say("6.የቆዳ ህክምና");
		$this->say("7.የአዕምሮ ህክምና");

		$this->ask('እባክዎ ሕክምና ለማድረግ የሚፈልጉትን የህክምና አይነት ይምረጡ?' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real type of treatment .');
				return $this->repeat();
			}

		
			$this->treatment = $value;
			$this->getTime();
		});

	}


public function getTime() {


		$this->ask('እባክዎ ቀጠሮ እንዲያዝልዎ የሚፈልጉበትን ቀንና ሰዓት ይጠቅሱ ? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real appointment.');
				return $this->repeat();
			}
			$this->say('I\'ll let you know the result when my creator allow me to interact with tenawo database ');
			$this->say('Have a good time');
			$this->time = $value;
		});

	}

}