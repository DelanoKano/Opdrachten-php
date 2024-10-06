<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullStack</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="">
        Bandname: <input type="text" name="naam"><br><br>
        <label for="Genre" name="genre">
            <select name="Genre">
                <option>Pop</option>
                <option>Rock</option>
                <option>Hip-hop</option>
                <option>Rap</option>
                <option>R&B</option>
            </select>
        </label><br><br>
        Price:
        <label for="Price" name="price">
            <select name="Price">
                <option>All in One €150,00</option>
                <option>Sing for the night €80,00</option>

            </select>
        </label><br><br>
        Date: <input type="date" name="Date"><br><br>
        Time: <input type="time" name="Time"><br><br>

        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>


<?php
require('index.php');
// $sql1 = "CREATE DATABASE MyDB";
// if($conn->query($sql1) == true) {
//     echo "Database created succesfully";
// }
// else {
//     echo "Error creating database" .$conn->error;
// }

$sql = "CREATE TABLE users (
    id INT unsigned auto_increment primary key,
    Username varchar(200),
    Email varchar(200),
    Age int,
    Password varchar(200)
    
)";

if($conn->query($sql) == true) {
    echo "Table created succesfully";
}
else {
    echo "Table creating database" .$conn->error;
}
// if (isset($_POST['naam']) && isset($_POST['Genre'])) {
//     $band = $_POST['naam'];
//     $bandGenre = $_POST['Genre'];
//     $price = $_POST['Price'];
//     $Date = $_POST['Date'];
//     $Time = $_POST['Time'];
//     $sql = "INSERT INTO MyGuests (bandname, bandGenre, price, date, time ) VALUES('$band', '$bandGenre', '$price', '$Date', '$Time')";
//     if ($conn->query($sql) == true) {
//         echo "";
//     } else {
//         echo "" . $conn->error;
//     }
// }
?>