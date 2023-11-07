<?php
$tanggal_transaksi = "07 November 2023";


$produk_dibeli = array(
    array("Produk" => "Pepsodent", "Jumlah" => 2, "Harga" => 10000),
    array("Produk" => "Rinso", "Jumlah" => 1, "Harga" => 20000),
    array("Produk" => "Dove", "Jumlah" => 2, "Harga" => 22000),
    
);

// Hitung total pembelian
$total_pembelian = 0;

foreach ($produk_dibeli as $produk) {
    $total_pembelian += $produk["Jumlah"] * $produk["Harga"];
}

// Diskon
$diskon = 0;
if ($total_pembelian >= 100000) {
    $diskon = 0.20;
} elseif ($total_pembelian >= 50000) {
    $diskon = 0.10;
}
//  total pembayaran setelah diskon
$total_pembayaran_setelah_diskon = $total_pembelian - ($total_pembelian * $diskon);


echo "<h2>Tanggal Transaksi: $tanggal_transaksi</h2>";

echo "<table border='1'>";
echo "<tr><th>Produk</th><th>Jumlah</th></tr>";
foreach ($produk_dibeli as $produk) {
    echo "<tr>";
    echo "<td>{$produk['Produk']} ({$produk['Jumlah']}X" . number_format($produk['Harga'], 0, '.', ',') . ")</td>";
    echo "<td>" . number_format($produk['Jumlah'] * $produk['Harga'], 0, '.', ',') . "</td>";
    echo "</tr>";
}
echo "<tr><th>Total:</th><td>" . number_format($total_pembelian, 0, '.', ',') . "</td></tr>";
echo "<tr><th>Diskon:</th><td>" . number_format($diskon * 100, 0) . "%</td></tr>";
echo "<tr><th>Total Pembayaran:</th><td>" . number_format($total_pembayaran_setelah_diskon, 0, '.', ',') . "</td></tr>";
echo "</table>";
?>