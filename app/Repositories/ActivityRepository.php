<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:33
 */

namespace App\Repositories;


use Prettus\Repository\Contracts\RepositoryInterface;

interface ActivityRepository extends RepositoryInterface
{
    function store($payload = []);
}