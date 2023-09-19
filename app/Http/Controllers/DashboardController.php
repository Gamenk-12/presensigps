<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hari_ini = date("Y-m-d");
        $hari = date("d");
        $bulan_ini = date("m");
        $tahun_ini = date("Y");
        $salam = "";
        $time = date('H:i:s');
            if ($time >= '03:00:00' && $time <= '10:00:59') {
                $salam = 'Selamat Pagi';
                // $time_kerja = 'Masuk';
            } elseif ($time >= '10:01:00' && $time <= '15:00:59') {
                $salam = 'Selamat Siang';
                // $time_kerja = 'Pulang';
            } elseif ($time >= '15:01:00' && $time <= '18:00:59') {
                 $salam = 'Selamat Sore';
            } else {
                $salam = 'Selamat Malam';
            }
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensi_hari_ini = DB::table('presensi')->where('nik', $nik)->where('tgl_laporan', $hari_ini)->latest();
        $karyawan = DB::table('karyawan')->where('nik', $nik)->first();
        $history_hari_ini = DB::table('presensi')->where('nik', $nik)
                            ->whereRaw('DAY(tgl_laporan)= "' . $hari . '"')
                            ->whereRaw('MONTH(tgl_laporan)="' . $bulan_ini . '"')
                            ->whereRaw('YEAR(tgl_laporan)="' . $tahun_ini . '"')
                            ->orderBy('tgl_laporan')
                            ->get()
                            ->sortByDesc('jam_in');
        $leaderboard = DB::table('presensi')
                            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
                            ->where('tgl_laporan', $hari_ini)
                            ->get()
                            ->sortByDesc('jam_in');
        $rekap_presensi = DB::table('presensi')
                            ->selectRaw('COUNT(nik) as jmlhadir')
                            ->whereRaw('DAY(tgl_laporan)= "' . $hari . '"')
                            ->whereRaw('MONTH(tgl_laporan)="' . $bulan_ini . '"')
                            ->whereRaw('YEAR(tgl_laporan)="' . $tahun_ini . '"')
                            ->first();
        // return view('dashboard.dashboard');
        return view('dashboard.dashboard', compact('presensi_hari_ini','karyawan','history_hari_ini','salam','leaderboard','rekap_presensi'));
    }
}
