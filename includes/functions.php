<?php

function connectToDB() {
    $host = 'devkinsta_db'; // change this to devkinsta_db
    $dbname = 'studygrp2'; // use your own database name
    $dbuser = 'root';
    $dbpassword = 'LrJHyxBK8VE6Afq8'; // use your own password

    $database = new PDO (
        "mysql:host=$host;dbname=$dbname",
        $dbuser,
        $dbpassword
    );

    return $database;
}

function isUserLoggedIn() {
    return isset($_SESSION['user']) ? true : false;
}