<?php

/**
 * My controller controllers for the Diner project
 * 328/diner/controllers/controller.php
 */

class Controller
{
    private $_f3; //Fat-free Router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        echo '<h1>Hello from My Diner App!</h1>';

        // Render a view page
        $view = new Template();
        echo $view->render('views/home-page.html');
    }

}