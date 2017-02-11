<?php
$toEmail 		= "naeluh@gmail.com"; //Replace it recipient email address
$subject 		= 'Ah!! My email from Somebody out there...'; //Subject line for emails

//Let's clean harmful characters from raw POST data using PHP Sanitize filters.
$postName 		= filter_var($_POST["postName"], FILTER_SANITIZE_STRING); 
$postEmail 		= filter_var($_POST["postEmail"], FILTER_SANITIZE_EMAIL);
$postPhone 		= filter_var($_POST["postPhone"], FILTER_SANITIZE_STRING);
$postMessage 	= filter_var($_POST["postMessage"], FILTER_SANITIZE_STRING);

//Let's put additional php validation here
if(strlen($postName)<1) // If length is less than 1 we will throw an HTTP error.
{
	header('HTTP/1.1 500 Name Field Empty'); 
	exit();
}
//similar validation applies to all data, unless you want to replace with some other strong validation.
if(strlen($postEmail)<1)
{
	header('HTTP/1.1 500 Email Field Empty'); 
	exit();
}
if(strlen($postPhone)<1)
{
	header('HTTP/1.1 500 Phone Field Empty'); 
	exit();
}
if(strlen($postMessage)<1)
{
	header('HTTP/1.1 500 Message Field Empty'); 
	exit();
}

//Finally we can proceed with PHP email.
$headers = 'From: '.$postEmail.'' . "\r\n" .
    'Reply-To: '.$postEmail.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
@$sentMail = mail($toEmail, $subject, $postMessage .'  -'.$postName, $headers);

if(!$sentMail)
	{
		header('HTTP/1.1 500 Couldnot send mail! Sorry..'); 
		exit();
	}else{
		echo '<h3>Hi '.$postName.', Thank you for your email</h3>
		<p></p> <div><a href="" onclick="return false;" id="gobacknow"><strong>Send Another Email!</strong></a></div>';
	}

?>