<?php
session_start();
require 'Database/connection.php';
// Ensure the database connection is included
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Load Composer's autoloader


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(isset($_POST['send_code'])){
    // Capture user input
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $date = date('Y-m-d H:i:s');

    $user_already_exists = "SELECT * FROM user_table WHERE username = '$username' OR email = '$email'";

    $result = mysqli_query($con, $user_already_exists);
    
    if(mysqli_num_rows($result) > 0)
    {
      $result_fetch = mysqli_fetch_assoc($result);
      if($result_fetch['username'] == $username)
      {
        echo "<script>alert('$result_fetch[username] - Username already exists'); window.location.href = 'Sign_Up_Page.php'</script>";
      }
      else
      {
        echo "<script>alert('$result_fetch[email] - Email already exists');</script>";
      }
    }
    else
    {
      if ($password === $confirm_password) {
        // Prepare the SQL query
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $con_pass = password_hash($confirm_password, PASSWORD_BCRYPT);
        $query = "INSERT INTO user_table (NAME, USERNAME, EMAIL, PASSWORD, CONFIRM_PASSWORD, CREATED_AT, ROLE) VALUES ('$name', '$username', '$email', '$pass', '$con_pass', '$date', 0)";
    
        
        // Execute the query
        if ($con->query($query) === TRUE) {
          // echo "<script>alert('User  Registration Successful'); window.location.href='Email_Verification_Page.php';</script>";

          // session_start();


          // session_start();

          // Function to send verification code
          function sendVerificationCode($email, $username) {
              global $con;
              $code = rand(100000, 999999); // Generate a random 6-digit code

              $query2 = "SELECT user_id from user_table where username = '$username' AND email = '$email'";
              $result = mysqli_query($con, $query2);
              if($result)
              {
                if(mysqli_num_rows($result) > 0)
                {
                  $row = mysqli_fetch_assoc($result);
                  $user_id = $row['user_id'];
                  $_SESSION['user_id'] = $user_id;
                  $query1 = "UPDATE user_table set verification_code = '$code' WHERE user_id = '$user_id'";
                
                  if(mysqli_query($con, $query1))
                  {
                    $_SESSION['verification_code'] = $code; // Store the code in session
                    $_SESSION['code_generated_time'] = time(); // Store the current timestamp
                  
                    $mail = new PHPMailer(true);
                    try 
                    {
                        //Server settings
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                        $mail->SMTPAuth = true;
                        $mail->Username = 'devsanghavi53@gmail.com'; // SMTP username
                        $mail->Password = 'ycyj lyua ezyl opif'; // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                        $mail->Port = 587; // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('devsanghavi53@gmail.com', 'SecurePass');
                        $mail->addAddress($email); // Add a recipient
                    
                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Your Verification Code';
                        $mail->Body    = "Your verification code is: <strong>$code</strong>";
                    
                        $mail->send();
                        // echo 'Verification code has been sent to your email.';
                        echo "<script>alert('User  Registration Successful'); window.location.href='Email_Verification_Page.php';</script>";
                    } 
                    catch (Exception $e) 
                    {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                  }

                  }
                }
              }

              
              sendVerificationCode($email, $username);
            
        } 
        else 
        {
          echo "<script>alert('Error: " . $con->error . "');</script>";
        }
      } 
      else 
      {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
      }
    
    }

  }
  else
  {
    echo "<script>alert('Error: " . $con->error . "');</script>";
  }
  
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['send_code'])) {
        // $email = $_POST['email'];
    }
}






?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    
    <link rel="stylesheet" href="Assets/CSS/SignUpPage/global.css" />
    <link rel="stylesheet" href="Assets/CSS/SignUpPage/index.css" />
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap" />
  </head>
  
  <body>
    <div class="root">
      <main class="navigation">
        <section class="depth-1-frame-0">
          <header class="depth-2-frame-01">
            <div class="depth-3-frame-03">
              <div class="depth-4-frame-03">
                <div class="depth-5-frame-010">
                  <img
                  class="depth-level-icon"
                  loading="lazy"
                  alt=""
                  src="Assets/Image/SignUpPage/vector--0.svg" />
                  
                  <div class="depth-6-frame-09"></div>
                </div>
              </div>
              <div class="depth-4-frame-03">
                <b class="securepass2">SecurePass</b>
              </div>
            </div>
            <a class="home" href="index.php">Home</a>
          </header>
          <div class="depth-2-frame-1">
          <form method="post" name="register" >
          <div class="depth-3-frame-04">
            <div class="depth-4-frame-04">
              <h3 class="create-an-account">Create an account</h3>
              </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-011">
                <label>Name:</label>
                <div class="depth-6-frame-010">
                  <input
                    class="your-name"
                    placeholder="Your  name"
                    type="text"
                    name="name" />
                </div>
              </div>
            </div>
            <br>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-011">
                <label>Email:</label>
                <div class="depth-6-frame-011">
                  <input
                    class="youexamplecom"
                    placeholder="you@example.com"
                    type="email"
                    name="email" />
                  </div>
              </div>
            </div>
            <br>
            <div class="depth-4-frame-41">
              <div class="you-can-use">
                You can use letters, numbers & periods
              </div>
            </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-011">
                <label>User Name:</label>
                <div class="depth-6-frame-011">
                  <input
                  id="username-input"
                      class="username"
                      placeholder="Username"
                      type="text"
                      name="username"
                      required />
                </div>
              </div>
            </div>

            <br>
            <div class="depth-4-frame-41">
              <div class="you-can-use1">
                You can use any letters, numbers & symbols
              </div>
            </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-011">
                <label>Password:</label>
                <div class="depth-6-frame-011">
                  <input
                    class="password"
                    placeholder="Password"
                    type="password"
                    name="password" />
                  <div class="show-password">show</div>
                </div>
              </div>
            </div>
            <br>
            <div class="depth-4-frame-41">
              <div class="use-at-least">Use at least 8 characters</div>
            </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-011">
                <label>Confirm Password:</label>
                <div class="depth-6-frame-010">
                  <input
                    class="confirm-password"
                    placeholder="Confirm  password"
                    type="password"
                    name="confirm_password" />
                  <div class="show-password">show</div>
                </div>
              </div>
            </div>
            <br>
            <div class="depth-4-frame-10">
                <button class="depth-5-frame-016" name="send_code">
                  <div class="depth-6-frame-015">
                    <div class="create-account" style="color: aliceblue;text-decoration: none;">Create account</div>
                  </div>
                </button>
              </div>
            </form>
            <div class="depth-4-frame-14">
              <div class="already-have-an">
                Already have an account? <a style="color: aliceblue;" href="Login_Page.php">Log in</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="Assets/JS/SignUp_Page/Stiky_Nav.js"></script>
  <script src="Assets/JS/SignUp_Page/scripts.js"></script>
</body>

</html>