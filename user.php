<?php
require("connection.php");
$data= mysqli_query($conect, "SELECT * FROM brg");

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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Other
          </a>
          <ul class="dropdown-menu">
            <li></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="post" action="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-light" type="submit" name="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- Nav End -->



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
        <button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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