<?php

/*
 debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

session_start();

//checks if the user is already logged in, if they are, include the theme for the logged in user
if(isset($_SESSION['userinfo'][1])){
    include('logged_in_theme.php');

}
else{
    //else include the theme for a non-logged in user
    include('theme.php');

}

?>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-MEq8xmFd953gp2FVvLd8DUEvfBjGCzDjem+gmDqfyyWcaxX4BUD7TtSu1EszNTvK" crossorigin="anonymous">


<style>
    .jumbotron{
        background-image: url("backdrop.png");
        background-size: cover;
    }
    h1{
        color: white;
    }
    p{
        color: white;
    }
</style>

</head>
        <body>

<div class="jumbotron text-center">
    <h1>Internet of Things</h1>
    <p>Rahul Sharma, Jonathan North</p>
    <button type="button" class="btn btn-primary" onclick="location.href='login.php';">Login</button>
    <button type="button" class="btn btn-secondary"onclick="location.href='register.php';">Register</button>


</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Project Overview</h3>
            <ul>
             <li>Camera sends captures to Azure Web Application</li>
               <li> Azure processes the image</li>
               <li> Image is sent to database with extra information</li>
               <li> Findings are presented to the user through a website</li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h3>Back-End Stack</h3>

            <ul>
                <li>
                  Azure App Service
                </li>
                <li>
                    Microsoft's CNTK Library
                    <ul>
                        <li>Faster R-CNN</li>
                    </ul>
                </li>
                <li>
                    MS SQL Database
                </li>
                <li>
                    Python
                    <ul>
                        <li>Flask</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h3>Front-End Stack</h3>
            <ul>
                <li>
                    JavaScript
                </li>
                <li>
                    PHP
                </li>
                <li>
                    HTML
                </li>
                <li>
                    CSS/Bootswatch Theme
                </li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
