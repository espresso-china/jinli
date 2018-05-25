<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 17:11
 */

namespace App\Repositories\Eloquent;

use App\Models\Topic;
use App\Repositories\TopicRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class TopicRepositoryEloquent extends BaseRepository implements TopicRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Topic::class;
    }




}