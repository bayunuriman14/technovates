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
                <label class="control-label col-lg-2">Group Name</label>
                <div class="col-lg-10">
                    <input class="form-control text-capitalize" name="group_name" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->group_name : old('group_name') !!}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Description</label>
                <div class="col-lg-10">
                    <textarea required="required" name="group_description" class="form-control">{!! isset($data) ? $data->group_description : old('group_description') !!}</textarea>
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

    });
</script> 
@stop