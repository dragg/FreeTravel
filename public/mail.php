<?php

//        Mail::send('emails.welcome', $data, function($message){
//            $message->to('dragg.ko@gmail.com', 'Philip Brown')->subject('Welcome to Cribbb!');
//        });
//        Mail::send('emails.welcome', [], function($message) {
//            $message->to('dragg.ko@gmail.com', 'Jon Doe')->subject('Welcome to the Laravel 4 Auth App!');
//        });
        
//        $to      = 'dragg.ko@gmail.com';
//        $subject = 'the subject';
//        $message = 'hello';
//        $headers = 'From: webmaster@example.com'; //. "\r\n" .
////            'Reply-To: webmaster@example.com' . "\r\n" .
////            'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
        $to='dragg.ko@gmail.com';         
        $subject='Send mail using php';
        $message='This mail send using php';
        $headers='From: dragg.ko@gmail.com';
        $mail=mail($to,$subject,$message,$headers);
        