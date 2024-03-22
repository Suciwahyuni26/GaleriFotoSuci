<?php
session_start();
include 'db.php';
$FotoID = $_GET['FotoID'];
$UserID = $_SESSION['UserID'];

$ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID' and UserID='$UserID'");

if (mysqli_num_rows($ceksuka) == 1) {
    while($row = mysqli_fetch_array($ceksuka)){
        $LikeID = $row['LikeID'];
        $query = mysqli_query($conn, "DELETE FROM likefoto WHERE LikeID='$LikeID'");
        echo "<script>
        location.href = 'dashboard.php';
        </script>";
    }
}else{
    $TanggalLike = Date('Y-m-d');
    $query = mysqli_query($conn, "INSERT INTO likefoto VALUES('', '$FotoID', '$UserID', '$TanggalLike')");
    
    echo "<script>
    location.href='dashboard.php';
    </script>";
}

?>