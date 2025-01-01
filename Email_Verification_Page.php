<?php

  session_start();
  require 'Database/connection.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $user_code = '';
    for($i=1; $i<=6; $i++)
    {
      $user_code .= $_POST["code$i"];
    }
    if (isset($_POST['verify_code'])) 
    {
        $current_time = time(); // Get the current timestamp

        // Check if the verification code is still valid (within 1 minute)
        if (isset($_SESSION['code_generated_time']) && $current_time - $_SESSION['code_generated_time'] <= 60) 
        {
            if ($user_code == $_SESSION['verification_code']) 
            {
                echo "<script> alert('Verification Successful'); 
                window.location.href = 'Login_Page.php'</script>";
                // Deactivate the code by clearing the session variables
                unset($_SESSION['verification_code']);
                unset($_SESSION['code_generated_time']);
                // You can redirect or perform further actions here
            } 
            else 
            {
                echo 'Error: The verification code does not match.';
            }
        } 
        else 
        {
            echo 'Error: The verification code has expired. Please request a new code.';
        }
    } 
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/EmailVerification/global.css" />
    <link rel="stylesheet" href="Assets/CSS/EmailVerification/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap"
    />
  </head>
  <body>
    <div class="index">
      <main class="depth-0-frame-01">
        <section class="depth-1-frame-01">
          <header class="depth-2-frame-02">
            <div class="depth-3-frame-05">
              <div class="depth-4-frame-05">
                <div class="depth-5-frame-017">
                  <img
                    class="vector-05"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/EmailVerification/vector--0.svg"
                  />

                  <div class="depth-6-frame-016"></div>
                </div>
              </div>
              <div class="depth-4-frame-05">
                <b class="securepass3">SecurePass</b>
              </div>
            </div>
          </header>
          <div class="depth-2-frame-11">
            <form action="" method="post">
            <div class="depth-3-frame-06">
              <div class="depth-4-frame-06">
                <h3 class="enter-the-6-digit">
                  Enter the 6-digit verification code sent to you at
                  example@gmail.com
                </h3>
              </div>
              <div class="depth-4-frame-16">
                <div class="depth-5-frame-018 input-container">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code1">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code2">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code3">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code4">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code5">
                <input class="depth-6-frame-017" type="text" maxlength="1" size="1" oninput="validateNumber(this)" name="code6">
                </div>
              </div>
              <div class="depth-4-frame-22">
                <div class="depth-5-frame-019">
                  <button class="depth-6-frame-018">
                    <div class="depth-7-frame-011">
                      <a class="previous" href="Sign_Up_Page.php">Previous</a>
                    </div>
                  </button>
                  <button class="depth-6-frame-17" type="submit" name="verify_code">
                    <div class="depth-7-frame-011">
                      <div class="previous">Next</div>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </section>
      </main>
    </div>
    <script src="Assets/JS/Email_Verification/scripts.js"></script>
  </body>
</html>