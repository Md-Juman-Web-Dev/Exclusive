<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping-cart</title>
   <?php require("links.php") ?>
   <link rel="stylesheet" href="./css/cart.css">
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
               <a href="#">Cart</a>
            </div>

         </div>
      </div>

      <div class="container">
         <div class="cart-cnt">
            <div class="row justify-content-center">
               <div class="col-12 cart-box ">
                  <div class="row pro-row align-items-center">
                     <div class="col-5"><span class="cart-items">PRODUCT</span></div>
                     <div class="col-3 col-lg-1 text-center"><span class="cart-items">PRICE</span></div>
                     <div class="col-4 col-lg-2 text-center"><span class="cart-items">QUANTITY</span></div>
                     <div class="d-none d-lg-block col-lg-4 text-center"><span class="cart-items">SUBTOTAL</span>
                     </div>
                  </div>
                  <div class="row pro-row align-items-center">
                     <div class="col-5 m-0 p-0 p-lg-2 row justify-content-center align-items-center">
                        <div class="col-6"><img class="product-img " src="./img/product1.png" alt=""></div>
                        <div class="col-6"><span class="cart-items">Capsicum</span></div>
                     </div>
                     <div class="col-3 col-lg-1 text-center"><span class="cart-items">50$</span></div>
                     <div class="col-4  col-lg-2  qntity">
                        <div class="quantity w-100 d-flex text-center justify-content-center gap-4  align-items-center">
                           <span class="quantity-num" class="text-center">1</span>
                           <div class="d-flex flex-column justify-content-center align-items-center">
                              <button class="plus">^</button>
                              <button class="minus" style="transform: rotate(180deg);">^</button>
                           </div>
                        </div>
                     </div>
                     <div class="d-none d-lg-block col-lg-4 text-center"><span id="total">50$</span></div>
                  </div>
                  <div class="row pro-row align-items-center">
                     <div class="col-5 m-0 p-0 p-lg-2 row justify-content-center align-items-center">
                        <div class="col-6 "><img class="product-img" src="./img/product2.png" alt=""></div>
                        <div class="col-6 "><span>Red Tomato</span></div>
                     </div>
                     <div class="col-3 col-lg-1 text-center"><span class="cart-items">50$</span></div>
                     <div class="col-4 col-lg-2 text-center">
                        <div class="quantity w-100 d-flex text-center justify-content-center gap-4  align-items-center">
                           <span class="quantity-num" class="text-center">1</span>
                           <div class="d-flex flex-column justify-content-center align-items-center">
                              <button class="plus">^</button>
                              <button class="minus" style="transform: rotate(180deg);">^</button>
                           </div>
                        </div>
                     </div>
                     <div class="d-none d-lg-block col-lg-4 text-center"><span id="total">50$</span></div>
                  </div>
                  <div class="d-flex pro-row justify-content-between buttons align-items-center">
                     <a href="#">
                        <button>Return to shop </button>
                     </a>
                     <a href="#">
                        <button>Update Cart</button>
                     </a>
                  </div>
               </div>
               <div class=" col-12 cart-bottom row justify-content-between ">
                  <div class="coupon col-lg-6 col-12  order-0 ">
                     <input type="text" placeholder="Coupon Code">
                     <button>Apply Coupon</button>
                  </div>
                  <div class="cart-total col-lg-6 col-12 order-1 ">
                     <h2 class="text-start">Cart Total</h2>
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
                        <a href="./checkout.php">
                           <button>
                              Proceed to Checkout
                           </button>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

   <script src="./js/bootstrap.bundle.min.js"></script>
   <script src="./js/jquery-3.7.1.min.js"></script>
   <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

   <script>
   // Select all elements
   let quantity = document.querySelectorAll('.quantity-num');
   let plus = document.querySelectorAll('.plus');
   let minus = document.querySelectorAll('.minus');
   let total = document.querySelectorAll('#total');

   // Function to update total price
   function updateTotal(index, quantityNum) {
      let pricePerUnit = 50; // Replace 10 with the actual price per unit
      total[index].textContent = (quantityNum * pricePerUnit) + "$";
   }

   // Add event listeners to plus buttons
   plus.forEach((plusBtn, index) => {
      plusBtn.addEventListener("click", function() {
         let quantityNum = parseInt(quantity[index].textContent, 10); // Get current quantity
         quantityNum += 1; // Increment by 1
         quantity[index].textContent = quantityNum; // Update quantity display
         updateTotal(index, quantityNum); // Update total price
      });
   });

   // Add event listeners to minus buttons
   minus.forEach((minusBtn, index) => {
      minusBtn.addEventListener("click", function() {
         let quantityNum = parseInt(quantity[index].textContent, 10); // Get current quantity
         if (quantityNum > 1) { // Prevent quantity from going below 1
            quantityNum -= 1; // Decrement by 1
            quantity[index].textContent = quantityNum; // Update quantity display
            updateTotal(index, quantityNum); // Update total price
         }
      });
   });
   </script>
   <?php
   // Include the All Script CDN
    require("script.php");
    ?>
</body>

</html>