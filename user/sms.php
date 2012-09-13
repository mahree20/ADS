<?php
 session_start();
 if (!isset($_SESSION['id'])) {
    header("location: ../index.php"); 
    exit();
}
require_once "../db_con/db.php";
$id = $_SESSION['id'];
?>
<?php 
$sql = DB::query("SELECT * FROM users WHERE id='$id' LIMIT 1");
while($row = $sql->fetch(PDO::FETCH_ASSOC)){ 
			 $id = $row["id"];
			 $fullname = $row["name"];
			 $username = $row["username"];
			 $gender = $row["gender"];
			 $status = $row["status"];
			 $date = date ("Y-m-d");
			 $street = $row["street"];
			 $city = $row["city"];
			 $province = $row["province"];
			 $cnum = $row["cnum"];
			 $nationality = $row["nationality"];
			 $bio = $row["bio"];
			 $status = $row["status"];
         }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $fullname; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link href="/ADS/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="/ADS/css/lightbox.css" type="text/css" media="screen" />
	
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
	 <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 0px;
		
      }
      .sidebar-nav {
        padding: 30px 0;
      }
	  ul.nav li.dropdown:hover ul.dropdown-menu{
        display: block;    
      }
	  a.menu:after, .dropdown-toggle:after {
		content: none;
	  }
    </style>
  </head>

  <body background="/ADS/img/grain.jpg" bgcolor="#333333"> 
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         
          <div class="nav-collapse">
            <ul class="nav">
              <li class="">
                <a class="brand" href="../user/index.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
              </li>
			  <li><a href="../catalog/index.php"><img src="../img/catalog.png"><b> Catalog</b></a></li>
			  <li><a href="../order/index.php"><img src="../img/cart.png"><b> Orders</b></a></li>
            </ul>	
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="profile.php" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/user.png"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li>					  
					  <?php
						echo "<a href='profile.php'><img src='../user_image/$id.jpg' width='30px' height='30px'> View my profile page</a>";
					  ?>
					  </li>
                      <li class="divider"></li>
                      <li class="nav-header">Other Menu</li>
					  <li><a href="../user/profile.php"><i class="icon-cog"></i> Settings</a></li>
					  <li><a href="../logout.php"><i class="icon-off"></i> Sign Out</a></li>
                    </ul>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">  

