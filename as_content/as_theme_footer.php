<!-- /social links -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+254 711 47 47 87<br>
								<a href="mailto:smataweb@gmail.com">smataweb@gmail.com</a><br>
								<br>
								Nairobi, Kenya
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href="http://twitter.com/jaksiro"><i class="fa fa-twitter fa-2"></i></a>
								<a href="http://github.com/jacksiro"><i class="fa fa-github fa-2"></i></a>
								<a href="http://facebook.com/jaksiro"><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Jackson Siro</h3>
						<div class="widget-body">
							<p>In trying to make the world a better place am left feeling gaps left by others by coding for Jesus. My apps are available on Windows Phone!
</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="<?php echo as_siteUrl ?>index<?php echo as_urlExt ?>">HOME</a> | 
								<a href="<?php echo as_siteUrl ?>english/quotes<?php echo as_urlExt ?>">ENGLISH</a> | 
								<a href="<?php echo as_siteUrl ?>french/quotes<?php echo as_urlExt ?>">FRANÇAIS</a> | 
								<a href="<?php echo as_siteUrl ?>spanish/quotes<?php echo as_urlExt ?>">ESPAÑOL</a> | 
								<a href="<?php echo as_siteUrl ?>portugues/quotes<?php echo as_urlExt ?>">PORTUGUÊS</a> 
								<a href="<?php echo as_siteUrl ?>account/signin<?php echo as_urlExt ?>"><></a>
							</p>
						</div>
					</div>
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; <?php echo as_siteTitle.' '.date('Y') ?> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="<?php echo as_siteUrl ?>as_themes/progressus/js/headroom.min.js"></script>
	<script src="<?php echo as_siteUrl ?>as_themes/progressus/js/jQuery.headroom.min.js"></script>
	<script src="<?php echo as_siteUrl ?>as_themes/progressus/js/template.js"></script>
	
	<script type="text/javascript" src="<?php echo as_siteUrl ?>as_apps/as_tinymce/tinymce.min.js"></script>
	    <script type="text/javascript">
	        tinymce.init({
	            selector: "#full_post", height : 500,
	            plugins: "image wordcount resize autolink imagetools contextmenu media table spellchecker textcolor emoticons", 
	            image_advtab: true,
                    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
                    contextmenu: "link image inserttable | cell row column deletetable",
                    tools: "inserttable spellchecker",
	        });
	    </script>
</body>
</html>