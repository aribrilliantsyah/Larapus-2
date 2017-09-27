<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use Illuminate\Support\Facades\Auth;
use Charts;
use App\Paket;
use DB;
use App\Pengambilan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        return view('home');

    }

    protected function adminDashboard()
    {
        $total = Paket::all()->count();
        $ambil = Pengambilan::where('diambil','=',0)->count();

        $chart = Charts::database(DB::table('pakets')->join('divisis','divisis.id', '=', 'pakets.divisi_id')->select('pakets.*','divisis.nama as nama_div')->get(), 'donut', 'highcharts')
                    ->title("Jumlah Paket Per Divisi")
                    ->elementLabel("Total")
                    ->responsive(false)
                    ->width(0)
                    ->height(500)
                    ->groupBy('nama_div');

        $line = Charts::database(Paket::all(), 'line', 'highcharts')
                    ->title("Jumlah Paket Per Bulan")
                    ->elementLabel("Total")
                    ->responsive(false)
                    ->width(0)
                    ->height(500)
                    ->groupByMonth();

        return view('dashboard.admin', (['chart' => $chart, 'line' => $line]), compact('total','ambil'));
    }
}
