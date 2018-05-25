<?php
/**
 * Created by PhpStorm.
 * User: Tacker
 * Date: 16/12/23
 * Time: 23:38
 */

namespace App\Repositories\Eloquent;

use App\Models\Answer;
use App\Repositories\AnswerRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class AnswerRepositoryEloquent extends BaseRepository implements AnswerRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Answer::class;
    }
    public function store($params = [])
    {
        return $this->model->insertGetId($params);
    }



}