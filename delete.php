<?php

$username = $_GET['username'];

$data = file('customers.txt');

foreach ($data as $key => $value) {

    $line = explode(':', $value);

    if($username == $line[2]){
        unset($data[$key]);
        break;
    }

}


$file = fopen('customers.txt', 'w');

foreach ($data as $key => $value) {

    fwrite($file, $value);

}

fclose($file);

header('location:home.php');

