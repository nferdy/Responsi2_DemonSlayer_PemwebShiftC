<?php 
// Wajib ada session untuk mengecek status login user
session_start();

// Menandai halaman aktif
$page = 'account'; 

// ========================================================================
// SIMULASI DATABASE PROFIL (Untuk Anak Backend)
// Nanti diganti dengan: SELECT * FROM users WHERE id = $_SESSION['user_id']
// ========================================================================
$user_login = [
    "nama" => "Yogi Ferdiansyah Amta Miluloh",
    "role" => "User Biasa", // Role bisa "Admin (Hashira)" atau "User Biasa"
    "rank" => "Mizunoto",
    "pernapasan" => "Pernapasan Petir (Thunder Breathing)"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Pengaturan Akun</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default">

    <?php 
    // Memanggil menu navigasi
    include('includes/navbar.php'); 
    ?>

    <div class="container">
        <h2 style="margin-bottom: 20px;">Pengaturan Akun Pembasmi</h2>
        
        <div class="glass-card">
            <div class="account-layout">
                
                <div class="profile-sidebar">
                    <div class="avatar-circle">🎴</div>
                    <h3 style="text-align: center; margin-bottom: 5px;"><?php echo $user_login['nama']; ?></h3>
                    <p style="text-align: center; color: #bb86fc; font-size: 9pt; font-weight: bold;">RANK: <?php echo strtoupper($user_login['rank']); ?></p>
                    <p style="text-align: center; font-size: 8.5pt; color: rgba(255,255,255,0.4); margin-top: 5px;">Tipe Akun: <?php echo $user_login['role']; ?></p>
                </div>

                <div class="settings-form">
                    
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama Lengkap Korps</label>
                            <input type="text" name="nama_lengkap" value="<?php echo $user_login['nama']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Pilihan Gaya Pernapasan (Atribut/Elemen)</label>
                            <select name="pernapasan" required>
                                <option value="Air" <?php if($user_login['pernapasan'] == 'Air') echo 'selected'; ?>>Pernapasan Air (Water Breathing)</option>
                                <option value="Petir" <?php if($user_login['pernapasan'] == 'Pernapasan Petir (Thunder Breathing)') echo 'selected'; ?>>Pernapasan Petir (Thunder Breathing)</option>
                                <option value="Api" <?php if($user_login['pernapasan'] == 'Api') echo 'selected'; ?>>Pernapasan Api (Flame Breathing)</option>
                                <option value="Darah Iblis" <?php if($user_login['pernapasan'] == 'Darah Iblis') echo 'selected'; ?>>Darah Iblis (Blood Demon Art)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password_baru" placeholder="Masukkan password baru minimal 8 karakter..." minlength="8">
                        </div>

                        <button type="submit" name="update_profil" class="btn-primary">Simpan Perubahan</button>
                        
                        <a href="#" style="display:inline-block; margin-left: 10px; color: #ff4d4d; text-decoration: none; font-size: 10pt; font-weight: bold;">Keluar (Logout)</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Kelompok © 2026 | PHP Native Evolution Concept
    </footer>

</body>
</html>