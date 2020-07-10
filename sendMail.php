<?php
	$address = $_POST['emailAddress'];
	$subject = "Confirmation Mail";
	$message = "Congratulations, \nThis is a confirmation mail from the Grocery Store(13505250@student.uts.edu.au)\n
				Your Order has been confirmed. \ncheers, \nSaurabh";
	mail($address, $subject, $message);
	echo "Congratulations!! The Confirmation mail has been sent to your emailId ".$address;

?> 