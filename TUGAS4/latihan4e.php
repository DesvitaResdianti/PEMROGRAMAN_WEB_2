<?php
$pahlawan = array(
        1 =>array(
            "Foto"=> "<img src = 'Soekarno.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Ir Soekarno",
            "Tanggal_Lahir" => '06 Januari 1901',
            "Tanggal_Wafat" => '21 Juni 1970',
            "Julukan" => "Tokoh yang dekat dengan masyarakat, Bapak proklamator yang menyampaikan proklamasi kemerdekaan, Presiden pertama Indonesia"
        ),
        2 =>array(
            "Foto"=> "<img src = 'Mohammad Hatta.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Mohammad Hatta",
            "Tanggal_Lahir" => '12 Agustus 1902',
            "Tanggal_Wafat" => '14 Maret 1980',
            "Julukan" => "Tokoh yang dekat dengan masyarakat, Seorang politik yakni yang mendukung kemerdekaan, wakil presiden pertama indonesia"
        ),
        3 =>array(
            "Foto" => "<img src = 'Cut Nyak Dien.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Cut Nyak Dien",
            "Tanggal_Lahir" => '02 November 1848',
            "Tanggal_Wafat" => '06 November 1908',
            "Julukan" => "Ratu Aceh karena kepemimpinan dan perjuangan membela Aceh"
        ),
        4 =>array(
            "Foto" => "<img src = 'Pangeran Diponegoro.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Pangeran Diponegoro",
            "Tanggal_Lahir" => '11 November 1785',
            "Tanggal_Wafat" => '08 Januari 1855',
            "Julukan" => "Dijuluki sebagai pengeran yang memimpin perlawanan melawan penjajahan abad ke-19"
        ),
        5 =>array(
            "Foto" => "<img src = 'R.A Kartini.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "R.A_Kartini",
            "Tanggal_Lahir" => '21 April 1879',
            "Tanggal_Wafat" => '17 September 1904',
            "Julukan" => "Dikenal karena perjuangannya untuk membela hak-hak peerempuan dan pendidikan bagi perempuan di Indonesia"
        ),
        6 =>array(
            "Foto"=> "<img src = 'Teuku Umar.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Teuku_Umar",
            "Tanggal_Lahir" => '15 Februari 1854',
            "Tanggal_Wafat" => '11 Februari 1899',
            "Julukan" => "Pahlawan yang berperan penting dalam perlawanan terhadap penjajahan belanda di Aceh"
        ),
        7 =>array(
            "Foto"=> "<img src = 'Ki Hajar Dewantara.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Ki Hajar Dewantara",
            "Tanggal_Lahir" => '02 Mei 1889',
            "Tanggal_Wafat" => '26 April 1959',
            "Julukan" => "Terkenal atau dijuluki sebagai Bapak Pendidikan Nasional"
        ),
        8 =>array(
            "Foto" => "<img src = 'Kapten Pattimura.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Kapten Pattimura",
            "Tanggal_Lahir" => '08 Juni 1783',
            "Tanggal_Wafat" => '16 Desember 1817',
            "Julukan" => "Seagai Kapten dan pejuang maluku yang berjuang untuk kemerdekaan Indonesia"
        ),
        9 =>array(
            "Foto" => "<img src = 'Jendral Soedirman.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Jendral Soedirman",
            "Tanggal_Lahir" => '24 Januari 1916',
            "Tanggal_Wafat" => '29 Januari 1950',
            "Julukan" => "Terkenal dengan julukan bapak Tentara Nasionnal Indonesia yakni yang memimpin TNI selama perjuangan kemerdekaan"
        ),
        10 =>array(
            "Foto" => "<img src = 'Bung Tomo.jpg' width ='100' height = '100'>",
            "Nama_Pahlawan" => "Bung Tomo",
            "Tanggal_Lahir" => '03 Oktober 1920',
            "Tanggal_Wafat" => '07 Oktober 1981',
            "Julukan" => "Dikenal dengan perannya dalam perang Surabaya selama masa revolusi"
        ),
);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        .foto {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
   
<b>Nama : Desvita Resdianti</b>
</br>
<b>NIM : 701220027</b>
</br>
<b> NRP %5 = 027% * 5 = 1,35 = 3+5 = 8/2 = 4 </b>
<?php
echo "<center><b>PAHLAWAN NASIONAL INDONESIA</b></center>";
echo "</br>";
echo "<table border='1'>";
echo "<tr><th>No</th><th>Foto</th><th>Nama_Pahlawan</th><th>Tanggal_Lahir<th>Tanggal_Wafat</th><th>Julukan</th></tr>";
$nomor = 1;
foreach ($pahlawan as $data) {
    echo "<tr>";
    echo "<td>$nomor</td>";
    echo "<td>" . $data['Foto'] . "</td>";
    echo "<td>" . $data['Nama_Pahlawan'] . "</td>";
    echo "<td>" . $data['Tanggal_Lahir'] . "</td>";
    echo "<td>" . $data['Tanggal_Wafat'] . "</td>";
    echo "<td>" . $data['Julukan'] . "</td>";
    echo "</tr>";
    $nomor++;
}

echo "</table>";

?>

</body>
</html>