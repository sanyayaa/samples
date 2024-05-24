<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta char set="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Accommodation Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    $sql = "SELECT * FROM accommodations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Admin Dashboard - Accommodation Information</h1>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Capacity</th>
                    <th>Available</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["location"]."</td>
                    <td>".$row["description"]."</td>
                    <td>".$row["price"]."</td>
                    <td>".$row["capacity"]."</td>
                    <td>".$row["available"]."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No accommodations found.</h1>";
    }

    $conn->close();
    ?>
</body>
</html>
