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
        RatingTotal FLOAT DEFAULT 0,
        Attraction VARCHAR(250) NOT NULL,
        FOREIGN KEY (Attraction)
        REFERENCES RUTravelPlaces(Attraction)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";
    //    SELECT * FROM RUTravelPlaces INNER JOIN RUTravelAttractions USING (Attraction) WHERE Country ='India';
    if ($conn->query($sql) === FALSE){
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE IF NOT EXISTS RUTravelReviews(
        Id INT PRIMARY KEY AUTO_INCREMENT,
        ReviewerName VARCHAR(250) NOT NULL,
        ReviewerEmail VARCHAR(250) NOT NULL,
        ReviewDescription VARCHAR(250) NOT NULL,
        ReviewTitle VARCHAR(250) NOT NULL,
        ReviewDate VARCHAR(250) NOT NULL,
        ReviewRating INT NOT NULL,
        Attraction VARCHAR(250) NOT NULL,
        FOREIGN KEY (Attraction)
        REFERENCES RUTravelAttractions(Attraction)
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
    // VALUES ('BatuCaves.jpg', 'Gombak, 68100 Batu Caves, Selangor, Malaysia', 'Batu Caves is a limestone hill that has a series of caves and cave temples in Gombak, Selangor, Malaysia.', 13.99, '{latitude: 3.2378844, longitude:101.6840385}', 'Batu Caves');";
    //   $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //   VALUES ('MountKinabalu.jpg', 'West Coast Division, Sabah, Malaysia', '13,435-foot mountain on a public nature preserve, offering rich flora & fauna, including orangutans.', 50.00, '{latitude: 6.0753127, longitude:116.5413141}', 'Mount Kinabalu');";
    //    $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //    VALUES ('BukitBintang.jpg', 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Bukit Bintang is known for Jalan Bukit Bintang, a busy thoroughfare with upscale malls and luxe fashion boutiques.', 350.00, '{latitude: 3.1443954, longitude:101.6986173}', 'Bukit Bintang');";
    //     $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //     VALUES ('TajMahal.jpg', 'Dharmapuri, Forest Colony, Tajganj, Agra, Uttar Pradesh 282001, India', '17th-century, Mughal-style, marble mausoleum with minarets, a mosque & famously symmetrical gardens.', 80.00, '{latitude: 27.1751448, longitude:78.0421422}', 'Taj Mahal');";
    //     $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //     VALUES ('RanthamboreNationalPark.jpg', 'Rajasthan, India', 'Major destination for seeing tigers in their natural habitat plus other wildlife, with scenic ruins.', 63.00, '{latitude: 26.0173274, longitude:76.5025742}', 'Ranthambore National Park');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('DubaiMall.jpg', 'Financial Center Street, Along Sheikh Zayed Road, Next to Burj Khalifa - United Arab Emirates', 'Huge shopping and leisure centre, with department stores, plus an ice rink, aquarium and a cinema.', 110.00, '{latitude: 25.198765, longitude:55.2796053}', 'Dubai Mall');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('BrandenburgGate.jpg', 'Pariser Platz, 10117 Berlin, Germany', 'Restored 18th-century gate & landmark with 12 Doric columns topped by a classical goddess statue.', 68.00, '{latitude: 52.5162746, longitude: 13.3777041}', 'Brandenburg Gate');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //       VALUES ('GroberArber.jpg', '94252 Bayerisch Eisenstein, Germany', 'Mountain offering picturesque views, a forest park, hiking trails & winding roads for motorbiking.', 53.00, '{latitude: 49.112776, longitude: 13.118046}', 'Grober Arber');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //       VALUES ('RoyalOntarioMuseum.jpg', '100 Queens Park, Toronto, ON M5S 2C6', 'Sprawling natural history & world cultures galleries, plus dinosaurs in the Libeskind crystal wing.', 18.50, '{latitude: 43.6677097, longitude: -79.3947771}', 'Royal Ontario Museum');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('StatueofLiberty.jpg', 'New York, NY 10004, United States', 'Iconic National Monument opened in 1886, offering guided tours, a museum & city views.', 13.00, '{latitude: 40.6892494, longitude: -74.0445004}', 'Statue of Liberty');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('MuseumofModernArt.jpg', '11 W 53rd St, New York, NY 10019, United States', 'Works from van Gogh to Warhol & beyond plus a sculpture garden, 2 cafes & The Modern restaurant.', 65.00, '{latitude: 40.7614327, longitude: -73.9776216}', 'Museum of Modern Art');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('GrandCanyonNationalPark.jpg', 'Grand Canyon Village, Arizona, United States', 'Beyond its scenic overlooks, this mile-deep geologic wonder features hikes, mule rides & rafting.', 30.00, '{latitude: 36.1069652, longitude: -112.1129972}', 'Grand Canyon National Park');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('ChristtheRedeemer.jpg', 'Parque Nacional da Tijuca - Alto da Boa Vista, Rio de Janeiro - RJ, Brazil', 'Giant (98-ft.-tall) mountaintop statue of Jesus Christ, accessed by train & offering city views.', 24.00, '{latitude: -22.951916, longitude: -43.2104872}', 'Christ the Redeemer');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('MachuPicchu.jpg', '08680, Peru', 'Iconic hilltop ruins of a large 15th-century Inca city featuring numerous structures & terraces.', 28.00, '{latitude: -13.1631412, longitude: -72.5449629}', 'Machu Picchu');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //       VALUES ('TuqilloBeach.jpg', '02650, Peru', 'Celebrated, peaceful beach featuring swimming, snorkeling, sunbathing, campsites & restaurants.', 11.00, '{latitude: -10.0202771, longitude: -78.206954}', 'Tuqillo Beach');";
    //       $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('GreatBarrierReef.jpg', 'Queensland, Australia', 'The Great Barrier Reef is the largest coral reef system composed of over 2,900 individual reefs and 900 islands.', 115.00, '{latitude: -16.6084019, longitude: 143.5981648}', 'Great Barrier Reef');";
    //      $sql .= "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Coordinates, Attraction)
    //      VALUES ('SydneyOperaHouse.jpg', 'Bennelong Point, Sydney NSW 2000, Australia', 'Landmark, skyline-dominating arts centre for opera, theatre, music and dance, plus guided tours.', 30.00, '{latitude: -33.8567844, longitude: 151.2152967}', 'Sydney Opera House');";
    // if ($conn->multi_query($sql) === TRUE) {
    //     echo "New records created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
?>
