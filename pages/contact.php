<div class="flex-item-1 flex-size-1">
<?php
  include("./lib/PHPMailer/emailConfig.php");

  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0) {
  // Validate firstname
    if (!isset($_POST['person']['firstname']) || $_POST['person']['firstname'] == '') {
    $errArray['firstname'] = t('FormFirstNameError');
    }
    //validate lastname
    if (!isset($_POST['person']['lastname']) || $_POST['person']['lastname'] == '') {
    $errArray['lastname'] = t('FormLastNameError');
    }
    // Validate email
    if (!isset($_POST['person']['email'])||!filter_var($_POST['person']['email'], FILTER_VALIDATE_EMAIL)) {
      $errArray['email'] = t('FormEmailError');
    }

    if (!isset($_POST['person']['comment']) || $_POST['person']['comment'] == '') {
    $errArray['comment'] = t('FormCommentError');
    }
  }
  if (count($_POST) > 0 && count($errArray) == 0) {
    //valid form send email and show
    $person = $_POST['person'];
    $mail->addAddress('barts5@bfh.ch', 'Barthe');
    $mail->isHTML(true);
    $mail->Subject = 'Kontakt Formular';
    $mail->Body = 'Sender first and lastname :<b>'.$person['firstname'].' - '.$person['lastname'].'</b><br>Sender Email: <b>' .$person['email'].'</b><br>Comment:<br><b>' .$person['comment'].'</b>';
    $mail->AltBody = 'The body in plain text for non-HTML mail clients';
    if(!$mail->send()) echo 'Sending message failed: ' . $mail->ErrorInfo;
    else {
      echo "<p>".t('successMail')."</p>";
      echo "<p>".t('firstName').": <b>".$person['firstname']."</b></p>";
      echo "<p>".t('lastName').": <b>".$person['lastname']."</b></p>";
      echo "<p>Email: <b><a href='mailto:".$person['email']."''>".$person['email']."</a></b></p>";
      echo "<p>".t('contactComment').": <b>".$person['comment']."</b></p>";
    }
  } else {
  // Display the form
    $firstName = isset($_POST['person']['firstname']) ? $_POST['person']['firstname'] : '';
    $lastName = isset($_POST['person']['lastname']) ? $_POST['person']['lastname'] : '';
    $email = isset($_POST['person']['email']) ? $_POST['person']['email'] : '';
    $comment = isset($_POST['person']['comment']) ? $_POST['person']['comment'] : '';
    $errFirstName = isset($errArray['firstname']) ? $errArray['firstname'] : '';
    $errLastName = isset($errArray['lastname']) ? $errArray['lastname'] : '';
    $errEmail = isset($errArray['email']) ? $errArray['email'] :'';
    $errComment = isset($errArray['comment']) ? $errArray['comment'] :'';
?>
    <p><?php echo t('contactContent');?> </p>
    <Form method="post">
      <p><?php echo t('firstName');?>: <input name="person[firstname]" value="<?php echo $firstName;?>" required="required"/>
      <mark><?php echo $errFirstName;?></mark></p>
      <p><?php echo t('lastName')?>: <input name="person[lastname]" value="<?php echo $lastName;?>" required="required" />
      <mark><?php echo $errLastName;?></mark></p>
      <p>Email: <input type="email" name="person[email]" value="<?php echo $email;?>" required="required"/>
      <mark><?php echo $errEmail;?></mark></p>
      <p><?php echo t('contactComment');?>:</p>
      <textarea name="person[comment]" rows="10" cols="80" required="required">
      <?php echo $comment;?>
      </textarea>
      <mark><?php echo $errComment;?></mark></p>
      <p><input type="submit" value="<?php echo t('submit')?>"/></p>
    </Form>
<?php
  }
?>


</div>
