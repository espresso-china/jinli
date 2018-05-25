@extends('layouts.platform-app')
@section('page-title')
    活动管理
@endsection
@section('page-header')
    {!! Breadcrumbs::render('admin-topic') !!}
@endsection
@section('button')
    <a class="btn btn-default waves-effect waves-light" title="新增专题" data-modal="{!! route('platform.topic.create') !!}" data-area="800px">
        <i class="fa fa-plus"></i> 新增专题
    </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <table class="table table-striped table-bordered table-hover" id="gzh-table">
                    <tr>
                        <th width="50" class="text-center">ID</th>
                        <th class="text-center">活动名称 </th>
                        <th class="text-center">分享标题</th>
                        <th class="text-center">分享内容</th>
                        <th width="240" class="text-center"> 操作 </th>
                    </tr>
                    @foreach ($list as  $v)
                        <tr role="row">
                            <td class="text-center"> {{ $v->id}} </td>
                            <td> {{ $v->title}} </td>
                            <td class="text-center">{!! $v->share_title !!}</td>

                            <td class="text-center">
                                {!! $v->share_desc !!}
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm btn-group-solid">
                                    <a data-modal="{!! route('platform.topic.edit',['id'=>$v->id]) !!}"  class="btn btn-success btn-sm" data-area="800px" data-area="编辑信息"><i class="fa fa-pencil"></i> 编辑
                                    </a>
                                    <a href="{!! route('platform.topic.edittpl',['id'=>$v->id]) !!}"  class="btn btn-purple btn-sm"><i class="fa fa-pencil"></i> 编辑模板
                                    </a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" data-update="{!! $v->id !!}"
                                       data-action="{!! route('platform.topic.destroy') !!}" title="确定要删除该信息吗？">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            {{ $list->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

