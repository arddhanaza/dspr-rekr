@extends('template.template')
@section('title','Nilai')
@section('nilai','active')
@include('template.navbar')
@section('container')

    <div class="text-center mt-5">
        <h2>Input Nilai Microteaching</h2>
        <h4>{{$caas->Nama}}</h4>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('save_nilai_microteaching',$caas->id_caas)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_caas">Nama Caas</label>
                    <input type="text" readonly value="{{$caas->Nama}}" class="form-control" name="nama_caas"
                           id="nama_caas">
                </div>
                <div class="form-group">
                    <label for="kode_asisten">Kode Asisten</label>
                    <input type="text" readonly value="{{session(0)->kode_asisten}}" class="form-control"
                           name="kode_asisten" id="kode_asisten">
                </div>
                <div class="form-group">
                    <label for="nilai_penguasaan_materi">Penguasaan Materi (1-5)</label>
                    <input type="number" class="form-control" name="nilai_penguasaan_materi"
                           id="nilai_penguasaan_materi" required min="1" max="5"
                           placeholder="1 Sangat Kurang - 5 Sangat Baik">
                </div>
                <div class="form-group">
                    <label for="nilai_penguasaan_audiens">Penguasaan Audiens (1-5)</label>
                    <input type="number" class="form-control" name="nilai_penguasaan_audiens"
                           id="nilai_penguasaan_audiens" required min="1" max="5"
                           placeholder="1 Sangat Kurang - 5 Sangat Baik">
                </div>
                <div class="form-group">
                    <label for="nilai_sistematika">Nilai Sistematika /Kemudahan Dipahami (1-5)</label>
                    <input type="number" class="form-control" name="nilai_sistematika"
                           id="nilai_sistematika" required min="1" max="5"
                           placeholder="1 Sangat Kurang - 5 Sangat Baik">
                </div>
                <div class="form-group">
                    <label for="nilai_kejelasan_suara">Nilai Kejelasan Suara (1-5)</label>
                    <input type="number" class="form-control" name="nilai_kejelasan_suara"
                           id="nilai_kejelasan_suara" required min="1" max="5"
                           placeholder="1 Sangat Kurang - 5 Sangat Baik">
                </div>
                <div class="form-group">
                    <label for="nilai_penggunaan_alat_bantu">Nilai Penggunaan Alat Bantu (1-5)</label>
                    <input type="number" class="form-control" name="nilai_penggunaan_alat_bantu"
                           id="nilai_penggunaan_alat_bantu" required min="1" max="5"
                           placeholder="1 Sangat Kurang - 5 Sangat Baik">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan (OPTIONAL) </label>
                    <textarea name="catatan" id="catatan" rows="2" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Insert</button>
                    <a href="{{route('asisten_lihat_nilai')}}"
                       class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

