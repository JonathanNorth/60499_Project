<?php
/**
 This file does the work to change the users password. It makes a connection with the server, makes the update query,
 * then takes you back to your account page
 */
include('connect.php');

/*
 debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);
session_start();
$success = 'passwordchanged'; //flag identifier


    $username = $_SESSION['userinfo'][1]; //get the username to check the sql query
    $password = $_POST['password']; //get the password from the form

    $updatePassword = $connection->prepare("UPDATE User_Account_Info_60499 SET Password  = :pwd WHERE UName = :usr");

    if ($updatePassword->execute([
        'pwd' => $password,
        'usr' => $username

    ])){

       header('location: myaccount.php?'.$success);
        exit();
}