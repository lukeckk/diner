<?php

// 328/diner/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the necessary file
require_once ('vendor/autoload.php');
//var_dump(getMeals());


// Instantiate the F3 Base controllers
$f3 = Base::instance();
$con = new Controller($f3);
$dataLater = new DataLayer();

/* TESTING to make sure the query works and is able to insert data to the database
$myOrder = new Order('breakfast', 'pancakes', 'maple syrup');
//save to order
$id = $dataLater->saveOrder($myOrder);
echo "Order $id inserted successfully";

$result = $dataLater->getOrders();
var_dump($result);
*/


// Define a default route
// https://tostrander.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET /admin', function() {
    $GLOBALS['con']->admin();
});

// Breakfast menu
$f3->route('GET /menus/breakfast', function() {
    //echo '<h1>My Breakfast Menu</h1>';
    $GLOBALS['con']->breakfast();
});

// Lunch menu
$f3->route('GET /menus/lunch', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');
});

// Dinner menu
$f3->route('GET /menus/dinner', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/dinner-menu.html');
});

// Order Form Part I
$f3->route('GET|POST /order1', function($f3) {
    //echo '<h1>My Breakfast Menu</h1>';
    $GLOBALS['con']->order1();

});

// Order Form Part II
$f3->route('GET|POST /order2', function($f3) {
    $GLOBALS['con']->order2();
});

// Order Summary
$f3->route('GET /summary', function($f3) {

//    var_dump ( $f3->get('SESSION') );

    $GLOBALS['con']->summary();

});

// Run Fat-Free
$f3->run();