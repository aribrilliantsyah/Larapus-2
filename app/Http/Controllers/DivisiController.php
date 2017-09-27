<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class DivisiController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $divisis = Divisi::select(['id','nama']);
            return Datatables::of($divisis)
            ->addColumn('action',function($divisi){
                return view('datatable._action', [
                    'model'     => $divisi,
                    'form_url'  => route('divisis.destroy',$divisi->id),
                    'edit_url'  => route('divisis.edit',$divisi->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $divisi->nama . ' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('divisis.index')->with(compact('html'));
    }

    public function create()
    {
        return view('divisis.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nama'=>'required|unique:divisis']);
        $divisi = Divisi::create($request->only('nama'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $divisi->nama"]);
        return redirect()->route('divisis.index');
    }

    public function edit($id)
    {
        $divisi=Divisi::find($id);
        return view('divisis.edit')->with(compact('divisi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['nama'=>'required|unique:divisis,nama,'.$id]);
        $divisi = Divisi::find($id);
        $divisi->update($request->only('nama'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $divisi->nama"]);
        return redirect()->route('divisis.index');
    }

    public function destroy($id)
    {
        if(!Divisi::destroy($id))  return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Divisi Berhasil Dihapus"]);
        return redirect()->route('divisis.index');
    }
}
