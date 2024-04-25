<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$field_name = $_POST['name'];
$field_phone = $_POST['phone'];
$field_countryCode = $_POST['country_code'];
$field_full_number = '+' . $_POST['country_code'] . $_POST['phone'];

// var_dump($field_phone);

$field_email = $_POST['email'];
$field_bedrooms = $_POST['bedrooms'];

$field_ip = $_SERVER['REMOTE_ADDR'];

$crm_update = false;

$field_lead = "The Spark by ESNAAD";
$field_lead_source = "Landing Page";
$field_campagin_id = "151";
$field_lead_type = "2";

$field_url = $_POST['url'];

// $utm_campaign = $_POST['utm_campaign'];
// $utm_source = $_POST['utm_source'];
// $utm_medium = $_POST['utm_medium'];
// $utm_content = $_POST['utm_content'];
// $utm_term = $_POST['utm_term'];





/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $link = mysqli_connect("localhost", "edgerealty_crm", "crm@12345@$", "edgerealty_crm");
 
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
 
// // Attempt insert query execution

//  $sql_campaign_agent = "SELECT count(leads.id) as lead_count, campaign_agent.agent_id from campaign_agent
//                         left join leads on leads.campaign_id = campaign_agent.campaign_id and leads.agent_id = campaign_agent.agent_id
//                         where campaign_agent.campaign_id = $field_campagin_id group by campaign_agent.agent_id order by lead_count, agent_id";



// $b = mysqli_query($link, $sql_campaign_agent);
// $result=mysqli_fetch_assoc($b); 

// $agent_id = $result['agent_id'];



// $sql_last = "SELECT * FROM leads ORDER BY id DESC LIMIT 1";

// $a = mysqli_query($link, $sql_last);
// $rr=mysqli_fetch_assoc($a); 

// $ref_no = $rr['ref_no'];

// $ref_no_add = ++$ref_no;


// $sql = "INSERT INTO `leads` (  `ref_no` , `inquiry` ,  `source` , `full_name` , `agent_id` , `phone`, `email`, `qualified_question`,`lead_type` , `campaign_id` )
// VALUES ( '$ref_no_add' ,'$field_lead', '$field_lead_source', '$field_name', '$agent_id' , '$field_full_number' , '$field_email' , '$field_bedrooms' , '$field_lead_type' ,  '$field_campagin_id' )";



// if(mysqli_query($link, $sql)){
    //  header("Location: https://edgerealty.ae/mar-casa/thankyou.php");
    //  $crm_update = true;
    //  echo "Records inserted successfully.";


    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    // ===============================
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = false;                      //Enable verbose debug output
        // $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'premium97.web-hosting.com';                     //Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        // $mail->Username   = 'edge@edgerealty.ae';                     //SMTP username
        // $mail->Password   = 'Dubai@12345@$';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        // $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'notifications.esnaad.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@notifications.esnaad.com';                     //SMTP username
        $mail->Password   = 'hQ(rhr(Tu{*j';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;   
        // $mail->Port       = 587;   

        //Recipients
        $mail->From = "no-reply@notifications.esnaad.com";
        $mail->FromName = "The Spark by ESNAAD";
        
        $mail->addAddress("leads@notifications.esnaad.com", "The Spark by ESNAAD");
        
    

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'The Spark By ESNAAD';
        $mail->Body    = ' <b>The Spark By ESNAAD - Brochure Download </b> 
        <br><br> Name: '.$field_name.' 
        <br><br> Country Code: '.$field_countryCode.' 
        <br><br> Phone: '.$field_phone.' 
        <br><br> Email: '.$field_email.'
        <br><br> URL: '.$field_url.'
        <br><br> IP Address: '.$field_ip;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        header("Location: https://esnaad.com/home/the-spark-by-esnaad.pdf");    
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

 
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
    
// }
 
// // Close connection
// mysqli_close($link);

