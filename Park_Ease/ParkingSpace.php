<?php
class ParkingSpace {
    private $conn;
    private $table_name = "parking_spaces";

    public $id;
    public $space_number;
    public $is_available;
    public $price_per_hour;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY space_number";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET space_number=:space_number, is_available=:is_available, price_per_hour=:price_per_hour";
        $stmt = $this->conn->prepare($query);

        $this->space_number = htmlspecialchars(strip_tags($this->space_number));
        $this->is_available = htmlspecialchars(strip_tags($this->is_available));
        $this->price_per_hour = htmlspecialchars(strip_tags($this->price_per_hour));

        $stmt->bindParam(":space_number", $this->space_number);
        $stmt->bindParam(":is_available", $this->is_available);
        $stmt->bindParam(":price_per_hour", $this->price_per_hour);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET space_number=:space_number, is_available=:is_available, price_per_hour=:price_per_hour WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->space_number = htmlspecialchars(strip_tags($this->space_number));
        $this->is_available = htmlspecialchars(strip_tags($this->is_available));
        $this->price_per_hour = htmlspecialchars(strip_tags($this->price_per_hour));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":space_number", $this->space_number);
        $stmt->bindParam(":is_available", $this->is_available);
        $stmt->bindParam(":price_per_hour", $this->price_per_hour);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->space_number = $row['space_number'];
        $this->is_available = $row['is_available'];
        $this->price_per_hour = $row['price_per_hour'];
    }
}
?>