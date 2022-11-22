<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php";?>
        <div class="textcont">
            <h1>Selamat datang <?php echo $_SESSION['username']; ?></h1>
        </div>
    </div>
</body>

</html>