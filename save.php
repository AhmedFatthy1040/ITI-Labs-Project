<?php


$errors = array();


$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if(!isset($_POST['name']) or empty($_POST['name'])){
    $errors['name'] = 'name is required';
}if(!isset($_POST['email']) or empty($_POST['email'])){
    $errors['email'] = 'email is required';
}if(!isset($_POST['room-number']) or empty($_POST['room-number'])){
    $errors['room-number'] = 'room number is required';
}if(!isset($_POST['password']) or empty($_POST['password'])){
    $errors['password'] = 'password is required';
}if ($_POST['password'] !== $_POST['confirm-password']) {
    $errors['confirm-password'] = 'Password and Confirm Password do not match!';
}if (preg_match(!$pattern, $_POST['email'])) {
    $errors['email'] = 'email is not valid';
}

$imgName = $_FILES['profile-picture']['name'];
$tmpName = $_FILES['profile-picture']['tmp_name'];
$extension = pathinfo($_FILES['profile-picture']['name'])['extension'];



if(!in_array($extension, ['png', 'jpg'])) {
    $errors['imageExt'] = 'Not Valid';
}


if(empty($errors)){

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST['password']);
    $confirmPassword = $_POST["confirm-password"];
    $roomNumber = trim($_POST["room-number"]);
    $ext = trim($_POST["ext."]);
    $userVerificationCode = $_POST["verification-code"];

    $imgNewName = 'images/'.time().'.'.$extension;
    move_uploaded_file($tmpName, $imgNewName);

    if ($userVerificationCode != "13XP5") {
        header("Location: index.php?error=verification");
        exit();
    }

    // Establish database connection
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root";
    $password = "";
    $dbname = "PHP_Labs_Project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO registration_data (name, email, password, room_number, ext, profile_picture, verification_code) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssss", $name, $email, $password, $roomNumber, $ext, $imgNewName, $userVerificationCode);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $conn->close();
    
    header('location:home.php');

}else{
    $errorsStr = json_encode($errors);
    header("location:register.php?errors=$errorsStr");
}