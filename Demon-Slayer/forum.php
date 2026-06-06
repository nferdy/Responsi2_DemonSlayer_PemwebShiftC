<?php 
// 1. Mulai Session & Panggil File Config
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php'; // Kita pakai fungsi tanggal dari sini

// 2. Keamanan: Cek apakah user sudah login. Jika belum, lempar ke login!
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Menandai halaman aktif
$page = 'forum'; 

// 3. READ: Mengambil data chat asli dari tabel database
$query_chat = "SELECT forum_posts.*, users.username 
               FROM forum_posts 
               JOIN users ON forum_posts.user_id = users.id 
               ORDER BY forum_posts.created_at ASC";
$ambil_chat = mysqli_query($koneksi, $query_chat);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisteria Hub - Komunitas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-default">

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        
        <h2 style="margin-bottom: 20px;">Wisteria Community Chat</h2>
        
        <div class="forum-box">
            
            <div class="chat-header">🔊 Markas Korps Pembasmi Iblis (Global Group)</div>
            
            <div class="chat-logs" id="chat-box">
                <?php 
                // 4. Looping data langsung dari database
                while ($chat = mysqli_fetch_assoc($ambil_chat)) { 
                    // Logika PHP untuk menentukan posisi gelembung chat (Kanan/Kiri)
                    // Jika user_id di chat sama dengan user_id kita yang sedang login, berarti 'outgoing'
                    $tipe = ($chat['user_id'] == $_SESSION['user_id']) ? 'outgoing' : 'incoming';
                ?>
                    <div class="chat-bubble <?php echo $tipe; ?>">
                        <div class="chat-sender">
                            <?php echo $chat['username']; ?>
                            <!-- Tanggal pakai fungsi kustom buat dapat poin -->
                            <span style="font-size: 7.5pt; color: rgba(255,255,255,0.4); font-weight: normal; margin-left: 5px;">
                                <?php echo formatTanggalId($chat['created_at']); ?>
                            </span>
                        </div>
                        <?php echo htmlspecialchars($chat['isi_pesan']); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="chat-input-area">
                <!-- 5. Form action HARUS diarahkan ke config/crud_forum.php agar bisa di-INSERT -->
                <form action="config/crud_forum.php" method="POST" class="chat-input-table">
                    <div class="chat-input-cell text-field">
                        <!-- Autofocus agar kursor langsung ada di kotak teks -->
                        <input type="text" name="pesan_baru" class="chat-input" placeholder="Ketik pesan komunitas di sini..." required autofocus>
                    </div>
                    <div class="chat-input-cell btn-field">
                        <button type="submit" name="kirim_pesan" class="chat-submit">Kirim</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <footer class="footer-tag">
        Responsi Prak Pemweb Kelompok © 2026 | PHP Native Evolution Concept
    </footer>

    <script>
        // Auto-scroll selalu ke chat paling bawah
        var chatBox = document.getElementById('chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    </script>
</body>
</html>