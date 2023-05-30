<?php


route('GET', '/', 'FrontendController@index');
//route('GET', 'about', 'FrontendController@about', ['id' => null]);
//route('GET', 'home', 'FrontendController@home');
route('GET', 'about', 'FrontendController@about');
route('GET', 'contact', 'FrontendController@contact');
route('GET', 'post', 'FrontendController@post');
route('POST', 'login', 'FrontendController@login');
