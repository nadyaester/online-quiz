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
              <i class="ni ni-folder-17"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
        </ul>

        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('quiz.index')}}">
              <i class="ni ni-single-copy-04 "></i>
              <span class="nav-link-text">Quiz</span>
            </a>
          </li>
          <li class="nav-item">
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('question.index')}}">
              <i class="ni ni-bullet-list-67"></i>
              <span class="nav-link-text">Question</span>
            </a>
          </li>
        </ul>

        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('view.exam')}}">
              <i class="ni ni-laptop"></i>
              <span class="nav-link-text">Assign Quiz</span>
            </a>
          </li>
        </ul>

        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
              <i class="ni ni-single-02"></i>
              <span class="nav-link-text">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('classroom.index')}}">
              <i class="ni ni-ungroup"></i>
              <span class="nav-link-text">Class</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->

        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" target="_blank">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Logout</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Foundation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Components</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</nav>