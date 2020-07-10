
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="StoreDesign.css">
	<title>Product Details</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
	
</head>
<body>
	<?php include ("dbConnection.php"); ?>
	<p>Your Selected Product</p> 
	<!-- connecting to db to fetch the product details -->
	<?php
	$product_id = $_POST['productId'];
	$sql = "SELECT * from products where product_id =" .$product_id;
	$result = mysqli_query($connect, $sql);
	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) {
		$rows = mysqli_fetch_assoc($result);
		$product_name = $rows['product_name'];
		$unit_price = $rows['unit_price'];
		$unit_quantity = $rows['unit_quantity'];
		$in_stock =  $rows['in_stock'];
	}
	print "<br/>";
	mysqli_close($connect);
	?>
	<div id = "products">
	<!-- code to load the images and product details after fetching from the db -->
	<?php 
		print "<img style = \"width: 230px; height: 230px\"; src=\"images/$product_id.png\"/>
				Quantity:  <button class = \"minus\" style = \"width: 25px\"; onclick = \"decrement()\">-</button>
				<input style = \"width:25px\"; type=\"text\" class=\"quantity\" value = \"1\">
				<button class = \"plus\" style = \"width: 25px\"; onclick = \"increment()\">+</button>";
	?>
	<!-- dynamically generated table while adding cart items -->
	<table style = "border:0px";>
	<?php
		print "
			<tr><td class = \"productName\" style = \"border:0px; font-size:16px; font-weight: bold; \">Product Name: $product_name</td></tr>
			<tr><td class = \"price\" style = \"border:0px; font-size:16px; font-weight: bold;\">Unit Price: $unit_price</td></tr>
			<tr><td class = \"quantityAvailable\" style = \"border:0px; font-size:16px; font-weight: bold;\">Unit Quantity: $unit_quantity</td></tr>
			<tr><td style = \"border:0px; font-size:16px; font-weight: bold;\">Available Stock: $in_stock</td></tr>
			<tr><td style = \"border:0px; font-size:16px; font-weight: bold;\"><button id = \"theButton\" onclick = \"addingToCart()\" type=\"submit\">Add To Cart</button>
			</td></tr>";
	?>
<script type="text/javascript">
	var totalPrice = 0;
	var sumTotalOfProduct = 0;
	var totalPricePerProduct = [];
	var rowProduct = [];
	var rowQuantity = [];
	var rowUnitQuantity = [];
	var totalCheckoutPrice = 0;
	var flag = 0;
	var table = document.getElementById("cartDetails");
	// javascript function to increment the product counter
		function increment() {
  			var productQuantity = parseInt(document.getElementsByClassName("quantity")[0].value);
  			if (productQuantity < 20){
  				document.getElementsByClassName("quantity")[0].value = productQuantity+1;
  			}else{
  				alert("Maximum quantity per Customer is 20");
  			}
		}
		// javascript function to decrement the product counter
		function decrement() {
			var productQuantity = parseInt(document.getElementsByClassName("quantity")[0].value);
  			if (productQuantity > 1){
  				document.getElementsByClassName("quantity")[0].value = productQuantity-1; 
  			}
  			else{
  				alert("Quantity can't be less than 1");
  			}
		}
		// javascript function to add the cart items
		function addingToCart(){

			quantity = parseInt(document.getElementsByClassName("quantity")[0].value);
			var unitPriceString = '<?php echo $unit_price; ?>';
			var unitPriceFloat = parseFloat(unitPriceString);
			var productName = '<?php echo $product_name; ?>';
			var unitQuantity = '<?php echo $unit_quantity; ?>';
			var inStock = '<?php echo $in_stock; ?>';
			totalPrice = quantity * unitPriceFloat; 

			var newProduct = productName;
			var newQuantity = quantity;
			var newUnitQuantity = unitQuantity;

			// dynamically generating table rows and columns
			var newRow = table.insertRow(1);

			var newCell1 = newRow.insertCell(0);
			var newCell2 = newRow.insertCell(1);
			var newCell3 = newRow.insertCell(2);
			var newCell4 = newRow.insertCell(3);
			var newCell5 = newRow.insertCell(4);
			var newCell6 = newRow.insertCell(5);

			var getTotalPricePerProduct = document.getElementsByClassName("totalPricePerProduct");
			var getRowProducts = document.getElementsByClassName("rowProduct");
			var getRowQuantity = document.getElementsByClassName("rowQuantity");
			var getUnitRowQuantity = document.getElementsByClassName("rowUnitQuantity");
			var sum = 0;

			newCell1.classList.add("rowProduct");
			newCell3.classList.add("rowUnitQuantity");
			newCell4.classList.add("rowQuantity");
			newCell6.classList.add("totalPricePerProduct");

			for( var i = 0; i<getRowProducts.length; i++ ){

				if(newProduct == getRowProducts[i].innerHTML && getRowProducts[i].innerHTML != ""){

					if (newUnitQuantity != getUnitRowQuantity[i].innerHTML && getUnitRowQuantity[i].innerHTML != "") {
						continue;
					}else{
						flag = 1;
						getRowProducts[i].innerHTML = newProduct;
						if((parseInt(getRowQuantity[i].innerHTML) + quantity) > 20){
							alert("Maximum quantity per Customer is 20");
						}else{
							getRowQuantity[i].innerHTML = parseInt(getRowQuantity[i].innerHTML) + quantity;
							totalPrice += parseFloat(getTotalPricePerProduct[i].innerHTML);
							getTotalPricePerProduct[i].innerHTML = totalPrice.toFixed(2);
							sum += totalPrice;
						}
						table.deleteRow(1);
					}
				}
			}

			if (flag == 0) {
				//adding product details to cart row
				newCell1.innerHTML = productName;
	
				newCell2.innerHTML = unitPriceFloat;
				newCell3.innerHTML = unitQuantity;
				newCell4.innerHTML = quantity;
				newCell5.innerHTML = inStock;
				newCell6.innerHTML = totalPrice.toFixed(2);
			}
			
			// calculating total cart price
			for( var i = 0; i<getTotalPricePerProduct.length; i++ ){
				var sumTotalOfProduct = parseFloat(document.getElementsByClassName("totalPricePerProduct")[i].innerHTML);
				if (flag == 1) {
					sum;
					flag = 0;
				}else{
					sum += sumTotalOfProduct;	
				}
			}
			totalCheckoutPrice = sum.toFixed(2);
			document.getElementsByClassName("calculatedPrice")[0].innerHTML = totalCheckoutPrice;
			if (table.rows.length <=2) {
				document.getElementsByClassName("calculatedPrice")[0].innerHTML = "";
			}

			sessionStorage.setItem('cartSum', JSON.stringify(totalCheckoutPrice));
			
			//setting the checkout and reset button as enabled after products has been added to the cart
			document.getElementById('checkoutButton').disabled=false;
			document.getElementById('resetButton').disabled=false;
			
		}

	</script>
	
	</table>
	</div>
</body>
</html>

