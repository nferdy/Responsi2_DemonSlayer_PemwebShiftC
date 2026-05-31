<?php 
// Menandai halaman aktif untuk navigasi luar
$page = 'gallery'; 

// ========================================================================
// SIMULASI DATABASE (Untuk Anak Backend)
// Nanti array ini tinggal diganti pakai fungsi mysqli_query() dari database
// ========================================================================
$data_gallery = [
    [
        "judul" => "Tanjiro - Hinokami Kagura", 
        "tag" => "#Fanart", 
        "tinggi" => "250px", 
        "warna" => "linear-gradient(45deg, #8b0000, #ff4500)" // Efek warna sementara pengganti foto
    ],
    [
        "judul" => "Nezuko Moon Aesthetic", 
        "tag" => "#Wallpaper", 
        "tinggi" => "340px", 
        "warna" => "linear-gradient(45deg, #ffb6c1, #ff69b4)"
    ],
    [
        "judul" => "Zenitsu Thunder Clap", 
        "tag" => "#Vector", 
        "tinggi" => "200px", 
        "warna" => "linear-gradient(45deg, #ffd700, #ff8c00)"
    ],
    [
        "judul" => "Hashira Assembly", 
        "tag" => "#Official", 
        "tinggi" => "280px", 
        "warna" => "linear-gradient(45deg, #4b0082, #8a2be2)"
    ],
    [
        "judul" => "Inosuke Beast Mode", 
        "tag" => "#Fanart", 
        "tinggi" => "300px", 
        "warna" => "linear-gradient(45deg, #4682b4, #5f9ea0)"
    ],
    [
        "judul" => "Upper Moon 3 Akaza", 
        "tag" => "#Villain", 
        "tinggi" => "220px", 
        "warna" => "linear-gradient(45deg, #0f2027, #203a43)"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default">

    <?php 
    // Memanggil menu navigasi secara modular
    include('includes/navbar.php'); 
    ?>

    <div class="container">
        
        <div class="glass-card" style="text-align: center; margin-bottom: 40px;">
            <h2 style="margin-bottom: 5px;">Kimetsu Gallery</h2>
            <p style="margin-bottom: 0;">Kumpulan arsip visual, fanart, dan wallpaper dari Korps Pembasmi Iblis.</p>
        </div>

        <div class="gallery-grid">
            
            <?php 
            // Melakukan perulangan otomatis dari data di atas (Logika PHP Dasar)
            foreach ($data_gallery as $item) { 
            ?>
            <div class="gallery-item">
                <div class="gallery-placeholder" style="height: <?php echo $item['tinggi']; ?>; background: <?php echo $item['warna']; ?>;"></div>
                
                <div class="gallery-desc">
                    <strong><?php echo $item['judul']; ?></strong><br>
                    <span class="gallery-tag"><?php echo $item['tag']; ?></span>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>

    <footer class="footer-tag">
        Responsi Praktikum Pemweb © 2026 
    </footer>

</body>
</html>