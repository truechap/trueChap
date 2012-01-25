<?php

		include_once '../functions.php'; 
		include_once '../db.php';
		dbConnect();
		mysql_select_db("truechap_site");

		$qry = "SELECT * FROM message";
		$handle = mysql_query($qry);
		

		echo '<table>';
		echo '<tr><th>ID</th><th>Submitted By</th><th>The Message</th><th>Date/Time</th><th>Score</th></tr>';
			
		while ($result = mysql_fetch_array($handle)){




		}



?>
