<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 16:37
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table='activity';
    protected $fillable = ['title', 'pubdate','province','city','price','companyid','floorid','mark','issms','smstpl','userid'];

    public function company()
    {
        return $this->hasOne('App\Models\Company','id','companyid');
    }

    public function floor()
    {
        return $this->hasOne('App\Models\Floor','id','floorid');
    }
    public function countsigup()
    {
        return $this->hasMany('App\Models\Siguplist','activityid','id');
    }
}