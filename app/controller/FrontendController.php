<?php


function index()
{
    view('index', [
        'name' => 'joy'
    ]);
}

function home()
{
    view('home');
}

function about($params = [])
{
    view('about');
}

function contract()
{
    view('contract');
}