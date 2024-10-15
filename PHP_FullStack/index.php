<?php
include "php/config.php";

$sql = "SELECT Username, Bandname, Date, Genre, Genre2, Genre3, Time, Night FROM users_BAND";
$result = $conn->query($sql)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <a href="inlog.php" id="send-login">Click here to login.</a>
    <a href="register.php" id="send-register">Click here to register.</a>
    <table>
        <tr>
            <th>Username</th>
            <th>Bandname</th>
            <th>Date</th>
            <th>Genre</th>
            <th>Genre2</th>
            <th>Genre3</th>
            <th>Time</th>
            <th>Night</th>
           
            
        </tr>

    
        <?php



        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Bandname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                echo "<td>" . ($row['Genre']) . "</td>";
                echo "<td>" . ($row['Genre2']) . "</td>";
                echo "<td>" . ($row['Genre3']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Time']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Night']) . "</td>";
                echo "</tr>";
            }
        } else {
           
            echo "<tr><td colspan='5'>No event found!</td></tr>";
        }
        ?>
    </table>
</body>

</html>