<?php

require_once('../../vendor/autoload.php');
require_once('../config/database.php');
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function($table){
	$table->increments('userId');
	$table->string('name');

});
