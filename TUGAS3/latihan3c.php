<?php

function pangkat($angka, $pangkat){
	$a = $angka;
	for($i=0;$i<($pangkat-1);$i++){
	$a = $a*$angka;
	}

	return $a;
}
echo "5 pangkat 4 = " . pangkat(5,4);

?>