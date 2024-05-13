<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PHP || DelanoKano</title>
</head>

<body>
     <form action="index.php" method="POST">
          <p>Name: <input type="text" name="text"></p>
          <p>E-mail: <input type="text" name="email"></p>
          <input type="submit" value="click me"><br>
     </form>
     Welcome : <?php echo $_POST["text"]; ?><br>
     Your email : <?php echo $_POST["email"]; ?>
</body>

</html>