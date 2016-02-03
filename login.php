<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <!-- CSS  -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2/1/16
 * Time: 11:27 PM
 */
require_once "dbConnect.php";
$query = 'SELECT * FROM user';
$data = $db->query($query);
$sukses = 0;
$row = $data->fetch_assoc();
foreach ($data as $row) {

    if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
        $sukses = 1;
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
    }
}
if ($sukses == 1) {
    echo "<script>
sweetAlert({
    title: \"Sukses!\",
    text: \"Berhasil Login\",
    type: \"success\"
},
function () {
    window.location.href = 'MainMenu.php';
});
</script>";

} else
    echo "<script>
sweetAlert({
    title: \"Gagal!\",
    text: \"Username atau Password Salah\",
    type: \"error\"
},
function () {
    window.location.href = 'index.html';
});
</script>";
?>
</body>
</html>
