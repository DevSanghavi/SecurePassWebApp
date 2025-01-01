<?php

  session_start();
  require 'Database/connection.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $user_pin = '';
    for($i=1; $i<=4; $i++)
    {
      $user_pin .= $_POST["code$i"];
    }
    if (isset($_POST['register_pin'])) 
    {
        // $add_pin = password_hash($user_pin, PASSWORD_BCRYPT);

        // $update_data = "UPDATE user_table SET PIN = $add_pin WHERE user_id = $_SESSION[user_id]";

        $update_data = "UPDATE user_table SET PIN = $user_pin WHERE user_id = $_SESSION[user_id]";
        
        $result = mysqli_query($con, $update_data);

        if($result)
        {
          echo "<script> alert('Pin Set Sucessfully'); </script>";
          header("location: Security_Question_Page.php");
        }
        else
        {
          echo 'Error: Unable to set PIN';
        }
    } 
    else 
    {
      echo 'Error: The verification code does not match.';
    }
  } 
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/PIN/global.css" />
    <link rel="stylesheet" href="Assets/CSS/PIN/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap"
    />
  </head>
  <script>
    function limitInput(event) {
        const input = event.target;
        if (input.value.length > 1) {
            input.value = input.value.slice(0, 1); // Limit to the first character
        }
    }
</script>
  <body>
    <div class="galileo-design">
      <main class="depth-0-frame-02">
        <section class="depth-1-frame-02">
          <header class="depth-2-frame-03">
            <div class="depth-3-frame-07">
              <div class="depth-4-frame-07">
                <div class="depth-5-frame-020">
                  <img
                    class="vector-06"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/PIN/vector--0.svg"
                  />

                  <div class="depth-6-frame-019"></div>
                </div>
              </div>
              <div class="depth-4-frame-07">
                <b class="securepass4">SecurePass</b>
              </div>
            </div>
          </header>
          <div class="depth-2-frame-04">
            <form action="" method="post">
            <div class="depth-3-frame-08">
              <div class="depth-4-frame-08">
                <div class="depth-5-frame-021">
                  <img
                    class="depth-6-frame-020"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/PIN/depth-6-frame-02@2x.png"
                  />
                </div>
              </div>
              <div class="depth-4-frame-18">
                <h3 class="create-a-4-digit">Create a 4-digit PIN</h3>
              </div>
              <div class="depth-4-frame-23">
                <div class="securepass-requires-a">
                  SecurePass requires a 4-digit PIN to access your passwords
                </div>
              </div>
              <div class="depth-4-frame-32">
                <div class="depth-5-frame-022">
                  <input class="depth-6-frame-021" type="text" maxlength="1" size="1" name="code1">
                  <input class="depth-6-frame-021" type="text" maxlength="1" size="1" name="code2">
                  <input class="depth-6-frame-021" type="text" maxlength="1" size="1" name="code3">
                  <input class="depth-6-frame-021" type="text" maxlength="1" size="1" name="code4">
                  <!-- <input style="color: aliceblue;font-weight: 200;font-size: larger" class="depth-6-frame-021" type="number" id="single-digit" name="single-digit" min="0" max="9" step="1" oninput="limitInput(event)" required>
                  <input style="color: aliceblue;font-weight: 200;font-size: larger" class="depth-6-frame-021" type="number" id="single-digit" name="single-digit" min="0" max="9" step="1" oninput="limitInput(event)" required>
                  <input style="color: aliceblue;font-weight: 200;font-size: larger" class="depth-6-frame-021" type="number" id="single-digit" name="single-digit" min="0" max="9" step="1" oninput="limitInput(event)" required> -->
                </div>
              </div>
              <div class="depth-4-frame-42">
                <button class="depth-5-frame-023" name="register_pin">
                  <div class="depth-6-frame-022">
                    <div href="Security_Question_Page.html" class="continue">Continue</div>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </form>
        </section>
      </main>
    </div>
    <script src="Assets/JS/PIN/scripts.js"></script>
  </body>
</html>
