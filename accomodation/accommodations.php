<?php
class Accommodation
{
    public $id;
    public $name;
    public $location;
    public $description;
    public $price;
    public $capacity;
    public $available;
    private $conn;

    function __construct($id, $name, $location, $description, $price, $capacity, $available, $conn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->description = $description;
        $this->price = $price;
        $this->capacity = $capacity;
        $this->available = $available;
        $this->conn = $conn;
    }

    function checkIn($guest)
{
    echo "Available: " . $this->available . "<br>";

    if ($this->available > 0) {
        $this->available--;
        $stmt = $this->conn->prepare("INSERT INTO accommodations (id,name, location, description, price, capacity, available) VALUES (?,?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssdi", $this->id, $this->name, $this->location, $this->description, $this->price, $this->capacity, $this->available);
        if ($stmt->execute() === TRUE) {
            echo $guest->name . " has checked into " . $this->name . "<br>";
        } else {
            throw new Exception("Error: Unable to check-in. Please try again later.");
        }
        $stmt->close();
    } else {
        echo "Sorry, " . $this->name . " is fully booked.<br>";
        throw new Exception("Sorry, " . $this->name . " is fully booked.");
    }
}

}
?>
