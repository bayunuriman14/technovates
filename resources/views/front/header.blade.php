<!-- Header
============================================= -->
<header id="header" class="transparent-header force-not-dark full-header sticky-header" data-sticky-class="not-dark" data-responsive-class="not-dark" data-sticky-offset="full">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo" style="vertical-align:middle">
                <a href="{!! url('/') !!}/{!!$lang!!}" class="standard-logo" data-dark-logo="{!! url('/') !!}/front/demos/business/images/shisha-logo.png">
                    <img style="height: 50px" src="{!! url('/') !!}/front/demos/business/images/shisha-logo.png" alt="Shisha Logo">
                </a>
                <a href="{!! url('/') !!}/{!!$lang!!}" class="retina-logo" data-dark-logo="{!! url('/') !!}/front/demos/business/images/shisha-logo.png">
                    <img style="height: 50px" src="{!! url('/') !!}/front/demos/business/images/shisha-logo.png" alt="Shisha Logo">
                </a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="not-dark" > 
                

                <ul class="one-page-menu">
                    <li><a href="{!! url('/') !!}/{!! $locale !!}"><div>{{ trans('home.home') }}</div></a></li>
                    <li><a href="{!! url('/') !!}/{!! $locale !!}/about-us" ><div>{{ trans('home.about_us') }}</div></a></li>
                    <li><a href="{!! url('/') !!}/{!! $locale !!}/products" ><div>{{ trans('home.products') }}</div></a></li>
                    <li><a href="{!! url('/') !!}/{!! $locale !!}/gallery"><div>{{ trans('home.gallery') }}</div></a></li>
                    <li><a href="{!! url('/') !!}/{!! $locale !!}/contact-us"><div>{{ trans('home.contact_us') }}</div></a></li>
                    <li><a href="#"><div>{{ trans('home.language') }}</div></a>
                        <ul>
                            <li><a href="{!! url('/') !!}/en{!! $uri_en !!}"><div>English</div></a></li>
                            <li><a href="{!! url('/') !!}/ru{!! $uri_ru !!}"><div>Rusia</div></a></li>
                            <li><a href="{!! url('/') !!}/sa{!! $uri_sa !!}"><div>Arab</div></a></li>
                        </ul>
                    </li>
                    
                </ul>

                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->