<?php

namespace App\Http\Controllers;

use App\Models\Biodataclnmhs;
use Illuminate\Http\Request;

use App\Models\datakip;
use Auth;

class BiodataclnmhsController extends Controller
{
    
    public function index()
    {
       $datamhs = datakip::where('user_id', Auth::user()->id)->first();
       
        return view('biodata.index', compact('datamhs'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
        Biodataclnmhs::create($request->except(['_token','submit']));
        return redirect('/biodatacalonmhs');
    }

    
    public function edit($id)
    {
        $biodatacln = Biodataclnmhs::find($id);
        return view('user.edit',compact(['biodatacln']));
    }

    public function update(Request $request, $id)
    {
        $biodatacln = Biodataclnmhs::find($id);
        $biodatacln->update($request->except(['_token','submit']));
        return redirect('/biodatacalonmhs');
    }

    public function save(Request $request)
    {   
        $kode = $request->kode_registrasi;

        $biodatacln = datakip::where('kode_registrasi', $kode)->update(['user_id' => Auth::user()->id]);
        return back();
    }

    public function searchB(Request $request)
    {
      $return_arr   = array();
      $row_array    = array();
      $text         = $request->get('term');

      $data = datakip::where('data_kip.kode_registrasi', 'like' , '%'.$text.'%')
                        ->where(function($q) {
                            $q->where('data_kip.user_id', null);
                            $q->orWhere('data_kip.user_id', '=', '0');
                        })->get();

      if($data->count() > 0)
      {  
          foreach($data as $row)
        {
          $result[] = ["id"=>$row->kode_registrasi,'value' => $row->kode_registrasi.' / '.$row->nama.' / '.$row->jenis_kelamin];
        } 
      } else {
        $result[] = ["id"=>"", "value"=>"Data tidak ditemukan"];
      }
      return json_encode($result);
    }
}
