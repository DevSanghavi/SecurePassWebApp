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

    <link rel="stylesheet" href="Assets/CSS/Admin Users/global.css" />
    <link rel="stylesheet" href="Assets/CSS/Admin Users/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
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
                    class="search-icon"
                    loading="lazy"
                    alt=""
                    src="Assets/Image/Admin Users/vector--0.svg"
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
                  <a class="dashboard" href="Admin_Dashboard.php  ">Dashboard</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="users" href="Admin_Users.php">Users</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="back-up" href="Admin_Backup_Security.html">Backup & Security</a>
                </div>
                <div class="depth-4-frame-0">
                  <a class="security-policies" href="Admin_Policy.html">Policies</a>
                </div>
                <div class="depth-5-frame-4"></div>
              </div>
            </div>
            <img
              class="account-circle-icon"
              loading="lazy"
              alt=""
              src="Assets/Image/Admin Users/account-circle.svg"
            />
          </header>
          <div class="depth-2-frame-1">
            <div class="depth-3-frame-01">
              <div class="depth-4-frame-02">
                <div class="depth-5-frame-01">
                  <h1 class="users1">Users</h1>
                </div>
                <div class="depth-5-frame-11">
                  <div class="depth-6-frame-01">
                    <div class="add-user"><a href="Admin_Add_User.php"
                    style="color: aliceblue;text-decoration:none">Add user</a></div>
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
                          src="Assets/Image/Admin Users/vector--0-1.svg"
                        />

                        <div class="depth-9-frame-0"></div>
                      </div>
                    </div>
                    <input
                      class="depth-7-frame-1"
                      placeholder="Search  users"
                      type="search"
                    />
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-2">
                <div class="depth-5-frame-03">
                  <div class="depth-6-frame-03">
                    <div class="depth-7-frame-01">
                      <div class="depth-8-frame-01">
                        <div class="depth-9-frame-01">
                          <div class="name">Name</div>
                        </div>
                        <div class="depth-9-frame-1">
                          <div class="name">Email</div>
                        </div>
                        <div class="depth-9-frame-2">
                          <div class="name">Role</div>
                        </div>
                        <div class="depth-9-frame-3">
                          <div class="name">Created At</div>
                        </div>
                        <div class="depth-9-frame-4">
                          <div class="name">Delete</div>
                        </div>
                        <div class="depth-9-frame-5">
                          <div class="name">Edit</div>
                        </div>
                      </div>
                    </div>
                    <div class="depth-7-frame-11">
                    <?php foreach ($users as $user): ?>
                      <div class="depth-8-frame-02">
                        <div class="depth-9-frame-02">
                          <div class="megan-smith"><?php echo htmlspecialchars($user['name']); ?></div>
                        </div>
                        <div class="depth-9-frame-11">
                          <div class="megancompanycom"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>
                        <div class="depth-9-frame-21">
                          <button class="depth-10-frame-0">
                            <div class="depth-6-frame-01">
                              <div class="admin"><?php if(htmlspecialchars($user['role'] == 1)){echo "Admin";} else{echo "User";}; ?></div>
                            </div>
                          </button>
                        </div>
                        <div class="depth-9-frame-31">
                          <div class="admin"><?php echo htmlspecialchars($user['created_at']); ?></div>
                        </div>
                          <div class="depth-9-frame-31">
                            <button class="depth-10-frame-02">
                              <div class="depth-6-frame-01">
                                <div class="admin">Delete</div>
                              </div>
                            </button>
                          </div>
                          <div class="depth-9-frame-31">
                          <button class="depth-10-frame-01">
                            <div class="depth-6-frame-01">
                              <div class="admin">Edit</div>
                            </div>
                          </div>
                        </button>
                      </div>
                      <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
