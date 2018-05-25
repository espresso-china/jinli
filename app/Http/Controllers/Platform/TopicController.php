<?php

namespace App\Http\Controllers\Platform;

use App\Repositories\AdminUserRepository;
use App\Repositories\TopicRepository;
use Auth;
use App\Helpers\ResultHelper;
use App\Repositories\ActivityRepository;
use Breadcrumbs;
use Illuminate\Http\Request;

class TopicController extends BaseController
{

    private $userRoles;

    private $adminUser;

    private $topic;
    public function __construct(AdminUserRepository $adminUser,TopicRepository $topic)
    {
        parent::__construct();
        $this->adminUser = $adminUser;
        $this->topic = $topic;
    }

    public function index()
    {
        Breadcrumbs::register('admin-topic', function ($breadcrumbs) {
            $breadcrumbs->push('专题列表', route('platform.topic.index'));
        });
        $this->view_data['list'] = $this->topic->Orderby('id', 'desc')->paginate();
        return view('platform.topic.index', $this->view_data);
    }

    public function create()
    {
        return view('platform.topic.create');
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $result = $this->topic->store($request->all());

        if (!$result) {
            return ResultHelper::json_error('添加失败');
        }
        return ResultHelper::json_result('添加成功');
    }

    public function edit($id)
    {
        $this->view_data['info'] = $this->topic->find($id);

        if ($this->view_data['info']) {
            return view('platform.topic.edit', $this->view_data);
        } else {
            throw new NotFoundHttpException('客户信息不存在');
        }
    }

    public function update(Request $request, $id)
    {
        $result = $this->activity->update($request->all(), $id);

        if (!$result) {
            return ResultHelper::json_error('更新失败');
        }
        return ResultHelper::json_result('更新成功');
    }

    /*
     * 删除
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $result = $this->activity->delete($id);
        return $result ? ResultHelper::json_result('删除成功') : ResultHelper::json_error('删除失败');
    }

    public function editTemplate($id){
        Breadcrumbs::register('admin-topic', function ($breadcrumbs) {
            $breadcrumbs->push('专题列表', route('platform.topic.index'));
        });
        $this->view_data['info']= $this->topic->find($id);
        $this->view_data['pc_blade'] =trim(file_get_contents(resource_path("views/zt/$id/index.blade.php")));
        $this->view_data['mobile_blade'] =trim(file_get_contents(resource_path("views/zt/$id/mobile.blade.php")));
        return view('platform.topic.edittpl',$this->view_data);
    }

    public function updateTemplate(Request $request,$id){
        $pc_content = $request->input('pc_content');
        $mobile_content = $request->input('mobile_content');
        $info = $this->topic->find($id);

        if(!$info){
            return redirect(route('platform.topic.index'))->withFlashDanger('非法操作');
        }
        $mobile_result =file_put_contents(resource_path("views/zt/$id/mobile.blade.php"),trim($mobile_content));
        $pc_result = file_put_contents(resource_path("views/zt/$id/index.blade.php"),trim($pc_content));

        if(!$pc_result&&!$mobile_result) {
            return redirect(route('platform.topic.index'))->withFlashDanger('修改失败');
        }
        return redirect(route('platform.topic.index'))->withFlashSuccess('修改成功');
    }

}

?>