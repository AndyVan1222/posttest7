<?php
require "connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM illustartion WHERE id = $id";

$result = mysqli_query($conn, $sql);


if($result)
{
    echo
    "<script>
    alert('Your Art Has Been Deleted');
    document.location.href = 'myart.php'
    </script>";
}

else
{
    echo
    "<script>
    alert('Failed to delete your art:(');
    document.location.href = 'myart.php'
    </script>";
}
?>