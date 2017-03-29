<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "View Quote";
	$as_pageinfo['pageAction'] = "Edit a Quote";	
	$as_pageinfo['formAction'] = "?as_request=quote_view&&as_quoteid=".$as_quoteid;
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	$as_quoteid = isset( $_GET['as_quoteid'] ) ? $_GET['as_quoteid'] : "";			
	$as_db_query = "SELECT * FROM as_quote WHERE quoteid = '$as_quoteid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $quoteid, $quote_title, $quote_code, $quote_text, $quote_bible, $quote_bread, $quote_audio, $quote_date, $quote_posted, $quote_lang) = $database->get_row( $as_db_query );
		$as_pageinfo['quote'] = $quoteid;
	} else  {
		return false;
		header( "Location: ".as_adminUrl."as_quotes.php");
	}
	$inquotetitle = as_post_text('quote_title');
	$inquotecode = as_post_text('quote_code');
	$inquotetext = as_post_text('quote_text');
	$inquotebible = as_post_text('quote_bible');
	$inquotebread = as_post_text('quote_bread');
	$inquoteaudio = as_post_text('quote_audio');
	$inquotedate = as_post_text('quote_date');
	$inquotelang = as_post_text('quote_lang');

	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=quote_all");
	} else if (as_clicked('PostAndClose')) {
		as_add_new_quote($inquotetitle, $inquotecode, $inquotetext, $inquotebible, 
			$inquotebread, $inquoteaudio, $inquotedate, $inquotelang);
		
		header( "Location: ".as_adminUrl."?as_request=quote_all");
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_quote($inquotetitle, $inquotecode, $inquotetext, $inquotebible, 
			$inquotebread, $inquoteaudio, $inquotedate, $inquotelang);			
		header( "Location: ".as_adminUrl."?as_request=quote_new");
	}
	
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
            <li><a href="#"><?php echo $as_pageinfo['pageTitle'] ?></a></li>
            <li class="active"><?php echo $as_pageinfo['pageAction'] ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <div class="col-md-4">
	    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Quote Items</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
				<?php 
					$as_db_query = "SELECT * FROM as_quote ORDER BY quoteid DESC LIMIT 7";
					$results = $database->get_results( $as_db_query );
					?>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php foreach( $results as $row ) { ?>
					<li class="list_items">
					<table>
						<tr>
						<td width="60">
						<center><h5><?php echo $row['quote_date'].' ['.$row['quote_lang'].']' ?></h5>
						</td>
						<td>					
						<h4><?php echo $row['quote_title'] ?></h4>
						<h5><?php echo $row['quote_code'].' ['.$row['quote_bible'].']' ?></h5>
						</td>
					</tr></table>
					</li>
					<?php } ?>
				  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="?as_request=menuitem_all" class="uppercase">View All Quotes</a>
                </div>
              </div>
			</div>
            <div class="col-md-8">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $as_pageinfo['pageAction'].' on '.as_siteTitle ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostNow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                  <div class="box-body">
					
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
							<label for="quote_lang">Language *</label>
						</div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
							<select class="form-control" name="quote_lang">
								<option value="en">English</option>
								<option value="fr">Français</option>
								<option value="es">Español</option>
								<option value="pt">Português</option>
							</select>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
							<label for="quote_date">Date of the Quote *</label>
						</div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
							<input type="text" class="form-control" name="quote_date" value="<?php echo date('Y-m-d') ?>">
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
							<label for="quote_code">Code of the Quote *</label>
						</div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
							<input type="text" class="form-control" name="quote_code">
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label for="quote_title">Title of the Quote *</label>
							<input type="text" class="form-control" name="quote_title">
						  </div>
						</div>
					</div>
					<input type="hidden" name="posting_by" value="<?php echo $as_loginid ?>">
						
				    <div class="row">
                      <div class="col-lg-12">
						<div class="form-group">
							<label for="quote_text">Text of the Quote * </label>
							<textarea name="quote_text" class="form-control"  /></textarea>
					    </div>
					  </div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label for="quote_bible">Bible Scripture *</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" name="quote_bible">
						</div>
					</div>
						
				    <div class="row">
                      <div class="col-lg-12">
						<div class="form-group">
							<label for="quote_bread">Bible Text * </label>
							<textarea name="quote_bread" class="form-control"  /></textarea>
					    </div>
					  </div>
					</div>
						
				    <div class="row">
                      <div class="col-lg-12">
						<div class="form-group">
							<label for="quote_audio">Audio of the Quote * </label>
							<input type="text" class="form-control" name="quote_audio">
					    </div>
					  </div>
					</div>
								
					<div class="box-footer">			
						<div class="row">
							 <div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="CancelPost" class="btn btn-primary form-control" style="float:right;" type="submit" value="Cancel This" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="ResetPost" class="btn btn-primary form-control" type="reset" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostAndClose" class="btn btn-primary form-control" style="float:right;" type="submit" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostAndAdd" class="btn btn-primary form-control" type="submit" value="Save & Add" />
									</div>
								</div>
								
							   </div>
							</div>
							
						</div>	
					</div>
                    </form>                      			
                  </div><!-- /.box-body -->

               
              </div>
			  
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
            <li><a href="#"><?php echo $as_pageinfo['pageTitle'] ?></a></li>
            <li class="active"><?php echo $as_pageinfo['pageAction'] ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
             
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $as_pageinfo['pageAction'].' on '.as_siteTitle ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostStory" action="<?php echo $as_pageinfo['formAction'] ?>">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="Title">Name of the Story *</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $story_title ?>">
                    </div>
                                      <div class="form-group">
                      <label for="Slug">Slug of the Story *</label>
                      <input type="text" class="form-control" name="slug" value="<?php echo $story_slug ?>">
                    </div>
					
				  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label>Category *</label>
                      <select class="form-control" name="category">
                        <option value="<?php echo $story_cat ?>">Please Select</option>										
						<option value="1">Agriculture & Food</option>	
						<option value="2">Construction & Industrial</option>	
						<option value="3">Animals & Pets</option>	
						<option value="4">Electronics & Video</option>	
						<option value="5">Fashion & Beauty</option>	
						<option value="6">Home, Furniture & Garden</option>	
						<option value="7">Mobile Phones & Tablets</option>	
						<option value="8">Real Estate</option>	
						<option value="9">Hobbies, Art & Sport</option>	
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label>Colour *</label>
                      <select class="form-control" name="colour">
                        <option value="<?php echo $other_details ?>">Please Select</option>										
						<option value="1">white</option>	
						<option value="2">Yellow</option>	
						<option value="3">Orange</option>	
						<option value="4">Red</option>	
						<option value="5">Pink</option>	
						<option value="6">Maroon</option>	
						<option value="7">Green</option>	
						<option value="8">Blue</option>	
						<option value="9">Black</option>
						<option value="9">Silver</option>
						<option value="10">Other</option>
                      </select>
                    </div>
                    </div>
                  </div>
				  
					 <div class="row">
                    <div class="col-lg-6">
						<div class="form-group">
						  <label for="Price">Price (KSh) *</label>
						  <input type="text" class="form-control" name="price" value="<?php echo $story_price ?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						  <label for="Weight">Weight (KGs)</label>
						  <input type="text" class="form-control" name="weight">
						</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
						<label for="description">Describe the Story (500 max) *</label>
						<textarea name="content" style="height:130px;" class="form-control"  /><?php echo $story_content ?>"</textarea>
					</div>
					
                    <div class="form-group">
                      <label for="NewStoryImg">Upload an Image</label>
                      <input type="file" name="NewStoryImg">
                    </div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
						<input type="hidden" name="PrevStoryImg" value="<?php echo $story_img ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/image/'.$story_img ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:220px;" >
							</div>
						</div>
					</div>
					
					</div>
						
					<div class="box-footer">			
						<div class="row">
							 <div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="CancelPost" class="btn btn-primary form-control" style="float:right;" type="submit" value="Cancel This" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="ResetStory" class="btn btn-primary form-control" type="reset" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostStory" class="btn btn-primary form-control" style="float:right;" type="submit" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostStoryAdd" class="btn btn-primary form-control" type="submit" value="Save & Add" />
									</div>
								</div>
								
							   </div>
							</div>
							
						</div>	
					</div>
                    </form>                       			
                  </div><!-- /.box-body -->

               
              </div>
			  
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

