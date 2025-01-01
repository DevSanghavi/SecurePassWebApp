<?php

  session_start();
  require 'Database/connection.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if (isset($_POST['sq_qus'])) 
    {
      if (empty($_POST['ans'])) 
      {
        echo "<script> alert('Please enter the answer to the security question'); </script>";
      }
      else
      {
        $insert_data = "UPDATE user_table SET SQAns = '$_POST[ans]' WHERE user_id = '$_SESSION[user_id]'";

        $result = mysqli_query($con, $insert_data);

        if($result)
        {
          echo "<script> alert('Security Questions Set Sucessfully'); </script>";
          header("location: User_Interface.php");
        }
      }
    } 
    else 
    {
    }
  } 
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/SecurityQues/global.css" />
    <link rel="stylesheet" href="Assets/CSS/SecurityQues/index.css" />
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
    <div class="galileo-design1">
      <main class="depth-0-frame-03">
        <section class="depth-1-frame-03">
          <header class="depth-2-frame-05">
            <div class="depth-3-frame-09">
              <div class="depth-4-frame-09">
                <div class="depth-5-frame-024">
                  <img
                    class="vector-07"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/SecurityQues/vector--0.svg"
                  />

                  <div class="depth-6-frame-023"></div>
                </div>
              </div>
              <div class="depth-4-frame-09">
                <b class="securepass5">SecurePass</b>
              </div>
            </div>
          </header>
          <div class="depth-2-frame-12">
            <form action="" method="post">
            <div class="depth-3-frame-010">
              <div class="depth-4-frame-010">
                <h3 class="set-up-security">Set up security questions</h3>
              </div>
              <div class="depth-4-frame-110">
                <div class="security-questions-help">
                  Security questions help us verify your identity if you forget
                  your password.
                </div>
              </div>
              <div class="depth-4-frame-24">
                <div class="depth-5-frame-025">
                  <div class="depth-6-frame-024">
                    <input
                      class="what-is-your"
                      placeholder="What  is your nickname?"
                      type="text"
                      name="ans"
                    />
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-33">
                <div class="depth-5-frame-026">
                  <button class="depth-6-frame-19" name="sq_qus">
                    <div class="depth-7-frame-013">
                      <div class="back" style="color:aliceblue;text-decoration:none">Next</div>
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
  </body>
</html>
