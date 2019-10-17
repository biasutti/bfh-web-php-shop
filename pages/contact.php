<?php include("./lib/PHPMailer/emailConfig.php") ?>

<?php
if (isset($_POST['person'])) {
  $person = $_POST['person'];
  $mail->addAddress('barts5@bfh.ch', 'Barthe');
  $mail->isHTML(true);
  $mail->Subject = 'Kontakt Formular';
  $mail->Body = 'Sender first and lastname :<b>'.$person['firstname'].' - '.$person['lastname'].'</b><br>Sender Email: <b>' .$person['email'].'</b><br>Comment:<br><b>' .$person['comment'].'</b>';
  $mail->AltBody = 'The body in plain text for non-HTML mail clients';
  if(!$mail->send()) echo 'Sending message failed: ' . $mail->ErrorInfo;
  else echo 'Message has been sent successfully';
} else {
  ?>
  <p><?php echo t('contactContent') ?> </p>
  <Form method="post">
    <p><?php echo t('firstName')?>: <input name="person[firstname]" /></p>
    <p><?php echo t('lastName')?>: <input name="person[lastname]" /></p>
    <p>Email: <input type="email" name="person[email]"/></p>
    <p><?php echo t('contactComment')?>:</p>
    <textarea name="person[comment]" rows="10" cols="80"></textarea>
    <p><input type="submit" value="<?php echo t('submit')?>"/></p>
  </Form>
  <?php
}

?>
