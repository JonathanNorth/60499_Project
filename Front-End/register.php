<?php
/**
* debug

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */


include('theme.php');
include('connect.php');

//throw this message if username exists in DB
if(isset($_GET['invalid'])){
    echo "<h2>Username already exists, please enter a new one</h2>";
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
        #fullname_error{
            margin-left: 20px;
            color: red;
            margin-bottom: 20px;
        }
        #username_error{
            margin-left: 20px;
            color: red;
            margin-bottom: 20px;
        }
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
        h2{
            margin-left: 20px;
            font-size: 22px;
            color:red;

        }
    </style>


    <script type="text/javascript" src="ValidateForm.js"></script>
</head>

<body>
<form name="register" method="post"  onsubmit="return validateRegistrationForm()" action="success_register.php">

    <div class="form-group">
        <label for="fullname">Full Name:</label>
        <input type="text" class="form-control" name="fullname">
    </div>
    <div name="fullname_error" id="fullname_error">
    </div>
    <div class="form-group">
        <label for="user">Username:</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div name="username_error" id="username_error">
    </div>
    <div class="form-group">
        <label for="pwd">Password: </label>
        <input type="password" placeholder="Must be atleast 6 characters with letters and numbers" class="form-control" name="password">
    </div>
    <div name="password_error" id="password_error">
    </div>
    <div class="form-group">
        <label for="confirm_pwd">Confirm Password:</label>
        <input type="password" class="form-control" name="confirm_password">

    </div>
    <div name="confirm_password_error" id="confirm_password_error">
    </div>

    <button type="submit" name='register' class="btn btn-primary">Register </button>
</form>

</body>

</html>

