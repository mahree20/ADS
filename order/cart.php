<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php"); 
    exit();
}
?>
<?php
require_once "../db_con/config.php"; 
$id=$_POST['pid'];

try{
	$sql="select * from product where id=".$id.";";
	$result;
	if($conn->query($sql)){
		$result=$conn->query($sql);
		foreach($result->fetchAll() as $row){
				//echo $row['product_name']." ".$row['details']." ".$row['price']." succesfully added! <br><br>";
				}
			}
	else{
	}
}
catch(PDOException $e){
}

$id=$row['id'];
$prodname=$row['product_name'];
$details=$row['details'];
$price=$row['price'];
				
$ord=array($prodname,$details,$price); //mao ni ang order gkan sa form...
			
//clearCart();

function showItems(){
	if(count($_SESSION['cart'])==0){
		echo "cart is empty";
	}
	else{
		$cart=$_SESSION['cart'];
		for($i=0;$i<count($cart);$i++){
			echo "<tr>";
			for($j=0;$j<count($cart[$i]);$j++){
				echo "<td>". $cart[$i][$j]. "</td>";
				if(is_double($cart[$i][$j])){
					$totalcartprice=$totalcartprice+$cart[$i][$j+1];
				}
			}
			echo "</tr>";
		}
		echo "cart_price: ".$totalcartprice;
		echo "</table>";
	}
	
}

modifyItemValues(0,3);
function modifyItemValues($index,$quantity){
	$_SESSION['cart'][$index][2]=$quantity;
	$_SESSION['cart'][$index][4]=$quantity*$_SESSION['cart'][$index][3];
}	

//removeItem(0);
function removeItem($index){
	unset($_SESSION['cart'][$index]);
	sort($_SESSION['cart']);
}

function clearCart(){
	unset($_SESSION['cart']);
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le styles -->
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link href="/ADS/css/docs.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
	 <style type="text/css">
      body {
        padding-top: 70px;
        padding-bottom: 0px;
		padding-left: 0px;
		padding-right: 0px;		
      }
      .sidebar-nav {
        padding: 30px 0;
      }
	  ul.nav li.dropdown:hover ul.dropdown-menu{
        display: block;    
      }
    </style>
  </head>
  <body background="/ADS/img/grain.jpg" bgcolor="#333333"> 
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></a>       
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="brand" href="../user/index.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
              </li>
			  <li><a href="../catalog/index.php"><img src="../img/catalog.png"><b> Catalog</b></a></li>
			  <li class="active"><a href="../order/index.php"><img src="../img/cart.png"><b> Orders</b></a></li>
            </ul>
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/user.png"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li>					  
					  <?php
						$id = $_SESSION['id'];
						echo "<a href='../user/profile.php'><img src='../user_image/$id.jpg' width='30px' height='30px'> View my profile page</a>";
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
  <div class="container">
    <div class="row-fluid">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="../catalog/index.php">Order Item</a> <span class="divider">|</span></li>
			<li><a href="">Return / Exchange of Item</a> <span class="divider">|</span></li>
			<li><a href="">Due Date of Item</a> <span class="divider">|</span></li>
			<li class="active"><h4>My Cart</h4></li>
		</ul>
	   <div class="well">
			<?php
				addItem($ord);
				function addItem($order=array()){

						if(is_array($_SESSION['cart'])){
							array_push($_SESSION['cart'], $order);
							echo count($_SESSION['cart'])." item/s added </br></br>";
						}
						else{
							$_SESSION['cart']=array();
							array_push($_SESSION['cart'], $order);
							echo count($_SESSION['cart'])." item/s added </br></br>";
						}
				}
			?>
			<table class="table table-striped table-bordered">	
						<th width="2%">Product Name</th>
						<th width="4%">Details</th>	
						<th width="1%">Price</th>
						<th width="1%">Quantity</th>
						<th width="1%">Total</th>
						<?php					
							showItems();
						?>						
			</table>
			<br>
			<p class="navbar-text pull-right"><button class='btn btn-success btn-medium'><b>Proceed to Checkout</b></button></p>
			<p class="navbar-text pull-left"><button class='btn btn-primary btn-medium'><b>Click Here to Empty Your Shopping Cart</b></button></p>
			<br><br>
	   </div>
	</div>
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
								<a href="mailto:ariesmanian1990@gmail.com"><font color="white">adsell2012@gmail.com</font></a>
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
  </body>
</html>