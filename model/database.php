<?php
    $hostname = "sql2.njit.edu" ; 
	  $username = "mb535" ;
	  $password = "RzYw6ASGz";
	  $dsn = "mysql:host=$hostname;dbname=$username";
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>