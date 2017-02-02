<?php
$name = $_POST['uname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message= $_POST['message'];

	 
$to      = 'vidyasande@gmail.com';
$subject = 'Reply From NoEscape Campaign Contact Form';
$message2 = 
"<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' style='border:solid #CCC' >
        <tr><td align='left' valign='top'>&nbsp;</td><td  align='left' valign='top'>&nbsp;</td></tr>
        <tr><td colspan='2' align='center' valign='top'><font face='Arial, Helvetica, sans-serif' color='#333333' size='+1'>Contact Details NoEscape Campaign Contact Form</font></td></tr>
         <tr><td align='left' valign='top'>&nbsp;</td><td align='left' valign='top'>&nbsp;</td></tr>
        <tr>
        <td colspan='2' align='left' valign='top'>
        <table width='88%' border='0' align='right' cellpadding='0' cellspacing='0' >
		<tr>
        <td width='180' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'><strong>Contact Name</strong></font></td>
        <td width='28' align='left' valign='middle'>:</td>
        <td width='196' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'>".$name."</font></td>
        </tr>

        <tr>
        <td width='180' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'><strong>Contact Number</strong></font></td>
        <td width='28' align='left' valign='middle'>:</td>
        <td width='196' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'>".$phone."</font></td>
        </tr>

		<tr>
        <td width='180' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'><strong>Email</strong></font></td>
        <td width='28' align='left' valign='middle'>:</td>
        <td width='196' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'>".$email."</font></td>
        </tr>
		
		  
		
		 
		
        <tr>
        <td width='180' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'><strong>Message</strong></font></td>
        <td width='28' align='left' valign='middle'>:</td>
        <td width='196' height='25' align='left' valign='middle'><font face='Arial, Helvetica, sans-serif' color='#333333' size='2'>".$message."</font></td>
        </tr>
		
		
		
		
			
		</table>";
$headers .= 'MIME-Version: 1.0'."\r\n";  			
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n"; 			
$headers .= 'From: info@asgardigital.in'."\r\n";
$headers .= 'Bcc:abeernow@gmail.com'."\r\n";
//$headers .= 'cc:amit.akenterprises@gmail.com'."\r\n";
//$headers .= 'Cc:export@shivroyallifecare.in'."\r\n";

$send=mail($to, $subject, $message2, $headers);
		if($send)
		{
			echo '<script language="javascript">';
			echo 'alert("Thank You! Mail was sent. We will contact you soon..!")';
			echo '</script>';
			echo '<script language="javascript">document.location.href="contact-us.php"</script>';
		}
		else
		{
			 echo"mail is not send";
			 //echo '<script language="javascript">document.location.href="contact.php"</script>';

		}


?>