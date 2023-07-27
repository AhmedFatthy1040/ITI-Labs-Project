<?php


$errors = array();

if(!isset($_POST['first-name']) or empty($_POST['first-name'])){
    $errors['first-name'] = 'first name is required';
}if(!isset($_POST['last-name']) or empty($_POST['last-name'])){
    $errors['last-name'] = 'last name is required';
}if(!isset($_POST['gender']) or empty($_POST['gender'])){
    $errors['gender'] = 'gender is required';
}if(!isset($_POST['address']) or empty($_POST['address'])){
    $errors['address'] = 'address is required';
}if(!isset($_POST['country']) or empty($_POST['country'])){
    $errors['country'] = 'country is required';
}if(!isset($_POST['username']) or empty($_POST['username'])){
    $errors['username'] = 'username is required';
}if(!isset($_POST['password']) or empty($_POST['password'])){
    $errors['password'] = 'password is required';
}if(!isset($_POST['department']) or empty($_POST['department'])){
    $errors['department'] = 'department is required';
}




if(empty($errors)){

    $firstName = trim($_POST["first-name"]);
    $lastName = trim($_POST["last-name"]);
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $address = trim($_POST["address"]);
    $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "No skills selected";
    $department = trim($_POST["department"]);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $userVerificationCode = $_POST["verification-code"];

    if ($userVerificationCode != "13XP5") {
        header("Location: index.php?error=verification");
        exit();
    }

    $file = fopen('customers.txt', 'a');

    fwrite($file, "$firstName:$lastName:$username:$password:$gender:$country:$address:$skills:$department\n");
    
    fclose($file);
    
    header('location:home.php');

}else{
    $errorsStr = json_encode($errors);
    header("location:register.php?errors=$errorsStr");
}