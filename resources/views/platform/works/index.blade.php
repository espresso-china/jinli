@extends('layouts.platform-app')
@section('page-title')
    设计师作品列表
@endsection
@section('page-header')
    {!! Breadcrumbs::render('admin-works') !!}
@endsection
@section('button')
    <button class="btn btn-default dropdown-toggle waves-effect waves-light" data-title="新增作品"
            data-modal="{!! route('platform.works.create',['designerid'=>$id]) !!}" data-area="600px">
        <i class="fa fa-plus"></i> 新增作品
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <table class="table table-striped table-bordered table-hover" id="gzh-table">
                    <tr>
                        <th width="40" class="text-center">ID</th>
                        <th width="150" class="text-center">效果图</th>
                        <th> 作品名称 </th>
                        <th width="150"> 标签 </th>
                        <th>类别</th>
                        <th class="text-center"  width="200" > 最后更新时间 </th>
                        <th width="150"  class="text-center"> 操作 </th>
                    </tr>
                    @foreach ($list as  $v)
                        <tr role="row">
                            <td class="text-center"> {{ $v->id}} </td>
                            <td class="text-center">
                                <img src="{!! asset($v->thumb) !!}" alt="" width="100" data-tips-image="{!! asset($v->thumb) !!}" data-width="600px">
                            </td>
                            <td>
                                <a href="javascript:;" data-href="{!! route('platform.works.show',['id'=>$v->id]) !!}" class="show">{{ $v->name}} </a>
                            </td>
                            <td class="text-center">
                                {!! $v->remark !!}
                            </td>
                            <td>
                                {!! App\Models\DesignerWorks::getTypes($v->type) !!}-
                                {!! App\Models\DesignerWorks::getStypes($v->stype) !!}
                                @if($v->type==App\Models\DesignerWorks::TYPE_G)
                                    -{!! App\Models\DesignerWorks::getPtypes($v->projecttype) !!}
                                @endif
                            </td>
                            <td class="text-center">
                                {!! $v->updated_at!!}
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm btn-group-solid">
                                    {{--<a class="btn btn-default btn-sm">--}}
                                        {{--<i class="fa fa-search"></i> 查看--}}
                                    {{--</a>--}}
                                    <a class="btn btn-purple btn-sm" data-modal="{{ route('platform.works.edit',['id' => $v->id]) }}" data-title="编辑信息" data-area="700px" href="javascript:;">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <button class="btn btn-white waves-effect" type="button" data-update="{!! $v->id !!}"
                                            data-action="{!! route('platform.works.destroy') !!}" title="确定要删除该信息吗？">
                                        <i class="fa fa-trash"></i> 删除
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="col-md-12">
                    <div class="pull-right">
                        {!! $list->render() !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        require(["jquery"],function () {
            $('a[href="{!! route('platform.designer.index') !!}"]').closest('.has_sub').find('.top').addClass('subdrop');
            $('a[href="{!! route('platform.designer.index') !!}"]').parent().addClass('active');
        })
    </script>
@endsection
