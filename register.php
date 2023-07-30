<?php

if(isset($_GET['errors'])){
    $arrErrors = json_decode($_GET['errors'], true);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <form action="save.php" method="POST" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input
        type="text"
        id="name"
        name="name"
        required
      />
      <span> <?php if(isset($arrErrors['name'])){echo $arrErrors['name'];}  ?> </span>
      <br /><br />

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required /><br /><br />
      <span> <?php if(isset($arrErrors['email'])){echo $arrErrors['email'];}  ?> </span>
      
      <label for="password">Password:</label>
      <input
        type="password"
        id="password"
        name="password"
        required
      />
      <span> <?php if(isset($arrErrors['password'])){echo $arrErrors['password'];}  ?> </span>
      <br /><br />

      <label for="confirm-password">Confirm Password:</label>
      <input
        type="password"
        id="confirm-password"
        name="confirm-password"
        required
      />
      <span> <?php if(isset($arrErrors['confirm-password'])){echo $arrErrors['confirm-password'];}  ?> </span>
      <br /><br />

      <label for="room-number">Room No.:</label>
      <select id="room-number" name="room-number">
        <option value="Application1">Application1</option>
        <option value="Application2">Application2</option>
        <option value="Cloud">Cloud</option>
      </select>
      <span> <?php if(isset($arrErrors['room-number'])){echo $arrErrors['room-number'];}  ?> </span>
      <br /><br />


      <label for="ext.">Ext.:</label>
      <input
        type="text"
        id="ext."
        name="ext."
        required
      />
      <!-- <span> <?php if(isset($arrErrors["ext."])){echo $arrErrors["ext."];}  ?> </span> -->
      <br /><br />

      <label for="profile-picture">Upload Profile Picture:</label>
      <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
      <!-- <span> <?php if(isset($arrErrors['profile-picture'])){echo $arrErrors['profile-picture'];}  ?> </span> -->
        <br /><br />


      <label for="verification-code">Enter the following code:</label>
        <p> 13XP5 </p>
    <input type="text" id="verification-code" name="verification-code" required>
    <span> <?php if(isset($arrErrors['verification-code'])){echo $arrErrors['verification-code'];}  ?> </span>
    </ br>
    </ br>

      <input type="submit" value="Submit" />
    </form>
  </body>
</html>
