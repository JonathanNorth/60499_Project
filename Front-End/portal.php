<?php

/*
 * debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include('connect.php');
require_once('logged_in_theme.php');
$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);

session_start();
$accountID = $_SESSION['userinfo'][3];

//display welcome message to the user
echo "<h1>Welcome ";
if (isset($_SESSION['userinfo'])) {
        echo $_SESSION['userinfo'][0];


echo "</h1>";
    echo " <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='object_information.php';\">View Details</button>";
    echo "<br>";
    echo " <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='viewimages.php';\">View Images</button>";

}

?>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-MEq8xmFd953gp2FVvLd8DUEvfBjGCzDjem+gmDqfyyWcaxX4BUD7TtSu1EszNTvK" crossorigin="anonymous">


    <style>

        h1{
            color: black;
            margin-left: 20px;
        }
        p{
            color: white;
        }
        .btn-primary{
            margin: 10px;
            margin-left: 20px;
        }
        th{
            text-align: left;
        }
        td{
            text-align: left;
        }


    </style>
</head>
<body>



<div name="json_data" id="json_data">

</div>

<div name="img" id="img">

</div>

</body>
</html>
