<?php

// var_dump($_GET);
$selected_state = $_GET['state'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_demo";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT city_name FROM cities WHERE state_name = '$selected_state'";
    // echo $sql;
    $result = $conn->query($sql);
    
    
    
    //  TO-DO: MAKE THE CITIES DISPLAY AS A DROP-DOWN MENU BEFORE SUBMISSION
    
echo "<select>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<option value ='city_name'>" . $row["city_name"] . "</option>";
            echo "<br>";
        }
    }
    echo "</select>";
    echo "</ul>";
    $conn->close();
} catch (Exception $ex) {
    error_log("Connection failed");
    echo("Contact IT Department");
    exit;
}


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//    echo("Contact IT Department");
//    exit;
//}
// echo "Connected successfully";
// if ($selected_state == "Alabama") {
//    echo "Montgomery";
// } else {
//    echo "Denver";
//}
?>