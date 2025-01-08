<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Account page</title>
   <?php require("links.php") ?>
   <link rel="stylesheet" href="./css/account.css">
</head>

<body>
   <?php require("header.php") ?>
   <main>
      <div id="top-sec">
         <div class="container">
            <div class="d-flex justify-content-between align-items-center">
               <div class="quicklink">
                  <a href="#">Home</a>
                  <a href="#">Account</a>
               </div>
               <div class="welcome">
                  <p>Welcome, <span id="username"></span></p>
               </div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="row d-flex justify-content-between">
            <div class="col-3 manage">
               <div>
                  <h4>Manage My Account</h4>
                  <ul>
                     <li><a href="#">My profile</a></li>
                     <li><a href="#">Address Book</a></li>
                     <li><a href="#">My Payment options</a></li>
                  </ul>
               </div>
               <div>
                  <h4>My Orders</h4>
                  <ul>
                     <li><a href="#">My Returns</a></li>
                     <li><a href="#">My Cancellations</a></li>
                  </ul>
               </div>
               <div>
                  <h4>My WishList</h4>
               </div>
            </div>
            <div class="col-8">
               <div id="profile">
                  <h5>Edit Your Profile</h5>
                  <div class="form">
                     <div class="name">
                        <div>
                           <label for="fname">First Name:</label> <br>
                           <input type="text" name="fname" id="fname" placeholder=".... ... .. ">
                        </div>
                        <div>
                           <label for="lname">Last Name:</label> <br>
                           <input type="text" name="lname" id="lname" placeholder=".... ... .. ">
                        </div>
                     </div>
                     <div class="d-flex justify-content-between email">
                        <div>
                           <label for="email">Email: </label> <br>
                           <input type="email" name="email" id="email" placeholder=".... ... .. ">
                        </div>
                        <div>
                           <label for="address">Address:</label> <br>
                           <input type="address" name="address" id="address" placeholder=".... ... .. ">
                        </div>
                     </div>
                     <div id="password">
                        <label for="pass">Password Changes</label><br>
                        <input type="password" name="pass" id="pass" placeholder="Current Password">
                        <input type="password" name="password" id="password" placeholder="New Password">
                        <input type="password" name="password" id="password" placeholder="Confirm New Password">
                     </div>
                     <div class="text-end submit">
                        <div class="d-flex gap-3 justify-content-end align-items-center">
                           <a href="#">Cancel </a href="#">
                           <button type="submit">Save Changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



   </main>

   

   <script>

   let lname = document.querySelector("#lname");
   let username = document.querySelector("#username");
   // document.getElementById('username')= 'JohnDoe';
   lname.addEventListener('input', function() {
      username.innerHTML = lname.value + '!';
   });
   </script>

   <?php
   // Include the All Script CDN
    require("script.php");
    ?>
</body>

</html>