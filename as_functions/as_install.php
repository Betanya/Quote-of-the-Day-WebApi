<?php
	include AS_FUNC.'as_dbcheck.php';
	
	if (!as_check_db_value('userid', 'user_level', 5, 'as_user'))  {
		$as_err = array();
		$as_err['errno'] = 2;
		$as_err['errtype'] = 'user';
		$as_err['errtitle'] = 'Create a Super Admin';
		$as_err['errsumm'] = 'There are no users yet! That means you need to set up a Super-Admin first...';
		require_once AS_CONT.'as_page_error.php';
		exit(); 
	}
	
	if (!as_check_db_value('optionid', 'option_title', 'as_sitename', 'as_site_options'))  {
	   $as_err = array();
		$as_err['errno'] = 3;
		$as_err['errtype'] = 'site';
		$as_err['errtitle'] = 'Set Up Your Site';
		$as_err['errsumm'] = 'Set up a few Options for your site...';
		require_once AS_CONT.'as_page_error.php';
		exit(); 
	}
	
	if (!as_check_db_item('as_page'))  {
		$New_Item = array(    				
			'page_homepage' => 1,
			'page_title' => 'Welcome to the Online Place',
			'page_slug' => 'index',
			'page_content' => '<h3>Welcome to the best site</h3>
			<p>Everything starts here. This is a sample default page auto-created for you. You can modify it or simply create a new page when you login to your dashboard.<br><br>There are many options as well as tools awaiting you when you log in to your account.<br><br>System.
			</p>',
			'page_created' => date('Y-m-d H:i:s'),
			'page_createdby' => 0,
			'page_state' => 1,
		);				
		$add_query = $database->as_insert( 'as_page', $New_Item ); 
	}
	 
	if (!as_check_db_item('as_menu'))  {
		$New_Item = array( 
			'menu_title' => 'Main Menu',
			'menu_slag' => 'main_menu',
			'menu_content' => 'default menu',
			'menu_primary' => '1',
			'menu_state' => '1',
			'menu_created' => date('Y-m-d H:i:s'),
			'menu_createdby' => 0,
		);				
		$add_query = $database->as_insert( 'as_menu', $New_Item ); 
	}
	
	if (!as_check_db_item('as_menu_item'))  {		
		$New_Item = array(    				
			'menuitem_menu' => 1,
			'menuitem_title' => 'Homepage',
			'menuitem_slag' => 'home',
			'menuitem_link' => 'home'.as_urlExt,
			'menuitem_state' => 1,
			'menuitem_position' => 1,
			'menuitem_content' => 'homepage menu item',
			'menuitem_created' => date('Y-m-d H:i:s'),
			'menuitem_createdby' => 0,
		);				
		$add_query = $database->as_insert( 'as_menu_item', $New_Item );
	}
	