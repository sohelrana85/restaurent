<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('dashboard')}}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>Dashboards</span>
            </a>
        </li>

        <li class="menu-title">Pages</li>

        <li>
            <a href="{{route('users')}}" class="waves-effect">
                <i class="bx bx-user-circle"></i>
                <span>Users</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                <i class="bx bx-envelope"></i>
                <span>Foods</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('foods.create')}}">Add New</a></li>
                <li><a href="{{ route('foods.index')}}">Food List</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                <i class="bx bx-envelope"></i>
                <span>Chefs</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('chefs.create')}}">Add New</a></li>
                <li><a href="{{ route('chefs.index')}}">Chefs List</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('reservation.index')}}" class="waves-effect">
                <i class="bx bx-user-circle"></i>
                <span>Reservations</span>
            </a>
        </li>
    </ul>
</div>
