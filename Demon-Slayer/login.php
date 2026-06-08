<?php
// Memulai session, idealnya Backend akan menaruh logika auth di sini
session_start();

// Cek jika user sudah login, langsung lempar ke dashboard
// if(isset($_SESSION['user_id'])) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS tambahan khusus untuk menengahkan form di halaman Auth */
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .auth-card {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body class="theme-default" style="
    background-image: url('img/bg0.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <div class="auth-wrapper">
        <div class="glass-card auth-card">
            <h2 style="margin-bottom: 5px;">Gerbang Wisteria</h2>
            <p style="margin-bottom: 25px;">Silakan masuk untuk mengakses arsip Korps.</p>
            
            <form action="config/auth_login.php" method="POST">
                <div class="form-group" style="text-align: left;">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Masukkan username...">
                </div>
                
                <div class="form-group" style="text-align: left;">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Masukkan password...">
                </div>
                
                <button type="submit" name="login_btn" class="btn-primary" style="width: 100%; margin-top: 10px;">Masuk (Login)</button>
            </form>
            
            <p style="margin-top: 20px; font-size: 9pt;">
                Belum bergabung? <a href="register.php" style="color: #bb86fc; text-decoration: none; font-weight: bold;">Ikuti Final Selection</a>
            </p>
        </div>
    </div>

</body>
</html>
