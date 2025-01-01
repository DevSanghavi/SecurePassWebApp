<?php

session_start();
require 'Database/connection.php';
echo print_r($_SESSION);

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user_table WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['update_info'])) {
    $newname = $_POST['newname'];
    $newusername = $_POST['newusername'];
    $newemail = $_POST['newemail'];

    if ($newname !== $row['name'] || $newusername !== $row['username'] || $newemail !== $row['email']) {
      // Update the database
      $updateQuery = "UPDATE user_table SET name = '$newname', username = '$newusername', email = '$newemail'  WHERE user_id = $_SESSION[user_id]";
      $result = mysqli_query($con, $updateQuery);
      if ($result) {
        echo "<script> alert('User details updated successfully'); </script>";
        // Refresh the page to show updated details
        header("Location: User_Profile_Page.php");
        exit();
      } else {
        echo "<script> alert('Error: Unable to update user details'); </script>";
      }
    } else {
      echo "<script> alert('No changes detected'); </script>";
      header("Location: User_Profile_Page.php");
      exit();
    }
  }

  if (isset($_POST['change_password'])) {
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($newpassword !== $row['password']) {
      if ($newpassword !== $confirmpassword) {
        echo "<script> alert('Passwords do not match'); </script>";
        header("Location: User_Profile_Page.php");
        exit();
      } else {
        $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);

        $updateQuery = "UPDATE user_table SET password = '$newpassword' WHERE user_id = $_SESSION[user_id]";
        $result = mysqli_query($con, $updateQuery);
        if ($result) {
          echo "<script> alert('Password updated successfully'); </script>";
          // Refresh the page to show updated details
          header("Location: User_Profile_Page.php");
          exit();
        } else {
          echo "<script> alert('Error: Unable to update password'); </script>";
        }
      }
    } else {
      echo "<script> alert('No changes detected'); </script>";
      header("Location: User_Profile_Page.php");
      exit();
    }
    // Update the database
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="Assets/CSS/UserProfile/global.css" />
  <link rel="stylesheet" href="Assets/CSS/UserProfile/index.css" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" />
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
                  class="vector-0"
                  loading="lazy"
                  alt=""
                  src="Assets/Image/UserProfile/vector--0.svg" />

                <div class="depth-6-frame-0"></div>
              </div>
            </div>
            <div class="depth-4-frame-0">
              <a class="securepass">SecurePass</a>
            </div>
          </div>
          <img
            class="account-circle-icon"
            loading="lazy"
            alt=""
            src="Assets/Image/UserProfile/account-circle.svg"
            id="account-circle" />
          <!-- Add this inside the <header> section, right after the account-circle-icon -->
          <div class="user-menu" id="user-menu">
            <div class="menu-item" onclick="<?php 
            
            
            if($row['role'] == 1){
              echo "Admindashboard()";
            } else {
              echo "dashboard()";
            }

            ?>">Dashboard</div>
            <div class="menu-item" onclick="deleteAccount()">Delete Account</div>
            <div class="menu-item" onclick="logOut()">Log Out</div>
          </div>

        </header>
        <div class="depth-2-frame-1">
          <form class="depth-3-frame-01" method="POST">
            <div class="depth-4-frame-01">
              <div class="depth-5-frame-01">
                <h1 class="profile">Profile</h1>
              </div>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <input type="text" class="depth-6-frame-1" placeholder="  Name" style="color: aliceblue;font-size: large" name="newname" value="<?php echo $row['name']; ?>">
                <!-- <div class="depth-6-frame-1" style="color: aliceblue;">&nbsp;&nbsp; Name </div> -->
              </div>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <input type="text" class="depth-6-frame-11" placeholder="  Username" style="color: aliceblue;font-size: large" name="newusername" value="<?php echo $row['username']; ?>">
                <!-- <div class="depth-6-frame-11" style="color: aliceblue;">&nbsp;&nbsp; Username</div> -->
              </div>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <input type="text" class="depth-6-frame-11" placeholder="  you@example.com" style="color: aliceblue;font-size: large" name="newemail" value="<?php echo $row['email']; ?>">
                <!-- <div class="depth-6-frame-11" style="color: aliceblue;">&nbsp;&nbsp; Email</div> -->
              </div>
            </div>
            <div class="depth-4-frame-4">
              <button class="depth-5-frame-05" name="update_info">
                <div class="depth-6-frame-04">
                  <b class="change-email">Change Email</b>
                </div>
              </button>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <div class="depth-6-frame-05">
                  <div class="current-password">Current password</div>
                </div>
                <input
                  class="depth-6-frame-13"
                  placeholder="••••••••"
                  type="password"
                  value="<?php echo $row['password']; ?>"
                  disabled />
              </div>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <div class="depth-6-frame-05">
                  <div class="current-password">New password</div>
                </div>
                <input
                  class="depth-6-frame-14"
                  placeholder="••••••••"
                  type="password" />
              </div>
            </div>
            <div class="depth-4-frame-11">
              <div class="depth-5-frame-02">
                <div class="depth-6-frame-05">
                  <div class="current-password">Confirm new password</div>
                </div>
                <input
                  class="depth-6-frame-14"
                  placeholder="••••••••"
                  type="password" />
              </div>
            </div>
            <div class="depth-4-frame-4">
              <button class="depth-5-frame-09" name="change_password">
                <div class="depth-6-frame-04">
                  <b class="change-email">Change Password</b>
                </div>
              </button>
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>
  <script src="Assets/JS/User_Profile/scripts.js"></script>
</body>

</html>