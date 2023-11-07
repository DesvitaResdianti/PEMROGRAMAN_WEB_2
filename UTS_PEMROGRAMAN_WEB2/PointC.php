<?php
$Harga_Barang= array(
        1 =>array(
            "ID"=> '1',
            "produk" => "Pepsodent",
            "Stok" => 20,
            "Harga" => 10.000,
            "Jumlah" => 20 * 10.000,
        ),
        2 =>array(
            "ID"=> '2',
            "produk" => "Sunlight",
            "Stok" => 15,
            "Harga" => 11.000,
            "Jumlah" => 15 * 11.000,
        ),
        3 =>array(
            "ID"=> '3',
            "produk" => "Baygon",
            "Stok" => 10,
            "Harga" => 16.000,
            "Jumlah" => 10 * 16.000,
        ),
        4 =>array(
            "ID"=> '4',
            "produk" => "Dove",
            "Stok" => 18,
            "Harga" => 22.000,
            "Jumlah" => 18 * 22.000,
        ),
        5 =>array(
            "ID"=> 5,
            "produk" => "Rinso",
            "Stok" => 15,
            "Harga" => 20.000,
            "Jumlah" => 15 * 20.000,
        ),
        6 =>array(
            "ID"=> 6,
            "produk" => "Downy",
            "Stok" => 20,
            "Harga" => 11.500,
            "Jumlah" => 20 * 11.500,
        ),
        7 =>array(
            "ID"=> 7,
            "produk" => "Le mineral",
            "Stok" => 25,
            "Harga" => 5.000,
            "Jumlah" => 25 * 5.000,
        ),
    );
echo "<b>TABEL HARGA BARANG</b>";
echo "</br>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>produk</th><th>Stok</th><th>Harga<th>Jumlah</th></tr>";
foreach ($Harga_Barang as $Barang) {
    echo "<tr>";
    echo "<td>" . $Barang['ID'] . "</td>";
    echo "<td>" . $Barang['produk'] . "</td>";
    echo "<td>" . $Barang['Stok'] . "</td>";
    echo "<td>" . $Barang['Harga'] . "</td>";
    echo "<td>" . $Barang['Jumlah'] . "</td>";
    echo "</tr>";
    
}

echo "</table>";
?>