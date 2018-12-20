<?php
/**
 * Created by PhpStorm.
 * User: rahulsharma
 * Date: 2018-12-18
 * Time: 01:38
 */
include('connect.php');

$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);
session_start();


if(!isset($_SESSION['userinfo'][3])) {
    require_once('theme.php');

        echo "<h1> Oops, you are not supposed to be here! </h1> <br>";
        echo "<a href='index.php'>Click Here to Go Back</a>";
        exit();



}
    require_once('logged_in_theme.php');

    $accountID = $_SESSION['userinfo'][3];

    $sql = 'SELECT ProductImage from Account_Images_60499 where AccountID = :id';
    $data = $connection->prepare($sql);


    $data->execute([
        ':id' => $accountID,

    ]);
    $res = $data->fetchAll();
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo " <th>Images</th>";

    echo "</tr>";
    foreach ($res as $row) {
        echo "<td>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['ProductImage']) . ' " >';
        echo "</td>";

    }
    echo "</tr>";
    echo "</table>";




?>
<html>

<head>
<style>
    th{
        text-align: left;
    }
    td{
        text-align: left;
    }



</style>
</head>
<body>

</body>
</html>