<nav class="navbar navbar-fixed-top dashboard-nav">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="{{asset('public/img/logo-dashboard.png')}}" alt="dashboard-logo"></a>
        </div>
        <div class="searchbox">
           <div class="search-container">
            <form>
              <input type="text" class="form-control" placeholder="Search.." name="search">
              <button type="submit" class="search-icon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse navbar-mobile collapse pull-right" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="#">1-800-716-0115</a></li>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="<?php echo url('/') . '/agent-list'; ?>">Deals</a></li>
            <li><a href="#report">Report</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Session::get('AUTH_USER')['NAME'] }} <span class="caret"></span>

              <img src="{{ Session::get('AUTH_USER')['PROFILE_IMG'] }}" alt="profileimage" class="profile-image"></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo url('/') . '/agent-logout'; ?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>