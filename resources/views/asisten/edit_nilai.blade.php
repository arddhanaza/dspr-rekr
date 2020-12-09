@extends('template.template')
@section('title','Nilai')
@section('nilai','active')
@include('template.navbar')
@section('container')

    <div class="text-center mt-5">
        <h2>Edit Nilai {{$nilai->nama_caas}}</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('asisten_update_nilai',$nilai->id_caas)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_caas">Nama Caas</label>
                    <input type="text" readonly value="{{$nilai->nama_caas}}" class="form-control" name="nama_caas"
                           id="nama_caas">
                </div>
                <div class="form-group">
                    <label for="kode_asisten">Kode Asisten</label>
                    <input type="text" readonly value="{{session(0)->kode_asisten}}" class="form-control"
                           name="kode_asisten" id="kode_asisten">
                </div>
                <div class="form-group">
                    <label for="nilai_administrasi">Nilai Administrasi</label>
                    <input type="number" value="{{$nilai->Administrasi}}" class="form-control" name="nilai_administrasi"
                           id="nilai_administrasi" required>
                </div>
                <div class="form-group">
                    <label for="nilai_cbt">Nilai CBT Test</label>
                    <input type="text" value="{{$nilai->CBTTest}}" class="form-control" name="nilai_cbt" id="nilai_cbt"
                           required>
                </div>
                <div class="form-group">
                    <label for="nilai_hackerrank">Nilai Hackerrank</label>
                    <input type="text" value="{{$nilai->Hackerrank}}" class="form-control" name="nilai_hackerrank"
                           id="nilai_hackerrank" required>
                </div>
                <div class="form-group">
                    <label for="nilai_microteaching">Nilai Microteaching</label>
                    <input type="text" value="{{$nilai->Microteaching}}" class="form-control" name="nilai_microteaching"
                           id="nilai_microteaching" required>
                </div>
                <div class="form-group">
                    <label for="nilai_interview">Nilai Interview</label>
                    <input type="text" value="{{$nilai->Interview}}" class="form-control" name="nilai_interview"
                           id="nilai_interview" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('asisten_lihat_nilai',$nilai->id_caas)}}"
                       class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

