<?php
session_start();
include 'db.php';

if(isset($_POST['tambahfoto'])) {
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];
    $TanggalUnggah = date('Y-m-d');
    $AlbumID = $_POST['AlbumID'];
    $UserID = $_SESSION['UserID'];
    $Foto = $_FILES['LokasiFile']['name'];
    $tmp = $_FILES['LokasiFile']['tmp_name'];
    $lokasifile = 'uploads/';
    $namafoto = rand().'-'.$Foto;

    move_uploaded_file($tmp, $lokasifile.$namafoto);
    
    $sql = mysqli_query($conn, "INSERT INTO foto VALUES('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$namafoto','$AlbumID','$UserID')");
    echo "<script> 
    alert('Data Berhasil Di Simpan');
    location.href='upload.php';
    </script>";

    
}

if(isset($_POST['edit'])) {
    $FotoID = $_POST['FotoID'];
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];
    $TanggalUnggah = date('Y-m-d');
    $AlbumID = $_POST['AlbumID'];
    $UserID = $_SESSION['UserID'];
    $Foto = $_FILES['LokasiFile']['name'];
    $tmp = $_FILES['LokasiFile']['tmp_name'];
    $lokasifile = 'uploads/';
    $namafoto = rand().'-'.$Foto;

    if ($Foto == null) {
        $sql = mysqli_query($conn, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah', AlbumID='$AlbumID' WHERE FotoID='$FotoID'");
    }
    else{
        $query = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$FotoID'");
        $data = mysqli_fetch_array($query);
        if (is_file('uploads/'.$data['LokasiFile'])) {
            unlink('uploads/'.$data['LokasiFile']);
        }
        move_uploaded_file($tmp, $lokasifile.$namafoto);
        $sql = mysqli_query($conn, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah', LokasiFile='$namafoto', AlbumID='$AlbumID' WHERE FotoID='$FotoID'");
    }
    echo "<script> 
    alert('Data Berhasil Di Perbarui');
    location.href='upload.php';
    </script>";
}
 if (isset($_POST['hapus'])){
    $FotoID = $_POST['FotoID'];
    $query = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$FotoID'");
    $data = mysqli_fetch_array($query);
    if (is_file('uploads/'.$data['LokasiFile'])) {
        unlink ('uploads/'.$data['LokasiFile']);
    }
    $sql = mysqli_query($conn, "DELETE FROM foto WHERE FotoID= '$FotoID'");
    echo "<script> 
    alert('Data Berhasil Di Hapus');
    location.href='upload.php';
    </script>";
 }
 