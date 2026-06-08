<?php 
session_start();
require_once 'config/koneksii.php';
require_once 'config/functionss.php';

// Keamanan: Tendang ke login kalau belum masuk
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$page = 'account'; 
$user_id = $_SESSION['user_id'];

// ========================================================================
// 1. PROSES UPDATE PROFIL (CRUD - UPDATE)
// ========================================================================
if (isset($_POST['update_profil'])) {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $pernapasan = mysqli_real_escape_string($koneksi, $_POST['pernapasan']);
    $password_baru = $_POST['password_baru'];
    
    // Dasar query update (Nama dan Pernapasan pasti diupdate)
    $query_update = "UPDATE users SET nama_lengkap='$nama_lengkap', pernapasan='$pernapasan'";

    // Jika password diisi, tambahkan ke query
    if (!empty($password_baru)) {
        $query_update .= ", password='$password_baru'";
    }

    // Urusan Upload Foto Profil
    $nama_file = $_FILES['foto_profil']['name'];
    $tmp_file = $_FILES['foto_profil']['tmp_name'];
    $error_file = $_FILES['foto_profil']['error'];

    // Cek apakah ada file yang diunggah (error 0 berarti ada file)
    if ($error_file === 0) {
        // Validasi ekstensi
        $ekstensi_valid = ['jpg', 'jpeg', 'png'];
        $ekstensi_file = explode('.', $nama_file);
        $ekstensi_file = strtolower(end($ekstensi_file));

        if (in_array($ekstensi_file, $ekstensi_valid)) {
            // Beri nama unik dan tentukan lokasi simpan
            $nama_file_baru = time() . '_' . $user_id . '.' . $ekstensi_file;
            $path_simpan = "img/avatar/" . $nama_file_baru;

            // Pindahkan file dan tambahkan ke query update
            if (move_uploaded_file($tmp_file, $path_simpan)) {
                $query_update .= ", foto_profil='$path_simpan'";
            }
        } else {
            echo "<script>alert('Gagal! Format foto harus JPG, JPEG, atau PNG.');</script>";
        }
    }

    // Tutup query dengan klausa WHERE
    $query_update .= " WHERE id='$user_id'";

    // Eksekusi Update
    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>alert('Profil berhasil diperbarui!'); window.location=window.location.href;</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil.');</script>";
    }
}

// ========================================================================
// 2. MENGAMBIL DATA USER DARI DATABASE
// ========================================================================
$query_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$user_id'");
$user_data = mysqli_fetch_assoc($query_user);

// ========================================================================
// 3. MENGHITUNG RANK MENGGUNAKAN FUNCTION CUSTOM
// ========================================================================
$query_post = mysqli_query($koneksi, "SELECT COUNT(id) as total_pesan FROM forum_posts WHERE user_id='$user_id'");
$data_post = mysqli_fetch_assoc($query_post);
$jumlah_post = $data_post['total_pesan'];

$pangkat_user = hitungRankKorps($jumlah_post);

if ($user_data['role'] == 'admin') {
    $pangkat_user = "Hashira (Pilar) ⚔️🔥";
    $label_role = "Admin (Hak Akses Penuh)";
} else {
    $label_role = "User Biasa";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Pengaturan Akun</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #bb86fc;
            margin: 0 auto 10px auto;
            display: block;
        }
    </style>
</head>
<body class="theme-default" style="
    background-image: url('img/bg5.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        <h2 style="margin-bottom: 20px;">Pengaturan Akun Pembasmi</h2>
        
        <div class="glass-card">
            <div class="account-layout">
                
                <div class="profile-sidebar">
                    <?php 
                    // Logika menampilkan foto profil atau avatar default
                    if (!empty($user_data['foto_profil']) && file_exists($user_data['foto_profil'])) {
                        echo '<img src="' . $user_data['foto_profil'] . '" alt="Foto Profil" class="avatar-preview">';
                    } else {
                        echo '<div class="avatar-circle">🎴</div>';
                    }
                    ?>
                    
                    <h3 style="text-align: center; margin-bottom: 5px;"><?php echo htmlspecialchars($user_data['nama_lengkap']); ?></h3>
                    <p style="text-align: center; color: #bb86fc; font-size: 11pt; font-weight: bold; margin-bottom: 5px;">
                        RANK: <?php echo strtoupper($pangkat_user); ?>
                    </p>
                    <p style="text-align: center; font-size: 9pt; color: rgba(255,255,255,0.7); margin-bottom: 5px;">
                        Total Misi: <?php echo $jumlah_post; ?> Pesan Forum
                    </p>
                    <p style="text-align: center; font-size: 8.5pt; color: rgba(255,255,255,0.4); margin-top: 5px;">
                        Tipe Akun: <?php echo $label_role; ?>
                    </p>
                </div>

                <div class="settings-form">
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group" style="margin-bottom: 20px; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 8px;">
                            <label>Ganti Foto Profil (Opsional)</label>
                            <input type="file" name="foto_profil" accept=".jpg, .jpeg, .png" style="color: #fff; margin-top: 5px;">
                            <small style="color: rgba(255,255,255,0.5); display: block; margin-top: 5px;">Format: JPG, JPEG, PNG.</small>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap Korps</label>
                            <input type="text" name="nama_lengkap" value="<?php echo htmlspecialchars($user_data['nama_lengkap']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Pilihan Gaya Pernapasan (Atribut/Elemen)</label>
                            <select name="pernapasan" required>
                                <option value="Air" <?php if($user_data['pernapasan'] == 'Air') echo 'selected'; ?>>Pernapasan Air (Water Breathing)</option>
                                <option value="Pernapasan Petir" <?php if($user_data['pernapasan'] == 'Pernapasan Petir') echo 'selected'; ?>>Pernapasan Petir (Thunder Breathing)</option>
                                <option value="Api" <?php if($user_data['pernapasan'] == 'Api') echo 'selected'; ?>>Pernapasan Api (Flame Breathing)</option>
                                <option value="Pernapasan Binatang" <?php if($user_data['pernapasan'] == 'Pernapasan Binatang') echo 'selected'; ?>>Pernapasan Binatang (Beast Breathing)</option>
                                <option value="Darah Iblis" <?php if($user_data['pernapasan'] == 'Darah Iblis') echo 'selected'; ?>>Darah Iblis (Blood Demon Art)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password_baru" placeholder="Masukkan password baru minimal 8 karakter..." minlength="8">
                        </div>

                        <button type="submit" name="update_profil" class="btn-primary">Simpan Perubahan</button>
                        
                        <a href="config/logout.php" onclick="return confirm('Yakin ingin keluar dari markas?');" style="display:inline-block; margin-left: 10px; color: #ff4d4d; text-decoration: none; font-size: 10pt; font-weight: bold;">Keluar (Logout)</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Shift C - 2026
    </footer>

</body>
</html>
