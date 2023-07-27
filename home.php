<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="homeStyle.css">
</head>
<body>


</body>
</html>


<?php



$data = file('customers.txt');

echo "<table class='table'>
<thead>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th> Password </th>
    <th> Gender </th>
    <th>Country</th>
    <th>Address</th>
    <th>Skills</th>
    <th>Department</th>
    <th> Edit </th>
    <th> Delete </th>
    
  </tr>
</thead>

"
;

foreach ($data as $key => $value) {

    $line = explode(':', $value);

    echo "<tr>

        <td> $line[0] </td>
        <td> $line[1] </td>
        <td> $line[2] </td>
        <td> $line[3] </td>
        <td> $line[4] </td>
        <td> $line[5] </td>
        <td> $line[6] </td>
        <td> $line[7] </td>
        <td> $line[8] </td>
        <td><a href='edit.php?username=$line[2]' > Edit </a></td>
        <td> <a href='delete.php?username=$line[2]'> Delete </a> </td>


    </tr>
    
    ";

}

echo "</table>";