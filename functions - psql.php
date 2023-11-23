<?php

// Connect to the database and return the database object
function connect() {
    // Set the hostname for CodeCademy's platform
    $hostname = 'localhost';

    // Set the database name
    $dbname = 'ccuser';

    // Set the username and password with permissions to the database
    $username = 'postgres';
    $password = 'postgres';
    
    // Create the DSN (data source name) by combining the database type, hostname and dbname
    $dsn = "pgsql:host=$hostname;dbname=$dbname";

    // Create the try/catch blocks here
    try{
      $db = new PDO($dsn, $username, $password);
      return $db;
    }
    catch(Exception $e){
      echo $e->Errormessage;
    }
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