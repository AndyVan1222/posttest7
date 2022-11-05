<?php
require "connection.php";

date_default_timezone_set("Asia/Makassar");
if(isset($_POST["submit"]))
{
    $img = $_FILES["img"]["name"];
    $temp = $_FILES["img"]["tmp_name"];

    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $software = $_POST["Software"];

    $d = strtotime("now");
    $tgl = date("d-m-Y h:i:sa", $d);

    move_uploaded_file($temp, "image/".$img);

    $sql = "INSERT INTO illustartion(id, files_img, title, artist, software, dates ) VALUES('', '$img', '$title', '$artist', '$software', '$tgl');";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo
        "<script>alert('Input Data Completed');</script>";
    }

    else
    {
        echo
        "<script>alert('Input Data Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DigitalArt</title>
    <script src="https://kit.fontawesome.com/bf9497bfb3.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .formBox
        {
            width: 260px;
            padding: 20px;
            background-color: white;
            font-family: monospace;
            margin-left: 530px;
            font-size: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .text input
        {
            border-top-style: hidden;
            background-color: #E6E6E6;
            border-left-style: hidden;
            border-right-style: hidden;
            border-bottom-style: groove;
            width: 250px;
            height: 25px;
        }

        .btn
        {
            border: none;
            background-color: crimson;
            border-radius: 5px;
            color: white;
            width: 250px;
            cursor: pointer;
            height: 25px;
        }

        .inputFile
        {
            background-color: #E6E6E6;
        }
    </style>
</head>
<body>

<?php
include("header.php");
?>

    <div class="contain" id="container">
        <!-- <div class="item"><a href="bg.jpg"><img src="bg.jpg" alt="image" width="100%"></a></div> -->
        <div id="title">
            <p>Add Art</p>
        </div>


        <div class="formBox">
            <form action="" method="post" enctype="multipart/form-data">
                <p>add Image</p>
                <input type="file" name="img" id="" class="inputFile">
                <div class="text">
                    
                    <p>Title</p>
                    <input type="text" name="title" id="" placeholder="input title...">
                    <p>Artits</p>
                    <input type="text" name="artist" id="" placeholder="input artits...">
                    <p>Software</p>
                    <input type="text" name="Software" id="" placeholder="input software name...">
                </div>
                <br>
                <button class="btn" name="submit" type="input"><i class="fa-solid fa-plus"></i> INPUT</button>
            </form>
        </div>

        

    </div>

    <footer class="foot" id="footer"><p>Create by : Andi Ari Wardana NIM : 2109106146</p></footer>
    <script type="text/javascript" src="js/script2.js"></script>
</body>
</html>