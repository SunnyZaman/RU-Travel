<?php
    include "connection.php";
 // sql to create table if already created we can comment it out
 $sql = "CREATE TABLE IF NOT EXISTS RUTravelUsers (
 Id INT PRIMARY KEY AUTO_INCREMENT,
 FirstName VARCHAR(250) NOT NULL,
 LastName VARCHAR(250) NOT NULL,
 Email VARCHAR(250) NOT NULL UNIQUE,
 UserPassword VARCHAR(250) NOT NULL,
 Telephone VARCHAR(250) NOT NULL,
 UserAddress VARCHAR(250) NOT NULL,
 isAdmin BOOLEAN NOT NULL
 )";

 if ($conn->query($sql) === FALSE) {
     echo "Error creating table: " . $conn->error;
 }
 $sql = "CREATE TABLE IF NOT EXISTS RUTravelPlaces (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Continent VARCHAR(250) NOT NULL,
    Country VARCHAR(250) NOT NULL,
    City VARCHAR(250) NOT NULL,
    PlaceType VARCHAR(250) NOT NULL,
    Attraction VARCHAR(250) NOT NULL
    )";
   
    if ($conn->query($sql) === FALSE){
        echo "Error creating table: " . $conn->error;
    }
?>