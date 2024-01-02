<?php
// Membuat array multidimensi
$ASEAN = array(
    array("Negara" => "Indonesia", "Ibukota" => "D.K.I. Jakarta", "Kode Telepon" => '+62'),
    array("Negara" => "Singapura", "Ibukota" => "Singapura", "Kode Telepon" => '+65'),
    array("Negara" => "Malaysia", "Ibukota" => "Kuala Lumpur", "Kode Telepon" => '+60'),
    array("Negara" => "Brunei", "Ibukota" => "Bandar Seri Begawan", "Kode Telepon" => '+673'),
    array("Negara" => "Thailand", "Ibukota" => "Bangkok", "Kode Telepon" => '+66'),
    array("Negara" => "Laos", "Ibukota" => "Vientiane", "Kode Telepon" => '+856'),
    array("Negara" => "Filiphina", "Ibukota" => "Manila", "Kode Telepon" => '+63'),
    array("Negara" => "Myanmar", "Ibukota" => "Naypyidaw", "Kode Telepon" => '+95')
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Negara ASEAN</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Negara</th>
            <th>Ibukota</th>
            <th>Kode Telepon</th>
        </tr>
        <?php
        // Menampilkan isi array dalam tabel
        foreach ($ASEAN as $negara) {
            echo "<tr>";
            echo "<td>" . $negara['Negara'] . "</td>";
            echo "<td>" . $negara['Ibukota'] . "</td>";
            echo "<td>" . $negara['Kode Telepon'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
