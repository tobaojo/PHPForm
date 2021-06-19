<?php

//Message Variables
$alert;
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

if(!empty($firstname) && !empty($email)){

    //check email is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        //not valid email address
        echo 'No Valid email';
    } else {
        //passed
    }

} else{

}

$mail = "toba_ojo@hotmail.com";
$headers = "From: ".$email;
$message = $description;


mail($mail,$name,$message,$message);

header("Location: index.php?mailsend");
}
?>