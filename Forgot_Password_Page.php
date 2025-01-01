<?php
session_start();
require 'Database\connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
      // do nothing

    }

    if (isset($_POST['set_new_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];


        $nickname = $_POST['sq_ans'];
        $pin = $_POST['pin'];

        $query = "SELECT * FROM user_table WHERE SQAns = '$nickname' AND PIN = '$pin'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            echo "<script>alert('Nickname and PIN are valid.');</script>";
            echo "<script>document.getElementById('new_password').disabled = false;</script>";
            echo "<script>document.getElementById('confirm_new_password').disabled = false;</script>";
        } else {
            header("Location: Login_page.php");
            exit();
        }


        if ($new_password === $confirm_new_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $nickname = $_POST['sq_ans'];
            $pin = $_POST['pin'];

            $update_query = "UPDATE user_table SET Password = '$hashed_password' WHERE SQAns = '$nickname' AND PIN = '$pin'";
            if (mysqli_query($con, $update_query)) {
                echo "<script>alert('Password updated successfully!');</script>";
                header("Location: Login_page.php");
                exit();
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/Forgot password/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Forgot password/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />
  </head>
  <body>
    <div class="galileo-design">
      <main class="depth-0-frame-0">
        <section class="depth-1-frame-0">
          <header class="depth-2-frame-0">
            <div class="depth-3-frame-0">
              <div class="depth-4-frame-0">
                <div class="depth-5-frame-0">
                  <img
                    class="new-password-input-fields"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/Forgot password/vector--0.svg"
                  />

                  <div class="depth-6-frame-0"></div>
                </div>
              </div>
              <div class="depth-4-frame-0">
                <b class="securepass">SecurePass</b>
              </div>
            </div>
          </header>
          <div class="depth-2-frame-1">
            <form class="depth-3-frame-01" method="post">
              <div class="depth-4-frame-01">
                <h2 class="forgot-password">Forgot Password ?</h2>
              </div>
              <div class="depth-4-frame-11">
                <div class="what-is-your">What is your nickname?</div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-01">
                  <div class="depth-6-frame-01">
                    <div class="depth-7-frame-0">
                      <input class="answer" placeholder="Answer" type="text" name="sq_ans" />
                    </div>
                    <div class="depth-7-frame-1">
                      <div class="depth-8-frame-0">
                        <img
                          class="new-password-input-fields"
                          alt=""
                          src="Assets/Image/Forgot password/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-3">
                <div class="please-enter-a">Enter your 4 Digit PIN</div>
              </div>
              <div class="depth-4-frame-4">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="depth-7-frame-01">
                      <input
                        class="digit-pin"
                        placeholder="4-digit  PIN"
                        type="text"
                        maxlength="4"
                        name="pin"
                      />
                    </div>
                    <div class="depth-7-frame-1">
                      <div class="depth-8-frame-0">
                        <img
                          class="new-password-input-fields"
                          alt=""
                          src="Assets/Image/Forgot password/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="depth-4-frame-5">
                  <button class="depth-5-frame-03" name="submit">
                    <div class="depth-6-frame-03">
                      <b class="submit">Submit</b>
                    </div>
                  </button>
                </div>
              </div>
              <div class="depth-4-frame-3">
                <div class="please-enter-a">Please enter a new password.</div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-01">
                  <div class="depth-6-frame-01">
                    <div class="depth-7-frame-02">
                      <input
                        id="new_password"
                        class="new-password"
                        placeholder="New  password"
                        type="text"
                        maxlength="100"
                        name="new_password"
                      />
                    </div>
                    <div class="depth-7-frame-1">
                      <div class="depth-8-frame-0">
                        <img
                          class="new-password-input-fields"
                          alt=""
                          src="Assets/Image/Forgot password/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-01">
                  <div class="depth-6-frame-01">
                    <div class="depth-7-frame-03">
                      <input
                        id="confirm_new_password"
                        class="confirm-new-password"
                        placeholder="Confirm  new password"
                        type="text"
                        maxlength="100"
                        name="confirm_new_password"
                      />
                    </div>
                    <div class="depth-7-frame-1">
                      <div class="depth-8-frame-0">
                        <img
                          class="new-password-input-fields"
                          alt=""
                          src="Assets/Image/Forgot password/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-9">
                <button class="button">
                  <img class="star-icon" alt="" src="Assets/Image/Forgot password/star.svg" />

                  <div class="button1"><a 
                    style="color: aliceblue;text-decoration:none" href="index.php">Back</a></div>
                  <img class="star-icon" alt="" src="Assets/Image/Forgot password/x.svg" />
                </button>
                <button class="depth-5-frame-06" name="set_new_password">
                  <div class="depth-6-frame-03">
                    <b class="submit">Set new Password</b>
                  </div>
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
