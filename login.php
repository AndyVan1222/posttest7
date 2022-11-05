<?php
    session_start();
    require "connection.php";

    if(isset($_SESSION["login"]))
    {
        header("Location: myart.php");
    }
    
    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");
        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]))
            {
                $_SESSION["login"] = true;
                header("Location: myart.php");
                exit;
            }
        }
        $error = true;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/bf9497bfb3.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalArt</title>

    <style>
        body
        {
            background-image: url("image/bck.jpg");
        }


        .judul
        {
            font-size: 40px;
        }

        h3
        {
            font-family: monospace;
            font-size: 50px;
            color: crimson;
            text-align: center;
        }

        a
        {
            color: crimson;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h3>DigitalArt</h3>
    <div class="login-box">
        <?php if(isset($error))
        {
            echo "<p style='color: red;'><i>Error : Username atau password salah!</i></p>";
        } ?>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="username" required>
            <p>password</p>
            <input type="password" name="password" placeholder="password" required> <br> <br>
            <button name="login" class="login-btn">Sign In</button>
           
        </form>
        <a href="register.php">Don't have Account? Create here</a>
    </div>
    
</body>
</html>