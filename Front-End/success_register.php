<?php
include('connect.php');


$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);

//registration logic


if(isset($_POST['register']))
    // Do checks and logic
{
    //get the information from the form entered by the user
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    //flags to check if the registration is valid or invalid
    $registered = 'valid';
    $invalid_registered = 'invalid';

    //select the user name entered by the user in the form
    //prepare binds the query to prevent SQL injections
    $userExists = $connection->prepare('SELECT * from User_Account_Info_60499 where UName = :Uname');


    $userExists->execute([
        ':Uname' => $username,

    ]);

    //if the username is already in the DB, redirect them back to registration with the invalid username error
    if ($userExists->rowCount() == -1) {

        header('location: register.php?'.$invalid_registered);
        exit();

    }
    //if the username is not in the DB, allow the user to register then take them to the login page
    else if($userExists->rowCount() == 0)  {


        $registerUserAccount = $connection->prepare('INSERT INTO User_Account_Info_60499 (UName, Password, FullName) VALUES (:un, :pwd, :fn)');

        if ($registerUserAccount->execute([
            'un' => $username,
            'pwd' => $password,
            'fn' => $fullname,

        ])) {
            header('location: login.php?'.$registered);
            exit();

        }
    }
}



