<?php
	function format_percent($rps) {
		$jumlah = number_format($rps, 0, ",", ".");
		$percent = $jumlah . " %";
		
		return $percent;
	}
	
?>