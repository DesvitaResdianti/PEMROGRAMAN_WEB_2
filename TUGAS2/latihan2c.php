<!DOCTYPE html>
<html>
<head>
    <style>
       .kotak {
        width: 100px;
        height: 50px;
        display: flex;
       }

       .clear {
        border: 2px solid blue;
        padding: 10px;
        margin: 5px;
       }

       .ganjil {
        background-color: #003;
        color: #fff;
       }

       .genap {
        background-color: #999;
       }
    </style>
</head>
<body>
    <?php
      $kotak = 5;

      for ($i = 1; $i <= $kotak; $i++) { 
        echo "<div class='kotak'>";

        for ($j = 1; $j <= $i; $j++) {
          $kelas = ($i % 2 == 0) ? 'genap' : 'ganjil';
          echo "<div class='clear $kelas'>$j</div>";
        }  

        echo "</div>";
      }
    ?>
</body>
</html>