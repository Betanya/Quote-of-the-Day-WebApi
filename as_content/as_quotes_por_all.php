<?php
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Latest Portuguess Quotes';
	$database = new As_Dbconn();
	
	require_once AS_FUNC."as_paging.php";		
	include as_site_theme("as_theme_header.php");
 ?>
<!-- /.navbar -->

	<header id="head" class="secondary"></header>

		
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Portuguess Quotes</li>
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
				
					$as_db_query = "SELECT * FROM as_quote WHERE quote_lang='pt'";
					$results = $database->get_results( $as_db_query );
				?>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
						 <?php foreach( $results as $row ) { ?>
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="width:100%;">
										<tr>
										<td style="width:30px;height:60px;">
										<center><h4><?php $MyDate = explode("-", $row['quote_date']); 
										echo getMonSufEN($MyDate[1])." ".getDaySufEN($MyDate[2]); ?></h4></center>
										</td>
										<td>					
										<h4><?php echo $row['quote_title'].' ['.$row['quote_code'].']' ?></h4>
										<h5><b><?php echo $row['quote_bible'].'</b> '.$row['quote_bread'] ?></h5>
										</td>
									</tr>
									</table>
								</div>
							</div>
						 <?php } ?>
						</div>
					</div>

				</div>
				
			</article>
			
		</div>
	</div>

<?php  include as_site_theme("as_theme_footer.php");  ?>