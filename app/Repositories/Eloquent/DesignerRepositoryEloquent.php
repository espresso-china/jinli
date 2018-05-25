<?php
/**
 * Created by PhpStorm.
 * User: Tacker
 * Date: 16/12/23
 * Time: 23:38
 */

namespace App\Repositories\Eloquent;

use App\Models\Designer;
use App\Repositories\DesignerRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class DesignerRepositoryEloquent extends BaseRepository implements DesignerRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Designer::class;
    }


    public function store($params = [])
    {
        $data = [
            'name' => $params['name'],
            'cover' => $params['cover'],
            'ewm'=>$params['ewm'],
            'companyid' => $params['companyid'],
            'city' => $params['city'],
            'remark' => strip_tags($params['remark']),
            'created_at' => time(),
            'updated_at' => time()
        ];
        return $this->model->insertGetId($data);
    }

}