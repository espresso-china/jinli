<?php
/**
 * Created by PhpStorm.
 * User: Espresso
 * Date: 2017/7/19 0019
 * Time: 下午 17:26
 */

namespace App\Repositories;


use Prettus\Repository\Contracts\RepositoryInterface;

interface FloorSignupRepository extends RepositoryInterface
{

    /**
     * Store user
     * @param array $payload
     * @return bool
     */
    public function store($payload = []);

}