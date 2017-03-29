<?php
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Sign in to your Account';
	$database = new As_Dbconn();
	$inloginname = as_post_text('loginname');
	$inloginkey = as_post_text('loginkey');
	$inremember = as_post_text('remember_me');

	if (as_clicked('LetMeIn') && (strlen($inloginname) || strlen($inloginkey)) ) {
		if (strpos($inloginname, '@')!==false) {// handles can't contain @ symbols
			$matchusers=as_db_user_find_by_email($inloginname);
		} else {
			$matchusers=as_db_user_find_by_username($inloginname);
		}
		
		if (count($matchusers)==1) { 
			$inuserid=$matchusers[0];
			if (as_login_user($inuserid, md5($inloginkey))) {
				$as_db_query = "SELECT * FROM as_user WHERE userid='$inuserid'";
				list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_location, 
					$user_mobile, $user_email, $user_group, $user_level) = $database->get_row( $as_db_query );
				as_set_logged_in_user($userid, $user_name, $user_level);	
				header('Location: '.as_siteUrl.'index'.as_urlExt );
			} else {
				header('Location: '.as_siteUrl.'account/password_wrong'.as_urlExt );	
				//$errors['password']=as_lang('users/password_wrong');
			}
		} else {
			//$errors['emailhandle']=as_lang('users/user_not_found');
			header('Location: '.as_siteUrl.'account/user_not_found'.as_urlExt );
		}
	}
	
	require_once AS_FUNC."as_paging.php";		
	include as_site_theme("as_theme_header.php");
 ?>
<!-- /.navbar -->

	<header id="head" class="secondary"></header>

		
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title"><?php echo $as_pageinfo['pageTitle'] ?></h1>
				</header>
				<?php
					if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
									
					foreach($_SESSION['ERRMSG_ARR'] as $msg) {
						echo '<div class="error" id="error">',$msg,'</div>'; 
					}
					unset($_SESSION['ERRMSG_ARR']);
				} 
				?>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							<hr>
							
							<form action="<?php echo as_siteUrl.'account/signin'.as_urlExt ?>" method="post" enctype="multipart/form-data" id="login">
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" name="loginname" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" name="loginkey" class="form-control" required>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Forgot password?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<input class="btn btn-action" type="submit" name="LetMeIn" value="SIGN IN"/>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->
			<!--
			<div class="box-content">
			<ul class="acount">
					<li><a href="<?php// echo as_siteUrl ?>account/login">Login</a> / <a href="<?php //echo as_siteUrl ?>account/register">Register</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/forgotten">Forgotten Password</a></li>
					<li><a href="<?php //echo as_siteUrl ?>account/account">My Account</a></li>
					<li><a href="<?php //echo as_siteUrl ?>account/address">Address Books</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/wishlist">Wish List</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/order">Order History</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/download">Downloads</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/return">Returns</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/transaction">Transactions</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/newsletter">Newsletter</a></li>
				  </ul>
		  </div>-->
		</div>
	</div>	<!-- /container -->

<?php  include as_site_theme("as_theme_footer.php");  ?>