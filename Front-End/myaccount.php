<?php
/*
 * debug info

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */

session_start();

//when the user clicks the account details button, this part of the code gets executed
//shows the user there information (username, and fullname)

if(isset($_GET['accountinfo'])) {

    if (isset($_SESSION['userinfo'])) {


        echo "<table class='table table-hover'> <tr>
            <th>Full Name</th>
            <th>Username</th></tr>";

        echo "<tr>";
        echo "<td>" . $_SESSION['userinfo'][0] . "</td>";
        echo "<td>" . $_SESSION['userinfo'][1] . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}

//when the user clicks the change password button, this part of the code gets executed
//allows the user to change the password for there account
elseif (isset($_GET['changePassword'])) {

    echo"
    <form name=\"change_password\" method=\"post\"  onsubmit=\"return validateChangePasswordForm()\" action=\"change_password.php\">

 
    <div class=\"form-group\">
        <label for=\"pwd\">Password: </label>
        <input type=\"password\" placeholder=\"Enter new password\" class=\"form-control\" name=\"password\">
    </div>
    <div name=\"password_error\" id=\"password_error\">
    </div>
    <div class=\"form-group\">
        <label for=\"confirm_pwd\">Confirm Password:</label>
        <input type=\"password\" class=\"form-control\" placeholder=\"Enter password once again\" name=\"confirm_password\">

    </div>
    <div name=\"confirm_password_error\" id=\"confirm_password_error\">
    </div>

    <button type=\"submit\" name='change_password' class=\"btn btn-primary\">Modify </button>
</form>
    
    
    ";



}
elseif (isset($_GET['passwordchanged'])){
    echo "<h2>Successfully changed the password</h2>";
    echo "<h3>Redirecting Back to the your account ... </h3>";

    echo "<p><a href=\"myaccount.php\">Click Here If Not Redirected</a></p>";
    header('Refresh: 3; URL=myaccount.php');
}
else{
    require_once('logged_in_theme.php');
    echo "<h1>My Account</h1>";
    echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"showAccountDetails()\">Account Details</button><br>";
echo " <button type=\"button\" class=\"btn btn-primary\"  onclick=\"changePassword()\">Change Password</button>";

}
?>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-MEq8xmFd953gp2FVvLd8DUEvfBjGCzDjem+gmDqfyyWcaxX4BUD7TtSu1EszNTvK" crossorigin="anonymous">


    <style>
        .btn-primary{
            margin-top: 20px;
            margin-bottom:10px;
            margin-left: 20px;
        }
        h1{
            color: black;
            padding-left: 20px;
        }
        p{
            color: white;
        }
        .table{
            width: 50%;
            margin-top: 20px;
            text-align: center;
        }
        .form-group{
            margin-top: 20px;

            margin-left: 20px;
            width: 50%;
        }

    </style>
    <script type="text/javascript" src="ValidateForm.js"></script>
    <script type="text/javascript" src="account_details.js"></script>

<style>
    #password_error{
        margin-left: 20px;
        color: red;
        margin-bottom: 20px;
    }
    #confirm_password_error{
        margin-left: 20px;
        color: red;
        margin-bottom: 20px;
    }
</style>


</head>
<body>

<div name="accountDetails" id="accountDetails">

</div>
</body>
</html>
