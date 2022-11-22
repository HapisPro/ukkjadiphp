<?php
session_start();
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];
    $nama = $_SESSION['username'];

    $text = "$tanggal , $jam , $lokasi ,$suhu </tr>\n";
    $file = "../data/user/$nama.txt";

    $dirname = dirname($file);

    if (!is_dir($dirname)) {
        mkdir($dirname, 0775, true);
    }

    if ($tanggal == "" || $jam == "" || $lokasi == "" || $suhu == "") {
        echo '<script>alert("Data tidak boleh kosong!");</script>';
        return;
    } else {
        $file_c = fopen($file, "a+");
        if (fwrite($file_c, $text)) {
            echo '<script>alert("Data Berhasil Di Simpan!");</script>';
        }
    }
}
?>

<!-- PHP HTML BREAK -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Data</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .textcont {
        width: 50%;
        height: 40%;
        padding: 5px;
        border: 1px solid black;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    td {
        padding: 10px 0;
    }

    input {
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php";?>
        <form action="" method="POST" class="textcont">
            <table width="70%">
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td><input type="time" name="jam"></td>
                </tr>
                <tr>
                    <td>Lokasi yang dikunjungi</td>
                    <td><input type="text" name="lokasi"></td>
                </tr>
                <tr>
                    <td>Suhu Tubuh</td>
                    <td><input type="text" name="suhu"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" name="simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>