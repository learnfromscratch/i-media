<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
    <!-- Izitoast -->
    <link rel="stylesheet" type="text/css" href="/css/iziToast.min.css">

    <title>{{ config('app.name') }}</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ route('home') }}" style="color: white">{{ config('app.name') }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                
              </ul>
              <form class="navbar-form navbar-left" action="{{ route('articles.search') }}" method="get">
                <div class="form-group" style="display:inline;">
                  <input id="search" type="text" name="data" class="form-control" placeholder="Rechercher">
                  <button class="btn btn-info"><i class="fa fa-search"></i></button>
                </div>
              </form>
              <ul class="nav navbar-nav navbar-right">
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="username">{{ Auth::user()->name }}</span><i class="fa fa-caret-down fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu">
                    @if (Auth::user()->role === 'admin')
                      <li><a href="{{ route('admin.dashboard') }}">Espace administrateur</a></li>
                    @endif
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Paramètre</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Déconnexion
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>

    <!-- Page content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @yield('sidebar')

            @yield('content')

            <aside class="leftside col-md-3 col-md-offset-8">
              <div id="tags" class="well">
                <h4 class="title">Mots clés</h4>
                <p>
                  <h4>
                    @foreach (Auth::user()->keywords as $keyword)
                      <span class="label label-success">{{ $keyword->name }}</span>
                    @endforeach
                  </h4>
                </p>
              </div>

              <div id="newsletter" class="well">
                <h4 class="title">Recevoir des newsletter</h4>
                <p>
                  Entrez votre E-Mail pour être informer des nouveautés
                </p>
                <form action="{{ route('newsletter') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Saisir une adresse E-Mail"><br>
                    <button class="btn btn-primary btn-sm">Valider</button>
                  </div>
                </form>
              </div>
            </aside>
        </div>
    </div>

	  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/javascript.js"></script>
    <!-- Pucher -->
    <script src="//js.pusher.com/4.0/pusher.min.js" type="text/javascript"></script>
    <!-- IziToast -->
    <script type="text/javascript" src="/js/iziToast.min.js"></script>
    
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

    </script>

    <!-- Session -->
    @if (Session::has('success'))
      <script>
        iziToast.success({
            title: 'OK',
            message: '<?php echo Session::get('success') ?>',
            position: 'topLeft',
        });
      </script>
    @endif

    @if (Session::has('info'))
      <script>
        iziToast.info({
            title: 'Info',
            message: '<?php echo Session::get('info') ?>',
            position: 'topRight',
        });
      </script>
    @endif

  </body>
</html>