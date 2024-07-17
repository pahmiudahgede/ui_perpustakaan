<?php
require 'mysql.php';
require 'global.php';
require 'templates/dashboard/header.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_all($result, MYSQLI_ASSOC)[0] ?? null;

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['auth'] = [
            'isLoggedIn' => true,
            'user' => [
                'id' => $user['id'],
                'nama' => $user['nama'],
                'username' => $user['username'],
            ]
        ];
        setFlash('alert', 'success', 'Anda berhasil login');
        return header("location: index.php");
    } else {
        setFlash('alert', 'danger', 'Gagal login, Silahkan coba lagi!');
    }
}

?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 pt-4 pt-lg-0 content d-flex flex-column justify-content-center">

            <div class="card text-bg-light">
                <div class="card-body p-5">
                    <?php require 'templates/alert.php' ?>
                    <h3 class="mb-3">Form Login</h3>

                    <?php require 'templates/alert.php'; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>

                        <hr class="d-block mt-4">
                        <button type="submit" name="submit" class="btn btn-primary py-3 d-block w-100 fw-bold mt-4">Masuk Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'mysql-footer.php';
require 'templates/dashboard/footer.php';
?>