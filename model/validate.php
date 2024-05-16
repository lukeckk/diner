<?php

//Validate data for the diner app

//Return true if food contains at least 3 characters
class Validate
{
    static function validFood($food)
    {
        //    check string length and get rid of white space
        return strlen(trim($food)) >= 3;

    }

    //return true if meal is valid
    static function validMeal($meal)
    {
        //check to see if the meal that user select is in the array of meal
        return in_array($meal, DataLayer::getMeals());
    }
}