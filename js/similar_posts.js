$(document).ready(function() {

	/*
	$('.hashtag').hover(function(e) {
		
		var id = $(this).attr("alt");
		
		var data = { id: id };
		
		var url = "http://www.truechap.com/site/check_for_similar.php";
		
		check_for_similar(data, url);
			
		/*
		
		*/
	
	}, function() {
	
		var id = $(this).attr("alt");
		$('#hashtag_hover-'+id).stop().animate({ opacity: 0, height: '0px'}, 'fast');
	
	});
	
	function check_for_similar(str, url){
		
		$.post(url, str,
		
		function(data){
			
			// Fancy shite here
			var id = data.id;
			var xValue = e.pageX;
			var yValue = e.pageY;
			var height = $('#hashtag_hover-'+id).css("height");
			$('#hashtag_hover-'+id).css("top", yValue - 45);
			$('#hashtag_hover-'+id).css("left", (xValue));
			$('#hashtag_hover-'+id).stop().animate({ opacity: 1, height: '15px'}, 'fast');
			
		}, 
		
		"json");
            
    }
//	*/
	
});
