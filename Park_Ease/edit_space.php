<?php
include_once 'header.php';
include_once 'DbConnector.php';
include_once 'ParkingSpace.php';

$database = new Database();
$db = $database->getConnection();

$parking_space = new ParkingSpace($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parking_space->id = $_POST['id'];
    $parking_space->space_number = $_POST['space_number'];
    $parking_space->is_available = $_POST['is_available'];
    $parking_space->price_per_hour = $_POST['price_per_hour'];

    if ($parking_space->update()) {
        $message = "Parking space updated successfully.";
    } else {
        $message = "Unable to update parking space.";
    }
} else {
    $parking_space->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID.');
    $parking_space->readOne();
}
?>

<main>
    <h2>Edit Parking Space</h2>
    <?php
    if (isset($message)) {
        echo "<p class='message'>{$message}</p>";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editSpaceForm">
        <input type="hidden" name="id" value="<?php echo $parking_space->id; ?>">

        <label for="space_number">Space Number:</label>
        <input type="text" id="space_number" name="space_number" value="<?php echo $parking_space->space_number; ?>" required>

        <label for="is_available">Availability:</label>
        <select id="is_available" name="is_available" required>
            <option value="1" <?php echo $parking_space->is_available ? 'selected' : ''; ?>>Available</option>
            <option value="0" <?php echo !$parking_space->is_available ? 'selected' : ''; ?>>Occupied</option>
        </select>

        <label for="price_per_hour">Price per Hour:</label>
        <input type="number" id="price_per_hour" name="price_per_hour" step="0.01" value="<?php echo $parking_space->price_per_hour; ?>" required>

        <button type="submit">Update Space</button>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editSpaceForm = document.getElementById('editSpaceForm');
    editSpaceForm.addEventListener('submit', function(e) {
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
});
</script>

<?php include_once 'footer.php'; ?>