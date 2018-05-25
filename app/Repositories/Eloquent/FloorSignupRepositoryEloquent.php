<?php
/**
 * Created by PhpStorm.
 * User: Espresso
 * Date: 2017/7/19 0019
 * Time: 下午 17:26
 */

namespace App\Repositories\Eloquent;

use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\FloorSignup;
use App\Repositories\FloorSignupRepository;

class FloorSignupRepositoryEloquent extends BaseRepository implements FloorSignupRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FloorSignup::class;
    }


    /**
     * Store floor
     * @param array $params
     * @return bool
     */
    public function store($params = [])
    {
        return $this->model->insertGetId($params);
    }


}
