<?php
session_start();
require_once "fungsi.php";
require_once "dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="css/editor.dataTables.min.css" type="text/css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="js/sweetalert-dev.js"></script>
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.editor.min.js"></script>


    <link rel="stylesheet" href="css/sweetalert.css">
    <style>@media (min-width: 991px) {
            main {
                padding-left: 140px;
                padding-top: 35px;
            }
        }</style>

</head>
<body>


<header>
    <div class="navbar">
        <nav class="cyan darken-2">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="javascript:logout()">Logout</a></li>
            </ul>
        </nav>
    </div>

</header>
<main>
    <ul style="width: 240px;" id="nav-mobile" class="side-nav fixed">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s8 m8 l8">
                    <h5 class="white-text"><? echo $_SESSION['nama']; ?></h5>

                    <p class="user-roal">Administrator</p>
                </div>
            </div>
        </li>
        <li class="bold active"><a href="#" class="waves-effect waves-cyan"><i class="fa fa-pie-chart"></i> Chart</a>
        </li>
        <li class="bold"><a href="MainMenu.php" class="waves-effect waves-cyan"><i
                    class="fa fa-graduation-cap"></i> Daftar Siswa </a>
        </li>
        <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="fa fa-plus"></i> Tambah
                Mahasiswa</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content green white-text">
                        <h5 class="card-stats-title center bold"><i class="fa fa-male"></i><i class="fa fa-female"></i> Chart Gender Siswa</h5>
                        <p class="center"><? include "Chart.php"; ?></p>
                    </div>
                    <div class="card-action  green darken-2">
                        <div id="clients-bar">
                            <h5 style="color: #F38630"><i class="fa fa-male"></i> Laki-laki : <? StatSiswa('Laki-laki') ?> Siswa</h5>
                            <h5 style="color: #E0E4CC"><i class="fa fa-female"></i> Perempuan : <? StatSiswa('Perempuan') ?> Siswa</h5>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>
<script>
    function logout() {
        swal({
                title: "Logout ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                closeOnConfirm: false
            },
            function () {
                onclick
                window.location.href = 'index.html';
            });
    }
</script>
</body>
</html>
