<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#aforisme-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="aforisme-navbar-collapse">

            <ul class="nav navbar-nav">
                
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    <li><a href="{{ route('admin.etichete.index') }}">Etichete</a></li>
                @else
                    <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a> -->
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-expanded="false" >

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('admin.aforisme.index') }}"> Aforismele Mele </a></li>
                            <li><a href="{{ route('admin.etichete.index') }}">Etichete</a></li>
                            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp; Ieșire </a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" id="navSearchForm" role="search" method="GET" action="">
                <div class="form-group has-feedback">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="search"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                            <input type="text" class="form-control" name="keyword" placeholder="Caută în site">
                    </div>
                </div>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>