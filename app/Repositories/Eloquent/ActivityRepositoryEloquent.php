<?php
/**
 * Created by PhpStorm.
 * User: Tacker
 * Date: 16/12/23
 * Time: 23:38
 */

namespace App\Repositories\Eloquent;

use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ActivityRepositoryEloquent extends BaseRepository implements ActivityRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Activity::class;
    }
    public function store($params = [])
    {
        return $this->model->insertGetId($params);
    }



}