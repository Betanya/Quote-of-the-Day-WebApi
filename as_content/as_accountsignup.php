<?php include as_site_theme("as_theme_header.php"); ?>

	<section>
		<div id="container">
			<p id="back-top"> <a href="#top"><span></span></a> </p>
			<div class="container">
			<div id="notification"> </div>
			<div class="row">
			<div class="span9">
				<div class="row">
			<div class="span9  " id="content">  <div class="breadcrumb">
					<a href="<?php echo as_siteUrl.'index'.as_urlExt ?>">Home</a>
					 &raquo; <a href="<?php echo as_siteUrl.'account/account'.as_urlExt ?>">Account</a>
					 &raquo; <a href="<?php echo as_siteUrl.'account/signup'.as_urlExt ?>">Sign Up</a>
				  </div>
			  <h1>Sign Up Account</h1>
			  <p>If you already have an account with us, please sign in at the <a href="<?php echo as_siteUrl.'account/signin'.as_urlExt ?>">login page</a>.</p>
			  <form class="form-horizontal" action="<?php echo as_siteUrl.'account/signup'.as_urlExt ?>" method="post" enctype="multipart/form-data" id="signup">
			  <div class="box-container">
			  <div class="form-content row-fluid">
				<div class="span6">
				  <div class="left">
					<h2>Your Personal Details</h2>
				<div class="content">
				  <table class="form">      
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="firstname"><span class="required">*</span> First Name:</label>
								<div class="controls">
									<input class="q1" type="text" name="firstname" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="lastname"><span class="required">*</span> Last Name:</label>
								<div class="controls">
									<input class="q1" type="text" name="lastname" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="email"><span class="required">*</span> E-Mail:</label>
								<div class="controls">
									<input class="q1" type="text" name="email" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="telephone"><span class="required">*</span> Telephone:</label>
								<div class="controls">
									<input class="q1" type="text" name="telephone" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="fax">Fax:</label>
								<div class="controls">
									<input class="q1" type="text" name="fax" value="" />
								</div>
							</div>
						</td>
					</tr>
				  </table>
				</div>
				<h2>Your Password</h2>
				<div class="content">
				  <table class="form">
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="password"><span class="required">*</span> Password:</label>
								<div class="controls">
									<input class="q1" type="password" name="password" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="confirm"><span class="required">*</span> Password Confirm:</label>
								<div class="controls">
									<input class="q1" type="password" name="confirm" value="" />
															</div>
							</div>
						</td>
					</tr>
				  </table>
				</div>
				<h2>Newsletter</h2>
				<div class="content">
				  <table class="form">
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="newsletter">Subscribe:</label>
								<div class="controls">
																<label class="radio inline">
										<input type="radio" name="newsletter" value="1" />
										Yes							</label>
									<label class="radio inline">
										<input type="radio" name="newsletter" value="0" checked="checked" />
										No							</label>
															</div>
							</div>
						</td>
					</tr>
				  </table>
				</div>
				
				  </div>
				</div>
				<div class="span6">
				  <div class="right">
					<h2>Your Address</h2>
				<div class="content">
				  <table class="form">
					<tr>
					</tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="telephone">Company:</label>
								<div class="controls">
									<input class="q1" type="text" name="company" value="" />
								</div>
							</div>
						</td>
					<tr style="display: none;">
						<td>
							<div class="control-group">
								<label class="control-label" for="customer_group_id">Business Type:</label>
								<div class="controls">
																							<label class="radio" for="customer_group_id1">
										<input type="radio" name="customer_group_id" value="1" id="customer_group_id1" checked="checked" />
										Default							</label>
																						</div>
							</div>
						</td>
					</tr>        
					<tr id="company-id-display">
						<td>
							<div class="control-group">
								<label class="control-label" for="company_id"><span id="company-id-required" class="required">*</span> Company ID:</label>
								<div class="controls">
									<input class="q1" type="text" name="company_id" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr id="tax-id-display">
						<td>
							<div class="control-group">
								<label class="control-label" for="tax_id"><span id="tax-id-required" class="required">*</span> Tax ID:</label>
								<div class="controls">
									<input class="q1" type="text" name="tax_id" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="address_1"><span class="required">*</span> Address 1:</label>
								<div class="controls">
									<input class="q1" type="text" name="address_1" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="address_2">Address 2:</label>
								<div class="controls">
									<input class="q1" type="text" name="address_2" value="" />
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="city"><span class="required">*</span> City:</label>
								<div class="controls">
									<input class="q1" type="text" name="city" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="postcode"><span id="postcode-required" class="required">*</span> Post Code:</label>
								<div class="controls">
									<input class="q1" type="text" name="postcode" value="" />
															</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="country_id"><span class="required">*</span> Country:</label>
								<div class="controls">
									<select name="country_id">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
										<option value="4">American Samoa</option>
										<option value="5">Andorra</option>
										<option value="6">Angola</option>
										<option value="7">Anguilla</option>
										<option value="8">Antarctica</option>
										<option value="9">Antigua and Barbuda</option>
										<option value="10">Argentina</option>
										<option value="11">Armenia</option>
										<option value="12">Aruba</option>
										<option value="13">Australia</option>
										<option value="14">Austria</option>
										<option value="15">Azerbaijan</option>
										<option value="16">Bahamas</option>
										<option value="17">Bahrain</option>
										<option value="18">Bangladesh</option>
										<option value="19">Barbados</option>
										<option value="20">Belarus</option>
										<option value="21">Belgium</option>
										<option value="22">Belize</option>
										<option value="23">Benin</option>
										<option value="24">Bermuda</option>
										<option value="25">Bhutan</option>
										<option value="26">Bolivia</option>
										<option value="245">Bonaire, Sint Eustatius and Saba</option>
										<option value="27">Bosnia and Herzegovina</option>
										<option value="28">Botswana</option>
										<option value="29">Bouvet Island</option>
										<option value="30">Brazil</option>
										<option value="31">British Indian Ocean Territory</option>
										<option value="32">Brunei Darussalam</option>
										<option value="33">Bulgaria</option>
										<option value="34">Burkina Faso</option>
										<option value="35">Burundi</option>
										<option value="36">Cambodia</option>
										<option value="37">Cameroon</option>
										<option value="38">Canada</option>
										<option value="251">Canary Islands</option>
										<option value="39">Cape Verde</option>
										<option value="40">Cayman Islands</option>
										<option value="41">Central African Republic</option>
										<option value="42">Chad</option>
										<option value="43">Chile</option>
										<option value="44">China</option>
										<option value="45">Christmas Island</option>
										<option value="46">Cocos (Keeling) Islands</option>
										<option value="47">Colombia</option>
										<option value="48">Comoros</option>
										<option value="49">Congo</option>
										<option value="50">Cook Islands</option>
										<option value="51">Costa Rica</option>
										<option value="52">Cote D'Ivoire</option>
										<option value="53">Croatia</option>
										<option value="54">Cuba</option>
										<option value="246">Curacao</option>
										<option value="55">Cyprus</option>
										<option value="56">Czech Republic</option>
										<option value="237">Democratic Republic of Congo</option>
										<option value="57">Denmark</option>
										<option value="58">Djibouti</option>
										<option value="59">Dominica</option>
										<option value="60">Dominican Republic</option>
										<option value="61">East Timor</option>
										<option value="62">Ecuador</option>
										<option value="63">Egypt</option>
										<option value="64">El Salvador</option>
										<option value="65">Equatorial Guinea</option>
										<option value="66">Eritrea</option>
										<option value="67">Estonia</option>
										<option value="68">Ethiopia</option>
										<option value="69">Falkland Islands (Malvinas)</option>
										<option value="70">Faroe Islands</option>
										<option value="71">Fiji</option>
										<option value="72">Finland</option>
										<option value="74">France, Metropolitan</option>
										<option value="75">French Guiana</option>
										<option value="76">French Polynesia</option>
										<option value="77">French Southern Territories</option>
										<option value="126">FYROM</option>
										<option value="78">Gabon</option>
										<option value="79">Gambia</option>
										<option value="80">Georgia</option>
										<option value="81">Germany</option>
										<option value="82">Ghana</option>
										<option value="83">Gibraltar</option>
										<option value="84">Greece</option>
										<option value="85">Greenland</option>
										<option value="86">Grenada</option>
										<option value="87">Guadeloupe</option>
										<option value="88">Guam</option>
										<option value="89">Guatemala</option>
										<option value="241">Guernsey</option>
										<option value="90">Guinea</option>
										<option value="91">Guinea-Bissau</option>
										<option value="92">Guyana</option>
										<option value="93">Haiti</option>
										<option value="94">Heard and Mc Donald Islands</option>
										<option value="95">Honduras</option>
										<option value="96">Hong Kong</option>
										<option value="97">Hungary</option>
										<option value="98">Iceland</option>
										<option value="99">India</option>
										<option value="100">Indonesia</option>
										<option value="101">Iran (Islamic Republic of)</option>
										<option value="102">Iraq</option>
										<option value="103">Ireland</option>
										<option value="104">Israel</option>
										<option value="105">Italy</option>
										<option value="106">Jamaica</option>
										<option value="107">Japan</option>
										<option value="240">Jersey</option>
										<option value="108">Jordan</option>
										<option value="109">Kazakhstan</option>
										<option value="110">Kenya</option>
										<option value="111">Kiribati</option>
										<option value="113">Korea, Republic of</option>
										<option value="114">Kuwait</option>
										<option value="115">Kyrgyzstan</option>
										<option value="116">Lao People's Democratic Republic</option>
										<option value="117">Latvia</option>
										<option value="118">Lebanon</option>
										<option value="119">Lesotho</option>
										<option value="120">Liberia</option>
										<option value="121">Libyan Arab Jamahiriya</option>
										<option value="122">Liechtenstein</option>
										<option value="123">Lithuania</option>
										<option value="124">Luxembourg</option>
										<option value="125">Macau</option>
										<option value="127">Madagascar</option>
										<option value="128">Malawi</option>
										<option value="129">Malaysia</option>
										<option value="130">Maldives</option>
										<option value="131">Mali</option>
										<option value="132">Malta</option>
										<option value="133">Marshall Islands</option>
										<option value="134">Martinique</option>
										<option value="135">Mauritania</option>
										<option value="136">Mauritius</option>
										<option value="137">Mayotte</option>
										<option value="138">Mexico</option>
										<option value="139">Micronesia, Federated States of</option>
										<option value="140">Moldova, Republic of</option>
										<option value="141">Monaco</option>
										<option value="142">Mongolia</option>
										<option value="242">Montenegro</option>
										<option value="143">Montserrat</option>
										<option value="144">Morocco</option>
										<option value="145">Mozambique</option>
										<option value="146">Myanmar</option>
										<option value="147">Namibia</option>
										<option value="148">Nauru</option>
										<option value="149">Nepal</option>
										<option value="150">Netherlands</option>
										<option value="151">Netherlands Antilles</option>
										<option value="152">New Caledonia</option>
										<option value="153">New Zealand</option>
										<option value="154">Nicaragua</option>
										<option value="155">Niger</option>
										<option value="156">Nigeria</option>
										<option value="157">Niue</option>
										<option value="158">Norfolk Island</option>
										<option value="112">North Korea</option>
										<option value="159">Northern Mariana Islands</option>
										<option value="160">Norway</option>
										<option value="161">Oman</option>
										<option value="162">Pakistan</option>
										<option value="163">Palau</option>
										<option value="247">Palestinian Territory, Occupied</option>
										<option value="164">Panama</option>
										<option value="165">Papua New Guinea</option>
										<option value="166">Paraguay</option>
										<option value="167">Peru</option>
										<option value="168">Philippines</option>
										<option value="169">Pitcairn</option>
										<option value="170">Poland</option>
										<option value="171">Portugal</option>
										<option value="172">Puerto Rico</option>
										<option value="173">Qatar</option>
										<option value="174">Reunion</option>
										<option value="175">Romania</option>
										<option value="176">Russian Federation</option>
										<option value="177">Rwanda</option>
										<option value="178">Saint Kitts and Nevis</option>
										<option value="179">Saint Lucia</option>
										<option value="180">Saint Vincent and the Grenadines</option>
										<option value="181">Samoa</option>
										<option value="182">San Marino</option>
										<option value="183">Sao Tome and Principe</option>
										<option value="184">Saudi Arabia</option>
										<option value="185">Senegal</option>
										<option value="243">Serbia</option>
										<option value="186">Seychelles</option>
										<option value="187">Sierra Leone</option>
										<option value="188">Singapore</option>
										<option value="189">Slovak Republic</option>
										<option value="190">Slovenia</option>
										<option value="191">Solomon Islands</option>
										<option value="192">Somalia</option>
										<option value="193">South Africa</option>
										<option value="194">South Georgia &amp; South Sandwich Islands</option>
										<option value="248">South Sudan</option>
										<option value="195">Spain</option>
										<option value="196">Sri Lanka</option>
										<option value="249">St. Barthelemy</option>
										<option value="197">St. Helena</option>
										<option value="250">St. Martin (French part)</option>
										<option value="198">St. Pierre and Miquelon</option>
										<option value="199">Sudan</option>
										<option value="200">Suriname</option>
										<option value="201">Svalbard and Jan Mayen Islands</option>
										<option value="202">Swaziland</option>
										<option value="203">Sweden</option>
										<option value="204">Switzerland</option>
										<option value="205">Syrian Arab Republic</option>
										<option value="206">Taiwan</option>
										<option value="207">Tajikistan</option>
										<option value="208">Tanzania, United Republic of</option>
										<option value="209">Thailand</option>
										<option value="210">Togo</option>
										<option value="211">Tokelau</option>
										<option value="212">Tonga</option>
										<option value="213">Trinidad and Tobago</option>
										<option value="214">Tunisia</option>
										<option value="215">Turkey</option>
										<option value="216">Turkmenistan</option>
										<option value="217">Turks and Caicos Islands</option>
										<option value="218">Tuvalu</option>
										<option value="219">Uganda</option>
										<option value="220">Ukraine</option>
										<option value="221">United Arab Emirates</option>
										<option value="222" selected="selected">United Kingdom</option>
										<option value="223">United States</option>
										<option value="224">United States Minor Outlying Islands</option>
										<option value="225">Uruguay</option>
										<option value="226">Uzbekistan</option>
										<option value="227">Vanuatu</option>
										<option value="228">Vatican City State (Holy See)</option>
										<option value="229">Venezuela</option>
										<option value="230">Viet Nam</option>
										<option value="231">Virgin Islands (British)</option>
										<option value="232">Virgin Islands (U.S.)</option>
										<option value="233">Wallis and Futuna Islands</option>
										<option value="234">Western Sahara</option>
										<option value="235">Yemen</option>
										<option value="238">Zambia</option>
										<option value="239">Zimbabwe</option>
									</select>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="control-group">
								<label class="control-label" for="zone_id"><span class="required">*</span> Region / State:</label>
								<div class="controls">
									<select name="zone_id">
									</select>
															</div>
							</div>
						</td>
					</tr>
				  </table>
				  <div class="buttons">
		  <div class="right">
			<label class="checkbox inline" >
			I have read and agree to the <a class="colorbox" href="<? echo as_siteUrl.'information/privacy'.as_urlExt ?>" alt="Privacy Policy"><b>Privacy Policy</b></a>						<input type="checkbox" name="agree" value="1" required/>
						</label>
			
		  </div>
				  <div class="control-group" id="form-button">
							<div class="controls">
								<input class="button-submit" type="submit" name="SignMeUp" value="SIGN UP NOW"/>
							</div>
						</div>
				</div>
				  </div>
				</div>
			  </div>
		  </div>
		</form>		
			  </div>
				</div>
			</div>
			<aside class="span3" id="column-right">
				<div class="box account">
			  <div class="box-heading">Account</div>
			  <div class="box-content">
				<ul class="acount">
						<li><a href="<?php echo as_siteUrl.'account/signin'.as_urlExt ?>">Sign In</a> / <a href="<?php echo as_siteUrl.'account/signup'.as_urlExt ?>">Sign Up</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/forgotten'.as_urlExt ?>">Forgotten Password</a></li>
						<li><a href="<?php echo as_siteUrl.'account/account'.as_urlExt ?>">My Account</a></li>
						<li><a href="<?php echo as_siteUrl.'account/address'.as_urlExt ?>">Address Books</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/wishlist'.as_urlExt ?>">Wish List</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/order'.as_urlExt ?>">Order History</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/download'.as_urlExt ?>">Downloads</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/return'.as_urlExt ?>">Returns</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/transaction'.as_urlExt ?>">Transactions</a></li>
				  <li><a href="<?php echo as_siteUrl.'account/newsletter'.as_urlExt ?>">Newsletter</a></li>
					  </ul>
			  </div>
			</div>
			  </aside>

			<script type="text/javascript"><!--
			$('input[name=\'customer_group_id\']:checked').live('change', function() {
				var customer_group = [];
				
				customer_group[1] = [];
				customer_group[1]['company_id_display'] = '1';
				customer_group[1]['company_id_required'] = '0';
				customer_group[1]['tax_id_display'] = '0';
				customer_group[1]['tax_id_required'] = '1';
				

				if (customer_group[this.value]) {
					if (customer_group[this.value]['company_id_display'] == '1') {
						$('#company-id-display').show();
					} else {
						$('#company-id-display').hide();
					}
					
					if (customer_group[this.value]['company_id_required'] == '1') {
						$('#company-id-required').show();
					} else {
						$('#company-id-required').hide();
					}
					
					if (customer_group[this.value]['tax_id_display'] == '1') {
						$('#tax-id-display').show();
					} else {
						$('#tax-id-display').hide();
					}
					
					if (customer_group[this.value]['tax_id_required'] == '1') {
						$('#tax-id-required').show();
					} else {
						$('#tax-id-required').hide();
					}	
				}
			});

			$('input[name=\'customer_group_id\']:checked').trigger('change');
			//--></script>   
			<script type="text/javascript"><!--
			$('select[name=\'country_id\']').bind('change', function() {
				$.ajax({
					url: <?php echo as_siteUrl.'account/signup'.as_urlExt ?>'/country&country_id=' + this.value,
					dataType: 'json',
					beforeSend: function() {
						$('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/theme244/image/loading.gif" alt="" /></span>');
					},
					complete: function() {
						$('.wait').remove();
					},			
					success: function(json) {
						if (json['postcode_required'] == '1') {
							$('#postcode-required').show();
						} else {
							$('#postcode-required').hide();
						}
						
						html = '<option value=""> --- Please Select --- </option>';
						
						if (json['zone'] != '') {
							for (i = 0; i < json['zone'].length; i++) {
								html += '<option value="' + json['zone'][i]['zone_id'] + '"';
								
								if (json['zone'][i]['zone_id'] == '') {
									html += ' selected="selected"';
								}
				
								html += '>' + json['zone'][i]['name'] + '</option>';
							}
						} else {
							html += '<option value="0" selected="selected"> --- None --- </option>';
						}
						
						$('select[name=\'zone_id\']').html(html);
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			});

			$('select[name=\'country_id\']').trigger('change');
			//--></script>
			<script type="text/javascript"><!--
			$(document).ready(function() {
				$('.colorbox').fancybox({
					
				});
			});
			//--></script> 
			<div class="clear"></div>
			</div>
			</div>
			</div>
			<div class="clear"></div>
	</section>

<?php  include as_site_theme("as_theme_footer.php");  ?>