  <header id="header" class="u-header u-header-left-aligned-nav mb-4">
      <div class="u-header__section">
          <div class="u-header-topbar py-2 d-none d-xl-block">
              <div class="container">
                  <div class="d-flex align-items-center">
                      <div class="topbar-left">
                          <a href="#" class="text-gray-110 font-size-13 hover-on-dark">Welcome to Our Store</a>
                      </div>
                      <div class="topbar-right ml-auto">
                          <ul class="list-inline mb-0">
                              <li
                                  class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                  <a href="#" class="u-header-topbar__nav-link text-gray-110"><i
                                          class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                              </li>
                              <li
                                  class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                  <a href="#" class="u-header-topbar__nav-link text-gray-110"><i
                                          class="ec ec-transport mr-1"></i> Track Your Order</a>
                              </li>

                              @if (Route::has('login'))
                                  @auth

                                      <li
                                          class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                          <!-- Account Sidebar Toggle Button -->
                                        

                                              <a type="submit" href="account" role="button"
                                                  class="u-header-topbar__nav-link text-gray-110">
                                                    <form method="POST" action="{{ route('logout') }}">
                                              @csrf
                                                  <i class="ec ec-user mr-1"></i>
                                                  {{ Auth::user()->name }}
                                                  <span class="text-gray-50">-</span>
                                                  <button style="border:none; background-color:transparent" class="link text-gray-90 font-weight-bold font-size-15"
                                                      href="#">
                                                      Logout
                                                      <span class="link__icon ml-1">
                                                          <span class="link__icon-inner"><img width="25" src="/assets/img/power.png"/></span>
                                                      </span>
                                                  </button>
                                          </form>

                                              </a>


                                          <!-- End Account Sidebar Toggle Button -->
                                      </li>
                                  @else
                                      <li
                                          class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                          <!-- Account Sidebar Toggle Button -->
                                          <a id="sidebarNavToggler" href="login" role="button"
                                              class="u-header-topbar__nav-link text-gray-110">
                                              <i class="ec ec-user mr-1"></i> Register
                                              <span class="text-gray-50">or</span>
                                              Sign in
                                          </a>
                                          <!-- End Account Sidebar Toggle Button -->
                                      </li>
                                  @endauth
                              @endif
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Logo-Search-header-icons -->

          <div class="">
              <div class="container">
                  <div class="row min-height-64 align-items-center position-relative">
                      <!-- Logo-offcanvas-menu -->
                      <div class="col-auto">
                          <!-- Nav -->
                          <nav class="navbar navbar-expand u-header__navbar py-0 max-width-200 min-width-200">
                              <!-- Logo -->
                              <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                                  href="/" aria-label="Electro">
                                  <img src="assets/img/logo.png" />
                              </a>
                              <!-- End Logo -->

                              <!-- Fullscreen Toggle Button -->
                              <button id="sidebarHeaderInvokerMenu" type="button"
                                  class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0 text-white"
                                  aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                  data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                  data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                  data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                  data-unfold-duration="500">
                                  <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                      <span class="u-hamburger__inner"></span>
                                  </span>
                              </button>
                              <!-- End Fullscreen Toggle Button -->
                          </nav>
                          <!-- End Nav -->

                          <!-- ========== HEADER SIDEBAR ========== -->
                          <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                              aria-labelledby="sidebarHeaderInvokerMenu">
                              <div class="u-sidebar__scroller">
                                  <div class="u-sidebar__container">
                                      <div class="u-header-sidebar__footer-offset pb-0">
                                          <!-- Toggle Button -->
                                          <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                              <button type="button" class="close ml-auto" aria-controls="sidebarHeader"
                                                  aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                                  data-unfold-hide-on-scroll="false"
                                                  data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                                  data-unfold-animation-in="fadeInLeft"
                                                  data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                                  <span aria-hidden="true"><i
                                                          class="ec ec-close-remove text-white font-size-20"></i></span>
                                              </button>
                                          </div>
                                          <!-- End Toggle Button -->

                                          <!-- Content -->
                                          <div class="js-scrollbar u-sidebar__body">
                                              <div id="headerSidebarContent"
                                                  class="u-sidebar__content u-header-sidebar__content">
                                                  <!-- Logo -->
                                                  <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical"
                                                      href="" aria-label="Electro">
                                                      <img src="assets/img/logo.png" />
                                                  </a>
                                                  <!-- End Logo -->

                                                  <!-- List -->
                                                  <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                      <!-- Home Section -->
                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                              href="javascript:;" role="button" data-toggle="collapse"
                                                              aria-expanded="false"
                                                              aria-controls="headerSidebarHomeCollapse"
                                                              data-target="#headerSidebarHomeCollapse">
                                                              Product Categories
                                                          </a>

                                                          <div id="headerSidebarHomeCollapse" class="collapse"
                                                              data-parent="#headerSidebarContent">
                                                              <ul id="headerSidebarHomeMenu"
                                                                  class="u-header-collapse__nav-list">
                                                                  <!-- Home - v1 -->
                                                                  <li>
                                                                      <a class="u-header-collapse__submenu-nav-link"
                                                                          href="#">Electronics</a>
                                                                  </li>
                                                              </ul>
                                                          </div>
                                                      </li>

                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="/"
                                                              role="button">
                                                              Home
                                                          </a>


                                                      </li>

                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="shop"
                                                              role="button">
                                                              Promotions & Deals
                                                          </a>


                                                      </li>
                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="shop"
                                                              role="button">
                                                              Featured & New Products
                                                          </a>
                                                      </li>
                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="shop"
                                                              role="button">
                                                              Shop
                                                          </a>
                                                      </li>
                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="about"
                                                              role="button">
                                                              About
                                                          </a>
                                                      </li>
                                                      <li class="u-has-submenu u-header-collapse__submenu">
                                                          <a class="u-header-collapse__nav-link " href="contact"
                                                              role="button">
                                                              Contact
                                                          </a>
                                                      </li>
                                                  </ul>
                                                  <!-- End List -->
                                              </div>
                                          </div>
                                          <!-- End Content -->
                                      </div>
                                  </div>
                              </div>
                          </aside>
                          <!-- ========== END HEADER SIDEBAR ========== -->
                      </div>
                      <!-- End Logo-offcanvas-menu -->
                      <!-- Search Bar -->
                      <div class="col d-none d-xl-block">
                          <form class="js-focus-state">
                              <label class="sr-only" for="searchproduct">Search</label>
                              <div class="input-group">
                                  <input type="email"
                                      class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary"
                                      name="email" id="searchproduct-item" placeholder="Search for Products"
                                      aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                  <div class="input-group-append">
                                      <!-- Select -->
                                      <select
                                          class="js-select selectpicker dropdown-select custom-search-categories-select"
                                          data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                          <option value="one" selected>All Categories</option>
                                          @foreach ($randomCategory as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                      </select>
                                      <!-- End Select -->
                                      <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill"
                                          type="button" id="searchProduct1">
                                          <span class="ec ec-search font-size-24" style="color:white"></span>
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <!-- End Search Bar -->
                      <!-- Header Icons -->
                      <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                          <div class="d-inline-flex">
                              <ul class="d-flex list-unstyled mb-0 align-items-center">
                                  <!-- Search -->
                                  <li class="col d-xl-none px-2 px-sm-3 position-static">
                                      <a id="searchClassicInvoker"
                                          class="font-size-22 text-white text-lh-1 btn-text-secondary"
                                          href="javascript:;" role="button" data-toggle="tooltip"
                                          data-placement="top" title="Search" aria-controls="searchClassic"
                                          aria-haspopup="true" aria-expanded="false"
                                          data-unfold-target="#searchClassic" data-unfold-type="css-animation"
                                          data-unfold-duration="300" data-unfold-delay="300"
                                          data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                          data-unfold-animation-out="fadeOut">
                                          <span class="ec ec-search"></span>
                                      </a>

                                      <!-- Input -->
                                      <div id="searchClassic"
                                          class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                          aria-labelledby="searchClassicInvoker">
                                          <form class="js-focus-state input-group px-3">
                                              <input class="form-control" type="search"
                                                  placeholder="Search Product" />
                                              <div class="input-group-append">
                                                  <button class="btn btn-primary px-3" type="button">
                                                      <i class="font-size-18 ec ec-search"></i>
                                                  </button>
                                              </div>
                                          </form>
                                      </div>
                                      <!-- End Input -->
                                  </li>
                                  <!-- End Search -->
                                  <li class="col d-none d-xl-block">
                                      <a href="" class="text-gray-90" data-toggle="tooltip"
                                          data-placement="top" title="Compare"><i
                                              class="font-size-22 ec ec-compare"></i></a>
                                  </li>
                                  <li class="col d-none d-xl-block">
                                      <a href="" class="text-gray-90" data-toggle="tooltip"
                                          data-placement="top" title="Favorites"><i
                                              class="font-size-22 ec ec-favorites"></i></a>
                                  </li>
                                  <li class="col d-xl-none px-2 px-sm-3">
                                      <a href="#" class="text-gray-90" data-toggle="tooltip"
                                          data-placement="top" title="My Account"><i
                                              class="font-size-22 ec ec-user"></i></a>
                                  </li>
                                  <li class="col pr-xl-0 px-2 px-sm-3">
                                      <a href="/cart" class="text-gray-90 position-relative d-flex"
                                          data-toggle="tooltip" data-placement="top" title="Cart">
                                          <i class="font-size-22 ec ec-shopping-bag"></i>
                                          <span
                                              class="width-22 height-22 bg-dark position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white">2</span>
                                          <span
                                              class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">$1785.00</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- End Header Icons -->
                  </div>
              </div>
          </div>
          <!-- End Logo-Search-header-icons -->

          <!-- Vertical-and-secondary-menu -->
          <div class=" d-none d-xl-block">
              <div class="container">
                  <div class="row">
                      <!-- Vertical Menu -->
                      <div class="col-md-auto d-none d-xl-block align-self-center">
                          <div class="max-width-200 min-width-200">
                              <!-- Basics Accordion -->
                              <div id="basicsAccordion">
                                  <div class="card border-0">
                                      <div class="card-header card-collapse  border-0" id="basicsHeadingOne">
                                          <button type="button"
                                              class="btn-link  btn-block d-flex card-btn pyc-10 text-lh-1 pl-0 pr-4 shadow-none btn-primary bg-transparent rounded-top-lg border-0 font-weight-bold text-gray-90"
                                              data-toggle="collapse" data-target="#basicsCollapseOne"
                                              aria-expanded="true" aria-controls="basicsCollapseOne">
                                              <span class="text-gray-90">Product Categories</span>
                                              <span class="ml-2 text-gray-90">
                                                  <span class="ec ec-arrow-down-search"></span>
                                              </span>
                                          </button>
                                      </div>
                                      <div id="basicsCollapseOne" class="collapse vertical-menu v2"
                                          aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                          <div class="card-body p-0">
                                              <nav
                                                  class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                                  <div id="navBar"
                                                      class="collapse navbar-collapse u-header__navbar-collapse">
                                                      <ul class="navbar-nav u-header__navbar-nav border-top-primary">
                                                          <li class="nav-item u-header__nav-item" data-event="hover"
                                                              data-position="left">
                                                              <a href="#"
                                                                  class="nav-link u-header__nav-link font-weight-bold">Value
                                                                  of the Day</a>
                                                          </li>
                                                          <li class="nav-item u-header__nav-item" data-event="hover"
                                                              data-position="left">
                                                              <a href="#"
                                                                  class="nav-link u-header__nav-link font-weight-bold">Top
                                                                  100 Offers</a>
                                                          </li>
                                                          <li class="nav-item u-header__nav-item" data-event="hover"
                                                              data-position="left">
                                                              <a href="#"
                                                                  class="nav-link u-header__nav-link font-weight-bold">New
                                                                  Arrivals</a>
                                                          </li>
                                                          <!-- Nav Item MegaMenu -->

                                                          @foreach ($categoryWithProducts as $category)
                                                              <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                                  data-event="hover" data-animation-in="slideInUp"
                                                                  data-animation-out="fadeOut" data-position="left">
                                                                  <a id="basicMegaMenu"
                                                                      class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                                                      href="javascript:;" aria-haspopup="true"
                                                                      aria-expanded="false">{{ $category->name }}</a>

                                                                  <div class="hs-mega-menu vmm-tfw u-header__sub-menu"
                                                                      aria-labelledby="basicMegaMenu">
                                                                      <div class="vmm-bg">
                                                                          <img class="img-fluid"
                                                                              src="/storage/{{ $category->icon }}"
                                                                              width="200px" height="200px"
                                                                              alt="Image Description">
                                                                      </div>
                                                                      <div class="row u-header__mega-menu-wrapper">
                                                                          <div class="col mb-3 mb-sm-0">
                                                                              <span
                                                                                  class="u-header__sub-menu-title">{{ $category->name }}</span>
                                                                              <ul
                                                                                  class="u-header__sub-menu-nav-group mb-3">
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">All Computers
                                                                                          &
                                                                                          Accessories</a></li>
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">Laptops,
                                                                                          Desktops
                                                                                          & Monitors</a></li>
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">Printers &
                                                                                          Ink</a>
                                                                                  </li>
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">Networking &
                                                                                          Internet Devices</a></li>
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">Computer
                                                                                          Accessories</a></li>
                                                                                  <li><a class="nav-link u-header__sub-menu-nav-link"
                                                                                          href="#">Software</a>
                                                                                  </li>
                                                                                  <li>
                                                                                      <a class="nav-link u-header__sub-menu-nav-link u-nav-divider border-top pt-2 flex-column align-items-start"
                                                                                          href="{{ route('shop') }}">
                                                                                          <div class="">All
                                                                                              {{ $category->name }}
                                                                                          </div>
                                                                                          <div
                                                                                              class="u-nav-subtext font-size-11 text-gray-30">
                                                                                              Discover more products
                                                                                          </div>
                                                                                      </a>
                                                                                  </li>
                                                                              </ul>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </li>
                                                          @endforeach
                                                      </ul>
                                                  </div>
                                              </nav>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- End Basics Accordion -->
                          </div>
                      </div>
                      <!-- End Vertical Menu -->
                      <!-- Secondary Menu -->
                      <div class="col secondary-menu">
                          <!-- Nav -->
                          <nav
                              class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                              <!-- Navigation -->
                              <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                  <ul class="navbar-nav u-header__navbar-nav">
                                      <!-- Featured Brands -->
                                      <li class="nav-item u-header__nav-item">
                                          <a class="nav-link u-header__nav-link text-gray-90" href="#"
                                              aria-haspopup="true" aria-expanded="false"
                                              aria-labelledby="pagesSubMenu">Promotions &
                                              Deals</a>
                                      </li>
                                      <li class="nav-item u-header__nav-item">
                                          <a class="nav-link u-header__nav-link text-gray-90" href="#"
                                              aria-haspopup="true" aria-expanded="false"
                                              aria-labelledby="pagesSubMenu">Featured & New
                                              products</a>
                                      </li>


                                  </ul>
                              </div>
                              <!-- End Navigation -->
                          </nav>
                          <!-- End Nav -->
                      </div>
                      <!-- End Secondary Menu -->
                  </div>
              </div>
          </div>
          <!-- End Vertical-and-secondary-menu -->
      </div>
  </header>
