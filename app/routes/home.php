<?php

$app->get('/', function() use ($app) {





    //echo $app->randomlib->generateString(128);

   /* $user = $app->auth;

    $app->mail->send('email/auth/registered.php',['user'=>$user], function($message) use ($user){
        $message->to($user->email);
        $message->subject('Thanks for registering.');
    });*/

    $app->render('home.php');
})->name('home');


