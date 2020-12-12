<?php

namespace App\Http\Controllers;

use App\Models\Nilai;

class CaasController extends Controller
{
    public function index()
    {
        $nilai_caas_alpro = Nilai::lihatNilaiAlpro();
        $nilai_caas_basdat = Nilai::lihatNilaiBasdat();
        return view('asisten.index', ['nilai_caas_alpro' => $nilai_caas_alpro, 'nilai_caas_basdat' => $nilai_caas_basdat]);
    }

    public function lihatNilaiById($id)
    {
        if ($id != session(0)->nim) {
            $nilai_alpro = Nilai::lihatNilaiAlproById(session(0)->nim);
            $nilai_basdat = Nilai::lihatNilaiBasdatById(session(0)->nim);
        } else {
            $nilai_alpro = Nilai::lihatNilaiAlproById($id);
            $nilai_basdat = Nilai::lihatNilaiBasdatById($id);
        }
        return view('caas.lihat_nilai_by_id', ['nilai_alpro' => $nilai_alpro, 'nilai_basdat' => $nilai_basdat]);
    }
}
