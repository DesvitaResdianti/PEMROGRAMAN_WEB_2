<!DOCTYPE html>
<html>
<head>
  <title>latihan2b</title>
    <style>
       .kotak{
        width:220px;
        height:50px;
        display: flex;
       }

       .clear{
        border: 2px solid;
        padding: 10px;
        margin: 2px;
       }
    </style>
</head>
<body>
    <?php
      $kotak = 5;

      for ($i=1; $i <=$kotak ; $i++) { 
        echo "<div class='kotak'>";

      for ($j=1; $j<=$i ; $j++) { 
        echo "<div class='clear'>$j</div>";
      }  

        echo "</div>";
      }
    ?>

</body>
</html>