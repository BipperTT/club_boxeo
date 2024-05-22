<?php
    $servername = "sql7.freemysqlhosting.net";
    $database = "sql7707955";
    $username = "rsql7707955";
    $password = "zwVGAsCMzb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>