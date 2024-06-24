<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Mail\share;
use App\Models\product;
use App\Models\product_cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{

    public function index(product_cat $product_cat = null)
    {
        $product_cats = product_cat::where('catid','0')->with('sub_cats_site')->where('state', '1')->orderByRaw("`order` ASC, `id` DESC")->get();
        if ($product_cat == null) {
            $product = product::siteFilter()->paginate(5)->withQueryString();
        } else {
            $product=$product_cat->product()->siteFilter()->paginate(5)->withQueryString();
            if (!$product_cat->state){
                abort(404);
            }
        }
        return view('site.product', compact('product_cat','product','product_cats'));
    }

    public function show(Request $request, product $product){
        $comment = $product->comment()->where("state", "1")->orderBy("id","DESC")->paginate(4);
        if ($request->ajax()) {
            return view("site.layout.partials.comment",compact('comment'));
        } else {
            if (!$product->state)
                abort(404);
            if (str_contains(request()->url(), '/print')) {
                return view('site.print.product_info', compact('product'));
            }
            $content=$product->content()->where('state','1')->orderByRaw("'order' ASC,`id` DESC")->get(['title','pic','kind','catalog']);
            $content_pics=$content->where('kind',3);
            $content_catalog=$content->where('kind',4)->first();
            return view('site.product_info',compact('product','comment','content_pics','content_catalog'));
        }
    }

    public function mail(Request $request, $id)
    {
        $product = product::findOrFail($id);
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|min:1|max:255'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors());
        }
        Mail::to($request->email)->send(new share($product['title'], $product['url']));
        return response()->json([
            'success' => __('common.messages.email_success')
        ]);
    }
}


