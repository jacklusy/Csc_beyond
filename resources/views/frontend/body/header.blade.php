{{-- my-style-css --}}
<link rel="stylesheet" href="{{asset('frontend/assets/css/my.css')}} " />

{{-- font-awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<header class="header-area header-style-1 header-height-2">
  
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                
                <div class="header-right">
                    
                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{-- <div class="search-location">
                                <form action="{{ route('product.search') }}" method="post">
                                    @csrf

                                </form>
                            </div> --}}
                           
                           
                            
                           
                            <div class="header-action-icon-2">
                                
                                @auth
                                
                                        <a href="{{route('dashboard')}}">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}} " />
                                         
                                        </a>
                                        <a href="{{route('dashboard')}}"><span class="lable ml-0"></span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <h6>{{Auth::user()->username}}</h6>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{route('dashboard')}}">My Account</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{route('user.account.page')}}">Account Details</a>
                                                </li> --}}
                                                
                                                <li>
                                                    <a href="{{route('user.logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                </li>
                                            </ul>
                                        </div>

                                @else
                                        <a href="{{route('login')}}">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}} " />
                                        </a>
                                        
                                @endauth

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{asset('frontend/img/logo3.png')}} " alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex col-12">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                
                                <li>
                                    <a  href="{{ url('/') }}">Home</a>
                                    
                                    
                                </li>
                                <li>
                                    <a class="active" href="{{ url('/user/chat') }}">Chat</a>
                                    
                                </li>

                               
                            </ul>
                        </nav>
                    </div>
                    <div class="search-style-2">
                       
                    </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <!--End header-->


    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                    
                </div>
            </div>
    
    
            <div class="mobile-header-content-area">
                
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a class="active" href="{{ url('/') }}">Home</a>
                                
                            </li>
                            <li>
                                <a class="active" href="">Chat</a>
                                
                            </li>

                            
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
    
    
                </div>
                <hr>
                <div class="mobile-social-icon mb-50" style="display: flex">
                    <a href="https://github.com/jacklusy"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/jack-alloussi-747800260/"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/accounts/login/"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
