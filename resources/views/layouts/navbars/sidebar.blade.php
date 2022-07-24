<nav class="navbar navbar-vertical fixed-left navbar-expand-md shadow-lg" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:ivory!important;"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <b style="font-size: 25px;padding: 3px 5px;" class="text-info">K-POS</b>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                           <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="" style="color:limegreen;font-family: tahoma;">{{ __('Logged in:') }} <span style="color:dodgerblue;"> {{ auth()->user()->email }} </span>
                    </div>
      <!--               <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" style="color: red;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run" style="color: red;"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                         <b style="font-size: 25px;color:dodgerblue;padding: 3px 5px;">K-POS</b>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-info" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-info"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                        <li class="nav-item">
                    <a class="nav-link" href="{{route('customers_list')}}" role="button" aria-expanded="true">
                        <i class="fa fa-user" style=""></i>
                        <span class="nav-link-text">{{ __('Customers') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show_services')}}" role="button" aria-expanded="true">
                        <i class="fa fa-shopping-bag" style=""></i>
                        <span class="nav-link-text">{{ __('Services') }}</span>
                    </a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('show_categories')}}" role="button" aria-expanded="true">
                        <i class="fa fa-shopping-bag" style=""></i>
                        <span class="nav-link-text">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show_employees')}}" role="button" aria-expanded="true">
                        <i class="fa fa-users" style=""></i>
                        <span class="nav-link-text">{{ __('Employees') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" aria-expanded="true">
                        <i class="fas fa-image" style=""></i>
                        <span class="nav-link-text" style="">{{ __('Gallery') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" aria-expanded="true">
                        <i class="fa fa-user" style=""></i>
                        <span class="nav-link-text" style="">{{ __('Roles') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" aria-expanded="true">
                        <i class="fa fa-file" style=""></i>
                        <span class="nav-link-text" style="">{{ __('Reports') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('make-transaction') }}" role="button" aria-expanded="true">
                        <span class="nav-link-text btn btn-success" style="">
                        <i class="fa fa-plus" style=""></i>
                       {{  __('New Transaction') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
