<?php

namespace App\Http\Controllers;

use App\Models\datacrips;
use Illuminate\Http\Request;

class DatacripsController extends Controller
{
    
    public function index()
    {
        $crips = datacrips::all();
        return view('datacrips.index', compact(['crips']));
    }

    public function create()
    {
        return view('datacrips.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
        datacrips::create($request->except(['_token','submit']));
        return redirect('/datacrips');
    }

}
