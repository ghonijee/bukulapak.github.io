<?php session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$pass = $_POST['password'];

$cekuser = mysqli_query($konek, "SELECT * FROM admin WHERE username = '$username'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
if ($jumlah == 0) {
    echo "Username Belum Terdaftar!";
    echo "<a href='login.php'>Back</a>";
} else {
    if ($pass != $hasil['password']) {
        echo "Password Salah!";
        echo "<a href='login.php'>Back</a>";
    } else {
        $_SESSION['username'] = $hasil['username'];
        header('location:index.php');
    }
}
?>