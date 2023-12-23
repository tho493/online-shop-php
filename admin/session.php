<?php
include("../database/db.php");

if (!isset($_SESSION)) {
    session_start();
}
// if (isset($_SESSION['user'])) {
//     header("Location: index.php");
// }
if (!isset($_SESSION["name"])) {
    header("Location: ../index.php");
}
?>