<?php
require("connection.php");
$idbrg = $_GET['id'];
$queryGetImage = mysqli_query($conect, "SELECT foto FROM brg WHERE idbrg='$idbrg'");
$imageData = mysqli_fetch_array($queryGetImage);
$imageName = $imageData['foto'];

// Hapus file gambar dari direktori "image"
if (file_exists($imageName)) {
    unlink($imageName);
}

$queryDelete = mysqli_query($conect, "DELETE FROM brg WHERE idbrg='$idbrg'");
if ($queryDelete) {
    ?>
    Terhapus!
    </div>
    <meta http-equiv="refresh" content="2, url=index.php" />
    <?php
}

?>