<?php

namespace App\Http\Controllers\admin;

use App\base\class\admin_controller;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\photo_request;
use App\Models\photo;
use App\Models\photo_cat;
use App\Trait\ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class photo_controller extends Controller
{
    use ResizeImage;
    public function __construct(private string $view='',private string $module ='',private string $module_title ='')
    {
        $this->module = "photo";
        $this->view = "admin.module.".$this->module.".";
        $this->module_title = __("modules.module_name." . $this->module);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $photo = photo::with('photo_cat')->filter($request->all())->orderBy('id','DESC')->paginate(4);
        $photo_cats_search = photo_cat::with(['sub_cats'])->where('catid', '0')->get();
        return view($this->view . "list", [
            'module_title' => $this->module_title,
            'photo_cats_search' => $photo_cats_search,
            'photo' => $photo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $photo_cats = photo_cat::where('catid','0')->with('sub_cats')->get();
        $status = trans('common.status_photo');
        return view($this->view . "new", [
            'module_title' => $this->module_title,
            'photo_cats' => $photo_cats,
            'module' => $this->module,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(photo_request $request)
    {
        DB::beginTransaction();
        $pic=$this->upload_file($this->module,'pic');
        $inputs=$request->validated();
        $inputs['pic']=$pic;
        $inputs['admin_id']=auth()->user()->id;
        $photo=photo::create($inputs);
        DB::commit();
        return back()->with('success', __('common.messages.success',[
            'module' => $this->module_title
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(photo $photo)
    {
        $photo_cats = photo_cat::where('catid', '0')->with('sub_cats')->get();
        $status = trans('common.status_photo');
        return view($this->view . "edit", [
            'module_title' => $this->module_title,
            'photo_cats' => $photo_cats,
            'photo' => $photo,
            'status' => $status,
            'module' => $this->module,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(photo_request $request, photo $photo)
    {
        DB::beginTransaction();
        $pic=$this->upload_file($this->module,'pic');
        $inputs=$request->validated();
        $inputs['pic']=$pic;
        $photo->update($inputs);
        DB::commit();
        return back()->with('success', __('common.messages.success_edit', [
            'module' => $this->module_title
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        photo::where('id', $id)->delete();
        return true;
    }

    public function action_all(Request $request)
    {
        $filed_validation = ['item' => 'required'];
        $validator = Validator::make($request->all(), $filed_validation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        return (new admin_controller())->action($request, photo::class);
    }
}
