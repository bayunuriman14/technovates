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
        <form class="form-horizontal form-valid" method="post" id="savetask">
         <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
         <input type="hidden" name="id" value="{!! $data->id !!}">
            <fieldset class="content-group">

            <div class="form-group">
                <label class="control-label col-lg-2">Date</label>
                <div class="col-lg-6">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                      <input type="text" class="form-control pickadate" id="date" data-date-format="yyyy-mm-dd" name="date" data-value="{{ $data->date }}">
                  </div>                    
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Status Task</label>
                <div class="col-lg-6">
                      <select class="select-search"required="required" name="status_task">
                        <option value="Waiting" {!! ($data->status =='Waiting' ? 'selected="selected"' :'') !!}>Waiting</option>
                        <option value="Process" {!! ($data->status =='Process' ? 'selected="selected"' :'') !!}>Process</option>
                        <option value="Done" {!! ($data->status =='Done' ? 'selected="selected"' :'') !!}>Done</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Employee</label>
                <div class="col-lg-6">
                      <select class="select-search"required="required" name="id_employee">
                            <option value="">-- Select Employee --</option>
                            @if(isset($employees))
                                @foreach($employees as $key => $value)
                                    @if( $value->id == $data->id_employee )
                                    <option value="{!! $value->id !!}" selected>{!! $value->name !!}</option>
                                    @else
                                    <option value="{!! $value->id !!}">{!! $value->name !!}</option>
                                    @endif
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Task</label>
                <div class="col-lg-6">
                    <input class="form-control" name="task" type="text" required value="{!! $data->task !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Information</label>
                <div class="col-lg-6">
                    <textarea rows="5" cols="5" class="form-control" name="information">{!! $data->information !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Latitude</label>
                <div class="col-lg-6">
                    <input class="form-control" name="latitude" id="latitude" type="text" readonly value="{!! $data->latitude !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Longitude</label>
                <div class="col-lg-6">
                    <input class="form-control" name="longitude" id="longitude" type="text" readonly value="{!! $data->longitude !!}">
                </div>
            </div>

            <div id="map_canvas"></div>

            <br>

            <?php $id_group = session('admin_session')->id_group; ?>
              @if($id_group=='1' || $id_group=='8')

            <div class="form-group col-lg-2">
                <button type="button" id="button_save" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>

            @endif


           
        </fieldset>

            

        </form>
       
    </div>
</div>







@stop
@section('script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMm8Okovi4yn1HE6SedvapFaEVznRzjGU&callback=initialize" async defer></script>

<style type="text/css">
    #map_canvas{
        width: 100%;
        height: 400px;
    }
</style>

<script type="text/javascript">
    /*start map*/
    var map;
    var poly;
    var markers;

    function initialize() {
        var myLatLng = new google.maps.LatLng('{!! $data->latitude !!}', '{!! $data->longitude !!}');
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
            position: new google.maps.LatLng('{!! $data->latitude !!}', '{!! $data->longitude !!}'),
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
                url   : "{!! url('panel/'.Helper::uri2().'/edit') !!}",
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