<!-- Masthead
================================================== -->
 <br><br><br>
  <div class="container-fluid">
    <div class="row-fluid">
		<div class="span4">
          <table class="table table-bordered table-striped">
			<thead>
                  <th><?php
						echo "<li class='span4'>
								<div class='thumbnail'> 
									<a href='../user_image/$id.jpg' rel='lightbox'>
									<img src='../user_image/$id.jpg' width='100px' height='100px'></a>
								</div>
							  </li>";
					?>
					<br>
					<p>&nbsp;&nbsp;<a href="profile.php"><i><font face="georgia"><?php echo $fullname; ?></font></i></a></p>
					<small>&nbsp;&nbsp;&nbsp;View my profile</small>
				  </th>
            </thead>
		 </table>
		  <div>
				<ul class="nav nav-list bs-docs-sidenav">
				  <li><a data-toggle="modal" href="#edit"><i class="icon-edit"></i><i class="icon-chevron-right"></i> Edit Account</a></li>
				  <li><a href="password.php"><i class="icon-asterisk"></i></i><i class="icon-chevron-right"></i> Password</a></li>
				  <li><a href="#"><i class="icon-share-alt"></i><i class="icon-chevron-right"></i> Return and Exchange of Item</a></li>
				  <li><a href="#"><i class="icon-calendar"></i><i class="icon-chevron-right"></i> Due Date of Item</a></li>
				  <li class="active"><a href="#"><i class="icon-envelope"></i><i class="icon-chevron-right"></i> Mobile</a></li>
				</ul>
		  </div>
		  <br>
        </div><!--/.span -->
        
		<!-- modal to edit information -->
		<div id="edit" class="modal hide fade">	
             <form class="form-horizontal" action="profile.php"  name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Edit Account</h3>
				  <p class="help-block">Change your basic account information.</p>
				</div>
				 <div class="modal-body">
				   <div class="span11">
					  <div class="control-group">
						<label class="control-label" for="input01">Username:</label>
						  <div class="controls">
							<input type="text" name="username" id="username" value="<?php echo $_SESSION['username'];?>">
							<p class="help-block">Enter your username, to recognize you.</p>
						  </div>
					  </div>
					 <div class="control-group">
						<label class="control-label" for="input01">Status:</label>
							<div class="controls">
								<select name='status' id='status' >
									<option value="">-Select-</option>
									<option value="single">Single</option>
									<option value="married">Married</option>
									<option value="widowed">Widowed</option>
								</select>
							</div>
					 </div>
				   	 <div class="control-group">
						<label class="control-label" for="input01">Street:</label>
						  <div class="controls">
			                <input type='text' class="input-xlarge" name='street' value='<?php echo $street; ?>'>
			                <p class="help-block">What street are you located?</p>
			              </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">City:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='city' value='<?php echo $city; ?>'>
				           <p class="help-block">What city are you located?</p>
				          </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">Province:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='province' value='<?php echo $province; ?>'>
				           <p class="help-block">What province are you located?</p>
				          </div>
		             </div>
					 <div class="control-group">
				        <label class="control-label" for="input01">Contact Number:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='cnum' value='<?php echo $cnum; ?>'>
				           <p class="help-block">What is your mobile phone number?</p>
				          </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">Nationality:</label>
				          <div class="controls">
				            <input type='text' class="input-xlarge" name='nationality' value='<?php echo $nationality; ?>'>
				            <p class="help-block">What nationality are you?</p>
				          </div>
		             </div>
		             <div class="control-group">
                        <label>Bio:</label>
                          <div class="controls">
                            <textarea class="input-xlarge" name="bio" rows="3"><?php echo $bio; ?></textarea>
			                <p class="help-block">About yourself in fewer than 160 characters.</p>
                          </div>
                     </div>
		  <hr>
		  <p align="center">
			  <input class="btn btn-medium btn-success" type='submit' name='Submit' value='Save Changes'>
			  <input class='btn btn-medium' type='submit' value='Cancel'>
		  </p>
		  <br>
      </form>
				   </div>
				 </div>		
        </div> 
		  
		<div class="span8">
			<div class="well">
				<div>
				  <h2>Connect your mobile phone to your account</h2><br>
				  <p>Expand your experience, get closer, and stay current.</p>
				</div>
				<div>
					<form id="sms-phone-create-form" class="form-horizontal sms-form ready" method="post" action="https://twitter.com/settings/devices/create">
      
            <hr class="app-promo-spacing">
            <fieldset class="control-group" id="choose-country">
              <h3 class="settings-header">Activate ADSell text messaging</h3>
              <br>
              <label class="control-label">Country/region</label>
              <div class="controls">
                <select id="" name="">
                      <option value="+63">Philippines</option>
                </select>
                <input type="hidden" name="device_country_intl_prefix" id="device_country_intl_prefix" value="+1">
                <input type="hidden" name="device[region_country_code]" id="region_country_code" value="">
              </div>
            </fieldset>
            <fieldset class="control-group">
              <label class="control-label">Phone number</label>
              <div class="controls">
                <div class="input-prepend">
                  <label class="add-on" id="country_code_display">+63</label>
                  <input class="input-medium" type="text" value="" name="device[address]" id="device_address">
                </div>               
              </div>
            </fieldset>
            <fieldset class="control-group" id="choose-carrier" style="display: none; ">
              <label class="control-label">Carrier</label>
              <div class="controls">
                <input type="hidden" name="carrier_name" id="device_carrier_name" value="">
                <select id="device_carrier" name="device[carrier]"></select>
                <p class="carrier-help-note" id="carrier-message-no-mt" style="display: none; ">Note: This carrier only allows you to send messages to Twitter. Twitter will not be able to send you text message notifications.</p>
              </div>
            </fieldset>
            <br>
            <div class="form-actions">
              <button id="start" class="btn btn-primary" type="submit"><b>Activate Phone</b></button>
            </div>
          </form>
				</div>
			</div>

			</div>
		</div><!--/span8-->
	  </div> <!-- /.row -->
   </div> <!-- /.container fluid -->

     <!-- Footer
      ================================================== -->
     <div class="wrapper">
		</div class="push"></div>
	  
		<div class="footer">
				<div class="container-fluid">
					<div class="pull-right">
						<div class="span4">
							<dl>
								<dt><font color="gray">Phone</font></dt>
								<dd>
								<p><font color="white">09306673054</font></p>
								</dd>
								<dt><font color="gray">Email</font></dt>
								<dd>
								<a href="mailto:adsell2012@gmail.com"><font color="white">adsell2012@gmail.com</font></a>
								</dd>
							</dl>
						</div>
						
						<div class="span4">
							<address>
								<dl>
								<dt><font color="gray">Address</font></dt>
									<dd>
										<a href="http://adsell.tk"><font color="white">
											Cadelina Bldg., Quezon Street
											<br>
											New Pandan, Panabo City, 
											<br>
											Davao del Norte, Philippines
											</font>
										</a>
									</dd>
								</dl>
							</address>
						</div>
					</div>
					<div id="plusone">
					<div class="g-plusone" data-size="tall"></div>
					</div>
					<p>
					<a href="http://twitter.com">
					<img alt="Twitter" height="64" src="../img/twitter-logo.png" width="64">
					</a>
					<a href="http://www.facebook.com">
					<img alt="Facebook" height="64" src="../img/fb.png" width="64">
					</a>
					<a href="http://www.plus.google.com">
					<img alt="Google" height="64" src="../img/googleplus.png" width="64">
					</a>
					<a href="http://www.pinterest.com">
					<img alt="Google" height="64" src="../img/pin.png" width="64">
					</a>
					
					</p>
					<p><font color="gray">
								&#169; 2012 Alima Direct Selling -</font>
					<a href="/legal"><font color="white">Legal &amp; privacy stuff</font></a>
					</p>
				</div>	
				<div>
					<center><br><br><br><br>
						<p><dt><font color="gray">{Made in Philippines} </font><a href="../user/index.php"><font color="gray">Home</font></a> | <a href="../info/about.php"><font color="gray">About Us</font></a> | <a href="../info/contact.php"><font color="gray">Contact Us</font></a> | <a href="../info/privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
					</center>
				</div>
		</div>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
	<script src="/ADS/js/bootstrap-tab.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
    <script src="/ADS/js/application.js"></script>
	<script src="/ADS/js/bootstrap-datepicker.js"></script>
	<script src="/ADS/js/bootstrap-tooltip.js"></script>
	<script src="/ADS/js/bootstrap-collapse.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
	<script>
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});
		});
	</script>

  </body>
</html>
