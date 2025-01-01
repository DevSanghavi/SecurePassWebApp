<?php

session_start();
require 'Database/connection.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if(isset($_POST['add_user']))
  {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $date = date('Y-m-d H:i:s');

    if(empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($role))
    {
      echo "<script> alert('Please fill in all the fields'); </script>";
      header("Location: Admin_Add_User.php");
      exit();
    }
    else
    {
      if($password !== $confirm_password)
      {
        echo "<script> alert('Passwords do not match'); </script>";
        header("Location: Admin_Add_User.php");
        exit();
      }
      else
      {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT);
        if($role == 'admin')
        {
          $role = 1;
        }
        else
        {
          $role = 0;
        }

        $query = "INSERT INTO user_table (name, username, email, password, confirm_password, verification_code, PIN, SQAns, created_at, updated_at, role) VALUES ('$name', '$username', '$email', '$password', '$confirm_password', null, null, null, '$date', null, '$role')";
        $result = mysqli_query($con, $query);

        if($result)
        {
          echo "<script> alert('User added successfully'); </script>";
          header("Location: Admin_Users.php");
          exit();
        }
        else
        {
          echo "<script> alert('Error: Unable to add user'); </script>";
          header("Location: Admin_Add_User.php");
          exit();
        }
      }
    }

  }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/Admin adduser/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Admin adduser/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />
  </head>
  <style>
    input[type="radio"] {
      margin-right: 10px;
    }
  </style>
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
                    src="Assets/Image/Admin adduser/vector--0.svg"
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
                <div class="depth-5-frame-01">
                  <h1 class="add-user">Add user</h1>
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Name</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="John  Doe"
                    type="text"
                    name="name"
                  />
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Username</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="johndoe"
                    type="text"
                    name="username"
                  />
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Email</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="you@example.com"
                    type="email"
                    name="email"
                  />
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Password</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="••••••••"
                    type="password"
                    name="password"
                  />
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="name">Confirm Password</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="••••••••"
                    type="password"
                    name="confirm_password"
                  />
                </div>
              </div>
              <div class="depth-4-frame-6">
                <b class="role">Role</b>
              </div>
              <div class="depth-4-frame-7">
                <div class="depth-5-frame-1">
                  <input type="radio" name="role" value="admin">
                  <label style="color: rgb(176, 176, 176);">Admin</label>
                </div>
                <div class="depth-5-frame-07">
                  <input type="radio" name="role" value="user">
                  <label  style="color: rgb(176, 176, 176);">User</label>
                </div>
              </div>
              <div class="depth-4-frame-9">
                <button class="button">
                  <img class="star-icon" alt="" src="Assets/Image/Admin adduser/star.svg" />

                  <div class="button1"><a style="text-decoration: none;color:aliceblue" href="Admin_Users.php">Back</a></div>
                  <img class="star-icon" alt="" src="Assets/Image/Admin adduser/x.svg" />
                </button>
                <button class="depth-5-frame-08" name="add_user">
                  <div class="depth-6-frame-08">
                    <div class="add-password" href="Admin_Users.html">Create User</div>
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
