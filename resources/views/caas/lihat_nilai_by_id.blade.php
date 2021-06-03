@extends('template.template')
@section('title','Nilai')
@section('lihat_nilai','active')
@include('template.navbar')
@section('container')

    @if($nilai_basdat->count() > 0)
        <div class="text-center mt-5">
            <h2>Daftar Nilai Basdat</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table mt-3 datTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Calon Asisten</th>
                        <!--<th>Kode Asisten Penilai</th>-->
                        <th>Administasi</th>
                        <th>CBT Test</th>
                        <th>Hackerrank</th>
                        <th>Microteaching</th>
                        <th>Interview</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nilai_basdat as $caas)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$caas->nama_caas}}</td>
                            <!--<td>{{$caas->kode_asisten}}</td>-->
                            <td>{{$caas->Administrasi}}</td>
                            <td>{{$caas->CBTTest}}</td>
                            <td>{{$caas->Hackerrank}}</td>
                            <td>{{$caas->Microteaching}}</td>
                            <td>{{$caas->Interview}}</td>
                            <td>{{$caas->Total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if($nilai_alpro->count() > 0)
        <div class="text-center mt-5">
            <h2>Daftar Nilai Alpro</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table mt-3 datTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Calon Asisten</th>
                        <!--<th>Kode Asisten Penilai</th>-->
                        <th>Administasi</th>
                        <th>CBT Test</th>
                        <th>Hackerrank</th>
                        <th>Microteaching</th>
                        <th>Interview</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nilai_alpro as $caas)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$caas->nama_caas}}</td>
                            <!--<td>{{$caas->kode_asisten}}</td>-->
                            <td>{{$caas->Administrasi}}</td>
                            <td>{{$caas->CBTTest}}</td>
                            <td>{{$caas->Hackerrank}}</td>
                            <td>{{$caas->Microteaching}}</td>
                            <td>{{$caas->Interview}}</td>
                            <td>{{$caas->Total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

