<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        {{-- <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a> --}}
        <a href="{{ route(auth()->user()->role.'_dashboard') }}" class="logo"><img src="{{ asset('img/unja.png') }}" class="bg-white" height="80" alt="logo"></a>
        <h5></h5>
    </div>
</div>
<div class="sidebar-inner slimscrollleft" style="font-family:revert-layer;font-size:14px;">

    <div id="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route(auth()->user()->role.'_dashboard') }}" class="waves-effect">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            @if(auth()->user()->role=='admin')
            <li>
                <a href="{{ route(auth()->user()->role.'_user') }}" class="waves-effect">
                    <i class="mdi mdi-account-multiple"></i>
                    <span> User </span>
                </a>
            </li>
            <li>
                <a href="{{ route(auth()->user()->role.'_kelas') }}" class="waves-effect">
                    <i class="mdi mdi-clipboard"></i>
                    <span> Kelas </span>
                </a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar-text"></i> <span> Mindset </span> <span class="float-right"><i class="mdi mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route(auth()->user()->role.'_soalfront') }}">Halaman Depan</a></li>

                    <li><a href="{{ route(auth()->user()->role.'_mindset') }}">Mahasiswa</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route(auth()->user()->role.'_skor') }}" class="waves-effect">
                    <i class="mdi mdi-clipboard"></i>
                    <span> Skor </span>
                </a>
            </li>

            {{-- <li>
                <a href="#" class="waves-effect">
                    <i class="mdi mdi-buffer"></i>
                    <span> Jawaban Mindset</span>
                </a>
            </li> --}}
            @elseif(auth()->user()->role=='mahasiswa')
            <li>
                <a href="{{ route(auth()->user()->role.'_kelasopen',auth()->user()->kelas_id) }}" class="waves-effect">
                    <i class="mdi mdi-buffer"></i>
                    <span> Kelas </span>
                </a>
            </li>
            <li>
                <a href="{{ route(auth()->user()->role.'_siswamindset') }}" class="waves-effect">

                    <i class="mdi mdi-buffer"></i>
                    <span> Mindset </span>
                </a>
            </li>
            @elseif(auth()->user()->role=='dosen')
            <li>
                <a href="{{ route(auth()->user()->role.'_kelas') }}" class="waves-effect">
                    <i class="mdi mdi-clipboard"></i>
                    <span> Kelas </span>
                </a>
            </li>
            <li>
                <a href="{{ route(auth()->user()->role.'_skor') }}" class="waves-effect">
                    <i class="mdi mdi-clipboard"></i>
                    <span> Skor </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
