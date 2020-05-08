<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('back_panel.employees*') ? 'active' : ""}}  " href="{{ route("back_panel.employees.index") }}">
                    <span data-feather="users"></span>
                    <i class="fas fa-user-friends"></i>
                    Employees
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ">
                    <span data-feather="users"></span>
                    <i class="fas fa-users"></i>
                   Customers
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    <i class="fas fa-cut"></i>
                    Service types
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('back_panel.products*') ? 'active' : ""}} " href="{{ route("back_panel.products.index") }}">
                    <span data-feather="shopping-cart"></span>
                    <i class="fas fa-cart-plus"></i>
                    Products
                </a>
            </li>
        </ul>
    </div>
</nav>
