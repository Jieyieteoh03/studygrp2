<?php

    // start session
    session_start();

    // require all the files
    require 'includes/functions.php';
    
    // get route
    $path = trim( $_SERVER['REQUEST_URI'], '/' ); // remove starting and ending slashes

    // remove query string
    $path = parse_url( $path, PHP_URL_PATH );

    if ( isset( $path ) ) {
        switch( $path ) {
            case 'form/submit':
                require 'includes/form/submit.php';
                break;
            case 'auth/login':
                require 'includes/auth/login.php';
                break;
            case 'auth/signup':
                require 'includes/auth/signup.php';
                break;                                   
            case 'results':
                require 'pages/results.php';
                break;
            case 'login':
                require 'pages/login.php';
                break;
            case 'logout':
                require 'pages/logout.php';
                break;
            case 'signup':
                require 'pages/signup.php';
                break;
            case 'question':
                require 'pages/question.php';
                break;  
            default:
                require 'pages/home.php';
                break;
        }
    } else {
        require 'pages/home.php';
    }