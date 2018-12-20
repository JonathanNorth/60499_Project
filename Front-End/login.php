<?php
include('theme.php');
include('connect.php');

//create a connection
$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);

//start the session
session_start();

//if the user is already logged in, it will take them to there portal if they try to login again
if(isset($_SESSION['userinfo'][1])){
    header ("Location: portal.php");
    exit;
}

//gets information from success_register.php, if the user successfully registered, they are taken to the login page
//this part of the code just displays a header telling the user they made an account, now login
if(isset($_GET['valid'])){
    echo "<h2>Successfully Registered, Now Login</h2>";
}

//the login logic
if(isset($_POST['login'])) {

    //get the fields entered by the user
    $user=$_POST['username'];
    $pwd=$_POST['pwd'];


        $statement = $connection->prepare('SELECT * from User_Account_Info_60499 where UName = :Uname and Password = :Password');

        $statement->execute([
            ':Uname' => $user,
            ':Password' => $pwd
        ]);
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //store session information
            $_SESSION['userinfo'] = array();
            $_SESSION['userinfo'][0]= $row['FullName'];
            $_SESSION['userinfo'][1]= $row['UName'];
            $_SESSION['userinfo'][2]= $row['Password'];
            $_SESSION['userinfo'][3]= $row['AccountID'];



        }
        //if successfully logged in, redirect to the portal
        if($statement->rowCount() > 0){

           header("location: portal.php");
           exit();

        }
        else{
            //show alert for invalid login credentials
            echo '<script language="javascript">alert("Invalid Credentials");</script>';

        }


}


?>



<html>
<head>
    <style>
        .form-group{
            width: 50%;
            margin-left: 20px;
        }
        .btn-primary{
            margin-left: 20px;
        }
        h2
        {
            margin-left: 20px;
            font-size: 22px;
            color:green;
        }
        h3{
            font-size: 20px;
            color: red;
            padding-top: 15px;
        }

    </style>
</head>

<body>
<form name="login" method="post" action="">

    <div class="form-group">
        <label for="user">Username:</label>
        <input type="user" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd">
    </div>

    </div>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
<br>

</form>

</body>
</html>

