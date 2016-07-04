    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Aforisme">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Aforisme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body class="main-body">
            @include('partials.navbar')

            <div id="wrapper">

            @yield('sidebar')                

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                        <!-- <h1>Simple Sidebar</h1> -->
                            {!! $aforisms->render() !!}
                            <p>
                                De la {{ $primul = $aforisms->firstItem() }} la {{ $ultimul = $aforisms->lastItem() }} din {{ $total = $aforisms->total() }}
                            </p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle" role="button" >Etichete</a>
                            
                        </div>     
                        <div class="col-xs-12">
                            <div class="pusher"></div>
                        </div>
                       

                        @if(count($aforisms))
                            @foreach($aforisms as $key=>$aforism)
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                @include('aforism.partials.panel')
                            </div><!--/.col-xs-12.col-sm-6-->
                            {!! ++$key % 2 == 0 ? '<div class="clearfix visible-sm"></div>' : '' !!}
                            {!! $key % 4 == 0 ? '<div class="clearfix visible-md visible-lg"></div>':'' !!}
                            @endforeach
                        @else
                            <p class="col-xs-12 col-sm-6">Nu există nici o înregistrare!</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>

            @yield('scripts')

        </body>
        </html>
