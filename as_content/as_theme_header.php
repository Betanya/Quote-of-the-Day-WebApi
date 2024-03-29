<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $pageTitle ?></title>
	<meta name="keywords" content="<?php echo $pageKeywords ?>">
	<meta name="description" content="<?php echo $pageDescription ?>">
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
	
	<link rel="shortcut icon" href="<?php echo as_siteUrl ?>as_themes/progressus/images/favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/progressus/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/progressus/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/progressus/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/progressus/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php //echo as_siteUrl ?>as_themes/progressus/js/html5shiv.js"></script>
	<script src="<?php //echo as_siteUrl ?>as_themes/progressus/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="<?php echo as_siteUrl ?>index<?php echo as_urlExt ?>"><img src="<?php echo as_siteUrl ?>as_themes/progressus/images/logo.jpg" alt="<?php echo $pageTitle ?>"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a class="btn" href="<?php echo as_siteUrl ?>index<?php echo as_urlExt ?>">HOME</a></li>
					<li><a class="btn" href="<?php echo as_siteUrl ?>english/quotes<?php echo as_urlExt ?>">ENGLISH</a></li>
					<li><a class="btn" href="<?php echo as_siteUrl ?>french/quotes<?php echo as_urlExt ?>">FRANÇAIS</a></li>
					<li><a class="btn" href="<?php echo as_siteUrl ?>spanish/quotes<?php echo as_urlExt ?>">ESPAÑOL</a></li>
					<li><a class="btn" href="<?php echo as_siteUrl ?>portugues/quotes<?php echo as_urlExt ?>">PORTUGUÊS</a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>-->
					<?php	if (as_user_is_logged()) { ?>
								<?php	if (as_user_is_admin($user_level)) { ?>
									<li><a class="btn" style="background:darkred" href="<?php echo as_siteUrl.'admin'.as_urlExt ?>" target="_blank">ADMIN</a></li>
								<?php } ?>
									<li><a class="btn" href="<?php echo as_siteUrl.'account/signout' ?>">SIGN OUT</a></li>
							<?php } ?>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
