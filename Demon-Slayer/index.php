<?php 
// p p apaa
$page = 'dashboard'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Demon Slayer Dashboard</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body class="theme-default" id="body-bg">
    <div id="power-overlay"></div>

    <?php 
    // Memanggil menu navigasi yang ada di folder includes
    include('includes/navbar.php'); 
    ?>

    <div class="container">
        
        <!-- Bagian Bawah: Layout Pengenalan Karakter Interaktif -->
        <div class="dashboard-layout">
            
            <!-- Sisi Kiri: Menu Tombol Pilihan Karakter -->
            <div class="sidebar-chars" style="max-height: 600px; overflow-y: auto;">
                
                <!-- Kategori Karakter Utama -->
                <h3 style="font-size: 11pt; margin-bottom: 15px; color: rgba(255,255,255,0.7); letter-spacing: 0.5px;">KARAKTER UTAMA:</h3>
                <button class="char-btn" onclick="changeCharTheme('tanjiro_nezuko')">🎴 Tanjiro & Nezuko Kamado</button>
                <button class="char-btn" onclick="changeCharTheme('zenitsu_inosuke')">⚡ Zenitsu & Inosuke 🐗</button>

                <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 15px 0;">

                <!-- Kategori Hashira (Ranked) -->
                <h3 style="font-size: 11pt; margin-bottom: 15px; color: rgba(255,255,255,0.7); letter-spacing: 0.5px;">ARSIP KORPS (RANKED):</h3>
                <button class="char-btn" onclick="changeCharTheme('gyomei')">🪨 1. Gyomei Himejima</button>
                <button class="char-btn" onclick="changeCharTheme('sanemi')">🌪️ 2. Sanemi Shinazugawa</button>
                <button class="char-btn" onclick="changeCharTheme('muichiro')">🌫️ 3. Muichiro Tokito</button>
                <button class="char-btn" onclick="changeCharTheme('giyu')">🌊 4. Giyu Tomioka</button>
                <button class="char-btn" onclick="changeCharTheme('obanai')">🐍 5. Obanai Iguro</button>
                <button class="char-btn" onclick="changeCharTheme('rengoku')">🔥 6. Kyojuro Rengoku</button>
                <button class="char-btn" onclick="changeCharTheme('mitsuri')">💖 7. Mitsuri Kanroji</button>
                <button class="char-btn" onclick="changeCharTheme('tengen')">🔊 8. Tengen Uzui</button>
                <button class="char-btn" onclick="changeCharTheme('shinobu')">🦋 9. Shinobu Kocho</button>
                <button class="char-btn" onclick="changeCharTheme('kanao')">🌸 10. Kanao Tsuyuri (Bonus)</button>
                
                <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 15px 0;">
                
                <!-- Kategori Iblis Bulan (Ranked) -->
                <h3 style="font-size: 11pt; margin-bottom: 15px; color: rgba(255,255,255,0.7); letter-spacing: 0.5px;">ARSIP IBLIS (RANKED):</h3>
                <button class="char-btn" onclick="changeCharTheme('muzan')">🩸 1. Muzan Kibutsuji (Raja)</button>
                <button class="char-btn" onclick="changeCharTheme('kokushibo')">🌙 2. Kokushibo (UM 1)</button>
                <button class="char-btn" onclick="changeCharTheme('doma')">❄️ 3. Doma (UM 2)</button>
                <button class="char-btn" onclick="changeCharTheme('akaza')">🧭 4. Akaza (UM 3)</button>
                <button class="char-btn" onclick="changeCharTheme('hantengu')">🎭 5. Hantengu (UM 4)</button>
                <button class="char-btn" onclick="changeCharTheme('gyokko')">🏺 6. Gyokko (UM 5)</button>
                <button class="char-btn" onclick="changeCharTheme('gyutaro')">🪃 7. Gyutaro & Daki (UM 6)</button>
                <button class="char-btn" onclick="changeCharTheme('nakime')">🪕 Nakime (Bonus UM)</button>
                <button class="char-btn" onclick="changeCharTheme('enmu')">🚂 Enmu (LM 1)</button>

                <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 15px 0;">
                <button class="char-btn" onclick="changeCharTheme('default')">✨ Reset Aura Web</button>
            </div>

            <!-- Sisi Kanan: Wadah Cerita Detail Karakter (Scrollable Scroller) -->
            <div class="story-scroller" id="story-display">
                <h2 id="char-title">Arsip Korps Utama</h2>
                <div id="char-body">
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Silakan klik salah satu tombol pilar di panel sebelah kiri untuk memuat visualisasi aura, elemen pernapasan, serta dokumen latar belakang cerita mendalam mereka secara dinamis berdasarkan urutan peringkat kekuatan.</p>
                            <p style="color: rgba(255,255,255,0.3); font-style: italic; margin-top: 20px;">*Catatan: Setiap karakter memiliki representasi warna aura unik yang berbeda saat diaktifkan.*</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/karakter.png" alt="Preview Karakter" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bagian Atas: Cerita Pembuka (Teks tetap sama) -->
        <div class="glass-card">
            <h2>Alur Cerita Utama (Arc Overview)</h2>
            <h3>Mengarungi Takdir Berdarah: Perjalanan Tanjiro Kamado</h3>
            <p>Inilah kisah tentang Tanjiro Kamado, seorang pemuda berhati tulus yang hidupnya hancur dalam semalam. Di tengah sunyinya musim dingin dan hamparan salju yang putih, takdir membawa sebilah belati kejam ke dalam hidupnya. Bau anyir darah menyengat udara saat Tanjiro mendapati seluruh keluarganya telah dibantai tanpa ampun oleh Raja Iblis, Muzan Kibutsuji.</p>
            <p>Satu-satunya yang tersisa hanyalah adiknya, Nezuko. Namun, tubuh Nezuko telah mendingin, taringnya memanjang, dan matanya menatap penuh rasa lapar yang liar. Ia telah menjelma menjadi iblis. Di tengah badai salju dan keputusasaan yang mengekcekik, sebuah sumpah mati lahir dari lubuk hati Tanjiro: ia akan membawa adiknya kembali menjadi manusia, dan ia akan menebas leher mahluk yang bertanggung jawab atas tragedi ini, seberapapun hancurnya tubuhnya nanti.</p>
            <h3>Api Tekad di Balik Tebasan Pedang</h3>
            <p>Dua tahun latihan neraka di bawah bimbingan Sakonji Urokodaki menempa jemari lembut Tanjiro menjadi sekeras baja. Setiap tetes keringat dan ayunan pedangnya adalah doa untuk kesembuhan Nezuko. Hingga akhirnya, dengan seragam hitam Korps Pembasmi Iblis dan jubah bermotif papan catur hijau-hitam, ia melangkah ke dalam kegelapan malam untuk memulai perburuannya.</p>
            <p>Perjalanan ini tidak ia lalui sendirian. Takdir mempertemukannya dengan Zenitsu Agatsuma, pemuda penakut yang mampu membelah petir saat kehilangan kesadaran, serta Inosuke Hashibira, pemuda liar bertopeng babi hutan yang bertarung dengan insting binatang murni. Bersama-sama, mereka merangkak dari satu pertempuran maut ke pertempuran lainnya.</p>
            <p>Tragedi kembali mengetuk pintu saat mereka ditugaskan di atas Kereta Api Mugen. Di sana, mereka berdiri di bawah bayang-bayang Kyojuro Rengoku, sang Flame Hashira yang karismatik dan hangat bagaikan matahari. Namun, kemunculan tiba-tiba Akaza, Iblis Bulan Atas Tiga, mengubah malam menjadi ladang pembantaian. Tanjiro dipaksa menyaksikan dengan mata kepalanya sendiri bagaimana dada Rengoku hancur tertembus tangan iblis. Sebelum fajar merenggut nyawanya, Rengoku membisikkan pesan terakhir yang membakar jiwa mereka:</p>
            <p>"Busungkan dadamu. Teruslah melangkah maju, bahkan jika kamu terluka oleh kelemahanmu sendiri."</p>
            <h3>Keajaiban yang Memicu Genderang Perang</h3>
            <p>Setiap langkah berikutnya menuntut bayaran yang semakin mahal. Di bawah gemerlapnya Distrik Hiburan Yoshiwara, hingga kepulan asap di Desa Penempa Pedang, Tanjiro dan para pembasmi iblis dipaksa melampaui batas kemanusiaan mereka. Tulang-tulang patah, darah dimuntahkan, dan teknik legendaris Hinokami Kagura (Tarian Dewa Api) harus terus dikerahkan demi menumbangkan para Iblis Bulan Atas yang tak terkalahkan selama ratusan tahun.</p>
            <p>Hingga di ujung malam yang paling melelahkan di Desa Penempa Pedang, sebuah keajaiban yang mustahil terjadi. Saat fajar menyingsing dan mulai membakar kulit Nezuko, sebuah pilihan kejam harus diambil. Namun, di luar dugaan, Nezuko justru berhasil menaklukkan sinar matahari. Kulitnya tidak hancur menjadi abu; ia berdiri tersenyum di bawah terik siang.</p>
            <p>Kemenangan yang mengharukan ini seketika berubah menjadi lonceng kematian yang paling nyaring. Di sudut kegelapan yang pekat, Muzan Kibutsuji tertawa gila. Iblis yang telah hidup seribu tahun itu kini tahu, mahluk yang ia butuhkan untuk mencapai keabadian sempurna berada di depan mata. Perang total tidak bisa lagi dihindari.</p>
            <h3>Labirin Tanpa Akhir: Awal dari Akhir</h3>
            <p>Suasana berubah menjadi persiapan yang mencekam. Seluruh anggota Korps Pembasmi Iblis, dari prajurit terendah hingga para Hashira, melebur dalam latihan masif yang menguras raga. Atmosfer begitu berat, seolah semua orang tahu bahwa malam yang akan datang adalah malam terakhir bagi sebagian besar dari mereka.</p>
            <p>Dan malam itu benar-benar datang tanpa peringatan. Muzan menyusup langsung ke jantung Korps, memicu ledakan dahsyat yang menghancurkan kediaman pemimpin mereka, Kagaya Ubuyashiki. Perang terbuka resmi pecah.</p>
            <p>Klank!</p>
            <p>Suara petikan senar biwa menggema, memutarbalikkan gravitasi dan meruntuhkan realitas. Lantai di bawah kaki para pembasmi iblis runtuh. Tanjiro, Zenitsu, Inosuke, dan seluruh Hashira terlempar jatuh ke dalam labirin tak berujung yang mengerikan: Infinity Castle (Kastil Tak Terbatas).</p>
            <p>Di sekeliling mereka, ruangan berputar, dinding-dinding bergeser, dan aura membunuh dari para Iblis Bulan Atas terkuat mengepung dari segala penjuru. Di dasar kastil itu, Muzan menunggu dengan tatapan sedingin es, siap melumat habis seluruh umat manusia yang tersisa.</p>
            <h3>Rahasia Takdir</h3>
            <p>Kini, seluruh harapan manusia berada di ujung bilah pedang yang retak. Terjebak di dalam labirin ilusi yang mematikan, terpisah satu sama lain, dan dikepung oleh iblis-iblis paling haus darah dalam sejarah...</p>
            <p>Akanya tebasan pedang Tanjiro dan pengorbanan para Hashira mampu menjangkau leher sang Raja Iblis sebelum fajar tiba, ataukah Kastil Tak Terbatas ini akan menjadi kuburan massal bagi seluruh harapan manusia yang tersisa?</p>
        </div>

   

        <div class="glass-card" style="margin-top: 30px;">
              <h2 style="text-align: center; margin-bottom: 25px;">Pemimpin Korps: Klan Ubuyashiki</h2>
            
              <div style="text-align: center; margin-bottom: 30px;">
                  <img src="char/ubuyashiki.jpg" alt="Keluarga Ubuyashiki" style="max-width: 100%; width: 600px; height: auto; border-radius: 12px; filter: drop-shadow(0 6px 15px rgba(0,0,0,0.6)); border: 1px solid rgba(255,255,255,0.1);">
              </div>

              <h3>Kutukan Darah 1000 Tahun</h3>
              <p>Jauh sebelum Korps Pembasmi Iblis dibentuk, sebuah tragedi besar menimpa garis keturunan keluarga Ubuyashiki. Ribuan tahun yang lalu, dari rahim keluarga inilah lahir sesosok monster yang akan membawa petaka bagi umat manusia: <strong>Muzan Kibutsuji</strong>. Sebagai hukuman karmik karena telah melahirkan iblis pertama ke dunia, alam semesta mengutuk seluruh keturunan klan Ubuyashiki.</p>
              <p>Setiap anak yang lahir dalam keluarga ini membawa penyakit bawaan yang aneh dan mematikan. Bayi-bayi mereka sering kali meninggal tak lama setelah dilahirkan. Untuk menyelamatkan garis keturunan mereka dari kepunahan total, para pendeta memberi petunjuk mutlak: mereka harus mendedikasikan seluruh sisa hidup dan keturunan mereka untuk memburu serta memusnahkan Muzan Kibutsuji.</p>
            
              <h3>Membangun Korps Pembasmi Iblis</h3>
              <p>Sebagai bentuk penebusan dosa darah tersebut, klan Ubuyashiki menggunakan kekayaan dan pengaruh rahasia mereka untuk mendirikan dan mendanai penuh <strong>Demon Slayer Corps (Korps Pembasmi Iblis)</strong>. Meskipun para pemimpin klan (yang dipanggil "Oyakata-sama") tidak memiliki kekuatan fisik untuk mengayunkan pedang, mereka dianugerahi intuisi masa depan yang sangat tajam untuk memimpin peperangan dari balik layar.</p>
            
              <h3>Kagaya Ubuyashiki dan Pengorbanan Suci</h3>
              <p>Bahkan dengan segala upaya mulia tersebut, kutukan darah itu tidak pernah benar-benar hilang. Para pria dari keluarga Ubuyashiki dikutuk untuk tidak akan pernah bisa hidup melewati usia 30 tahun. Tubuh mereka akan membusuk secara perlahan seiring berjalannya waktu, membuat mereka kehilangan penglihatan dan kemampuan bergerak.</p>
              <p>Kagaya Ubuyashiki, pemimpin ke-97 dari Korps Pembasmi Iblis, memikul beban ini dengan senyuman dan kelembutan luar biasa. Ia menganggap setiap anggota korps sebagai "anak-anaknya" yang berharga dan selalu mengingat setiap nama pedang yang telah patah di medan perang. Di bawah kepemimpinannya lah, takdir manusia dan iblis pada akhirnya akan mencapai titik darah penghabisan yang paling menentukan dalam sejarah.</p>
        </div>
    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Shift C - 2026 
    </footer>

    <!-- Logika Interaktif JS -->
    <script>
        function changeCharTheme(char) {
            var bodyBg = document.getElementById('body-bg');
            var title = document.getElementById('char-title');
            var body = document.getElementById('char-body');
            var scroller = document.getElementById('story-display');

            bodyBg.className = ''; 
            scroller.scrollTop = 0;

            // --- KATEGORI KARAKTER UTAMA ---
            if (char === 'tanjiro_nezuko') {
                bodyBg.classList.add('theme-kamado');
                title.innerText = "Duo Kamado: Tanjiro & Nezuko";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Kisah ini berpusat pada ikatan darah yang tak terpatahkan antara Tanjiro Kamado dan adiknya yang telah berubah menjadi iblis, Nezuko. Tanjiro adalah pendekar berhati lembut yang mewarisi teknik legendaris Hinokami Kagura (Pernapasan Matahari).</p>
                            <p>Nezuko menggunakan Kekuatan Darah Iblis berupa api merah muda (Blood Demon Art: Exploding Blood) yang hanya membakar iblis dan racun mereka. Kombinasi mereka menjadikan mereka ancaman terbesar bagi Muzan Kibutsuji.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/tanjiro-nezuko.png" alt="Tanjiro dan Nezuko" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'zenitsu_inosuke') {
                bodyBg.classList.add('theme-kamaboko');
                title.innerText = "Duo Petarung Liar: Zenitsu & Inosuke";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Dua rekan seperjuangan Tanjiro. Zenitsu Agatsuma adalah pemuda penakut yang saat tertidur lelap berubah menjadi petarung secepat kilat (Pernapasan Petir).</p>
                            <p>Inosuke Hashibira dibesarkan oleh babi hutan dan menciptakan Pernapasan Hewan Buas (Beast Breathing). Ia bertarung menggunakan dua pedang bergerigi dengan insting binatang dan fleksibilitas ekstrem.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/zenitsu-inosuke.png" alt="Zenitsu dan Inosuke" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }

            // --- KATEGORI HASHIRA ---
            else if (char === 'gyomei') {
                bodyBg.classList.add('theme-gyomei');
                title.innerText = "Pilar Batu: Gyomei Himejima (Rank 1)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Gyomei Himejima adalah Stone Hashira (Pilar Batu) sekaligus pilar tertua dan terkuat. Meskipun buta sejak kecil, insting bertarung dan kesadaran spasialnya melampaui batas manusia normal.</p>
                            <p>Berbeda dari pilar lain, ia bertarung menggunakan kapak besar berantai yang terhubung dengan bola besi berduri. Kekuatan fisiknya yang luar biasa sanggup menahan gempuran langsung dari Upper Moon 1.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/gyomei.png" alt="Gyomei Himejima" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'sanemi') {
                bodyBg.classList.add('theme-sanemi');
                title.innerText = "Pilar Angin: Sanemi Shinazugawa (Rank 2)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Sanemi Shinazugawa adalah Wind Hashira (Pilar Angin) yang memiliki gaya bertarung luar biasa agresif, brutal, dan tanpa ampun. Tubuhnya dipenuhi bekas luka pertempuran.</p>
                            <p>Sanemi memiliki darah langka khusus (Marechi) yang sangat pekat, yang mampu membuat iblis mabuk dan kehilangan fokus hanya dengan mencium baunya.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/sanemi.png" alt="Sanemi Shinazugawa" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'muichiro') {
                bodyBg.classList.add('theme-muichiro');
                title.innerText = "Pilar Kabut: Muichiro Tokito (Rank 3)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Muichiro Tokito adalah Mist Hashira (Pilar Kabut) yang merupakan seorang jenius muda ajaib. Ia merupakan keturunan langsung dari pengguna Pernapasan Matahari pertama, dan menduduki posisi Hashira hanya dalam waktu 2 bulan.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/muichiro.png" alt="Muichiro Tokito" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'giyu') {
                bodyBg.classList.add('theme-giyu');
                title.innerText = "Pilar Air: Giyu Tomioka (Rank 4)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Giyu Tomioka adalah Water Hashira (Pilar Air) yang dikenal dingin, tenang, dan irit bicara. Ia merupakan pembasmi iblis pertama yang menemui Tanjiro.</p>
                            <p>Giyu menguasai seluruh 10 bentuk asli Pernapasan Air dan menciptakan bentuk ke-11 bernama "Dead Calm" (Ketenangan Mutlak).</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/giyu.png" alt="Giyu Tomioka" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            } 
            else if (char === 'obanai') {
                bodyBg.classList.add('theme-obanai');
                title.innerText = "Pilar Ular: Obanai Iguro (Rank 5)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Obanai Iguro adalah Serpent Hashira (Pilar Ular) yang sangat ketat pada aturan. Menggunakan pedang meliuk-liuk yang unik, tebasannya dapat berbelok ke arah yang tidak terduga, mirip gerakan ular.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/obanaii.png" alt="Obanai Iguro" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'rengoku') {
                bodyBg.classList.add('theme-rengoku');
                title.innerText = "Pilar Api: Kyojuro Rengoku (Rank 6)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Kyojuro Rengoku adalah Flame Hashira (Pilar Api) yang memiliki semangat membara, kepribadian yang ceria, serta rasa keadilan yang luar biasa tinggi. Ia bertarung menggunakan Pernapasan Api berdaya hancur masif.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/rengoku.png" alt="Kyojuro Rengoku" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            } 
            else if (char === 'mitsuri') {
                bodyBg.classList.add('theme-mitsuri');
                title.innerText = "Pilar Cinta: Mitsuri Kanroji (Rank 7)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Mitsuri Kanroji adalah Love Hashira (Pilar Cinta) yang memiliki kondisi genetik otot 8 kali lipat dari manusia biasa. Di balik penampilannya yang anggun, ia memiliki kekuatan fisik mentah yang luar biasa besar dan pedang yang fleksibel.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/mitsuri.png" alt="Mitsuri Kanroji" style="max-width: 230px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'tengen') {
                bodyBg.classList.add('theme-tengen');
                title.innerText = "Pilar Suara: Tengen Uzui (Rank 8)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Tengen Uzui adalah Sound Hashira (Pilar Suara) sekaligus mantan Shinobi. Ia mengandalkan kecepatan fisik yang luar biasa, taktik penyamaran, bom anti-iblis, dan teknik analisis pertarungan "Skor Musik".</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/tengen.png" alt="Tengen Uzui" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'shinobu') {
                bodyBg.classList.add('theme-shinobu');
                title.innerText = "Pilar Serangga: Shinobu Kocho (Rank 9)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Shinobu Kocho adalah Insect Hashira (Pilar Serangga). Karena tubuh fisiknya yang kecil, ia adalah satu-satunya Hashira yang tidak bisa memenggal kepala iblis, namun ia menutupinya dengan pedang sengat penyuntik racun bunga Wisteria.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/shinobu.png" alt="Shinobu Kocho" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            else if (char === 'kanao') {
                bodyBg.classList.add('theme-kanao');
                title.innerText = "Kandidat Pilar Bunga: Kanao Tsuyuri (Bonus)";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Kanao Tsuyuri adalah Tsuguko (penerus resmi) dari Pilar Serangga, sekaligus pewaris Pernapasan Bunga. Ia memiliki penglihatan super yang memungkinkannya membaca gerakan otot musuh secara presisi.</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/kanao.png" alt="Kanao Tsuyuri" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
            
            // --- KATEGORI IBLIS BULAN ---
           // --- KATEGORI IBLIS BULAN ---
            else if (char === 'muzan') {
                bodyBg.classList.add('theme-muzan');
                title.innerText = "Raja Iblis: Muzan Kibutsuji";
                body.innerHTML = `
                    <div>
                        <p>Muzan Kibutsuji adalah Raja Iblis, leluhur dari segala iblis yang telah hidup selama lebih dari 1000 tahun. Darahnya adalah kutukan yang dapat mengubah manusia menjadi monster pemakan daging.</p>
                        <p>Ia kejam, narsistik, dan terobsesi dengan kesempurnaan abadi. Kekuatannya berada di dimensi yang sama sekali berbeda; tubuhnya dipenuhi organ ganda dan tentakel pembunuh berduri racun mematikan yang tak bisa dihancurkan secara konvensional, menjadikannya anomali absolut dalam alam semesta.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/muzan.png" alt="Muzan Kibutsuji" style="max-width: 300px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'kokushibo') {
                bodyBg.classList.add('theme-kokushibo');
                title.innerText = "Iblis Bulan Atas 1: Kokushibo";
                body.innerHTML = `
                    <div>
                        <p>Kokushibo menduduki peringkat Upper Moon 1, menjadikannya iblis terkuat kedua setelah Muzan. Di masa lalu, ia adalah saudara kembar dari pencipta Pernapasan Matahari (Yoriichi), yang rela mengubah wujudnya menjadi iblis demi mengalahkan sang adik.</p>
                        <p>Kokushibo menguasai Pernapasan Bulan (Moon Breathing) yang dipadukan dengan Kekuatan Darah Iblis. Serangan pedangnya yang terbuat dari dagingnya sendiri memancarkan bilah-bilah sabit bulan mematikan yang tidak bisa dihindari dengan mudah.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/kokushibo.png" alt="Kokushibo" style="max-width: 300px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'doma') {
                bodyBg.classList.add('theme-doma');
                title.innerText = "Iblis Bulan Atas 2: Doma";
                body.innerHTML = `
                    <div>
                        <p>Doma (Upper Moon 2) adalah pemimpin sekte aliran sesat yang psikopat, nir-emosi, dan gemar memangsa wanita muda pengikutnya. Di balik senyumannya yang palsu, Doma adalah pembunuh mematikan yang menjadi musuh bebuyutan Shinobu Kocho.</p>
                        <p>Seni Darah Iblis miliknya berbasis es kriogenik (Cryokinesis). Bubuk es yang disebarkannya melalui dua kipas emas sangat mematikan karena dapat merobek dan membekukan paru-paru pembasmi iblis jika terhirup, menjadikan teknik pernapasan mustahil digunakan melawannya.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/doma.png" alt="Doma" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'akaza') {
                bodyBg.classList.add('theme-akaza');
                title.innerText = "Iblis Bulan Atas 3: Akaza";
                body.innerHTML = `
                    <div>
                        <p>Akaza (Upper Moon 3) membenci orang lemah, namun menaruh rasa hormat yang teramat tinggi kepada manusia yang kuat. Ia adalah petarung bela diri murni yang mengandalkan kekuatan fisik mentah dan kecepatan regenerasi absolut.</p>
                        <p>Seni Darah Iblis "Destructive Death" miliknya menciptakan kompas salju di bawah kakinya untuk mendeteksi semangat bertarung (battle spirit) musuh, membuat serangannya mengunci target dengan akurasi mematikan.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/akaza.png" alt="Akaza" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'hantengu') {
                bodyBg.classList.add('theme-hantengu');
                title.innerText = "Iblis Bulan Atas 4: Hantengu";
                body.innerHTML = `
                    <div>
                        <p>Hantengu (Upper Moon 4) tampak seperti kakek penakut, namun ini adalah tipuannya. Setiap kali lehernya ditebas, ia tidak mati, melainkan membelah diri menjadi manifestasi iblis yang mewakili emosinya: Kemarahan, Kesedihan, Kegembiraan, dan Kesenangan.</p>
                        <p>Dalam kondisi terdesak, kloning emosinya bergabung menjadi naga kayu bernama Zohakuten (Kebencian) yang luar biasa destruktif, sementara tubuh aslinya menyusut dan bersembunyi.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/hantengu.png" alt="Hantengu" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'gyokko') {
                bodyBg.classList.add('theme-gyokko');
                title.innerText = "Iblis Bulan Atas 5: Gyokko";
                body.innerHTML = `
                    <div>
                        <p>Gyokko (Upper Moon 5) adalah iblis eksentrik berwujud mengerikan dengan mata dan mulut yang letaknya tertukar. Ia terobsesi dengan seni dan menganggap mayat manusia buatannya adalah mahakarya.</p>
                        <p>Gyokko menggunakan Seni Darah Iblis manipulasi ruang untuk berpindah secara instan di antara guci-gucinya. Serangannya berbasis air, racun, dan monster laut.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/gyokko.png" alt="Gyokko" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            } 
            else if (char === 'gyutaro') {
                bodyBg.classList.add('theme-gyutaro');
                title.innerText = "Iblis Bulan Atas 6: Gyutaro & Daki";
                body.innerHTML = `
                    <div>
                        <p>Daki dan kakaknya Gyutaro berbagi satu posisi. Daki menggunakan selendang obi tajam dan menyamar sebagai Oiran tingkat tinggi di Distrik Hiburan (Yoshiwara).</p>
                        <p>Ancaman sesungguhnya adalah sang kakak, Gyutaro, yang bertarung menggunakan sabit darah ganda berbisa fatal. Selama kedua kepala kakak beradik ini tidak ditebas bersamaan, mereka tidak akan pernah mati.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/gyutaro-daki.png" alt="Gyutaro dan Daki" style="max-width: 300px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            }
            else if (char === 'nakime') {
                bodyBg.classList.add('theme-nakime');
                title.innerText = "Pengendali Kastil: Nakime (Bonus)";
                body.innerHTML = `
                    <div>
                        <p>Awalnya bertugas sebagai pemanggil Muzan, Nakime kemudian dipromosikan menjadi Upper Moon 4 menggantikan Hantengu. Ia adalah iblis misterius bermata satu yang selalu memegang alat musik Biwa.</p>
                        <p>Seni Darah Iblisnya adalah inti dari Infinity Castle (Kastil Tak Terbatas). Hanya dengan memetik senar Biwa-nya, ia mampu mengubah gravitasi, memanipulasi tata letak ruangan, dan memindahkan siapa pun di dalam kastil dalam sekejap mata.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/nakime.png" alt="Nakime" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            }
            else if (char === 'enmu') {
                bodyBg.classList.add('theme-enmu');
                title.innerText = "Iblis Bulan Bawah 1: Enmu";
                body.innerHTML = `
                    <div>
                        <p>Enmu adalah Lower Moon 1 (Iblis Bulan Bawah 1) dan satu-satunya iblis kelas bawah yang selamat dari pembantaian sepihak oleh Muzan karena sifat sadisnya yang menghibur sang Raja Iblis.</p>
                        <p>Ia menggunakan Seni Darah Iblis berbasis mimpi. Enmu menidurkan korbannya dan memberi mereka mimpi yang sangat indah, sementara pasukannya menyusup ke alam bawah sadar korban untuk menghancurkan inti spiritual mereka, membuat korban cacat mental permanen atau mati.</p>
                    </div>
                    <div style="text-align: center; margin-top: 25px;">
                        <img src="char/enmu.png" alt="Enmu" style="max-width: 220px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    </div>
                `;
            }

            // --- DEFAULT / RESET ---
            else {
                bodyBg.classList.add('theme-default');
                title.innerText = "Arsip Korps Utama";
                body.innerHTML = `
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <p>Silakan klik salah satu tombol pilar atau iblis di panel sebelah kiri untuk memuat visualisasi aura, latar belakang, dan dokumen cerita secara dinamis.</p>
                            <p style="color: rgba(255,255,255,0.3); font-style: italic; margin-top: 20px;">*Catatan: Setiap karakter memiliki representasi warna aura unik yang berbeda saat diaktifkan.*</p>
                        </div>
                        <div style="text-align: center;">
                            <img src="char/karakter.png" alt="Preview Karakter" style="max-width: 180px; height: auto; border-radius: 12px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                        </div>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>
