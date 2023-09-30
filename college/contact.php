<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'database/connection.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    $toEmail = "collegeadmin@test.com";

    $saveContactSql = "INSERT INTO contacts VALUES (
        NULL,
        '" . $name . "',
        '" . $email . "',
        " . $mobile . ",
        '" . $message . "'
    )";

    $saveResponse = mysqli_query($connection, $saveContactSql);
    if ($saveResponse) {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'bbc97e62ecac87';
        $mail->Password = '7d38c613f79f29';
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($toEmail, 'College Admin');     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New contact message from college';
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        $response =  'Message has been sent';
    } else {
        $response = 'Failed to save message. Please try again later.' . mysqli_error($connection);
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>legend Website Template | contact :: W3layouts</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="keywords" content="legend iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link href='//fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <!---start-wrap---->

    <!---start-header---->
    <?php include 'header.html'; ?>
    <!---end-header---->

    <div class="wrap">
        <!---start-content---->
        <div class="content">
            <div class="contact">
                <div class="section group">
                    <div class="col span_1_of_3">
                        <div class="contact_info">
                            <h2>Find Us Here</h2><br />
                            <div class="map">
                                <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                            </div>
                        </div>
                        <div class="company_address">
                            <h2>Company Information :</h2>
                            <p>500 Lorem Ipsum Dolor Sit,</p>
                            <p>22-56-2-9 Sit Amet, Lorem,</p>
                            <p>USA</p>
                            <p>Phone:(00) 222 666 444</p>
                            <p>Fax: (000) 000 00 00 0</p>
                            <p>Email: <span><a href="mailto:info@mycompany.com">info@mycompany.com</a></span></p>
                            <p>Follow on: <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span>
                            </p>
                        </div>
                    </div>
                    <div class="col span_2_of_3">
                        <div class="contact-form">
                            <h2>Contact Us</h2>
                            <?php echo $response; ?>
                            <form action="" method="post">
                                <div>
                                    <span><label>NAME</label></span>
                                    <span><input type="text" name="name"></span>
                                </div>
                                <div>
                                    <span><label>E-MAIL</label></span>
                                    <span><input type="text" name="email"></span>
                                </div>
                                <div>
                                    <span><label>MOBILE.NO</label></span>
                                    <span><input type="text" name="mobile"></span>
                                </div>
                                <div>
                                    <span><label>SUBJECT</label></span>
                                    <span><textarea name="message"></textarea></span>
                                </div>
                                <div>
                                    <span>
                                        <form>
                                            <input type="submit" value="Submit">
                                        </form>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!---End-content---->
    <div class="clear"> </div>
    <!---start-footer---->
    <?php include 'footer.html'; ?>
    <!---end-footer---->
</body>

</html>
