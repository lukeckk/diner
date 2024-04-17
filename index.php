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

//Order 1
$f3->route('GET|POST /order1', function($f3){
//    echo '<h1>My dinner menus</h1>';

    //If the form has been posted
    if($_SERVER['REQUEST_METHOD'] == "POST"){
//        echo "<p> You got here using the POST method </p>";
//        var_dump($_POST);

        //Get the data from the post array
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        //If the data is valid
        if(true){
            $f3->set('SESSION.food', $food);
            $f3->set('SESSION.meal', $meal);

        }
    }
    else{
        echo "<p> You got here using the GET method </p>";
    }

//    //Render a view page
    $view = new Template();
    echo $view->render('views/order1.html');
});

//Order 2
$f3->route('GET /order2', function(){
//    echo '<h1>My dinner menus</h1>';

//    //Render a view page
    $view = new Template();
    echo $view->render('views/order2.html');
});

//Run Fat-Free
$f3->run();