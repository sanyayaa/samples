<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Accommodation System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Welcome to our Hotel</h1>
    <h2>Check-In Form</h2>
    <?php
    include 'connect.php';
    include 'guest.php';
    include 'accommodation.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contactNumber = $_POST['contactNumber'];
        $roomId = $_POST['room'];

        $guest = new Guest();
        $guest->setName($name);
        $guest->setAge($age);
        $guest->setGender($gender);
        $guest->setContactNumber($contactNumber);

        if ($roomId == 101) {
            $room = new Accommodation(101, "Room 101", "Deluxe", "Cozy single room ", 50, 1, 1, $conn);
        } elseif ($roomId == 102) {
            $room = new Accommodation(102, "Room 102", "Suburb", "Spacious double room", 80, 1, 1, $conn);
        }
        $checkInResult = $room->checkIn($guest);

        if ($checkInResult != true) {
            echo "<p>Error: $checkInResult</p>";
        }
    }
    ?>
    <form action="index.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        
        <label for="contactNumber">Contact Number:</label><br>
        <input type="text" id="contactNumber" name="contactNumber" required><br><br>

        <label for="room">Select Room:</label><br>
        <select id="room" name="room" required>
            <option value="101">Room 101</option>
            <option value="102">Room 102</option>
        </select><br><br>

       <button type="submit">Check In</button>
    </form>
</body>
</html>

