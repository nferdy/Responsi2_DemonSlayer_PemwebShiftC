<?php
session_start();
// Panggil koneksi database
require_once 'koneksi.php';

// Jika tombol login ditekan
if (isset($_POST['login_btn'])) {
    // Ambil inputan user dan bersihkan dari karakter aneh (keamanan SQL Injection)
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk mencari username di tabel users
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    
    // Jika username ditemukan
    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        
        // Cek apakah password cocok (jika database nanti pakai hash, ganti dengan password_verify)
        if ($password == $user['password']) {
            // SET SESSION! (Syarat 20 Poin)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Misal: 'Admin' atau 'User Biasa'
            
            // Arahkan ke halaman utama
            header("Location: ../index.php");
            exit;
        } else {
            // Password salah
            echo "<script>alert('Password yang dimasukkan salah!'); window.location='../login.php';</script>";
        }
    } else {
        // Username tidak ada
        echo "<script>alert('Username belum terdaftar!'); window.location='../login.php';</script>";
    }
}
?>