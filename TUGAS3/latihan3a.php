<?php

function styletext($text, $kelas){
	$styledtext = '<b><span class="' . $kelas . '" style="font-size: 28px;
	font-family: Arial; color: #1A0547; font-style: italic; border: 1px solid ;">' . $text . '</span></b>';
	return $styledtext;
}
// contoh pemanggilan fungsi;
$tulisan = "Hello World! Here I Come!";
$kelas = "custom-style";
$styledresult = styletext($tulisan, $kelas);
echo $styledresult

?>

