
<div class="col-md-12">
    <form class="form-horizontal layui-form" action="{{ route('platform.floor.update',['id'=>$id]) }}" method="POST"
          data-auto="true" onsubmit="return false;">
        <div class="form-group">
            <label class="col-sm-3 control-label">名称 <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="{!! old('floorname',$info->name) !!}" />
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('type', '类型', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-md-6 col-lg-6 col-xs-6">
                {!! Form::select('type',App\Models\Floor::getTypes(), old('type',$info->type), ['class'=>'form-control','placeholder'=>'选择类型','lay-verify'=>'required','id'=>'type']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">地址</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="{{ old('address',$info->address) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">开发商</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kfs" value="{{ old('kfs',$info->kfs) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">电话</label>
            <div class="col-sm-6">
                <input type="text"  data-toggle="tooltip" name="tel"
                       data-trigger="hover" class="form-control tooltips"
                       data-original-title="联系电话" value="{{ old('tel',$info->tel) }}">
            </div>
        </div>
        <div class="layui-form-item text-center">
            <button class="layui-btn" lay-submit="" lay-filter="form">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="{!! asset('statics/js/plugins/area.js') !!}"></script>
<script type="text/javascript">
    require(["jquery"],function () {

    })
</script>
