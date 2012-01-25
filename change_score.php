<?

	include_once 'db.php';
	dbConnect();
	mysql_select_db("truechap_site");

	$id = $_POST['id'];
	$type = $_POST['type'];
	$score = $_POST['score'];
	
	if($type == "up") {
	
		// Vote up
		
		$score += 1;
		$sql = "UPDATE message
				SET score = $score 
				WHERE id = $id";
		mysql_query($sql);
	
	} else if($type == "down") {
	
		// Vote down
		
		$score -= 1;
		$sql = "UPDATE message
				SET score = $score 
				WHERE id = $id";
		mysql_query($sql);
	
	} else {
			
		// Error
		
	}
	
	echo json_encode(array("score"=>$score, "id"=>$id, "type"=>$type));

?>
