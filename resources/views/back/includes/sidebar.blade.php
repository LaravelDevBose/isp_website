<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a  class="media-left">
                        <?php
                        $avatar = Auth::User()->avatar;
                        if(!file_exists($avatar) || !getimagesize($avatar)){
                            $avatar = 'assets/images/default_user.png';
                        }
                        ?>
                        <img src="{{ asset($avatar) }}" class="img-circle img-sm" alt="{{ Auth::User()->username }}">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold" >{{ ucwords(Auth::User()->full_name) }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-user text-size-small"></i> User Name- {{ Auth::User()->username }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ route('home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li ><a href="{{ route('slider.index') }}"><i class="icon-balance"></i> <span>Slider</span></a></li>
                    <li ><a href="{{ route('service.index') }}"><i class="icon-balance"></i> <span>Service</span></a></li>
                    <li ><a href="{{ route('package.index') }}"><i class="icon-balance"></i> <span>Packages</span></a></li>
{{--                    <li ><a href="{{ route('home') }}"><i class="icon-balance"></i> <span>Testimonial</span></a></li>--}}
{{--                    <li ><a href="{{ route('home') }}"><i class="icon-balance"></i> <span>News & Events</span></a></li>--}}
{{--                    <li ><a href="{{ route('gallery.index') }}"><i class="icon-balance"></i> <span>Gallery</span></a></li>--}}
{{--                    <li ><a href="{{ route('home') }}"><i class="icon-balance"></i> <span>Blog</span></a></li>--}}
{{--                    <li ><a href="{{ route('teamMember.index') }}"><i class="icon-balance"></i> <span>Team Member</span></a></li>--}}
                    <li ><a href="{{ route('user.message') }}"><i class="icon-balance"></i> <span>User Message</span></a></li>
{{--                    <li ><a href="{{ route('home') }}"><i class="icon-balance"></i> <span>Management Message</span></a></li>--}}
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>General Pages</span></a>
                        <ul>
                            {{--<li><a href="{{ route('welcome.note') }}">WelCome Note</a></li>--}}
                            {{--<li><a href="{{ route('company.profile') }}">Company Profile</a></li>--}}
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                            <li><a href="{{ route('coverage') }}">Coverage Page</a></li>
                            <li><a href="{{ route('corporate') }}">Corporate Page</a></li>
                            <li><a href="{{ route('billing') }}">Billing Page</a></li>
                            <li><a href="{{ route('support') }}">Support Page</a></li>
                        </ul>
                    </li>

                    <li ><a href="{{ route('contactUs.index') }}"><i class="icon-balance"></i> <span>Contact Us</span></a></li>
{{--                    <li ><a href="{{ route('home') }}"><i class="icon-balance"></i> <span>Admin</span></a></li>--}}

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
