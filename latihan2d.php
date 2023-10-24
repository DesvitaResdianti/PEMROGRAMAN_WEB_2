<?php

echo "Perulangan untuk mencari kategori bilangan : </br>";
for ($i = 1; $i <= 20; $i++) {
    echo " • Angka $i adalah ";

    if ($i % 2 == 0) {
        echo "genap";
    } else {
        echo "ganjil";
    }

    if (is_prima($i)) {
        echo " sekaligus bilangan prima";
    } 

    echo "<br>";
}

      function is_prima($n) {
        if ($n <= 1) {
          return false;
        }

        for ($i = 2; $i < $n; $i++) {
          if ($n % $i == 0) {
            return false;
          }
        }

        return true;
      }
?>