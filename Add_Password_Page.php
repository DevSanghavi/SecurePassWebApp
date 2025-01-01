<?php

session_start();
require 'Database/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['add_password']))
  {
    if(empty($_POST['nickname']) || empty($_POST['website_url']) || empty($_POST['app_username']) || empty($_POST['app_password']))
    {
      echo "<script> alert('Please fill in all the fields'); </script>";
      header("Location: Add_Password_Page.php");
      exit();
    }
    else
    {
      $nickname = $_POST['nickname'];
      $website_url = $_POST['website_url'];
      $app_username = $_POST['app_username'];
      $app_password = $_POST['app_password'];
      $date = date('Y-m-d H:i:s');
    
      $query = "INSERT INTO password_table (user_id, nickname, web_url, app_username, app_password, created_at) VALUES ('$_SESSION[user_id]', '$nickname', '$website_url', '$app_username', '$app_password', '$date')";
      $result = mysqli_query($con, $query);
    
      if ($result) 
      {
        echo "<script> alert('Password added successfully'); </script>";
        header("Location: User_Interface.php");
        exit();
      } 
      else 
      {
        echo "<script> alert('Error: Unable to add password'); </script>";
        header("Location: Add_Password_Page.php");
        exit();
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

    <link rel="stylesheet" href="Assets/CSS/Add Password/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Add Password/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap"
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
                    class="vector-0"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/Add Password/vector--0.svg"
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
            <form class="depth-3-frame-01" method="POST">
              <div class="depth-4-frame-01">
                <div class="depth-5-frame-01"></div>
                <div class="depth-5-frame-1"></div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <h1 class="add-password">Add Password</h1>
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-01">
                    <div class="nickname">Nickname</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="e.g.  Google account"
                    type="text"
                    name="nickname"
                  />
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-01">
                    <div class="nickname">Website URL</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="e.g.  accounts.google.com"
                    type="text"
                    name="website_url"
                  />
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-01">
                    <div class="nickname">App Username</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="username"
                    type="text"
                    name="app_username"
                  />
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-01">
                    <div class="nickname">App Password</div>
                  </div>
                  <input
                    class="depth-6-frame-1"
                    placeholder="••••••••"
                    type="password"
                    name="app_password"
                  />
                </div>
              </div>
              <div class="depth-4-frame-7">
                <button class="button">
                  <img class="star-icon" alt="" src="Assets/Image/Add Password/star.svg" />

                  <div class="button1">
                    <a href="User_Interface.html"
                    style="color: aliceblue;text-decoration:none">Back</a></div>
                  <img class="star-icon" alt="" src="Assets/Image/Add Password/x.svg" />
                </button>
                <button class="depth-5-frame-08" name="add_password">
                  <div class="depth-6-frame-06">
                    <div href="User_Interface.html"
                    style="color: aliceblue;text-decoration:none">Add Password</div>
                  </div>
                </button>
              </div>
              <footer class="depth-4-frame-8">
                <div class="note-to-protect">
                  Note: To protect your data, we encrypt it before storing it.
                  We can't recover your password.
                </div>
              </footer>
            </form>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
