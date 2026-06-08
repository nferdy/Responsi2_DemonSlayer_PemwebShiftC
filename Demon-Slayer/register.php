<?php
session_start();
// Logika pendaftaran (CREATE) akan diurus oleh Backend di sini
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Registrasi</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .auth-card {
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
    </style>
</head>
<body class="theme-default" style="
    background-image: url('img/bg00.jpeg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <div class="auth-wrapper">
        <div class="glass-card auth-card">
            <h2 style="margin-bottom: 5px;">Pendaftaran Korps</h2>
            <p style="margin-bottom: 25px;">Lengkapi data diri untuk menjadi pembasmi iblis.</p>
            
            <form action="config/auth_register.php" method="POST">
                <div class="form-group" style="text-align: left;">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" required placeholder="Contoh: Yogi Ferdiansyah">
                </div>

                <div class="form-group" style="text-align: left;">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Pilih username tanpa spasi...">
                </div>
                
                <div class="form-group" style="text-align: left;">
                    <label>Password</label>
                    <input type="password" name="password" required minlength="8" placeholder="Minimal 8 karakter...">
                </div>

                <div class="form-group" style="text-align: left;">
                    <label>Tipe Elemen Pernapasan</label>
                    <select name="pernapasan" required>
                        <option value="" disabled selected>-- Pilih Elemen Dasar --</option>
                        <option value="Air">Pernapasan Air (Water)</option>
                        <option value="Petir">Pernapasan Petir (Thunder)</option>
                        <option value="Api">Pernapasan Api (Flame)</option>
                        <option value="Angin">Pernapasan Angin (Wind)</option>
                        <option value="Batu">Pernapasan Batu (Stone)</option>
                    </select>
                </div>
                
<!--
                <div class="form-group">
                    <label style="color: #fff; margin-bottom: 5px; display: block;">Pilih Pangkat (Role):</label>
                    <select name="role" required style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.2); margin-bottom: 15px;">
                        <option value="user" style="color: #000;">Mizunoto (Prajurit Baru)</option>
                        <option value="admin" style="color: #000;">Hashira (Admin)</option>
                    </select>
                </div>
-->


                <button type="submit" name="register_btn" class="btn-primary" style="width: 100%; margin-top: 10px;">Daftar Sekarang</button>
            </form>
            
            <p style="margin-top: 20px; font-size: 9pt;">
                Sudah punya akses? <a href="login.php" style="color: #bb86fc; text-decoration: none; font-weight: bold;">Kembali ke Gerbang</a>
            </p>
        </div>
    </div>

</body>
</html>
