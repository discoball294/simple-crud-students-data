<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <!-- CSS  -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2/4/16
 * Time: 2:36 PM
 */
require_once "dbConnect.php";
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$tgl_lahir=$_POST['tgl_lahir'];
$jk=$_POST['gender'];
$alamat=$_POST['alamat'];
$query="INSERT INTO `students`(`nim`, `nama`, `tgl_lahir`, `jk`, `alamat`) VALUES ('".$nim."','".$nama."','".$tgl_lahir."','".$jk."','".$alamat."')";
$db->query($query) or die("<script>
sweetAlert({
    title: \"Gagal!\",
    text: \"Terjadi kesalahan '$db->errno'\",
    type: \"error\"
},
function () {
    window.location.href = 'MainMenu.php';
});
</script>");
echo "<script>
sweetAlert({
    title: \"Berhasil!\",
    text: \"Data telah ditambahkan '$tgl_lahir' \",
    type: \"success\"
},
function () {
    window.location.href = 'MainMenu.php';
});
</script>";
?>
</body>
</html>
