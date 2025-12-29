<?php
include 'db.php';
$id = $_GET['id'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM barang WHERE id=$id"));
if ($r) {
    @unlink("uploads/".$r['gambar']);
    mysqli_query($conn, "DELETE FROM barang WHERE id=$id");
}
header("Location: dashboard.php");