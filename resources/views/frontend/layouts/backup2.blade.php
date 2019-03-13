<body>
        <div class="container">
                <!--centers the content between from header to footer-->
                <header  class="clearfix">
                    <h1 class="left"><span>Global</span>Vincitore</h1>
                </header>
                <nav>
                    <ul>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        @if ($logged_in_user)
                        <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
                        @endif

                        @if (! $logged_in_user)
                            <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                            @if (config('access.users.registration'))
                                <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ $logged_in_user->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @permission('view-backend')
                                        <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                                    @endauth

                                    <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                                    <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
                
                @include('includes.partials.messages')
                @yield('content')
                    
            </div><!-- container -->