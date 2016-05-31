<!DOCTYPE HTML>
<html>
<head>
<title>PHarmaMeter Social Network </title>
        <link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' /><link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}">
        <script src="{{ asset('js/jquery.min.js')}}"></script>
         <!-- Custom Theme files -->
        <link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css' />
         <!-- Custom Theme files -->
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <script type="application/x-javascript">
          addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
         </script>
         <!-- webfonts -->
         <link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
          <!-- webfonts -->
        <script src="{{ asset('js/vendor/jquery-1.11.0.min.js')}}"></script>
        <script src="{{ asset('js/vendor/jquery.gmap3.min.js')}}"></script>
        <script src="{{ asset('js/plugins.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/responsiveslides.min.js')}}"></script>
        <script>
            $(function () {
              $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
              });
              $('.error').delay(5000).fadeOut('slow');
            });
            
          </script>
    
</head>
<body>
<header>
<!-- container -->
            <!-- header -->
            <div class="header header-border">
                <div class="container">
                    <!-- logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                        Pharma Medical
                        {{-- <img src="images/logo.png" title="medicalpluse" /> --}}
                        </a>
                    </div>
                    <!-- logo -->
                    <!-- top-nav -->
                    <div class="top-nav">
                        <span class="menu"> </span>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/') }}">About</a></li>
                            <li><a href="{{ url('/') }}">Services</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a>
                            </li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li><a href="/users/{{ Auth::user()->id }}" >
                                <img width="30px" height="20px" src="{{ Auth::user()->personal->image }}" alt="">{{ Auth::user()->name }} </a>
                            @if(Auth::user()->isAdmin())
                            <li><a href="#">Dashboard</a>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                               
                        @endif
                        </ul>
                    </div>
                    <!-- top-nav -->
                        <!-- script-for-nav -->
                    <script>
                        $(document).ready(function(){
                            $("span.menu").click(function(){
                                $(".top-nav ul").slideToggle(300);
                            });
                        });
                    </script>
                    <!-- script-for-nav -->
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- /header -->
        </div>
        <!-- /container -->
        </div>
        <!-- Blog -->
        <div class="blog">
            <div class="container-fluied">

           
<!-- header -->
    @yield('content')

<!-- footer sector -->
        </div><!-- /container -->
    </div><!-- /Blog -->        
    {{-- <!-- team-grids-caption -->
    <div class="team-grids-caption">
        <div class="container">
            <div class="team-grids-caption-left">
                <h4>He point of using Lorem Ipsum is that</h4>
                <p>as opposed to using Many desktop publishing packages and web page editors now use </p>
            </div>
            <div class="team-grids-caption-right">
                <a class="team-btn" href="contact.html">Contact</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div> --}}
<!-- team-grids-caption -->
<!-- footer -->
    <div class="footer navbar navbar-default navbar-static-bottom">
            <div class="col-md-3 foot-1">
                <h4>Latest Posts</h4>
                <ul>
                <li><a href="">||   </a></li>

            
                </ul>
            </div>
            <div class="col-md-3 foot-1">
                <h4>Top viewed</h4>
                <ul>
                <li><a href="">||   </a></li>

                </ul>
            </div>
            <div class="col-md-3 foot-1">
                <h4>Categories</h4>
                <ul>
                    <li><a href="">||  </a></li>
                </ul>
            </div>
            <div class="col-md-3 foot-1">
                <h4>Tags</h4>
                <ul> 
                    <li><a href="">||  </a></li>
                </ul>
            </div>
            
            <div class="clearfix"> </div>
            <div class="copyright">
                <div class="bottom-footer">
                        <p>
                            <span>Copyright © 2084 <a href="#">BusinessMonk</a> 
                            | Design: <a rel="nofollow" href="#" target="_parent"><span class="blue">Pharmateam</span><span class="green">ITI</span></a></span>
                        </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

