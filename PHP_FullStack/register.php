<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">


            <?php

            include "php/config.php";
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                if ($age < 16) {
                    echo "<div class='message_error'>
                      <p>Your age needs to be 16 or higher :(</p>
                  </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {



                    $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");

                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message_error'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {

                        mysqli_query($conn, "INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");

                        echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                        echo "<a href='inlog.php'><button class='btn'>Login Now</button>";
                    }
                }
            } else {

            ?>

                
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" pattern=".{6,}" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="inlog.php">Sign In</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>