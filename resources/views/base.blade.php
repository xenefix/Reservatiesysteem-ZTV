<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ZTV - @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/frontend.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="/css/clockpicker.css" rel="stylesheet">
    <link href="/css/summernote.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action("FrontendController@ShowHomepage") }}">
                {{getenv('APP_TITLE')}}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li class="{{ Request::is('handleiding') ? 'active' : '' }}">
                    <a href="{{ action("FrontendController@ShowHandleidingpage") }}">Handleiding</a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}">
                    <a href="{{ action("FrontendController@ShowContactpage") }}">Contact</a>
                </li>
                @if (Auth::guest())
                @else
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Uitloggen
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->

    @yield('content')


<!-- /.container -->
<!-- Begin page content -->

<footer class="footer">
    <div class="container">
        <p class="text-muted">© ZTV {{ date('Y') }}.
            @if (Auth::guest())
                <a href="{{ action("FrontendController@ShowBeheerLogin") }}">Login backend</a>
            @else
                <a href="{{ action("BackendController@ShowBeheer") }}">Backend Beheerconsole</a>
            @endif
        </p>
    </div>
</footer>
<!-- jQuery Version 1.11.1 -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/bootstrap-datepicker.nl-BE.min.js"></script>
<script src="/js/clockpicker.js"></script>
<script src="/js/summernote.min.js"></script>
<script src="/js/frontend.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

</body>

</html>
