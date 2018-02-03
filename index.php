<?php
/**
* Created by PhpStorm.
* User: Pavel Radchuk
* Date: 1/18/18
* Time: 7:18 PM
*/
//require the autoload file
require_once ('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

//define a default route
$f3->route("GET /", function() {
$view = new view();
echo $view->render('pages/home.html');
});

$f3 -> route('GET/POST /information', function($f3) {
$view = new View;
echo $view->render('pages/information.html');
});

$f3 -> route('GET /profile', function($f3) {
    $view = new View;
    echo $view->render('views/profile.html');
});

$f3 -> route('GET /interests', function($f3) {
    $view = new View;
    echo $view->render('views/interests.html');
});

//run Fat-Free
$f3->run();
