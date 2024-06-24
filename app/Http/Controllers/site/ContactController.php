<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\contactmap;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $contactmap= contactmap::where('id','1')->get(['lgmap','qgmap','zgmap','cgmap'])->Toarray();
        return view('site.contact',[
            'lgmap'=>$contactmap[0]['lgmap'],
            'qgmap'=>$contactmap[0]['qgmap'],
            'zgmap'=>$contactmap[0]['zgmap'],
            'cgmap'=>$contactmap[0]['cgmap'],
        ]);
    }
}
