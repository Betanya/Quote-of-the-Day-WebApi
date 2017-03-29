<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	function as_str_tags($string){
		$slag6 = trim($string);
		$slag5 = strtolower($slag6);
		$slag4 = preg_replace("/[\s-]+/", "-", $slag5);
		$slag3 = preg_replace('/[^,;a-zA-Z0-9_-]|[,;]$/s', '', $slag4);
		$slag2 = preg_replace("/\_/", "-", $slag3);
		$slag1 = preg_replace("/\,-/", ", ", $slag2);
		$slag = preg_replace("/\-,/", ",", $slag1);
		return $slag;
	}
	
	function as_str_text($string) {
        $finalstr = str_replace('"', '+', $string);
        $finalstr = str_replace('“', '+', $finalstr);
        $finalstr = str_replace('”', '+', $finalstr);
		$finalstr = str_replace('<br />', '$', $finalstr);
		$finalstr = str_replace("'", "^", $finalstr);
		$finalstr = strip_tags($finalstr);	
		$finalstring = trim($finalstr);			
		return $finalstring;
	}
	
	function is_english_used($string) {
		if (strlen($str) != strlen(utf8_decode($str))) {
			return false;
			} else {
				return true;
			}
	}
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		/*if(empty(as_post_text('slug')) {
		    $as_slug = as_post_text('slug');
		} else $as_slug = as_slug_this(as_post_text('title');
		*/
	}
	
	function as_new_slideshow($title, $content, $link, $image){
		$database = new As_Dbconn();			
		$New_slide_Show = array(    				
			'title' => $title,
			'content' => $content,
			'link' => $link,
			'image' => $image,
			'created' => date('Y-m-d H:i:s'),
		);
				
		$add_query = $database->as_insert( 'as_slideshow', $New_slide_Show ); 
	}
	
	function as_edit_slideshow($slag, $sl_no) {
		$raw_file_name = basename($_FILES["image_slide".$sl_no]["name"]);
		$temp_file_name = $_FILES["image_slide".$sl_no]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'slide_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_slide = $finalname;
		else $as_slide = as_post_text('slide_slide'.$sl_no);	
		
		$database = new As_Dbconn();	
		$Update_Slide_Details = array(
			'title' => as_post_text('title_slide'.$sl_no),
			'link' => as_post_text('link_slide'.$sl_no),
			'image' => $as_slide,
			'updated' => date('Y-m-d H:i:s'),
			'updatedby' => as_post_text('posting_by'),
		);
		$where_clause = array('slag' => $slag);
		$updated = $database->as_update( 'as_slideshow', $Update_Slide_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}

	function as_add_new_quote($title, $code, $text, $bible, $bread, $audio, $date, $lang){
		$database = new As_Dbconn();	
		$New_Item_Details = array(
			'quote_title' => $title,
			'quote_code' => $code,
			'quote_text' => $text,
			'quote_bible' => $bible,
			'quote_bread' => $bread,
			'quote_audio' => $audio,
			'quote_date' => $date,
		    'quote_posted' => date('Y-m-d H:i:s'),
			'quote_lang' => $lang,
		);
			
		$add_query = $database->as_insert( 'as_quote', $New_Item_Details ); 
		$add_query = $database->as_insert( 'as_quote_backup', $New_Item_Details ); 
	}
	
	function as_autopost_en() {
		$html_get = file_get_contents('http://branham.org/en/QuoteOfTheDay');
	
		$thecontent = preg_replace( '/\s+/', ' ', $html_get);
		$mytxt = explode('<source src="',$thecontent);
		$text0 = explode('" type="audio/mpeg" />',$mytxt[1]);
			
		$text1 = explode('<div class="QOTDtext"> <span id="content"><p>',$text0[1]);
		$text2 =  explode('</p></span> </div> <div class="sendtofriend">', $text1[1]);

		$text3 = explode('<div class="QOTDdate"> <span id="title">', $text1[0]);	
		$text4 =  explode('</span> </div> <div class="QOTDtitle"> <span id="summary"><p>', $text3[1]);		
		$mtitle = trim(str_replace('</p></span> </div>', '', $text4[1]));

		$text5 = explode('<span id="scripturereference">', $text1[1]);
		$text6 = explode('</p></span> </div> </div></div> <div class="OnThisDayBox', $text5[1]);
		$text7 = explode('</span> </div> <div class="dailybread_text"> <span id="scripturetext"><p>', $text6[0]);
		
		as_add_new_quote(as_str_text($mtitle), $text4[0], as_str_text($text2[0]), as_str_text($text7[0]), 
			as_str_text($text7[1]), $text0[0], date('Y-m-d'), 'en');
	}
	
	function as_autopost_fr() {
		$html_get = file_get_contents('http://branham.org/fr/QuoteOfTheDay');
	
		$thecontent = preg_replace( '/\s+/', ' ', $html_get);
		$mytxt = explode('<source src="',$thecontent);
		$text0 = explode('" type="audio/mpeg" />',$mytxt[1]);
		$audio = $text0[0];	
		$text1 = explode('<div class="QOTDtext"> <span id="content"><p>',$text0[1]);
		$text2 =  explode('</p></span> </div> <div class="sendtofriend">', $text1[1]);

		$text3 = explode('<div class="QOTDdate"> <span id="title">', $text1[0]);	
		$text4 =  explode('</span> </div>', $text3[1]);	
		$mtitle = trim(str_replace('</p></span> </div>', '', $text4[1]));

		$text5 = explode('<span id="scripturereference">', $text1[1]);
		$text6 = explode('</p></span> </div> </div></div> <div class="OnThisDayBox', $text5[1]);
		$text7 = explode('</span> </div> <div class="dailybread_text"> <span id="scripturetext"><p>', $text6[0]);	              
		
		as_add_new_quote(as_str_text($mtitle), $text4[0], as_str_text($text2[0]), as_str_text($text7[0]), 
			as_str_text($text7[1]), $text0[0], date('Y-m-d'), 'fr');
	}
	
	function as_autopost_es() {
		$html_get = file_get_contents('http://branham.org/es/QuoteOfTheDay');
	
		$thecontent = preg_replace( '/\s+/', ' ', $html_get);
		$mytxt = explode('<source src="',$thecontent);
		$text0 = explode('" type="audio/mpeg" />',$mytxt[1]);
		$text1 = explode('<div class="QOTDtext"> <span id="content"><p>',$text0[1]);
		$text2 =  explode('</p></span> </div> <div class="sendtofriend">', $text1[1]);

		$text3 = explode('<div class="QOTDdate"> <span id="title">', $text1[0]);	
		$text4 =  explode('</span> </div>', $text3[1]);	
		$mtitle = trim(str_replace('</p></span> </div>', '', $text4[1]));

		$text5 = explode('<span id="scripturereference">', $text1[1]);
		$text6 = explode('</p></span> </div> </div></div> <div class="OnThisDayBox', $text5[1]);
		$text7 = explode('</span> </div> <div class="dailybread_text"> <span id="scripturetext"><p>', $text6[0]);

		as_add_new_quote(as_str_text($mtitle), $text4[0], as_str_text($text2[0]), as_str_text($text7[0]), 
			as_str_text($text7[1]), $text0[0], date('Y-m-d'), 'en');
	}
	
	function as_autopost_pt() {
		$html_get = file_get_contents('http://branham.org/pt/QuoteOfTheDay');
	
		$thecontent = preg_replace( '/\s+/', ' ', $html_get);
		$mytxt = explode('<source src="',$thecontent);
		$text0 = explode('" type="audio/mpeg" />',$mytxt[1]);
		$text1 = explode('<div class="QOTDtext"> <span id="content"><p>',$text0[1]);
		$text2 =  explode('</p></span> </div> <div class="sendtofriend">', $text1[1]);

		$text3 = explode('<div class="QOTDdate"> <span id="title">', $text1[0]);	
		$text4 =  explode('</span> </div>', $text3[1]);	
		$mtitle = trim(str_replace('</p></span> </div>', '', $text4[1]));

		$text5 = explode('<span id="scripturereference">', $text1[1]);
		$text6 = explode('</p></span> </div> </div></div> <div class="OnThisDayBox', $text5[1]);
		$text7 = explode('</span> </div> <div class="dailybread_text"> <span id="scripturetext"><p>', $text6[0]);

		as_add_new_quote(as_str_text($mtitle), $text4[0], as_str_text($text2[0]), as_str_text($text7[0]), 
			as_str_text($text7[1]), $text0[0], date('Y-m-d'), 'en');
	}
