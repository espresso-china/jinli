
<div class="col-md-10">
    <form class="form-horizontal layui-form" action="{{ route('platform.works.update',['id'=>$info->id]) }}" method="POST"
          data-auto="true" onsubmit="return false;">
        <div class="form-group">
            {!! Form::label('type', '作品类型', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('type',App\Models\DesignerWorks::getTypes(), old('type',$info->type), ['class'=>'form-control','id'=>'type','lay-ignore'=>'true']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('stype', '所属方式', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('stype',App\Models\DesignerWorks::getStypes(), old('stype',$info->stype), ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group" id="projecttype" @if($info->projecttype==0) style="display: none" @endif>
            {!! Form::label('projecttype', '所属类', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-6 col-lg-8 col-xs-8">
                {!! Form::select('projecttype',App\Models\DesignerWorks::getPtypes(), old('projecttype'), ['class'=>'form-control','lay-verify'=>'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('name', '作品名称', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8" >
                {!! Form::text('name', old('name',$info->name), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('thumb', '作品封面', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" id="cover" name="thumb" value="{!! $info->thumb !!}" class="form-control"
                           required="required">
                    <span class="input-group-btn">
                                <button class="btn btn-primary waves-effect waves-light" data-file="one"
                                        data-type="jpg,png,gif" data-field="img" type="button"
                                        data-url="{!! route('platform.uploader.index') !!}">上传图片</button>
                            </span>
                    <input type="hidden" name="img" onchange="$('#cover').val($(this).attr('data'))"
                           value="" data="">
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('remark', '标签', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::textarea('remark',old('remark',$info->remark), ['class' => 'form-control','rows'=>3]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('score', '分值', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8" >
                {!! Form::text('score', old('score',$info->score), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="layui-form-item text-center">
            <button class="btn btn-info" lay-submit="" lay-filter="form">立即提交</button>
            <button type="reset" class="btn btn-white">重置</button>
        </div>
    </form>
</div>
<script>
    require(["jquery"],function () {
        $('#type').change(function () {
            if($(this).val()=='{!! App\Models\DesignerWorks::TYPE_G !!}'){
                $('#projecttype').show()
            }else{
                $('#projecttype').hide()
            }
        })
    });
</script>