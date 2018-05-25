<?php
/**
 * Created by PhpStorm.
 * User: Tacker
 * Date: 16/12/23
 * Time: 23:38
 */

namespace App\Repositories\Eloquent;

use App\Models\Member;
use App\Repositories\MemberRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class MemberRepositoryEloquent extends BaseRepository implements MemberRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Member::class;
    }


    public function store($params = [])
    {
        $data = [
            'name' => $params['name'],
            'thumb' => $params['thumb'],
            'companyid' => $params['companyid'],
            'remark' => strip_tags($params['remark']),
            'created_at' => time(),
            'updated_at' => time()
        ];
        return $this->model->insertGetId($data);
    }

}