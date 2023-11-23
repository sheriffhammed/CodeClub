<?php

// Connect to the database and return the database object
function connect() {
   
  // Set the hostname for CodeCademy's platform
    $hostname = "localhost";

    // Set the database name
    $dbname = "ccuser";

    // Set the username and password with permissions to the database
    $username = "root";
    $password = "";
    
    // Create the DSN (data source name) by combining the database type, hostname and dbname
    $dsn = "mysql:host=$hostname;dbname=$dbname";
    // Create the try/catch blocks here
    try{
      // Connect to the database and return the database object
      $db = new PDO($dsn, $username, $password);
      return $db;
    }
    catch(Exception $e){
      // If an error is thrown, catch it, echo the message, then exit
      echo "Connection failed: " . $e->Errormessage;
    }
    /*
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ccuser", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    return $conn;
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  */
}

// Get a list of all tiers in the database
function getTiers() {
    try {
        // Get the database object
        $db = connect();

        // Create a query to get all fields for all tiers
  $tiersQuery  = $db->query('SELECT * FROM tiers');
        // Return all records
      $tiers = $tiersQuery->fetchAll(PDO::FETCH_ASSOC);
      return $tiers;
    } catch (Exception $e) {
        // If an error occurs echo the error
        echo $e->getMessage();
    }
}