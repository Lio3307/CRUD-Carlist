<?php

include_once("connection.php");

$data = mysqli_query($conect, "SELECT * FROM brg ");

if (isset($_POST['submit'])) {
    $brg = $_POST['keyword'];
    $data= mysqli_query($conect, "SELECT * FROM brg WHERE NMBRG LIKE '%$brg%' ");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/modal.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>coba</title>
</head>
<body>

<!--Nav-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin Tool
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tambah.php">Tambah</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Register</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" method="post" action="">
    <input class="form-control me-2" type="search" placeholder="Search" autocomplete="off" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
    </form>

  
    </div>
  </div>
</nav>



<!--Card-->
<div class="d-flex">
<?php
        while($daftar = mysqli_fetch_array($data)){
        ?>
<div class="card m-3" style="width: 18rem; display: flex;">
  <img src="<?php echo $daftar['foto'] ?>" name="foto" class="card-img-top" style="object-fit:cover;" width="120px" height="200px" alt="...">
  <div class="card-body">
    <h5 class="card-title" name="nmbrg"><?php echo $daftar['nmbrg']; ?></h5>
    <p class="card-text" name="hrga"><?php echo $daftar['hrga'] ?></p>
    <?php echo "<a href='edit.php?id=$daftar[idbrg]' class='btn btn-primary'>EDIT</a> <a href='del.php?id=$daftar[idbrg]' class='btn btn-danger'>DEL</a>";?>
    
        <!-- Button modal -->
    <?php echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop$daftar[idbrg]'>Lihat</button>";?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $daftar['idbrg']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" name="nmbrg"><?php echo $daftar['nmbrg']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="<?php echo $daftar['foto'] ?>" name="foto" class="card-img-top" style="object-fit:cover;" width="500px" height="240px">
        <h5 class="card-title">Harga</h5>
        <p class="card-text" name="hrga"><?php echo $daftar['hrga']?></p>
        <h5 class="card-title">Tahun Rilis</h5>
        <p class="card-text" name="date"><?php echo $daftar['date']?></p>
        <h5 class="card-title">Perusahaan</h5>
        <p class="card-text" name="company"><?php echo $daftar['company'] ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
  <?php
        }
        ?>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>