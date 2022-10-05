<?php 

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\User;

class WelcomeConversation extends Conversation {

	protected $name;

	protected $phone;

	protected $password;

	protected $email;

	public function run() {

		$this->say('ሰላም እንኳን ወደ ጤናዎ የዲጂታል ህክምና እና አገልግሎት መስጫ የሞባይል መተግበሪያ እና ድረ-ገፅ እንዲሁም 9456 የጥሪ ማዕከል በሰላም መጡ!');

		$this->ask('What is your name?' , function($answer){
			$value = $answer->getText();

			if(trim($value === '')) {

				$this->say('This doesn\'t look like a real name.');
				return $this->repeat();
			}

			$this->name = $value;
			$this->say('Nice to meet you, '.$this->name);
		
			$this->getEmail();

		});

	}

	public function getEmail() {
		$this->ask("What is your email?", function($answer){
			$this->email = $answer->getText();
			$this->say("Don't worry about your data privacy, you can see our privacy policy here in our website www.tenawo.com/privacy-and-policy");

			$this->getPassword();

		});

	}

	public function getPassword() {
		$this->ask("Please provide a password for your account?", function($answer){
			$this->password = $answer->getText();

			$this->getPhone();

		});

	}

	public function getPhone() {
		$this->say("I need your phone number to provide you a better service");
		$this->ask("So, What is your phone?", function($answer){
			$this->phone = $answer->getText();
			$this->say("Thank You, ".$this->name." for your cooperation.😎");
			$this->say("Now, What can i help you?");
			$this->say("These are the services i can provide to you 😃");
			$this->say("Type 'drug' to Searching and buy drugs");
			$this->say("Type 'doctor' to get an Online Doctor Consultation & Appointment");
			$this->say("Type 'ambulance' to get an Ambulance Services");
			$this->say("Type 'book' for Booking Online Private Clinics and Hospitals");
			$this->say("Type 'homecare' for Booking Online Home Care Services");
			$this->say("Type 'labs' for Booking online laboratory and pathology services");
			$this->say("Type 'abroad' for Accessing medical tourism");
			$this->say("Type 'stop' to stop questions or conversations with me.");
			$this->say("Type 'help' to get help from me");
			$this->say("Altenatively yo can click on left button or menu and choose the service.");

			// $this->register();
			
		});

	}

	// public function register(){
 //        $user = User::create([
 //            'firstName' => $this->name,
 //            'lastName' => $request->lastName,
 //            'middleName' => $request->middleName,
 //            'gender' => $request->gender,
 //            'role' =>  $role,
 //            'birthOfDate' => $request->birthOfDate,
 //            'address' => $request->address,
 //            'email' => $this->email,
 //            'phone' => $this->phone,
 //            'password' => bcrypt($this->password)
 //        ]);

 //        $this->say($user);
	// }

}