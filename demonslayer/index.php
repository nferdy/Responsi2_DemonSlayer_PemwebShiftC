<?php 
// Variabel ini memberi tahu navbar.php bahwa kita sedang berada di halaman Dashboard
$page = 'dashboard'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Demon Slayer Dashboard</title>
    <!-- Memanggil CSS Global (Pastikan file css/style.css sudah kamu buat sebelumnya) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default" id="body-bg">

    <?php 
    // Memanggil menu navigasi yang ada di folder includes
    include('includes/navbar.php'); 
    ?>

    <div class="container">
        
        <!-- Bagian Atas: Cerita Pembuka -->
        <div class="glass-card">
            <h2>Alur Cerita Utama (Arc Overview)</h2>
            <p>Manga dan anime Demon Slayer menceritakan petualangan Kamado Tanjiro setelah seluruh keluarganya dibantai secara keji oleh Raja Iblis, Kibutsuji Muzan, dan adik perempuannya yang bernama Nezuko diubah menjadi iblis. Demi mengembalikan kemanusiaan adiknya dan membalaskan dendam keluarganya, Tanjiro memutuskan untuk berlatih keras dan bergabung ke dalam Korps Pembasmi Iblis rahasia.</p>
            <p>Perjalanan panjang ini membawa mereka melewati berbagai pertempuran hidup dan mati melawan para iblis bulan yang kuat, ditemani oleh rekan-rekan pembasmi lainnya serta dibimbing oleh para prajurit terkuat korps yang disebut sebagai Pilar (Hashira).</p>
        </div>

        <!-- Bagian Bawah: Layout Pengenalan Karakter Interaktif -->
        <div class="dashboard-layout">
            
            <!-- Sisi Kiri: Menu Tombol Pilihan Karakter -->
            <div class="sidebar-chars">
                <h3 style="font-size: 11pt; margin-bottom: 15px; color: rgba(255,255,255,0.7); letter-spacing: 0.5px;">ARSIP KORPS:</h3>
                <button class="char-btn" onclick="changeCharTheme('rengoku')">🔥 Kyojuro Rengoku</button>
                <button class="char-btn" onclick="changeCharTheme('giyu')">🌊 Giyu Tomioka</button>
                <button class="char-btn" onclick="changeCharTheme('akaza')">❄️ Akaza (Upper Moon 3)</button>
                <button class="char-btn" onclick="changeCharTheme('default')">✨ Reset Aura Web</button>
            </div>

            <!-- Sisi Kanan: Wadah Cerita Detail Karakter (Scrollable Scroller) -->
            <div class="story-scroller" id="story-display">
                <h2 id="char-title">Arsip Korps Utama</h2>
                <div id="char-body">
                    <p>Silakan klik salah satu tombol karakter di panel sebelah kiri untuk memuat visualisasi aura, elemen pernapasan, serta dokumen latar belakang cerita mendalam mereka secara dinamis.</p>
                    <p style="color: rgba(255,255,255,0.3); font-style: italic; margin-top: 20px;">*Catatan: Setiap karakter memiliki representasi background warna dan efek visual unik yang berbeda saat diaktifkan.*</p>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Kelompok © 2026 | PHP Native & Vanilla JS
    </footer>

    <!-- Logika Interaktif JS (Disatukan di bawah agar file index.php ini langsung bisa dicoba) -->
    <script>
        function changeCharTheme(char) {
            var bodyBg = document.getElementById('body-bg');
            var title = document.getElementById('char-title');
            var body = document.getElementById('char-body');
            var scroller = document.getElementById('story-display');

            // Reset background dan scroll ke atas otomatis saat ganti karakter
            bodyBg.className = ''; 
            scroller.scrollTop = 0;

            if (char === 'rengoku') {
                bodyBg.classList.add('theme-rengoku');
                title.innerText = "Pilar Api: Kyojuro Rengoku";
                body.innerHTML = `
                    <p>Kyojuro Rengoku adalah Flame Hashira (Pilar Api) yang memiliki semangat membara, kepribadian yang ceria, serta rasa keadilan yang luar biasa tinggi. Teknik Pernapasan Api miliknya mampu melumat iblis dengan serangan ofensif berdaya hancur masif.</p>
                    <p>Dalam peristiwa di Arc Mugen Train, ia sendirian memikul tanggung jawab besar untuk melindungi seluruh 200 penumpang kereta dari teror manipulasi mimpi Enmu. Ia bertarung habis-habisan hingga fajar menyingsing dalam duel maut satu-lawan-satu melawan Iblis Bulan Atas Ke-3, Akaza.</p>
                    <p>Meskipun tubuh fisiknya gugur dalam pertempuran legendaris tersebut, tekad apinya tidak pernah padam. Ia berhasil memenuhi janjinya pada sang ibu untuk melindungi yang lemah: tidak ada satu pun nyawa manusia atau pembasmi muda yang tewas di kereta malam itu. Kata-kata terakhirnya, "Setialah pada hatimu yang membara," menjadi pemicu pertumbuhan mental terbesar bagi Tanjiro, Nezuko, Zenitsu, dan Inosuke.</p>
                `;
            } 
            else if (char === 'giyu') {
                bodyBg.classList.add('theme-giyu');
                title.innerText = "Pilar Air: Giyu Tomioka";
                body.innerHTML = `
                    <p>Giyu Tomioka adalah Water Hashira (Pilar Air) yang dikenal dengan pembawaannya yang sangat dingin, tenang, dan irit bicara. Ia merupakan pembasmi iblis pertama yang ditemui oleh Tanjiro setelah tragedi pembantaian keluarganya di gunung bersalju.</p>
                    <p>Berbeda dengan pilar lain yang langsung mengeksekusi iblis tanpa ampun, Giyu adalah orang pertama yang melihat secercah harapan pada hubungan saudara Kamado. Ia memilih untuk menahan pedangnya, memercayai tekad Tanjiro, dan membiarkan Nezuko hidup dengan memasang bambu penyumbat mulutnya. Bahkan, Giyu mempertaruhkan nyawanya sendiri di hadapan pimpinan korps sebagai jaminan jika Nezuko sampai memakan manusia.</p>
                    <p>Giyu menguasai seluruh 10 bentuk asli Pernapasan Air dengan sempurna, bahkan ia berhasil menciptakan bentuk ke-11 miliknya sendiri yang bernama "Dead Calm" (Ketenangan Mutlak)—sebuah teknik pertahanan absolut yang mampu menetralkan segala bentuk serangan musuh menjadi hampa.</p>
                `;
            } 
            else if (char === 'akaza') {
                bodyBg.classList.add('theme-akaza');
                title.innerText = "Iblis Bulan Atas 3: Akaza";
                body.innerHTML = `
                    <p>Akaza menduduki posisi Upper Moon 3 (Iblis Bulan Atas 3) di bawah komando langsung Kibutsuji Muzan. Berbeda dengan iblis lain yang mengandalkan senjata magis atau racun, Akaza adalah seorang petarung bela diri murni yang mengandalkan kekuatan fisik mentah dan kecepatan regenerasi mutlak.</p>
                    <p>Ia memiliki kode kehormatan prajurit yang sangat unik: Akaza sangat membenci orang lemah, namun menaruh rasa hormat yang teramat tinggi kepada manusia yang kuat. Ia tidak ragu untuk menawarkan kehidupan abadi sebagai iblis kepada lawan bertarungnya yang tangguh, seperti yang ia lakukan saat berduel melawan Kyojuro Rengoku.</p>
                    <p>Kekuatan Darah Iblis miliknya dinamakan "Destructive Death", yang memungkinkan Akaza menciptakan visualisasi kompas salju di bawah kakinya untuk mendeteksi semangat bertarung (battle spirit) musuh, membuat setiap pukulan jarak jauhnya mengunci target dengan akurasi 100% tanpa celah.</p>
                `;
            } 
            else {
                bodyBg.classList.add('theme-default');
                title.innerText = "Arsip Korps Utama";
                body.innerHTML = `
                    <p>Silakan klik salah satu tombol karakter di panel sebelah kiri untuk memuat visualisasi aura, elemen pernapasan, serta dokumen latar belakang cerita mendalam mereka secara dinamis.</p>
                    <p style="color: rgba(255,255,255,0.3); font-style: italic; margin-top: 20px;">*Catatan: Setiap karakter memiliki representasi background warna dan efek visual unik yang berbeda saat diaktifkan.*</p>
                `;
            }
        }
    </script>
</body>
</html>