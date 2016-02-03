<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2/2/16
 * Time: 5:28 PM
 */
require_once "dbConnect.php";
function StatSiswa($jk){
    global $db;
    $query = "SELECT COUNT('jk') AS jen FROM students WHERE jk LIKE '".$jk."'";
    $data = $db->query($query);
    $row = $data->fetch_assoc();
    echo $row['jen'];
}
function StatSiswaAll(){
    global $db;
    $query = "SELECT COUNT('jk') AS jen FROM students";
    $data = $db->query($query);
    $row = $data->fetch_assoc();
    echo $row['jen'];
}