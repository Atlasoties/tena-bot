<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;


class HomecareConversation extends Conversation {

	protected $service;

	public function run() {

		$this->say("📌 ድህረ ቀዶ ጥገናና ማንኛውንም ቁስል ማጠብና መቀየር ( Wound Care )

					📌 የስኳር ፣ ደም ግፊትና የልብ በሽታ 
					ታማሚዎች የህክምና አገለገሎቶች መስጠትና አመጋገብ ማስተማር 

					📌 የመጀመሪያ እርዳታ መስጠትና በሃኪም የታዘዙ መድሃኒቶች በታዙልዎት አግባብና ሰአት ባሉበት መጥተን መስጠት

					📌 በሃኪም የሚታዘዙ መድሃኒቶች አጠቃቀም ማስተማርና መስጠት

					📌 የኮሮና ታማሚዎችን መንከባከብና
					∞  ፅኑ ህሙማን እንክብካቤ
					∞  ፊዚዮቴራፒ አገልግሎት

					ለስትሮክ

					∞ የኦክስጅን ህክምና ከሙሉ ና ከፈጣን  አቅርቦት ጋር

					∞ ለደም ግፊትና ለስኳር ክትትልና እንክብካቤ 

					∞  የምግብ ቱቦ  ማስገባትና መመገብ

					∞ የሽንት ቱቦ ማስገባትና መቀየር");

		$this->ask('Which service do you want? ' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('You didn\'t send anything.');
				return $this->repeat();
			}
			$this->say('I\'ll let you know the result when my creator allow me to interact with tenawo database ');
			$this->say('Have a good time');
		
			$this->service = $value;
		});

	}


}