<?php

session_start();
require 'Database/connection.php';

$result = mysqli_query($con, "SELECT * FROM user_table");

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="Assets/CSS/Admin Dashboard/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Admin Dashboard/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap"
    />
  </head>
  <body>
    <div class="galileo-design">
      <main class="depth-0-frame-0">
        <section class="depth-1-frame-0">
          <header class="depth-2-frame-2">
            <div class="depth-3-frame-0">
              <div class="depth-4-frame-0">
                <div class="depth-5-frame-0">
                  <img
                    class="search-icon"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/Admin Dashboard/vector--0.svg"
                    />
                      
                  <div class="depth-6-frame-0"></div>
                </div>
              </div>
              <div class="depth-4-frame-0">
                <a class="securepass">SecurePass</a>
              </div>
            </div>
            <div class="depth-3-frame-1">
              <div class="depth-4-frame-01">
                <div class="depth-4-frame-0">
                  <a class="dashboard" href="Admin_Dashboard.html">Dashboard</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="users" href="Admin_Users.php">Users</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="backup-security"  href="Admin_Backup_Security.html">Backup & Security</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="policies" href="Admin_Policy.html">Policies</a>
                </div>
                <div class="depth-5-frame-4"></div>
              </div>
            </div>
            <img
            class="account-circle-icon"
            loading="lazy"
            alt=""
            src="Assets/Image/Admin Dashboard/account-circle.svg"
            id="account-circle"
            />
            <!-- Add this inside the <header> section, right after the account-circle-icon -->
              <div class="user-menu" id="user-menu">
                <div class="menu-item" onclick="manageProfile()">Manage Profile</div>
                <div class="menu-item" onclick="deleteAccount()">Delete Account</div>
                <div class="menu-item" onclick="logOut()">Log Out</div>
              </div>
            
          </header>
          <div class="depth-2-frame-1">
            <div class="depth-3-frame-01">
              <div class="depth-4-frame-02">
                <div class="depth-5-frame-01">
                  <div class="depth-6-frame-01">
                    <h1 class="activity">Activity</h1>
                  </div>
                  <div class="depth-6-frame-1">
                    <div class="active-users-4567">
                      1,234 active users, 4,567 devices
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-11">
                <div class="depth-5-frame-02">
                  <div class="depth-6-frame-02">
                    <div class="depth-7-frame-0">
                      <div class="depth-8-frame-0">
                        <img
                          class="search-icon"
                          alt=""
                          src="Assets/Image/Admin Dashboard/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                    <input
                      class="depth-7-frame-1"
                      placeholder="Search  for users, devices, and events"
                      type="text"
                    />
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-2">
                <h3 class="users-activities-in">
                  Users
                </h3>
              </div>
              <div class="depth-4-frame-3">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-03">
                    <div class="depth-6-frame-01">
                      <div class="depth-8-frame-01">
                        <div class="depth-9-frame-01">
                          <div class="user">User</div>
                        </div>
                        <div class="depth-9-frame-1">
                          <div class="user">Username</div>
                        </div>
                        <div class="depth-9-frame-1">
                          <div class="user">Email</div>
                        </div>
                        <div class="depth-9-frame-3">
                          <div class="user">Created At</div>
                        </div>
                      </div>
                    </div>
                    <?php foreach ($users as $user): ?>
                    <div class="depth-7-frame-11">
                      <div class="depth-9-frame-02">
                        <div class="sarah-williams"><?php echo htmlspecialchars($user['name']); ?></div>
                      </div>
                      <div class="depth-9-frame-11">
                        <div class="sarah-williams"><?php echo htmlspecialchars($user['username']); ?></div>
                      </div>
                      <div class="depth-9-frame-11">
                        <div class="sarah-williams"><?php echo htmlspecialchars($user['email']); ?></div>
                      </div>
                      <div class="depth-9-frame-31">
                        <div class="sarah-williams"><?php echo htmlspecialchars($user['created_at']); ?></div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script src="Assets/JS/Admin_Dashboard/scripts.js"></script>
  </body>
</html>
