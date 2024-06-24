<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\date_convert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class photo extends Model
{
    use HasFactory,SoftDeletes,date_convert;

    protected $appends=['alt_image'];

    protected $fillable = [
        'admin_id',
        'title',
        'catid',
        'pic',
        'alt_pic',
        'order',
        'state',
        'state_main',
    ];

    public function getAltImageAttribute()
    {
        return !empty($this->alt_pic) ? $this->alt_pic : $this->title;
    }

    public function photo_cat(){
        return $this->belongsTo(photo_cat::class,'catid')->select('id','title','catid');
    }

    public function scopeFilter(Builder $builder,$params){
        if(!empty($params['catid'])){
            $builder->where('catid',$params['catid']);
        }
        if(!empty($params['title'])){
            $builder->where('title','like','%' .$params['title']. '%');
        }
        return $builder;
    }

}
