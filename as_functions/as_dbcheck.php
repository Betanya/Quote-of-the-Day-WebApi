<?php
	
	$database = new As_Dbconn();
		
	$As_Table_Details = array(	
		'articleid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'article_title varchar(200) DEFAULT NULL',
		'article_slag varchar(200) DEFAULT NULL',
		'article_content mediumtext',
		'article_blogcatid tinyint(11) NOT NULL DEFAULT 0',
		'article_tags varchar(200) DEFAULT NULL',
		'article_userid int(10) unsigned DEFAULT 0',
		'article_posted datetime NOT NULL',
		'article_views int(10) unsigned NOT NULL DEFAULT 0',
		'article_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_updatebyid int(10) unsigned DEFAULT NULL',
		'article_flagcount tinyint(3) unsigned DEFAULT NULL',
		'article_updated datetime DEFAULT NULL',
		'article_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (articleid)',
		);
	$add_query = $database->as_table_exists_create( 'as_blog', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'blogcatid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'blogcategory_parentid smallint(10) unsigned NOT NULL DEFAULT 0',
		'blogcategory_title varchar(100) DEFAULT NULL',
		'blogcategory_slag varchar(50) DEFAULT NULL',
		'blogcategory_content mediumtext',
		'blogcategory_userid int(10) unsigned DEFAULT 0',
		'blogcategory_created datetime NOT NULL',
		'blogcategory_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcategory_updatebyid int(10) unsigned DEFAULT NULL',
		'blogcategory_flagcount tinyint(3) unsigned DEFAULT NULL',
		'blogcategory_updated datetime DEFAULT NULL',
		'blogcategory_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcategory_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (blogcatid)',
		);
	$add_query = $database->as_table_exists_create( 'as_blog_cat', $As_Table_Details ); 
		
	$As_Table_Details = array(	
		'blogcommid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'blogcomm_tagline varchar(500) DEFAULT NULL',
		'blogcomm_articleid tinyint(11) NOT NULL DEFAULT 0',
		'blogcomm_userid int(10) unsigned DEFAULT 0',
		'blogcomm_posted datetime NOT NULL',
		'blogcomm_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_updatebyid int(10) unsigned DEFAULT NULL',
		'blogcomm_flagcount tinyint(3) unsigned DEFAULT NULL',
		'blogcomm_updated datetime DEFAULT NULL',
		'blogcomm_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (blogcommid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_blog_comm', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'blogtagid int(11) NOT NULL AUTO_INCREMENT',
		'blogtag_userid int(11) DEFAULT NULL',
		'blogtag_title varchar(50) NOT NULL',
		'blogtag_slug varchar(50) NOT NULL',
		'blogtag_created datetime DEFAULT NULL',
		'PRIMARY KEY (blogtagid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_blog_tag', $As_Table_Details ); 
			
	$As_Table_Details = array(	
		'optionid int(11) NOT NULL AUTO_INCREMENT',
		'option_title varchar(100) NOT NULL',
		'option_content varchar(2000) NOT NULL',
		'option_createdby int(10) unsigned DEFAULT NULL',
		'option_created datetime DEFAULT NULL',
		'option_updatedby int(10) unsigned DEFAULT NULL',
		'option_updated datetime DEFAULT NULL',
		'PRIMARY KEY (optionid)',
		);
	$add_query = $database->as_table_exists_create( 'as_site_options', $As_Table_Details ); 
	
	//pageid,page_homepage,page_title,page_content, page_slug, page_state,page_views
	$As_Table_Details = array(	
		'pageid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'page_homepage int(10) unsigned NOT NULL DEFAULT 0',
		'page_title varchar(200) DEFAULT NULL',
		'page_content varchar(40000) DEFAULT NULL',
		'page_slug varchar(100) DEFAULT NULL',
		'page_state int(10) unsigned NOT NULL DEFAULT 0',
		'page_views int(10) unsigned NOT NULL DEFAULT 0',
		'page_created datetime DEFAULT NULL',
		'page_createdby int(10) unsigned DEFAULT NULL',
		'page_updated datetime DEFAULT NULL',
		'page_updatedby int(10) unsigned DEFAULT NULL',
		'page_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (pageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_page', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_sname varchar(50) NOT NULL',
		'user_sex int(10) NOT NULL DEFAULT 1',
		'user_password text NOT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group int(10) NOT NULL DEFAULT 0',
		'user_level int(10) NOT NULL DEFAULT 0',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'user_joined datetime DEFAULT NULL',
		'user_lastseen datetime DEFAULT NULL',
		'user_updated datetime DEFAULT NULL',
		'user_field3 varchar(100) NOT NULL',
		'user_field4 varchar(100) NOT NULL',
		'user_field5 varchar(100) NOT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	
	$As_Table_Details = array(
		'messageid int(11) NOT NULL AUTO_INCREMENT',
		'message_readerid int(11) DEFAULT NULL',
		'message_title varchar(50) NOT NULL',
		'message_content varchar(10000) NOT NULL',
		'message_senderid int(11) DEFAULT NULL',
		'message_state int(11) DEFAULT NULL',
		'message_senton datetime DEFAULT NULL',
		'message_readon datetime DEFAULT NULL',
		'PRIMARY KEY (messageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user_message', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'notifyid int(11) NOT NULL AUTO_INCREMENT',
		'notify_generator varchar(50) NOT NULL',
		'notify_type varchar(50) NOT NULL',
		'notify_title varchar(50) NOT NULL',
		'notify_content varchar(10000) NOT NULL',
		'notify_readerid int(11) DEFAULT NULL',
		'notify_nstate int(11) DEFAULT NULL',
		'notify_created datetime DEFAULT NULL',
		'notify_readon datetime DEFAULT NULL',
		'notify_action varchar(50) NOT NULL',
		'notify_link varchar(150) NOT NULL',
		'notify_field2 varchar(50) NOT NULL',
		'notify_field3 varchar(50) NOT NULL',
		'notify_field4 varchar(50) NOT NULL',
		'notify_field5 varchar(50) NOT NULL',
		'notify_field6 varchar(50) NOT NULL',
		'notify_field7 varchar(50) NOT NULL',
		'PRIMARY KEY (notifyid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_user_notification', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'profileid int(11) NOT NULL AUTO_INCREMENT',
		'profile_userid int(11) DEFAULT NULL',
		'profile_title varchar(50) NOT NULL',
		'profile_content varchar(10000) NOT NULL',
		'PRIMARY KEY (profileid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_user_profile', $As_Table_Details ); 
		//quoteid, quote_title, quote_code, quote_text, quote_bible, quote_bread, quote_audio, quote_date, quote_posted, quote_lang
	$As_Table_Details = array(	
		'quoteid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'quote_title varchar(100) DEFAULT NULL',
		'quote_code varchar(100) NOT NULL',
		'quote_text varchar(10000) DEFAULT NULL',
		'quote_bible varchar(100) NOT NULL',
		'quote_bread varchar(10000) NOT NULL',
		'quote_audio varchar(1000) NOT NULL',
		'quote_date date DEFAULT NULL',
		'quote_posted datetime DEFAULT NULL',
		'quote_lang varchar(50) NOT NULL',
		'quote_field1 varchar(50) NOT NULL',
		'quote_field2 varchar(50) NOT NULL',
		'quote_field3 varchar(50) NOT NULL',
		'quote_field4 varchar(50) NOT NULL',
		'quote_field5 varchar(50) NOT NULL',
		'PRIMARY KEY (quoteid)',
		);
	$add_query = $database->as_table_exists_create( 'as_quote', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'quoteid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'quote_title varchar(100) DEFAULT NULL',
		'quote_code varchar(100) NOT NULL',
		'quote_text varchar(10000) DEFAULT NULL',
		'quote_bible varchar(100) NOT NULL',
		'quote_bread varchar(10000) NOT NULL',
		'quote_audio varchar(1000) NOT NULL',
		'quote_date date DEFAULT NULL',
		'quote_posted datetime DEFAULT NULL',
		'quote_lang varchar(50) NOT NULL',
		'quote_field1 varchar(50) NOT NULL',
		'quote_field2 varchar(50) NOT NULL',
		'quote_field3 varchar(50) NOT NULL',
		'quote_field4 varchar(50) NOT NULL',
		'quote_field5 varchar(50) NOT NULL',
		'PRIMARY KEY (quoteid)',
		);
	$add_query = $database->as_table_exists_create( 'as_quote_backup', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'widghetid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'widghet_type varchar(100) DEFAULT NULL',
		'widghet_title varchar(100) DEFAULT NULL',
		'widghet_content varchar(2000) DEFAULT NULL',
		'widghet_position int(10) unsigned DEFAULT NULL',
		'widghet_state int(10) unsigned DEFAULT NULL',
		'widghet_location int(10) unsigned DEFAULT NULL',
		'widghet_created datetime DEFAULT NULL',
		'widghet_createdby int(10) unsigned DEFAULT NULL',
		'widghet_updated datetime DEFAULT NULL',
		'widghet_updateby int(10) unsigned DEFAULT NULL',
		'widghet_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'widghet_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'widghet_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (widghetid)',
		);
	$add_query = $database->as_table_exists_create( 'as_widghet', $As_Table_Details ); 
	
	
?>