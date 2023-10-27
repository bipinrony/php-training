<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MyShop </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category-menu" aria-expanded="true"
            aria-controls="category-menu">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
        </a>
        <div id="category-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'category/list.php'; ?>">List</a>
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'category/add.php'; ?>">Add</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider-menu" aria-expanded="true"
            aria-controls="slider-menu">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sliders</span>
        </a>
        <div id="slider-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'slider/list.php'; ?>">List</a>
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'slider/add.php'; ?>">Add</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product-menu" aria-expanded="true"
            aria-controls="product-menu">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="product-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'product/list.php'; ?>">List</a>
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'product/add.php'; ?>">Add</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer-menu" aria-expanded="true"
            aria-controls="customer-menu">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customers</span>
        </a>
        <div id="customer-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'customer/list.php'; ?>">List</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
