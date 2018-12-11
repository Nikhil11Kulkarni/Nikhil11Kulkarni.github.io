<?php
//index.php

$error = '';
$name = '';
$email = '';
$contact = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

$msg = "submit clicked";
if(isset($_POST["submit"])){
echo "<script type='text/javascript'>alert('$msg');</script>";
// echo $msg;
 $message = '';

}


if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p>Please Enter your Name</p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p>Only letters and white space allowed</p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p>Please Enter your Email</p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p>Invalid email format</p>';
  }
 }
 if(empty($_POST["contact"]))
 {
  $error .= '<p>contact is required</p>';
 }
 else
 {
  $contact = clean_text($_POST["contact"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p>Message is required</p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'contact' => $contact,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = 'Thank you for contacting us';
  $name = '';
  $email = '';
  $contact = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Store Form data in CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How to Store Form data in CSV File using PHP</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Contact Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Enter contact</label>
      <input type="text" name="contact" class="form-control" placeholder="Enter contact" value="<?php echo $contact; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Message</label>
      <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>