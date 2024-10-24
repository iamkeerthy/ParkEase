<?php
include_once 'header.php';
include_once 'DbConnector.php';
include_once 'ParkingSpace.php';

$database = new Database();
$db = $database->getConnection();

$parking_space = new ParkingSpace($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_space'])) {
        $parking_space->space_number = $_POST['space_number'];
        $parking_space->is_available = $_POST['is_available'];
        $parking_space->price_per_hour = $_POST['price_per_hour'];

        if ($parking_space->create()) {
            $message = "Parking space added successfully.";
        } else {
            $message = "Unable to add parking space.";
        }
    }
}

$stmt = $parking_space->read();
?>

<main>
    <h2>Manage Parking Spaces</h2>
    <?php
    if (isset($message)) {
        echo "<p class='message'>{$message}</p>";
    }
    ?>
    <form action="manage_spaces.php" method="post" id="addSpaceForm">
        <h3>Add New Parking Space</h3>
        <label for="space_number">Space Number:</label>
        <input type="text" id="space_number" name="space_number" required>

        <label for="is_available">Availability:</label>
        <select id="is_available" name="is_available" required>
            <option value="1">Available</option>
            <option value="0">Occupied</option>
        </select>

        <label for="price_per_hour">Price per Hour:</label>
        <input type="number" id="price_per_hour" name="price_per_hour" step="0.01" required>

        <button type="submit" name="add_space">Add Space</button>
    </form>

    <h3>Existing Parking Spaces</h3>
    <table>
        <tr>
            <th>Space Number</th>
            <th>Availability</th>
            <th>Price per Hour</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
            echo "<td>{$space_number}</td>";
            echo "<td>" . ($is_available ? 'Available' : 'Occupied') . "</td>";
            echo "<td>$" . number_format($price_per_hour, 2) . "</td>";
            echo "<td>";
            echo "<a href='edit_space.php?id={$id}'>Edit</a> | ";
            echo "<a href='delete_space.php?id={$id}' class='delete-space'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addSpaceForm = document.getElementById('addSpaceForm');
    addSpaceForm.addEventListener('submit', function(e) {
        const spaceNumber = document.getElementById('space_number').value;
        const pricePerHour = document.getElementById('price_per_hour').value;

        if (spaceNumber.trim() === '') {
            alert('Please enter a space number.');
            e.preventDefault();
        } else if (isNaN(pricePerHour) || pricePerHour <= 0) {
            alert('Please enter a valid price per hour.');
            e.preventDefault();
        }
    });

    const deleteLinks = document.querySelectorAll('.delete-space');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this parking space?')) {
                e.preventDefault();
            }
        });
    });
});
</script>

<?php include_once 'footer.php'; ?>