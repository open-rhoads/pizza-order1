<?php
//error handling functions to display all errors
ini_set('display_errors', 1);
error_reporting(E_ALL); 

//initialize variable to display output in body
$msg = "";

//variables for other form fields, trimming/formatting name textbox
$name = htmlspecialchars(trim($_POST['name']));
$phone = $_POST['phone'];

//check if the toppings have been checked
if (isset($_POST['topping'])) {
    //store the checked toppings in a variable
    $toppings = $_POST['topping'];

    // //confirm that condition is working
    // echo "Toppings were checked <br>\n\r";

    // //test array/variable values
    // print_r($_POST['topping']);

    //count the array, aka number of toppings checked and store in variable
    $count = count($toppings);

    // //display count
    // echo "The count is $count <br>\n\r";

    //add text to message to display form values and toppings
    $msg = "<h1 class='red'>Pizza Express</h1>\n\r";
    $msg .= "<h2>Your order will be ready for pickup within 15 minutes!</h2>\n\r";
    $msg .= "<p>Thank you, $name! <br>\n\r";
    $msg .= "You selected the following $count toppings: <br>\n\r";

    //loop through the array and add each checked topping to the message
    foreach ($toppings as $ordered){
        //test and display each topping value
        // echo "The selected topping is $ordered <br>\n\r";
        $msg .= "\t\t\t\t$ordered <br>\n\r";
    }
    $msg .= "</p>";
    //calculate, format and display cost in message - $1.00 per topping
    $cost = "$".number_format(7.95 + ($count * 1.00), 2);
    $msg .= "<p class='red'>Your total is $cost.</p>\n\r";
    //display phone number in message
    $msg .= "<p>We will call you at $phone when it is ready.</p>\n\r";
}

//else, display message that no toppings were checked
else {
    $msg = "<p>You did not select any toppings.</p>\n\r";
}
?>
<!DOCTYPE html>
<!-- Mikaela Rhoads -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Submitted - Thank you!</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>
   <section id="outer"><?php echo $msg; ?></section>
</body>
</html>