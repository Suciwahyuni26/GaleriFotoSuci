<?php
session_start();
include 'db.php';

if(isset($_POST['tambahdata'])) {
    $NamaAlbum = $_POST['NamaAlbum'];
    $Deskripsi = $_POST['Deskripsi'];
    $TanggalDibuat = date('Y-m-d');
    $UserID = $_SESSION['UserID'];
    
    $sql = mysqli_query($conn, "INSERT INTO album VALUES('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')");
    echo "<script> 
    alert('Data Berhasil Di Simpan');
    location.href='album.php';
    </script>";

    
}

if(isset($_POST['edit'])) {
    $AlbumID = $_POST['AlbumID'];
    $NamaAlbum = $_POST['NamaAlbum'];
    $Deskripsi = $_POST['Deskripsi'];
    $TanggalDibuat = date('Y-m-d');
    $UserID = $_SESSION['UserID'];

    $sql = mysqli_query($conn, "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi', TanggalDibuat='$TanggalDibuat' WHERE AlbumID='$AlbumID'");
    echo "<script> 
    alert('Data Berhasil Di Perbaharui!!!');
    location.href='album.php';
    </script>";

}

if(isset($_POST['hapus'])){
    $AlbumID = $_POST['AlbumID'];

    $sql = mysqli_query($conn, "DELETE FROM album WHERE AlbumID = '$AlbumID'");

    echo "<script>
    alert('Data Berhasil Di Hapus');
    location.href='album.php';
    </script>";
}
?>