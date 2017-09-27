<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pengambilan;
use App\Paket;
use DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax()){
            $pakets = Pengambilan::with(['divisi','paket'])->where('diambil','=',0)->get();
            return Datatables::of($pakets)
            ->addColumn('action',function($paket){
                return '<a class="btn btn-xs btn-primary" href="'.route('admin.pakets.return',$paket->id).'">Ambil</a>';
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'paket.nama','name'=>'paket.nama','title'=>'Nama Penerima'])
        ->addColumn(['data'=>'divisi.nama','name'=>'divisi.nama','title'=>'Divisi'])
        ->addColumn(['data'=>'paket.telpon','name'=>'paket.telpon','title'=>'Nomor Telepon'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'Opsi','orderable'=>false,'searchable'=>false]);
        return view('guest.index')->with(compact('html'));
    }

    public function search(Request $request)
    {
        
		$cari =$request->get('nama');
        //$hasil = Paket::where('nama','LIKE','%'.$cari.'%')->paginate(10);
		$hasil = DB::table('pengambilans')
            ->join('pakets', 'pengambilans.paket_id', '=', 'pakets.id')
            ->join('divisis', 'pengambilans.divisi_id', '=', 'divisis.id')
            ->select('pengambilans.*', 'pakets.*', 'divisis.nama as divisi')
			->where('diambil','=',0)
			->where('pakets.nama','LIKE','%'.$cari.'%')
			->get();

        $jml = DB::table('pengambilans')
            ->join('pakets', 'pengambilans.paket_id', '=', 'pakets.id')
            ->join('divisis', 'pengambilans.divisi_id', '=', 'divisis.id')
            ->select('pengambilans.*', 'pakets.nama', 'divisis.nama as divisi')
            ->where('diambil','=',0)
            ->where('pakets.nama','LIKE','%'.$cari.'%')
            ->count();
		
		//'=',$request->nama)->get();
        return view('guest.hasil', compact('hasil','jml','cari'));
    }
}
