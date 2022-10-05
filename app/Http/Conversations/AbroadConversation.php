<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class AbroadConversation extends Conversation {

	protected $file;

	protected $history;



	public function run() {

		$this->ask('እባክዎ የህክምና መረጃዎን ፋይል ይላኩልን! ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real product name.');
				return $this->repeat();
			}

		
			$this->file = $value;
			$this->getHistory();
		});

	}


public function getHistory() {


		$this->ask('እባክዎ ህክምና ሲከታተሉ የቆዩበትን ተቋም ያስገቡ ?

የህክምና ውሳኔ ሰርትፊኬትዎን ይላኩ ? ' , function($answer){
			// // $value = $answer->getText();

			// // if(trim($value === '')) {

			// 	$this->say('This doesn\'t look like a real quantity.');
			// 	return $this->repeat();
			// }

			// $this->history = $value;
	$this->say('I\'ll let you know when my creator allow me to interact with tenawo database ');

		});

	}

}