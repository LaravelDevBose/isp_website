<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" style="padding: 0px; width: 100%; background-color: #fff;" href="http://brainchildsoft.com/" target="_blank"><img src="{{ asset('/assets/images/brainchildsoft.png') }}" alt="" style="width: 190px; height: 40px; padding-top: -2px;"></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <p class="navbar-text"><a href="<?php //if(Auth::user()->type == 'D'){echo route('licence');}else{echo '#';}?>" style="text-decoration: none;"><span class="label bg-success">Online</span></a></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <?php
                    $avatar = Auth::User()->avatar;
                    if(!file_exists($avatar) || !getimagesize($avatar)){
                        $avatar = '/assets/images/default_user.png';
                    }
                    ?>
                    <img src="{{ asset($avatar) }}" alt="{{ Auth::User()->username }}">{{ ucwords(Auth::User()->full_name)  }}
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
