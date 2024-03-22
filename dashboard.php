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
  </head>
  
  <style>
    .galerry h2 {
      margin-top:2%;
    }
    .bg-hero{
      background: url('images/6.jpeg') no-repeat;
      background-size: cover;
      background-position: center;
    }

  </style>

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
              <a class="nav-link" aria-current="page" href="home.php", style="color: white">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="album.php", style="color: white">Album</a>
            </li>
            <li class="nav-item">
              <a href="upload.php "class="nav-link" style="color: white">Upload Foto</a>
            </li>
          </ul>
          <div class="login">
            <a href="logout.php" class="btn btn-outline-success" type="submit">Keluar</a>
          </div>
        </div>
      </div>
    </nav>

    <body>
      <div class="galerry">
      <h2><center> SELAMAT DATANG DI GALERI FOTO </center></h2>
    </body>

    <body>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">
          Search
        </button>
      </form>
    </body>

    <div class="container my-4 p-5 bg-hero rounded">
      <div class="py-5 text-white">
        <p class="display-5 fw-bold">Galeri Foto</p>
        <p class="fs-4 col-md-8">nothing is better</p>
      </div>
    </div>

    <div class="container mt-2">
      <div class="row">
        <?php 
        $query = mysqli_query($conn, "SELECT * FROM foto INNER JOIN  user ON foto.UserID=user.UserID INNER JOIN album ON foto.AlbumID=album.AlbumID");
        while($data = mysqli_fetch_array($query)){
        ?>
   
        <div class="col-md-3 mt-2">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID'] ?>">     
            <div class="card mb-2">
            <a class="btn" href="uploads/<?php echo $data['LokasiFile']?>" download="my-foto-<?php echo $data['JudulFoto']?>" role="button"><i class="fa-solid fa-circle-down"></i></a>
              <img src="uploads/<?php echo $data['LokasiFile']?>" class="card-img-top" title="<?php echo $data['JudulFoto']?>" style="height:15rem width:2rem;">
              <div class="card-footer text-center">
                <?php
                  $FotoID = $data['FotoID'];
                  $cekdislike = mysqli_query($conn, "SELECT * FROM dislikefoto WHERE FotoID='$FotoID' AND UserID='$UserID'");
                  $cekSuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID' AND UserID='$UserID'");
                  if (mysqli_num_rows($cekSuka) == 1) { ?>
                  <a href="proses_like.php?FotoID=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
      
                <?php } else { ?>
                  <a href="proses_like.php?FotoID=<?php echo $data ['FotoID'] ?>" type="submit" name="like"><i class="fa-regular fa-heart" ></i></a>
      
                <?php }
                  $Suka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                  echo mysqli_num_rows($Suka). 'Like';
                ?>

                <?php 
                if (mysqli_num_rows($cekdislike) == 1) {?>
                <a href="proses_unlike.php?FotoID=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa-solid fa-heart-crack" style="color:black"></i></a>

                <?php } else {?>
                <a href="proses_unlike.php?FotoID=<?php echo $data ['FotoID'] ?>" type="submit" name="suka"><i class="fa-solid fa-heart-crack" style="color:#EE4266"></i></a>

                <?php }
                $unlike = mysqli_query($conn, "SELECT*FROM dislikefoto WHERE FotoID='$FotoID'");
                echo mysqli_num_rows($unlike). 'Dislike';
                ?> <br>

                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID'] ?>"><i class="fa-regular fa-comment"></i></a>
                <?php 
                $jmlkomen = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE FotoID='$FotoID'");
                echo mysqli_num_rows($jmlkomen).' Komentar';
                ?>
              </div>
            </div>
          </a>

          <div class="modal fade" id="komentar<?php echo $data['FotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="uploads/<?php echo $data['LokasiFile']?>" class="card-img-top" title="<?php echo $data['JudulFoto']?>" style="height:10rem width:7rem;">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="stycky-top">
                            <strong><?php echo $data['JudulFoto'] ?></strong><br>
                            <span class="badge bg-secondary"><?php echo $data['NamaLengkap'] ?></span>
                            <span class="badge bg-secondary"><?php echo $data['TanggalUnggah'] ?></span>
                            <span class="badge bg-primary"><?php echo $data['NamaAlbum'] ?></span>
                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['DeskripsiFoto'] ?>
                          </p>
                          <hr>
                          <?php 
                          $FotoID = $data['FotoID'];
                          $Komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.UserID=User.UserID WHERE komentarfoto.FotoID ='$FotoID'");
                          while($row = mysqli_fetch_array($Komentar)){
                          ?>
                          <p align="left">
                            <strong><?php echo $row['NamaLengkap']?></strong>
                            <?php echo $row['IsiKomentar'] ?>
                          </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="proses_komentar.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="FotoID" value="<?php echo $data['FotoID'] ?>">
                                <input type="text" name="IsiKomentar" class="form-control" placeholder="Tambah Komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="KirimKomentar" Class="btn btn-outline-primary">Kirim</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>            
              </div>
            </div>
          </div>
        </div>
          <?php } ?>
      </div>
    </div>
    <footer class="d-flex justify-content-center border-top mt-3" style="background-color:#8E7AB5;">
      <p>&copy; Tugas UKK | Suci Wahyuni</p>
    </footer>
    <script type="text/javascript" src="bootsrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>