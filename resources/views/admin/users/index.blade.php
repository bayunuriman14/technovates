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
<form action="{{ url('panel/'.Helper::uri2().'/removeall') }}" class="remove-all" method="POST">
<input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
<div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{!! $title !!}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a class="btn btn-danger btn-xs remove-all-data">
                        <b><i class="icon-trash"></i></b> Remove All</a></li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="{!! url('panel/'.Helper::uri2().'/add') !!}">
                        <b><i class="icon-pen-plus"></i></b> Add data</a>
                    </li>
                </ul>
            </div>
        </div>

        
        <table class="table datatable-selection-single" style="padding:5px;" id="showdata"> 
            <thead>
                <tr>
                    <th width="10">
                        <input type="checkbox" id="check-all" class="check-all">
                    </th>
                    <th>Avatar </th>
                    <th>Fullname </th>
                    <th>Group Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-center" width="50">Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
</div>
</form>



@stop
@section('script')
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/jquery.fancybox.pack.js"></script>        
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
    $(document).ready(function(){

    var oTable = $('#showdata').DataTable( {
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [0,1,6] }
                    ],
                    "processing": true,
                    "serverSide": true,
                    "aaSorting": [[2,'asc']],
                    "iDisplayLength": 10,
                    "bLengthChange": true,
                    "bFilter": true,
                    "ajax": {
                        "url": "{!! url('panel/'.Helper::uri2().'/data') !!}",
                        "type": "GET"
                    },
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    language: {
                        search: '<span>Filter:</span> _INPUT_',
                        lengthMenu: '<span>Show:</span> _MENU_',
                        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                    },
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
        //fancybox image thumbnail
        $('.img_thumb').fancybox();
    });
</script> 
@stop