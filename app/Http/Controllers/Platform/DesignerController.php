<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:24
 */

namespace App\Http\Controllers\Platform;
use App\Models\Company;
use App\Helpers\ResultHelper;
use App\Repositories\DesignerRepository;
use Breadcrumbs;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class DesignerController extends BaseController
{
    private $designer;

    public function __construct(DesignerRepository $designer)
    {
        $this->designer = $designer;
        parent::__construct();
    }

    public function index()
    {
        Breadcrumbs::register('admin-designer', function ($breadcrumbs) {
            $breadcrumbs->push('设计师列表', route('platform.designer.index'));
        });
        $this->view_data['list'] = $this->designer->Orderby('id', 'desc')->paginate();
        return view('platform.designer.index', $this->view_data);
    }

    public function create()
    {
        $this->view_data['companys'] = Company::pluck('name','id');
        return view('platform.designer.create', $this->view_data);
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $result = $this->designer->store($request->all());

        if (!$result) {
            return ResultHelper::json_error('添加失败');
        }
        return ResultHelper::json_result('添加成功');
    }

    public function edit($id)
    {
        $this->view_data['info'] = $this->designer->find($id);
        $this->view_data['companys'] = Company::pluck('name','id');
        if ($this->view_data['info']) {
            return view('platform.designer.edit', $this->view_data);
        } else {
            throw new NotFoundHttpException('信息不存在');
        }
    }

    public function update(Request $request, $id)
    {
        $result = $this->designer->update($request->all(), $id);

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
        $result = $this->designer->delete($id);
        return $result ? ResultHelper::json_result('删除成功') : ResultHelper::json_error('删除失败');
    }

}
