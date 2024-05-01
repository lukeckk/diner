<?php

/*
    This is my data layer.
    It belongs to the Model.
*/

// A function that gets the meals for the Diner app

function getMeals(){
    return array('breakfast', 'lunch', 'dinner');
}

function getCondiments(){
    return array('ketchup', 'mustard', 'sriracha');
}