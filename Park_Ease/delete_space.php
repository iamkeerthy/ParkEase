<?php
include_once 'DbConnector.php';
include_once 'ParkingSpace.php';

$database = new Database();
$db = $database->getConnection();

$parking_space = new ParkingSpace($db);

if (isset($_GET['id'])) {
    $parking_space->id = $_GET['id'];
    
    if ($parking_space->delete()) {
        header("Location: manage_spaces.php?message=Parking space deleted successfully.");
    } else {
        header("Location: manage_spaces.php?message=Unable to delete parking space.");
    }
} else {
    header("Location: manage_spaces.php?message=ERROR: Missing ID.");
}
?>