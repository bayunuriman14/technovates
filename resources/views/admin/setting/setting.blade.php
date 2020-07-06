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
                    <a class="btn btn-default btn-xs" href="{!! url('panel') !!}">
                        <b><i class="icon-home"></i></b> Back to home
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form class="form-horizontal form-label-left form-valid"  action="{{ url('panel/'.Helper::uri2().'/saveconfig') }}" method="post" novalidate>
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
        <fieldset class="content-group">
            <legend class="text-bold">Data inputs</legend>

            <div class="form-group">
                <label class="control-label col-lg-2">Apps Configuration</label>
                <div class="col-lg-10">
                    <textarea rows="20" id="textarea" required="required" name="config" class="col-md-12 col-xs-12">{!! isset($contents) ? $contents : '' !!}</textarea>
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