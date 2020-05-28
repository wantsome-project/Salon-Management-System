<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('back_panel.dashboard') ? 'active' : ""}} "
                   href="{{ route("back_panel.dashboard") }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            @cannot('isEmployee')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('back_panel.employees*') ? 'active' : ""}}  "
                       href="{{ route("back_panel.employees.index") }}">
                        <span data-feather="users"></span>
                        <i class="fas fa-user-friends"></i>
                        Employees
                    </a>
                    <ul>
                        <li class="toc-entry toc-h3">
                            <a class="nav-link {{ request()->routeIs('back_panel.salary_payments*') ? 'active' : ""}}  "
                               href="{{ route("back_panel.salary_payments.index") }}">
                                Salary payments
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('back_panel.customers*') ? 'active' : ""}}  "
                       href="{{ route("back_panel.customers.index") }}">
                        <span data-feather="users"></span>
                        <i class="fas fa-users"></i>
                        Customers
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ request()->routeIs('back_panel.service_types*') ? 'active' : ""}} "
                       href="{{ route("back_panel.service_types.index") }}">
                        <span data-feather="file"></span>
                        <i class="fas fa-cut"></i>
                        Service types
                    </a>
                </li>
            @endcannot
            <li class="nav-item ">
                <a class="nav-link {{ request()->routeIs('back_panel.services*') ? 'active' : ""}} "
                   href="{{ route("back_panel.services.index") }}">
                    <span data-feather="file"></span>
                    <i class="fas fa-hand-holding-usd"></i>
                    Services
                </a>
            </li>
            @cannot('isEmployee')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('back_panel.products*') ? 'active' : ""}} "
                       href="{{ route("back_panel.products.index") }}">
                        <span data-feather="shopping-cart"></span>
                        <i class="fas fa-cart-plus"></i>
                        Products
                    </a>
                </li>
            @endcannot
            <li class="nav-item ">
                <a class="nav-link" {{ request()->routeIs('back_panel.appointment*') ? 'active' : "" }} "
                href="{{ route("back_panel.appointment.index") }}" >
                <span data-feather="file"></span>
                <i class="fas fa-calendar-check"></i>
                Appointments
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->routeIs('back_panel.customer_requests*') ? 'active' : ""}} "
                   href="{{ route("back_panel.customer_requests.index") }}">
                    <span data-feather="file"></span>
                    <i class="fas fa-question-circle"></i>
                    Customer requests
                </a>
            </li>
        </ul>
    </div>
</nav>
