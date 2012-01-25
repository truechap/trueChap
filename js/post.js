$(document).ready(function() {

	$('input.post_button').click(function() {
	
		var post = $('#post').val();
		
		if(post != 	"Share your tales of chapdom!" && post != "") {
		
			// Check that they've changed the value
			
			var data = { post: post };
			
			var url = "http://www.truechap.com/site/add_post.php";
			
			addPost(data, url);
		
		}
	
	});
	
	function addPost(str, url){
		
		$.post(url, str,
		
		function(data){
			
			// Fancy shite here
			$('#post').val("");
			alert("Thanks for your post, CHAP!");
			console.log("Post SQL - "+data.sql);
			console.log("Post successfully added");
			
		}, 
		
		"json");
            
    } 

});