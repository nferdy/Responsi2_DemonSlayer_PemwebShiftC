<?php
session_start();
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan sesi

// Mengembalikan user ke halaman login
header("Location: ../login.php");
exit;
?>