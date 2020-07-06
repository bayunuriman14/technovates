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
                    <a class="btn btn-default btn-xs" href="{!! url('panel/'.Helper::uri2().'/reload') !!}"><b><i class="icon-sync spinner"></i></b> Reload Class Functions</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form class="form-horizontal form-label-left form-valid"  action="{{ url('panel/'.Helper::uri2().'/save') }}" method="post" novalidate>
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />


                <div class="col-xs-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left nav-tabs-highlight">
                        <?php $i = 1; ?>
                        @foreach($all_access as $id_group => $access)
                            <li class="{!! ($i==1 ? 'active' : '') !!}">
                                <a href="#tab{!! $id_group !!}" data-toggle="tab" aria-expanded="{!! ($i==1 ? 'true' : '') !!}"><i class="icon-key"></i> Role of {!! Helper::groupbyid($id_group)->group_name !!}</a>
                            </li>
                        <?php $i++; ?>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php $i = 1; ?>
                        @foreach($all_access as $id_group => $access)
                        <div class="tab-pane {!! ($i==1 ? 'active no' : '') !!}" id="tab{!! $id_group !!}">
                                <h4 class="text-right alert alert-primary">
                                    <strong>Role of {!! Helper::groupbyid($id_group)->group_name !!}</strong>
                                </h4>
                            @foreach($classfunction as $class => $function)
                                <div class="col-xs-12">
                                    <h4>
                                        <input type="checkbox" class="check_all" data-key="{!! $class.'-'.$id_group !!}" {!! Helper::count_function($id_group, $function) !!}/> 
                                                    {!! ucwords(str_replace('_', ' ', $class)) !!}
                                    </h4><hr />
                                    <div class="col-md-12">
                                    @foreach($function as $id => $item)
                                        <div class="col-xs-2">
                                            <input type="checkbox" class="check_id{!! $class.'-'.$id_group !!}" name="id_access[{!! $id_group !!}][]" value="{!! $id !!}" {!! (isset($access[$id]) ? 'checked' : '') !!}/> {!! $item !!}
                                        </div>
                                    @endforeach
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save Change <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>

                </form>

    </div>
</div>






@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.check_all',function(){
            var key = $(this).data('key');
            $(".check_id"+key).prop("checked" , this.checked);
        });
    });
</script> 
@stop