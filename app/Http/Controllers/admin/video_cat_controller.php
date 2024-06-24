<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\video_cat;
use App\Trait\ResizeImage;
use Illuminate\Http\Request;

class video_cat_controller extends Controller
{

    use ResizeImage;

    public function __construct(private string $module='',private string $module_title='',private string $view='')
    {
        $this->module="video_cat";
        $this->module_title=trans("modules.module_name.".$this->module);
        $this->view="admin.module.".$this->module.".";   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video_cats=video_cat::where('catid','0')->get();
        return view($this->view."new",[
            'module_title'=>$this->module_title,
            'module'=>$this->module,
            'video_cats'=>$video_cats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
