<?php
session_start();
require_once 'koneksi.php';

// Jika tombol daftar ditekan
if (isset($_POST['register_btn'])) {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; 
    $pernapasan = mysqli_real_escape_string($koneksi, $_POST['pernapasan']);

    // Cek apakah username sudah dipakai orang lain
    $cek_username = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
    
    if (mysqli_num_rows($cek_username) > 0) {
        echo "<script>alert('Username sudah dipakai, pilih yang lain!'); window.location='../register.php';</script>";
    } else {
        // Masukkan data ke database dengan Role default 'User Biasa'
        $query_insert = "INSERT INTO users (nama_lengkap, username, password, pernapasan, role) 
                         VALUES ('$nama_lengkap', '$username', '$password', '$pernapasan', 'user')";
        
        if (mysqli_query($koneksi, $query_insert)) {
            echo "<script>alert('Pendaftaran Korps Berhasil! Silakan Login.'); window.location='../login.php';</script>";
        } else {
            echo "<script>alert('Gagal mendaftar, coba lagi.'); window.location='../register.php';</script>";
        }
    }
}
?>