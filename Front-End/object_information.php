<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php');

$connection = new PDO ("sqlsrv:Server=$server;Database=$database;", $user, $password);

session_start();

//if the user somehow accesses the page without loggin in, show an error message
if(!isset($_SESSION['userinfo'][3])) {
    require_once('theme.php');


        echo "<h1> Oops, you are not supposed to be here! </h1> <br>";
        echo "<a href='index.php'>Click Here to Go Back</a>";
        exit();



}
    require_once('logged_in_theme.php');

    $accountID = $_SESSION['userinfo'][3];



    echo "<table class='table table-hover'>";
    echo "<tr>";
    echo " <th>Coordinates</th>";
    echo "<th>Item </th>";
    echo "<th>Score</th>";
    echo "</tr>";

    //make a connection with the database

    //query to view all the information
    $sql = 'SELECT Tags from JSONTags_60499 where AccountID = :id';
    $data = $connection->prepare($sql);
    $data->execute([
        ':id' => $accountID,

    ]);

    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

        //decode the json
        $json_data = json_decode($row['Tags'], true);
        foreach ($json_data as $item) {

            //count each json object
            for ($i = 0; $i < count($item); $i++) {

                //display each json object in a table
                echo "<tr>";
                echo "<td>" . $item[$i]['bbox'] . "</td>"; //coordinates
                echo "<td>" . $item[$i]['label'] . "</td>"; //label of object, ex. sink
                //the given format is a decimial, multiply by 100 to get a percent and round to 2 decimal places
                echo "<td>" . round(($item[$i]['score'] * 100), 2) . "%</td>";


                echo "</tr>";


            }

        }
        echo "</table>";

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
</body>
</html>
