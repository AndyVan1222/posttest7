
<?php

require "connection.php";

$id = $_GET["id"];
$read_sql = "SELECT * FROM illustartion WHERE id = $id";
$result = mysqli_query($conn, $read_sql);

$illustration = [];

while($row = mysqli_fetch_assoc($result))
{
    $illustration[] = $row;
}

$illustration = $illustration[0];

if(isset($_POST["edit"]))
{
    $image = htmlspecialchars($_FILES["img"]["name"]);
    $tmp = htmlspecialchars($_FILES["img"]["tmp_name"]);
    $title = htmlspecialchars($_POST["title"]);
    $artist = htmlspecialchars($_POST["artist"]);
    $software = htmlspecialchars($_POST["Software"]);
    $d = strtotime("now");
    $tgl = date("d-m-Y h:i:sa");

    move_uploaded_file($tmp, "image/".$image);

    $sql = "UPDATE illustartion SET files_img = '$image', title = '$title', artist = '$artist', software = '$software', dates = '$tgl' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "
        <script>
        alert('your Art has Been Updated');
        document.location.href = 'myart.php'
        </script>";
    }

    else
    {
        echo "
        <script>
        alert('Failed edited your art');
        document.location.href = 'edit.php?id=$id'
        </script>";
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
            background-color: #72CC50;
            border-radius: 5px;
            color: white;
            width: 250px;
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
                <p>edit Your Post</p>
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
                <button class="btn" name="edit" type="input"><i class="fa-solid fa-pencil"></i> SAVE</button>
            </form>
        </div>

        

    </div>

    <footer class="foot" id="footer"><p>Create by : Andi Ari Wardana NIM : 2109106146</p></footer>
    <script type="text/javascript" src="js/script2.js"></script>
</body>
</html>