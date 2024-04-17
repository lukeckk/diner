<?php

//This is my controller

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require
require_once ('vendor/autoload.php');

//Instantiate the F3 Base Class
$f3 = Base::instance();

//Define a default route
//https://kcheng.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function(){
    //echo below is used for testing before executing the template
//    echo '<h1>Hello from My Diner App!</h1>';

//    //Render a view page
    $view = new Template();
    echo $view->render('views/home-page.html');
});

//Breakfast Menu
$f3->route('GET /menus/breakfast', function(){
//    echo '<h1>My breakfast menus</h1>';

//    //Render a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

//Lunch Menu
$f3->route('GET /menus/lunch', function(){
//    echo '<h1>My lunch menus</h1>';

//    //Render a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');
});

//Dinner Menu
$f3->route('GET /menus/dinner', function(){
//    echo '<h1>My dinner menus</h1>';

//    //Render a view page
    $view = new Template();
    echo $view->render('views/dinner-menu.html');
});

//Run Fat-Free
$f3->run();