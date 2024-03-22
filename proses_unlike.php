<?php  
session_start();
include 'db.php';
$FotoID = $_GET['FotoID'];
$UserID = $_SESSION['UserID'];

$cekdislike = mysqli_query($conn,"SELECT * FROM dislikefoto WHERE FotoID='$FotoID' AND UserID='$UserID'");

if (mysqli_num_rows($cekdislike) == 1){
    while($row = mysqli_fetch_array($cekdislike)){
        $DislikeID = $row['DislikeID'];
        $query = mysqli_query($conn, "DELETE FROM dislikefoto WHERE DislikeID='$DislikeID'");

        echo "<script>
        location.href ='dashboard.php';
        </script>";
    }
} else{
    $TanggalDislike = date('Y-m-d');
    $query = mysqli_query($conn, "INSERT INTO dislikefoto VALUES('','$FotoID','$UserID','$TanggalDislike')");

    echo"<script>
    location.href = 'dashboard.php';
    </script>";
}

?>