<?php
include_once("connection.php");

// Pastikan $idmotor telah didefinisikan
$idbrg = $_GET['id'];

if (isset($_POST["update"])) {
    $idbrg = $_POST["idbrg"];
    $brg = $_POST['nmbrg'];
    $hrg = $_POST['hrga'];
    $date = $_POST['date'];
    $com = $_POST['company'];

    // Variabel untuk mengelola upload gambar
    $upload_dir = "pict/"; // Direktori tempat menyimpan gambar

    if (!empty($_FILES['foto']['name'])) {
        $upload_file = $upload_dir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $upload_file);
        $result = mysqli_query($conect, "UPDATE BRG SET NMBRG='$brg', DATE='$date', COMPANY='$com', HRGA='$hrg', FOTO='$upload_file' WHERE IDBRG=$idbrg");
    } else {
        // Jika tidak ada file gambar yang diunggah, hanya update data lain
        $result = mysqli_query($conect, "UPDATE BRG SET NMBRG='$brg', DATE='$date', COMPANY='$com', HRGA='$hrg' WHERE IDBRG=$idbrg");
    }

    header("Location: admin/index.php");
}

// Ambil data motor dari database
$result = mysqli_query($conect, "SELECT * FROM BRG WHERE IDBRG=$idbrg");
$daftar = mysqli_fetch_array($result);

// Ambil nilai 
    $brg = $daftar['nmbrg'];
    $hrg = $daftar['hrga'];
    $date = $daftar['date'];
    $com = $daftar['company'];
    $foto = $daftar['foto'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit/Update</title>
  </head>
  <body>
    <form
      action="edit.php?id=<?php echo $idbrg; ?>"
      name="edit"
      method="post"
      enctype="multipart/form-data"
    >
    <div class="container">
<a class="btn btn-danger" href="admin/index.php" role="button" style="margin-top:50px; margin-bottom:50px;">Kembali</a>
<div class="mb-3">
  <label for="form-top: 100px;GroupExampleInput" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" name="nmbrg" value="<?php echo $brg; ?>" required id="formGroupExampleInput" placeholder="Masukan Nama Barang">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Harga</label>
  <input type="text" class="form-control" name="hrga" value="<?php echo $hrg; ?>" required id="formGroupExampleInput2" placeholder="Masukan Harga">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Tahun Rilis</label>
  <input type="text" class="form-control" name="date" value="<?php echo $date; ?>" required id="formGroupExampleInput" placeholder="Tanggal/Bulan/Tahun">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Dari Perusahaan</label>
  <input type="text" class="form-control" name="company" value="<?php echo $com; ?>" required id="formGroupExampleInput" placeholder="Nama Perusahaan">
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Pilih Foto</label>
  <input class="form-control" name="foto" type="file" id="formFile">
  <img src="<?php echo $foto; ?>" alt="" style="object-fit:cover;" width="400px" height="220px" />

  <input type="hidden" name="idbrg" value="<?php echo $idbrg; ?>" />
  <input type="submit" class="btn btn-danger" name="update" value="UPDATE" />
</div>
</div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>