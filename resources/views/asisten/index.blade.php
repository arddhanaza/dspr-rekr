@extends('template.template')
@section('title','Nilai')
@section('nilai','active')
@include('template.navbar')
@section('container')

    <div class="text-center mt-5">
        <h2>Daftar Nilai Alpro</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-3 display nowrap datTable table-responsive js-exportable" id="dat1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Calon Asisten</th>
                    <th>Kode Asisten Penilai</th>
                    <th>Administasi (10%)</th>
                    <th>CBT Test (15%)</th>
                    <th>Hackerrank (15%)</th>
                    <th>Microteaching (40%)</th>
                    <th>Interview (20%)</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nilai_caas_alpro as $caas)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$caas->nama_caas}}</td>
                        <td>{{$caas->kode_asisten}}</td>
                        <td>{{$caas->Administrasi}}</td>
                        <td>{{$caas->CBTTest}}</td>
                        <td>{{$caas->Hackerrank}}</td>
                        <td>{{$caas->Microteaching}}</td>
                        <td>{{$caas->Interview}}</td>
                        <td>{{$caas->Total}}</td>
                        <td>
                            <a href="{{route('add_nilai_microteaching',$caas->id_caas)}}" class="btn btn-secondary mb-3">Add Nilai Microteaching</a>
                            <a href="{{route('asisten_edit_nilai',$caas->id_caas)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-5">
        <h2>Daftar Nilai Basdat</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-3 display nowrap datTable table-responsive" id="dat2">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Calon Asisten</th>
                    <th>Kode Asisten Penilai</th>
                    <th>Administasi (10%)</th>
                    <th>CBT Test (15%)</th>
                    <th>Hackerrank (15%)</th>
                    <th>Microteaching (40%)</th>
                    <th>Interview (20%)</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nilai_caas_basdat as $caas)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$caas->nama_caas}}</td>
                        <td>{{$caas->kode_asisten}}</td>
                        <td>{{$caas->Administrasi}}</td>
                        <td>{{$caas->CBTTest}}</td>
                        <td>{{$caas->Hackerrank}}</td>
                        <td>{{$caas->Microteaching}}</td>
                        <td>{{$caas->Interview}}</td>
                        <td>{{$caas->Total}}</td>
                        <td>
                            <a href="{{route('add_nilai_microteaching',$caas->id_caas)}}" class="btn btn-secondary mb-3 disabled">Add Nilai Microteaching</a>
                            <a href="{{route('asisten_edit_nilai',$caas->id_caas)}}" class="btn btn-outline-secondary disabled">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection

