<?php
include './_Globals.php';
include './includes/classes/Route.php';
include 'index.php';

Route::set('',function() {
    Controller::CreateView('Root');
});

Route::set('teams',function() {
    Teams::CreateView('Teams');
});

Route::set('contact-us',function() {
    ContactUs::CreateView('ContactUs');
});

?>