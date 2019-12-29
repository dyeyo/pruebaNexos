<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistema Nexos</title>

    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("font-awesome/css/font-awesome.css")}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset("css/plugins/toastr/toastr.min.css")}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset("js/plugins/gritter/jquery.gritter.css")}}" rel="stylesheet">
    <link href="{{asset("js/plugins/dataTables/datatables.min.css")}}" rel="stylesheet">

    <link href="{{asset("css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">

</head>

<body>
<div id="app">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">David Williams</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </li>
                    @if(Auth::user()->tipo_user=='2')
                        <li>
                            <a href="{{url('/cuentas')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Cuentas</span></a>
                        </li>
                        <li>
                            <a href="{{url('/movimientos')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Movimientos</span></a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('/cajeros')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Cajeros</span></a>
                        </li>
                    @endif
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li style="padding: 20px">
                            <span class="m-r-sm text-muted welcome-message">Bienvenidos.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" >
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" >
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            </a>
                                Salir
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </nav>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Mainly scripts -->
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="../../js/app.js"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.js")}}"></script>
<script src="{{asset("js/plugins/metisMenu/jquery.metisMenu.js")}}"></script>
<script src="{{asset("js/plugins/slimscroll/jquery.slimscroll.min.js")}}"></script>

<!-- Flot -->
<script src="{{asset("js/plugins/flot/jquery.flot.js")}}"></script>
<script src="{{asset("js/plugins/flot/jquery.flot.tooltip.min.js")}}"></script>
<script src="{{asset("js/plugins/flot/jquery.flot.spline.js")}}"></script>
<script src="{{asset("js/plugins/flot/jquery.flot.resize.js")}}"></script>
<script src="{{asset("js/plugins/flot/jquery.flot.pie.js")}}"></script>

<!-- Peity -->
<script src="{{asset("js/plugins/peity/jquery.peity.min.js")}}"></script>
<script src="{{asset("js/demo/peity-demo.js")}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset("js/inspinia.js")}}"></script>
<script src="{{asset("js/plugins/pace/pace.min.js")}}"></script>

<!-- jQuery UI -->
<script src="{{asset("js/plugins/jquery-ui/jquery-ui.min.js")}}"></script>

<!-- GITTER -->
<script src="{{asset("js/plugins/gritter/jquery.gritter.min.js")}}"></script>

<!-- Sparkline -->
<script src="{{asset("js/plugins/sparkline/jquery.sparkline.min.js")}}"></script>

<!-- Sparkline demo data  -->
<script src="{{asset("js/demo/sparkline-demo.js")}}"></script>

<!-- ChartJS-->
<script src="{{asset("js/plugins/chartJs/Chart.min.js")}}"></script>

<!-- Toastr -->
<script src="{{asset("js/plugins/toastr/toastr.min.js")}}"></script>

<script src="{{asset("js/plugins/dataTables/datatables.min.js")}}"></script>
<script src="{{asset("js/plugins/dataTables/dataTables.bootstrap4.min.js")}}"></script>


</body>
</html>