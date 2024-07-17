<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .container h1,
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .action-btns {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selamat Datang di Website Pendaftaran Siswa</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum reiciendis quas amet sit similique magnam necessitatibus, exercitationem repellendus quisquam veritatis at fugit placeat nesciunt, numquam commodi quod fugiat doloribus qui?</p>

        <h2>Data Siswa</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Asal Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $conn = getConn();
                $sql = "SELECT id_siswa, nama, alamat, jenis_kelamin, agama, asal_sekolah FROM siswa";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_siswa'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['agama'] . "</td>";
                        echo "<td>" . $row['asal_sekolah'] . "</td>";
                        echo "<td class='action-btns'>";
                        echo "<a href='form_edit_data_siswa.php?id=" . $row['id_siswa'] . "' class='btn'>Edit</a>";
                        echo "<a href='delete_data_siswa.php?id=" . $row['id_siswa'] . "' class='btn' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data siswa</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <br>
        <a href="form_daftar_siswa_baru.php" class="btn">Tambah Siswa Baru</a>
    </div>
</body>

</html>