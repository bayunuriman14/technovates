@extends('admin.master')
@section('style')
    <style type="text/css">

    </style>
@stop
@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">{!! $title !!}</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li>
                    <a class="btn btn-default btn-xs" href="{!! url('panel/'.Helper::uri2()) !!}">
                        <b><i class="icon-arrow-left16"></i></b> Back to list
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form class="form-horizontal form-valid"  action="{{ url('panel/'.Helper::uri2().'/save') }}" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
             <input type="hidden" name="id" class="" value="{!! isset($data) ? $data->id : '' !!}" />
        <fieldset class="content-group">
            <legend class="text-bold">Data inputs</legend>

            <div class="form-group">
                <label class="control-label col-lg-2">Avatar</label>
                <div class="col-lg-10">
                    <div class="fileupload-new thumbnail" style="width: 200px;">
                    <?php $img = (!empty($data->id) && file_exists(public_path("images/users/$data->image")) ? url("images/users/$data->image") : url('images/noimage.jpg')); ?>
                       <img id="image-avatar" src="{!! (!empty($data->id) && $data->image!='' ? $img : url('images/noimage.jpg')) !!}" alt="" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Upload Avatar</label>
                <div class="col-lg-4">
                    <input class="form-control file-styled-primary" name="image" placeholder="" type="file" accept="image/*" onchange="preview(event)">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Fullname</label>
                <div class="col-lg-10">
                    <input class="form-control text-capitalize" name="fullname" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->fullname : old('fullname') !!}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Username</label>
                <div class="col-lg-10">
                    <input class="form-control text-lowercase" name="username" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->username : old('username') !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-10">
                    <input class="form-control" name="email" placeholder="" required="required" type="email" value="{!! isset($data) ? $data->email : old('email') !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Password</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="password" name="password" {!! isset($data) ? '' : 'required="required"' !!}>
                </div>
            </div>
            <div class="form-group password2">
                <label class="control-label col-lg-2">Confirm Password</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="password2" equalto="#password" {!! isset($data) ? '' : 'required="required"' !!}>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Select Group</label>
                <div class="col-lg-10">
                    <select class="select-search" tabindex="-1" required="required" name="id_group" {!! isset($data) && $data->id==1 ? 'disabled' : '' !!}>
                        @foreach($groups as $key => $value)
                            <option value="{!! $value->id !!}" {!! (isset($data) && $data->id_group==$value->id ? 'selected' : ($value->id==old('id_group') ? 'selected' : '')) !!}>{!! $value->group_name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Status User</label>
                <div class="col-lg-10">
                      <select class="select-search" tabindex="-1" required="required" name="status" {!! isset($data) && $data->id==1 ? 'disabled' : '' !!}>
                            <option value="non active" {!! (isset($data) && $data->status=='non active' ? 'selected' : ('non active'==old('status') ? 'selected' : '')) !!}>Non Active</option>
                            <option value="active" {!! (isset($data) && $data->status=='active' ? 'selected' : ('active'==old('status') ? 'selected' : '')) !!}>Active</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
        </div>
        </form>
       
    </div>
</div>



@stop
@section('script')

<script type="text/javascript">
    $(document).ready(function(){
        $('.select-search').select2();
        $(document).on('keyup','#password',function(){
            if($(this).val().length>0){
                $('#password2').attr('required','required');
            }else{
                $('#password2').removeAttr('required');
                $('.password2').removeClass('bad');
                $('.password2 .alert').remove();
            }
        }); 
    });

    function preview(event) {
        var output = document.getElementById('image-avatar');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> 
@stop