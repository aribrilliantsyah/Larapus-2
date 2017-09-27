<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pengambilan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Laratrust\LaratrustFacade as Laratrust;

class AmbilController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax()){
            $pakets = Pengambilan::with(['divisi','paket'])->where('diambil','=',0)->get();
            return Datatables::of($pakets)
			->addColumn('action',function($paket){
			return view('datatable._modal', [
                    'modal'  => $paket->id ]);
            })->make(true);
        }
        $html = $htmlBuilder
		->addColumn(['data'=>'paket.id','name'=>'paket.id','title'=>'Nomor'])
        ->addColumn(['data'=>'paket.nama','name'=>'paket.nama','title'=>'Nama Penerima'])
        ->addColumn(['data'=>'divisi.nama','name'=>'divisi.nama','title'=>'Divisi'])
        ->addColumn(['data'=>'paket.telpon','name'=>'paket.telpon','title'=>'Nomor Telepon'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('pengambilan.index')->with(compact('html'));
    }
}
