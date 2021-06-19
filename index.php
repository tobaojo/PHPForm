
<?php
//feedback Variables
$alert = '';
$alertMsg = '';
$focus = '';



//get data and check submit been clicked
if(filter_has_var(INPUT_POST,'submit')){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$address1 = $_POST['address-1'];
$address2 = $_POST['address-2'];
$town = $_POST['town'];
$county = $_POST['county'];
$postcode = $_POST['postcode'];
$country = $_POST['country'];
$description = $_POST['description'];

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
    }

} else{
    //failed send feedback
    $alert = 'danger';
    $alertMsg = "Please fill in all fields";
}

$mail = "toba_ojo@hotmail.com";
$headers = "From: ".$email;
$message = $description;


mail($mail,$headers,$message);
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
    <form method="post" class="web-form" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
    <div class="form-control">
          <label for="Firstname">First Name:</label><br>
          <input id="firstname" type="text" name="firstname">
        </div>
        <div class="form-control">
          <label for="lastname">Last Name:</label><br>
          <input id="lastname" type="text" name="lastname">
        </div>
        <div class="form-control">
          <label for="email">Email Address:</label><br>
          <input id="email" type="email" name="email" >

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
          <label for="postcode">Post Code:</label><br>
          <input id="post code" type="text" name="postcode">

        </div>
        <div class="form-control">
          <label for="country">country:</label><br>
          <input id="country" type="text" name="country">
        </div>

        <div class="form-control">
          <label for="description">Description:</label><br>
          <textarea name="description" id="" cols="100" rows="10"></textarea>
        </div><br>
        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>
    </form>
</div>
</body>
</html>