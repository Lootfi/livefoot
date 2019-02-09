<?php
// include './_Globals.php';
// include './includes/classes/Route.php';
include 'index.php';

Route::set('',function() {
    Index::CreateView('Index');
});

Route::set('teams',function() {
    Teams::CreateView('Teams');
});

Route::set('contact-us',function() {
    ContactUs::CreateView('ContactUs');
});

Route::set('register',function(){
    Register::CreateView('Register');
});

Route::set('login',function(){
    Login::CreateView('Login');
});
?>