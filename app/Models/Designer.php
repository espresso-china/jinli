<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:37
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    public $timestamps = true;

    protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
    //
    protected $table='designers';
    protected $fillable = ['name', 'companyid','cover','remark','ewm'];

    public function company()
    {
        return $this->hasOne('App\Models\Company','id','companyid');
    }

    public function works(){
        return $this->hasMany('App\Models\DesignerWorks', 'designerid', 'id');
    }
}