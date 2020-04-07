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
    Attraction VARCHAR(250) NOT NULL UNIQUE
    )";
   
    if ($conn->query($sql) === FALSE){
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE IF NOT EXISTS RUTravelAttractions(
        Id INT PRIMARY KEY AUTO_INCREMENT,
        AttractionImage VARCHAR(250) NOT NULL,
        AttractionAddress VARCHAR(250) NOT NULL,
        AttractionDescription VARCHAR(250) NOT NULL,
        Price FLOAT NOT NULL,
        Coordinates VARCHAR(250) NOT NULL,
        Attraction VARCHAR(250) NOT NULL,
        FOREIGN KEY (Attraction)
        REFERENCES RUTravelPlaces(Attraction)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";
       
    if ($conn->query($sql) === FALSE){
        echo "Error creating table: " . $conn->error;
    }
    // $sql = "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'Malaysia', 'Gombak', 'History', 'Batu Caves');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'Malaysia', 'Sabah', 'Hiking', 'Mount Kinabalu');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'Malaysia', 'Kuala Lumpur', 'Shopping', 'Bukit Bintang');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'India', 'Agra', 'History', 'Taj Mahal');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'India', 'Prempura', 'Park', 'Ranthambore National Park');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Asia', 'United Arab Emirates', 'Dubai', 'Shopping', 'Dubai Mall');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Europe', 'Germany', 'Berlin', 'History', 'Brandenburg Gate');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Europe', 'Germany', 'Lower Bavaria', 'Skiing' , 'Grober Arber');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('North America', 'Canada', 'Toronto', 'Museum', 'Royal Ontario Museum');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('North America', 'USA', 'New York', 'History', 'Statue of Liberty');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('North America', 'USA', 'Manhattan', 'Arts and Culture', 'Museum of Modern Art');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('North America', 'USA', 'Arizona', 'Outdoors', 'Grand Canyon National Park');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('South America', 'Brazil', 'Rio de Janerio', 'History', 'Christ the Redeemer');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('South America', 'Peru', 'Eastern Cordillera', 'Outdoors', 'Machu Picchu');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('South America', 'Peru', 'Tuquillo', 'Beach', 'Tuqillo Beach');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Oceania', 'Australia', 'Queensland', 'Outdoors', 'Great Barrier Reef');";
    // $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
    // VALUES ('Oceania', 'Australia', 'Sydney', 'Arts and Culture', 'Sydney Opera House');";
    // if ($conn->multi_query($sql) === TRUE) {
    //     echo "New records created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    //   $sql = "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    // VALUES ('Asia', 'Malaysia', 'Gombak', 'History', 'Batu Caves');";
    // if ($conn->multi_query($sql) === TRUE) {
    //     echo "New records created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
?>