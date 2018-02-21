<?php
/**
* Created by PhpStorm.
* User: Pavel Radchuk
* Date: 1/18/18
* Time: 7:18 PM
*/

session_start();

//require the autoload file
require_once ('vendor/autoload.php');

session_start();  

include('model/validate.php');

//create an instance of the Base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

$f3->set('states', array("Washington","Idaho","California","Oregon"));

$f3->set('indoors', array( "tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games"));
$f3->set('outdoors', array( "hiking", "biking", "swimming", "collecting", "walking", "climbing"));

$f3->route('GET /', function() {
            $template = new Template();
            echo $template->render('/pages/home.html');
        }
    );

    $f3->route('GET|POST /information', function($f3, $params) {
            if(isset($_POST['submit'])){
                $first = $_POST['first'];
                $last = $_POST['last'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $_SESSION['first'] = $first;
                $_SESSION['last'] = $last;
                $_SESSION['age'] = $age;
                $_SESSION['gender'] = $gender;
                $_SESSION['phone'] = $phone;
                $_SESSION['premium'] = $premium;
                 if(!validName($first)){ 
                    $errors['first'] = "Please enter a first name."; 
                } 
                if(!validName($last)){ 
                    $errors['last'] = "Please enter a last name."; 
                } 
                if(!validAge($age)){ 
                    $errors['age'] = "The age requirement is 18 or older."; 
                } 
                if(!validPhone($phone)){ 
                errors['phone'] = "Please enter Numbers and dashes only."; 
                }
                // create PremiumMember object if selected 
                if(isset($_POST['premium'])) { 
                    $member = new PremiumMember($_SESSION['first'],
                    $_SESSION['last'], $_SESSION['age'], 
                    $_SESSION['member'], $_SESSION['phone']); 
                    $_SESSION['member'] = $member; 
                } 
                    // create Member object if not selected 
                else { 
                    $member = new Member($_SESSION['first'],
                    $_SESSION['last'], $_SESSION['age'], 
                    $_SESSION['member'], $_SESSION['phone']); 
                    $_SESSION['member'] = $member; 
                } 
                $success = sizeof($errors) == 0; 
                $f3->set('first', $first);
                $f3->set('last', $last);
                $f3->set('age', $age);
                $f3->set('gender', $gender);
                $f3->set('phone', $phone);
                $f3->set('errors', $errors);
                $f3->set('success', $success);
            }
            $template = new Template();
            echo $template->render('pages/form1.html');
            if($success) {
                $f3->reroute('/profile');
            }
        }
    );

    $f3->route('GET|POST /profile', function($f3, $params) {
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $state = $_POST['state'];
                $bio = $_POST['bio'];
                $seeking = $_POST['seeking'];
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;
                $_SESSION['bio'] = $bio;
                $_SESSION['seeking'] = $seeking;
                include('model/validate.php');
                $f3->set('email', $email);
                $f3->set('state', $state);
                $f3->set('bio', $bio);
                $f3->set('seeking', $seeking);
                $f3->set('errors', $errors);
                $f3->set('success', $success);
            }
            $template = new Template();
            echo $template->render('views/profile.html');
            if($success) {
                $f3->reroute('/interests');
            }
        }
    );
    //Define a form 3 route
    $f3->route('GET|POST /interests', function($f3, $params) {
            if(isset($_POST['submit'])){
                $indoor = $_POST['indoors'];
                $outdoor = $_POST['outdoors'];
                $_SESSION['indoor'] = $indoor;
                $_SESSION['outdoor'] = $outdoor;
                include('model/validate.php');
                $f3->set('indoor', $indoor);
                $f3->set('outdoor', $indoor);
                $f3->set('errors', $errors);
                $f3->set('success', $success);
            }
            $template = new Template();
            echo $template->render('pages/interests.html');
            if($success) {
                $f3->reroute('/summary');
            }
        }
    );
    $f3->route('GET|POST /summary', function($f3, $params) {
            $f3->set('first', $_SESSION['first']);
            $f3->set('last', $_SESSION['last']);
            $f3->set('age', $_SESSION['age']);
            $f3->set('gender', $_SESSION['gender']);
            $f3->set('phone', $_SESSION['phone']);
            $f3->set('email', $_SESSION['email']);
            $f3->set('state', $_SESSION['state']);
            $f3->set('seeking', $_SESSION['seeking']);
            $f3->set('indoor', $_SESSION['indoor']);
            $f3->set('outdoor', $_SESSION['outdoor']);
            $f3->set('bio', $_SESSION['bio']);
            $template = new Template();
            echo $template->render('views/summary.html');
        }
    );

    // run fat free
    $f3->run();