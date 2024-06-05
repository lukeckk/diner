<?php

/*
    This is my data layer.
    It belongs to the Model.

CREATE TABLE orders (
	order_id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    food VARCHAR(50),
    meal VARCHAR(20),
    condiments VARCHAR(50),
    date_time DATETIME DEFAULT NOW()

)

INSERT INTO orders (food, meal, condiments) VALUES ('food', 'meal', 'condiments')

*/

$path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
require_once $path;
class DataLayer
{
    //Add a frield to store the db connection object
    private $_dbh;

    /**
     * DataLayer constructor connects to PDO Database
     *
     */
    function __construct()
    {
        //Not neccesary to put the require in the construct but for logical purpose
//        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
//        require_once $path;

        try{
            //Instantiate our PDO databse object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo 'Connected to database';
        }
//if doesnt work, catch exception
        catch (PDOException $e){
            die( $e->getMessage() );      //this tells you the error, dont use it when website is live, use the line below instead
//            die("<p>Something went wrong</p>");
        }

    }

    /**
     * Save a restaurant order to the database
     * @param $order an Order object
     * @return int the Order ID
     */
    function saveOrder($order)
    {
        //PDO
// 1. Define the query, using : as placeholder to input data later
        $sql = 'INSERT INTO orders (food, meal, condiments) VALUES (:food, :meal, :condiments)';

//2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

//3. Binding the parameters using classes ***
        $food = $order->getFood();
        $meal = $order->getMeal();
        $condiments = $order->getCondiments();
        $statement->bindParam(':food', $food);
        $statement->bindParam(':meal', $meal);
        $statement->bindParam(':condiments', $condiments);

//4. Execute the query
        $statement->execute();

//5. Process the results
        $id = $this->_dbh->lastInsertId();
        return $id;
    }
    static function getMeals()
    {
        return array('breakfast', 'lunch', 'dinner');
    }

    static function getCondiments()
    {
        return array('ketchup', 'mustard', 'sriracha');
    }

    /**
     * Get the orders from the dstabse
     * @return $result assoc array of orders
     */

    function getOrders()
    {
        //1. Define the query
        $sql = "SELECT order_id, food, meal, condiments, date_time FROM orders ORDER BY date_time DESC";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Binding the parameters
        //no binding necessary because we are selecting all

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }


}