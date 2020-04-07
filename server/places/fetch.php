<?php
include('../connection.php');
$output = array();
 $query = "SELECT * FROM RUTravelPlaces ORDER BY Continent ASC";  
 $result = $conn->query($query);
   if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){
        $output[] = $row;  
   }
}
// $sql = "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('Europe', 'Germany', 'Berlin', 'History', 'Brandenburg Gate');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('Europe', 'Germany', 'Lower Bavaria', 'Skiing' , 'Grober Arber');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('North America', 'USA', 'New York', 'History', 'Statue of Liberty');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('North America', 'USA', 'Manhattan', 'Arts and Culture', 'Museum of Modern Art');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('North America', 'USA', 'Arizona', 'Outdoors', 'Grand Canyon National Park');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('South America', 'Brazil', 'Rio de Janerio', 'History', 'Christ the Redeemer');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('South America', 'Peru', 'Eastern Cordillera', 'Outdoor', 'Machu Picchu');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('South America', 'Peru', 'Tuquillo', 'Beach', 'Tuqillo Beach');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('Oceania', 'Australia', 'Queensland', 'Outdoor', 'Great Barrier Reef');";
// $sql .= "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)
// VALUES ('Oceania', 'Australia', 'Sydney', 'Arts and Culture', 'Sydney Opera House');";
// if ($conn->multi_query($sql) === TRUE) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
echo json_encode($output);

?>