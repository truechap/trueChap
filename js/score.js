$(document).ready(function() {

	$('img.vote-up').click(function() {
	
		var id = $(this).attr("id");
		var lastdash = id.lastIndexOf('-');
		id = id.substring((lastdash+1), id.length);
		
		var type = "up";
		
		var score = parseInt($('#score-'+id).text());
		
		var data = { id: id,
					 type: type,
					 score: score
					};
		
		var url = "http://www.truechap.com/site/change_score.php";
		
		changeScore(data, url);
	
	});
	
	$('img.vote-down').click(function() {
	
		var id = $(this).attr("id");
		var lastdash = id.lastIndexOf('-');
		id = id.substring((lastdash+1), id.length);
		
		var type = "down";
		
		var score = parseInt($('#score-'+id).text());
		
		var data = { id: id,
					 type: type,
					 score: score
					};
		
		var url = "http://www.truechap.com/site/change_score.php";
		
		changeScore(data, url);
	
	});
	
	function changeScore(str, url){
		
		$.post(url, str,
		
		function(data){
			
			// Fancy shite here
			console.log("Id: "+data.id + "\nVote up or down: "+data.type+"\nScore: "+data.score);
			$('#score-'+data.id).text(data.score);
			
		}, 
		
		"json");
            
    } 

});