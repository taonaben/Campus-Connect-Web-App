<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$name = htmlspecialchars($_POST['name']);
	$surname = htmlspecialchars($_POST['surname']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	// Validate form data
	if (empty($name) || empty($email) || empty($subject) || empty($message)) {
		echo "Please fill in all the required fields.";
		exit;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format.";
		exit;
	}

	// Set up email parameters
	$to = "taonbenjamin180903@gmail.com"; // Replace with your email address
	$headers = "From: $name <$email>" . "\r\n";
	$body = "Name: $name\nSurname: $surname\n\nEmail: $email\nSubject: $subject\n$message";

	// Send the email
	if (mail($to, $subject, $body, $headers)) {
		echo "Your message has been sent successfully.";
	} else {
		echo "Sorry, an error occurred while sending your message.";
	}
} else {
	echo "Invalid request.";
}
?>