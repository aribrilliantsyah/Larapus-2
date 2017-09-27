<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use App\Pengambilan;

class RincianController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax()){
            $stats = Pengambilan::with('paket','divisi')->where('diambil','=',1);
            return Datatables::of($stats)->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'paket.nama','name'=>'paket.nama','title'=>'Nama Penerima'])
        ->addColumn(['data'=>'divisi.nama','name'=>'divisi.nama','title'=>'Divisi'])
		->addColumn(['data'=>'pengambil','name'=>'pengambil','title'=>'Pengambil'])
        ->addColumn(['data'=>'paket.telpon','name'=>'paket.telpon','title'=>'Nomor Telepon'])
        ->addColumn(['data'=>'created_at','name'=>'created_at','title'=>'Tanggal Masuk','searchable'=>false])
        ->addColumn(['data'=>'updated_at','name'=>'updated_at','title'=>'Tanggal Diambil','searchable'=>false]);
        return view('statistics.index')->with(compact('html'));
    }
}
