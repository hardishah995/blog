@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        
        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel AdminPanel')">
        <meta name="author" content="@yield('meta_author', 'Hardi Shah')">

        <link href="{{ asset('css/screen.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endif
        {!! Html::style('js/select2/select2.css') !!}
        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <?php
            if(!empty($google_analytics)){
                echo $google_analytics;
            }
        ?>
    </head>
    <body>
        <div class="container">
                <!--centers the content between from header to footer-->
                <header  class="clearfix">
                    <h1 class="left"><img src="{{asset('css/images/iOS_banner.png')}} "></h1>
                </header>
                <nav>
                    <ul>
                        <li ><a href="http://localhost:8000/pages/home">Home</a></li>
                        <li class="active"><a href="http://localhost:8000/">Blog</a></li>
                        <li ><a href="http://localhost:8000/pages/about-us">About</a></li>
                        <li ><a href="http://localhost:8000/pages/contact-us">Contact</a></li>
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
            <footer class="clearfix">
  <div class="container">
    <div class="about span-6 append-1">
      <h3>About Global Vincitore</h3>
      <p>A team of technology enthusiasts, creative designers, software engineers and marketers who are translating clients Ideas in to realities and delivering best results since 3 years</p>
    </div>
    <div id="social" class="span-6 append-1">
      <h3 align="center">Social Accounts</h3>
      
    <ul class="social-icon">
        <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="#" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#" target="_blank" class="rss"><i class="fa fa-rss"></i></a></li>
    </ul>
    </div>
      
    <div id="footer_form" class="span-10 last clearfix">
      <h3>Contact us</h3>
      <form action="#">
        <div class="row">
          <label for="name">your name</label>
          <input type="text" id="name" name="name" class="span-7 right last">
        </div>
        <div class="row">
          <label for="email">your email</label>
          <input type="text" id="email" name="email" class="span-7 right last">
        </div>
        <div class="row">
          <label for="message">your message</label>
          <textarea id="message" name="message" class="span-7 right last"></textarea>
        </div>
        <div class="right">
          <input type="submit">
        </div>
      </form>
    </div>
    <hr>
    
    © 2019  <b>GLOBAL VINCITORE</b>.All rights reserved. </div>
</footer>

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        @yield('after-scripts')
        {{ Html::script('js/jquerysession.js') }}
        {{ Html::script('js/frontend/frontend.js') }}
        {!! Html::script('js/select2/select2.js') !!}

        <script type="text/javascript">
            if("{{Route::currentRouteName()}}" !== "frontend.user.account")
            {
                $.session.clear();
            }
        </script>
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5c8b98f9c37db86fcfce07a6/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        @include('includes.partials.ga')

    </body>
</html>