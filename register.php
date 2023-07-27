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
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <form action="save.php" method="POST">
      <label for="first-name">First Name:</label>
      <input
        type="text"
        id="first-name"
        name="first-name"
        required
      />
      <span> <?php if(isset($arrErrors['first-name'])){echo $arrErrors['first-name'];}  ?> </span>
      <br /><br />

      <label for="last-name">Last Name:</label>
      <input type="text" id="last-name" name="last-name" required /><br /><br />
      <span> <?php if(isset($arrErrors['last-name'])){echo $arrErrors['last-name'];}  ?> </span>
      <label for="address">Address:</label>
      <textarea
        id="address"
        name="address"
        rows="4"
        cols="50"
        required
      ></textarea
      >
      <span> <?php if(isset($arrErrors['address'])){echo $arrErrors['address'];}  ?> </span>
      <br /><br />

      <label for="country">Country:</label>
      <select id="country" name="country">
        <option value="USA">USA</option>
        <option value="Canada">Canada</option>
        <option value="UK">UK</option>
        <option value="Australia">Australia</option>
        </select
      >
      <span> <?php if(isset($arrErrors['country'])){echo $arrErrors['country'];}  ?> </span>
      <br /><br />

      <label>Gender:</label>
      <input type="radio" id="male" name="gender" value="Male" required />
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="Female" required />
      <label for="female">Female</label>
      <span> <?php if(isset($arrErrors['gender'])){echo $arrErrors['gender'];}  ?> </span>
      <br /><br />

      <label>Skills:</label><br />
      <input type="checkbox" id="php" name="skills[]" value="PHP" />
      <label for="php">PHP</label><br />
      <input type="checkbox" id="mysql" name="skills[]" value="MySQL" />
      <label for="mysql">MySQL</label><br />
      <input type="checkbox" id="j2se" name="skills[]" value="J2SE" />
      <label for="j2se">J2SE</label><br />
      <input
        type="checkbox"
        id="postgresql"
        name="skills[]"
        value="PostgreSQL"
      />
      <label for="postgresql">PostgreSQL</label><br /><br />

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required /><br /><br />
      <span> <?php if(isset($arrErrors['username'])){echo $arrErrors['username'];}  ?> </span>

      <label for="password">Password:</label>
      <input
        type="password"
        id="password"
        name="password"
        required
      />
      <span> <?php if(isset($arrErrors['password'])){echo $arrErrors['password'];}  ?> </span>
      <br /><br />

      <label for="department">Department:</label>
      <input
        type="text"
        id="department"
        name="department"
        placeholder="OpenSource"
      />
      <span> <?php if(isset($arrErrors['department'])){echo $arrErrors['department'];}  ?> </span>
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
