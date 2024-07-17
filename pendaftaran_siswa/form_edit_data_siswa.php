<?php
include 'koneksi.php';

// Mendapatkan ID siswa dari URL
$id_siswa = $_GET['id'] ?? '';

// Query untuk mendapatkan data siswa berdasarkan id_siswa
$conn = getConn();
$sql = "SELECT * FROM siswa WHERE id_siswa = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id_siswa);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $siswa = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    echo "Gagal mempersiapkan statement.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Form Edit Data Siswa</h1>
        <form action="edit_data_siswa.php" method="POST">
            <input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa']; ?>">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" rows="4"><?php echo $siswa['alamat']; ?></textarea>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin">
                <option value="Laki-laki" <?php echo ($siswa['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($siswa['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            <label for="agama">Agama:</label>
            <select name="agama">
                <option value="Islam" <?php echo ($siswa['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Kristen" <?php echo ($siswa['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                <option value="Hindu" <?php echo ($siswa['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Katolik" <?php echo ($siswa['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                <option value="Buddha" <?php echo ($siswa['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                <option value="Atheis" <?php echo ($siswa['agama'] == 'Atheis') ? 'selected' : ''; ?>>Atheis</option>
            </select>
            <button type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>