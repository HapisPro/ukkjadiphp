<?php
session_start();

$user = $_SESSION['username'];
$datauser = "../data/user/$user.txt";

if (!file_exists($datauser)) {
    echo '<script>alert("Kamu Belum Mempunyai Catatan, Silakan mengisi data dahulu"); window.location = "hafizh_isidata.php";</script>';
} else {
    $file = fopen($datauser, "r");
}
?>

<!-- PHP HTML BREAK -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan perjalanan</title>
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

    .table {
        border: 1px solid black;
        margin: 2px auto;
    }

    .btncont {
        margin: 50px auto 0 auto;
    }

    th:hover {
        opacity: .5;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php"?>
        <table align="center" width="50%" class="table">
            <td>
                <a>Urutkan Berdasarkan</a>
                <select id="urut" onclick="urutkan(this)">
                    <option>Pilih</option>
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">Suhu</option>
                </select>
            </td>
        </table>
        <br>
        <table align="center" width="50%" height="40%" class="table">
            <td>
                <table align="center" width="90%" border="1" class="table" id="myTable">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                    <?php
while (($row = fgets($file)) != false) {
    $col = explode(',', $row);
    foreach ($col as $data) {
        echo "<td>" . trim($data) . "</td>";
    }
}
?>
                </table>

                <table align="center" width="90%" class="btncont">
                    <td align="right">
                        <a href="hafizh_isidata.php"><img src="../assets/add.png" alt="" width="40px"></a>
                    </td>
                </table>
            </td>
        </table>
    </div>
    <script src="main.js"></script>
</body>

</html>