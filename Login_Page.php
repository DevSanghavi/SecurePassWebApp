<?php

session_start();
require 'Database/connection.php';
// Ensure the database connection is included


// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//   // Capture user input
//   $email = $_POST["email"];
//   $username = $_POST["username"];
//   $password = $_POST["password"];

// Start the session
// session_start();

// Include database connection (assuming you have a db.php)
// include 'db.php';

// Check login form submission
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Get username and password from POST
//     $username = $_POST['email_username'];
//     $password = $_POST['password'];

//     // Query to check user credentials
//     $query = "SELECT id, username, role FROM users WHERE username = ? AND password = ?";
//     $stmt = $con->prepare($query);
//     $stmt->bind_param('ss', $username, $password);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     // Check if user exists
//     if ($result->num_rows === 1) {
//         $user = $result->fetch_assoc();

//         // Store user data in session
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['username'] = $user['username'];
//         $_SESSION['role'] = $user['role'];

//         // Redirect based on role
//         if ($user['role'] === 'admin-user') {
//             header("Location: admin-dashboard.php");
//         } else if ($user['role'] === 'end-user') {
//             header("Location: ui.php");
//         } else {
//             echo "Invalid role!";
//         }
//     } else {
//         echo "Invalid username or password!";}
//     }


if (isset($_POST["login"])) {
  $query = "SELECT * FROM user_table where username = '$_POST[email_username]' OR email = '$_POST[email_username]'";
  $result = mysqli_query($con, $query);
  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $result_fetch = mysqli_fetch_assoc($result);

      $_SESSION['user_id'] = $result_fetch['user_id'];
      // $_SESSION['username'] = $result_fetch['username'];
      $_SESSION['role'] = $result_fetch['role'];


      if($result_fetch['role'] == 1)
      {
        if (password_verify($_POST["password"], $result_fetch["password"])) {
          #if password match
          $_SESSION["logged_in"] = true;
          $_SESSION["username"] = $result_fetch["username"];
          $_SESSION["session_time"] = time();
          header("location: Admin_Dashboard.php");
        } else {
          #if incorrect password
          echo "
          <script>
            alert('Incorrect password');
            window.location.href='index.php';
          </script>
          ";
        }
  
      }
      else
      {
        if (password_verify($_POST["password"], $result_fetch["password"])) {
          #if password match
          $_SESSION["logged_in"] = true;
          $_SESSION["username"] = $result_fetch["username"];
          $_SESSION["session_time"] = time();
          header("location: User_PIN_Page.php");
        } else {
          #if incorrect password
          echo "
          <script>
            alert('Incorrect password');
            window.location.href='index.php';
          </script>
          ";
        }
      }
  
      }
      else {
        echo "
        <script>
          alert('Email or username not registered');
          window.location.href='index.php';
        </script>
        ";
      }
  } else {
    echo "
    <script>
      alert('Cannot run query');
      window.location.href='index.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="Assets/CSS/Login-Page/global.css" />
  <link rel="stylesheet" href="Assets/CSS/Login-Page/index.css" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap" />
</head>

<body>
  <div class="galileo-design" role="banner" aria-label="Main Navigation">
    <main class="depth-0frame-0">
      <section class="depth-1-frame-0">
        <header class="depth-2-frame-01" aria-label="Primary Navigation">
          <div class="depth-3-frame-03">
            <div class="depth-4-frame-03">
              <div class="depth-5-frame-010">
                <img
                  class="vector-05"
                  loading="lazy"
                  alt=""
                  src="Assets/Image/Login-Page/vector--0.svg" />

                <div class="depth-6-frame-09"></div>
              </div>
            </div>
            <div class="depth-4-frame-03">
              <b class="securepass2">SecurePass</b>
            </div>
          </div>
          <div class="depth-5-frame-011">
            <a class="home" href="index.php">Home</a>
          </div>
        </header>
        <div class="depth-2-frame-1">
          <form class="depth-3-frame-04" method="post">
            <div class="depth-4-frame-04">
              <h3 class="welcome-to-securepass1">Welcome to SecurePass</h3>
            </div>
            <div class="depth-4-frame-14">
              <div class="enter-your-username">
                Enter your username and password to log in.
              </div>
            </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-012">
                <b style="font-family: var(--font-manrope);color:aliceblue;
                        font-weight: 500;font-size: var(--font-size-base);">Username</b>
                <div class="depth-6-frame-16">
                  <input
                    class="depth-6-frame-010"
                    placeholder="Username"
                    type="text"
                    name="email_username" />
                </div>
              </div>
            </div>
            <div class="depth-4-frame-21">
              <div class="depth-5-frame-012">
                <b style="font-family: var(--font-manrope);color:aliceblue;
                        font-weight: 500;font-size: var(--font-size-base);">Password</b>
                <div class="depth-6-frame-16">
                  <input
                    class="depth-6-frame-010"
                    placeholder="Password"
                    type="text"
                    name="password" />
                </div>
              </div>
            </div>
            <div class="depth-4-frame-41">
              <div class="depth-5-frame-014">
                <input class="depth-6-frame-012" type="checkbox" />

                <div class="depth-4-frame-03">
                  <div class="remember-this-account">
                    Remember this account
                  </div>
                </div>
              </div>
            </div>
            <div class="depth-4-frame-5">
              <button class="depth-5-frame-015" name="login">
                <div class="depth-6-frame-013">
                  <div style="color: aliceblue;text-decoration:none">Log in</div>
                </div>
              </button>
            </div>
            <div class="depth-4-frame-7">
              <div class="forgot-your-username">
                <a style="color: aliceblue;" href="Forgot_Password_Page.php"> Forgot your password? </a>
              </div>
            </div>
            <div class="depth-4-frame-7">
              <div class="forgot-your-username">
                New to SecurePass? <a style="color: aliceblue;" href="Sign_Up_Page.php">Sign up</a>
              </div>
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>
  <!-- <script src="Assets/JS/LogIn_Page/Stiky_Nav.js"></script> -->
</body>

</html>