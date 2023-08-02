<?php

namespace App\Http\Controllers;

use App\Models\datacalonmhs;
use App\Models\datakip;
use Illuminate\Http\Request;

class DatacalonmhsController extends Controller
{
    
    public function index()
    {
        $datamhs = datakip::all();
        return view('dataclnmhs.index', compact(['datamhs']));
    }

    
    public function create()
    {
        return view('dataclnmhs.create');
    }

    
    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
        datakip::create($request->except(['_token','submit']));
        return redirect('/datacalonmhs');
    }

    public function edit($id)
    {
        $datamhs = datakip::find($id);
        return view('dataclnmhs.edit',compact(['datamhs']));
    }

   
    public function update(Request $request, $id)
    {
        $datamhs = datakip::find($id);
        $datamhs->update($request->except(['_token','submit']));
        return redirect('/datacalonmhs');
    }

    
    public function destroy($id)
    {
        $datamhs = datakip::find($id);
        $datamhs->delete();
        return redirect('/datacalonmhs');
    }
}
