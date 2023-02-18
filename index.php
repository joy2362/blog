<?php

use Database\DB;

require_once realpath(__DIR__ . '/vendor/autoload.php');
require_once realpath(__DIR__ . '/config.php');

DB::createDatabase();


echo "every thing ok";