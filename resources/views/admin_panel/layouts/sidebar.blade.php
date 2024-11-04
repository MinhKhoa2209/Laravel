<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MIXISHOP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - User Profile -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('users')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Nav Item - Product -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Product</span>
        </a>
    </li>
     <!-- Nav Item - Category -->
     <li class="nav-item">
        <a class="nav-link" href="{{ route('categories') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Category</span>
        </a>
    </li>

    <!-- Nav Item - Order -->
    <li class="nav-item">
        <a class="nav-link" href="orders">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Order</span>
        </a>
    </li>

       <!-- Nav Item - Payment -->
       <li class="nav-item">
        <a class="nav-link" href="payments">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Payment</span>
        </a>
    </li>

    <!-- Nav Item - Cart -->
    <li class="nav-item">
        <a class="nav-link" href="carts">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Cart</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
