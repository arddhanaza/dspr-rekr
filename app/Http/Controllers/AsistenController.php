<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('landing');
    }

    public function lihatNilai()
    {
        $nilai_caas_alpro = Nilai::lihatNilaiAlpro();
        $nilai_caas_basdat = Nilai::lihatNilaiBasdat();
        return view('asisten.index', ['nilai_caas_alpro' => $nilai_caas_alpro, 'nilai_caas_basdat' => $nilai_caas_basdat]);
    }

    public function edit($id)
    {
        $nilai = Nilai::lihatNilaiCaasById($id);
        return view('asisten.edit_nilai', ['nilai' => $nilai]);
    }

    public function update(Request $request, $id)
    {
//        $kode_asisten = $request->kode_asisten;

        $kode_asisten = session(0)->id_asisten;
        $nilai_administrasi = $request->nilai_administrasi;
        $nilai_cbt = $request->nilai_cbt;
        $nilai_hackerrank = $request->nilai_hackerrank;
        $nilai_microteaching = $request->nilai_microteaching;
        $nilai_interview = $request->nilai_interview;
        Nilai::updateNilaiAdministrasi($id, $kode_asisten, $nilai_administrasi);
        Nilai::updateNilaiCbt($id, $kode_asisten, $nilai_cbt);
        Nilai::updateNilaiHackerrank($id, $kode_asisten, $nilai_hackerrank);
        Nilai::updateNilaiMicroteaching($id, $kode_asisten, $nilai_microteaching);
        Nilai::updateNilaiInteview($id, $kode_asisten, $nilai_interview);
        return redirect(route('asisten_lihat_nilai'));
    }


}
