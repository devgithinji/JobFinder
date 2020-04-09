<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="{{route('welcome')}}">Job<strong
                                    class="font-weight-bold">Finder</strong> </a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                    <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                                        <span class="icon-menu h3">
                                        </span>
                                    </a>
                                </div>
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    @if(!Auth::check())
                                        <li><a href="{{route('register')}}">For Job Seeker</a></li>
                                        <li>
                                            <a href="{{route('employer.register')}}">For Employees</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{route('home')}}">Dashboard</a>
                                        </li>
                                    @endif
                                    <li><a href="{{route('company')}}">Companies List</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li>
                                        @if(!Auth::check())
                                            <a href="{{route('login')}}">
                                                <button id="login_btn"
                                                        class="btn btn-primary text-white py-3 px-4 rounded login_btn">
                                                    Login
                                                    <span class="m-2">
                                               <i class="fas fa-lock-open"></i>
                                            </span>
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <button id="login_btn"
                                                        class="btn btn-primary text-white py-3 px-4 rounded">
                                                    Logout
                                                    <span class="m-2">
                                                        <i class="fas fa-lock"></i>
                                                     </span>
                                                </button>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







