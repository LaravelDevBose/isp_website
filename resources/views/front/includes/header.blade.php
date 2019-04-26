<!-- Main header -->
<header class="header">
    <div class="main-header" data-animate="fadeInUp" data-delay=".9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-9">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('public/front/img/logo.png') }}" data-rjs="2" alt="VPNet">
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-8 col-3">
                    <nav>
                        <!-- Header-menu -->
                        <div class="header-menu">
                            <ul>
                                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('services') }}">Services</a></li>
                                <li><a href="{{ route('packages') }}">Packages</a></li>
                                <li><a href="{{ route('team_members') }}">Team Member</a></li>
                                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                                <li><a href="{{ route('company_profile') }}">Company Profile</a></li>
                                <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- End of Header-menu -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Main header -->
