<?php 
// Menandai halaman aktif untuk navigasi luar
$page = 'streaming'; 

// ========================================================================
// SIMULASI DATABASE VIDEO (Sudah ditambahkan link embed YouTube)
// ========================================================================
$data_video = [
    [
        "judul" => "Season 1: Kamado Tanjiro Risshi Arc",
        "deskripsi" => "Awal mula petualangan Tanjiro masuk ke Final Selection hingga pertempuran epik melawan Rui di Gunung Natagumo.",
        "video_url" => "https://www.youtube.com/embed/ZDDIPEySilc?si=PxuDEWooh0zoG8kC" // Ganti dengan link embed video kamu
    ],
    [
        "judul" => "Movie: Mugen Train",
        "deskripsi" => "Misi penyelidikan di dalam kereta bersama Flame Hashira Kyojuro Rengoku melawan Enmu dan Akaza.",
        "video_url" => "https://www.youtube.com/embed/dQw4w9WgXcQ" 
    ],
    [
        "judul" => "Season 2: Entertainment District Arc",
        "deskripsi" => "Misi penyamaran Tanjiro, Zenitsu, dan Inosuke bersama Sound Hashira Tengen Uzui di distrik hiburan melawan Daki & Gyutaro.",
        "video_url" => "https://www.youtube.com/embed/dQw4w9WgXcQ"
    ],
    [
        "judul" => "Season 3: Swordsmith Village Arc",
        "deskripsi" => "Perjalanan Tanjiro ke desa penempa rahasia untuk memperbaiki pedangnya, dan ancaman tiba-tiba dari Upper Moon 4 dan 5.",
        "video_url" => "https://www.youtube.com/embed/dQw4w9WgXcQ"
    ]
];

// Memecah array menjadi kelompok berisi 2 video agar pas dengan layout baris (row)
$video_rows = array_chunk($data_video, 2);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Streaming</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default">

    <?php 
    // Memanggil menu navigasi secara modular
    include('includes/navbar.php'); 
    ?>

    <div class="container">
        
        <div class="glass-card" style="text-align: center; margin-bottom: 40px;">
            <h2 style="margin-bottom: 5px;">Streaming Room</h2>
            <p style="margin-bottom: 0;">Pusat arsip rekaman misi dari setiap arc (Google Drive / YouTube Embed Integration).</p>
        </div>

        <div class="stream-grid">
            
            <?php 
            // Looping baris (Setiap baris berisi maksimal 2 video)
            foreach ($video_rows as $row) { 
                echo '<div class="stream-row">';
                
                // Looping kartu video di dalam baris tersebut
                foreach ($row as $video) {
            ?>
                    <div class="stream-card">
                        <div class="video-box" style="padding: 0; overflow: hidden;">
                            <iframe 
                                width="100%" 
                                height="100%" 
                                src="<?php echo $video['video_url']; ?>" 
                                title="<?php echo $video['judul']; ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        
                        <div class="stream-info">
                            <h3><?php echo $video['judul']; ?></h3>
                            <p><?php echo $video['deskripsi']; ?></p>
                        </div>
                    </div>
            <?php 
                } 
                echo '</div>'; // Tutup baris
            } 
            ?>

        </div>

    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb © 2026
    </footer>

</body>
</html>