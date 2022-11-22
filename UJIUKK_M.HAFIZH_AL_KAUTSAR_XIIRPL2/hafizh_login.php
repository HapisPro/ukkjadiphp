<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        overflow: hidden;
    }

    .formcont {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tablecont {
        width: 30%;
        height: 40%;
    }

    .tablecont .form {
        width: 100%;
        padding: 3px;
    }
    </style>
</head>

<body>
    <form action="" method="POST" class="formcont">
        <table class="tablecont">
            <tr>
                <td style="text-align: center">
                    <h1>Login</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nik" placeholder="NIK" class="form">
                </td>
            </tr>

            <tr>
                <td>
                    <input type=" text" name="nama" placeholder="Nama Lengkap" class="form">
                </td>
            </tr>

            <tr>
                <td style="padding-top: 10px; display: flex; justify-content: space-between">
                    <input type="submit" name="regist" value="Saya Pengguna Baru" style="padding: 3px 10px;">
                    <input type="submit" name="login" value="Masuk" style="padding: 3px 10px;">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<!-- HTML PHP BREAK -->

<?php
// REGISTRASI
if (isset($_POST['regist'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    if ($nik == "" || $nama == "") {
        echo '<script>alert("Data tidak boleh kosong!")</script>';
    } else {
        // Write data
        $text = $nik . "," . $nama . "\n";
        $write = fopen('config.txt', 'a+');

        if (fwrite($write, $text)) {
            echo '<script>alert("Anda berhasil mendaftar!")</script>';
        }
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $data = file_get_contents('config.txt');
    $contents = explode("\n", $data);
    $error = false;

    foreach ($contents as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];

        if ($_POST['nik'] == "" || $_POST['nama'] == "") {
            echo '<script>alert("Data tidak boleh kosong!");</script>';
            return;
        } else if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location: pages/hafizh_home.php');
        } else {
            $error = true;
        }
    }
    if ($error) {
        echo '<script>alert("Login gagal!");</script>';
    }
}

?>