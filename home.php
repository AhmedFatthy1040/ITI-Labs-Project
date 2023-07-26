<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first-name"]);
    $lastName = trim($_POST["last-name"]);
    $gender = $_POST["gender"];
    $address = trim($_POST["address"]);
    $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "No skills selected";
    $department = trim($_POST["department"]);
    $userVerificationCode = $_POST["verification-code"];

    if ($userVerificationCode != "13XP5") {
        header("Location: index.php?error=verification", urlencode($firstName));
        exit();
    }


    if (empty($firstName) || empty($lastName) || empty($gender) || empty($address) || empty($department)) {
        header("Location: index.php");
        exit();
    } else {
        $title = ($gender === "Male") ? "Mr." : "Miss";
        $fullName = $firstName . " " . $lastName;

        echo "Thanks (" . $title . " " . $fullName . ") Please Review Your Information:" . '<br>';
        echo "Name: " . $fullName . '<br>';
        echo "Address: " . $address . '<br>';
        echo "Your Skills: " . $skills . '<br>';
        echo "Department: " . $department;
        }
}
?>