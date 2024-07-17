<?php
include 'koneksi.php';

// Mendapatkan ID siswa dari URL
$id_siswa = $_GET['id'] ?? '';

if ($id_siswa) {
    $conn = getConn();

    // Menghapus data siswa dari tabel
    $sql = "DELETE FROM siswa WHERE id_siswa = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_siswa);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Set pesan berhasil dihapus
            echo "Data siswa berhasil dihapus.";
        } else {
            // Set pesan gagal menghapus
            echo "Gagal menghapus data siswa.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal mempersiapkan statement.";
    }

    mysqli_close($conn);
} else {
    echo "ID siswa tidak ditemukan.";
}

// Mengarahkan kembali ke halaman dashboard setelah selesai
header("Location: index.php");
