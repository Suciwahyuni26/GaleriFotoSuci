<?php 
include 'db.php'; 
session_start();
$UserID = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>GaleriFoto</title>
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
      <style>
        .galerry h2 {
        margin-top:2%;
        }
      </style>
  </head>

  <!-- header -->
  <header>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #8E7AB5;">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.php" style="color: white">Website Galery Foto</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php", style="color: white">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="album.php", style="color: white">Album</a>
              </li>
              <li class="nav-item">
                <a href="upload.php "class="nav-link" style="color: white">Upload Foto</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="login">
              <a href="logout.php" class="btn btn-outline-success" type="submit">Keluar</a>
            </div>
          </div>
        </div>
      </nav>
    </body>
  </header>

  <div class="container mt-3">
    Album :
    <?php
      $Album = mysqli_query($conn, "SELECT * FROM album WHERE UserID = '$UserID'");
      while($row = mysqli_fetch_array($Album)){
    ?>
    <a href="home.php? AlbumID=<?php echo $row['AlbumID']?>" class="btn btn-outline-primary">
      <?php echo $row['NamaAlbum'] ?> 
    </a>
    <?php } ?>
      
    <div class="row">
      <?php 
      if (isset($_GET['AlbumID'])) {
        $AlbumID = $_GET['AlbumID'];
        $query= mysqli_query($conn, "SELECT * FROM foto WHERE UserID='$UserID' AND AlbumID='$AlbumID'");
      while($data = mysqli_fetch_array($query))  {?>
              
      <div class="col-md-3 mt-2 ">
        <div class="card">
          <img style="height:15rem width:auto;" src="uploads/<?php echo $data['LokasiFile']?>" class="card-img-top" title="<?php echo $data['JudulFoto']?>">
          <div class="card-footer text-center">
            <?php
            $FotoID = $data['FotoID'];
            $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID' and UserID='$UserID'");
            if (mysqli_num_rows($ceksuka) == 1) { ?>
              <a href="proses_like.php? FotoID=<?php echo $data['FotoID'] ?>" type="submit" name="batalsuka"> <i class="fa fa-heart m-1"></i></a>
              <?php
              }
            else{
            ?>
            <a href="proses_like.php? FotoID=<?php echo $data['FotoID'] ?>" type="submit" name="suka"> <i class="fa-regular fa-heart m-1"></i></a>

            <?php
            }
            $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
            echo mysqli_num_rows($like). 'Suka';
            ?>
            
          </div>
        </div>
      </div>
      
      <?php } } 
      else {
        $query = mysqli_query($conn, "SELECT * FROM foto WHERE UserID='$UserID'");
      while($data = mysqli_fetch_array($query)){
      ?>

      <div class="col-md-3 mt-2">
        <div class="card">
          <img style="height:15rem;" src="uploads/<?php echo $data['LokasiFile']?>" class="card-img-top" title="<?php echo $data['JudulFoto']?>">
          <div class="card-footer text-center">
            <?php
            $FotoID = $data['FotoID'];
            $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID' and UserID='$UserID'");
            if (mysqli_num_rows($ceksuka) == 1) { ?>
            <a href="proses_like.php? FotoID=<?php echo $data['FotoID'] ?>" type="submit" name="batalsuka"> <i class="fa fa-heart m-1"></i></a>
            <?php
            }
            else{
            ?>
            <a href="proses_like.php? FotoID=<?php echo $data['FotoID'] ?>" type="submit" name="suka"> <i class="fa-regular fa-heart m-1"></i></a>
            <?php
            }
            $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
            echo mysqli_num_rows($like). 'Suka';
            ?>
            
          </div>
        </div>
      </div>
        <?php
          } }
        ?>
      </div>
    </div>
  </div>
        

      <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    
</html>

   
