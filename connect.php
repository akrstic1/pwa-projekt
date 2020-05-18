<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $basename = "pwa-projekt";
    // Create connection
    $dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error
    connecting to MySQL server.'.mysqli_error());
?>
