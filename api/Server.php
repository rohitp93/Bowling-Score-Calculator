<?php

require dirname(__FILE__).'/Backend.php';

// Receive the input from POST
$postdata = file_get_contents("php://input");
$json_obj = json_decode($postdata, true);

//Send the JSON object to sum.php to calculate sum
$calc = new Calculator;
$send_response = $calc->MainLoop($json_obj['frames']);

//Send the result back to the frontend
echo (json_encode($send_response));

?>