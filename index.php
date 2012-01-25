<html>

	<head>
	
		<title>trueCHAP.com - The home of all true chaps!</title>
		
		<link rel="stylesheet" href="css/general.css" />
		
		
		<link rel="icon" type="image/ico" href="images/favicon.ico">
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"
		type="text/javascript" charset="utf-8"></script>
		<script src="js/general.js" type="text/javascript"></script>
		<script src="js/post.js" type="text/javascript"></script>
		<script src="js/score.js" type="text/javascript"></script>
	
	</head>
	
	<body>
	<? 
		
		// Prepare site
		include_once 'functions.php'; 
		include_once 'db.php';
		dbConnect();
		mysql_select_db("truechap_site");
	
	?>
	<!-- Place this render call where appropriate -->
	<script type='text/javascript'>
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>
										
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=308481052510428";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '308481052510428',
            status     : true, 
            cookie     : true,
            xfbml      : true
          });
        };
        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           d.getElementsByTagName('head')[0].appendChild(js);
         }(document));
      </script>
	
		<div id="container">
	
			<div id="header">
			
				<div id="inner_header">
				
					<img src="images/header_logo.png" alt="trueCHAP.com" class="header_logo" />
					
				</div> <!-- End inner_header -->
			
			</div> <!-- End header -->
			
			<div id="nav">
			
				<div id="inner_nav">
				
					<div id="nav_links">
						<a href="#">Chap of the Week</a>
						<a href="#">Chaptionary</a>
						<a href="#">Tales of a trueChap</a>
						<a href="#">trueChap Blog</a>
						<a href="#">chapTube</a>				
					</div>
					
					<div id="nav_search">
					
						<form name="" action="" method="post">
						
							<input type="text" name="search" class="search" />
							<input type="submit" src="images/search_button.png" class="search" value=" " />
							
						</form>
					
					</div>
				
				</div>
			
			</div> <!-- End nav -->
				
			<div id="content">
			
				<div id="main_content">
				
					<div id="post_box">
					
						<input type="text" value="Share your tales of chapdom!" class="post_box" id="post" />
						<input type="submit" value="Tell Us" class="post_button" />
						
						<div class="nav_links">
							<a href="#">Top 25</a>
							<a href="#">Best of the Week</a>
							<a href="#">Best of the Month</a>
							<a href="#">Chaptionary</a>
						</div>
						
					</div> <!-- End post_box -->
					
					<div id="posts">
					
						<div id="post_box2">
					
							<input type="text" value="Share your tales of chapdom!" class="post_box" />
							<input type="submit" value="Tell Us" class="post_button" />
						
							<div class="nav_links">
								<a href="#">Top 20</a>
								<a href="#">Best of the Week</a>
								<a href="#">Best of the Month</a>
								<a href="#">Chaptionary</a>
							</div>
							
						</div> <!-- End post_box -->
					
						<? load_initial_posts(); ?>
						
						<div id="pagination">
						
						<a href="#">
							&lt;&lt;&nbsp;&nbsp;
							&lt;&nbsp;&nbsp;
							1&nbsp;&nbsp;
							2&nbsp;&nbsp;
							3&nbsp;&nbsp;
							4&nbsp;&nbsp;
							5&nbsp;&nbsp;
							&gt;&nbsp;&nbsp;
							&gt;&gt;
						</a>
					
					</div>
					
					</div> <!-- End posts -->
					
				</div> <!-- End main_content -->
				
				<div id="widgets">
						
					<div class="widget">
						
					</div>

					<div class="widget">
						
					</div> 

					<div class="widget">
						
					</div> 
					
				</div> <!-- End widgets -->
				
			</div> <!-- End content -->
		
			<div class="clear_footer"></div>
		
		</div> <!-- End container -->
		
		<div id="footer">
		
			<div id="copyright">
			
				&copy; Copyright Chap Industries 2011+
			
			</div> <!-- End copyright -->
			
			<div id="footer_links">
				
				<a href="#">Site Policy</a>
				<br />
				<a class="footer_picker" style="cursor: pointer;">Contact Us</a>
				<br />
				<a href="#">Q&A</a>
			
			</div> <!-- End footer_links -->
		
		</div> <!-- End footer -->
	
	</body>

</html>
