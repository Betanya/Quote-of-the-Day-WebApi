<?php	

	$pageTitle = (isset( $as_pageinfo['pageTitle'] ) ? $as_pageinfo['pageTitle'] : "")." - ".as_siteTitle;
	$pageAdminTitle = (isset( $as_pageinfo['pageTitle'] ) ? $as_pageinfo['pageTitle'] : "")." - ".as_siteTitle." | Admin";
	$pageAction = isset( $as_pageinfo['pageAction'] ) ? $as_pageinfo['pageAction'] : "Home";
    $pageKeywords = isset( $as_pageinfo['siteKeywords'] ) ? $as_pageinfo['siteKeywords'] : as_get_option('as_keywords');
    $pageDescription = isset( $as_pageinfo['siteDescription'] ) ? $as_pageinfo['siteDescription'] : as_get_option('as_description');
    $as_loginid = isset( $_SESSION['78e9e89c281686f4e051fe42c1675150'] ) ? $_SESSION['78e9e89c281686f4e051fe42c1675150'] : "";
		
    $as_db_query = "SELECT * FROM as_user WHERE userid='$as_loginid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_mobile, $user_email, $user_group, $user_level, $user_avatar, $user_joined, $user_lastseen, $user_updated) = $database->get_row( $as_db_query );
	} else  {
		return false;
	}
	
	function as_set_template($template)
	{
		global $as_template;
		$as_template=$template;
	}


	function as_content_prepare($voting=false, $categoryids=null)
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }

		global $as_template, $as_page_error_html;

		if (AS_DEBUG_PERFORMANCE) {
			global $as_usage;
			$as_usage->mark('control');
		}

		$request=as_request();
		$requestlower=as_request();
		$navpages=as_db_get_pending_result('navpages');
		$widgets=as_db_get_pending_result('widgets');

		if (isset($categoryids) && !is_array($categoryids)) // accept old-style parameter
			$categoryids=array($categoryids);

		$lastcategoryid=count($categoryids) ? end($categoryids) : null;
		$charset = 'utf-8';

		$as_content=array(
			'content_type' => 'text/html; charset='.$charset,
			'charset' => $charset,

			'direction' => as_opt('site_text_direction'),

			'site_title' => as_html(as_opt('site_title')),

			'head_lines' => array(),

			'navigation' => array(
				'user' => array(),

				'main' => array(),

				'footer' => array(
					'feedback' => array(
						'url' => as_path_html('feedback'),
						'label' => as_lang_html('main/nav_feedback'),
					),
				),

			),

			'sidebar' => as_opt('show_custom_sidebar') ? as_opt('custom_sidebar') : null,

			'sidepanel' => as_opt('show_custom_sidepanel') ? as_opt('custom_sidepanel') : null,

			'widgets' => array(),
		);

		// add meta description if we're on the home page
		if ($request === '' || $request === array_search('', as_get_request_map())) {
			$as_content['description'] = as_html(as_opt('home_description'));
		}

		if (as_opt('show_custom_in_head'))
			$as_content['head_lines'][]=as_opt('custom_in_head');

		if (as_opt('show_custom_header'))
			$as_content['body_header']=as_opt('custom_header');

		if (as_opt('show_custom_footer'))
			$as_content['body_footer']=as_opt('custom_footer');

		if (isset($categoryids))
			$as_content['categoryids']=$categoryids;

		foreach ($navpages as $page)
			if ($page['nav']=='B')
				as_navigation_add_page($as_content['navigation']['main'], $page);

		if (as_opt('nav_home') && as_opt('show_custom_home'))
			$as_content['navigation']['main']['$']=array(
				'url' => as_path_html(''),
				'label' => as_lang_html('main/nav_home'),
			);

		if (as_opt('nav_activity'))
			$as_content['navigation']['main']['activity']=array(
				'url' => as_path_html('activity'),
				'label' => as_lang_html('main/nav_activity'),
			);

		$hascustomhome=as_has_custom_home();

		if (as_opt($hascustomhome ? 'nav_as_not_home' : 'nav_as_is_home'))
			$as_content['navigation']['main'][$hascustomhome ? 'js' : '$']=array(
				'url' => as_path_html($hascustomhome ? 'js' : ''),
				'label' => as_lang_html('main/nav_js'),
			);

		if (as_opt('nav_questions'))
			$as_content['navigation']['main']['questions']=array(
				'url' => as_path_html('questions'),
				'label' => as_lang_html('main/nav_qs'),
			);

		if (as_opt('nav_hot'))
			$as_content['navigation']['main']['hot']=array(
				'url' => as_path_html('hot'),
				'label' => as_lang_html('main/nav_hot'),
			);

		if (as_opt('nav_unanswered'))
			$as_content['navigation']['main']['unanswered']=array(
				'url' => as_path_html('unanswered'),
				'label' => as_lang_html('main/nav_unanswered'),
			);

		if (as_using_tags() && as_opt('nav_tags'))
			$as_content['navigation']['main']['tag']=array(
				'url' => as_path_html('tags'),
				'label' => as_lang_html('main/nav_tags'),
				'selected_on' => array('tags$', 'tag/'),
			);

		if (as_using_categories() && as_opt('nav_categories'))
			$as_content['navigation']['main']['categories']=array(
				'url' => as_path_html('categories'),
				'label' => as_lang_html('main/nav_categories'),
				'selected_on' => array('categories$', 'categories/'),
			);

		if (as_opt('nav_users'))
			$as_content['navigation']['main']['user']=array(
				'url' => as_path_html('users'),
				'label' => as_lang_html('main/nav_users'),
				'selected_on' => array('users$', 'users/', 'user/'),
			);

		// Only the 'level' permission error prevents the menu option being shown - others reported on js-page-ask.php

		if (as_opt('nav_ask') && (as_user_maximum_permit_error('permit_post_q')!='level'))
			$as_content['navigation']['main']['ask']=array(
				'url' => as_path_html('ask', (as_using_categories() && strlen($lastcategoryid)) ? array('cat' => $lastcategoryid) : null),
				'label' => as_lang_html('main/nav_ask'),
			);


		if (
			(as_get_logged_in_level()>=AS_USER_LEVEL_ADMIN) ||
			(!as_user_maximum_permit_error('permit_moderate')) ||
			(!as_user_maximum_permit_error('permit_hide_show')) ||
			(!as_user_maximum_permit_error('permit_delete_hidden'))
		)
			$as_content['navigation']['main']['admin']=array(
				'url' => as_path_html('admin'),
				'label' => as_lang_html('main/nav_admin'),
				'selected_on' => array('admin/'),
			);


		$as_content['search']=array(
			'form_tags' => 'method="get" action="'.as_path_html('search').'"',
			'form_extra' => as_path_form_html('search'),
			'title' => as_lang_html('main/search_title'),
			'field_tags' => 'name="q"',
			'button_label' => as_lang_html('main/search_button'),
		);

		if (!as_opt('feedback_enabled'))
			unset($as_content['navigation']['footer']['feedback']);

		foreach ($navpages as $page)
			if ( ($page['nav']=='M') || ($page['nav']=='O') || ($page['nav']=='F') )
				as_navigation_add_page($as_content['navigation'][($page['nav']=='F') ? 'footer' : 'main'], $page);

		$regioncodes=array(
			'F' => 'full',
			'M' => 'main',
			'S' => 'side',
		);

		$placecodes=array(
			'T' => 'top',
			'H' => 'high',
			'L' => 'low',
			'B' => 'bottom',
		);

		foreach ($widgets as $widget)
			if (is_numeric(strpos(','.$widget['tags'].',', ','.$as_template.',')) || is_numeric(strpos(','.$widget['tags'].',', ',all,'))) { // see if it has been selected for display on this template
				$region=@$regioncodes[substr($widget['place'], 0, 1)];
				$place=@$placecodes[substr($widget['place'], 1, 2)];

				if (isset($region) && isset($place)) { // check region/place codes recognized
					$module=as_load_module('widget', $widget['title']);

					if (
						isset($module) &&
						method_exists($module, 'allow_template') &&
						$module->allow_template((substr($as_template, 0, 7)=='custom-') ? 'custom' : $as_template) &&
						method_exists($module, 'allow_region') &&
						$module->allow_region($region) &&
						method_exists($module, 'output_widget')
					)
						$as_content['widgets'][$region][$place][]=$module; // if module loaded and happy to be displayed here, tell theme about it
				}
			}

		$logoshow=as_opt('logo_show');
		$logourl=as_opt('logo_url');
		$logowidth=as_opt('logo_width');
		$logoheight=as_opt('logo_height');

		if ($logoshow)
			$as_content['logo']='<a href="'.as_path_html('').'" class="js-logo-link" title="'.as_html(as_opt('site_title')).'">'.
				'<img src="'.as_html(is_numeric(strpos($logourl, '://')) ? $logourl : as_path_to_root().$logourl).'"'.
				($logowidth ? (' width="'.$logowidth.'"') : '').($logoheight ? (' height="'.$logoheight.'"') : '').
				' border="0" alt="'.as_html(as_opt('site_title')).'"/></a>';
		else
			$as_content['logo']='<a href="'.as_path_html('').'" class="js-logo-link">'.as_html(as_opt('site_title')).'</a>';

		$topath=as_get('to'); // lets user switch between login and register without losing destination page

		$userlinks=as_get_login_links(as_path_to_root(), isset($topath) ? $topath : as_path($request, $_GET, ''));

		$as_content['navigation']['user']=array();

		if (as_is_logged_in()) {
			$as_content['loggedin']=as_lang_html_sub_split('main/logged_in_x', AS_FINAL_EXTERNAL_USERS
				? as_get_logged_in_user_html(as_get_logged_in_user_cache(), as_path_to_root(), false)
				: as_get_one_user_html(as_get_logged_in_handle(), false)
			);

			$as_content['navigation']['user']['updates']=array(
				'url' => as_path_html('updates'),
				'label' => as_lang_html('main/nav_updates'),
			);

			if (!empty($userlinks['logout']))
				$as_content['navigation']['user']['logout']=array(
					'url' => as_html(@$userlinks['logout']),
					'label' => as_lang_html('main/nav_logout'),
				);

			if (!AS_FINAL_EXTERNAL_USERS) {
				$source=as_get_logged_in_source();

				if (strlen($source)) {
					$loginmodules=as_load_modules_with('login', 'match_source');

					foreach ($loginmodules as $module)
						if ($module->match_source($source) && method_exists($module, 'logout_html')) {
							ob_start();
							$module->logout_html(as_path('logout', array(), as_opt('site_url')));
							$as_content['navigation']['user']['logout']=array('label' => ob_get_clean());
						}
				}
			}

			$notices=as_db_get_pending_result('notices');
			foreach ($notices as $notice)
				$as_content['notices'][]=as_notice_form($notice['noticeid'], as_viewer_html($notice['content'], $notice['format']), $notice);

		} else {
			require_once AS_INCLUDE_DIR.'util/string.php';

			if (!AS_FINAL_EXTERNAL_USERS) {
				$loginmodules=as_load_modules_with('login', 'login_html');

				foreach ($loginmodules as $tryname => $module) {
					ob_start();
					$module->login_html(isset($topath) ? (as_opt('site_url').$topath) : as_path($request, $_GET, as_opt('site_url')), 'menu');
					$label=ob_get_clean();

					if (strlen($label))
						$as_content['navigation']['user'][implode('-', as_string_to_words($tryname))]=array('label' => $label);
				}
			}

			if (!empty($userlinks['login']))
				$as_content['navigation']['user']['login']=array(
					'url' => as_html(@$userlinks['login']),
					'label' => as_lang_html('main/nav_login'),
				);

			if (!empty($userlinks['register']))
				$as_content['navigation']['user']['register']=array(
					'url' => as_html(@$userlinks['register']),
					'label' => as_lang_html('main/nav_register'),
				);
		}

		if (AS_FINAL_EXTERNAL_USERS || !as_is_logged_in()) {
			if (as_opt('show_notice_visitor') && (!isset($topath)) && (!isset($_COOKIE['as_noticed'])))
				$as_content['notices'][]=as_notice_form('visitor', as_opt('notice_visitor'));

		} else {
			setcookie('as_noticed', 1, time()+86400*3650, '/', AS_COOKIE_DOMAIN); // don't show first-time notice if a user has logged in

			if (as_opt('show_notice_welcome') && (as_get_logged_in_flags() & AS_USER_FLAGS_WELCOME_NOTICE) )
				if ( ($requestlower!='confirm') && ($requestlower!='account') ) // let people finish registering in peace
					$as_content['notices'][]=as_notice_form('welcome', as_opt('notice_welcome'));
		}

		$as_content['script_rel']=array('js-content/jquery-1.11.3.min.js');
		$as_content['script_rel'][]='js-content/js-page.js?'.AS_VERSION;

		if ($voting)
			$as_content['error']=@$as_page_error_html;

		$as_content['script_var']=array(
			'as_root' => as_path_to_root(),
			'as_request' => $request,
		);

		return $as_content;
	}

	function as_latest_errors()	{	
		echo '<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Errors</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">';
                    $myfile = file("as_error_logs.txt");
					$file_lines = count($myfile);
					for ($i = max(5, $file_lines-6); $i < $file_lines; $i++) {
					//for ($i = 5; $i < $file_lines; $i++) {
						$err_cont = explode("|", $myfile[$i]);
							echo '<b>'.$err_cont[1].'</b><br>'.
								$err_cont[3].' - <i>'.
								as_timeago_now($err_cont[0]).'</i><hr class="hor_ln">'; 
					}
					
                echo '</ul>
                </div>
                <div class="box-footer text-center">
                  <a href="as_site.php?as_request=view_errors" class="uppercase">View All Errors</a>
                </div>
              </div>';
		
	}
	       
	function as_latest_saleitems(){
		$as_db_query = "SELECT * FROM as_saleitem ORDER BY saleitemid DESC LIMIT 5";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
          echo '<li class="saleitem">
		      <div class="product-img"><img src="'.as_mainUrl_Story().'/'.$row['saleitem_img'].'" alt="Story" /></div>
			  <div class="product-info">
				<a href="as_saleitem.php?as_request=view_saleitem&amp;as_saleitemid='.$row['saleitemid'].'" class="product-title">'.substr($row['saleitem_title'], 0,25).'<span class="label label-warning pull-right">'.as_saleitem_cart($row['saleitem_cat']).'</span></a>
				<span class="product-description">'.substr($row['saleitem_content'],0,75).'</span>
			  </div>
			</li> ';		                            
		}		
	}





	function as_latest_users(){
		$as_db_query = "SELECT * FROM as_user ORDER BY userid DESC LIMIT 8";
		$database = new As_Dbconn();		
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
		    echo '<li>
				  <img style="height: 100%!important;" src="'.as_mainUrl_Ava().$row['user_avatar'].'" alt="'.$row['user_fname'].'">
				  <a class="users-list-name" href="#">'.$row['user_surname'].'</a>
				  <span class="users-list-date">'.date("j/m/y", strtotime($row['user_joined'])).'</span>
				</li>';
		}				
	}
	
	
	function revereFile(){
		
					/* for ($i=max(0, count($myfile)-5); $i < count($myfile); $i++) {
						//echo fgets($myfile).'<br>';
						$err_cont = explode("|", fgets($myfile));
						echo $err_cont[1].'<br>';
					} 
					while(!feof($myfile))
					{
						$err_cont = explode("|", fgets($myfile));
						echo '<b>'.$err_cont[1].'</b><br>'.as_timeago_now($err_cont[0]).'<hr class="hor_ln">';
					}
					*/
					
					$myfile = fopen("as_error_logs.txt", "r");
					$pos = 10;
					$linesToShow = 5;
					$counter = 0;
					$lines = array();
					$currentLine = '';
					
					while(-1 !== fseek($myfile, $pos, SEEK_END)){
						$char = fgetc($myfile);
						if (PHP_EOL == $char) {
							$lines[] = $currentLine;
							$currentLine = '';
						} else {
							$currentLine = $char.$currentLine;
						}
						$pos--;
						echo $char;
						//echo $char.'<br>';
					}		
					$lines[] = $currentLine;			
					/*
					while ($counter <= $linesToShow && 1 !== fseek($myfile, $pos, SEEK_END)){
						$char = fgetc($myfile);
						if (PHP_EOL == $char) {
							$lines[] = $currentLine;
							$currentLine = '';
							echo $currentLine;
						} else {
							$currentLine = $char.$currentLine;
							echo $currentLine;
						}
						$pos--;
						$counter++;
					}*/
					fclose($myfile);
	}
	
	function as_error_message()
	{
		if( isset($_SESSION['AS_ERRMSG_ARR']) && is_array($_SESSION['AS_ERRMSG_ARR']) && count($_SESSION['AS_ERRMSG_ARR']) >0 ) { ?>
		<div class="col-error panel panel-default">
			<ul class="panel-body as_list">							
			<?php foreach($_SESSION['AS_ERRMSG_ARR'] as $as_error_msg) { ?>
				<li class="as_error" id="as_error"><?php echo $as_error_msg ?></li>
			<?php } ?>
			</ul>
		  </div>
		<?php unset($_SESSION['AS_ERRMSG_ARR']); 
		}
	}
	
	function as_success_message()
	{
		if( isset($_SESSION['AS_SUCCMSG_ARR']) && is_array($_SESSION['AS_SUCCMSG_ARR']) && count($_SESSION['AS_SUCCMSG_ARR']) >0 ) { ?>
		<div class="col-success panel panel-default">
			<ul class="panel-body as_list">							
			<?php foreach($_SESSION['AS_SUCCMSG_ARR'] as $as_succ_msg) { ?>
				<li class="as_success" id="as_success"><?php echo $as_succ_msg ?></li>
			<?php } ?>
			</ul>
		  </div>
		<?php unset($_SESSION['AS_SUCCMSG_ARR']); 
		}
	}
?>