<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="mdi mdi-cash-register menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-category" aria-expanded="false" aria-controls="ui-basic-category">
                <i class="mdi mdi-folder-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">View Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-products" aria-expanded="false" aria-controls="ui-basic-products">
                <i class="mdi mdi-package-variant menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">View Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Add Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('color.index') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
                <i class="mdi mdi-cog menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>
