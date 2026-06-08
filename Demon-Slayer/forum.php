<?php 
// 1. Mulai Session & Panggil File Config
session_start();
require_once 'config/koneksii.php';
require_once 'config/functionss.php'; // Kita pakai fungsi tanggal dari sini

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
<body class="theme-default" style="
    background-image: url('img/bg4.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
">

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        
        <h2 style="margin-bottom: 20px;">Wisteria Community Chat</h2>
        
        <div class="forum-box">
            
            <div class="chat-header">🔊 Markas Korps Pembasmi Iblis (Global Group)</div>
            
            <div class="chat-logs" id="chat-box">
                <?php 
                // 4. Looping data langsung dari database
                while ($chat = mysqli_fetch_assoc($ambil_chat)) { 
                    // Logika penempatan bubble chat (Kanan/Kiri)
                    $tipe = ($chat['user_id'] == $_SESSION['user_id']) ? 'outgoing' : 'incoming';
                ?>
                    <div class="chat-bubble <?php echo $tipe; ?>" style="position: relative; padding-right: 35px;">
                        
                        <div class="chat-sender">
                            <?php echo $chat['username']; ?>
                            <span style="font-size: 7.5pt; color: rgba(255,255,255,0.4); font-weight: normal; margin-left: 5px;">
                                <?php echo formatTanggalId($chat['created_at']); ?>
                            </span>
                        </div>
                        
                        <?php echo htmlspecialchars($chat['isi_pesan']); ?>

                       <?php 
                        // ==========================================================
                        // LOGIKA TOMBOL HAPUS & EDIT
                        // ==========================================================
                        if ($_SESSION['role'] == 'admin' || $_SESSION['user_id'] == $chat['user_id']) { 
                        ?>
                            <div style="position: absolute; top: 10px; right: 10px; display: flex; gap: 8px;">
                                
                                <?php 
                                // Tombol EDIT (KHUSUS PEMILIK PESAN)
                                if ($_SESSION['user_id'] == $chat['user_id']) { 
                                    // Bersihkan kutip biar JS tidak error saat nangkep teks
                                    $pesan_aman = htmlspecialchars($chat['isi_pesan'], ENT_QUOTES);
                                ?>
                                    <button onclick="editPesan('<?php echo $chat['id']; ?>', '<?php echo $pesan_aman; ?>')" style="background: none; border: none; color: #ffeb3b; font-size: 11pt; cursor: pointer; padding: 0;" title="Edit Pesan">
                                        ✏️
                                    </button>
                                <?php } ?>

                                <form action="config/crud_forum.php" method="POST" style="margin: 0;">
                                    <input type="hidden" name="id_pesan" value="<?php echo $chat['id']; ?>">
                                    <button type="submit" name="hapus_pesan" onclick="return confirm('Hapus pesan ini dari arsip?');" style="background: none; border: none; color: #ff4d4d; font-size: 11pt; cursor: pointer; padding: 0;" title="Hapus Pesan">
                                        🗑️
                                    </button>
                                </form>

                            </div>
                        <?php } ?>

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
        Responsi Prak Pemweb Shift C - 2026 
    </footer>

    <script>
        // Auto-scroll selalu ke chat paling bawah
        var chatBox = document.getElementById('chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    </script>



<form id="form_edit" action="config/crud_forum.php" method="POST" style="display: none;">
        <input type="hidden" name="id_edit" id="edit_id">
        <input type="hidden" name="pesan_edit" id="edit_pesan">
        <input type="hidden" name="proses_edit" value="1">
    </form>

    <script>
        // Fungsi untuk mengedit pesan pakai Prompt bawaan browser
        function editPesan(id, pesanLama) {
            let pesanBaru = prompt("Edit pesan komunitas Anda:", pesanLama);
            
            // Jika user mengisi pesan baru dan tidak memencet 'Cancel'
            if (pesanBaru !== null && pesanBaru.trim() !== "") {
                // Masukkan data ke form tersembunyi
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_pesan').value = pesanBaru;
                // Kirim (Submit) form-nya secara otomatis
                document.getElementById('form_edit').submit();
            }
        }
    </script>
</body>
</html>
