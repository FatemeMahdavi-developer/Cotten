<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\product;
use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($module,$module_id)
    {
        $model=self::model($module);
        $liketable=$model::find($module_id);
        if($liketable->count() > 0){
            if($liketable->like()->where('user_id',auth()->id())->count()){
                return json_encode(['error'=>'شما قبلا پسندید']);
            }else{
                $liketable->like()->create([
                    'user_id'=>auth()->id(),
                ]);
                return json_encode(['sucess'=>'پسندیده شد']);
            }
        }else{
            return json_encode(['error'=>'نتیجه ای یافت نشد']);
        }
    }

    public function model($module)
    {
        $models = [
            'product' => product::class,
        ];
        return $models[$module];
    }
}
