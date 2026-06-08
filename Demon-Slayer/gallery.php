<?php 
session_start();
require_once 'config/koneksii.php'; // Wajib panggil database

$page = 'gallery'; 

// ========================================================================
// 1. PROSES DELETE GAMBAR (KHUSUS HASHIRA/ADMIN)
// ========================================================================
if (isset($_POST['hapus_gambar'])) {
    if ($_SESSION['role'] == 'admin') {
        $id_hapus = $_POST['id_hapus'];
        
        // Cari nama file di database biar file fisiknya juga kehapus
        $cek_file = mysqli_query($koneksi, "SELECT gambar FROM gallery WHERE id='$id_hapus'");
        $data_file = mysqli_fetch_assoc($cek_file);
        
        // Hapus file dari folder img/
        if (file_exists($data_file['gambar'])) {
            unlink($data_file['gambar']); 
        }
        
        // Hapus data dari database
        mysqli_query($koneksi, "DELETE FROM gallery WHERE id='$id_hapus'");
        echo "<script>alert('Arsip berhasil dimusnahkan!'); window.location='gallery.php';</script>";
    } else {
        echo "<script>alert('Mizunoto dilarang menghapus arsip!');</script>";
    }
}

// ========================================================================
// 2. PROSES UPLOAD GAMBAR (KHUSUS HASHIRA/ADMIN)
// ========================================================================
if (isset($_POST['upload_gambar'])) {
    if ($_SESSION['role'] == 'admin') {
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $tag = mysqli_real_escape_string($koneksi, $_POST['tag']);
        
        // Bikin tinggi acak biar efek Pinterest-nya tetap jalan
        $pilihan_tinggi = ['200px', '250px', '280px', '300px', '340px'];
        $tinggi_acak = $pilihan_tinggi[array_rand($pilihan_tinggi)];

        // Urusan File Upload
        $nama_file = $_FILES['file_gambar']['name'];
        $tmp_file = $_FILES['file_gambar']['tmp_name'];
        
        // Tambahin angka unik (waktu) biar nama file gak bentrok kalau ada yang sama
        $path_simpan = "img/" . time() . "_" . $nama_file;

        // Pindahkan file dari komputer ke folder img/
        if (move_uploaded_file($tmp_file, $path_simpan)) {
            // Masukin data ke database
            mysqli_query($koneksi, "INSERT INTO gallery (judul, tag, tinggi, gambar) VALUES ('$judul', '$tag', '$tinggi_acak', '$path_simpan')");
            echo "<script>alert('Mahakarya berhasil ditambahkan ke Arsip!'); window.location='gallery.php';</script>";
        } else {
            echo "<script>alert('Gagal mengunggah gambar!');</script>";
        }
    }
}



// ========================================================================
// PROSES PINDAH GAMBAR KE ATAS (KHUSUS HASHIRA/ADMIN)
// ========================================================================
if (isset($_POST['pindah_atas'])) {
    if ($_SESSION['role'] == 'admin') {
        $id_naik = $_POST['id_naik'];
        
        // Memperbarui waktu_upload jadi waktu sekarang biar otomatis naik ke atas
        mysqli_query($koneksi, "UPDATE gallery SET waktu_upload = NOW() WHERE id='$id_naik'");
        
        // Refresh halaman biar posisinya langsung berubah
        echo "<script>window.location='gallery.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default" style="
    background-image: url('img/bg2.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        
        <div class="glass-card" style="text-align: center; margin-bottom: 40px;">
            <h2 style="margin-bottom: 5px;">Kimetsu Gallery</h2>
            <p style="margin-bottom: 0;">Kumpulan arsip visual, fanart, dan wallpaper dari Korps Pembasmi Iblis.</p>
        </div>

        <?php 
        // ========================================================================
        // 3. FORM UPLOAD (HANYA MUNCUL JIKA YANG LOGIN ADALAH ADMIN)
        // ========================================================================
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <div class="glass-card" style="margin-bottom: 30px; border-color: gold;">
                <h3 style="color: gold;">⚔️ Akses Hashira: Tambah Arsip Visual</h3>
                
                <form action="gallery.php" method="POST" enctype="multipart/form-data" onsubmit="return validasiUpload()">
                    <div class="form-group">
                        <input type="text" name="judul" placeholder="Judul Gambar (Contoh: Rengoku Smile)" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <input type="text" name="tag" placeholder="Tag (Contoh: #Fanart)" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <input type="file" name="file_gambar" accept="image/*" required style="color: #fff;">
                    </div>
                    <button type="submit" name="upload_gambar" class="btn-primary" style="margin-top: 15px;">Unggah Mahakarya</button>
                </form>
            </div>
        <?php } ?>

        <div class="gallery-grid">
            <?php 
            // ========================================================================
            // 4. MENGAMBIL DATA DARI DATABASE (Diurutkan berdasarkan Waktu Upload)
            // ========================================================================
            // Ganti ORDER BY id DESC menjadi ORDER BY waktu_upload DESC
            $query_gallery = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY waktu_upload DESC");
            
            while ($item = mysqli_fetch_assoc($query_gallery)) { 
            ?>
                <div class="gallery-item">
                    <img src="<?php echo $item['gambar']; ?>" 
                        alt="<?php echo $item['judul']; ?>" 
                        style="height: <?php echo $item['tinggi']; ?>; width: 100%; object-fit: cover; display: block;">
                
                    <div class="gallery-desc">
                        <strong><?php echo $item['judul']; ?></strong><br>
                        <span class="gallery-tag"><?php echo $item['tag']; ?></span>
                        
                        <?php 
                        // TAMPILKAN TOMBOL ADMIN
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                            <div style="margin-top: 10px; display: flex; gap: 5px;">
                                
                                <form action="gallery.php" method="POST">
                                    <input type="hidden" name="id_naik" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="pindah_atas" style="background: rgba(0, 255, 128, 0.2); color: #00ff80; border: 1px solid #00ff80; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 8pt; font-weight: bold;">
                                        ⬆️ Ke Atas
                                    </button>
                                </form>

                                <form action="gallery.php" method="POST">
                                    <input type="hidden" name="id_hapus" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="hapus_gambar" onclick="return confirm('Yakin mau menghapus arsip ini?');" style="background: rgba(255,0,0,0.2); color: #ff4d4d; border: 1px solid #ff4d4d; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 8pt; font-weight: bold;">
                                        🗑️ Hapus
                                    </button>
                                </form>
                                
                            </div>
                        <?php } ?>

                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Shift C - 2026 
    </footer>





    <script>
        function validasiUpload() {
            var fileInput = document.querySelector('input[type="file"]');
            var filePath = fileInput.value;
            
            // 1. Validasi Ekstensi (Hanya boleh JPG, JPEG, PNG)
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Akses Ditolak! Arsip visual wajib berformat .jpg atau .png');
                fileInput.value = ''; // Reset input
                return false; // Gagalkan submit form
            }
            
            // 2. Validasi Ukuran File (Maksimal 2 MB = 2097152 bytes)
            if (fileInput.files[0].size > 2097152) {
                alert('Aura gambar terlalu kuat! Ukuran maksimal file adalah 2MB.');
                fileInput.value = ''; // Reset input
                return false; 
            }
            
            return true; // Lolos validasi, form dikirim!
        }
    </script>
</body>
</html>
