<?php
/**
 * Created by PhpStorm.
 * User: Tacker
 * Date: 16/12/23
 * Time: 23:38
 */

namespace App\Repositories\Eloquent;

use App\Models\DesignerWorks;
use App\Repositories\DesignerWorksRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class DesignerWorksRepositoryEloquent extends BaseRepository implements DesignerWorksRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DesignerWorks::class;
    }


    public function store($params = [])
    {
        $data = [
            'name' => $params['name'],
            'thumb' => $params['thumb'],
            'companyid' => $params['companyid'],
            'designerid'=>$params['designerid'],
            'remark' => strip_tags($params['remark']),
            'type'=>$params['type'],
            'stype'=>$params['stype'],
            'projecttype'=>$params['projecttype'],
            'score'=>$params['score'],
            'created_at' => time(),
            'updated_at' => time()
        ];
        return $this->model->insertGetId($data);
    }

    function getByArrayList($data=[]){
        $where = $this->model;

        if($data['designerid']){
            $where = $where->where('designerid',$data['designerid']);
        }
        return $where->orderBy('id', 'desc')->paginate();
    }

}