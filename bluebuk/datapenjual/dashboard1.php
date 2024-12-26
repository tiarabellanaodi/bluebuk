<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpenjual.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Penjual</title>
</head>

<body>
    <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
    <a href="logout.php">Logout</a>
</body>

</html>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual</title>
</head>

<body>
    <header>
        <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
    </header>
    <main>
        <p>Ini adalah halaman dashboard penjual.</p>
    </main>
</body>

</html>