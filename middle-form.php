<?php

	/* Configuration */
	$subject = 'Sales Landing Page - Middle Optin Submission'; // Set email subject line here
	$mailto  = 'anoop.jeewoolall@gmail.com'; // Email address to send form submission to
	/* END Configuration */

	$name = $_POST['middle-optin-name'];
	$email = $_POST['middle-optin-email'];
	$phone = $_POST['middle-optin-phone'];
	$timestamp = date("F jS Y, h:iA.", time());

	// HTML for email to send submission details
	$body = "
	<br>
	<p>Sales Landing Page - Middle Optin Submission</p>
	<p><strong>Name</strong>: $name</p>
	<p><strong>Email</strong>: $email</p>
	<p><strong>Phone number</strong>: $phone</p>
	<hr/>
	<p>This form was submitted on <strong>$timestamp</strong></p>
	";

	// Success Message
	$success = "
	<div class=\"middle-optin\">
		<div class=\"row\">
			<div class=\"form-group col-lg-3\">
				<input name=\"middle-optin-name\" id=\"middle-optin-name\" type=\"text\" class=\"form-control\" required placeholder=\"Your Name\">
			</div>
			<div class=\"form-group col-lg-3\">
				<input name=\"middle-optin-mail\" id=\"middle-optin-mail\" type=\"text\" class=\"form-control\" required placeholder=\"Your E-mail\">
			</div>
			<div class=\"form-group col-lg-3\">
				<input name=\"middle-optin-phone\" id=\"middle-optin-phone\" type=\"text\" class=\"form-control\" placeholder=\"Your Phone Phone\">
			</div>
			<div class=\"form-group col-lg-3\">
				<button type=\"submit\" class=\"btn btn-default black-btn\">Subscribe Now</button>
			</div>
		</div>
	</div>
	<div class=\"row\">
		<div class=\"col-md-12\">
			<div class=\"form-process-middle\"></div>
		</div>
	</div>
	<div class=\"alert alert-success\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
		<strong>Thank You!</strong> You have successfully subscribed.
	</div>
	";

	$headers = "From: $name <$email> \r\n";
	$headers .= "Reply-To: $email \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<html><body>$body</body></html>";

	if (mail($mailto, $subject, $message, $headers)) {
		echo "$success"; // success
	} else {
		echo 'Form submission failed. Please try again...'; // failure
	}

?>