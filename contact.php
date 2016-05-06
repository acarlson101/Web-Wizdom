<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){ //checks if page called by post. call by get if using url
	
	//var_dump(); shows all info of something
	$name = trim($_POST["name"]); //corresponds to name attribute in form
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]); //trim eliminates before/after white space
	
	if($name == ""){
		$error_message = "We would love to hear from you, but please specify a name before submitting the form.";
	}
	
	if ($email == "" && !isset($error_message)){
		$error_message = "We would love to hear from you, but please specify an email before submitting the form.";
	}
	
	if ($message == "" && !isset($error_message)){
		$error_message = "We would love to hear from you, but please specify a message before submitting the form.";
	}
	
	if (!isset($error_message)) {
		foreach( $_POST as $value){
			if( stripos($value, 'Content-Type:') !== FALSE ){
			$error_message = "There was a problem with the information entered.";
			}
	}}
	
	if ($_POST["address"] != "" && !isset($error_message)) {
		$error_message = "Your form submission has an error.";
	}
	
	require_once("inc/class.phpmailer.php");
	$mail = new PHPMailer();
	if (!$mail->ValidateAddress($email) && !isset($error_message)){
		$error_message = "You must use a valid email address in order to contact us.";
	}
	
	if (!isset($error_message)) {
	
		$email_body = "";
		$email_body = $email_body . "Name: " . $name . "<br />"; //line break in source code
		$email_body = $email_body . "Email: " . $email . "<br />";
		$email_body = $email_body . "Message: " . $message;
		echo $email_body;
		//if refresh process page it might resubmit email

		$mail->SetFrom($email, $name);

		$address = "adamcarlson101@gmail.com";
		$mail->AddAddress($address, "Shirts 4 Mike");

		$mail->Subject    = "Contact Form Submission " . $name;

		$mail->MsgHTML($email_body);

		if($mail->Send()) {
			header("Location: contact.php?status=thanks");
			exit; //stops other php code from running
		  }
		 else {$error_message = "Mailer Error: " . $mail->ErrorInfo;
		} 

		
	}	
}
 
$title = "Contact Us";
include('inc/header.php');
?>
<div id="wrapper">
	<h2>Contact</h2>
				
				<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks"){?>
					<p>Thanks for the e-mail. We will respond to you as soon as we can.</p>
				<?php } else { ?>
				
							<?php 
							if (!isset($error_message)){ ?>
								<p>I&rsquo;d love to hear from you! Complete the form to send me an e-mail.</p><?php ;
							}else {	
								echo '<p>' . $error_message . '</p>';
							}
							?>
							<form method="post" action="contact.php">
								<table>
									<tr>
										<th><label for="name">Name</label></th>
									</tr>
									<tr>
										<td><input type="text" name="name" id="name" value="<?php if(isset($name)){ echo htmlspecialchars($name);} ?>" /></td>
									</tr>
									<tr>
										<th><label for="email">Email</label></th>
									</tr>
									<tr>
										<td><input type="text" name="email" id="email" value="<?php if(isset($email)){ echo htmlspecialchars($email);} ?>"  /></td>
									</tr>
									<tr>
										<th><label for="message">Message</label></th>
									</tr>
									<tr>
										<td><textarea name="message" id="message"><?php if(isset($message)){ echo htmlspecialchars($message);} ?></textarea></td>
									</tr>
									<tr style="display: none;">
										<th><label for="address">Address</label></th>
										<td>
										<input type="text" name="address" id="address" />
										<p>Please leave this field blank.</p>
										</td>
									</tr>
								</table>
								<input type="submit" value="Send" />
							</form>
					
					<?php } ?>
				</div>
			</div>
			

<?php include('inc/footer.php'); ?>		
