<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('argon/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{('/')}}">
              <i class="ni ni-folder-17 text-default"></i>
              <span class="nav-link-text">Quiz</span>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{('/')}}">
              <i class="ni ni-paper-diploma text-success"></i>
              <span class="nav-link-text">Result</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('profile.view')}}">
              <i class="ni ni-single-02 text-info"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>

        </ul>


        <!-- Divider -->
        <hr class="my-3">
        <!-- Navigation -->

        <ul class="navbar-nav mb-md-3">

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
              <i class="ni ni-button-power text-danger"></i>
              <span class="nav-link-text">Logout</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</nav>