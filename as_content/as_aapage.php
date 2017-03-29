<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/

	function as_get_request_content()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }
		
		$requestlower = strtolower(as_request());
		$requestparts = as_request_parts();
		$request_one = strtolower($requestparts[0]);
		if (count($requestparts)>1) {
			$request_two = strtolower($requestparts[1]);
		} else $request_two = "";
				  
		$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
		/*		
		if ($request_one == 'admin') {
			$_COOKIE['as_admin_last'] = $requestlower; // for navigation tab now...
			setcookie('as_admin_last', $_COOKIE['as_admin_last'], 0, '/', AS_COOKIE_DOMAIN); // ...and in future
		}*/
		
		switch ( $request_one ) {
			case 'index'.as_urlExt:	
				$as_content = require( "as_page_home.php" );
				break;
			case 'autopost':	
				$as_content = as_auotopost_en();
				$as_content = as_auotopost_fr();
				$as_content = as_auotopost_es();
				$as_content = as_auotopost_pt();
				break;
			case 'account': 
				switch ( $request_two ) {	
					case 'signout'.as_urlExt:	
						$as_content = as_logout();
						break;	
					case 'signin'.as_urlExt:			
						$as_content = require( "as_account_signin.php" );
						break;
					case 'signup'.as_urlExt:			
						$as_content = require( "as_account_signup.php" );
						break;	
					case 'forgotten'.as_urlExt:	
						$as_content = require( "as_account_forgotten.php" );
						break;
					case 'username'.as_urlExt:	
						$as_content = require( "as_account_username.php" );
						break;	
					case 'account'.as_urlExt:	
						$as_content = require( "as_account_account.php" );
						break;			
					default:		
						$as_content = require( "as_page_home.php" );
				}			
				break;	
			case 'english': 
				switch ( $request_two ) {	
					case 'quotes'.as_urlExt:			
						$as_content = require( "as_quotes_eng_all.php" );
						break;
					case 'new'.as_urlExt:			
						$as_content = require( "as_quotes_eng_new.php" );
						break;	
					case 'view'.as_urlExt:	
						$as_content = require( "as_quotes_eng_view.php" );
						break;			
					default:		
						$as_content = require( "as_quotes_eng_all.php" );
				}			
				break;				
			case 'french': 
				switch ( $request_two ) {	
					case 'quotes'.as_urlExt:			
						$as_content = require( "as_quotes_fre_all.php" );
						break;
					case 'new'.as_urlExt:			
						$as_content = require( "as_quotes_fre_new.php" );
						break;	
					case 'view'.as_urlExt:	
						$as_content = require( "as_quotes_fre_view.php" );
						break;			
					default:		
						$as_content = require( "as_quotes_fre_all.php" );
				}			
				break;				
			case 'spanish': 
				switch ( $request_two ) {	
					case 'quotes'.as_urlExt:			
						$as_content = require( "as_quotes_esp_all.php" );
						break;
					case 'new'.as_urlExt:			
						$as_content = require( "as_quotes_esp_new.php" );
						break;	
					case 'view'.as_urlExt:	
						$as_content = require( "as_quotes_esp_view.php" );
						break;			
					default:		
						$as_content = require( "as_quotes_esp_all.php" );
				}			
				break;				
			case 'portugues': 
				switch ( $request_two ) {	
					case 'quotes'.as_urlExt:			
						$as_content = require( "as_quotes_por_all.php" );
						break;
					case 'new'.as_urlExt:			
						$as_content = require( "as_quotes_por_new.php" );
						break;	
					case 'view'.as_urlExt:	
						$as_content = require( "as_quotes_por_view.php" );
						break;			
					default:		
						$as_content = require( "as_quotes_por_all.php" );
				}			
				break;
			case 'checkout':
				$as_content = require( "as_page_checkout.php" );
				break;	
			case 'catagoue':
				$request_two = strtolower($requestparts[1]);
				
				break;	
			case 'admin'.as_urlExt:
				switch ( $as_request ) {
					case 'user_new':
						$as_content = require( AS_CONT."admin/user_new.php" );
						break;
					case 'user_view':
						$as_content = require( AS_CONT."admin/user_view.php" );
						break;
					case 'user_admin':
						$as_content = require( AS_CONT."admin/user_admin.php" );
						break;
					case 'user_all':
						$as_content = require( AS_CONT."admin/user_all.php" );
						break;	
					case 'user_client':
						$as_content = require( AS_CONT."admin/user_client.php" );
						break;	
					case 'quote_new':
						$as_content = require( AS_CONT."admin/quote_new.php" );
						break;
					case 'quote_view':
						$as_content = require( AS_CONT."admin/quote_view.php" );
						break;
					case 'quote_all':
						$as_content = require( AS_CONT."admin/quote_all.php" );
						break;
					case 'menu_new':
						$as_content = require( AS_CONT."admin/menu_new.php" );
						break;
					case 'menu_view':
						$as_content = require( AS_CONT."admin/menu_view.php" );
						break;
					case 'menu_all':
						$as_content = require( AS_CONT."admin/menu_all.php" );
						break;	
					case 'menuitem_new':
						$as_content = require( AS_CONT."admin/menuitem_new.php" );
						break;
					case 'menuitem_view':
						$as_content = require( AS_CONT."admin/menuitem_view.php" );
						break;
					case 'menuitem_all':
						$as_content = require( AS_CONT."admin/menuitem_all.php" );
						break;	
					case 'page_new':
						$as_content = require( AS_CONT."admin/page_new.php" );
						break;
					case 'page_view':
						$as_content = require( AS_CONT."admin/page_view.php" );
						break;
					case 'page_all':
						$as_content = require( AS_CONT."admin/page_all.php" );
						break;
					case 'settings_general':
						$as_content = require( AS_CONT."admin/settings_general.php" );
						break;
					case 'settings_slideshow':
						$as_content = require( AS_CONT."admin/settings_slideshow.php" );
						break;
					case 'settings_widghets':
						$as_content = require( AS_CONT."admin/settings_widghets.php" );
						break;		
					case 'settings_countries':
						$as_content = require( AS_CONT."admin/settings_countries.php" );
						break;		
					default:						
						$as_content = require( AS_CONT."admin/adashboard.php" );
				}
				break;	
			default:		
				$as_content = require( "as_page_home.php" );
				//$as_content = as_check_requested_content($request_one);
		}
		
		return $as_content;
	}

	global $as_usage;
	require_once AS_FUNC.'as_users.php';
	
	as_get_request_content();
	
?>