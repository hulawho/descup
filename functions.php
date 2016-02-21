<?php
	function cmp($a, $b) {
		  $pts_diff = $a['points'] - $b['points'];
		  $gd_diff = $a['gd'] - $b['gd'];
		  $gf_diff = $a['gf'] - $b['gf'];
		  
		  if($pts_diff !== 0){
		  	return $pts_diff;
		  } else if($gd_diff !== 0){
		  	return $gd_diff;
		  } else {
		  	return $gf_diff;
		  }
	}
?>