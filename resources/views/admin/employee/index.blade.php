@extends('admin.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5"/>
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"/>
    <style type="text/css">
        .fancybox-close:after {
            content: none;
        }
    </style>
@stop
@section('content')
<input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
<!-- Scrollable datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
            <h5 class="panel-title">{!! $title !!}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li>
                        <a class="btn btn-info btn-xs" href="{!! url('panel/'.Helper::uri2().'/add') !!}">
                        <b><i class="icon-pen-plus"></i></b> Add data</a>
                    </li>
                </ul>
            </div>
        </div>

    <table class="table datatable-basic">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Photo</th>
                <th class="text-center" width="15%">Actions</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($employees) && count($employees) > 0)
                    @foreach ($employees as $item)
                  <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                          <div class="btn-group btn-group-xs" data-toggle="buttons">
                            @if($item->status=='active')
                            <a class='btn btn-info !!} !!}'>
                                Active
                            </a>
                            @else
                            <a class='btn btn-warning !!} !!}'>
                                Non Active
                            </a>
                            @endif
                        </div>
                        </td>
                        <td>
                          <?php $path = !empty($item->photo) ? public_path("images/users/$item->photo") : ""; ?>
                          <a class="img_thumb fancybox" href='{!! (file_exists($path) ? url("images/users/$item->photo") : url("images/noimage.jpg"))  !!}'>
                              <img src='{!! (file_exists($path) ? url("images/users/$item->photo") : url("images/noimage.jpg"))  !!}' style="width:50px;border:1px solid #ededed;" />
                          </a>
                        </td>
                        <td class="text-center">
                            <a href="{!! url('panel/'.Helper::uri2().'/edit') !!}/{!! $item->id !!}" style="color: #fff;"><button class="btn btn-success btn-xs"><i class="icon-pencil5"></i> Edit</button></a> 
                            <button class="btn btn-danger btn-xs" onclick="deleteData('{!! $item->id !!}')"><i class="icon-trash"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach
            @endif       
            </tbody>
          </table>
</div>
<!-- /scrollable datatable -->



@stop
@section('script')
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/jquery.fancybox.pack.js"></script>        
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
    $(document).ready(function(){

    $(".fancybox").fancybox({
      'width': 100,
      'height':100, 
      'autosize': false   // tell the script to create an iframe
    });

    $('.datatable-basic').DataTable( {
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    language: {
                        search: '<span>Filter:</span> _INPUT_',
                        lengthMenu: '<span>Show:</span> _MENU_',
                        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                    },
                    "order": [[ 3, "desc" ]],
                    drawCallback: function () {
                        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                    },
                    preDrawCallback: function() {
                        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                    },
                    fnDrawCallback : function( oSettings ) {
                        $('.tip').tooltip();
                    },
                });
    });

    function deleteData(id) {
    swal({
      title: "Konfirmasi",
      text: "Hapus data ini ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya",
      cancelButtonText: "Batal",
      closeOnConfirm: true,
      html: true
    },
    function(){ 
      createOverlay("Proses...");
      if(id != "") {
          $.ajax({
            type  : "GET",
            url   : "{!! url('panel/employee/delete') !!}",
            data  : {
              "_token": "{{ csrf_token() }}",
              "id": id
            },
            success : function(result) {
              var data = JSON.parse(result);

              if(data["STATUS"] == "SUCCESS") {
                notif_info(data["MESSAGE"]);
                setTimeout(function(){
                    window.location = "{!! url('panel/'.Helper::uri2()) !!}";
                }, 300);
              }
              else {
                notif_info(data["MESSAGE"]);
              }
            },
            error : function(error) {
              gOverlay.hide();
              alert("Network/server error\r\n" + error);
            }
          });
        }
    });
  }
    


</script> 
@stop