<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/22
 * Time: 21:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //

    public $timestamps = true;

    protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
    protected $table='answers';
    protected $fillable = ['uid','type', 'floorid','a1','a2','a3','a4','a5','a6','a7','a8','a9','a10','designerid'];


}