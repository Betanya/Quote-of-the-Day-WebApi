<?php 
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = "Dashboard";
	$as_pageinfo['pageAction'] = "Dashboard";
	
	require_once AS_FUNC."as_options.php";
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	include AS_CONT."admin/theme_header.php";
?>
      <aside class="main-sidebar">
        <section class="sidebar">
			<?php include AS_CONT."admin/theme_leftsidebar.php"; ?>
		</section>
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo 'Administrator | <small style="text-transform:uppercase">'.$pageAction.'</small>' ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $pageAction ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="clearfix visible-sm-block"></div>
	
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">English Quotes</span>
                  <span class="info-box-number"><h3><?php echo as_total_quotes_lang('en') ?></h3></span>
                </div>
              </div>
			  
			  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest English Quotes</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_quote WHERE quote_lang='en' ORDER BY quoteid DESC LIMIT 10";
					$results = $database->get_results( $as_db_query );
					
					if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
					<h4>There are no English quotes here yet. Start by posting one...</h4>					 
					<?php } else { ?>
					<table class="table no-margin">                      
                    <?php foreach( $results as $row ) { ?>
						<tr onclick="location='<?php echo as_adminUrl ?>?as_request=quote_view&amp;as_quoteid=<?php echo $row['quoteid'] ?>'" style="height: 20px;">
							<td width="50px"><?php $MyDate = explode("-", $row['quote_date']); echo getMonSufEN($MyDate[1])." ".getDaySufEN($MyDate[2]); ?></td>
							<td class="as_overflow"><?php echo $row['quote_title'] ?><br><?php echo $row['quote_bible'] ?> </td>
						</tr>
					
					<?php } ?>			
                    </table> 
					<?php } ?>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_new" class="btn btn-sm btn-info btn-flat pull-left">New Quote</a>
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_all" class="btn btn-sm btn-default btn-flat pull-right">View All</a> 
                </div>
              </div>
			  
            </div> 
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">FRENCH QUOTES</span>
                  <span class="info-box-number"><h3><?php echo as_total_quotes_lang('fr') ?></h3></span>
                </div>
              </div>
			  
			  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest French Quotes</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_quote WHERE quote_lang='fr' ORDER BY quoteid DESC LIMIT 10";
					$results = $database->get_results( $as_db_query );
					
					if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
					<h4>There are no French quotes here yet. Start by posting one...</h4>					 
					<?php } else { ?>
					<table class="table no-margin">                      
                    <?php foreach( $results as $row ) { ?>
						<tr onclick="location='<?php echo as_adminUrl ?>?as_request=quote_view&amp;as_quoteid=<?php echo $row['quoteid'] ?>'">
							<td width="50px"><?php $MyDate = explode("-", $row['quote_date']); echo getMonSufEN($MyDate[1])." ".getDaySufEN($MyDate[2]); ?></td>
							<td class="as_overflow"><?php echo $row['quote_title'] ?><br><?php echo $row['quote_bible'] ?> </td>
						</tr>
					
					<?php } ?>			
                    </table> 
					<?php } ?>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_new" class="btn btn-sm btn-info btn-flat pull-left">New Quote</a>
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_all" class="btn btn-sm btn-default btn-flat pull-right">View All</a> 
                </div>
              </div>
			  
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">SPANISH QUOTES</span>
                  <span class="info-box-number"><h3><?php echo as_total_quotes_lang('es') ?></h3></span>
                </div>
              </div>
			  
			  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Spanish Quotes</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_quote WHERE quote_lang='es' ORDER BY quoteid DESC LIMIT 10";
					$results = $database->get_results( $as_db_query );
					
					if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
					<h4>There are no Spanish quotes here yet. Start by posting one...</h4>					 
					<?php } else { ?>
					<table class="table no-margin">                      
                    <?php foreach( $results as $row ) { ?>
						<tr onclick="location='<?php echo as_adminUrl ?>?as_request=quote_view&amp;as_quoteid=<?php echo $row['quoteid'] ?>'">
							<td width="50px"><?php $MyDate = explode("-", $row['quote_date']); echo getMonSufEN($MyDate[1])." ".getDaySufEN($MyDate[2]); ?></td>
							<td class="as_overflow"><?php echo $row['quote_title'] ?><br><?php echo $row['quote_bible'] ?> </td>
						</tr>
					
					<?php } ?>			
                    </table> 
					<?php } ?>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_new" class="btn btn-sm btn-info btn-flat pull-left">New Quote</a>
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_all" class="btn btn-sm btn-default btn-flat pull-right">View All</a> 
                </div>
              </div>
			  
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">PORTUGUESE QUOTES</span>
                  <span class="info-box-number"><h3><?php echo as_total_quotes_lang('pt') ?></h3></span>
                </div>
              </div>
			  
			  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Portuguese Quotes</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_quote WHERE quote_lang='pt' ORDER BY quoteid DESC LIMIT 10";
					$results = $database->get_results( $as_db_query );
					
					if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
					<h4>There are no Portuguese quotes here yet. Start by posting one...</h4>					 
					<?php } else { ?>
					<table class="table no-margin">                      
                    <?php foreach( $results as $row ) { ?>
						<tr onclick="location='<?php echo as_adminUrl ?>?as_request=quote_view&amp;as_quoteid=<?php echo $row['quoteid'] ?>'">
							<td width="50px"><?php $MyDate = explode("-", $row['quote_date']); echo getMonSufEN($MyDate[1])." ".getDaySufEN($MyDate[2]); ?></td>
							<td class="as_overflow"><?php echo $row['quote_title'] ?><br><?php echo $row['quote_bible'] ?> </td>
						</tr>
					
					<?php } ?>			
                    </table> 
					<?php } ?>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_new" class="btn btn-sm btn-info btn-flat pull-left">New Quote</a>
                  <a href="<?php echo as_adminUrl ?>?as_request=quote_all" class="btn btn-sm btn-default btn-flat pull-right">View All</a> 
                </div>
              </div>
			  
            </div>

          </div>

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             			  
            </div>

			 <div class="col-md-4"> 

            </div>
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>

<?php include AS_CONT."admin/theme_control_sidebar.php"; ?>
</ul>
          </div>

<?php include AS_CONT."admin/theme_settings_tab.php"; ?>
</div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>
<?php include AS_CONT."admin/theme_bottom.php"; ?>

