@extends('admin.master')
@section('style')
    <style type="text/css">
        .img-view>img { border:1px solid #ededed; max-height: 100px;}
    </style>
@stop
@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">{!! $title !!}</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#metadata" data-toggle="tab">Meta Data</a></li>
                <li><a href="#aditionalinfo" data-toggle="tab">Aditional Info</a></li>
                <li><a href="#mediainfo" data-toggle="tab">Media Info</a></li>
            </ul>
            
            <form class="form-horizontal form-label-left form-valid"  action="{{ url('panel/'.Helper::uri2().'/save') }}" method="post" enctype="multipart/form-data" novalidate>
             <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
             <input type="hidden" name="id" class="" value="{!! isset($data) ? $data->id : '' !!}" />

            <div class="tab-content">
                <div class="tab-pane active" id="metadata">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Author</label>
                        <div class="col-lg-10">
                            <input class="form-control text-capitalize" name="author" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->author : old('author') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="title" placeholder="" maxlength="55" required="required" type="text" value="{!! isset($data) ? $data->title : old('title') !!}">
                            <span class="info text-blue">max : 55 characters</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Keywords</label>
                        <div class="col-lg-10">
                            <input class="form-control tokenfield-teal" name="keywords" maxlength="55" placeholder="" required="required" type="text" value="{!! isset($data) ? $data->keywords : old('keywords') !!}">
                            <span class="info text-blue">max : 55 characters</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea required="required" maxlength="115" name="description" class="form-control">{!! isset($data) ? $data->description : old('description') !!}</textarea>
                            <span class="info text-blue">max : 115 characters</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Footer</label>
                        <div class="col-lg-10">
                            <textarea required="required" name="footer" class="form-control">{!! isset($data) ? $data->footer : old('footer') !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="aditionalinfo">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="email" placeholder="" required="required" type="email" value="{!! isset($data) ? $data->email : old('email') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Phone</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="phone" placeholder="" type="text" value="{!! isset($data) ? $data->phone : old('phone') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Address</label>
                        <div class="col-lg-10">
                            <textarea name="address" class="form-control">{!! isset($data) ? $data->address : old('address') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Maps</label>
                        <div class="col-lg-10">
                            <textarea name="maps" class="form-control">{!! isset($data) ? $data->maps : old('maps') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Facebook</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="facebook" placeholder="https://www.facebook.com/fbusername"  type="url" value="{!! isset($data) ? $data->facebook : old('facebook') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Twitter</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="twitter" placeholder="twitterakun"  type="text" value="{!! isset($data) ? $data->twitter : old('twitter') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Google Plus</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="gplus" placeholder="https://plus.google.com/useridgplus"  type="url" value="{!! isset($data) ? $data->gplus : old('gplus') !!}">
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="mediainfo">

                    @if(isset($data) && $data->favicon!='')
                    <div class="form-group">
                        <label class="control-label col-lg-2"></label>
                        <div class="col-lg-2">
                            <div class="fileupload-new thumbnail">
                               <img src="{!! url('images/'.$data->favicon) !!}" id="image_favicon" alt="" style="height:35px;width:35px;">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label col-lg-2">Upload Favicon</label>
                        <div class="col-lg-4">
                            <input class="form-control file-styled-primary" name="favicon" placeholder="" type="file" accept="image/*" onchange="prevfavicon(event)">
                        </div>
                    </div>

                    @if(isset($data) && $data->logo!='')
                    <div class="form-group">
                        <label class="control-label col-lg-2"></label>
                        <div class="col-lg-5">
                            <div class="fileupload-new thumbnail" style="">
                               <img src="{!! url('images/'.$data->logo) !!}" id="image_logo" alt="" style="width: 400px;">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label col-lg-2">Upload Logo</label>
                        <div class="col-lg-4">
                            <input class="form-control file-styled-primary" name="logo" placeholder="" type="file" accept="image/*" onchange="prevlogo(event)">
                        </div>
                    </div>

                    @if(isset($data) && $data->image!='')
                    <div class="form-group">
                        <label class="control-label col-lg-2"></label>
                        <div class="col-lg-5">
                            <div class="fileupload-new thumbnail" >
                               <img src="{!! url('images/'.$data->image) !!}" id="image_image" alt="" style="height: 400px;">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label col-lg-2">Upload Image</label>
                        <div class="col-lg-4">
                            <input class="form-control file-styled-primary" name="image" placeholder="" type="file" accept="image/*" onchange="previmage(event)">
                        </div>
                    </div>

                    @if(isset($data) && $data->banner!='')
                    <div class="form-group">
                        <label class="control-label col-lg-2"></label>
                        <div class="col-lg-5">
                            <div class="fileupload-new thumbnail" >
                               <img src="{!! url('images/'.$data->banner) !!}" id="image_banner" alt="" style="height: 400px;">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label col-lg-2">Upload Banner</label>
                        <div class="col-lg-4">
                            <input class="form-control file-styled-primary" name="banner" placeholder="" type="file" accept="image/*" onchange="prevbanner(event)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Video</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="video" placeholder="https://www.youtube.com/watch?v=avP5d16wEp0" type="url" value="{!! isset($data) ? $data->video : old('video') !!}">
                            <span class="info text-blue">Url from youtube</span>
                        </div>
                    </div>


                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
                
            </div>

            </form>

        </div>
    </div>
</div>


@stop
@section('script')
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/form_tags_input.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

    });
    function prevfavicon(event) {
        var output = document.getElementById('image_favicon');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    function prevlogo(event) {
        var output = document.getElementById('image_logo');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    function previmage(event) {
        var output = document.getElementById('image_image');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    function prevbanner(event) {
        var output = document.getElementById('image_banner');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> 
@stop