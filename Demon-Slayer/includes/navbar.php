<!-- Modern iOS Glassmorphism Navigation Bar -->
<nav class="glass-nav">
    <!-- Logika PHP pendek ini berfungsi agar menu yang sedang dibuka menyala (active) -->
    <a class="nav-item <?php echo ($page == 'dashboard') ? 'active' : ''; ?>" href="index.php">Dashboard</a>
    <a class="nav-item <?php echo ($page == 'gallery') ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
    <a class="nav-item <?php echo ($page == 'streaming') ? 'active' : ''; ?>" href="streaming.php">Streaming</a>
    <a class="nav-item <?php echo ($page == 'forum') ? 'active' : ''; ?>" href="forum.php">Forum</a>
    <a class="nav-item <?php echo ($page == 'account') ? 'active' : ''; ?>" href="account.php">Akun</a>
</nav>