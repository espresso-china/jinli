<div class="col-md-10 col-md-offset-1">
    <form class="layui-form form-horizontal" action="{{ route('platform.company.update',['id'=>$info->id]) }}" method="POST">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('title', '专题名称', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-lg-8 col-md-8" >
                    {!! Form::text('title', old('title',$info->title), ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('share_title', '分享标题', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('share_title', old('share_title',$info->share_title), ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('share_url', '分享url', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('share_url', old('share_url',$info->share_url), ['class' => 'form-control','placeholder'=>'可为空，为空分享原文']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('share_img', '分享图片', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-lg-8 col-md-8">
                    <div class="input-group">
                        <input type="text" id="logo" name="share_img" value="{!! $info->share_img !!}" class="form-control" required="required">
                        <span class="input-group-btn">
                        <button class="btn btn-primary waves-effect waves-light" data-file="one" data-type="jpg,png,gif"
                                data-field="img" type="button">上传图片</button>
                    </span>
                        <input type="hidden" name="img" onchange="$('#logo').val($(this).attr('data'))" value="" data="">
                    </div>
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('share_desc', '分享描述', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-lg-8 col-md-8">
                    {!! Form::textarea('share_desc',old('share_desc',$info->share_desc), ['class' => 'form-control','rows'=>3]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('ismobile', '是否有手机端', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-lg-8 col-md-8" >

                    <div class="">
                        <input type="radio" name="ismobile" value="1" @if($info->ismobile==1) checked @endif title="有">
                        <input type="radio" name="ismobile" value="0" @if($info->ismobile==0) checked @endif title="无">
                    </div>

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ispc', '是否有PC端', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
                <div class="col-lg-8 col-md-8" >
                    <div class="">
                        <input type="radio" name="ispc" value="1" @if($info->ispc==1) checked @endif title="有">
                        <input type="radio" name="ispc" value="0"  @if($info->ispc==1) checked @endif title="无">
                    </div>
                </div>
            </div>
            <div class="layui-form-item text-center">
                <button class="layui-btn" lay-submit="" lay-filter="form">提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>