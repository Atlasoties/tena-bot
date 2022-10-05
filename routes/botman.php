<?php


$botman = app('botman');

$botman->hears('/start|start', function($bot){

	$bot->startConversation(new App\Http\Conversations\WelcomeConversation);

});


$botman->hears('/login|login', function($bot){

	$bot->startConversation(new App\Http\Conversations\LoginConversation);


})->stopsConversation();

//to stop the conversation
$botman->hears('/stop|stop', function($bot){

	$bot->reply("🤐 Conversation stopped!");

})->stopsConversation();



//to get help
$botman->hears('/help|help', function($bot){

	$bot->reply("You can get my services by sending one of these commands to me");
	$bot->reply("/start - to get you setup on tenawo
				/login - to login on tenawo
				/medicine - to find drugs
				/doctor - to get a doctor
				/book - to get a health institutions
				/ambulance - to get an ambulance
				/abroad - to get abroad service
				/homecare - to get homecare service
				/stop - to stop ongoing conversations
				/help - to get help
				");

})->skipsConversation();


//to get doctors appointment
$botman->hears('/doctor|doctor', function($bot){

	$bot->startConversation(new App\Http\Conversations\DoctorConversation);

})->skipsConversation();


$botman->hears('/medicine|medicine|drug', function($bot){

	$bot->startConversation(new App\Http\Conversations\MedicineConversation);

})->skipsConversation();


$botman->hears('/labs|radiology|laboratory', function($bot){

	$bot->startConversation(new App\Http\Conversations\LabRadConversation);

})->skipsConversation();

$botman->hears('/book|appointment|consultation', function($bot){

	$bot->startConversation(new App\Http\Conversations\AppointmentConversation);

})->skipsConversation();


$botman->hears('/ambulance|ambulance', function($bot){

	$bot->startConversation(new App\Http\Conversations\AmbulanceConversation);

})->skipsConversation();

$botman->hears('/abroad|abroad', function($bot){

	$bot->startConversation(new App\Http\Conversations\AbroadConversation);

})->skipsConversation();

$botman->hears('/equipment|equipment', function($bot){

	$bot->startConversation(new App\Http\Conversations\EquipmentSellConversation);

})->skipsConversation();

$botman->hears('/homecare|homecare', function($bot){

	$bot->startConversation(new App\Http\Conversations\HomecareConversation);

})->skipsConversation();


$botman->fallback(function($bot){
	$message = $bot->getMessage();
	$bot->reply("Sorry, I don't understand what you just have said. ".$message->getText()." is not a command for me!");
	$bot->reply("/start - to get you setup on tenawo
				/login - to login on tenawo
				/medicine - to find drugs
				/doctor - to get a doctor
				/book - to get a health institutions
				/ambulance - to get an ambulance
				/abroad - to get abroad service
				/homecare - to get homecare service
				/stop - to stop ongoing conversations
				/help - to get help
				");
});