<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="home.php"><img src="Picture/logo_bg.png" id="logoPicture" width="100vw" style="cursor: pointer;"></a>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($conn, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";


            ?>

            <?php
            if (isset($_POST['btn_submit'])) {
                $genre = $_POST['genre'];
                $time = $_POST['time'];
                $night = $_POST['night'];

                // Bereid een SQL-statement voor
                $stmt = $conn->prepare("INSERT INTO users_BAND (Genre, Time, Night) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $genre, $time, $night);

                // Voer het statement uit
                if ($stmt->execute()) {
                    echo "<div class='message'>
                    <p>Reservation successfully!</p>
                    </div> <br>";
                } else {
                    echo "Error occurred: " . $stmt->error;
                }

                // Sluit het statement
                $stmt->close();
            }
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>



        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php if ($res_Uname == "DelanoKano") {
                        echo " <p>Admin</p> &nbsp" , $res_Uname;
                    } else echo $res_Uname ?></b>, Welcome</p>
                </div>

                <form method="post" action="">
                    <div class="box">
                        <label for="genre-select">Select a Genre</label>
                        <div class="select-wrapper">
                            <select id="genre-select" name="genre">
                                <option>Rock</option>
                                <option>Hip-Hop</option>
                                <option>R&B</option>
                            </select>
                        </div>
                    </div>

                    <div class="box">
                        <label for="time-select">Select a Time</label>
                        <div class="select-wrapper">
                            <select id="time-select" name="time">
                                <option>16:00u</option>
                                <option>20:00u</option>
                            </select>
                        </div>
                    </div>

                    <div class="box">
                        <label for="night-select">Select your Night</label>
                        <div class="select-wrapper">
                            <select id="night-select" name="night">
                                <option>Sing for the night €80,00</option>
                                <option>All in One €150,00</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" class="btn_submit" name="btn_submit" value="Submit" required>
                </form>
    </main><br>


</body>

</html>