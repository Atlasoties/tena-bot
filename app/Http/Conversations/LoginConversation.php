<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class LoginConversation extends Conversation {

	protected $email;

	protected $password;

	public function run() {

		$this->ask('Please enter your email? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like an email.');
				return $this->repeat();
			}

		
			$this->email = $value;
			$this->getPassword();
		});

	}


public function getPassword() {


		$this->ask('Enter your password?  ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a password.');
				return $this->repeat();
			}

			$this->say('I\'ll let you know when my creator allow me to interact with tenawo database ');

			$this->password = $value;

		});

	}



}