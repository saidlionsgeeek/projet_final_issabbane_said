<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    {{-- <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/price_rangs.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/price_rangs.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--::header part start::-->
    @include("layouts.navigation_aranoz")
    <!-- Header part end-->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="{{route("shop.index")}}">All Product</a>
                                    </li>
                                    @foreach ($categories as $category )
                                        <li>
                                        <a href="{{ route('shop.filter', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    
                                    <p><span>{{ count($products) }} </span> Prodict Found</p>
                                    
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <select>
                                        <option data-display="Select">name</option>
                                        <option value="1">price</option>
                                        <option value="2">product</option>
                                    </select>
                                </div>
                                
                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($products as $product)
                            
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img  src="{{ asset('storage/img/'.$product->image) }}" alt="">
                                <div class="single_product_text">
                                    <h4>{{$product->name}}</h4>
                                    <h3>${{$product->price}}.00</h3>
                                    @if ($product->stock > 0)
                                    
                                    <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    @else
                                    <a  class="add_cart"> Out of stock<i class="ti-heart"></i></a>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-lg-12">
                            <div class="d-flex">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller">
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
                            <img height="350px" src="{{ asset('storage/img/'.$bestseller->image) }}" alt="">
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

    <!--::footer_part start::-->
    @include("layouts.footer")
    <!--::footer_part end::-->

    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('js/lightslider.min.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('js/masonry.pkgd.js') }}"></script>
    <!-- Particles JS -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
