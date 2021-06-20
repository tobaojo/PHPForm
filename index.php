
<?php
//feedback Variables
$alert = '';
$alertMsg = '';
$nameErr = '';
$emailErr = '';
$postcodeErr = '';
$descriptionErr = '';

//https://phpformrrm.000webhostapp.com/index.php

//get data and check submit been clicked
if(filter_has_var(INPUT_POST,'submit')){
  if(empty($_POST['firstname'])){
    $nameErr = "Please enter your name";
  } else{
    $firstname = test_input($_POST['firstname']);
  }
$lastname = test_input($_POST['lastname']);
if(empty($_POST['email'])){
  $emailErr = "Please enter your email address";
} else {
  $email = test_input($_POST['email']);
}

$telephone = test_input($_POST['telephone']);
$address1 = test_input($_POST['address-1']);
$address2 = test_input($_POST['address-2']);
$town = test_input($_POST['town']);
$county = test_input($_POST['county']);
if(empty($_POST['postcode'])){
  $postcodeErr = 'We need at least a postcode';
} else {
  $postcode = test_input($_POST['postcode']);
}
$country = test_input($_POST['country']);
if(empty($_POST['description'])){
  $descriptionErr = 'Tell us why you\'re messaging';
} else{
  $description = test_input($_POST['description']);
}


//checks fields are not empty
if(!empty($firstname) && !empty($email)&& !empty($postcode)&& !empty($description)){

    //check email is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        //not valid email address
        $alert = 'danger';
        $alertMsg = "Please use a valid Email address!";
    } else {
        //passed send feedback
        $alert = 'success';
        $alertMsg = "Email has been sent!";
        //set up email
        $mail = "toba_ojo@hotmail.com";
        $subject = "message from: ".$firstname;
        $headers = "From: ".$email;
        $message = $description;
        mail($mail,$subject,$message,$headers);
    }

} else{
    //failed send feedback
    $alert = 'danger';
    $alertMsg = "Please fill in all fields";
}

}
//Strips unnessary characters and with the trim() function
//removes backslashes from the user input fields too.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="mobile.css">
    <title>Contact Form</title>
</head>
<body>
<div class="card">
<?php if($alertMsg !=''): ?>
    <div class="<?php echo $alert; ?>"><?php echo $alertMsg; ?></div>
    <?php endif;?>
    <form method="post" class="web-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
    <div class="form-control">
          <label for="Firstname">First Name<span class="danger">*</span>:</label><br>
          <input id="firstname" type="text" name="firstname">
          <span class="danger"><?php echo $nameErr;?></span>
        </div>
        <div class="form-control">
          <label for="lastname">Last Name:</label><br>
          <input id="lastname" type="text" name="lastname">
        </div>
        <div class="form-control">
          <label for="email">Email Address<span class="danger">*</span>:</label><br>
          <input id="email" type="email" name="email" >
          <span class="danger"><?php echo $emailErr;?></span>
        </div>
        <div class="form-control">
          <label for="telephone">Telephone Number:</label><br>
          <input id="telephone" type="text" name="telephone">

        </div>
        <div class="form-control">
          <label for="address-1">Address 1:</label><br>
          <input id="addres-1" type="text" name="address-1">

        </div>
        <div class="form-control">
          <label for="address-2">Address 2:</label><br>
          <input id="address-1" type="text" name="address-2">

        </div>
        <div class="form-control">
          <label for="town">Town:</label><br>
          <input id="town" type="text" name="town">

        </div>
        <div class="form-control">
          <label for="County">County:</label><br>
          <input id="county" type="text" name="county" >

        </div>
        <div class="form-control">
          <label for="postcode">Post Code<span class="danger">*</span>:</label><br>
          <input id="post code" type="text" name="postcode">
          <span class="danger"><?php echo $postcodeErr;?></span>
        </div>
        <div class="form-control">
          <label for="country">Country:</label><br>
          <select id="country" type="text" name="country">
            <option value="United Kingdom">United Kingdom</option>
            <option value="USA">United States of America</option>
            <option value="Australia">Australia</option>
          </select>
        </div>

        <div class="form-control">
          <label for="description">Description<span class="danger">*</span>:</label><br>
          <textarea id="textarea" name="description" id="" cols="100" rows="10"></textarea>
          <span class="danger"><?php echo $descriptionErr;?></span>
        </div>

       <br>
       <p>Your C.V </p><br>
        <p>Select a file <button type="#">Browse...</button> no file selected</Your>
        <br><br>
        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>
    </form>
</div>
</body>
</html>