<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LoginPage</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="inlog.php" method="post">
    <div class="container">
      <label for="uname"><b>Username: </b></label>
      <input type="text" placeholder="Enter Username" name="username" required><br><br>

      <label for="psw"><b>Password: </b></label>
      <input type="password" placeholder="Enter Password" id="psw" name="password" required><br><br>
      <input type="checkbox" onclick="myFunction()">Show Password<br><br>

      <button type="submit">Login</button><br><br>
      <a href="register.php"><input type="button" id="makeaccountbtn" value="New account"></a>
    </div><br>

    <!-- <div class="container">  
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div> -->
  </form>

  <script src="infoScript.js"></script>
</body>

</html>

<?php
include "index.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];



    $stmt = $conn->prepare("SELECT * FROM MyGuests_USER WHERE band_USERNAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
     //*! something in this code is not right!
    if ($result->num_rows > 0) {
      $user = implode($result->fetch_assoc());
      echo $user;
    
      if (isset($user['password']) && !empty($user['password'])) {
        if (password_verify($password, $user['password'])) {
          session_start();
          $_SESSION['username'] = $username;
          echo "Inloggen succesvol!";
        } else {
          echo "Ongeldig wachtwoord.";
        }
      } else {
          echo "Geen wachtwoord gevonden in de database";
      }

      } else {
        echo "Gebruiker niet gevonden.";
      }

      $stmt->close();
    }
  }

$conn->close();

?>

