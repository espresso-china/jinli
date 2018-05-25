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
use App\Models\DesignerWorks;
use App\Repositories\DesignerRepository;
use App\Repositories\DesignerWorksRepository;
use Breadcrumbs;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class DesignerWorksController extends BaseController
{
    private $designer;
    private $works;

    public function __construct(DesignerRepository $designer,DesignerWorksRepository $works)
    {
        $this->designer = $designer;
        $this->works = $works;
        parent::__construct();
    }

    public function index($id)
    {
        Breadcrumbs::register('admin-works', function ($breadcrumbs) {
            $breadcrumbs->push('设计师作品列表', route('platform.designer.index'));
        });
        $this->view_data['id'] = $id;
        $data=[
            'designerid'=>$id
        ];
        $this->view_data['list'] = $this->works->getByArrayList($data);
        return view('platform.works.index', $this->view_data);
    }

    public function create($id)
    {
        $this->view_data['designerid']=$id;
        $this->view_data['companyid'] = $this->designer->find($id)->companyid;
        //$this->view_data['designers'] = DesignerWorks::where('companyid',$id)->pluck('name','id');
        return view('platform.works.create', $this->view_data);
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $result = $this->works->store($request->all());

        if (!$result) {
            return ResultHelper::json_error('添加失败');
        }
        return ResultHelper::json_result('添加成功');
    }

    public function edit($id)
    {
        $this->view_data['info'] = $this->works->find($id);

        if ($this->view_data['info']) {
            return view('platform.works.edit', $this->view_data);
        } else {
            throw new NotFoundHttpException('信息不存在');
        }
    }

    public function update(Request $request, $id)
    {
        $result = $this->works->update($request->all(), $id);

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
        $result = $this->works->delete($id);
        return $result ? ResultHelper::json_result('删除成功') : ResultHelper::json_error('删除失败');
    }

}
