<?php 
// Menandai halaman aktif untuk navigasi luar
$page = 'gallery'; 

// ========================================================================
// SIMULASI DATABASE (Untuk Anak Backend)
// Nanti array ini tinggal diganti pakai fungsi mysqli_query() dari database
// ========================================================================
$data_gallery = [
    [
        "judul" => "Akaza - Iblis Bulan 3", 
        "tag" => "#Fanart", 
        "tinggi" => "250px", 
        "gambar" => "img/akaza.jpg"
    ],
    [
        "judul" => "Nezuko Moon Aesthetic", 
        "tag" => "#Wallpaper", 
        "tinggi" => "340px", 
        "gambar" => "img/nezuko.jpg"
    ],
    [
        "judul" => "Tanjiro As Gwe", 
        "tag" => "#Vector", 
        "tinggi" => "200px", 
        "gambar" => "img/tanjiro.jpg"
    ],
    [
        "judul" => "Inosuke mode brutal", 
        "tag" => "#Official", 
        "tinggi" => "280px", 
        "gambar" => "img/inosuke.jpg"
    ],
    [
        "judul" => "Mitsuri My Istri", 
        "tag" => "#Fanart", 
        "tinggi" => "300px", 
        "gambar" => "img/mitsuri.jpg"
    ],
    [
        "judul" => "Zenitsu Mode On Aktif", 
        "tag" => "#Villain", 
        "tinggi" => "220px", 
        "gambar" => "img/zenitsu.jpg"
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
<body class="theme-default" style="
    background-image: url('img/bg.png'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

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
    // Melakukan perulangan otomatis dari data di atas
    foreach ($data_gallery as $item) { 
    ?>
        <div class="gallery-item">
            <img src="<?php echo $item['gambar']; ?>" 
                alt="<?php echo $item['judul']; ?>" 
                style="height: <?php echo $item['tinggi']; ?>; width: 100%; object-fit: cover; display: block;">
        
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