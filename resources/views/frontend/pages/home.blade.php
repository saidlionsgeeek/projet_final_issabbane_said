<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    @include("layouts.navigation_aranoz")
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        @foreach ($productsshuffle as $productshuffle)
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>{{$productshuffle->name
                                            }}</h1>
                                            <p>{{$productshuffle->description}}</p>
                                            <a href="{{route("product.index",$productshuffle->id)}}" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img width="600px" height="400px" src="{{ asset('storage/img/'.$productshuffle->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach ($latestProducts as $key => $latestProduct)
                    @if ($key == 0)
                        <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>{{$latestProduct->name}}</h3>
                        <a href="{{route("product.index",$latestProduct->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img height="400px" src="{{ asset('storage/img/'.$latestProduct->image) }}" alt="">
                    </div>
                </div>
                    @endif
                    @if ($key == 1)
                        <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p style="position:relative; z-index: 1;">Premium Quality</p>
                        <h3 style="position:relative; z-index: 1;">{{$latestProduct->name}}</h3>
                        <a href="{{route("product.index",$latestProduct->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img height="400px" src="{{ asset('storage/img/'.$latestProduct->image) }}"  alt="">
                    </div>
                </div>
                    @endif
                    @if ($key == 2)
                        <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p style="position:relative; z-index: 1;">Premium Quality</p>
                        <h3 style="position:relative; z-index: 1;">{{$latestProduct->name}}</h3>
                        <a href="{{route("product.index",$latestProduct->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img height="400px" src="{{ asset('storage/img/'.$latestProduct->image) }}"  alt="">
                    </div>
                </div>
                    @endif
                    @if ($key == 3)
                        <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>{{$latestProduct->name}}</h3>
                        <a href="{{route("product.index",$latestProduct->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img height="400px" src="{{ asset('storage/img/'.$latestProduct->image) }}" alt="">
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                @foreach ($awesomes as $awesome)
                                    <div  class="col-lg-3 col-sm-6 ">
                                    <div class="single_product_item">
                                        <a href="{{route("product.index",$awesome->id)}}">
                                            <img height="300px" src="{{ asset('storage/img/'.$awesome->image) }}" alt="">
                                        </a>
                                        <div class="single_product_text">
                                            <h4>{{$awesome->name}}</h4>
                                            <h3>${{$awesome->price}}</h3>
                                            <a class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        @foreach ($products as $key => $product)
                            @if ($key == 12)
                            <img src="{{ asset('storage/img/'.$product->image) }}" alt="">
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <form action="{{route("sendemail")}}" method="POST">
                            @csrf
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="email" id="email" required>
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn_2" id="basic-addon2">book now</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ( $bestsellers as $bestseller )
                        <a href="{{route("product.index",$bestseller->id)}}">
                        <div class="single_product_item">
                            <img src="{{ asset('storage/img/'.$bestseller->image) }}" alt="">
                            <div class="single_product_text">
                                <h4>{{$bestseller->name}}</h4>
                                <h5>Stock : {{$bestseller->stock}}</h5>
                                <h3>${{$bestseller->price}}.00</h3>
                            </div>
                        </div></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                            <form action="{{route("sendemail")}}" method="POST">
                                @csrf
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="enter email address"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="email" id="email" required>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text btn_2" id="basic-addon2">subscribe now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_5.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
    @include("layouts.footer")
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>