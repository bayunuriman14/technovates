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
    /*start map*/
    var map;
    var poly;
    var markers;

    function initialize() {
        var myLatLng = new google.maps.LatLng(-6.229042721885163, 106.84079505300843);
        var mapOptions = {
            zoom: 12,
            minZoom: 10,
            center: myLatLng
        };

        var start = [40.722283, -74.014893];
        var end = [51.508742, -0.131836];

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        map.addListener('click', addLatLng);

        /*marker awal*/
        markers = new google.maps.Marker({
            position: new google.maps.LatLng(-6.229042721885163, 106.84079505300843),
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        google.maps.event.addListener(markers,'dragend',function(event) {
            repath();
        });
    }

    function addLatLng(event) {
        var longlat = String(event.latLng);
        longlat = longlat.replace("(","");
        longlat = longlat.replace(")","");
        longlat = longlat.split(", ");
        $('#latitude').val(longlat[0]);
        $('#longitude').val(longlat[1]);

        markers.setMap(null);
        var marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        markers = marker;

        google.maps.event.addListener(marker,'dragend',function(event) {
            repath();
        });
        google.maps.event.addListener(marker, "click", function (point) {
            delMarker();
        });
        google.maps.event.addListener(marker, "rightclick", function (point) {
            delMarker();
        });
    }

    function repath(){
        str_path1 = '';
        str_path2 = '';
        str_path1 = markers.getPosition().lat();
        str_path2 = markers.getPosition().lng();
        $('#latitude').val(str_path1);
        $('#longitude').val(str_path2);
    }

    var delMarker = function () {
        markers.setMap(null);
        $('#latitude').val('');
        $('#longitude').val('');
    }
    /*end of start map*/


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