@extends('admin.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{!! url('lib/plugins/filetree') !!}/jqueryFileTree.css">
    <style type="text/css">

    </style>
    <style type="text/css">
        .example {
        float: left;
        margin: 15px;
    }

    .demo {
        width: auto;
        min-height: 500px;
        border-top: solid 1px #BBB;
        border-left: solid 1px #BBB;
        border-bottom: solid 1px #FFF;
        border-right: solid 1px #FFF;
        background: #FFF;
        overflow: scroll;
        padding: 5px;
    }
    .sh { display: block!important; }
    .hd { display: none;}
    .cek-folder, .edit_file { cursor: pointer;}
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
        <form class="form-horizontal form-label-left form-valid"  action="{{ url('panel/'.Helper::uri2().'/savefileeditor') }}" method="post" novalidate>
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
        <fieldset class="content-group">
            <legend class="text-bold">Data inputs</legend>

            <div class="form-group">
                <label class="control-label col-lg-3">Document Root</label>
                <div class="col-lg-9">
                    <label class="">Path File : <b class="text_label">/</b></label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">
                     <div id="show-data" class="demo show-data"></div>
                </label>
                <div class="col-lg-9">
                    <input type="hidden" name="file_name" class="form-control file_name">
                    <textarea name='content' rows='25' id='' class='form-control content-show markItUp'></textarea>   
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
        $.get("{!! url('panel/setting/filemanager') !!}", function(data){
            $('.show-data').html(data);
        });

        $(document).on('click', '.cek-folder', function(){
            $(this).parent('li').toggleClass("collapsed", 4000).toggleClass("expanded", 4000);
            var root = $(this).parent('li').data('root');
            var key = $(this).parent('li').data('key');
            console.log(root);
            $('.dh_'+key).toggleClass("sh");
            $.get("{!! url('panel/setting/cekfile') !!}/"+root, function(data){
                $('.dh_'+key).html(data);
            });
        });

        $(document).on('click','.edit_file',function(){
            var file = $(this).data("file");
            $.get("{!! url('panel/setting/showcontent') !!}/"+file, function(data){
                console.log(data.content);
                $('.text_label').text(data.file);
                $('.edit_file_show').show();
                $('.file_name').val(data.file);
                $('.content-show').val(data.content);
            });
        });

        $(document).on('click','.sub-cancel',function(){
            $('.edit_file_show').hide();
        });



        $('.save-change').click(function () {
            $('#show-modal-edit').modal('show');
        });
        $(document).on('click','.save-all-class', function(){
            $('.save-theme-change').submit();
        });
    });
</script> 
@stop