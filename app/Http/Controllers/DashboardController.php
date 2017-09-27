<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Lava;
use DB;

class DashboardController extends Controller
{
    function index()
    {
        $votes  =  \Lava::DataTable();

        $divisi = DB::table('pakets')
        ->join('divisis', 'pakets.divisi_id', '=', 'divisis.id')
        ->select('pakets.*', 'divisis.nama')
        ->groupBy('divisi_id')->get();

        $votes->addStringColumn('Jumlah')
            ->addNumberColumn('Jumlah');
        foreach($divisi as $data){
            $votes->addRow(array($data->divisi_id,
                DB::table('pakets')->where('divisi_id','=',$data->divisi_id)->count()));
        }

        \Lava::BarChart('Jumlah')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'horizontal',

            ));
        return view('dashboard.admin');
    }
}
