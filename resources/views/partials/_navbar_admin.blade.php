<nav id="sidebarMenu" class="navbar-admin navbar-right-horizontal">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column navbar-admin-list">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard.index') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.guides.index') }}">
                    <span data-feather="file"></span>
                    Guides
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.tags.index') }}">
                    <span data-feather="users"></span>
                    Tags
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Users
                </a>
            </li>
        </ul>

    </div>
</nav>
