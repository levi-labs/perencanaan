<?php

namespace App\Http\Controllers;

use App\Models\RequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Halaman Report Permintaan(Request)';
        $dari   = $request->dari;
        $sampai = $request->sampai;

        if (isset($dari) && isset($sampai)) {
            $data = RequestItem::where('status_permintaan', 'Request')
                ->where('tanggal_permintaan', '>=', $dari)
                ->where('tanggal_permintaan', '<=', $sampai)
                ->get();
            return view('pages.report.index', ['title' => $title, 'data' => $data]);
        }
        return view('pages.report.index', ['title' => $title]);
    }

    public function printindex(Request $request){
        $title  = 'Halaman Report Permintaan(Request)';
        $dari   = $request->dari;
        $sampai = $request->sampai;

        if (isset($dari) && isset($sampai)) {
            $data = RequestItem::where('status_permintaan', 'Request')
                ->where('tanggal_permintaan', '>=', $dari)
                ->where('tanggal_permintaan', '<=', $sampai)
                ->get();
            return view('pages.report.printindex', ['title' => $title, 'data' => $data, 'dari' => $dari, 'sampai' => $sampai]);
        }
    }
    public function index2(Request $request)
    {
        $title  = 'Halaman Report Permintaan(Terkirim)';
        $dari   = $request->dari;
        $sampai = $request->sampai;

        return view('pages.report.index2', ['title' => $title]);
    }

    public function printindex2(Request $request){
        $title  = 'Halaman Report Permintaan(Terkirim)';
        $dari   = $request->dari;
        $sampai = $request->sampai; 
        if (isset($dari) && isset($sampai)) {
            $data = RequestItem::where('status_permintaan', 'Terkirim')
                ->where('tanggal_permintaan', '>=', $dari)
                ->where('tanggal_permintaan', '<=', $sampai)
                ->get();
            return view('pages.report.printindex2', ['title' => $title, 'data' => $data, 'dari' => $dari, 'sampai' => $sampai]);
        }
    }
    public function index3(Request $request)
    {
        $title  = 'Halaman Report Permintaan(Produksi)';
        $dari   = $request->dari;
        $sampai = $request->sampai;

        return view('pages.report.index3', ['title' => $title]);
    }

    public function printindex3(Request $request){
            $title  = 'Halaman Report Permintaan(Produksi)';
        $dari   = $request->dari;
        $sampai = $request->sampai;

        if (isset($dari) && isset($sampai)) {
            $data = RequestItem::where('status_permintaan', 'Terima & Produksi')
                ->where('tanggal_permintaan', '>=', $dari)
                ->where('tanggal_permintaan', '<=', $sampai)
                ->get();
            return view('pages.report.printindex3', ['title' => $title, 'data' => $data, 'dari' => $dari, 'sampai' => $sampai]);
        }
    }
}
