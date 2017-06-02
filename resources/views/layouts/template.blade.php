<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font -->
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:300'>
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/iziToast.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="container__item">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                </div>

                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li>
                        @if (count(Auth::user()->unreadNotifications))
                            <a href="">
                              <i class="fa fa-bell fa-fw fa-lg" aria-hidden="true"></i>
                              <span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
                            </a>
                        @else
                            <a href="">
                              <i class="fa fa-bell-o fa-fw fa-lg" aria-hidden="true"></i>
                            </a>
                        @endif
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="fa fa-caret-down fa-fw fa-lg"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                      </ul>
                    </li>
                </ul>

                <form class="navbar-form navbar-right" action="{{ route('articles.search') }}" method="get">
                    <input type="text" name="data" class="form__field" placeholder="Recherche..." />
                    <button type="submit" class="btn btn--primary btn--inside"><i class="fa fa-search"></i></button>
                </form>
                
            </div>
          </div>
        </nav>
        <!-- END NAVBAR -->
    </header>

    <!-- PAGE CONTENT -->
    <div class="page-content row">
        <!-- Sidebar Wrapper -->
        <div id="toggle" class="col-md-2 col-md-offset-1">
            <ul id="sidebar-wrapper" class="sidebar-nav list-unstyled">
                
                @if (Auth::user()->role_id === 1)
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i>
                        <b>Tableau de bord</b>
                    </a>
                </li>
                @endif
                @if (Auth::user()->role_id === 2)
                <li>
                    <a href="{{ route('client.admin', ['id' => Auth::user()->groupe->id]) }}"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i>
                        <b>Tableau de bord</b>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Tous</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Aujourd'hui</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Dans la semaines</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Dans le mois</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Les 3 derniers mois</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Plus</b> <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i><b>Aide</b> <i class="fa fa-question fa-fw" aria-hidden="true"></i></a>
                </li>
            </ul>   

            <!-- Sidebar btn -->
            <!--<div id="sidebar-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>-->
            <!-- /Sidebar btn -->
        </div>
        <!-- /Sidebar Wrapper -->

        @yield('content')
    </div>
    <!-- PAGE CONTENT -->

    <!-- Scripts -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//js.pusher.com/4.0/pusher.min.js" type="text/javascript"></script>
    <script src="/js/iziToast.min.js"></script>
    
    <script>

        var pusher = new Pusher('ca090a3a1702d459b7eb');

        var notificationsChannel = pusher.subscribe('notifications');

        notificationsChannel.bind('Notification', function(notification){
            var message = notification.message;

            iziToast.info({
                title: 'Alert',
                message: message,
                position: 'topRight',
            });
        });


        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>

</body>
</html>