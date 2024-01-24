





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tambah</title>
</head>
<body>

<form
      action="tambah.php"
      method="post"
      name="form1"
      enctype="multipart/form-data"
    >

<div class="container">
<a class="btn btn-danger" href="index.php" role="button" style="margin-top:50px; margin-bottom:50px;">Kembali</a>
<div class="mb-3">
  <label for="form-top: 100px;GroupExampleInput" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" name="nmbrg" required id="formGroupExampleInput" placeholder="Masukan Nama Barang">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Harga</label>
  <input type="text" class="form-control" name="hrga" required id="formGroupExampleInput2" placeholder="Masukan Harga">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Tahun Rilis</label>
  <input type="text" class="form-control" name="date" id="formGroupExampleInput" placeholder="Tanggal/Bulan/Tahun">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Dari Perusahaan</label>
  <input type="text" class="form-control" name="company" id="formGroupExampleInput" placeholder="Nama Perusahaan">
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" name="foto" type="file" required id="formFile">

  <input class="btn btn-primary m-2" name="submit" type="submit" value="Submit">
</div>
</div>
</form>

<?php
if (isset($_POST["submit"])) {
    $brg = $_POST['nmbrg'];
    $hrg = $_POST['hrga'];
    $date = $_POST['date'];
    $com = $_POST['company'];

    // Pengaturan untuk mengelola upload gambar
    $upload_dir = "pict/"; // Direktori tempat menyimpan gambar
    $upload_file = $upload_dir . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $upload_file);

    include_once("connection.php");

    $result = mysqli_query($conect, "INSERT INTO BRG (NMBRG, COMPANY, DATE, HRGA, FOTO) VALUES ('$brg', '$com', '$date','$hrg', '$upload_file')");

    if($result){
      ?>
      <script>
        swal({
  title: "Berhasil!",
  text: "Data telah ditambahkan!",
  icon: "success",  
});
      </script>
      <?php
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>