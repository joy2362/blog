<?php


route('GET', '/', 'FrontendController@index');
route('GET', 'about', 'FrontendController@about', ['id' => null]);
route('GET', 'home', 'FrontendController@home');
route('GET', 'contract', 'FrontendController@contract');