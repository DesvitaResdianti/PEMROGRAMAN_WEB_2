<!DOCTYPE html>
<html>
<head>
    <title>Masukan lewat URL</title>
</head>
<body>

<?php
$angka = isset($_GET['angka']) ? intval($_GET['angka']) : 0;

for ($i = 0; $i < $angka; $i++) {
    for ($j = 0; $j < $angka - $i; $j++) {
        printf('%d', $j + 1);
    }
    echo '<br>';
}

?>

</body>
</html>