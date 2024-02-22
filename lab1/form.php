<?php
  require_once('config.php');
  $errMsg="";
  $name=isset($_POST['name'])? $_POST['name'] : "";
  $email=isset($_POST['email'])? $_POST['email'] : "";
  $message=isset($_POST['message'])? $_POST['message'] : "";

  if(isset($_POST['submit'])){
        if(empty($name))
        {
            $errMsg .= NAME_EMPTY_ERROR;
        }
        else if(strlen($name)>= NAME_MAX_LENGTH){
            $errMsg .= NAME_LENGTH_ERROR;
        }
        if(empty($email))
        {
            $errMsg .= EMAIL_EMPTY_ERROR;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errMsg .= EMAIL_VALID_ERROR;   
        }
        if(empty($message))
        {
            $errMsg .= MESSAGE_EMPTY_ERROR;
        }
        else if(strlen($message)>= MESSAGE_MAX_LENGTH){
            $errMsg .= MESSAGE_LENGTH_ERROR;
        }

        if(empty($errMsg)){
            echo THANK_YOU_MESSAGE;
            echo "<b>Name:</b> $name<br>";
            echo "<b>Email:</b> $email<br>";
            echo "<b>Message:</b> $message<br>";
            exit();
        }
    }
    if(isset($_POST['reset'])){
        $name="";
        $email="";
        $message="";
        $errMsg="";
    }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <form  method="post" action="form.php">
        <h1>Contact Form</h1>
        <h3><?php echo $errMsg; ?> </h3>
        <label for="name">Your Name</label>
        <br>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <br>
        <label for="email">Your Email</label>
        <br>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <br>
        <label for="message">Your Message</label>
        <br>
        <textarea name="message" id="message" rows="8" cols="30" ><?php echo $message; ?></textarea>
        <br>
        <input type="submit" name="submit" value="Send Email">
        <input type="submit" name="reset" value="Clear Form" >
    </form>
</body>
</html>

