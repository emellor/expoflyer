<?php

	/* Configuration */
	$subject = 'Sales Landing Page - Footer Contact Form'; // Set email subject line here
	$mailto  = 'anoop.jeewoolall@gmail.com'; // Email address to send form submission to
	/* END Configuration */

	$name = $_POST['contact-name'];
	$email = $_POST['contact-email'];
	$phone = $_POST['contact-phone'];
	$message = $_POST['contact-message'];
	$timestamp = date("F jS Y, h:iA.", time());

	// HTML for email to send submission details
	$body = "
	<br>
	<p>Sales Landing Page - Footer Contact Form</p>
	<p><strong>Name</strong>: $name</p>
	<p><strong>Email</strong>: $email</p>
	<p><strong>Phone number</strong>: $phone</p>
	<p><strong>Message</strong>: $message</p>
	<hr/>
	<p>This form was submitted on <strong>$timestamp</strong></p>
	";

	// Success Message
	$success = "
	<div class=\"form-group\">
		<input name=\"contact-name\" id=\"contact-name\" type=\"text\" class=\"form-control\" placeholder=\"Name\">
	</div>
	<div class=\"form-group\">
		<input name=\"contact-email\" id=\"contact-email\" type=\"text\" class=\"form-control\" placeholder=\"Your e-mail\">
	</div>
	<div class=\"form-group\">
		<input name=\"contact-phone\" id=\"contact-phone\" type=\"text\" class=\"form-control\" placeholder=\"Phone\">
	</div>
	<div class=\"form-group\">
		<textarea name=\"contact-message\" id=\"contact-message\" class=\"form-control\" placeholder=\"Message\"></textarea>
	</div>
	<div class=\"form-group\">
		<button type=\"submit\" class=\"btn btn-default btn-submit\">Submit</button>
	</div>
	<div class=\"row\">
		<div class=\"col-md-12\">
			<div class=\"form-process-contact\"></div>
		</div>
	</div>
	<div class=\"alert alert-success\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
		<strong>Thank You!</strong> Your message has been successfully sent!
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