<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark bg-transparent">
        <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{route('index')}}">
            
            {{-- <img src="{!! $baseURL.'assets/images/logo.png'!!}" alt="" loading="lazy"> --}}
            <h2 style="color: aliceblue;">                
                Ask me pos
            </h2>

        </a>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('browseRestaurant')}}">Browse Restaurant</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('restaurant.showLoginForm')}}">Restaurant Login</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                @if (Auth::guard('customer')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('customer.profile')}}">{{Auth::guard('customer')->user()->name}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('customer.logout')}}">Logout </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.showSignUpForm')}}">Customer Login</a>
                    </li>
                @endif
          </ul>
        </div>
    </nav>
</div>