@extends('layouts.platform-app')
@section('page-title')
    设计师管理
@endsection
@section('page-header')
    {!! Breadcrumbs::render('admin-designer') !!}
@endsection
@section('button')
    <a class="btn btn-default waves-effect waves-light" data-title="新增设计师" data-modal="{!! route('platform.designer.create') !!}">
        <i class="fa fa-plus"></i> 新增设计师
    </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th width="50" class="text-center">ID</th>
                        <th width="100" class="text-center"> 头像 </th>
                        <th width="100" class="text-center">姓名</th>
                        <th width="140" class="text-center"> 地区</th>
                        <th width="160" class="text-center">所属公司</th>
                        <th width="60" class="text-center">作品</th>
                        <th width="180" class="text-center"> 操作 </th>
                    </tr>
                    @foreach ($list as  $v)
                        <tr role="row">
                            <td class="text-center"> {{ $v->id}} </td>
                            <td >
                                <img src="{!! asset($v->cover) !!}" alt="" width="100" data-tips-image="{!! asset($v->cover) !!}" data-width="600px">
                            </td>
                            <td class="text-center">{!! $v->name !!}</td>
                            <td class="text-center">
                                {{ $v->city}}
                            </td>
                            <td class="text-center">
                                {{ $v->company?$v->company->name:'暂无' }}
                            </td>
                            <td class="text-center">{!! $v->works->count() !!}</td>
                            <td class="text-center">
                                <div class="btn-group ">
                                    {{--<a @if($v->url)href="{!! $v->url !!}" target="_blank" @else href="javascript:;" @endif class="btn btn-purple btn-sm"><i class="fa fa-search"></i> 查看--}}
                                    {{--</a>--}}
                                    <a href="{!! route('platform.works.index',['id'=>$v->id]) !!}"  class="btn  btn-sm btn-pink">
                                        <i class="fa fa-book"></i> 作品
                                    </a>

                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle waves-effect waves-light btn-sm"
                                                data-toggle="dropdown" aria-expanded="false">操作 <span
                                                    class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a  data-modal="{{ route('platform.designer.edit',['id' => $v->id]) }}" data-title="编辑楼盘信息" data-area="600px" href="javascript:;" ><i class="fa fa-pencil"></i> 编辑
                                                </a>
                                            </li>
                                            <li>
                                                <a data-update="{!! $v->id !!}"
                                                   data-action="{!! route('platform.designer.destroy') !!}" title="确定要删除吗？">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </li>
                                        </ul>
                                    </div>



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

