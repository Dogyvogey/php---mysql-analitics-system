<?php

// ini_set("display_errors", 1); - Only use when debuging

function analitics(){
  $ip = $_SERVER['REMOTE_ADDR']; // Get the users IP ADDERSS
	
	$query = mysql_query("SELECT * FROM analitics WHERE ip = '$ip' LIMIT 1");

	//If mysql return's no records then add a new one else just update the returned row

	if(mysql_num_rows($query) == 0){
		$query = mysql_query("INSERT INTO analitics (id, ip, views) VALUES ('NULL', '$ip', '1')");
	}else if(mysql_num_rows($query) == 1){
		$query = mysql_query("SELECT * FROM analitics WHERE ip = '$ip' LIMIT 1");

		while($row = mysql_fetch_assoc($query)){
			$views = $row['views'];
		}

		$new_views = $views + 1;

		$query = mysql_query("UPDATE analitics SET views = '$new_views' WHERE ip = '$ip'");
	}
}

function get_unic(){
	$query = mysql_query("SELECT * FROM analitics WHERE views = '1'");

	if(mysql_num_rows($query) == 0){
		echo "Unic Views: 0";
	}else{
	echo "Unic Views: " . mysql_num_rows($query) . "</br >";
}
}

function get_returned(){
	$query = mysql_query("SELECT * FROM analitics WHERE views > 1");

	if (mysql_num_rows($query) == 0) {
		echo "Returned Visiters: 0";
	}else{
		echo "Returned Visiters: " . mysql_num_rows($query);
	}
}

?>
