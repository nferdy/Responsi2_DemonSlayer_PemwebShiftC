<?php
// ========================================================================
// FILE KONEKSI DATABASE (MYSQLI NATIVE)
// ========================================================================

$host = "localhost";    // Server lokal (XAMPP)
$user = "root";         // Username default XAMPP
$pass = "";             // Password default XAMPP (kosong)
$db   = "db_demon_slayer"; // Nama database kalian (Bisa diganti sesuai kesepakatan tim)

// Melakukan koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi ke Markas Korps Gagal: " . mysqli_connect_error());
}
?>