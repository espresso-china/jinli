@extends('layouts.platform-app')
@section('page-title')
编辑模板
@endsection
@section('page-header')
    {!! Breadcrumbs::render('admin-topic') !!}
@endsection
@section('button')

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <form class="form-horizontal " action="{{ route('platform.topic.updatetpl',['id'=>$info->id]) }}" method="POST">
        <div class="form-body">
            <div class="form-group">
                {!! Form::label('pc', 'pc模板', ['class' => 'col-sm-2 col-md-2 control-label']) !!}
                <div class="col-lg-10 col-md-10" >
                    <textarea id="code1" class="form-control" rows="25" name="pc_content">{!! $pc_blade !!}</textarea>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('mobile', 'mobile模板', ['class' => 'col-sm-2 col-md-2 control-label']) !!}
                <div class="col-lg-10 col-md-10" >
                    <textarea  id="code2" class="form-control" rows="25" name="mobile_content">{!! $mobile_blade !!}</textarea>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">提交</button>
                        <button type="button" class="btn default">重置</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
    @section('script')
        <script type="text/javascript">
            require(["jquery"],function () {
                $('a[href="{!! route('platform.topic.index') !!}"]').closest('.has_sub').find('.top').addClass('subdrop');
                $('a[href="{!! route('platform.topic.index') !!}"]').parent().addClass('active');
            })
        </script>
@endsection
