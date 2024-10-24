<?php
include_once 'header.php';
include_once 'DbConnector.php';
include_once 'ParkingSpace.php';

$database = new Database();
$db = $database->getConnection();

$parking_space = new ParkingSpace($db);
$stmt = $parking_space->read();
?>

<main>
    <h2>Available Parking Spaces</h2>
    <table>
        <tr>
            <th>Space Number</th>
            <th>Availability</th>
            <th>Price per Hour</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
            echo "<td>{$space_number}</td>";
            echo "<td>" . ($is_available ? 'Available' : 'Occupied') . "</td>";
            echo "<td>$" . number_format($price_per_hour, 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>

<?php include_once 'footer.php'; ?>