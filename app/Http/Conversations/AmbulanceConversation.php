<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class AmbulanceConversation extends Conversation {

	protected $address;

	protected $institution;

	protected $type;

	public function run() {

		$this->say("እባክዎ የመነሻ አድራሻዎን እና ለህክምና የሚሔዱበትን ተቋም ይፃፋልን!");

		$this->ask('አድራሻ? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real address.');
				return $this->repeat();
			}

		
			$this->address = $value;
			$this->getHospital();
		});

	}


public function getHospital() {


		$this->ask('የሚሔዱበት ተቋም? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real institution name.');
				return $this->repeat();
			}

			$this->institution = $value;
			$this->getType();

		});

	}

	public function getType() {


		$this->ask('ለተመላላሽ ህክምና? ድንገተኛ ? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real type of incident.');
				return $this->repeat();
			}

			$this->say('I\'ll let you know the result when my creator allow me to interact with tenawo database ');
			$this->say('Have a good time');
		
			$this->institution = $value;

		});

	}

}