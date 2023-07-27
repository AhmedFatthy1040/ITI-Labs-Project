<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user['firstName'] = $_POST['firstName'];
        $user['lastName'] = $_POST['lastName'];
        $user['username'] = $_GET['username'];
        $user['password'] = $_POST['password'];
        $user['address'] = $_POST['address'];
        $user['country'] = $_POST['country'];
        $user['department'] = $_POST['department'];
        $user['skills'] = isset($_POST['skills']) ? $_POST['skills'] : array();
        $user['gender'] = $_POST['gender'];
    
    }
    
    
    $updatedLine = "{$user['firstName']}:{$user['lastName']}:{$user['username']}:{$user['password']}:{$user['gender']}:{$user['address']}:{$user['country']}:" . implode(',', $user['skills']) . ":{$user['department']}\n";
    
    $username = $user['username'];
    
    echo '<br>';
    $data = file('customers.txt');
    
    
    foreach ($data as $key => $value) {
        $line = explode(':', $value);
    
        if($username == $line[2]){
            $data[$key] = $updatedLine;
            break;
        }
    
    }
    
    
    $file = fopen('customers.txt', 'w');
    
    foreach ($data as $key => $value) {
    
        fwrite($file, $value);
    
    }
    
    fclose($file);

    header('location:home.php');
    
?>