<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');
require_once realpath(__DIR__ . '/config.php');


$Category = new \App\models\Category();

var_dump($Category->index());