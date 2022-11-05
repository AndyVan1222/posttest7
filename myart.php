<?php
session_start();
require "connection.php";
if(!isset($_SESSION["login"]))
{
    header("Location: login.php");
    exit;
}

if(isset($_GET["search"]))
{
    $searchkey = $_GET["searchkey"];
    $result = mysqli_query($conn, "SELECT * FROM illustartion WHERE title LIKE '%$searchkey%'");
}
else
{
    $result = mysqli_query($conn, "SELECT * FROM illustartion");
}

$illustration = [];

while($row = mysqli_fetch_assoc($result))
{
    $illustration[] = $row;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>DigitalArt</title>
    <script src="https://kit.fontawesome.com/bf9497bfb3.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .myArt
        {
            font-family: monospace;
            font-size: 20px;
            /* margin-left: 470px; */
            background-color: white;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);
            
            margin-bottom: 20px;
            
        }

        .myArtDarkMode
        {
            font-family: monospace;
            font-size: 20px;
            /* margin-left: 470px; */
            background-color: black;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            
            margin-bottom: 20px;
            
        }

        .myArt img
        {
            width: 400px;
            height: 500px;
        }

       .editBtn, .deleteBtn
       {
            border: none;
            border-radius: 5px;
            height: 40px; 
            width: 100px;
            align-item: center;
            cursor: pointer;
       }

       .editBtn
       {
            background-color: #72CC50;
            color: white;
       }

       .deleteBtn
       {
            background-color: crimson;
            color: white;
       }
       .cover
       {
            justify-content: space-around;
            display: flex;
            flex-wrap: wrap;
       }

    </style>
</head>
<body>

    <div class="header" id="head">

            <div class="judul">
                <div id="nama1">digital</div>
                <div id="nama2">Art</div>
            </div>

                <ul class="navigator">
                    
                    <li><a href="index.php"><i class="fas fa-home"></i>HOME</a></li>
                    <li><a href="myart.php"><i class="fas fa-pencil"></i>My Art</a></li>
                    <li><a href="add.php"><i class="fa-solid fa-plus"></i>Add ART</a></li>
                    <li><a href="aboutme.php" class="colorfont"><i class="fas fa-user"></i>ABOUT ME</a></li>
                    <li><a href="logout.php" style="color: crimson;"><i class="fa-solid fa-right-from-bracket"></i>SIGN OUT</a></li>
                    <label class="switch">
                        <input type="checkbox" id="cb" value="true" onchange="check()">
                        <span class="slider round"></span>
                    </label>
                </ul>
    </div>
    

    <div class="contain" id="container">
        <!-- <div class="item"><a href="bg.jpg"><img src="bg.jpg" alt="image" width="100%"></a></div> -->
        <div id="title">
            <p>My Art</p>
        </div>

        <div class="search-bar">
            <form action="" method="get">
                <input type="text" name="searchkey" id="search" placeholder="Search art..">
                <button name="search" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </form>
        </div>

        <div class="cover">
        <?php $i = 1; foreach($illustration as $art): ?>
        <div class="myArt" id="change">
            <img src="image/<?php echo $art["files_img"]; ?>" alt="simple">
            <p><b><?php echo $art["title"]; ?></b></p>
            <p>Artist : <?php echo $art["artist"]; ?></p>
            <p>Software : <?php echo $art["software"]; ?></p>
            <p style="font-size: 14px;"><i class="fa-regular fa-clock"></i><?php echo "Date modify :".$art["dates"]; ?></p>
            <hr>
            <a href="edit.php?id=<?php echo $art["id"]; ?>"><button class="editBtn"><i class="fa-solid fa-pencil"></i>EDIT</button></a>
            <a href="delete.php?id=<?php echo $art["id"];?>"><button class="deleteBtn"><i class="fa-solid fa-trash"></i>DELETE</button></a>
        </div>
        <?php $i++; endforeach; ?>
        </div>

    </div>

    <footer class="foot" id="footer"><p>Create by : Andi Ari Wardana NIM : 2109106146</p></footer>
    <script>
        function check()
        {
            let cb = document.getElementById('cb').checked;
            if(cb == true)
            {
                document.getElementById('head').classList.remove('header');
                document.getElementById('head').classList.add('headerDark')
                document.getElementById('container').classList.remove('contain');
                document.getElementById('container').classList.add('containDarkmode');
                document.getElementById('footer').classList.remove('foot');
                document.getElementById('footer').classList.add('footDark');
                document.getElementById('change').classList.remove('myArt');
                document.getElementById('change').classList.add('myArtDarkMode');
            }

            else
            {
                document.getElementById('head').classList.remove('headerDark');
                document.getElementById('head').classList.add('header');
                document.getElementById('container').classList.remove('containDarkmode');
                document.getElementById('container').classList.add('contain');
                document.getElementById('footer').classList.remove('footDark');
                document.getElementById('footer').classList.add('foot');
                document.getElementById('change').classList.remove('myArtDarkMode');
                document.getElementById('change').classList.add('myArt');
            }
        }
    </script>
</body>
</html>