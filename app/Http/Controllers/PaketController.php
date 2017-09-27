<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Divisi;
use Yajra\Datatables\Html\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Yajra\Datatables\Datatables;
use Session;
use App\Pengambilan;
class PaketController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $pakets = Paket::with(['divisi']);
            return Datatables::of($pakets)
            ->addColumn('action',function($paket){
                return view('datatable._action', [
                    'model'     => $paket,
                    'form_url'  => route('pakets.destroy',$paket->id),
					'edit_url'  => route('pakets.edit',$paket->id),
                    'modal'  => $paket->id,
                    'confirm_message' => 'Yakin Ingin Menghapus Paket Atas Nama '.$paket->nama.' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Penerima'])
        ->addColumn(['data'=>'pengirim','name'=>'pengirim','title'=>'Nama Pengirim'])
        ->addColumn(['data'=>'divisi.nama','name'=>'divisi.nama','title'=>'Divisi'])
        ->addColumn(['data'=>'telpon','name'=>'telpon','title'=>'No Telepon'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('pakets.index')->with(compact('html'));
    }

    public function create()
    {
        return view('pakets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
            'divisi_id'=>'required|exists:divisis,id',
            'telpon'=>'required']);
        $paket = Paket::create($request->all());

        $status = new Pengambilan;
        $status->paket_id = $paket->id;
        $status->divisi_id = $paket->divisi_id;
        $status->diambil = 0;
        $status->save();
        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Paket Atas Nama $paket->nama"]);
        return redirect()->route('pakets.index');
    }

    public function edit($id)
    {
        $paket=Paket::find($id);
        return view('pakets.edit')->with(compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['nama'=>'required']);
        $paket = Paket::find($id);
        $paket->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $paket->nama"]);
        return redirect()->route('pakets.index');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        if(!Paket::destroy($id))  return redirect()->back();
        $status = Pengambilan::where('paket_id','=',$id);
        $status->delete();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Paket Berhasil Dihapus"]);
        return redirect()->route('pakets.index');
    }
	
	public function ambil(Request $request, $id)
	{
		$Ambil = Pengambilan::find($id);
		$Ambil->pengambil=$request->pengambil;
		$Ambil->save();
		return redirect('/pakets/'.$id.'/return');
	}
    public function returnBack($paket_id)
    {
        $Pengambilan = Pengambilan::where('paket_id','=',$paket_id)->first();

        if ($Pengambilan)
        {
            $Pengambilan->diambil=true;
            $Pengambilan->save();

            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Paket Sudah Diambil " ]);
        }
        return redirect('/admin/pengambilan');
    }

    public function pengambil($id)
    {
        $id = Pengambilan::find($id);
        return view('pengambilan.add', compact('id'));
    }
}
