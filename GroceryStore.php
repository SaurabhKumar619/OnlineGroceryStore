<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="StoreDesign.css" >
	<!-- URL to link to Font Awesome Website to import icons-->
	<link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Welcome to the Grocery Store</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
	
</head>
<body id = "mainbody">
	<script type="text/javascript">
		// Calling jquery function to load the product details page after fetching results from database
		$(document).ready(function(){
			$(".clickacbleItem").click(function(e){
				var value = $(this).attr('value');
				$("#rightdiv").load("productDetails.php", {
					productId: value
				});
			});
			//function to reset the cart table data
			$("#resetButton").click(function(){
				var table = document.getElementById("cartDetails");
				for (var i = 1; i < table.rows.length-1;) {
					table.deleteRow(i);
					if (table.rows.length <=2) {
						document.getElementsByClassName("calculatedPrice")[0].innerHTML = "";
					}
				}
			});
			//jquery function to check that there is atleast 1 product added
			$("#checkoutButton").click(function(e){
				if (table.rows.length < 3) {
					alert("Please select the product from the cart first")
					e.preventDefault()
				}
			});
		});
	</script>
	<?php include ("productsName.php"); ?>
	<div id = "Container">
		<p>Welcome to the Grocery Store!!</p>

		<div  id = "leftdiv">
		<div class = "foodItems">
			<ul class="dropdown">
				<?php
				// code to build the product menu items
				print "<li class = \"listItems list-group-item mainList \"><a href = \"#\">$FROZEN_FOOD</a>
						<ul class = \"list-group\">
							<li class = \"submenu list-group-item\"><a href = \"#\">$FISH_FINGERS</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"1000\" href = \"#\">$GRAM500</a></li>
										<li><a class = \"clickacbleItem\" value = \"1001\" href = \"#\">$GRAM1000</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$HAMBURGER_PATTIES</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"1002\" href = \"#\">Pack 10</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$SHELLED_PRAWNS</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"1003\" href = \"#\">$GRAM250</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$TUB_ICECREAM</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"1004\" href = \"#\">$ONE_LITRE</a></li>
										<li><a class = \"clickacbleItem\" value = \"1005\" href = \"#\">$TWO_LITRE</a></li>
									</ul>
							</li>
						</ul>
				</li>";
				print "<li class = \"listItems list-group-item mainList\"><a href = \"#\">$HOME_HEALTH</a>
						<ul class = \"list-group\">
							<li class = \"submenu list-group-item\"><a href = \"#\">$PANADOL</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"2000\" href = \"#\">$PACK24</a></li>
										<li><a class = \"clickacbleItem\" value = \"2001\" href = \"#\">$BOTTLE50</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$BATH_SOAP</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"2002\" href = \"#\">$PACK6</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$GARBAGEBAGS</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"2003\" href = \"#\">$SMALL_PACK10</a></li>
										<li><a class = \"clickacbleItem\" value = \"2004\" href = \"#\">$LARGE_PACK50</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$WASHING_POWDER</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"2005\" href = \"#\">$GRAM1000</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$LAUNDRY_BLEACH</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"2006\" href = \"#\">$TWO_LITRE_BOTTLE</a></li>
									</ul>
							</li>
						</ul>
				</li>";
				print "<li class = \"listItems list-group-item mainList\"><a href = \"#\">$BEVERAGES</a>
						<ul class = \"list-group\">
							<li class = \"submenu list-group-item\"><a href = \"#\">$EARL_GREYTEABAGS</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"4000\" href = \"#\">$PACK25</a></li>
										<li><a class = \"clickacbleItem\" value = \"4001\" href = \"#\">$PACK100</a></li>
										<li><a class = \"clickacbleItem\" value = \"4002\" href = \"#\">$PACK200</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$INSTANT_COFFEE</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"4003\" href = \"#\">$GRAM200</a></li>
										<li><a class = \"clickacbleItem\" value = \"4004\" href = \"#\">$GRAM500</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$CHOCOLATE_BAR</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"4005\" href = \"#\">$GRAM500</a></li>
									</ul>
							</li>
						</ul>
				</li>";
				print "<li class = \"listItems list-group-item mainList\"><a href = \"#\">$FRESH_FOOD</a>
						<ul class = \"list-group\">
							<li class = \"submenu list-group-item\"><a href = \"#\">$CHEDDAR_CHEESE</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3000\" href = \"#\">$GRAM500</a></li>
										<li><a class = \"clickacbleItem\" value = \"3001\" href = \"#\">$GRAM1000</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$TBONE_STEAK</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3002\" href = \"#\">$GRAM1000</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$NAVEL_ORANGES</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3003\" href = \"#\">$BAG20</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$BANANAS</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3004\" href = \"#\">$KILO</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$PEACHES</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3005\" href = \"#\">$KILO</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$GRAPES</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3006\" href = \"#\">$KILO</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$APPLES</a><i class=\"fa fa-angle-right\"></i>
									<ul class = \"submenu2\">
										<li><a class = \"clickacbleItem\" value = \"3007\" href = \"#\">$KILO</a></li>
									</ul>
							</li>
						</ul>
				</li>";
				print "<li class = \"listItems list-group-item mainList\"><a href = \"#\">$PET_FOOD</a>
					<ul class = \"list-group\">
							<li class = \"submenu list-group-item\"><a href = \"#\">$DRY_DOGFOOD</a><i class=\"fa fa-angle-left\"></i>
								<ul class = \"submenu2 pet-food-submenu2\">
										<li><a class = \"clickacbleItem\" value = \"5000\" href = \"#\">$FIVE_KGPACK</a></li>
										<li><a class = \"clickacbleItem\" value = \"5001\" href = \"#\">$ONE_KGPACK</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$BIRD_FOOD</a><i class=\"fa fa-angle-left\"></i>
									<ul class = \"submenu2 pet-food-submenu2\">
										<li><a class = \"clickacbleItem\" value = \"5002\" href = \"#\">$GRAM500_PACKET</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$CAT_FOOD</a><i class=\"fa fa-angle-left\"></i>
									<ul class = \"submenu2 pet-food-submenu2\">
										<li><a class = \"clickacbleItem\" value = \"5003\" href = \"#\">$G500</a></li>
									</ul>
							</li>
							<li class = \"submenu list-group-item\"><a href = \"#\">$FISH_FOOD</a><i class=\"fa fa-angle-left\"></i>
									<ul class = \"submenu2 pet-food-submenu2\">
										<li><a class = \"clickacbleItem\" value = \"5004\" href = \"#\">$G500</a></li>
									</ul>
							</li>
						</ul>
				</li>";
				?>
			</ul>
		</div>
		</div>
		<!-- div to load the right frame to fetch the product details from the db -->
		<div id = "rightdiv">
			<p>Select products from the Left Menu</p>

			
		</div>
		<!-- div to add the cart items -->
		<div id = "rightbottom">
			<form id = "checkoutForm" method="POST" action = "checkoutDeliveryAddressForm.php" >
				<table id = "cartDetails" class="table table-bordered">
					<tr>
						<thead class='table-dark'>
							<td>Product Name</td>
							<td>Unit Price</td>
							<td>Unit Quantity</td>
							<td>Quantity</td>
							<td>Available Stock</td>
							<td>Total Price</td>
						</thead>
					</tr>
					<tr>
					<td></td><td></td><td></td><td></td>
					<td> Cart Total: </td>
					<td class = "calculatedPrice"></td></tr>
					</table>
					<button id = "checkoutButton"  disabled = "true" class = "btn btn-primary addressForm" type = "submit">Checkout</button>
					<button id = "resetButton" disabled = "true" class ="btn btn-secondary" type="reset">Clear</button>
			</form>
		</div>
	</div>

	
</body>
</html>