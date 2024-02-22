<?php
  require_once("vendor/autoload.php");
  $errMsg="";
  $name=isset($_POST['name'])? $_POST['name'] : "";
  $email=isset($_POST['email'])? $_POST['email'] : "";
  $message=isset($_POST['message'])? $_POST['message'] : "";
  $visitDate=VISIT_DATE_FORMAT;
  
  $desired_view=isset($_GET["view"])? $_GET["view"] : DEFAULT_VIEW;
  if($desired_view=="display"){
      display_all_submits();
      echo "<br/>To add new user <a href='form.php?view=add'>Click Here</a>";
  }
  
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
                if(store_submits_to_file($name,$email,$visitDate)){
                echo THANK_YOU_MESSAGE;
                echo "<b>Name:</b> $name<br>";
                echo "<b>Email:</b> $email<br>";
                echo "<b>Message:</b> $message<br>";
                echo "</br>To visit all contacts <a href='form.php?view=display'>Click Here</a>";
                exit();
                }
                else{
                    $errMsg .= "Error in storing data";
                }
        }
      
    }
    if(isset($_POST['reset'])){
        $name="";
        $email="";
        $message="";
        $errMsg="";
    }
?>


<?php
        if($desired_view=="add"){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form</title>
    </head>
    <body>
        
            <h3>Contact Form</h3>
            <div id="after_submit">
            <?php echo $errMsg; ?> 
            </div>
            <form  method="post" action="form.php" id="contact_form" enctype="multipart/form-data">
                <div class="row">
                    <label for="name" class="required">Your Name:</label>
                    <br>
                    <input type="text" name="name" id="name" class="input" value="<?php echo $name; ?>">
                    <br>
                </div>
                <div class="row">
                    <label for="email" class="required">Your Email:</label>
                    <br>
                    <input type="text" name="email" id="email" class="input" value="<?php echo $email; ?>" size="30">
                    <br>
                </div>
                <div class="row">
                    <label for="message" class="required">Your Message:</label>
                    <br>
                    <textarea name="message" id="message" class="input" rows="7" cols="30" ><?php echo $message; ?></textarea>
                    <br>
                </div>
                <input type="submit" name="submit" value="Send Email">
                <input type="submit" name="reset" value="Clear Form" >
        </form>
    </body>
    </html>
<?php
}
?>
