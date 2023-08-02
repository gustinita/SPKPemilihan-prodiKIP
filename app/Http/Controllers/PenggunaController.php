<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pngguna = pengguna::all();
        return view('admin.index', compact(['pngguna']));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token', 'submit']));
        pengguna::create($request->except(['_token', 'submit']));
        return redirect('pngguna');
    }

    public function edit($id)
    {
        $pngguna = pengguna::find($id);
        return view('admin.edit', compact(['pngguna']));
    }

    public function update($id, Request $request)
    {
        $pngguna = pengguna::find($id);
        $pngguna->update($request->except(['_token','submit']));
        return redirect('/datacripskriteria');
    }

    public function destroy($id)
    {
        $pngguna = pengguna::find($id);
        $pngguna->delete();
        return redirect('/datacripskriteria');
    }
}
