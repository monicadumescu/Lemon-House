<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'Exception.php';
  require 'PHPMailer.php';
  require 'SMTP.php';

  $mail = new PHPMailer(true);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_email = $_POST['message-body'];
    $text = $_POST['message-body'];

    if (empty($from_email) || empty($text)) {
      echo '<script>alert("Campuri goale")</script>';
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

				$mail->setFrom('lemonshopoffice@gmail.com', 'Lemon House Messager');
				$mail->addAddress("lemonshopoffice@gmail.com", "Lemon House Messager");
				$mail->isHTML(true);
				$mail->Subject = 'Mesaj nou de la utilizator Lemon House ';
				$mail->Body = "Ai primit urmatorul mesaj, de la " . $from_email . ", pe Lemon House: " . $text;


				if (!$mail->send())
				{
					echo '<script>alert("Message has not been sent")</script>';
				}
				else
          echo '<script>alert("Message has been sent")</script>';

			}
			catch (Exception $e) {
				echo '<script>alert("Message has not been sent")</script>';
			}

      header('Location: '.'contact.html');
    }
  }
?>
