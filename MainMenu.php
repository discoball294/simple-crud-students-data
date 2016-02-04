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
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>
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
        <li class="bold"><a href="MenuChart.php" class="waves-effect waves-cyan"><i class="fa fa-pie-chart"></i>
                Chart</a>
        </li>
        <li class="bold active"><a href="MainMenu.php" class="waves-effect waves-cyan"><i
                    class="fa fa-graduation-cap"></i> Daftar Siswa </a>
        </li>
        <li class="bold"><a href="#modal1" class="waves-effect waves-cyan modal-trigger"><i class="fa fa-plus"></i>
                Tambah
                Mahasiswa</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content green white-text">
                        <h5 class="card-stats-title center bold"><i class="fa fa-male"></i> Siswa Laki-laki</h5>
                        <h4 class="card-stats-number center"><? StatSiswa('Laki-laki') ?></h4>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content  purple white-text">
                        <h5 class="card-stats-title center bold"><i class="fa fa-male"></i><i class="fa fa-female"></i>
                            Total Siswa</h5>
                        <h4 class="card-stats-number center"><? StatSiswaAll() ?></h4>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content pink lighten-2 white-text">
                        <h5 class="card-stats-title center bold"><i class="fa fa-female"></i> Siswa Perempuan</h5>
                        <h4 class="card-stats-number center"><? StatSiswa('Perempuan') ?></h4>
                    </div>
                </div>
            </div>
            <table id="siswa" class=" bordered striped highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="nim">NIM</th>
                    <th data-field="nama">Nama</th>
                    <th data-field="tgl_lahir">Tanggal Lahir</th>
                    <th data-field="jk">Jenis Kelamin</th>
                    <th data-field="alamat">Alamat</th>
                    <th data-field="alamat">Action</th>


                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4><i class="fa fa-graduation-cap"></i> Tambah Siswa</h4>
        <hr>
        <div class="row">
            <form class="col s12" method="post" action="add.php">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nim" name="nim" type="text" class="validate">
                        <label for="nim">NIM</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="nama" name="nama" type="text" class="validate">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Tanggal Lahir" name="tgl_lahir" type="date" class="datepicker validate">
                    </div>
                    <p class="blue-grey-text">Jenis Kelamin</p>
                    <p>
                        <input name="gender" type="radio" id="test1" value="Laki-laki" />
                        <label for="test1">Laki-laki</label>
                    </p>
                    <p>
                        <input name="gender" type="radio" id="test2" value="Perempuan" />
                        <label for="test2">Perempuan</label>
                    </p>
                    <div class="input-field col s12">
                        <input id="alamat" name="alamat" type="text" class="validate">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="input-field center col s12">
                        <button type="submit" class="btn waves-effect waves-ripple waves-light">Submit <i class="fa fa-paper-plane"></i> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">CLOSE</a>
    </div>
</div>
<script type="text/javascript" class="init">
    var editor; // use a global for the submit and return data rendering in the examples

    $(document).ready(function () {
        $('.modal-trigger').leanModal();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 40, // Creates a dropdown of 15 years to control year
            format: 'yyyy-dd-mm',
        });
        editor = new $.fn.dataTable.Editor({
            "ajax": "Student.php",
            "table": "#siswa",
            "fields": [{
                "label": "NIM:",
                "name": "nim"
            }, {
                "label": "Nama:",
                "name": "nama"
            }, {
                "label": "Tanggal Lahir:",
                "name": "tgl_lahir"
            }, {
                "label": "Jenis Kelamin:",
                "name": "jk"
            }, {
                "label": "Alamat:",
                "name": "alamat"
            }
            ]
        });

        // New record
        $('a.editor_create').on('click', function (e) {
            e.preventDefault();

            editor.create({
                title: 'Create new record',
                buttons: 'Add'
            });
        });

        // Edit record
        $('#siswa').on('click', 'a.editor_edit', function (e) {
            e.preventDefault();

            editor.edit($(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            });
        });

        // Delete a record
        $('#siswa').on('click', 'a.editor_remove', function (e) {
            e.preventDefault();

            editor.remove($(this).closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            });
        });

        $('#siswa').DataTable({
            ajax: "Student.php",
            columns: [
                {data: "nim"},
                {data: "nama"},
                {data: "tgl_lahir"},
                {data: "jk"},
                {data: "alamat"},
                {
                    data: null,
                    className: "center",
                    defaultContent: '<a href="" class="editor_edit btn waves-effect waves-ripple waves-light"><i class="fa fa-pencil"></i> </a>  <a href="" class="editor_remove btn waves-effect waves-ripple waves-light red"><i class="fa fa-close"></i> </a>'
                }
            ]
        });
    });

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
