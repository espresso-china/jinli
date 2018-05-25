<?php
/**
 * Created by PhpStorm.
 * User: espresso
 * Date: 2018/5/6
 * Time: 17:12
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table='topics';
    protected $fillable = ['title', 'share_title','share_desc','share_img','share_url','ismobile','ispc'];

    public function attachment()
    {
        return $this->hasOne('App\Models\Attachment','id','share_img');
    }
}