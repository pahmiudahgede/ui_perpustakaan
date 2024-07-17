<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar Siswa Baru</title>
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

        .radio-label {
            display: flex;
            align-items: center;
        }

        .radio-label input[type="radio"] {
            margin-right: 5px;
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
        <h1>Form Daftar Siswa Baru</h1>
        <form action="insert_data_siswa.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" rows="4" required></textarea>
            <div class="radio-label">
                <label>Jenis Kelamin:</label>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" required>
                <span>Laki-laki</span>
                <input type="radio" name="jenis_kelamin" value="Perempuan" required>
                <span>Perempuan</span>
            </div>
            <label for="agama">Agama:</label>
            <select name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Katolik">Katolik</option>
                <option value="Buddha">Buddha</option>
                <option value="Atheis">Atheis</option>
            </select>
            <label for="asal_sekolah">Asal Sekolah:</label>
            <input type="text" name="asal_sekolah" required>
            <button type="submit" name="submit">Daftar Siswa</button>
        </form>
    </div>
</body>

</html>