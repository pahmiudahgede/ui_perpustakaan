<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // Mengambil data dari formulir pendaftaran siswa baru
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Query untuk memasukkan data siswa baru ke dalam database
    $conn = getConn();
    $sql = "INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, asal_sekolah) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $alamat, $jenis_kelamin, $agama, $asal_sekolah);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: index.php"); // Redirect ke halaman utama setelah berhasil didaftarkan

        } else {
            echo "Gagal mengeksekusi query.";
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    } else {
        echo "Gagal mempersiapkan statement.";
        mysqli_close($conn);
    }
} else {
    header("Location: form_daftar_siswa_baru.php"); // Redirect kembali ke halaman form jika tidak ada data yang disubmit

}
