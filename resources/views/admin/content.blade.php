@extends('admin.master')
@section('style')
    <style type="text/css">
        
    </style>
@stop
@section('content')


<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Charts</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        
            {!! $chart->render() !!}
    </div>
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Charts</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        
            {!! $chartline->render() !!}
    </div>


</div>


<!-- <div class="row">

    @if(Helper::hide_menu('groups', 'index')==1)
    <div class="col-lg-3">
        <div class="panel bg-primary-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <span class="heading-text">
                        <i class="icon-menu3"></i>
                    </span>
                </div>

                <h3 class="no-margin">{!! Helper::table('employees')->count(); !!}</h3>
                Data Employee
                <div class="text-muted text-size-small">List Employees</div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            </div>
        </div>
    </div>
    @endif

    @if(Helper::hide_menu('users', 'index')==1)
    <div class="col-lg-3">

        <div class="panel bg-grey-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <span class="heading-text">
                        <i class="icon-indent-increase2"></i>
                    </span>
                </div>

                <h3 class="no-margin">{!! Helper::table('users')->count(); !!}</h3>
                Data Task
                <div class="text-muted text-size-small">List data tasks</div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            </div>
        </div>
    </div>
    @endif



</div> -->


@stop


@section('script')

{!! Charts::assets() !!}


<script type="text/javascript">
    

    $(document).ready(function(){
        $('.pickadate').pickadate({
          format: 'yyyy/mm/dd',
          formatSubmit: 'yyyy/mm/dd'
        })
        $('#button_save').on('click',function(e) {
            var $this = $('#savetask')[0];
            var formData = new FormData($this);
            e.preventDefault();
            createOverlay("Proses...");
            $.ajax({
                type  : "POST",
                url   : "{!! url('panel/'.Helper::uri2().'/save') !!}",
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(result) {
                    var data = JSON.parse(result);

                    if(data["STATUS"] == "SUCCESS") {
                        notif_success(data["MESSAGE"]);
                        setTimeout(function(){
                            gOverlay.hide();
                            window.location = "{!! url('panel/'.Helper::uri2()) !!}";
                        }, 300);
                    }
                    else {
                        //sweetAlert("Pesan Kesalahan", data["MESSAGE"], "error");
                        gOverlay.hide();
                        notif_error(data["MESSAGE"]);
                    }
                },
                error : function(error) {
                    gOverlay.hide();
                    //alert("Network/server error\r\n" + error);
                    notif_error("Network/server error");
                }
            });
        });
    });

    function preview(event) {
        var output = document.getElementById('photo');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> 

@stop