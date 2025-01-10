<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="stylesheet" href=".//css/checkout.css">
   <?php require("links.php") ?>
</head>

<body>
<?php
 require('header.php'); 
 ?>
   <main>
      <div id="top-sec">
         <div class="container">
            <div class="quicklink">
               <a href="#">Home</a>
               <a class="d-none d-sm-inline-block" href="./account.html">Account</a>
               <a class="d-none d-sm-inline-block" href="#">My Contact</a>
               <a class="d-none d-sm-inline-block" href="#">Prducts</a>
               <a href="#">CheckOut</a>
            </div>

         </div>
      </div>
      <div class="container">
         <div id="bill-sec">
            <div class="bill-form">
               <h2>Billing Details</h2>
               <form action="" class="d-flex flex-column">
                  <label>First Name <span>*</span></label>
                  <input type="text" placeholder="Enter your first name" required>

                  <label>Company Name</label>
                  <input type="text" placeholder="Enter your company name">

                  <label>Street Address <span>*</span></label>
                  <input type="text" placeholder="Street address" required>

                  <label>Apartment, floor, etc. (optional)</label>
                  <input type="text" placeholder="Apartment, suite, unit, etc.">

                  <label>Town/City <span>*</span></label>
                  <input type="text" placeholder="Enter your city" required>

                  <label>Phone Number <span>*</span></label>
                  <input type="text" placeholder="Enter your phone number" required>
                  <label>Email Address <span>*</span></label>
                  <input type="email" placeholder="Enter your email" required>
                  <div class="checkBox align-items-center d-flex">
                     <input style="height: 20px; width: 20px;" type="checkbox" name="nextTime" id="nextTime" checked>
                     <label for="nextTime">Save this information for faster check-out next time</label>
                  </div>
               </form>
            </div>
            <div class="bill-preview">
               <div class="d-flex flex-column">
                  <div class="item-bill">
                     <div class="d-flex align-items-center">
                        <img src="./img/product1.png" alt="">
                        <div class="d-flex ms-4 w-100 justify-content-between">
                           <p>LCD Monitor</p>
                           <span>$650</span>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <img src="./img/product2.png" alt="">
                        <div class="d-flex ms-4 justify-content-between w-100">
                           <p>H1 Gamepad</p>
                           <span>$650</span>
                        </div>
                     </div>
                  </div>

                  <div class="cart-total">
                     <div class="total">
                        <div class="d-flex justify-content-between ">
                           <span>Subtotal</span>
                           <span>100$</span>
                        </div>
                        <div class="d-flex justify-content-between ">
                           <span>Shipping</span>
                           <span>Free</span>
                        </div>
                        <div class="d-flex justify-content-between shadow-none">
                           <span>Total</span>
                           <span class="final">100$</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="d-flex gap-3 flex-column">
                  <div class="d-flex justify-content-between">
                     <div class="d-flex gap-2 align-items-center">
                        <input type="radio" name="banking" id="banking">
                        <label for="banking">bank</label>
                     </div>
                     <div class="banking-source">
                        <img src="./img/banking source.png" alt="">
                     </div>
                  </div>
                  <div class="d-flex gap-2 mb-3 align-items-center">
                     <input type="radio" name="banking" id="cash">
                     <label for="cash">Cash on delivery</label>
                  </div>
               </div>
               <div class="coupon d-flex justify-content-between">
                  <input type="text" placeholder="Coupon Code">
                  <button>Apply Coupon</button>
               </div>
               <div class="d-flex order">
                  <a href=""><button>Place Order</button></a>
               </div>
            </div>
         </div>
      </div>
   </main>
  <?php
   // Include the All Script CDN
    require("script.php");
    ?>
</body>

</html>