
    <nav class="navbar navbar-inverse navbar-fixed-top dashboard-nav" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div>
            <a class="navbar-brand" href="<?php echo url('/') . '/dashboard'; ?>">
              <img alt="dashboard-logo" src="{{asset('public/img/logo-dashboard.png')}}" />
            </a>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo url('/') . '/dashboard'; ?>">Dashboard</a></li>
            <li><a href="<?php echo url('/') . '/deal-list?stage=Buyer Actively Looking'; ?>">Deals</a></li>
            <li><a href="<?php echo url('/') . '/request-agent'; ?>">Request Agent</a></li>
          </ul>
          <ul class="profile-dropdown pull-right">
            <li class="dropdown list-unstyled">
             <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
              {{ Session::get('AUTH_USER')['NAME'] }}
              <img src="{{ Session::get('AUTH_USER')['PROFILE_IMG'] }}" alt="" class="profile-image" /></a>
              <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo url('/') . '/user-profile/';?>{{ Session::get('AUTH_USER')['ENROLLMENT_ID'] }}">Profile</a>
                </li>
                <li><a href="<?php echo url('/') . '/agent-logout'; ?>">Logout</a></li>
            </ul>
            </li>
          </ul>
        </div>

      </div>
    </nav>