<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_timeago($ptime) {
		if ($ptime) 
		{
			$estimate_time = time() - strtotime($ptime);
			if ($estimate_time < 1) {
				return 'just now';
			}
			$condition = array(
						12 * 30 * 24 * 60 * 60	 => 'year',
						30 * 24 * 60 * 60		 => 'month',
						24 * 60 * 60			 => 'day',
						60 * 60					 => 'hour',
						60						 => 'minute',
						1						 => 'second',
			);
			foreach($condition as $secs => $str) {
				$d = $estimate_time / $secs;
				if ($d >= 1) {
					$r = round($d);
					return $r.' '.$str.($r > 1 ? 's' : '').' ago';
				}
			}
		} else return "";
	}
	
	function as_timeago_now($ptime) {
		if ($ptime) 
		{
			$estimate_time = time() - strtotime($ptime);
			if ($estimate_time < 1) {
				return 'just now';
			}
			$condition = array(
						12 * 30 * 24 * 60 * 60	 => 'yr',
						30 * 24 * 60 * 60		 => 'mon',
						24 * 60 * 60			 => 'day',
						60 * 60					 => 'hr',
						60						 => 'min',
						1						 => 'sec',
			);
			foreach($condition as $secs => $str) {
				$d = $estimate_time / $secs;
				if ($d >= 1) {
					$r = round($d);
					return $r.' '.$str.($r > 1 ? 's' : '').' ago';
				}
			}
		} else return "";
	}
	
	function as_online_last($ptime) {
		if (strtotime($ptime) <= 0) {
			return 'never';
		}
		
		$estimate_time = time() - strtotime($ptime);
		if ($estimate_time < 60) {
			return 'online';
		}
		$condition = array(
					12 * 30 * 24 * 60 * 60	 => 'year',
					30 * 24 * 60 * 60		 => 'month',
					24 * 60 * 60			 => 'day',
					60 * 60					 => 'hour',
					60						 => 'minute',
					1						 => 'second',
		);
		foreach($condition as $secs => $str) {
			$d = $estimate_time / $secs;
			if ($d >= 1) {
				$r = round($d);
				return $r.' '.$str.($r > 1 ? 's' : '').' ago';
			} 
		}
	}
	
	function as_user_sex($val){
		switch ( $val ) {
			case 1:
				return 'M';
				break;
			case 2:
				return 'F';
				break;
			default:
				return 'O';
		}
	}
	
	function as_user_sexfull($val){
		switch ( $val ) {
			case 1:
				return 'Male';
				break;
			case 2:
				return 'Female';
				break;
			default:
				return 'Other';
		}
	}
	
	function as_user_grp($grp){
		switch ( $grp ) {
			case 1:
				return 'Administrator';
				break;
			case 2:
				return 'Client Member';
				break;
			default:
				return 'Normal Member';
		}
	}
	
	function as_is_homepage($val){
		switch ( $val ) {
			case 1:
				return true;
				break;
			default:
				return false;
		}
	}
	
	function as_get_itemState($val){
		switch ( $val ) {
			case 3:
				return '<span class="label label-danger">Trashed</span>';
				break;
			case 2:
				return '<span class="label label-warning">Unpublished</span>';
				break;
			case 1:
				return '<span class="label label-info">Published</span></>';
				break;
			default:
				return '<span class="label label-success">Draft</span>';
		}
	}
	
	function as_user_lvl($lev) {
		switch ( $lev ) {
			case 5:
				return 'Super-Admin';
				break;
			case 4:
				return 'Admin';
				break;
			case 3:
				return 'Manager';
				break;
			case 2:
				return 'Expert';
				break;
			case 1:
				return 'Editor';
				break;
			default:
				return 'User';
		}
	}
			
    function as_select_category_saleitems(){
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_saleitem_category";
		$results = $database->get_results( $as_db_query );
        echo '<option value=""> Select Category </option>';
		
		foreach( $results as $row )
		{
			echo '<option value="'.$row['categoryid'].'"> '.$row['category_title'].' </option>';		                            
		}				
	}
	
	function as_select_pages(){
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_page WHERE page_state =1";
		$results = $database->get_results( $as_db_query );
        foreach( $results as $row ) 
		{
			echo '<option value="'.$row['pageid'].'"> '.$row['page_title'].' </option>';		                            
		}	
	}
	
	function getDaySufEN($day) {
		switch ($day) {
	        case 1:  return $day+"st";
	        case 2:  return $day+"nd";
	        case 3:  return $day+"rd";
	        case 21:  return $day+"st";
	        case 22:  return $day+"nd";
	        case 23:  return $day+"rd";
	        case 31:  return $day+"st";
	        default: return $day+"th";
	    }
	}
	
	function getMonSufEN($mon) {
		switch ($mon) {
	        case 1:  return "jan";
	        case 2:  return "feb";
	        case 3:  return "mar";
	        case 4:  return "apr";
	        case 5:  return "may";
	        case 6:  return "jun";
	        case 7:  return "jul";
	        case 8:  return "aug";
	        case 9:  return "sep";
	        case 10:  return "oct";
	        case 11:  return "nov";
	        case 12:  return "dec";
	        default: return "";
	    }
	}
	
    function as_select_menu_menuitems(){
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_menu where menu_state=1";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
			echo '<option value="'.$row['menuid'].'"> '.$row['menu_title'].' </option>';		                            
		}				
	}
	
	function as_selected_menu_menuitems($menu){
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_menu where menu_state=1";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
			echo '<option value="'.$row['menuid'].'" ';
			if ($row['menuid'] == $menu) echo 'selected';
			echo '> '.$row['menu_title'].' </option>';		                            
		}
	}
	
	function as_type_of_link($ltype){
		if ($ltype == 1) {
			return "Normal Link";
		} else if ($ltype == 2) {
			return "External Link";
		} else if ($ltype == 3) {
			return "Page Link";
		}
	}
	
	function as_type_of_linkshow($ltype, $link){
		if ($ltype == 1) {
			return as_siteUrl.$link.as_urlExt;
		} else if ($ltype == 2) {
			return $link;
		} else if ($ltype == 3) {
			return as_siteUrl.$link.as_urlExt;
		}
	}
	
	function as_total_saleitems(){
		$as_db_query = "SELECT * FROM as_saleitem";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
		
	function as_total_users(){
		$as_db_query = "SELECT * FROM as_user";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );		
	}
          	
	function as_total_errors(){
		$linecount = 0;
		$myfile = fopen("as_error_logs.txt", "r");
		while(!feof($myfile))
		{
			$line = fgets($myfile);
			$linecount++; 			
		}
		fclose($myfile);
		return $linecount;
	}
	
	function as_total_quotes_lang($lang){
		$as_db_query = "SELECT * FROM as_quote WHERE quote_lang='$lang'";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_menu_name($menuid){		
		$as_db_query = "SELECT * FROM as_menu WHERE menuid = '$menuid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $menuid, $menu_title, $menu_slag) = $database->get_row( $as_db_query );
		} 
		return $menu_title;
	}
	
	function as_usersnames($userid){		
		$as_db_query = "SELECT * FROM as_user WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_mobile, $user_email, $user_group, $user_level, $user_avatar, $user_joined, $user_lastseen, $user_updated) = $database->get_row( $as_db_query );
		} 
		return $user_fname.' '.$user_sname;
	}
	
	function as_saleitem_client($clientid)
	{
		$as_db_query = "SELECT * FROM as_saleitem_user WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_fullname, $client_sex, $client_mobile, $client_email, $client_location) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else return "Anonymous";
	}
	
	function as_saleitem_category($categoryid) {
		$as_db_query = "SELECT * FROM as_saleitem_category WHERE categoryid = '$categoryid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $categoryid, $category_slug, $category_title) = $database->get_row( $as_db_query );
		    return $category_title;
		} else  {
		    return false;
		}
		
	}

	function as_select_page(){
		$as_db_query = "SELECT * FROM as_page WHERE page_state=1";
		$database = new As_Dbconn();		
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
			echo "<option value='".$row['pageid']."'>".$row['page_title']."</option>";		                            
		}	
	}
	
	function as_select_client(){
		$as_db_query = "SELECT * FROM as_user";
		$database = new As_Dbconn();		
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
			echo "<option value='".$row['userid']."'>".$row['user_fname']." ".$row['user_sname']."</option>";		                            
		}	
	}
	
	function as_confirmed($concode) {
	  if ($concode == 3571240144) return "";
	}
	
	function as_show_error($content){
		$as_errmsg_arr[] = $content;
		$as_errflag = true;
		$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
	}
	
	function as_show_success($content){
		$as_succmsg_arr[] = $content;
		$as_succflag = true;
		$_SESSION['AS_SUCCMSG_ARR'] = $as_succmsg_arr;
	}
	
	function as_setLink($pagelink)
	{
		return as_siteUrl.$pagelink.as_urlExt;
	}
	
?>