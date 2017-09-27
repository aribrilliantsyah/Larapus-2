<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use App\Pengambilan;

class StatisticsController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax()){
            $stats = Pengambilan::with('paket','divisi');
            if($request->get('status')=='returned') $stats->returned();
            if($request->get('status')=='not-returned') $stats->borrowed();
            return Datatables::of($stats)
            ->addColumn('returned_at',function($stat){
            	if ($stat->diambil)
            	{
            		return $stat->updated_at;
            	}
                return "Belum Diambil";
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'paket.nama','name'=>'paket.nama','title'=>'Nama Penerima'])
        ->addColumn(['data'=>'divisi.nama','name'=>'divisi.nama','title'=>'Divisi'])
        ->addColumn(['data'=>'paket.telpon','name'=>'paket.telpon','title'=>'Nomor Telepon'])
        ->addColumn(['data'=>'created_at','name'=>'created_at','title'=>'Tanggal Masuk','searchable'=>false])
        ->addColumn(['data'=>'returned_at','name'=>'returned_at','title'=>'Tanggal Diambil','orderable'=>false,'searchable'=>false]);
        return view('statistics.index')->with(compact('html'));
    }
}
