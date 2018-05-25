
<div class="col-md-10 col-md-offset-1">
    <form class="form-horizontal layui-form" action="{{ route('platform.designer.store') }}" method="POST"
          data-auto="true" onsubmit="return false;">
        <div class="form-group">
            {!! Form::label('name', '设计师姓名', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8" >
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('city', '所属城市', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-sm-8 col-md-8 col-xs-8">
                <select name="city" lay-verify="required">
                    <option value="长沙">长沙</option>
                    <option value="北京">北京</option>
                    <option value="上海">上海</option>
                    <option value="广州">广州</option>
                    <option value="深圳">深圳</option>
                    <option value="杭州">杭州</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('companyid', '所属公司', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::select('companyid', $companys, old('companyid'),['class' => 'form-control select2']) !!}
                <p class="help-block">注:没有所属公司,请<a href="">添加</a></p>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('cover', '设计师照片', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" id="cover" name="cover" value="" class="form-control"
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
            {!! Form::label('ewm', '设计师二维码', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" id="cover2" name="ewm" value="" class="form-control" >
                    <span class="input-group-btn">
                                <button class="btn btn-primary waves-effect waves-light" data-file="one"
                                        data-type="jpg,png,gif" data-field="img2" type="button"
                                        data-url="{!! route('platform.uploader.index') !!}">上传图片</button>
                            </span>
                    <input type="hidden" name="img2" onchange="$('#cover2').val($(this).attr('data'))"
                           value="" data="">
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('remark', '备注', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::textarea('remark',old('remark'), ['class' => 'form-control','rows'=>3]) !!}
            </div>
        </div>


        <div class="layui-form-item text-center">
            <button class="layui-btn" lay-submit="" lay-filter="form">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
</div>
