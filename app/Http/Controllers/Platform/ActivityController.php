<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:24
 */

namespace App\Http\Controllers\Platform;
use App\Models\AdminUser;
use App\Models\Company;
use App\Models\Floor;
use App\Helpers\ResultHelper;
use App\Repositories\ActivityRepository;
use Breadcrumbs;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ActivityController extends BaseController
{
    private $activity;

    public function __construct(ActivityRepository $activity)
    {
        $this->activity = $activity;
        parent::__construct();
    }

    public function index()
    {
        Breadcrumbs::register('admin-activity', function ($breadcrumbs) {
            $breadcrumbs->push('活动列表', route('platform.activity.index'));
        });
        $this->view_data['list'] = $this->activity->Orderby('id', 'desc')->paginate();
        return view('platform.activity.index', $this->view_data);
    }

    public function create()
    {
        $this->view_data['users'] = AdminUser::pluck('name','id');
        $this->view_data['companys'] = Company::pluck('name','id');
        $this->view_data['floors'] = Floor::pluck('name','id');
        return view('platform.activity.create', $this->view_data);
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $result = $this->activity->store($request->all());

        if (!$result) {
            return ResultHelper::json_error('添加失败');
        }
        return ResultHelper::json_result('添加成功');
    }

    public function edit($id)
    {
        $this->view_data['info'] = $this->activity->find($id);

        if ($this->view_data['info']) {
            $this->view_data['users'] = AdminUser::pluck('name','id');
            $this->view_data['companys'] = Company::pluck('name','id');
            $this->view_data['floors'] = Floor::pluck('name','id');
            return view('platform.activity.edit', $this->view_data);
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

    public function api($id)
    {
        $this->view_data['info'] = $this->activity->find($id);

        if ($this->view_data['info']) {
            return view('platform.activity.api', $this->view_data);
        } else {
            throw new NotFoundHttpException('信息不存在');
        }
    }
}
