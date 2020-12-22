{{--https://www.codecheef.org/article/laravel-6-how-to-make-menu-item-active-by-urlroute--}}
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Categories</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="material-icons">list</i>
                <p>Products</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="material-icons">person</i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="material-icons">receipt</i>
                <p>Orders</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('notifications*') ? 'active' : '' }}">
            <a class="nav-link" href="/notifications">
                <i class="material-icons">notification_important</i>
                <p>Notifications</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
            <a class="nav-link" href="/settings">
                <i class="material-icons">settings</i>
                <p>Settings</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('helps*') ? 'active' : '' }}">
            <a class="nav-link" href="/helps">
                <i class="material-icons">help</i>
                <p>Help</p>
            </a>
        </li>
    </ul>
</div>
