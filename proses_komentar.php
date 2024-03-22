<?php
session_start();
include 'db.php';

$FotoID = $_POST['FotoID'];
$UserID = $_SESSION['UserID'];
$IsiKomentar = $_POST['IsiKomentar'];
$TanggalKomentar = date('Y-m-d');

$query = mysqli_query($conn, "INSERT INTO komentarfoto VALUES('','$FotoID', '$UserID', '$IsiKomentar', '$TanggalKomentar')");

echo "<script>
location.href='dashboard.php';
</script>";
?>