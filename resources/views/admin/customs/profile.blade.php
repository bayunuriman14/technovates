@extends('admin.master')
@section('style')
    <!--funcybox -->
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-buttons.css"/>
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-thumbs.css"/>
    <style type="text/css">
        .fancybox-close:after {
            content: none;
        }
    </style>
@stop
@section('content')
<!-- Toolbar -->
<div class="navbar navbar-default navbar-xs content-group">
    <ul class="nav navbar-nav visible-xs-block">
        <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-filter">
        <ul class="nav navbar-nav element-active-slate-400">
            <li class="active"><a href="#user_profile" data-toggle="tab"><i class="icon-user position-left"></i> Profile information</a></li>
            <li><a href="#change_password" data-toggle="tab"><i class="icon-key position-left"></i> Account settings </a></li>
        </ul>

        <div class="navbar-right">
            
        </div>
    </div>
</div>
<!-- /toolbar -->

<!-- User profile -->
<div class="row">
    <div class="col-lg-9">
        <div class="tabbable">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="user_profile">
                    <!-- Profile info -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Profile information</h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-valid"  action="{{ url('panel/updateprofile') }}" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
                             <input type="hidden" name="id" class="" value="{!! isset($data) ? $data->id : '' !!}" />

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Fullname</label>
                                            <input class="form-control text-capitalize" name="fullname" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->fullname : old('fullname') !!}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Username</label>
                                            <input class="form-control text-lowercase" readonly="readonly" name="username" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->username : old('username') !!}">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Email Akun</label>
                                            <input type="email" name="email" required="required" class="form-control" value="{!! isset($data) ? $data->email : old('email') !!}">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Status</label>
                                            <select class="select-search form-control" tabindex="-1" required="required" disabled>
                                                <option value="non active" {!! (isset($data) && $data->status=='non active' ? 'selected' : ('non active'==old('status') ? 'selected' : '')) !!}>Non Active</option>
                                                <option value="active" {!! (isset($data) && $data->status=='active' ? 'selected' : ('active'==old('status') ? 'selected' : '')) !!}>Active</option>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Group</label>
                                            <select class="select-search form-control" tabindex="-1" required="required" disabled>
                                                @foreach($groups as $key => $value)
                                                    <option value="{!! $value->id !!}" {!! (isset($data) && $data->id_group==$value->id ? 'selected' : ($value->id==old('id_group') ? 'selected' : '')) !!}>{!! $value->group_name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Upload Avatar</label>
                                            <input class="form-control file-styled-primary" name="image" placeholder="" type="file" accept="image/*" onchange="preview(event)">
                                        </div>
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save change <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->
                </div>

                <div class="tab-pane fade" id="change_password">
                     <!-- Account settings -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Account settings</h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-valid-2"  action="{{ url('panel/changepassword') }}" method="POST">
                             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
                             <input type="hidden" name="id" class="" value="{!! isset($data) ? $data->id : '' !!}" />

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>New password</label>
                                            <input id="password" type="password" name="password" placeholder="New password" class="form-control" required="required">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Repeat password</label>
                                            <input type="password" placeholder="Repeat new password" class="form-control" required="required" equalto="#password">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Change Password <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /account settings -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">

        <!-- thumbnail    -->
        <?php 
            $image = $data->image;
            $path = !empty($data->image) ? public_path("images/users/$image") : ""; 
        ?>
        <div class="thumbnail">
            <div class="thumb thumb-rounded thumb-slide">
                <a href="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}" alt="" class="img_thumb">
                    
                    <img src="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}" alt="{!! $data->fullname !!}" id="image-avatar">
                </a>
            </div>
        
            <div class="caption text-center">
                <h6 class="text-semibold no-margin">{!! $data->fullname !!} <small class="display-block">{!! $data->email !!}</small></h6>
            </div>
        </div>
         <!-- /thumbnail    -->

    </div>
</div>
<!-- /user profile -->



@stop
@section('script')
<!-- Add fancybox -->
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/jquery.fancybox.pack.js"></script>        
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-media.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.img_thumb').fancybox();
        $('.form-valid-2').validate();
    });
    function preview(event) {
        var output = document.getElementById('image-avatar');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> 
@stop