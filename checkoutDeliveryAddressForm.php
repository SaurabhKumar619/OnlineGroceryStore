<!DOCTYPE html>
<html>
<head>
	<title>Deliver Address Form</title>
	<link rel="stylesheet" type="text/css" href="addressFormDesign.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<script type="text/javascript">
		function purchase(){
			sessionStorage.removeItem('cartSum');
		}
	</script>
	<div class = "cartTotal">
		<p id = "totalPrice">Your Order Total is:  <script type="text/javascript">
			document.write(JSON.parse(sessionStorage.getItem('cartSum')));
		</script> </p>
		
	</div>
	<div class = "deliveryAddress" id = "deliveryForm">
		<p><u>Please Enter Delivery Address Below:</u></p>
			<form method="POST" action = "sendMail.php">
				<table>
					<tr>
						<td class = "required">Full Name: </td>
						<td><input type="text" name="fullName" placeholder = "Full Name" required></td>
					</tr>
					<tr>
						<td class = "required">Contact No.: </td>
						<td><input type="number" name="contact" placeholder="Contact No." required></td>
					</tr>
					<tr>
						<td class = "required">Delivery Address: </td>
						<td><input type="text" name="address" placeholder="Address" required></td>
					</tr>
					<tr>
						<td></td>
						<td class = "requiredAddress"><input type="text" name="suburb" placeholder="Suburb" required></td>
					</tr>
					<tr>
						<td></td>
						<td class = "requiredAddress"><input type="text" name="state" placeholder="State" required></td>
					</tr>
					<tr>
						<td></td>
						<td class = "requiredAddress"><input type="text" name="country" placeholder="Country" required></td>
					</tr>
					<tr>
						<td class = "required">PostCode:</td>
						<td><input type="number" name="postcode" placeholder="Postcode" required></td>
					</tr>
					<tr>
						<td class = "required">Email:</td>
						<td><input type="email" name="emailAddress" placeholder="Email" required></td>
					</tr>
					<tr>
						<td></td>
						<td><p style="font-size: 14px";>Fields marked with (<span style="color: red";>*</span>) are mandatory</p></td>
					</tr>
					<tr>
						<td></td>
						<td><button id = "test" type="submit" onclick = "purchase()" value="submitForm">Purchase</button></td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>