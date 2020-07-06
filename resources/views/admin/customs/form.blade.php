@extends('admin.master')
@section('style')
    <style type="text/css">

    </style>
@stop
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{!! $title !!}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="btn btn-default" href="{!! url('panel/'.Helper::uri2()) !!}"><i class="fa fa-arrow-circle-o-left"></i> Back to list</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

             <form class="form-horizontal form-label-left form-valid"  action="{{ url('panel/'.Helper::uri2().'/save') }}" method="post" novalidate>
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
             <input type="hidden" name="id" class="" value="{!! isset($data) ? $data->id : '' !!}" />
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Group Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="group_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="group_name" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->group_name : old('group_name') !!}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="group_description" class="form-control col-md-7 col-xs-12">{!! isset($data) ? $data->group_description : old('group_description') !!}</textarea>
                        </div>
                    </div>

                    <!-- Clickable optgroups -->
                    <div class="form-group">
                        <label>Select Multiple</label>
                        <div class="multi-select-full">
                            <select class="multiselect-clickable-groups" name="type[]" multiple="multiple">
                                <optgroup label="Mathematics">
                                    <option value="analysis">Analysis</option>
                                    <option value="algebra">Linear Algebra</option>
                                    <option value="discrete">Discrete Mathematics</option>
                                </optgroup>
                                <optgroup label="Computer Science">
                                    <option value="programming">Introduction to Programming</option>
                                    <option value="complexity">Complexity Theory</option>
                                    <option value="software">Software Engineering</option>
                                </optgroup>
                                <optgroup label="Physics">
                                    <option value="mechanics">Classical Mechanics</option>
                                    <option value="magnetism">Electromagnetism</option>
                                    <option value="quantum">Quantum Mechanics</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <!-- /clickable optgroups -->
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Datepicker</label>
                            <input type="text" name="" class="datepicker-custom form-control" value="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label>Timepicker</label>
                            <input type="text" name="" class="timepicker-custom form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="item form-group">
                    	<label>Full Editor</label>
                    	<textarea name="post" class="fulleditor"></textarea>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{!! url('panel/'.Helper::uri2()) !!}" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>


        </div>
    </div>
</div>

@stop
@section('script')
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/form_multiselect.js"></script>


<script src="{!! url('lib/plugins') !!}/datetimepicker/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/datetimepicker/jquery.datetimepicker.css"/ >



{{-- Code highlighting plugin for TinyMCE --}}
{{-- https://github.com/ypopovych/tinymce-codehighlight-plugin --}}
<script type="text/javascript" src="{!! url('lib') !!}/tinymce/tinymce.min.js"></script>
<script src="{!! url('lib') !!}/tinymce/plugins/moxiemanager/js/moxman.loader.min.js"></script>
        <script type="text/javascript">
        var base_url = "{!! url('') !!}";
            tinymce.init({
                selector: "textarea.fulleditor",
                height: 300,
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker moxiemanager imagetools codehighlight qrcode youtube",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor"
               ],
               toolbar: "insertfile undo redo | styleselect fontsizeselect fontselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image codehighlight qrcode youtube | print preview media fullpage | forecolor backcolor emoticons",
                theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
                font_size_style_values: "12px,13px,14px,16px,18px,20px",
                tools: "inserttable",
                doctype : "<!DOCTYPE html>",
                image_advtab: true,
                moxiemanager_image_settings : { 
                    view : 'thumbs', 
                    extensions : 'jpg,png,gif'
                }
            });
        </script>
<script type="text/javascript">
    $(document).ready(function(){
        jQuery('.datepicker-custom').datetimepicker({
          format:'Y-m-d',
          timepicker:false
        });

        jQuery('.timepicker-custom').datetimepicker({
          format:'H:i',
          datepicker:false
        });
    });
</script> 
@stop