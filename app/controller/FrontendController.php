<?php


function index()
{
    view('index');
}

//function about($params = [])
//{
//    view('about');
//}

function about()
{
    view('about');
}

function contact()
{
    view('contact');
}

function post()
{
    view('post');
}

function login()
{
    var_dump($_POST);
}