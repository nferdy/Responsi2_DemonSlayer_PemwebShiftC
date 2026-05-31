<?php
// BARIS INI YANG SEBELUMNYA KURANG! Wajib ada agar PHP ingat kamu sudah login.
session_start(); 
require_once 'koneksi.php';

// ==========================================
// 1. CREATE (Mengirim Pesan Baru)
// ==========================================
if (isset($_POST['kirim_pesan'])) {
    // Pastikan user sudah login sebelum nge-chat
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Login dulu untuk kirim pesan!'); window.location='../login.php';</script>";
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan_baru']);
    
    // Simpan pesan ke database
    $insert = mysqli_query($koneksi, "INSERT INTO forum_posts (user_id, isi_pesan) VALUES ('$user_id', '$pesan')");
    
    if($insert) {
        // Refresh halaman otomatis agar pesan baru muncul
        header("Location: ../forum.php");
        exit;
    } else {
        echo "<script>alert('Gagal mengirim pesan: " . mysqli_error($koneksi) . "'); window.location='../forum.php';</script>";
    }
}

// ==========================================
// 2. DELETE (Menghapus Pesan)
// ==========================================
if (isset($_GET['hapus_pesan'])) {
    // Pastikan hanya user terdaftar/admin yang bisa menghapus
    if (isset($_SESSION['user_id'])) {
        $id_pesan = $_GET['hapus_pesan'];
        mysqli_query($koneksi, "DELETE FROM forum_posts WHERE id = '$id_pesan'");
    }
    header("Location: ../forum.php");
    exit;
}
?>