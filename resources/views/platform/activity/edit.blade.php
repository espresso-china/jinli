
<div class="col-md-10 col-md-offset-1">
    <form class="form-horizontal layui-form" action="{{ route('platform.activity.update',['id'=>$info->id]) }}" method="POST"
          data-auto="true" onsubmit="return false;">
        <div class="form-group">
            {!! Form::label('title', '活动名称', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8" >
                {!! Form::text('title', old('title',$info->title), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('pubdate', '活动日期', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                <input type="text" data-date="true" class="form-control" id="laydate" data-id="laydate" value="{!! $info->pubdate !!}" name="pubdate">
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
            {!! Form::label('price', '总劵额(元)', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-sm-6 col-xs-8" >
                {!! Form::text('price', old('price',$info->price), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('companyid', '所属公司', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::select('companyid', $companys, old('companyid',$info->companyid),['class' => 'form-control select2']) !!}
                <p class="help-block">注:没有所属公司,请<a href="">添加</a></p>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('floorid', '参与楼盘', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::select('floorid', $floors, old('floorid',$info->floorid),['class' => 'form-control select2']) !!}
                <p class="help-block">注:没有参与,请<a href="">添加</a></p>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('userid', '跟单人', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::select('userid', $users, old('userid',$info->userid),['class' => 'form-control select2']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('issms', '是否发送短信', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8" >
                <input type="radio" name="issms" value="0" title="不发送" @if($info->issms==0) checked @endif>
                <input type="radio" name="issms" value="1" title="发送" @if($info->issms==1) checked @endif>
            </div>
        </div>
        <div class="form-group" id="smstpl">
            {!! Form::label('smstpl', '短信模版', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::textarea('smstpl',$info->smstpl, ['class' => 'form-control','rows'=>3]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mark', '备注', ['class' => 'col-sm-3 col-md-3 control-label']) !!}
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::textarea('mark',old('mark',$info->mark), ['class' => 'form-control','rows'=>3]) !!}
            </div>
        </div>


        <div class="layui-form-item text-center">
            <button class="layui-btn" lay-submit="" lay-filter="form">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
</div>
