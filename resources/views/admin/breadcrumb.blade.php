<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-{!! empty(Helper::uri2()) ? 'home' : 'list' !!} list position-left"></i> 
            {!! empty(Helper::uri2()) ? '<span class="text-semibold">Home</span> - Dashboard Area' : ucwords(str_replace('_', ' ', Helper::uri2())) !!}
            </h4>
        </div>

        <div class="heading-elements hide">
            <div class="heading-btn-group">
                
            </div>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{!! url('panel') !!}"><i class="icon-home2 position-left"></i> Home</a></li>
            @if(!empty(Helper::uri3()))
            <li>
                <a href="{!! url('panel/'.Helper::uri2()) !!}">
                    {!! ucwords(str_replace('_', ' ', Helper::uri2())) !!}
                </a>
                <li class="active">{!! ucwords(Helper::uri3()) !!}</li>
                @if(!empty(Helper::uri4()))
                    <li class="active">{!! ucwords(Helper::uri4()) !!}</li>
                @endif
        @else
            @if(!empty(Helper::uri2()))
                <li class="active">{!! ucwords(str_replace('_', ' ', Helper::uri2())) !!}</li>
            @else
                <li class="active">Dashboard</li>
            @endif
        @endif

        </ul>

    </div>
</div>