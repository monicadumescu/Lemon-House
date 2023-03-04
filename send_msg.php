<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'Exception.php';
  require 'PHPMailer.php';
  require 'SMTP.php';

  $mail = new PHPMailer(true);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_email = $_POST['message-email'];
    $text = $_POST['message-body'];
    $name = $_POST['message-name'];

    if (empty($from_email) || empty($text) || empty($name)) {
      echo '<script>alert(" Empty fields")</script>';
    } else {
      try
			{
				$mail->isSMTP();
				$mail->Host = 'smtp.googlemail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'lemonshopoffice@gmail.com';
				$mail->Password = 'danonino123!';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;

        // mail catre admin
				$mail->setFrom('lemonshopoffice@gmail.com', 'Lemon House Messager');
				$mail->addAddress("lemonshopoffice@gmail.com", "Lemon House Messager");
				$mail->isHTML(true);
				$mail->Subject = 'New direct message on Lemon House ';
				$mail->Body = 'You received the following message, from ' . $name . ' (' . $from_email . '), on Lemon House: ' . $text;


				if (!$mail->send())
        {
					echo '<script>alert("Message has not been sent")</script>';
				}
				else
        {
          echo '<script>alert("Message has been sent")</script>';
        }

        // mail confirmare catre user
  			$mail->setFrom('lemonshopoffice@gmail.com', 'Lemon House Messager');
  			$mail->addAddress($from_email, $name);
  			$mail->isHTML(true);
  			$mail->Subject = 'Message sent to admin';
  			$mail->Body = 'We have registered your message, and will soon give you an answer.';


  			if (!$mail->send())
  			{
  				echo '<script>alert("Message has not been sent")</script>';
  			}
  			else
        {
          echo '<script>alert("Message has been sent")</script>';
        }
			}
			catch (Exception $e) {
				echo '<script>alert("Message has not been sent")</script>';
			}

      header('Location: '.'contact.html');
    }
  }
?>
