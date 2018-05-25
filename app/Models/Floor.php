<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/7
 * Time: 08:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    const TYPE_1 = 1; //楼盘
    const TYPE_2 = 2; //工装场地

    protected $table='floor';
    protected $fillable = ['name','type', 'address','province','city','area','kfs','tel'];


    public static function getTypes($type = '')
    {
        $types = [
            self::TYPE_1 => '楼盘',
            self::TYPE_2 => '工装场地',
        ];
        if ($type === '') {
            return $types;
        } else {
            return isset($types[$type]) ? $types[$type] : '';
        }
    }
}
