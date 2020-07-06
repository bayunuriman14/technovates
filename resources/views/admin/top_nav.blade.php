<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! url('panel') !!}">
            <strong>Task Management</strong>
        </a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <?php 
                    $image = session('admin_session')->image;
                    $path = !empty($image) ? public_path("images/users/$image") : ""; 
                ?>
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}" alt="{!! session('admin_session')->fullname !!}">
                    <span>{!! session('admin_session')->fullname !!}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{!! url('panel/profile') !!}"><i class="icon-user-plus"></i> My profile</a></li>
                    {{-- <li><a href="datatable_basic.html#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="datatable_basic.html#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li> --}}
                    <li class="divider"></li>
                    @if(Helper::hide_menu('setting', 'index')==1)
                        <li><a href="{!! url('panel/setting') !!}"><i class="icon-cog5"></i> Site settings</a></li>
                    @endif
                    <li><a href="{!! url('auth/logout') !!}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>