<?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

$number = 5; // Ganti dengan bilangan yang ingin Anda hitung faktorialnya
$result = factorial($number);
echo "Faktorial dari $number = $result";


?>