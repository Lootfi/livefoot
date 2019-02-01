<?php
include './includes/_Globals.php';
// include './includes/classes/Route.php';
// include './includes/Controllers/Controller.php';
// include './includes/Controllers/Teams.php';
// include './includes/Controllers/ContactUs.php';

$route = new Route();

$route::set('',function() {
    Controller::CreateView();
});

Route::set('teams',function() {
    Teams::CreateView();
});

Route::set('contact-us',function() {
    ContactUs::CreateView();
});

?>