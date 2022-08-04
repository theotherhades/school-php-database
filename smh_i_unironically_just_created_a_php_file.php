<?php

// includes
include("config.php");

// database connection stuff
$dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno())
    {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }

?>