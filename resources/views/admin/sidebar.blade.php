<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <?php 
                    $image = session('admin_session')->image;
                    $path = !empty($image) ? public_path("images/users/$image") : ""; 
                ?>
                <div class="media">
                    <a class="media-left">
                        <img src="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}" class="img-circle img-sm" alt="{!! session('admin_session')->fullname !!}">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{!! session('admin_session')->fullname !!}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-users text-size-small"></i> &nbsp;{!! Helper::groupbyid(session('admin_session')->id_group)->group_name !!}
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        
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
                    <li><a href="{!! url('panel') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


                    @if(Helper::hide_menu('employee', 'index')==1)
                        <li class="{!! (Helper::uri2()=='employee' ? 'active' : '') !!}"><a href="{!! url('panel/employee') !!}"><i class="icon-user"></i> <span>Employee</span></a></li>
                    @endif

                    @if(Helper::hide_menu('task', 'index')==1)
                        <li class="{!! (Helper::uri2()=='task' ? 'active' : '') !!}"><a href="{!! url('panel/task') !!}"><i class="icon-list"></i> <span>Task</span></a></li>
                    @endif


                    @if(Helper::hide_menu('groups', 'index')==1 || Helper::hide_menu('users', 'index')==1)
                    <li class="{!! (Helper::uri2()=='groups' || Helper::uri2()=='users' ? 'active' : '') !!}">
                        <a href="#"><i class="icon-users"></i> <span>Management User</span></a>
                        <ul>
                            @if(Helper::hide_menu('users', 'index')==1)
                                <li class="{!! (Helper::uri2()=='users' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/users') !!}">Users</a>
                                </li>
                            @endif
                            @if(Helper::hide_menu('groups', 'index')==1)
                                <li class="{!! (Helper::uri2()=='groups' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/groups') !!}">Groups</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!-- /main -->

                    <!-- Configuration -->
                    <li class="navigation-header"><span>Configuration</span> <i class="icon-menu" title="Configuration"></i></li>
                    @if(Helper::hide_menu('class_function', 'index')==1 || Helper::hide_menu('role_access', 'index')==1)
                    <li class="{!! (Helper::uri2()=='class_function' || Helper::uri2()=='role_access' ? 'active' : '') !!}">
                        <a href="#"><i class="icon-lock"></i> <span>Privilege Pages</span></a>
                        <ul>
                            @if(Helper::hide_menu('role_access', 'index')==1)
                                <li class="{!! (Helper::uri2()=='role_access' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/role_access') !!}">Role Access</a>
                                </li>
                            @endif
                            @if(Helper::hide_menu('class_function', 'index')==1)
                                <li class="{!! (Helper::uri2()=='class_function' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/class_function') !!}">Class Function</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @endif {{--
                    @if(Helper::hide_menu('setting', 'index')==1)
                    <li class="{!! (Helper::uri2()=='setting' || Helper::uri2()=='role_access' ? 'active' : '') !!}">
                        <a href="#"><i class="icon-gear"></i> <span>Site Setting</span></a>
                        <ul>
                            @if(Helper::hide_menu('setting', 'index')==1)
                                <li class="{!! (Helper::uri2()=='setting' && Helper::uri3()=='' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/setting') !!}">General</a>
                                </li>
                            @endif
                            @if(Helper::hide_menu('menu', 'menu')==1)
                                <li class="{!! (Helper::uri3()=='menu' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/setting/menu') !!}">Menu Management</a>
                                </li>
                            @endif
                            @if(Helper::hide_menu('setting', 'apps')==1)
                                <li class="{!! (Helper::uri3()=='apps' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/setting/apps') !!}">ENV Config</a>
                                </li>
                            @endif
                            @if(Helper::hide_menu('setting', 'editor')==1)
                                <li class="{!! (Helper::uri3()=='editor' ? 'active' : '') !!}">
                                    <a href="{!! url('panel/setting/editor') !!}">File Editor</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @endif --}}
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>