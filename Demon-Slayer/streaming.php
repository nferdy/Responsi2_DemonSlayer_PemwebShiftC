<?php 
session_start();
require_once 'config/koneksi.php'; // Panggil database

$page = 'streaming'; 

// ========================================================================
// 1. PROSES TAMBAH VIDEO (KHUSUS ADMIN)
// ========================================================================
if (isset($_POST['tambah_video'])) {
    if ($_SESSION['role'] == 'admin') {
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        $video_url = mysqli_real_escape_string($koneksi, $_POST['video_url']);
        
        // Hajar masukin ke database
        mysqli_query($koneksi, "INSERT INTO streaming (judul, deskripsi, video_url) VALUES ('$judul', '$deskripsi', '$video_url')");
        echo "<script>alert('Video berhasil ditambahkan ke Arsip!'); window.location='streaming.php';</script>";
    }
}

// ========================================================================
// 2. PROSES HAPUS VIDEO (KHUSUS ADMIN)
// ========================================================================
if (isset($_POST['hapus_video'])) {
    if ($_SESSION['role'] == 'admin') {
        $id_hapus = mysqli_real_escape_string($koneksi, $_POST['id_hapus']);
        
        mysqli_query($koneksi, "DELETE FROM streaming WHERE id='$id_hapus'");
        echo "<script>alert('Arsip video berhasil dihapus!'); window.location='streaming.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Streaming</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default" style="
    background-image: url('img/bg3.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        
        <div class="glass-card" style="text-align: center; margin-bottom: 40px;">
            <h2 style="margin-bottom: 5px;">Streaming Room</h2>
            <p style="margin-bottom: 0;">Pusat arsip rekaman misi dari setiap arc (Google Drive / YouTube Embed Integration).</p>
        </div>

        <?php 
        // ========================================================================
        // 3. FORM TAMBAH VIDEO (HANYA MUNCUL JIKA YANG LOGIN ADALAH ADMIN)
        // ========================================================================
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <div class="glass-card" style="margin-bottom: 30px; border-color: #ff4d4d;">
                <h3 style="color: #ff4d4d;">🎬 Akses Hashira: Tambah Rekaman Misi</h3>
                
                <form action="streaming.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="judul" placeholder="Judul Arc / Episode" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <input type="text" name="video_url" placeholder="Link Embed YouTube (Contoh: https://www.youtube.com/embed/dQw4w9WgXcQ)" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <textarea name="deskripsi" placeholder="Deskripsi pertempuran..." required style="width: 100%; padding: 12px; border-radius: 10px; background: rgba(255,255,255,0.04); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 80px;"></textarea>
                    </div>
                    <button type="submit" name="tambah_video" class="btn-primary" style="margin-top: 15px; background: linear-gradient(90deg, #ff4d4d, #cc0000);">Unggah Video</button>
                </form>
            </div>
        <?php } ?>

        <div class="stream-grid">
            <?php 
            // ========================================================================
            // 4. MENGAMBIL DATA DARI DATABASE MYSQL
            // ========================================================================
            $query_video = mysqli_query($koneksi, "SELECT * FROM streaming ORDER BY id DESC");
            
            // Masukin data dari database ke dalam array biar bisa di-chunk (dibagi 2) kayak kode lu sebelumnya
            $data_video_db = [];
            while($row_db = mysqli_fetch_assoc($query_video)){
                $data_video_db[] = $row_db;
            }

            // Memecah array menjadi kelompok berisi 2 video agar pas dengan layout baris (row)
            $video_rows = array_chunk($data_video_db, 2);

            foreach ($video_rows as $row) { 
                echo '<div class="stream-row">';
                
                foreach ($row as $video) {
            ?>
                    <div class="stream-card">
                        <div class="video-box" style="padding: 0; overflow: hidden; position: relative;">
                            
                            <?php 
                            // TAMPILKAN TOMBOL HAPUS HANYA UNTUK ADMIN (Ditaruh menimpa pojok video)
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                                <form action="streaming.php" method="POST" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                                    <input type="hidden" name="id_hapus" value="<?php echo $video['id']; ?>">
                                    <button type="submit" name="hapus_video" onclick="return confirm('Hapus rekaman misi ini?');" style="background: rgba(255,0,0,0.8); color: #fff; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 8pt; font-weight: bold;">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            <?php } ?>

                            <iframe 
                                width="100%" 
                                height="100%" 
                                src="<?php echo htmlspecialchars($video['video_url']); ?>" 
                                title="<?php echo htmlspecialchars($video['judul']); ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        
                        <div class="stream-info">
                            <h3><?php echo htmlspecialchars($video['judul']); ?></h3>
                            <p><?php echo htmlspecialchars($video['deskripsi']); ?></p>
                        </div>
                    </div>
            <?php 
                } 
                echo '</div>'; // Tutup baris
            } 
            
            // Tampilkan pesan jika database kosong
            if(empty($data_video_db)){
                echo "<p style='text-align: center; width: 100%; color: rgba(255,255,255,0.5);'>Belum ada rekaman misi yang diarsipkan.</p>";
            }
            ?>
        </div>

    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Shift C - 2026
    </footer>

</body>
</html>
