<div class="col-md-12" style="">
    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
            <td>会员昵称 </td>
            <td>{!! $info->name !!} </td>
        </tr>
        <tr>
            <td> 联系电话 </td>
            <td> {!! $info->tel !!} </td>
        </tr>
        <tr>
            <td> 性别 </td>
            <td> {!! ($info->sex ==1)? '先生': '女士' !!} </td>
        </tr>
        <tr>
            <td> 最后更新时间 </td>
            <td> {!! $info->updated_at!!} </td>
        </tr>
        <tr>
            <td> 备注 </td>
            <td> {{ $info->remark }} </td>
        </tr>
        </tbody>
    </table>

    @foreach($list as $v)
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td> ID </td>
                <td> {{ $v->id }} </td>
            </tr>
            <tr>
                <td> 楼盘 </td>
                <td> {{ $v->desc }} </td>
            </tr>
            <tr>
                <td> 报名时间 </td>
                <td> {{ $v->created_at }} </td>
            </tr>
        </table>
    @endforeach
</div>