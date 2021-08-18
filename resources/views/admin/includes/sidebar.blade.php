<nav class="drawer drawer--dark">
  <div class="drawer-spacer">
    <div class="media align-items-center">
      <div class="media-body">
        <a href="{{ route('admin.home') }}" class="h5 font-weight-bold m-0 text-link">{{ config('app.name') }}</a>
      </div>
    </div>
  </div>
  <!-- HEADING -->
  <div class="py-2 drawer-heading">
    Dashboards
  </div>
  <!-- DASHBOARDS MENU -->
  <ul class="drawer-menu">
    <li class="drawer-menu-item">
      <a href="{{ route('admin.home') }}">
        <i class="material-icons">home</i>
        <span class="drawer-menu-text"> Home</span>
      </a>
    </li>

    <li class="drawer-menu-item drawer-submenu">
      <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#extrasMenu" aria-controls="extrasMenu"  aria-expanded="false"  class="collapsed">
        <i class="material-icons">assignment</i>
        <span class="drawer-menu-text"> Listings</span>
      </a>
      <ul class="collapse" id="extrasMenu">
        <li class="drawer-menu-item"><a href="{{ route('admin.listings.index') }}">Listings</a></li>
        <li class="drawer-menu-item"><a href="{{ route('admin.listings.create') }}">Add Listing</a></li>
      </ul>
    </li>

    {{-- <li class="drawer-menu-item drawer-submenu">
        <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#requestsMenu" aria-controls="extrasMenu"  aria-expanded="false"  class="collapsed">
          <i class="material-icons">folder</i>
          <span class="drawer-menu-text"> Requests</span>
        </a>
        <ul class="collapse" id="requestsMenu">
          <li class="drawer-menu-item"><a href="{{ route('admin.requests.index') }}">Requests</a></li>
          <li class="drawer-menu-item"><a href="{{ route('admin.requests.create') }}">Add Request</a></li>
        </ul>
      </li> --}}

    <li class="drawer-menu-item drawer-submenu">
      <a data-toggle="collapse" data-parent="#pagesMenu" href="#" data-target="#usersMenu" aria-controls="usersMenu"  aria-expanded="false"  class="collapsed">
        <i class="material-icons">people</i>
        <span class="drawer-menu-text"> Users</span>
      </a>
      <ul class="collapse" id="usersMenu">
        <li class="drawer-menu-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="drawer-menu-item"><a href="{{ route('admin.users.create') }}">Add User</a></li>
      </ul>
    </li>

    <li class="drawer-menu-item drawer-submenu">
      <a href="{{ route('admin.newsletters.index') }}" >
        <i class="material-icons">contact_mail</i>
        <span class="drawer-menu-text"> Subscribers</span>
      </a>
    </li>
    <li class="drawer-menu-item drawer-submenu">
      <a href="{{ route('admin.feedback.index') }}" >
        <i class="material-icons">feedback</i>
        <span class="drawer-menu-text"> Feedback</span>
      </a>
    </li>

    <div class="sticky-bottom" style="position: absolute; bottom: 0;">
      <div class="py-2 drawer-heading"> Account </div>
      <li class="drawer-menu-item drawer-submenu">
        <a href="{{ route('admin.profile') }}" >
          <i class="material-icons">person</i>
          <span class="drawer-menu-text"> Profile</span>
        </a>
      </li>
      <li class="drawer-menu-item drawer-submenu">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="material-icons">exit_to_app</i>
          <span class="drawer-menu-text"> Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </div>

  </ul>

</nav>
