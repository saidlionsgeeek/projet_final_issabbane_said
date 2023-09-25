@auth
    @php
        $productcount = 0;
        foreach ($productusers as $key => $productuser) {
            if ($productuser->user_id == Auth::user()->id) {
                $productcount += 1;
            }
        }
    @endphp
@endauth
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home.index') }}"> <img src="{{ asset('img/logo.png') }}"
                            alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="{{ route('shop.index') }}">
                                    Shop
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                            </li>
                            @role(['admin', 'webmaster'])
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Back-office
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        @role('admin')
                                            <a class="dropdown-item" href="{{ route('mailbox.index') }}"> MailBox</a>
                                            <a class="dropdown-item" href="{{ route('info.index') }}"> Info</a>
                                            <a class="dropdown-item" href="{{ route('users.index') }}"> Users</a>
                                        @endrole
                                        @role(['admin', 'webmaster'])
                                            <a class="dropdown-item" href="{{ route('productback.index') }}"> Products</a>
                                        @endrole
                                        {{-- <a class="dropdown-item" href="tracking.html">tracking</a>
                                    <a class="dropdown-item" href="checkout.html">product checkout</a>
                                    <a class="dropdown-item" href="cart.html">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    <a class="dropdown-item" href="elements.html">elements</a> --}}
                                    </div>
                                </li>
                            @endrole
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <a href=""><i class="ti-heart"></i></a>
                        @if (!auth()->user())
                            <a href="{{ route('login') }}"><i class="ti-user"></i></a>
                        @else
                            <a href="{{ route('profile.edit') }}"><i class="ti-user text-success"></i></a>
                        @endif

                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="text-dark" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="text-danger ti-power-off"></i>
                                </a>
                            </form>
                        @endauth
                        @if (auth()->user())
                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="{{ route('cart.index') }}" id="navbarDropdown3"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                                <style>
                                    .main_menu .cart .dropdown-toggle::after {
                                        display: inline-block;
                                        margin-left: .255em;
                                        vertical-align: .255em;
                                        content: "";
                                        border: 0px solid transparent;
                                    }

                                    .main_menu .cart i {
                                        color: #000;
                                        position: relative;
                                        z-index: 1;
                                        font-size: 15px;
                                    }

                                    .main_menu .cart i:after {
                                        position: absolute;
                                        border-radius: 50%;
                                        background-color: #f13d80;
                                        width: 14px;
                                        height: 14px;
                                        right: -8px;
                                        top: -8px;
                                        content: "{{ $productcount }}";
                                        text-align: center;
                                        line-height: 15px;
                                        font-size: 10px;
                                        color: #fff;
                                    }
                                </style>
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div> -->
                            </div>
                        @else
                            <div class=" ">
                                <a href="{{ route('login') }}" id="navbarDropdown3" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        @endif


                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
