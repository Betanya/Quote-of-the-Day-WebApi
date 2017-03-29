<?php 
	
	$database = new As_Dbconn();	
	$as_db_query = "SELECT * FROM as_page WHERE page_homepage=1";		
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $pageid,$page_homepage,$page_title,$page_content,$page_slug, $page_state,$page_views) = $database->get_row( $as_db_query );
				
	}
	
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = $page_title;
	$as_pageinfo['pageContent'] = $page_content;
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	$as_page = isset( $_GET['as_page'] ) ? $_GET['as_page'] : "";
	$quote_id = isset( $_GET['as_quoteid'] ) ? $_GET['as_quoteid'] : "";
	include as_site_theme("as_theme_header.php"); 
?>
	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead" style="text-transform:uppercase;"><?php echo as_siteTitle ?></h1>
				<p class="tagline"><?php echo as_get_option('as_sitetagline') ?></p>
				<p><a class="btn btn-default btn-lg" role="button" href="#more_info">MORE INFO</a> <a class="btn btn-action btn-lg" role="button" href="#download_now">DOWNLOAD NOW</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<header class="page-header">
			<h1 class="page-title"><?php echo $as_pageinfo['pageTitle'] ?></h1>
		</header>
		<p class="text-muted">
			<?php echo $page_content ?>
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			<div class="row">
				<article class="col-sm-12 maincontent">
					<?php as_error_message();
						as_success_message(); ?>
		
					<center>
					<h1 id="download_now">Get a Quote of the Day anywhere</h1>
					<h3>
						Get Quotes of the day on your mobile phone anytime, anywhere without having to go to the branham.org website to copy paste quotes.
					</h3>
					<br>
					<table>
						<tr>
							<td><a href="https://www.amazon.com/Jackson-Siro-Quote-The-Day/dp/B01MD17577"/><img src="<?php echo as_siteUrl ?>as_media/amazon.png" height="75px"/></a></td>
							<td><a href="https://play.google.com/store/apps/details?id=com.jackson_siro.qotday"/><img src="<?php echo as_siteUrl ?>as_media/playstore.png" height="75px"/></a></td>
							<td><a href="https://www.microsoft.com/en-us/store/p/a-quote-of-the-day/9nblggh5344c"/><img src="<?php echo as_siteUrl ?>as_media/windows.png" height="75px"/></a></td>
						</tr>
					</table>
					</center>
				</article>
				
		</div> <!-- /row  -->
		
		</div>
	</div>
	<!-- /Highlights -->

	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
<?php  include as_site_theme("as_theme_footer.php");  ?>