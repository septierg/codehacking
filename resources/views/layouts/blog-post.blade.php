<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>


        /* Style the sidenav links and the dropdown button */
        .sidenav a, .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: black;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }
        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover {
            color:black;
            background-color: lightgrey;

        }
        /* Main content */
        .main {
            margin-left: 200px; /* Same as the width of the sidenav */
            font-size: 20px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }
        /* Add an active class to the active dropdown button */
        .active {
            background-color: #607d8b !important ;
            color: white;
        }
        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #262626;
        }
        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }
        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body id="admin-page" class="w3-white">

<!-- Top container -->
<div class="w3-bar w3-top w3-black" style="z-index:4">
    <button class="w3-bar-item w3-button  w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a class="w3-bar-item w3-button" href="/">Home</a>
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    @else
        <a href="#" class="w3-bar-item w3-button w3-padding w3-right"><i class="fa fa-users fa-fw"></i>  {{ Auth::user()->name }} <span class="caret"></span></a>
    @endif
    <a href="{{ url('/logout') }}" class="w3-bar-item w3-button w3-padding w3-right"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</div>
<!-- Grid -->
<div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col l8 s12">
        <!-- Blog entry -->
        <div class="w3-card-4 w3-margin w3-white">
            <img src="/w3images/woods.jpg" alt="Nature" style="width:100%">
            <div class="w3-container">
                @yield('content')

            </div>

            <div class="w3-container">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
                    tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
                    </div>
                    <div class="w3-col m4 w3-hide-small">
                        <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- Blog entry -->
        <div class="w3-card-4 w3-margin w3-white">
            <img src="/w3images/bridge.jpg" alt="Norway" style="width:100%">
            <div class="w3-container">
                <h3><b>BLOG ENTRY</b></h3>
                <h5>Title description, <span class="w3-opacity">April 2, 2014</span></h5>
            </div>

            <div class="w3-container">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
                    tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
                    </div>
                    <div class="w3-col m4 w3-hide-small">
                        <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG ENTRIES -->
    </div>

    <!-- Introduction menu -->
    <div class="w3-col l4">
        <!-- About Card -->
        <div class="w3-card w3-margin w3-margin-top">
            <img src="/w3images/avatar_g.jpg" style="width:100%">
            <div class="w3-container w3-white">
                <h4><b>My Name</b></h4>
                <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
            </div>
        </div><hr>

        <!-- Posts -->
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
                <h4>Popular Posts</h4>
            </div>
            <ul class="w3-ul w3-hoverable w3-white">
                <li class="w3-padding-16">
                    <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Lorem</span><br>
                    <span>Sed mattis nunc</span>
                </li>
                <li class="w3-padding-16">
                    <img src="/w3images/gondol.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Ipsum</span><br>
                    <span>Praes tinci sed</span>
                </li>
                <li class="w3-padding-16">
                    <img src="/w3images/skies.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Dorum</span><br>
                    <span>Ultricies congue</span>
                </li>
                <li class="w3-padding-16 w3-hide-medium w3-hide-small">
                    <img src="/w3images/rock.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Mingsum</span><br>
                    <span>Lorem ipsum dipsum</span>
                </li>
            </ul>
        </div>
        <hr>

        <!-- Labels / tags -->
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
                <h4>Tags</h4>
            </div>
            <div class="w3-container w3-white">
                <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
                </p>
            </div>
        </div>

        <!-- END Introduction Menu -->
    </div>

    <!-- END GRID -->
</div><br>









</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
