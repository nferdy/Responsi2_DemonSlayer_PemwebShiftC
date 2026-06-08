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


// ========================================================================
// PROSES DELETE PESAN FORUM (CRUD - DELETE)
// ========================================================================
if (isset($_POST['hapus_pesan'])) {
    session_start();
    require_once 'koneksi.php'; // Sesuaikan path koneksi jika beda

    $id_pesan = mysqli_real_escape_string($koneksi, $_POST['id_pesan']);
    $user_id_login = $_SESSION['user_id'];
    $role_login = $_SESSION['role'];

    // Cek ulang ke database demi keamanan (Siapa tahu ada User nakal nge-hack HTML)
    $cek_pesan = mysqli_query($koneksi, "SELECT user_id FROM forum_posts WHERE id='$id_pesan'");
    $data_pesan = mysqli_fetch_assoc($cek_pesan);

    // Validasi Akhir: Boleh hapus JIKA dia Admin, ATAU ID dia sama dengan ID pengirim pesan
    if ($role_login == 'admin' || $user_id_login == $data_pesan['user_id']) {
        
        $query_hapus = "DELETE FROM forum_posts WHERE id='$id_pesan'";
        
        if (mysqli_query($koneksi, $query_hapus)) {
            // Redirect diam-diam tanpa alert biar mulus kayak WhatsApp beneran
            header("Location: ../forum.php");
            exit;
        } else {
            echo "<script>alert('Gagal menghapus pesan!'); window.location='../forum.php';</script>";
        }
    } else {
        echo "<script>alert('Mizunoto dilarang menghapus arsip milik orang lain!'); window.location='../forum.php';</script>";
    }
}




// ========================================================================
// PROSES UPDATE PESAN FORUM (CRUD - UPDATE)
// ========================================================================
if (isset($_POST['proses_edit'])) {
    session_start();
    require_once 'koneksi.php';

    $id_edit = mysqli_real_escape_string($koneksi, $_POST['id_edit']);
    $pesan_baru = mysqli_real_escape_string($koneksi, $_POST['pesan_edit']);
    $user_id_login = $_SESSION['user_id'];

    // Cek keamanan: Pastikan yang edit adalah pemilik pesannya sendiri
    $cek_pemilik = mysqli_query($koneksi, "SELECT user_id FROM forum_posts WHERE id='$id_edit'");
    $data_pemilik = mysqli_fetch_assoc($cek_pemilik);

    if ($user_id_login == $data_pemilik['user_id']) {
        // Hajar update datanya
        $query_update = "UPDATE forum_posts SET isi_pesan='$pesan_baru' WHERE id='$id_edit'";
        
        if (mysqli_query($koneksi, $query_update)) {
            // Kembali ke forum tanpa berisik (tanpa alert)
            header("Location: ../forum.php");
            exit;
        } else {
            echo "<script>alert('Gagal mengedit pesan!'); window.location='../forum.php';</script>";
        }
    } else {
        echo "<script>alert('Hanya bisa mengedit pesan milik sendiri!'); window.location='../forum.php';</script>";
    }
}
?>