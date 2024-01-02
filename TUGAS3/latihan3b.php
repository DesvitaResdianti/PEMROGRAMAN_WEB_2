<?php
function styleText($jawabanIsset, $jawabanEmpty) {
    $style = "font-size: 28px; font-family: Arial; border: solid; padding: 10px;";
    $styledText = "<p style='$style'>$jawabanIsset $jawabanEmpty</p>";
   
    return $styledText;
}

// Contoh pemanggilan fungsi:
$jawabanIsset = "Isset adalah = salah satu kunci bahasa pemrograman untuk melakukan pengecekan terhadap suatu variabel atau isi dari variabel yang terdefinisi.adapun untuk fungsi isset adalah untuk memerikasa apakah suatu variabel sudah diatur atau belum.<br><br>";
$jawabanEmpty = "Empty adalah = Empty adalah penanda suatu kondisi, dan untuk memeriksa apakah suatu variabel itu kosong atau tidak. ";
$styledTexts = styleText($jawabanIsset, $jawabanEmpty);

echo $styledTexts; // Output dua teks dengan gaya yang ditentukan


?>