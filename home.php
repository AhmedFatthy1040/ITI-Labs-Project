<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="css/homeStyle.css">
</head>
<body>


</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PHP_Labs_Project";


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data using prepared statement
$sql = 'SELECT name, email, password, room_number, ext, profile_picture FROM registration_data';
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Room No.</th>
                        <th>Ext.</th>
                        <th>Profile Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>";

        while ($row = $result->fetch_assoc()) {
            echo $row['profile_picture'];
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['room_number']}</td>
                    <td>{$row['ext']}</td>
                    <td><img src='{$row['profile_picture']}' alt='Profile Picture' width='100'></td>
                    <td><a href='edit.php?username={$row['email']}'>Edit</a></td>
                    <td><a href='delete.php?username={$row['email']}'>Delete</a></td>
                  </tr>";
        }
        
        echo "</table>";
    } else {
        echo "No data found.";
    }

    $stmt->close();
} else {
    echo "Error in prepared statement: " . $conn->error;
}

$conn->close();
?>

</body>
</html>