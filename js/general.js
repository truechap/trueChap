$(document).ready(function() {

	$('.hashtag').hover(function(e) {
		
		
		var id = $(this).attr("alt");
		var xValue = e.pageX;
		var yValue = e.pageY;
		var height = $('#hashtag_hover-'+id).css("height");
		$('#hashtag_hover-'+id).css("top", yValue - 45);
		$('#hashtag_hover-'+id).css("left", (xValue));
		$('#hashtag_hover-'+id).stop().animate({ opacity: 1, height: '15px'}, 'fast');
	
	}, function() {
	
		var id = $(this).attr("alt");
		$('#hashtag_hover-'+id).stop().animate({ opacity: 0, height: '0px'}, 'fast');
	
	});
	
	$('#copyright').click(function() {
	
		var color = $('#footer').css('background-color');
		
		if(color == "rgb(13, 23, 58)") {
			$('#footer').css("background-color", "#0d1e5b");
		} else {
			$('#footer').css("background-color", "#0d173a");
		}
	
	});
	
	$('.footer_picker').click(function() {
	
		var hex = prompt("What colour do you want to set the footer at? (Hexadecimal numbers only)");
		$('#footer').css("background-color", hex);
	
	});
	
	$('input[type=text].post_box').click(function() {
	
		if($(this).val() == "Share your tales of chapdom!") {
			$(this).val("");
		}
	
	});
	
	$('.post_inner').click(function() {
	
		var bg = $(this).css("background");
		if(bg == "#bababa") {
			$(this).css("background", "url('../images/tweed.jpg')");
		} else {
			$(this).css("background", "#bababa");
		}
	
	});
	
	/*$('#nav a').click(function() {
	
		$('#nav_links').css("display", "none");
		$('.nav_links').css("display", "block");
		$('input[type=text].post_box').css("margin", "20px 0 0 0");
		$('#nav_search').css("margin-top", "7px");
	
	});
	
	$('.nav_links a').click(function() {
	
		$('.nav_links').css("display", "none");
		$('#nav_links').css("display", "block");
		$('input[type=text].post_box').css("margin", "20px 0");
		$('#nav_search').css("margin-top", "-7px");
	
	});*/
	
	

});
