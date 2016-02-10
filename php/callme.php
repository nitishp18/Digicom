<?php

if($_POST)
{    
    //Sanitize input data using PHP filter_var().
    $user_name  = filter_var($_POST["fullName"], FILTER_SANITIZE_STRING);
    $user_email  = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone_number  = filter_var($_POST["phone_no"], FILTER_SANITIZE_NUMBER_INT);
    
    // Start code added by hemant from enjay
        $calldetails='{"apikey":"c3ce7585276536abcce530a4f871c1d8","departmentid":"1","email":"'.$user_email.'","name":"'.$user_name.'","number":"'.$phone_number.'"}';
        $calldetails=urlencode($calldetails);
        $callurl = "http://app.enjayclick2call.com/ec2c.php";
        $curlobj = curl_init();
        $curlurl = $callurl."?calldetails=$calldetails";
        curl_setopt($curlobj, CURLOPT_URL, $curlurl);
        curl_setopt($curlobj, CURLOPT_HEADER, false);
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curlobj);

        if(!$response)
        {
            //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
            $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
            die($output);
        }else{
            $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));
            die($output);
        }

        curl_close($curlobj);
        /*print_r($response);
        die();*/
    // End code added by hemant from enjay

}
?>