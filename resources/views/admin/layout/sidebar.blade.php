<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      

      <li class="nav-heading">Property Operation</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.balloons') }}">
          <i class="bi bi-person"></i>
          <span>Balloons</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.occasions') }}">
          <i class="bi bi-question-circle"></i>
          <span>Occasions</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.holidays') }}">
          <i class="bi bi-envelope"></i>
          <span>Seasonal & Holidays</span>
        </a>
      </li><!-- End Contact Page Nav -->

      

    </ul>

  </aside>