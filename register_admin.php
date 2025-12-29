<?php
include 'db.php';

$username = 'admin';
$password = 'admin123'; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn, "DELETE FROM users WHERE username = '$username'");

$query = "INSERT INTO users (username, password) VALUES ('admin', '$hashed_password')";

if(mysqli_query($conn, $query)) {
    echo "Akun Admin berhasil dibuat! <br> Username: admin <br> Password: admin123";
    echo "<br><a href='login.php'>Ke Halaman Login</a>";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>