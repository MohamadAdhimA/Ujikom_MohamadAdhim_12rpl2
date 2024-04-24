<?php 
// Include koneksi ke database
include 'koneksi.php';

// Mulai sesi jika belum dimulai
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah sesi username sudah diset
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h4>Kamu login sebagai $username</h4>";
} else {
    echo "Silakan login untuk melihat profil.";
    // Atau lakukan redirect ke halaman login jika sesi tidak tersedia
    // header("Location: login.php");
}

// Ambil data pengguna dari database
$query_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_assoc($query_user);

// Ambil data foto yang diunggah oleh pengguna dari database
$query_foto = mysqli_query($conn, "SELECT * FROM foto WHERE user_id = '{$user['user_id']}'");
?>