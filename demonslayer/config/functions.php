<?php
// ========================================================================
// FILE KUMPULAN FUNGSI CUSTOM (SYARAT 20 POIN ASPRAK)
// ========================================================================

/**
 * FUNCTION 1: Kalkulator Pangkat Berdasarkan Aktivitas Forum
 * Menghitung rank user berdasarkan jumlah pesan yang dikirim ke forum.
 */
function hitungRankKorps($jumlah_post) {
    if ($jumlah_post >= 50) {
        return "Hashira (Pilar)";
    } elseif ($jumlah_post >= 30) {
        return "Kinoe";
    } elseif ($jumlah_post >= 15) {
        return "Kanoe";
    } elseif ($jumlah_post >= 5) {
        return "Tsuchinoto";
    } else {
        return "Mizunoto (Pemula)";
    }
}

/**
 * FUNCTION 2: Format Tanggal Indonesia
 * Mengubah format datetime MySQL (2026-06-12 14:30:00) menjadi format bacaan rapi
 * Contoh output: "12 Juni 2026, 14:30 WIB"
 */
function formatTanggalId($datetime) {
    // Array nama bulan bahasa Indonesia
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    // Pecah datetime menjadi tanggal dan waktu
    $pecah_spasi = explode(' ', $datetime);
    $tanggal_lengkap = explode('-', $pecah_spasi[0]);
    $waktu = $pecah_spasi[1];
    
    // Ambil elemen tanggal
    $tgl = $tanggal_lengkap[2];
    $bln = (int)$tanggal_lengkap[1];
    $thn = $tanggal_lengkap[0];
    
    // Ambil jam dan menit saja dari waktu (H:i)
    $jam_menit = substr($waktu, 0, 5);
    
    return $tgl . ' ' . $bulan[$bln] . ' ' . $thn . ', ' . $jam_menit . ' WIB';
}
?>