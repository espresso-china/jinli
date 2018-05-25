<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/7
 * Time: 08:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FloorSignup extends Model
{
    //
    protected $table='siguplist';
    protected $fillable = ['memberid', 'activityid','floorid','price','userid','ip','tel','num','desc','desc2','decoratedate','area','budget','status','fid'];


    public function member()
    {
        return $this->hasOne('App\Models\Floor\Member','id','memberid');
    }
    public function activity(){
        return $this->hasOne('App\Models\Floor\Activity','id','activityid');
    }
}
