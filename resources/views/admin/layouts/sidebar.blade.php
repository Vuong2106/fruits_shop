<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge bg-success float-end">4</span>
                    <span> Dashboards </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="dashboard-crm.html">CRM</a>
                        </li>
                        <li>
                            <a href="index.html">Ecommerce</a>
                        </li>
                        <li>
                            <a href="dashboard-projects.html">Projects</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{ route('calendar.index') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Calendar </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.account.index') }}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Customer </span>
                </a>
            </li>



            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Products</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Products Details</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-orders-details.html">Order Details</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-customers.html">Customers</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-checkout.html">Checkout</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-sellers.html">Sellers</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">System</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.account.index') }}" class="side-nav-link">
                    <i class="uil-user-exclamation"></i>
                    <span> Account </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.role.index') }}" class="side-nav-link">
                    <i class=" uil-shield-exclamation"></i>
                    <span>
                        decentralization
                    </span>
                </a>
            </li>
        </ul>

        <!-- Help Box -->
        {{-- <div class="help-box text-white text-center">
            <a href="javascript: void(0);" class="float-end close-btn text-white">
                <i class="mdi mdi-close"></i>
            </a>
            <img src="{{ asset('adm/assets/images/help-icon.svg') }}" height="90" alt="Helper Icon Image">
            <h5 class="mt-3">Unlimited Access</h5>
            <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
            <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">Upgrade</a>
        </div> --}}
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
