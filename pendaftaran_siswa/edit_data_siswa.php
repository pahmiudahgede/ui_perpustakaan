<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // Mengambil data dari formulir edit
    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];

    // Query untuk memperbarui data siswa
    $conn = getConn();
    $sql = "UPDATE siswa SET nama=?, alamat=?, jenis_kelamin=?, agama=? WHERE id_siswa=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $alamat, $jenis_kelamin, $agama, $id_siswa);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: index.php");
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
    header("Location: edit.php");
}
