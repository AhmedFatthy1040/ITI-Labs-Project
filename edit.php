<!DOCTYPE html>
<html>
<head>
    <title>Edit User Information</title>
    <link rel="stylesheet" href="editStyle.css">
</head>
<body>
<?php

$filename = "customers.txt";

$username = $_GET['username'];

$user = null;

if (($handle = fopen($filename, "r")) !== false) {
    while (($line = fgets($handle)) !== false) {
        $userDataArray = explode(":", $line);
        if ($userDataArray[2] == $username) { 
            $user = array(
                'firstName' => $userDataArray[0],
                'lastName' => $userDataArray[1],
                'username' => $userDataArray[2],
                'password' => $userDataArray[3],
                'gender' => $userDataArray[4],
                'country' => $userDataArray[5],
                'address' => $userDataArray[6],
                'skills' => explode(',', $userDataArray[7]),
                'department' => $userDataArray[8]
            );
            break;
        }
    }
    fclose($handle);
}


?>
    <h2>Edit User Information</h2>
    <form action="<?php echo "update.php?username=$username"; ?>" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $user['firstName']; ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $user['lastName']; ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $user['password']; ?>" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>" required><br>

        <label for="country">Country:</label>
        <input type="text" name="country" value="<?php echo $user['country']; ?>" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" value="<?php echo $user['department']; ?>" required><br>

        <label>Skills:</label><br>
        <input type="checkbox" name="skills[]" value="PHP" <?php if (in_array('PHP', $user['skills'])) echo 'checked'; ?>> PHP<br>
        <input type="checkbox" name="skills[]" value="MySQL" <?php if (in_array('MySQL', $user['skills'])) echo 'checked'; ?>> MySQL<br>
        <input type="checkbox" name="skills[]" value="J2SE" <?php if (in_array('J2SE', $user['skills'])) echo 'checked'; ?>> J2SE<br>
        <input type="checkbox" name="skills[]" value="PostgreSQL" <?php if (in_array('PostgreSQL', $user['skills'])) echo 'checked'; ?>> PostgreSQL<br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male" <?php if ($user['gender'] === 'Male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($user['gender'] === 'Female') echo 'checked'; ?>> Female
        <br>
        <input type="submit" value="Save">
    </form>
</body>
</html>



