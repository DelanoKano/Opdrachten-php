<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

// $sql = "CREATE TABLE MyGuests (
//     id INT(6) unsigned auto_increment primary key,
//     bandname varchar(30) not null
//     bandemail varchar(30) not null
//     genre varchar(30) not null
// )";

// if($conn->query($sql) == true) {
//     echo "Table created succesfully";
// }
// else {
//     echo "Table creating database" .$conn->error;
// }
if (isset($_POST['naam'])) {
    $band = $_POST['naam'];
    $sql = "INSERT INTO MyGuests (bandname) VALUES('$band')";
    if ($conn->query($sql) == true) {
        echo "Update created succesfully<br><br>";
    } else {
        echo "Update failed to database" . $conn->error;
    }
    $result = $conn->query($sql);
    if ($result) echo "Het is gelukt";
    else echo 'het is niet gelukt';
}
?>