<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function create()
    {
                // Untuk Absensi
        $hari_ini = date("Y-m-d");
        $jam = NULL;
        $nik = Auth::guard('karyawan')->user()->nik;
        $cek = DB::table('presensi')->where('tgl_laporan', $hari_ini)->where('nik', $nik)->where('jam_out', $jam)->count();
        return view('presensi.create', compact('cek'));

       // return view('presensi.create');
    }

    public function store(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $null = NULL;
        $tgl_laporan = date("Y-m-d");
        $jam = date("H:i:s");
        $jam_image = date("H-i-s");
        $lokasi = $request->lokasi;
        $keterangan = $request->keterangan;
        $image = $request->image;
        $folderPath = "public/uploads/absensi/";
        $formatName = $nik . "-" . $tgl_laporan . ".jam " . $jam_image;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        // $lastid = DB::table('presensi')->insertGetId([
        //     'nik' => $nik,
        //     'tgl_laporan' => $tgl_laporan,
        //     'jam_in' => $jam,
        //     'foto_in' => $fileName,
        //     'lokasi_in' => $lokasi,
        //     'keterangan_in' => $keterangan
        // ]);
        // $data = [
        //     'nik' => $nik,
        //     'tgl_laporan' => $tgl_laporan,
        //     'jam_in' => $jam,
        //     'foto_in' => $fileName,
        //     'lokasi_in' => $lokasi
        // ];

            // Untuk Absensi
        // $cek = DB::table('presensi')->where('tgl_laporan', $tgl_laporan)->where('nik', $nik)->count();
        // if($cek > 0){
        //     $data_out = [
        //         'jam_out' => $jam,
        //         'foto_out' => $fileName,
        //         'lokasi_out' => $lokasi
        //     ];
        //     $update = DB::table('presensi')->where('tgl_laporan', $tgl_laporan)->where('nik', $nik)->update($data_out);
        //     if($update){
        //         echo "success|Terima Kasih, Hati-hati dijalan Guys ^_^|out";
        //         Storage::put($file, $image_base64);
        //     }else{
        //         echo "error|Waduh ada masalah nih, hubungi IT guys !|out" ;
        //     }
        // }else{
        //     $data = [
        //         'nik' => $nik,
        //         'tgl_laporan' => $tgl_laporan,
        //         'jam_in' => $jam,
        //         'foto_in' => $fileName,
        //         'lokasi_in' => $lokasi
        //     ];
        //     $simpan = DB::table('presensi')->insert($data);
        //     if($simpan){
        //         echo "success|Terima Kasih, Silahkan dilanjut Guys ^_^|in";
        //         Storage::put($file, $image_base64);
        //     }else{
        //         echo "error|Waduh ada masalah nih, hubungi IT guys !|in" ;

                                                    // Untuk In Out
        $cek = DB::table('presensi')->where('tgl_laporan', $tgl_laporan)->where('nik', $nik)->where('jam_out', $null)->count();
        if($cek == 0){
            $data = [
                'nik' => $nik,
                'tgl_laporan' => $tgl_laporan,
                'jam_in' => $jam,
                'foto_in' => $fileName,
                'lokasi_in' => $lokasi,
                'keterangan_in' => $keterangan
            ];
            $simpan = DB::table('presensi')->insert($data);
            if($simpan){
                echo "success|Terima Kasih, Silahkan dilanjut Guys ^_^|in";
                Storage::put($file, $image_base64);
            }else{
                echo "error|Waduh ada masalah nih, hubungi IT guys !|in" ;
                }
            }else{
            $data_out = [
                'jam_out' => $jam,
                'foto_out' => $fileName,
                'lokasi_out' => $lokasi,
                'keterangan_out' => $keterangan
            ];
            $update = DB::table('presensi')->where('tgl_laporan', $tgl_laporan)->where('nik', $nik)->orderBy('id', 'desc')->limit(1)->update($data_out);
            if($update){
                echo "success|Terima Kasih, Hati-hati dijalan Guys ^_^|out";
                Storage::put($file, $image_base64);
            }else{
                echo "error|Waduh ada masalah nih, hubungi IT guys !|out" ;
            }
        }    
    }
}
