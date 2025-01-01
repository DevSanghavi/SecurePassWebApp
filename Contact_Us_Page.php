<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/Contact Us/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Contact Us/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap"
    />
  </head>
  <body>
    <div class="galileo-design"  role="banner" aria-label="Main Navigation">
      <main class="depth-0-frame-0">
        <section class="depth-1-frame-0">
          <header class="depth-2-frame-0"   aria-label="Primary Navigation">
            <div class="depth-3-frame-0">
              <div class="depth-4-frame-0">
                <div class="depth-5-frame-0">
                  <img
                    class="vector-0"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/Contact Us/vector--0.svg"
                  />

                  <div class="depth-6-frame-0"></div>
                </div>
              </div>
              <div class="depth-4-frame-0">
                <b class="securepass">SecurePass</b>
              </div>
            </div>
            <a class="home" href="index.php">Home</a>
          </header>
          <div class="depth-2-frame-1">
            <div class="depth-3-frame-01">
              <div class="depth-4-frame-01">
                <div class="depth-5-frame-01">
                  <h1 class="contact-us">Contact us</h1>
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="were-here-to">
                  We're here to help. Fill out the form below and we'll get back
                  to you as soon as possible.
                </div>
              </div>
              <form method="post" action="">
              <div class="depth-4-frame-6">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Name</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="Your name"
                    type="text"
                    name="username"
                  />
                </div>
              </div>
              <div class="depth-4-frame-6">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name" >Your email</div>
                  </div>
                  <input class="depth-6-frame-1" placeholder="Email" type="text" name="useremail"/>
                </div>
              </div>
              <div class="depth-4-frame-6">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">How can we help?</div>
                  </div>
                  <textarea class="depth-6-frame-12" rows="{7}" cols="{22}" name="userquery"></textarea>
                </div>
              </div>
              <div class="depth-4-frame-4">
                <button class="depth-5-frame-05" style="color: aliceblue;text-decoration:none" id="showMessageBtn">
                  <div class="depth-6-frame-04">
                    <b class="submit">Submit</b>
                  </div>
                </button>
              </div>
              </form>
              <br>
              <?php 

                // Include Composer's autoloader
                require 'vendor/autoload.php';

                // Import PHPMailer classes into the global namespace
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

                session_start();

                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
                header("Pragma: no-cache");

                $showOverlay = false; // Variable to control overlay display

                if($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                  $username = $_POST['username'] ?? '';
                  $useremail = $_POST['useremail'] ?? '';
                  $userquery = $_POST['userquery'] ?? '';

                  if ($useremail && $username && $userquery) 
                  {
                    function isValidEmail($useremail) 
                    {
                      // Check if the email format is valid
                      if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
                          return false;
                      }
                  
                      // Extract the domain from the email
                      $domain = substr(strrchr($useremail, "@"), 1);
                  
                      // Check if the domain has DNS records
                      if (!checkdnsrr($domain, "MX")) {
                          return false;
                      }
                  
                      return true;
                    }

                    if (isValidEmail($useremail)) 
                    {
                      //Create an instance; passing `true` enables exceptions
                      $mail = new PHPMailer(true);

                      try 
                      {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable    verbose debug output
                        $mail->isSMTP();                                            //Send using    SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the   SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable    SMTP authentication
                        $mail->Username   = 'devsanghavi53@gmail.com';                     //SMTP  username
                        $mail->Password   = 'ycyj lyua ezyl opif';                               //SMTP  password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable    implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port  to connect to; use 587 if you have set  `SMTPSecure =     PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('devsanghavi53@gmail.com', 'SecurePass');
                        $mail->addAddress('devsanghavi53@gmail.com');     //Add a recipient


        
                        //Content
                        $mail->isHTML(true);                                  //Set email format    to HTML
                        $mail->Subject = 'Users Feedback and Questions for Our Website';
                        $mail->Body    = "Hello Admin, here is the Information of the Users Feedback and Questions <br> Name :- $username <br>  Email :- $useremail <br> User Message :- $userquery";

                        // $mail->send();

                        if ($mail->send()) 
                        {

                          echo "
                                <div class='overlay' id='overlay'>
                                  <div class='message-card' id='messagebox'>
                                    <div class='card-header'>
                                      <span class='info-icon'>&#9432;</span>    
                                      <h2>Request Generated</h2>
                                      <button class='close-button' id='closeBtn'>&times;</button>
                                    </div>
                                    <div class='card-body'>
                                      <p>Thank you for bringing this to our attention. We will get back to you as soon as possible</p>
                                    </div>
                                    <div class='button-group'>
                                      <button class='ok-button' id='submitBtn'>OK</button>
                                    </div>
                                  </div>
                                </div>";
                        }

                      } 
                      catch (Exception $e) 
                      {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }

                    }
                   
                  }
                  // echo $username . ' ' . $useremail . ' ' . $userquery;
                }
                "<script> 
                document.addEventListener('DOMContentLoaded', function() {
                showOverlay(); // Trigger the JavaScript function to show the popup}); 
                </script>";


              ?>
              <div class="depth-4-frame-5">
                <div class="by-submitting-this">
                  By submitting this form, you acknowledge that your information
                  is subject to our Privacy Policy.
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script src="Assets/JS/ContactUs_Page/Stiky_Nav.js"></script>
    <script src="Assets/JS/ContactUs_Page/scripts.js"></script>
  </body>
</html>
