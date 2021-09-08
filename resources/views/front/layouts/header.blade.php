
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
                            <li><a href="{{ url('/viewcart') }}" class="top-header-bgcolor font-size-20px">Cart<i class="fa fa-shopping-cart"></i> <span class="header-cart-total">{{ $itemsInCart }}</span></a></li>
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
                            <li><a href="{{ url('/') }}" class="@if(Request::is('/')) active @endif">Home</a></li>
                            <li><a href="{{ url('/about') }}" class="@if(Request::is('about')) active @endif">About</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/') }}">Products</a></li>
                                    <li><a href="{{ url('/viewcart') }}">Cart  <span class="header-cart-total float-none">{{ $itemsInCart }}</span></a></li>
                                    <li class="nav-bar-check-out-button @if ($itemsInCart == 0) display-none @endif"><a href="{{ url('/check-out') }}">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    @if (isset($indexPage))
                        <div class="search_box pull-left">
                            <input id="search" class="form-control" type="text" placeholder="Search by Name"/>
                            <span id="no-product-with-that-name" class="color-red display-none"><i>Product unavailable</i></span>
                        </div>
                    @endif

                    <div class="btn-group pull-right">
                        <button id="set-currency-button" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            {{ $siteCurrency['name'] }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a id="set-currency-button-euro" href="#" data-currency-name="EURO" data-currency-sign="<i class='fa fa-euro-sign main-color'></i>" data-currency-ratio="1">EURO</a></li>
                            <li><a id="set-currency-button-dollar" href="#" data-currency-name="DOLLAR" data-currency-sign="<i class='fas fa-dollar-sign main-color'></i>" data-currency-ratio="1.2">DOLLAR</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
