<!DOCTYPE html>
<html>
<head>
    <title>Number Series</title>
</head>
<body>

<form method="get" action="">
    <label for="angka">Jumlah Angka:</label>
    <input type="text" name="angka" id="angka">
    <input type="submit" value="Tampilkan">
</form>

<?php
if (isset($_GET['angka'])) {
    $jumlah_angka = intval($_GET['angka']);

    for ($i = 0; $i < $jumlah_angka; $i++) {
        for ($j = 0; $j < $jumlah_angka - $i; $j++) {
            printf('%d', $j + 1);
        }
        echo '<br>';
    }
}
?>

</body>
</html>