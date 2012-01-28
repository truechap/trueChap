<?

	include 'db.php';
	dbConnect();
	
	$post = $_POST['post'];
	
	$sql = "INSERT INTO message (submittedby, content, moderated, score) 
			VALUES (1, '$post', 0, 0)";
			
	mysql_query($sql);
	
	echo json_encode(array("sql"=>$sql));

?>