<?php
// require autoload file
require_once('vendor/autoload.php');
//Start the session
session_start();
include('model/validate.php');
// create instance of base class
$f3 = Base::instance();
// set debug level
$f3->set('DEBUG', 3);
$f3->set('states', array("Washington","Idaho","California","Oregon"));
$f3->set('indoors', array( "tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games"));
$f3->set('outdoors', array( "hiking", "biking", "swimming", "collecting", "walking", "climbing"));
// define a default route using a template
$f3->route('GET /', function() {
    $template = new Template();
    echo $template->render('pages/home.html');
});
//Define a form 1 route
$f3->route('GET|POST /personal', function($f3, $params) {
    $errors = array();
    if(isset($_POST['submit'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $premium = $_POST['premium'];
        $_SESSION['first'] = $first;
        $_SESSION['last'] = $last;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['phone'] = $phone;
        $_SESSION['premium'] = $premium;
        if(!validName($first)){
            $errors['first'] = "Please enter a valid name.";
        }
        if(!validName($last)){
            $errors['last'] = "Please enter a valid name.";
        }
        if(!validAge($age)){
            $errors['age'] = "Must be 18 or older.";
        }
        if(!validPhone($phone)){
            $errors['phone'] = "Invalid. Numbers and dashes only.";
        }
        $success = sizeof($errors) == 0;
        // create PremiumMember object if selected
        if(isset($_POST['premium'])) {
            $member = new PremiumMember($_SESSION['first'], $_SESSION['last'], $_SESSION['age'],
                $_SESSION['member'], $_SESSION['phone']);
            $_SESSION['member'] = $member;
        }
        // create Member object if not selected
        else {
            $member = new Member($_SESSION['first'], $_SESSION['last'], $_SESSION['age'],
                $_SESSION['member'], $_SESSION['phone']);
            $_SESSION['member'] = $member;
        }
        $f3->set('first', $first);
        $f3->set('last', $last);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);
        $f3->set('errors', $errors);
        $f3->set('success', $success);
        $f3->set('member', $member);
    }
    $template = new Template();
    echo $template->render('pages/form1.html');
    if($success) {
        $f3->reroute('/profile');
    }
});
//Define a form 2 route
$f3->route('GET|POST /profile', function($f3, $params) {
    $errors = array();
    $member = $_SESSION['member'];
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $state = $_POST['state'];
        $bio = $_POST['bio'];
        $seeking = $_POST['seeking'];
        $_SESSION['email'] = $email;
        $_SESSION['state'] = $state;
        $_SESSION['bio'] = $bio;
        $_SESSION['seeking'] = $seeking;
        $success = sizeof($errors) == 0;
        $f3->set('email', $email);
        $f3->set('state', $state);
        $f3->set('bio', $bio);
        $f3->set('seeking', $seeking);
        $f3->set('errors', $errors);
        $f3->set('success', $success);
        $f3->set('member', $member);
        $member->setEmail($email);
        $member->setState($state);
        $member->setSeeking($seeking);
        $member->setBio($bio);
    }
    $template = new Template();
    echo $template->render('pages/form2.html');
    if($success) {
        // go to interests if premium member
        if($member instanceof PremiumMember) {
           $f3->reroute('/interests');
        }
        // skip to summary if not premium
        else {
            $f3->reroute('/summary');
        }
    }
});
//Define a form 3 route
$f3->route('GET|POST /interests', function($f3, $params) {
    $member = $_SESSION['member'];
    $errors = array();
    if(isset($_POST['submit'])){
        $indoor = $_POST['indoors'];
        $outdoor = $_POST['outdoors'];
        $_SESSION['indoor'] = $indoor;
        $_SESSION['outdoor'] = $outdoor;
        if (!validIndoor($indoor)) {
            $errors['indoors'] = "Please select valid activities.";
        }
        if (!validOutdoor($outdoor)){
            $errors['outdoors'] = "Please select valid activities.";
        }
        $success = sizeof($errors) == 0;
        $f3->set('indoor', $indoor);
        $f3->set('outdoor', $indoor);
        $f3->set('errors', $errors);
        $f3->set('success', $success);
        $f3->set('member', $member);
        $member->setIndoorInterests($indoor);
        $member->setOutdoorInterests($outdoor);
    }
    $template = new Template();
    echo $template->render('pages/form3.html');
    if($success) {
        $f3->reroute('/summary');
    }
});
// define summary route
$f3->route('GET|POST /summary', function($f3, $params) {
    $member = $_SESSION['member'];
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
    $f3->set('member', $member);
    $fname = $_SESSION['first'];
    $interests = "";
    $image = "";
    $premium = 0;
    if($member instanceof PremiumMember) {
       $interests = implode(", ", $member->getIndoorInterests()).", ".implode(", ", $member->getOutdoorInterests());
       $premium = 1;
    }
    // create Member table using its object
    $template = new Template();
    echo $template->render('pages/results.html');
    $database = new Database();
    $database->insertMember($fname, $_SESSION['last'], $_SESSION['age'], $_SESSION['gender'],
        $_SESSION['phone'], $_SESSION['email'], $_SESSION['state'], $_SESSION['seeking'],
        $_SESSION['bio'], $premium, $image, $interests);
});
// define member list route
$f3->route('GET /admin', function($f3, $params) {
    $database = new Database();
    $f3->set('database', $database);
    $template = new Template();
    echo $template->render('pages/admin.html');
});
// run fat free
$f3->run();