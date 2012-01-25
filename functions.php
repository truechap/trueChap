<?
	
	/**
	* format_date_to_gmt
	*
	* Takes a date and formats it into GMT timezone (to combat the 
	* default timezone of the MySQL server) and returns it in the
	* correct format for displaying on each post
	*
	* @author Tom Lynch
	* 
	* @param string $date		 The date to format
	* @return string $result	 The formatted timestamp
	*
	*/
	function format_date_to_gmt($date) {
	
		// Last change: 20/01/12
	
		$day = substr($date, 8, 2);
		$month = substr($date, 5, 2);
		$year = substr($date, 0, 4);
		$hours = substr($date, 11, 2);
		$minutes = substr($date, 14, 2);
		
		switch($month) {
		
			case 01:
				$text_month = "January";
				break;
			case 02:
				$text_month = "Febuary";
				break;
			case 03:
				$text_month = "March";
				break;
			case 04:
				$text_month = "April";
				break;
			case 05:
				$text_month = "May";
				break;
			case 06:
				$text_month = "June";
				break;
			case 07:
				$text_month = "July";
				break;
			case 08:
				$text_month = "August";
				break;
			case 09:
				$text_month = "September";
				break;
			case 10:
				$text_month = "October";
				break;
			case 11:
				$text_month = "November";
				break;
			case 12:
				$text_month = "December";
				break;
			
		}
		
		$result = $day . " " . $text_month . " " . $year . " at " . $hours . ":" . $minutes;
		
		return $result;
	
	}
	
	/**
	* format_content
	*
	* Used to format the content of a post. It takes the content and
	* wraps it in the appropriate divs, and creates the hover tag for 
	* the hashtag
	*
	* @author Tom Lynch
	* 
	* @param string $message		 The content to format
	* @param int $id 				 The ID of the post
	* @return string $result		 The formatted result
	*
	*/
	function wrap_hashtags($message, $id) {
	
		$hash = strpos($message, '#');
		
		if($hash > 0) {
		
			// Get everything up to the hash
			if($hash != 0) {
				$start = substr($message, 0, $hash);
			} else {
				$start = "";
			}
			
			$end = substr($message, $hash, strlen($message));
			$space = strpos($end, " ");
			
			if($space == "") {
				// Isn't a space after hashtag
				$hashtag = $end;
				$end = "";
				
			} else {
				// Is a space after hashtag
				$hashtag = substr($end, 0, $space);
				$end = substr($end, $space, strlen($end));
			}
			
			$wrapped_hash = "<span class=\"hashtag\" alt=\"".$id."\">" . $hashtag . "</span>";
			
			$result = $start . " " . $wrapped_hash . " " . $end;
			
		} else if($hash == 0) {
		
			// Hashtag at the start
			
			$space = strpos($message, " ");
			
			if($space == "") {
				// Isn't a space after hashtag
				$hashtag = $message;
				$end = "";
				
			} else {
				// Is a space after hashtag
				$end = substr($message, $space, strlen($message));
				$hashtag = substr($message, 0, $space);
			}
			
			$wrapped_hash = "<span class=\"hashtag\" alt=\"".$id."\">" . $hashtag . "</span>";
			
			$result = $wrapped_hash . " " . $end;
		
		} else {
			
			return $message;
		}
		
		return $result;
	
	}
	
	/**
	* format_content
	*
	* Used to format the content of a post. It takes the content and
	* wraps it in the appropriate divs, and creates the hover tag for 
	* the hashtag
	*
	* @author Tom Lynch
	* 
	* @param string $content		 The content to format
	* @param int $id 				 The ID of the post
	* @param int $likes 			 The number of likes a post has received
	* @return string $result		 The formatted result
	*
	*/
	function format_content($content, $id, $likes) {
		
	
		$formatted_content = wrap_hashtags($content, $id);
	
		$result = "<div class='post_inner'>
			".$formatted_content."
		</div>
		<span id='hashtag_hover-".$id."' class='hashtag_hover' alt='test'>
			".$likes." similar posts
		</span>
		";
		
		return $result;
	
	}
	
	/**
	* format_for_twitter
	*
	* Takes the content of a post and manipulates the hashtag and
	* content so that it will fit the 140 character limit of twitter
	*
	* @author Tom Lynch
	* 
	* @param string $content		 The content to format
	* @return string $result		 The formatted result
	*
	*/
	function format_for_twitter($content) {
		
		// Find the position of the hash
		$hash = strpos($content, '#');
		
		if($hash != "") {
			// If there is a hash found, isolate the hash tag
			// This is the section before the hash
			$start = substr($content, 0, $hash); 
			// Everything after the hash
			$end = substr($content, $hash, strlen($content));
			// Handle any spaces found in the hashtag
			$space = strpos($end, " ");
			if($space != "") {
				$hashtag = substr($end, 0, $space);
			} else {
				$hashtag = $end;
			}
			$message = $start;		
		} else {
			// If there is no hash found, add the generic hashtag
			$hashtag = "#trueCHAP";
			$message = $content;
		}
		
		if(strlen($message) > (112 - strlen($hashtag))) {
			// If the start of the message is longer than the allowed length
			$short_version = substr($message, 0, (112-strlen($hashtag)));
			$result = $short_version . "... " . $hashtag;
		} else {
			// Message is short enough to fit entirely
			if((strlen($message)+strlen($hashtag)) > 120) {
				// If the message with the hashtag is too long, shorten it
				$short_content = substr($message, 0, (115 - strlen($hashtag)));
				$result = $short_content . "... " . $hashtag;
			} else {
				// Otherwise just add the hashtag
				$result = $message . $hashtag;
			}
		}
		
		return $result;
	}
	
	/**
	* format_content
	*
	* Used to format the content of a post. It takes the content and
	* wraps it in the appropriate divs, and creates the hover tag for 
	* the hashtag
	*
	* @author Tom Lynch
	* 
	* @param string $message		 The content to format
	* @param int $id 				 The ID of the post
	* @return string $result		 The formatted result
	*
	*/
	function display_vote_system($id, $score) {
	
		$result = "<img src='images/good.png' class='vote-up' alt='TrueCHAP' title='TrueCHAP' id='vote-up-".$id."' />
		&nbsp;
		<img src='images/bad.png' class='vote-down' alt='NotACHAP' title='NotACHAP' id='vote-down-".$id."' />
		&nbsp;<span id='score-".$id."'>".$score."</span>
		";
		
		return $result;
		
	}
	
	/**
	* format_content
	*
	* Used to format the content of a post. It takes the content and
	* wraps it in the appropriate divs, and creates the hover tag for 
	* the hashtag
	*
	* @author Tom Lynch
	* 
	* @param string $message		 The content to format
	* @param int $id 				 The ID of the post
	* @return string $result		 The formatted result
	*
	*/
	function load_initial_posts() {
	
		// Written by Lynch, gonna comment it soon
		
		//SAM: changed the limit to 25. 100 was annoying me.
		$sql = "SELECT id, submittedby, content, moderated, datetime, score FROM message ORDER BY ID DESC LIMIT 0, 25";
		
		$result = mysql_query($sql);
		
		while($row = mysql_fetch_array($result)) {
			
			$content = format_content($row['content'], $row['id'], $row['score']);
			$short_content = format_for_twitter($row['content']);
			$vote_system = display_vote_system($row['id'], $row['score']);
		
			 echo "<div class='post'>
							
							<table class='post_table'>
							
								<tr>
									<td class='post_date'>".format_date_to_gmt($row['datetime'])."</td>
									<td class='post_social_links'>
										<div
										style='margin-top: -3px;'
										class='fb-like' 
										data-href='http://www.truechap.com/post.php?id=".$row['id']."' 
										data-send='false' 
										data-layout='button_count' 
										data-width='50' 
										data-show-faces='false' 
										data-font='arial'></div>
										
										<a style='margin-top: 3px;'
										href=\"https://twitter.com/share\" 
										class=\"twitter-share-button\" 
										data-text=\"".$short_content."\" 
										data-count=\"horizontal\" 
										data-url=\"http://www.truechap.com/post.php?id=".$row['id']."\">
											Tweet
										</a>
										<script type=\"text/javascript\" 
										src=\"//platform.twitter.com/widgets.js\"></script>&nbsp;
										
										<!-- Place this tag where you want the +1 button to render -->
										<g:plusone size='medium' href='http://www.truechap.com/post.php?id=".$row['id']."'></g:plusone>
										
									</td>
								</tr>
							
								<tr>
									
									<td colspan='2'>
										".$content."
									</td>
							
								</tr>
								
								<tr>
								
									<td colspan='2' class='ratings'>
									
										".$vote_system."
									
									</td>
								
								</tr>
							
							</table>
							
						</div>
						
				";
		
		}
	
	}


?>
