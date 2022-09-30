<?php

$botman = app('botman');

$botman->hears('/start', function($bot){

	$bot->reply('started');

});
