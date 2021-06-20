# PHPForm
This form was created as a test for Real Response media. 

I primarily used PHP, CSS and HTML to create and layoput the form and used used PHP for the functionality. 

To view the form please use the following link: https://phpformrrm.000webhostapp.com/index.php


## How it works
The form uses some subtle prompts with the asterisks to to inform users to fill in the reqiured fields. If not, a prompt will come up under the required fields to advise which of them need to be filled. 
# security 
The email fields has email validation due to using semtanic HTML and also used PHP using the FILTER VALIDATE EMAIL. 
The fields also a function I created called Test_input() which Strips unnessary characters and with the trim() function and removes backslashes from the user input fields.
lastly I used the htmlspecialchars() function which converts some predefined characters to HTML entities.

# email functionality
unfortunately I couldn't get the mail() function to work. 
I believe this is due to the web hosting however I cannot figure out to implement it. (without paying for a host) I beleive the code works however I was unable to test it.

# Responsive design
The form is also responsive using CSS media queries to layout the form nicely.

## considerations and evaluations
I used the '$_SERVER['PHP_SELF']' so I had to create the PHP code in the same file as the HTML. I could have had the code in a separate file and provide feedback saying something along the lines of "Thanks for emailing" but I felt this was a simplier approach for this test. 

