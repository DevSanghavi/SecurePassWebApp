<?php

session_start();
require 'Database/connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchTerm = '%' . $search . '%';
$query = "SELECT * FROM password_table WHERE user_id = '$_SESSION[user_id]' AND (nickname LIKE '$searchTerm' OR web_url LIKE '$searchTerm' OR app_username LIKE '$searchTerm' OR app_password like '$searchTerm');";
$result = mysqli_query($con, $query);
$passwords = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/UI/global.css" />
    <link rel="stylesheet" href="Assets/CSS/UI/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap"
    />
  </head>
  <body>
    <div class="galileo-design">
      <main class="depth-0frame-0">
        <section class="depth-1-frame-0">
          <header class="depth-2-frame-1">
            <div class="depth-3-frame-0">
              <div class="depth-4-frame-0">
                <div class="depth-5-frame-0">
                  <img
                    class="search-icon"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/UI/vector--0.svg"
                  />

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
              src="Assets/Image/UI/account-circle.svg"
              id="account-circle"
            />
            <!-- Add this inside the <header> section, right after the account-circle-icon -->
<div class="user-menu" id="user-menu">
    <div class="menu-item" onclick="manageProfile()">Manage Profile</div>
    <div class="menu-item" onclick="deleteAccount()">Delete Account</div>
    <div class="menu-item" onclick="logOut()">Log Out</div>
</div>
          </header>
          <footer class="depth-2-frame-0">
            <form action="" method="get">
            <div class="depth-3-frame-1">
              <div class="depth-4-frame-01">
                <div class="depth-5-frame-01">
                  <h1 class="manage-passwords">Manage Passwords</h1>
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-01">
                    <div class="depth-7-frame-0">
                      <b class="add-a-password">Add a password</b>
                    </div>
                    <div class="depth-7-frame-1">
                      <div class="you-can-add">
                        You can add your own passwords to SecurePass by clicking
                        the button below.
                      </div>
                    </div>
                  </div>
                  <div class="depth-6-frame-1">
                    <div class="depth-7-frame-01">
                      <div class="add-password">
                        <a href="Add_Password_Page.php" style="color: aliceblue;text-decoration:none">Add Password</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-02">
                    <div class="depth-7-frame-02">
                      <div class="depth-8-frame-0">
                        <img
                          class="search-icon"
                          alt=""
                          src="Assets/Image/UI/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                    <input type="search" class="depth-7-frame-11" style="color: aliceblue;font-size: large" placeholder="Search for a password" name="search">
                    <!-- <div class="depth-7-frame-11">
                      <div class="search-for-a">Search for a password</div>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-3">
                <div class="depth-5-frame-04">
                  <div class="depth-6-frame-03">
                    <div class="depth-7-frame-0">
                      <div class="depth-8-frame-01">
                        <div class="depth-9-frame-01">
                          <div class="nickname">Nickname</div>
                        </div>
                        <div class="depth-9-frame-1">
                          <a class="website">Website</a>
                        </div>
                        <div class="depth-9-frame-2">
                          <div class="nickname">Username</div>
                        </div>
                        <div class="depth-9-frame-3">
                          <div class="nickname">Password</div>
                        </div>
                      </div>
                    </div>
                    <div class="depth-7-frame-12">
                    <?php if (!empty($passwords)): ?>
                    <?php foreach ($passwords as $password): ?>
                        <div class="depth-8-frame-4">
                            <div class="depth-9-frame-01">
                                <div class="nickname"><?php echo htmlspecialchars($password['nickname']); ?></div>
                            </div>
                            <div class="depth-9-frame-1">
                                <div class="website"><?php echo htmlspecialchars($password['web_url']); ?></div>
                            </div>
                            <div class="depth-9-frame-2">
                                <div class="username"><?php echo htmlspecialchars($password['app_username']); ?></div>
                            </div>
                            <div class="depth-9-frame-3">
                                <div class="password"><?php echo htmlspecialchars($password['app_password']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>

                        <p style="color: white;">No records found for your search term.</p>

                    <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </footer>
        </section>
      </main>
    </div>
    <!-- <div class="overlay" id="overlay">
    <div class="menu">
        <div class="menu-item" onclick="manageProfile()">Manage Profile</div>
        <div class="menu-item" onclick="deleteAccount()">Delete Account</div>
        <div class="menu-item" onclick="logOut()">Log Out</div>
    </div>
    </div> -->
    <script src="Assets/JS/User_Interface/scripts.js"></script>
  </body>
</html>
