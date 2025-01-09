<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Exclusive</title>
   <?php require("links.php") ?>
</head>

<body>
   <header>

      <!---------Top Bar Start Here------------>
      <section id="topBar">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-11 col-12 text-center">
                  <p>
                     Summer Sale For All Swim Suits And Free Express Delivery - OFF
                     50%! <a href="#">ShopNow</a>
                  </p>
               </div>
               <div class="col-lg-1 text-end d-none d-lg-block">
                  <select name="#" id="#">
                     <option value="Eng">Eng</option>
                     <option value="Ban">Ban</option>
                  </select>
               </div>
            </div>
         </div>
      </section>
      <!---------Top Bar Start Here------------>
      <!---------NavBar Start Here------------>
      <section id="navBar" class="d-none d-lg-block">
         <nav>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-2">
                     <a href="index.php"><img src="./img/logo.png" alt="logo" /></a>
                  </div>
                  <div class="col-lg-5 menu">
                     <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="signUp.php">Sign Up</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-5 d-flex">
                     <div class="searchBox">
                        <!-- Form for search -->
                        <form action="search.php" method="GET">
                           <input type="search" name="query" placeholder="What are you looking for?" />
                           <button type="submit">
                              <iconify-icon icon="iconamoon:search-fill"></iconify-icon>
                           </button>
                        </form>
                     </div>
                     <div class="quickLinks">
                        <a href="#">
                           <iconify-icon icon="mdi:heart-outline"></iconify-icon>
                        </a>
                        <a href="cart.php">
                           <iconify-icon icon="flowbite:cart-outline"></iconify-icon>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <!---------NavBar Start Here------------>

      <!---------NavBar mobile Start Here------------>
      <section id="navBarMobile" class="d-lg-none">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-3 menuIcon">
                  <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                     aria-controls="offcanvasWithBothOptions">
                     <iconify-icon icon="pepicons-pop:menu"></iconify-icon>
                  </button>
               </div>
               <div class="col-6 d-flex justify-content-center">
                  <a href="index.php"><img src="./img/logo.png" alt="logo"></a>
               </div>
               <div class="col-3 quickLinks text-end">
                  <iconify-icon class="searchIcon" icon="iconamoon:search-light"></iconify-icon>
               </div>
            </div>


            <!----------=--- Search SideBar Start================= -->
         </div>
         <!-- menu sidebar start -->
         <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
               <a href="index.php" class="offcanvas-title" id="offcanvasWithBothOptionsLabel"><img src="./img/logo.png"
                     alt="logo"></a>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
               <p>Try scrolling the rest of the page to see this option in action.</p>
            </div>
         </div>
         <!-- menu sidebar end -->
      </section>
      </nav>
      <!---------NavBar mobile Start Here------------>

      <!---------NavBar bottom Start Here------------>
      <section id="navBarBottom" class="d-lg-none">
         <div class="container">
            <div class="row justify-content-evenly">
               <div class="col-3 bottomMenu">
                  <a href="index.php">
                     <iconify-icon icon="material-symbols:home-rounded"></iconify-icon>
                  </a>
               </div>
               <div class="col-3 bottomMenu">
                  <a href="#">
                     <iconify-icon icon="solar:shop-bold"></iconify-icon>
                  </a>
               </div>
               <div class="col-3 bottomMenu">
                  <a href="#">
                     <iconify-icon icon="mdi-light:heart"></iconify-icon>
                  </a>
               </div>
               <div class="col-3 bottomMenu">
                  <a href="#">
                     <iconify-icon icon="tabler:user-filled"></iconify-icon>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!---------NavBar bottom End Here------------>
   </header>
   <!---------Header End Here------------>