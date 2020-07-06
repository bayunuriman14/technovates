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
        <form class="form-horizontal form-valid" method="post" id="saveemployee">
         <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
         <input type="hidden" name="id" value="{!! $data->id !!}">
            <fieldset class="content-group">

            <div class="form-group">
                <label class="control-label col-lg-2">NIP</label>
                <div class="col-lg-6">
                    <input class="form-control" name="nip" type="text" value="{!! $data->nip !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Name</label>
                <div class="col-lg-6">
                    <input class="form-control" name="name" type="text" value="{!! $data->name !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Status User</label>
                <div class="col-lg-6">
                    <select class="select-search"required="required" name="status">
                        <option value="active" {!! ($data->status =='active' ? 'selected="selected"' :'') !!}>Active</option>
                        <option value="non active" {!! ($data->status =='non active' ? 'selected="selected"' :'') !!}>Non Active</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Address</label>
                <div class="col-lg-6">
                    <input class="form-control" name="address" value="{!! $data->address !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-6">
                    <input class="form-control" name="email" required="required" type="email" value="{!! $data->email !!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Gender</label>
                <div class="col-lg-6">
                    <select class="select-search"required="required" name="gender">
                        <option value="active" {!! ($data->status =='Male' ? 'selected="selected"' :'') !!}>Female</option>
                        <option value="non active" {!! ($data->status =='Female' ? 'selected="selected"' :'') !!}>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Birth</label>
                <div class="col-lg-6">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                      <input type="text" class="form-control pickadate" id="birth" data-date-format="yyyy-mm-dd" name="birth" placeholder="06-12-2017" data-value="{{ $data->birth }}">
                  </div>                    
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Photo</label>
                <div class="col-lg-6">
                    <input class="form-control file-styled-primary" id="photoFile"  name="photo" type="file" accept="image/*" onchange="preview(event)">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Preview</label>
                <div class="col-lg-10">
                    <div class="fileupload-new thumbnail" style="width: 250px;">
                       <?php $img = (!empty($data->id) && file_exists(public_path("images/users/$data->image")) ? url("images/users/$data->photo") : url('images/noimage.jpg')); ?>
                       <img id="photo" name="photo" src="{!! (!empty($data->id) && $data->photo!='' ? $img : url('images/noimage.jpg')) !!}" alt="" />
                    </div>
                </div>
            </div>

            <div class="form-group col-lg-2">
                <button type="button" id="button_save" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>


           
        </fieldset>

            

        </form>
       
    </div>
</div>





@stop
@section('script')

<!-- /ckeditor -->
<!-- Theme JS files -->
<script type="text/javascript" src="{!! url('lib/plugins') !!}/editors/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{!! url('lib/plugins') !!}/editors/ckeditor/editor_ckeditor.js"></script>
<!-- /theme JS files -->

<script type="text/javascript">

    function preview(event) {
        var output = document.getElementById('photo');
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    $(document).ready(function(){
        $('.pickadate').pickadate({
          format: 'yyyy/mm/dd',
          formatSubmit: 'yyyy/mm/dd'
        })
        $('#button_save').on('click',function(e) {
            var $this = $('#saveemployee')[0];
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

</script> 
@stop