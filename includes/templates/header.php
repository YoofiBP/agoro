<?php
echo "<div class='container-menu-header'>
  <div class='topbar'>
    <div class='topbar-social'>
      <a href='#' class='topbar-social-item fa fa-facebook'></a>
      <a href='#' class='topbar-social-item fa fa-instagram'></a>
      <a href='#' class='topbar-social-item fa fa-pinterest-p'></a>
      <a href='#' class='topbar-social-item fa fa-snapchat-ghost'></a>
      <a href='#' class='topbar-social-item fa fa-youtube-play'></a>
    </div>

    <span class='topbar-child1'>
      40% Discount on OSX Games
    </span>

    <div class='topbar-child2'>
      <span class='topbar-email'>

      </span>

      <div class='topbar-language rs1-select2'>
        <select class='selection-1' name='time'>
          <option>USD</option>
          <option>EUR</option>
          <option>GHC</option>
        </select>
      </div>
    </div>
  </div>

  <div class='wrap_header'>
    <!-- Logo -->
    <a href='index.html' class='logo'>
      <img src='images/AGORO.png' alt='IMG-LOGO'>
    </a>

    <!-- Menu -->
    <div class='wrap_menu'>
      <nav class='menu'>
        <ul class='main_menu'>
          <li>
            <a href='index.php'>Home</a>
          </li>

          <li>
            <a href='product.php'>Shop</a>
          </li>

          <li>
            <a href='blog.php'>Blog</a>
          </li>

          <li>
            <a href='about.php'>About</a>
          </li>

          <li>
            <a href='contact.php'>Contact</a>
          </li>";
          if(isset($_SESSION['id'])){
          echo "<li><a href='logout.php'>Logout</a></li>";
          echo "<li><a href='insert_product.php'>New</a></li>";
          }
          else{
          echo "<li><a href='login.php'>Login</a></li>";
          echo "<li><a href='registration.php'>Sign Up</a></li>";
          }
           "
        </ul>
      </nav>
    </div>




    <!-- Header Icon -->
    <div class='header-icons'>





      <div class='pos-relative bo11 of-hidden' style='margin-right: 20px;'>
        <input class='s-text7 size16 p-l-23 p-r-50' type='text' name='search-product' id='searchValue' placeholder='Search'>

        <button class='flex-c-m size5 ab-r-m color1 color0-hov trans-0-4' onclick='search();'>
          <i class='fs-13 fa fa-search' aria-hidden='true'></i>
        </button>
      </div>







      <a href='#' class='header-wrapicon1 dis-block'>
        <img src='images/icons/icon-header-01.png' class='header-icon1' alt='ICON'>
      </a>

      <span class='linedivide1'></span>

      <div class='header-wrapicon2'>
        <img src='images/icons/icon-header-02.png' class='header-icon1 js-show-header-dropdown' alt='ICON'>
        <span class='header-icons-noti'>0</span>

        <!-- Header cart noti -->
        <div class='header-cart header-dropdown'>
          <ul class='header-cart-wrapitem'>
            <!-- header cart goes here -->
          </ul>

          <div class='header-cart-total'>
            Total: GHC <span class='htotal'>75</span>.00
          </div>

          <div class='header-cart-buttons'>
            <div class='header-cart-wrapbtn'>
              <!-- Button -->
              <a href='cart.php' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>
                View Cart
              </a>
            </div>

            <div class='header-cart-wrapbtn'>
              <!-- Button -->
              <a href='#' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4' onclick='redirect_to_pay();'>
                Check Out
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Header Mobile -->
<div class='wrap_header_mobile'>
  <!-- Logo moblie -->
  <a href='index.html' class='logo-mobile'>
    <img src='images/icons/logo.png' alt='IMG-LOGO'>
  </a>

  <!-- Button show menu -->
  <div class='btn-show-menu'>
    <!-- Header Icon mobile -->
    <div class='header-icons-mobile'>
      <a href='#' class='header-wrapicon1 dis-block'>
        <img src='images/icons/icon-header-01.png' class='header-icon1' alt='ICON'>
      </a>

      <span class='linedivide2'></span>

      <div class='header-wrapicon2'>
        <img src='images/icons/icon-header-02.png' class='header-icon1 js-show-header-dropdown' alt='ICON'>
        <span class='header-icons-noti'>0</span>

        <!-- Header cart noti -->
        <div class='header-cart header-dropdown'>
          <ul class='header-cart-wrapitem'>
            <!-- mobile header cart goes here -->
          </ul>

          <div class='header-cart-total'>
            Total: GHC <span class='htotal'>75</span>.00
          </div>

          <div class='header-cart-buttons'>
            <div class='header-cart-wrapbtn'>
              <!-- Button -->
              <a href='cart.html' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>
                View Cart
              </a>
            </div>

            <div class='header-cart-wrapbtn'>
              <!-- Button -->
              <a href='#' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>
                Check Out
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class='btn-show-menu-mobile hamburger hamburger--squeeze'>
      <span class='hamburger-box'>
        <span class='hamburger-inner'></span>
      </span>
    </div>
  </div>
</div>

<!-- Menu Mobile -->
<div class='wrap-side-menu'>
  <nav class='side-menu'>
    <ul class='main-menu'>
      <li class='item-topbar-mobile p-l-20 p-t-8 p-b-8'>
        <span class='topbar-child1'>
          Free shipping for standard order over $100
        </span>
      </li>

      <li class='item-topbar-mobile p-l-20 p-t-8 p-b-8'>
        <div class='topbar-child2-mobile'>
          <span class='topbar-email'>
            allstar@example.com
          </span>

          <div class='topbar-language rs1-select2'>
            <select class='selection-1' name='time'>
              <option>USD</option>
              <option>EUR</option>
            </select>
          </div>
        </div>
      </li>

      <li class='item-topbar-mobile p-l-10'>
        <div class='topbar-social-mobile'>
          <a href='#' class='topbar-social-item fa fa-facebook'></a>
          <a href='#' class='topbar-social-item fa fa-instagram'></a>
          <a href='#' class='topbar-social-item fa fa-pinterest-p'></a>
          <a href='#' class='topbar-social-item fa fa-snapchat-ghost'></a>
          <a href='#' class='topbar-social-item fa fa-youtube-play'></a>
        </div>
      </li>

      <li class='item-menu-mobile'>
        <a href='index.html'>Home</a>
      </li>

      <li class='item-menu-mobile'>
        <a href='product.php'>Shop</a>
      </li>

      <li class='item-menu-mobile'>
        <a href='blog.html'>Blog</a>
      </li>

      <li class='item-menu-mobile'>
        <a href='about.html'>About</a>
      </li>

      <li class='item-menu-mobile'>
        <a href='contact.html'>Contact</a>
      </li>
    </ul>
  </nav>
</div>";

 ?>
