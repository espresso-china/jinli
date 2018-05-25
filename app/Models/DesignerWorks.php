<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:37
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignerWorks extends Model
{
    public $timestamps = true;

    protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

    //
    protected $table='designerworks';
    protected $fillable = ['name','thumb','remark','companyid','designerid','type','stype','score','projecttype'];

    //类型
    const TYPE_J = 1; //家装
    const TYPE_G = 2; //工装

    //方式
    const STYPE_1 = 1; //
    const STYPE_2 = 2; //
    const STYPE_3 = 3; //
    const STYPE_4 = 4; //
    const STYPE_5 = 5; //
    const STYPE_6 = 6; //
    const STYPE_7 = 7; //

    const PTYPE_1 =1;
    const PTYPE_2 =2;
    const PTYPE_3 =3;
    const PTYPE_4 =4;
    const PTYPE_5 =5;
    const PTYPE_6 =6;
//    const PTYPE_7 =7;
//    const PTYPE_8 =8;
//    const PTYPE_9 =9;
//    const PTYPE_10 =10;
//    const PTYPE_11 =11;
//    const PTYPE_12 =12;
//    const PTYPE_13 =13;
//    const PTYPE_14 =14;
//    const PTYPE_15 =15;
//    const PTYPE_16 =16;

    public static function getTypes($type = '')
    {
        $types = [
            self::TYPE_J => '家装',
            self::TYPE_G => '工装',
        ];
        if ($type === '') {
            return $types;
        } else {
            return isset($types[$type]) ? $types[$type] : '';
        }
    }
    public static function getStypes($type = '')
    {
        $types = [
            self::STYPE_1 => '观/办公',
            self::STYPE_2 => '食/娱乐',
            self::STYPE_3 => '静/餐饮',
            self::STYPE_4 => '韵/酒店',
            self::STYPE_5 => '色/售楼样板间',
            self::STYPE_6 => '光/文教',
            self::STYPE_7 => '植/展览'
        ];
        if ($type === '') {
            return $types;
        } else {
            return isset($types[$type]) ? $types[$type] : '';
        }
    }
    public static function getPtypes($type = '')
    {
        $types = [
            self::PTYPE_1 => '小类一',
            self::PTYPE_2 => '小类二',
            self::PTYPE_3 => '小类三',
            self::PTYPE_4 => '小类四',
            self::PTYPE_5 => '小类五',
            self::PTYPE_6 => '小类六',
//            self::PTYPE_7 => '厅',
//            self::PTYPE_8 => '娱',
//            self::PTYPE_9 => '观',
//            self::PTYPE_10=> '餐',
//            self::PTYPE_11=> '待',
//            self::PTYPE_12=> '憩',
//            self::PTYPE_13=> '展',
//            self::PTYPE_14=> '学',
//            self::PTYPE_15 => '闲',
//            self::PTYPE_16 => '乐',
        ];
        if ($type === '') {
            return $types;
        } else {
            return isset($types[$type]) ? $types[$type] : '';
        }
    }
}