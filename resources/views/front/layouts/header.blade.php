
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone font-size-16px"></i> 010 010010</a></li>
                            <li><a href="#"><i class="fa fa-envelope font-size-16px"></i> info@pizzashop.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    @if (Auth::user())
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li class="dropdown">
                                    <a href="#" class="font-size-20px padding-top-9px padding-left-15px">
                                        <i class="fa fa-user-check"></i>
                                        {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('/user-orders') }}">My Orders</a></li>
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/viewcart') }}" class="top-header-bgcolor font-size-20px"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if (! Auth::user())
                                <li><a href="{{ url('/login-page') }}" class="top-header-bgcolor font-size-20px"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->


    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/') }}">Products</a></li>
                                    <li><a href="{{ url('/viewcart') }}">Cart</a></li>
                                    <li class="nav-bar-check-out-button @if (empty(Session::get('session_id'))) display-none @endif"><a href="{{ url('/check-out') }}">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canadian Dollar</a></li>
                            <li><a href="#">Pound</a></li>
                        </ul>
                    </div>

                    @if (isset($indexPage))
                        <div class="search_box pull-right">
                            <input id="search" class="form-control" type="text" placeholder="Search by Name"/>
                            <span id="no-product-with-that-name" class="color-red display-none"><i>Product unavailable</i></span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
