<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';

    public static function lihatNilaiBasdatById($id)
    {
        return self::lihatNilaiBasdat()
            ->where('nim', '=', $id);
    }

    public static function lihatNilaiBasdat()
    {
        return self::lihatNilaiCaas()
            ->where('id_praktikum', '=', '1');
    }

    public static function lihatNilaiCaas()
    {
        $data = DB::table('nilai')
            ->join('tahapan', 'tahapan.id_tahapan', '=', 'nilai.id_tahapan')
            ->join('caas', 'caas.id_caas', '=', 'nilai.id_caas')
            ->select('caas.Nama as nama_caas', 'caas.id_caas as id_caas', DB::raw('
            SUM(CASE WHEN nilai.id_tahapan = 1 THEN nilai.nilai  END) "Administrasi",
            SUM(CASE WHEN nilai.id_tahapan = 2 THEN nilai.nilai  END) "CBTTest",
            SUM(CASE WHEN nilai.id_tahapan = 3 THEN nilai.nilai  END) "Hackerrank",
            SUM(CASE WHEN nilai.id_tahapan = 4 THEN nilai.nilai  END) "Microteaching",
            SUM(CASE WHEN nilai.id_tahapan = 5 THEN nilai.nilai  END) "Interview",
            SUM( nilai.nilai) as Total
            '))
            ->groupBy('caas.Nama')
            ->groupBy('caas.id_caas')
            ->orderBy('nilai.id_tahapan', 'asc')
            ->orderBy('nilai.id_caas', 'asc')
            ->get();
        for ($row = 0; $row < count($data); $row++) {
            $kodeAsisten = self::showKodeAsisten($data[$row]->id_caas);
            $data[$row]->kode_asisten = $kodeAsisten->kode_asisten;
            $praktikum = self::showKodePraktikum($data[$row]->id_caas);
            $data[$row]->id_praktikum = $praktikum->id_praktikum;
            $caas = self::showNim($data[$row]->id_caas);
            $data[$row]->nim = $caas->nim;
            $data[$row]->Total = self::calculateTotal($data[$row]->id_caas);
        }
        $data = $data->sortByDesc('Total');
        return $data;
    }

    public static function calculateTotal($id){
         $nilaiAdministrasi = DB::table('nilai')
            ->select('nilai')
            ->where('id_caas','=',$id)
            ->where('id_tahapan','=',1)
            ->first();
        $nilaiCbt = DB::table('nilai')
            ->select('nilai')
            ->where('id_caas','=',$id)
            ->where('id_tahapan','=',2)
            ->first();
        $nilaiHackerrank = DB::table('nilai')
            ->select('nilai')
            ->where('id_caas','=',$id)
            ->where('id_tahapan','=',3)
            ->first();
        $nilaiMicroteaching = DB::table('nilai')
            ->select('nilai')
            ->where('id_caas','=',$id)
            ->where('id_tahapan','=',4)
            ->first();
        $nilaiInterview = DB::table('nilai')
            ->select('nilai')
            ->where('id_caas','=',$id)
            ->where('id_tahapan','=',5)
            ->first();
        $nilaiAdministrasi->nilai = $nilaiAdministrasi->nilai * 0.1;
        $nilaiInterview->nilai = $nilaiInterview->nilai * 0.20;
        $nilaiMicroteaching->nilai = $nilaiMicroteaching->nilai * 0.40;
        $nilaiHackerrank->nilai = $nilaiHackerrank->nilai * 0.15;
        // $nilaiMicroteaching->nilai = $nilaiMicroteaching->nilai * 0.3;
        // $nilaiHackerrank->nilai = $nilaiHackerrank->nilai * 0.15;
        $nilaiCbt->nilai = $nilaiCbt->nilai * 0.15;
        $total = $nilaiAdministrasi->nilai + $nilaiCbt->nilai + $nilaiHackerrank->nilai + $nilaiInterview->nilai + $nilaiMicroteaching->nilai;
        return $total;
    }
    
    public static function showKodeAsisten($id)
    {
        $asisten = DB::table('nilai')
            ->join('asisten', 'asisten.id_asisten', '=', 'nilai.id_asisten')
            ->select('asisten.kode_asisten')
            ->groupBy('asisten.kode_asisten')
            ->where('nilai.id_caas', '=', $id)
            ->first();
        return $asisten;
    }

    public static function showKodePraktikum($id)
    {
        $praktikum = DB::table('caas')
            ->join('praktikum', 'praktikum.id_praktikum', '=', 'caas.id_praktikum')
            ->select('caas.id_praktikum')
            ->groupBy('caas.id_praktikum')
            ->where('caas.id_caas', '=', $id)
            ->first();
        return $praktikum;
    }

    public static function showNim($id)
    {
        $caas = DB::table('nilai')
            ->join('caas', 'caas.id_caas', '=', 'nilai.id_caas')
            ->select('caas.nim')
            ->groupBy('caas.nim')
            ->where('nilai.id_caas', '=', $id)
            ->first();
        return $caas;
    }

    public static function lihatNilaiAlproById($id)
    {
        return self::lihatNilaiAlpro()
            ->where('nim', '=', $id);
    }

    public static function lihatNilaiAlpro()
    {
        return self::lihatNilaiCaas()
            ->where('id_praktikum', '=', '2');
    }

    public static function lihatNilaiCaasById($id)
    {
        return self::lihatNilaiCaas()
            ->where('id_caas', '=', $id)
            ->first();
    }

    public static function updateNilaiAdministrasi($id, $kode_asisten, $nilai)
    {
        return DB::table('nilai')
            ->where('id_caas', '=', $id)
            ->where('id_tahapan', '=', '1')
            ->update(['nilai' => $nilai, 'id_asisten' => $kode_asisten]);
    }

    public static function updateNilaiCbt($id, $kode_asisten, $nilai)
    {
        return DB::table('nilai')
            ->where('id_caas', '=', $id)
            ->where('id_tahapan', '=', '2')
            ->update(['nilai' => $nilai, 'id_asisten' => $kode_asisten]);
    }

    public static function updateNilaiHackerrank($id, $kode_asisten, $nilai)
    {
        return DB::table('nilai')
            ->where('id_caas', '=', $id)
            ->where('id_tahapan', '=', '3')
            ->update(['nilai' => $nilai, 'id_asisten' => $kode_asisten]);
    }

    public static function updateNilaiMicroteaching($id, $kode_asisten, $nilai)
    {
        return DB::table('nilai')
            ->where('id_caas', '=', $id)
            ->where('id_tahapan', '=', '4')
            ->update(['nilai' => $nilai, 'id_asisten' => $kode_asisten]);
    }

    public static function updateNilaiInteview($id, $kode_asisten, $nilai)
    {
        return DB::table('nilai')
            ->where('id_caas', '=', $id)
            ->where('id_tahapan', '=', '5')
            ->update(['nilai' => $nilai, 'id_asisten' => $kode_asisten]);
    }
}
