<?php

namespace App\Http\Controllers;

use App\Models\Caas;
use App\Models\DetailNilaiMicroteaching;
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
    
    public function lihatNilaiFinal()
    {
        $nilai_caas_alpro = Nilai::lihatNilaiAlpro();
        $nilai_caas_basdat = Nilai::lihatNilaiBasdat();

        return view('nilai.nilai', ['nilai_caas_alpro' => $nilai_caas_alpro, 'nilai_caas_basdat' => $nilai_caas_basdat]);
    }

    public function edit($id)
    {
        $nilai = Nilai::lihatNilaiCaasById($id);
        return view('asisten.edit_nilai', ['nilai' => $nilai]);
    }

    public function updateNilaiMicroTeaching($id){
        $nilai = Nilai::firstWhere(['id_caas'=>$id,'id_tahapan'=>2]);
        $total_nilai = DetailNilaiMicroteaching::getDataRataan($id);
        Nilai::updateNilaiMicroteaching($id,session(0)->id_asisten,$total_nilai);
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

    public function add_nilai_microteaching($id){
        $caas = Caas::firstWhere('id_caas',$id);
        return view('asisten.add_nilai_microteaching',['caas'=>$caas]);
    }

    public function save_nilai_microteaching(Request $request, $id){
        $detail = new DetailNilaiMicroteaching();
        $detail->id_caas = $id;
        $detail->id_asisten = session(0)->id_asisten;
        $isExisted = DetailNilaiMicroteaching::where(['id_caas'=>$id,'id_asisten'=>session(0)->id_asisten]);
        if ($isExisted->count() > 0){
            return redirect(route('asisten_lihat_nilai'));
        }
        $detail->nilai_penguasaan_materi = $request->nilai_penguasaan_materi;
        $detail->nilai_penguasaan_audiens = $request->nilai_penguasaan_audiens;
        $detail->nilai_sistematika = $request->nilai_sistematika;
        $detail->nilai_kejelasan_suara = $request->nilai_kejelasan_suara;
        $detail->nilai_penggunaan_alat_bantu = $request->nilai_penggunaan_alat_bantu;
        if (isset($request->catatan)){
            $detail->catatan = $request->catatan;
        }
        $total = ($request->nilai_penguasaan_materi + $request->nilai_penguasaan_audiens + $request->nilai_sistematika + $request->nilai_kejelasan_suara + $request->nilai_penggunaan_alat_bantu)/5;
        $detail->rataan = $total;
        $detail->save();
        $this->updateNilaiMicroTeaching($id);
        return redirect(route('asisten_lihat_nilai'));
    }


}
