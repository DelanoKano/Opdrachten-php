<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="register.php" method="post">
        <div class="container">
            <label for="lname"><b>Username: </b></label>
            <input type="text" placeholder="SpiderMan1234" id="newuserName" name="newusername" required><br><br>

            <label for="newpsw"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" id="newuserPassword" name="newpassword" required><br><br>

            <button type="submit">Make account</button><br><br>

        </div><br>
</body>

</html>

<?php
include "index.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['newusername'];
    $password = $_POST['newpassword'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Query om de gebruiker toe te voegen
    $stmt = $conn->prepare("INSERT INTO MyGuests_USER (band_USERNAME, band_PASSWORD) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registratie succesvol!";
    } else {
        echo "Fout bij registratie.";
    }

    $stmt->close();
}

$conn->close();
?>
