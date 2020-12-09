<nav class="navbar navbar-expand navbar-light bg-transparent justify-content-center">
    <ul class="navbar-nav">
        @if(session('status') == 'caas')
            @if(false)
                <li class="nav-item @yield('nilai_akhir')">
                    <a class="nav-link" href="{{route('caas_lihat_nilai')}}"><strong>NILAI AKHIR</strong></a>
                </li>
            @endif
            <li class="nav-item @yield('lihat_nilai')">
                <a class="nav-link" href="{{route('caas_lihat_nilai_by_id',session(0)->id_caas)}}"><strong>LIHAT
                        NILAI</strong></a>
            </li>
        @else
            <li class="nav-item @yield('nilai')">
                <a class="nav-link" href="{{route('asisten_lihat_nilai')}}"><strong>NILAI</strong></a>
            </li>
        @endif
        <li class="nav-item @yield('exit')">
            <a class="nav-link" href="{{route('logout')}}"><strong>EXIT</strong></a>
        </li>
    </ul>
</nav>
